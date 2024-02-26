<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    // CREATE CLASS
    if(isset($_POST['CreateClass'])) {
        $teacher = trimSlash($_POST['CreateClassTeacher']); 
        $subject = trimSlash($_POST['CreateClassSubjectCode']); 
        $schoolyear = trimSlash($_POST['CreateClassSchoolyear']); 
        $semester = trimSlash($_POST['CreateClassSemester']); 
        $day = trimSlash($_POST['CreateClassDay']); 
        $time = trimSlash($_POST['CreateClassTime']);
        $section = trimSlash($_POST['CreateClassSection']); 
        $module = trimSlash($_POST['CreateClassModule']); 
        $code = generateRandomString();

        try {
            // check if class existed
            $sqlCheck = "SELECT * FROM classes
                WHERE class_teacher = ? AND class_subject = ? AND class_schoolyear = ? AND class_semester = ?
                AND class_day = ? AND class_time = ? AND class_section = ? AND class_module = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$teacher, $subject, $schoolyear, $semester, $day, $time, $section, $module]); 
            // $rowCheck = $stmtCheck->fetch();
            
            if ($stmtCheck->rowCount() > 0) {
                echo json_encode(['status' => 'error', 'errAll' => "<li> You already made this class! </li>"]);
                exit();
            } else {
                // INSERT COLLEGE DATA
                $sql = "INSERT INTO classes
                    (class_code, class_module, class_subject, class_schoolyear, class_semester,
                    class_day, class_time, class_section, class_teacher)
                    VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$code, $module, $subject, $schoolyear, $semester, $day, $time, $section, $teacher]); 
                // dd($_POST);
                // INSERT SYSTEM LOG         
                $logAction = $s_position ." ". $s_fullname . " created a new class.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success', 'message' => '<li> Your class has been created! </li>']);
                exit();
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        } // END OF ADD COLLEGE

    } // END OF CREATE CLASS
    

    // JOIN CLASS
    if(isset($_POST['JoinClass'])) {
        $ccode = trimSlash($_POST['JoinClassCode']); 
        try {
            // check if class existed
            $sqlCheck = "SELECT * FROM classes
                WHERE class_code = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$ccode]); 

            if ($stmtCheck->rowCount() > 0) {
                // check if you are in this class
                $sqlCheck = "SELECT * FROM classmembers
                    WHERE class_code = ? AND class_student = ?";
                $stmtCheck = $pdo->prepare($sqlCheck);
                $stmtCheck->execute([$ccode, $s_aid]); 
                
                if ($stmtCheck->rowCount() > 0) {
                    echo json_encode(['status' => 'error', 'errAll' => "<li> You already in this class! </li>"]);
                    exit();
                } else {
                    // INSERT MEMBER CLASS DATA
                    $sql = "INSERT INTO classmembers
                        (class_code, class_student)
                        VALUES (?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$ccode, $s_aid]); 
                    // dd($_POST);

                    // INSERT SYSTEM LOG         
                    $logAction = $s_position ." ". $s_fullname . " joined a class.";
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);

                    echo json_encode(['status' => 'success', 'message' => '<li> Your have successfully joined the class! </li>']);
                    exit();
                }
            
            } else {
                echo json_encode(['status' => 'error', 'errAll' => "<li> This class does not exists! </li>"]);
                exit();
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        } // END OF JOIN CLASS

    }
    
    
    // GET EDIT CLASS DATA
    if(isset($_POST['GetEditClassBtn'])){
        try {
            $GetClassCode = $_POST['GetEditClassBtn'];
            $sqlGetClass = "SELECT * FROM classes 
                INNER JOIN modules ON modules.module_code = classes.class_module
                INNER JOIN subjects ON subjects.subject_id = classes.class_subject
                INNER JOIN schoolyear ON schoolyear.schoolyear_id = classes.class_schoolyear
                INNER JOIN semesters ON semesters.semester_id = classes.class_semester
                WHERE class_code = ? LIMIT 1";
            $stmtGetClass = $pdo->prepare($sqlGetClass);
            $stmtGetClass->execute([$GetClassCode]); 
            $rowGetClass = $stmtGetClass->fetch();
            
            // dd($rowGetClass);
            $ccode = $rowGetClass['class_code']; 
            $cmodule = $rowGetClass['class_module'];
            $mtitle = $rowGetClass['module_title'];
            $csubj = $rowGetClass['class_subject']; 
            $csy = $rowGetClass['class_schoolyear']; 
            $csem = $rowGetClass['class_semester']; 
            $cday = $rowGetClass['class_day']; 
            $ctime = $rowGetClass['class_time']; 
            $csec = $rowGetClass['class_section']; 
            $cteacher = $rowGetClass['class_teacher']; 
            $sid = $rowGetClass['subject_id']; 
            $scode = $rowGetClass['subject_code']; 
            $stitle = $rowGetClass['subject_title']; 
            $syid = $rowGetClass['schoolyear_id'];
            $syname = $rowGetClass['schoolyear_name']; 
            $semid = $rowGetClass['semester_id'];
            $semname = $rowGetClass['semester_name']; 

            if ($cday == 'MWF') {
                $cdayname = " (MWF) Moday, Wednesday, & Friday ";
            } elseif ($cday == 'TTH') {
                $cdayname = " (TTH) Tuesday & Thursday ";
            } elseif ($cday == 'SAT') {
                $cdayname = " (SAT) Saturday ";
            } elseif ($cday == 'SUN') {
                $cdayname = " (SUN) Sunday ";
            }
            // require this
            $subjects = $pdo->query("SELECT * FROM subjects ORDER BY subject_code")->fetchAll();
            $semester = $pdo->query("SELECT * FROM semesters")->fetchAll();
            $schoolyear = $pdo->query("SELECT * FROM schoolyear")->fetchAll();
            
            require(ROOT_PATH . '/app/includes/forms/form-editClass.php');
            exit();
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo $message ;
            exit();
        } 
    }// END OF GET SINGLE Course DATA

    // Edit CLASS
    if(isset($_POST['EditClass'])) {
        $ccode = $_POST['EditClassCode'];
        $cteacher = $_POST['EditClassTeacher'];
        $csub = $_POST['EditClassSubjectCode'];
        $csy = $_POST['EditClassSchoolyear'];
        $csem = $_POST['EditClassSemester'];
        $cday = $_POST['EditClassDay'];
        $ctime = $_POST['EditClassTime']; 
        $csec = $_POST['EditClassSection'];
        $cmodule = $_POST['EditClassModule'];
    
        try {
            $sqlEditClass = "UPDATE classes SET class_module=?, class_subject=?, class_semester=?,
                class_day=?, class_time=?, class_section=?, class_teacher=?
                WHERE class_code=?";
            $stmtEditClass = $pdo->prepare($sqlEditClass);
            $stmtEditClass->execute([$cmodule, $csub, $csem, $cday, $ctime, $csec, $cteacher, $ccode]);

            if($s_aid != $cteacher) {
                $sql = "SELECT * FROM accounts WHERE account_unique = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$cteacher]);
                $row = $stmt->fetch();
                $aafn = $row['account_firstname'];
                $aamn = $row['account_middlename'];
                $aaln = $row['account_lastname'];
                $aasn = $row['account_suffixname'];

                $teacher = getFullName($aafn, $aamn, $aaln, $aasn);

                $sqlGetData = "SELECT * FROM modules WHERE module_code = ?";
                $stmtGetData = $pdo->prepare($sqlGetData);
                $stmtGetData->execute([$cmodule]);
                $rowGetData = $stmtGetData->fetch();
                
                $rmcode = $rowGetData['module_code'];
                $rmwater = $rowGetData['module_watermark'];
                $rsid = $rowGetData['subject_id']; 
                $rmtitle = $rowGetData['module_title']; 
                $rmintro = $rowGetData['module_intro']; 
                $rmoutcome = $rowGetData['module_outcomes'];
                $rmauthor = $rowGetData['module_author']; 
                $rmcopier = $rowGetData['module_copier']; 
                $rmconsent = $rowGetData['module_consent'];
                $rmstatus = $rowGetData['module_status']; 

                $sqlCheck = "SELECT * FROM modules 
                    WHERE module_watermark = ? AND subject_id = ? AND module_copier = ?";
                $stmtCheck = $pdo->prepare($sqlCheck);
                $stmtCheck->execute([$rmwater, $rsid, $cteacher]);
                
                // dd($)
                if($stmtCheck->rowCount() > 0) {
                    $rowCheck = $stmtCheck->fetch();
                    // dd($rowCheck);
                    $mcode = $rowCheck['module_code'];

                    $sqlEditClass = "UPDATE classes SET class_module=? WHERE class_code=?";
                    $stmtEditClass = $pdo->prepare($sqlEditClass);
                    $stmtEditClass->execute([$mcode, $ccode]);

                    $logAction = $s_position ." ". $s_fullname . " transfered a class (code: ".$ccode.") to ".$teacher.".";
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    echo json_encode(['status' => 'success', 'message' => "<li> Your class has been transfered successfully! </li>"]);
                    exit();

                } else {
                    $mcode_n = md5(time().generateRandomString());

                    $sqlInsertModule = "INSERT INTO modules 
                        (module_code, module_watermark, subject_id, module_title, module_intro, 
                        module_outcomes, module_author, module_copier, module_consent, module_status)
                        VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $stmtInsertModule = $pdo->prepare($sqlInsertModule);
                    $stmtInsertModule->execute([$mcode_n, $rmwater, $rsid, $rmtitle, $rmintro, $rmoutcome, $rmauthor, $cteacher, $rmconsent, $rmstatus]);

                    $sqlCheck = "SELECT * FROM outlines WHERE module_code = ?";
                    $stmtCheck = $pdo->prepare($sqlCheck);
                    $stmtCheck->execute([$cmodule]);

                    while ($rowCheck = $stmtCheck->fetch()) {
                        $onum = $rowCheck['outline_number'];
                        $otitle = $rowCheck['outline_title'];
                        $oobj = $rowCheck['outline_objective'];
                        $ocontent = $rowCheck['outline_content'];
                        $ocode_n = generateRandomString().time();
                        
                        $sqlInsertOutline = "INSERT INTO outlines
                            (outline_code, module_code, outline_number, outline_title, outline_objective, outline_content)
                            VALUES (?,?,?,?,?,?)";
                        $stmtInsertOutline = $pdo->prepare($sqlInsertOutline);
                        $stmtInsertOutline->execute([$ocode_n, $mcode_n, $onum, $otitle, $oobj, $ocontent]);
                    }

                    $sqlEditClass = "UPDATE classes SET class_module=? WHERE class_code=?";
                    $stmtEditClass = $pdo->prepare($sqlEditClass);
                    $stmtEditClass->execute([$mcode_n, $ccode]);

                    $logAction = $s_position ." ". $s_fullname . " transfered a class (code: ".$ccode.") to ".$teacher.".";
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    echo json_encode(['status' => 'success', 'message' => "<li> Your class has been transfered successfully! </li>"]);
                    exit();
                }

                
            } else {
                 // INSERT SYSTEM LOG
                $logAction = $s_position ." ". $s_fullname . " edited a class.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);
                
                echo json_encode(['status' => 'success', 'message' => "<li> Your class has been successfully updated! </li>"]);
                exit();
            }
 
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }








    // get delete class data
    if(isset($_POST['GetDeleteClassBtn'])){
        try {
            $GetClassCode = $_POST['GetDeleteClassBtn'];
            $sqlGetClass = "SELECT * FROM classes WHERE class_code = ? LIMIT 1";
            $stmtGetClass = $pdo->prepare($sqlGetClass);
            $stmtGetClass->execute([$GetClassCode]); 
            $rowGetClass = $stmtGetClass->fetch();

            $ccode = $rowGetClass['class_code'];
            // require this
            require(ROOT_PATH . '/app/includes/forms/form-deleteClass.php');
            exit();
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo $message ;
            exit();
        } 
    }// END OF GET SINGLE Course DATA


    // DELETE CLASS
    if(isset($_POST['action']) && $_POST['action'] == 'DeleteClass') {
        $ccode = trimSlash($_POST['DeleteClassCode']);
        
        try {
            $sql = "DELETE FROM classes WHERE class_code = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$ccode]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " deleted a class.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $output = array(
                'status' => 'success'
            );
            echo json_encode($output);
            exit();

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }



?>
