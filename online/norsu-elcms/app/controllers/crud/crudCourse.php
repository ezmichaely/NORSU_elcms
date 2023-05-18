<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');
    
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // FETCH Course
    if (isset($_POST['key']) && $_POST['key'] == 'fetchCourse') {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM courses
            INNER JOIN colleges ON colleges.college_id = courses.college_id
            WHERE colleges.college_id = courses.college_id
            ORDER BY colleges.college_id ASC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                    $course_id = $row['course_id'];
                    $college_id = $row['college_id'];
                    $course_name = $row['course_name'];
                    $course_acronym = $row['course_acronym'];
                    $college_name = $row['college_name'];
                    $college_acronym = $row['college_acronym'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$college_acronym.'</td>
                        <td>'.$course_name.'</td>
                        <td>'.$course_acronym.'</td>
                        <td>
                            <button type="button" id="GetEditCourse" class="btn btn-warning"
                                data-bs-toggle="modal" data-bs-target="#EditCourseModal" data-id="'.$course_id.'">
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

    // ADD Course
    if(isset($_POST['action']) && $_POST['action'] == 'AddCourse') {
        // dd($_POST);
        $AddCourseSelectCollege = trimSlash($_POST['AddCourseSelectCollege']);
        $AddCourseName = trimSlash($_POST['AddCourseName']);
        $AddCourseAcronym = trimSlash($_POST['AddCourseAcronym']);
        
        try {
            // check if Course existed
            $sqlCheckCourse = "";
            $sqlCheckCourse .= "SELECT * FROM courses
                WHERE courses.college_id = :collegeid
                AND courses.course_name = :coursename";  
                    
            $stmtCheckCourse = $pdo->prepare($sqlCheckCourse);
            $stmtCheckCourse->execute(['collegeid' => $AddCourseSelectCollege, 'coursename' => $AddCourseName]); 
            $rowCheckCourse = $stmtCheckCourse->fetch();

            if ($rowCheckCourse) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> Course already existed! </li>"]);
            } else {
                // GET COLLEGE NAME
                $sqlGetCollege = "";
                $sqlGetCollege .= "SELECT * FROM colleges WHERE college_id = :cid LIMIT 1";

                $stmtGetCollege = $pdo->prepare($sqlGetCollege);
                $stmtGetCollege->execute(['cid' => $AddCourseSelectCollege]); 
                $rowGetCollege = $stmtGetCollege->fetch();

                $college_id = $rowGetCollege['college_id'];
                $college_name = $rowGetCollege['college_name'];
                $college_acronym = $rowGetCollege['college_acronym'];

                // INSERT Course DATA
                $sqlAddCourse = "INSERT INTO courses (college_id, course_name, course_acronym) VALUES (?,?,?)";
                $stmtAddCourse= $pdo->prepare($sqlAddCourse);
                $stmtAddCourse->execute([$AddCourseSelectCollege, $AddCourseName, $AddCourseAcronym]);
                
                // INSERT SYSTEM LOG
                $logAction = $s_position ." ". $s_fullname . " added a new Course in ".$college_name.".";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);
                echo json_encode(['status' => 'success', 'message' => '<li> New Course added into '.$college_name.'! </li>']);
                exit();
            }

        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    } // END OF ADD Course

    // GET SINGLE Course DATA
    if(isset($_REQUEST['GetEditCourseBtn'])){
        $getCourse_id = $_REQUEST['GetEditCourseBtn'];

        $sqlGetCourse = "";
        $sqlGetCourse .= "SELECT * FROM courses
            INNER JOIN colleges ON colleges.college_id = courses.college_id
            WHERE colleges.college_id = courses.college_id
            AND course_id = :cid LIMIT 1";

        $stmtGetCourse = $pdo->prepare($sqlGetCourse);
        $stmtGetCourse->execute(['cid' => $getCourse_id]); 
        $rowGetCourse = $stmtGetCourse->fetch();

        $scourse_id = $rowGetCourse['course_id'];
        $scourse_name = $rowGetCourse['course_name'];
        $scourse_acronym = $rowGetCourse['course_acronym'];
        $scollege_id = $rowGetCourse['college_id'];
        $scollege_name = $rowGetCourse['college_name'];
        $scollege_acronym = $rowGetCourse['college_acronym'];

        // require this
        require(ROOT_PATH . '/app/includes/forms/form-editCourse.php');
        exit();
    }// END OF GET SINGLE Course DATA

    // EDIT Course
    if(isset($_POST['action']) && $_POST['action'] == 'EditCourse') {
        // dd($_POST);
        $course_id = trimSlash($_POST['EditCourseId']);
        $college_id = trimSlash($_POST['EditCourseSelectCollege']);
        $course_name = trimSlash($_POST['EditCourseName']);
        $course_acronym = trimSlash($_POST['EditCourseAcronym']);

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

            $sqlEditCourse = "UPDATE courses SET college_id=?, course_name=?, course_acronym=?  WHERE course_id=?";
            $stmtEditCourse = $pdo->prepare($sqlEditCourse);
            $stmtEditCourse->execute([$college_id, $course_name, $course_acronym, $course_id]);
            
            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " edited a Course record in ".$college_name."";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            
            echo json_encode(['status' => 'success', 'message' => "<li> Course record has been updated in ".$college_name."! </li>"]);
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }  
    }
    
?>
