<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // FETCH COLLEGE
    if (isset($_POST['key']) && $_POST['key'] == 'fetchCollege') {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM colleges ORDER BY college_id ASC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        

        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                    $college_id = $row['college_id'];
                    $college_name = $row['college_name'];
                    $college_acronym = $row['college_acronym'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$college_name.'</td>
                        <td>'.$college_acronym.'</td>
                        <td>
                            <button type="button" id="GetEditCollege" class="btn btn-warning"
                                data-bs-toggle="modal" data-bs-target="#EditCollegeModal" data-id="'.$college_id.'">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE

    // ADD COLLEGE
    if(isset($_POST['action']) && $_POST['action'] == 'AddCollege') {
        $AddCollegeName = trimSlash($_POST['AddCollegeName']);
        $AddCollegeAcronym = trimSlash($_POST['AddCollegeAcronym']);
        
        // check if college existed
        $sqlCheckCollege = "";
        $sqlCheckCollege .= "SELECT * FROM colleges
                WHERE college_name = :colname
                OR college_acronym = :colacro";  

        try {
            $stmtCheckCollege = $pdo->prepare($sqlCheckCollege);
            $stmtCheckCollege->execute(['colname' => $AddCollegeName, 'colacro' => $AddCollegeAcronym]); 
            $rowCheckCollege = $stmtCheckCollege->fetch();

            if ($rowCheckCollege) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> College already existed! </li>"]);
                exit();
            } else {
                // INSERT COLLEGE DATA
                $sqlAddCollege = "INSERT INTO colleges (college_name, college_acronym) VALUES (?,?)";
                $stmtAddCollege= $pdo->prepare($sqlAddCollege);
                $stmtAddCollege->execute([$AddCollegeName, $AddCollegeAcronym]);

                // INSERT SYSTEM LOG         
                $logAction = $s_position ." ". $s_fullname . " added a new college.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success', 'message' => '<li> New College Added! </li>']);
                exit();
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        } // END OF ADD COLLEGE
    }

    // GET SINGLE COLLEGE DATA
    if(isset($_REQUEST['GetEditCollegeBtn'])){
        $getcollege_id = $_REQUEST['GetEditCollegeBtn'];

        $sqlGetCollege = "";
        $sqlGetCollege .= "SELECT * FROM colleges WHERE college_id = :cid LIMIT 1";

        $stmtGetCollege = $pdo->prepare($sqlGetCollege);
        $stmtGetCollege->execute(['cid' => $getcollege_id]); 
        $rowGetCollege = $stmtGetCollege->fetch();
        
        $scollege_id = $rowGetCollege['college_id'];
        $scollege_name = $rowGetCollege['college_name'];
        $scollege_acronym = $rowGetCollege['college_acronym'];

        // require this
        require(ROOT_PATH . '/app/includes/forms/form-editCollege.php');
        exit();
    }// END OF GET SINGLE COLLEGE DATA

    // EDIT COLLEGE
    if(isset($_POST['action']) && $_POST['action'] == 'EditCollege') {
        // dd($_POST);
        $college_id = trimSlash($_POST['EditCollegeId']);
        $college_name = trimSlash($_POST['EditCollegeName']);
        $college_acronym = trimSlash($_POST['EditCollegeAcronym']);
        
        try {
            $sqlEditCollege = "UPDATE colleges SET college_name=?, college_acronym=?  WHERE college_id=?";
            $stmtEditCollege = $pdo->prepare($sqlEditCollege);
            $stmtEditCollege->execute([$college_name, $college_acronym, $college_id]);
            
            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " edited a college record.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => "<li> College record has been Updated! </li>"]);
            exit();
            
        } catch (PDOException $error) {
            $message = $error->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }
?>
