<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // FETCH Department
    if (isset($_POST['key']) && $_POST['key'] == 'fetchDepartment') {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM departments
            INNER JOIN colleges ON colleges.college_id = departments.college_id
            WHERE colleges.college_id = departments.college_id
            ORDER BY colleges.college_id ASC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        
        if($stmt->rowCount() > 0) {
            // dd($row);
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                    $department_id = $row['department_id'];
                    $college_id = $row['college_id'];
                    $department_name = $row['department_name'];
                    $department_acronym = $row['department_acronym'];
                    $college_name = $row['college_name'];
                    $college_acronym = $row['college_acronym'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$college_acronym.'</td>
                        <td>'.$department_name.'</td>
                        <td>'.$department_acronym.'</td>
                        <td>
                            <button type="button" id="GetEditDepartment" class="btn btn-warning"
                                data-bs-toggle="modal" data-bs-target="#EditDepartmentModal" data-id="'.$department_id.'">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH Course

    // ADD Department
    if(isset($_POST['action']) && $_POST['action'] == 'AddDepartment') {
        // dd($_POST);
        $AddDepartmentSelectCollege = trimSlash($_POST['AddDepartmentSelectCollege']);
        $AddDepartmentName = trimSlash($_POST['AddDepartmentName']);
        $AddDepartmentAcronym = trimSlash($_POST['AddDepartmentAcronym']);
        
        try {
            // check if Department existed
            $sqlCheckDepartment = "";
            $sqlCheckDepartment .= "SELECT * FROM departments
                    WHERE departments.college_id = :collegeid
                    AND departments.department_name = :departmentname";  
                    
            $stmtCheckDepartment = $pdo->prepare($sqlCheckDepartment);
            $stmtCheckDepartment->execute(['collegeid' => $AddDepartmentSelectCollege, 'departmentname' => $AddDepartmentName]); 
            $rowCheckDepartment = $stmtCheckDepartment->fetch();

            if ($rowCheckDepartment) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> Department already existed! </li>"]);
                exit();
            } else {
                // GET COLLEGE NAME
                $sqlGetCollege = "";
                $sqlGetCollege .= "SELECT * FROM colleges WHERE college_id = :cid LIMIT 1";
                $stmtGetCollege = $pdo->prepare($sqlGetCollege);
                $stmtGetCollege->execute(['cid' => $AddDepartmentSelectCollege]); 
                $rowGetCollege = $stmtGetCollege->fetch();

                $college_id = $rowGetCollege['college_id'];
                $college_name = $rowGetCollege['college_name'];
                $college_acronym = $rowGetCollege['college_acronym'];

                // INSERT Department DATA
                $sqlAddDepartment = "INSERT INTO departments (college_id, department_name, department_acronym) VALUES (?,?,?)";
                $stmtAddDepartment= $pdo->prepare($sqlAddDepartment);
                $stmtAddDepartment->execute([$AddDepartmentSelectCollege, $AddDepartmentName, $AddDepartmentAcronym]);
            
                // INSERT SYSTEM LOG
                $logAction = $s_position ." ". $s_fullname . " added a new Department in ".$college_name.".";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success', 'message' => '<li> New Department added into '.$college_name.'! </li>']);
                exit();  
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    } // END OF ADD Course

    // // GET SINGLE Department DATA
    if(isset($_REQUEST['GetEditDepartmentBtn'])){
        $getDepartment_id = $_REQUEST['GetEditDepartmentBtn'];
        $sqlGetDepartment = "";
        $sqlGetDepartment .= "SELECT * FROM departments
            INNER JOIN colleges ON colleges.college_id = departments.college_id
            WHERE colleges.college_id = departments.college_id
            AND departments.department_id = :cid LIMIT 1";

        $stmtGetDepartment = $pdo->prepare($sqlGetDepartment);
        $stmtGetDepartment->execute(['cid' => $getDepartment_id]); 
        $rowGetDepartment = $stmtGetDepartment->fetch();

        $sdepartment_id = $rowGetDepartment['department_id'];
        $sdepartment_name = $rowGetDepartment['department_name'];
        $sdepartment_acronym = $rowGetDepartment['department_acronym'];
        $scollege_id = $rowGetDepartment['college_id'];
        $scollege_name = $rowGetDepartment['college_name'];
        $scollege_acronym = $rowGetDepartment['college_acronym'];

        // require this
        require(ROOT_PATH . '/app/includes/forms/form-editDepartment.php');
        exit();
    }// END OF GET SINGLE Department DATA

    // // EDIT Department
    if(isset($_POST['action']) && $_POST['action'] == 'EditDepartment') {
        // dd($_POST);
        $department_id = trimSlash($_POST['EditDepartmentId']);
        $college_id = trimSlash($_POST['EditDepartmentSelectCollege']);
        $department_name = trimSlash($_POST['EditDepartmentName']);
        $department_acronym = trimSlash($_POST['EditDepartmentAcronym']);

        try {
            // GET COLLEGE NAME
            $sqlGetCollege = "";
            $sqlGetCollege .= "SELECT * FROM colleges WHERE college_id = :cid LIMIT 1";

            $stmtGetCollege = $pdo->prepare($sqlGetCollege);
            $stmtGetCollege->execute(['cid' => $college_id]); 
            $rowGetCollege = $stmtGetCollege->fetch();

            $college_id = $rowGetCollege['college_id'];
            $college_name = $rowGetCollege['college_name'];
            $college_acronym = $rowGetCollege['college_acronym'];

            // UPDATE DEPARTMENT
            $sqlEditDepartment = "UPDATE departments SET college_id=?, department_name=?, department_acronym=?  WHERE department_id=?";
            $stmtEditDepartment = $pdo->prepare($sqlEditDepartment);
            $stmtEditDepartment->execute([$college_id, $department_name, $department_acronym, $department_id]);
            
            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " edited a Department record in ".$college_name."";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            echo json_encode(['status' => 'success', 'message' => "<li> Department record has been updated in ".$college_name."! </li>"]);
            exit();

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }  
    }
    
?>
