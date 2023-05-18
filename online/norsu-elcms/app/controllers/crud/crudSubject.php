<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // FETCH Subject
    if (isset($_POST['key']) && $_POST['key'] == 'fetchSubject') {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM subjects 
            ORDER BY subjects.subject_id ASC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 

        // dd($stmt);
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $subject_id = $row['subject_id'];
                $subject_code = $row['subject_code'];
                $subject_title = $row['subject_title'];
                
                $response .= '
                <tr>
                    <td>'.++$i.'</td>
                    <td>'.$subject_code.'</td>
                    <td>'.$subject_title.'</td>
                    <td>
                        <button type="button" id="GetEditSubject" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#EditSubjectModal" data-id="'.$subject_id.'">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                    </td>
                </tr>';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH Subject

    // ADD Subject
    if(isset($_POST['action']) && $_POST['action'] == 'AddSubject') {
        // dd($_POST);

        $AddSubjectCode = trimSlash($_POST['AddSubjectCode']);
        $AddSubjectTitle = trimSlash($_POST['AddSubjectTitle']);

        try {
            // check if Subject existed
            $sqlCheckSubject = "";
            $sqlCheckSubject .= "SELECT * FROM subjects
                WHERE subjects.subject_code = :subjectcode
                AND subjects.subject_title = :subjecttitle";  

            $stmtCheckSubject = $pdo->prepare($sqlCheckSubject);
            $stmtCheckSubject->execute(['subjectcode' => $AddSubjectCode, 'subjecttitle' => $AddSubjectTitle]); 
            $rowCheckSubject = $stmtCheckSubject->fetch();

            if ($rowCheckSubject) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> Subject already existed! </li>"]);
                exit();
            } else {
                // INSERT Course DATA
                $sqlAddSubject = "INSERT INTO subjects (subject_code, subject_title) 
                    VALUES (?,?)";
                $stmtAddSubject= $pdo->prepare($sqlAddSubject);
                $stmtAddSubject->execute([$AddSubjectCode, $AddSubjectTitle]);
                
                // INSERT SYSTEM LOG
                $logAction = $s_position ." ". $s_fullname . " added a new subject.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success', 'message' => '<li> New Subject added! </li>']);
                exit();
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    } // END OF ADD Subject

    // GET SINGLE Subject DATA
    if(isset($_REQUEST['GetEditSubjectBtn'])){
        $getSubject_id = $_REQUEST['GetEditSubjectBtn'];

        $sqlGetSubject = "";
        $sqlGetSubject .= "SELECT * FROM subjects
            WHERE subjects.subject_id = :cid LIMIT 1";

        $stmtGetSubject = $pdo->prepare($sqlGetSubject);
        $stmtGetSubject->execute(['cid' => $getSubject_id]); 
        $rowGetSubject = $stmtGetSubject->fetch();

        $ssubject_id = $rowGetSubject['subject_id'];
        $ssubject_code = $rowGetSubject['subject_code'];
        $ssubject_title = $rowGetSubject['subject_title'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-editSubject.php');
        exit();
    }// END OF GET SINGLE Course DATA

    // EDIT Subject
    if(isset($_POST['action']) && $_POST['action'] == 'EditSubject') {
        // dd($_POST);
        $subject_id = trimSlash($_POST['EditSubjectId']);
        $subject_code = trimSlash($_POST['EditSubjectCode']);
        $subject_title = trimSlash($_POST['EditSubjectTitle']);

        try {
            $sqlEditSubject = "UPDATE subjects SET subject_code=?, subject_title=?
                WHERE subject_id=?";
            $stmtEditSubject = $pdo->prepare($sqlEditSubject);
            $stmtEditSubject->execute([$subject_code, $subject_title, $subject_id]);
            
            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " edited a subject record!";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            echo json_encode(['status' => 'success', 'message' => "<li> A subject record has been updated! </li>"]);
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }  
    }
    




    
?>
