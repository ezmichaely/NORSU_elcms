<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // // FETCH Majors
    if (isset($_POST['key']) && $_POST['key'] == 'fetchMajor') {
        $i = 0;
        // dd($_POST);
        $sql = "";
        $sql .= "SELECT * FROM majors 
            INNER JOIN courses ON courses.course_id = majors.course_id 
            INNER JOIN colleges ON colleges.college_id = courses.college_id 
            WHERE courses.course_id = majors.course_id 
            AND colleges.college_id = courses.college_id 
            ORDER BY colleges.college_id ASC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        
        // dd($_POST);
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                    $major_id = $row['major_id'];
                    $major_name = $row['major_name'];
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $course_acronym = $row['course_acronym'];
                    $college_id = $row['college_id'];
                    $college_name = $row['college_name'];
                    $college_acronym = $row['college_acronym'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$college_acronym.'</td>
                        <td>'.$course_name.'</td>
                        <td>'.$major_name.'</td>
                        <td>
                            <button type="button" id="GetEditMajor" class="btn btn-warning"
                                data-bs-toggle="modal" data-bs-target="#EditMajorModal" data-id="'.$major_id.'">
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

    // ADD Major
    if(isset($_POST['action']) && $_POST['action'] == 'AddMajor') {
        // dd($_POST);
        $AddMajorSelectCollege = trimSlash($_POST['AddMajorSelectCollege']);
        $AddMajorSelectCourse = trimSlash($_POST['AddMajorSelectCourse']);
        $AddMajorName = trimSlash($_POST['AddMajorName']);
        
        try {
            // check if Major existed
            $sqlCheckMajor = "";
            $sqlCheckMajor .= "SELECT * FROM majors
                WHERE majors.course_id = :courseid
                AND majors.major_name = :majorname";  
                    
            $stmtCheckMajor = $pdo->prepare($sqlCheckMajor);
            $stmtCheckMajor->execute(['courseid' => $AddMajorSelectCourse, 'majorname' => $AddMajorName]); 
            $rowCheckMajor = $stmtCheckMajor->fetch();

            if ($rowCheckMajor) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> Major already existed! </li>"]);
                exit();
            } else {
                // GET COURSE NAME
                $sqlCourse = "SELECT * FROM courses WHERE courses.course_id = :courseid";
                $stmtCourse = $pdo->prepare($sqlCourse);
                $stmtCourse->execute(['courseid' => $AddMajorSelectCourse]);
                $rowCourse = $stmtCourse->fetch();

                $course_id = $rowCourse['course_id'];
                $course_name = $rowCourse['course_name'];
                $course_acronym = $rowCourse['course_acronym'];

                // INSERT Major DATA
                $sqlAddMajor = "INSERT INTO majors (course_id, major_name) VALUES (?,?)";
                $stmtAddMajor= $pdo->prepare($sqlAddMajor);
                $stmtAddMajor->execute([$AddMajorSelectCourse, $AddMajorName]);
                
                // INSERT SYSTEM LOG
                $logAction = $s_position ." ". $s_fullname . " added a new Major in ".$course_name.".";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);
                
                echo json_encode(['status' => 'success', 'message' => '<li> New Major added in '.$course_name.'! </li>']);
                exit();
                    
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    } // END OF ADD Major

    // GET SINGLE Major DATA
    if(isset($_REQUEST['GetEditMajorBtn'])){
        $getMajor_id = $_REQUEST['GetEditMajorBtn'];

        $sqlGetMajor = "";
        $sqlGetMajor .= "SELECT * FROM majors
            INNER JOIN courses ON courses.course_id = majors.course_id 
            INNER JOIN colleges ON colleges.college_id = courses.college_id
            WHERE colleges.college_id = courses.college_id
            AND majors.major_id = :cid LIMIT 1";
        $stmtGetMajor = $pdo->prepare($sqlGetMajor);
        $stmtGetMajor->execute(['cid' => $getMajor_id]); 
        $rowGetMajor = $stmtGetMajor->fetch();

        $smajor_id = $rowGetMajor['major_id'];
        $smajor_name = $rowGetMajor['major_name'];
        $scourse_id = $rowGetMajor['course_id'];
        $scourse_name = $rowGetMajor['course_name'];
        $scourse_acronym = $rowGetMajor['course_acronym'];
        $scollege_id = $rowGetMajor['college_id'];
        $scollege_name = $rowGetMajor['college_name'];
        $scollege_acronym = $rowGetMajor['college_acronym'];

        // require this
        require(ROOT_PATH . '/app/includes/forms/form-editMajor.php');
        exit();
    }// END OF GET SINGLE Major DATA

    // EDIT Major
    if(isset($_POST['action']) && $_POST['action'] == 'EditMajor') {
        // dd($_POST);
        $major_id = trimSlash($_POST['EditMajorId']);
        $college_id = trimSlash($_POST['EditMajorSelectCollege']);
        $course_id = trimSlash($_POST['EditMajorSelectCourse']);
        $major_name = trimSlash($_POST['EditMajorName']);

        try {
            $sqlEditMajor = "UPDATE majors SET course_id=?, major_name=?  WHERE major_id=?";
            $stmtEditMajor = $pdo->prepare($sqlEditMajor);
            $stmtEditMajor->execute([$course_id, $major_name, $major_id]);

            // GET COURSE NAME
            $sqlCourse = "SELECT * FROM courses
                        WHERE courses.course_id = :courseid";
            $stmtCourse = $pdo->prepare($sqlCourse);
            $stmtCourse->execute(['courseid' => $course_id]);
            $rowCourse = $stmtCourse->fetch();

            $course_id = $rowCourse['course_id'];
            $course_name = $rowCourse['course_name'];
            $course_acronym = $rowCourse['course_acronym'];

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " edited a Major record in ".$course_name."";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => "<li> Major record has been updated in ".$course_name."! </li>"]);
            exit();


        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }  
    }
    
?>
