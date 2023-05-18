<?php 
    // CREATE MODULE
    if(isset($_POST['CreateModuleButton'])) {
        $subject = trimSlash($_POST['CreateModuleSubjectCode']);
        // $prerequisite = trimSlash($_POST['CreateModulePreRequisites']); 
        $consent = trimSlash($_POST['CreateModuleConsent']); 
        $title = trimSlash($_POST['CreateModuleTitle']); 
        $intro = trimSlash($_POST['CreateModuleIntro']); 
        $outcome = $_POST['CreateModuleOutcome'];
        $mcode = md5(time().generateRandomString());
        $mwatermark = generateRandomString();
        $status = 'To be Publish';
        // dd($code);
        try {
            $sql = "SELECT * FROM subjects WHERE subject_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$subject]);
            $row = $stmt->fetch();
            $scode = $row['subject_code'];
            $stitle = $row['subject_title'];

            $sqlCheck = "SELECT * FROM modules 
                WHERE subject_id = ? AND module_title = ? AND module_author = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$subject, $title, $s_aid]);
            $rowCheck = $stmtCheck->rowCount();
            if ($rowCheck > 0) {
                $_SESSION['error'] = 'You have already created this module.';
                $_SESSION['subject'] = $subject;
                $_SESSION['subjectcode'] = $scode;
                $_SESSION['subjecttitle'] = $stitle;
                // $_SESSION['preprequisite'] = $prerequisite;
                $_SESSION['consent'] = $consent;
                $_SESSION['title'] = $title;
                $_SESSION['intro'] = $intro;
                $_SESSION['outcome'] = $outcome;
                header('Location: ' .BASE_URL. '/'.$s_directory.'/module-new.php');
                exit();
            }
            else {
                $sqlCreateModule = "INSERT INTO modules 
                (module_code, module_watermark, subject_id, module_title, module_intro, 
                module_outcomes, module_author, module_copier, module_consent, module_status)
                VALUES (?,?,?,?,?,?,?,?,?,?)";

                $stmtCreateModule = $pdo->prepare($sqlCreateModule);
                $stmtCreateModule->execute([$mcode, $mwatermark, $subject, $title, $intro, $outcome, $s_aid, $s_aid, $consent, $status]);
                if($stmtCreateModule) {
                    // INSERT SYSTEM LOG         
                    $logAction = $s_position .' ' . $s_fullname . ' created a module entitled: "' . $title .'" in subject '. $scode .'.';
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    $_SESSION['msg'] = 'You have successfully created a module entitle: "' . $title .'" in subject '. $scode .'.';
                    header('Location: ' .BASE_URL. '/'.$s_directory.'/module-new.php');
                    exit();
                } 
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }

    // EDIT MODULE
    if(isset($_POST['EditModuleButton'])) {
        $mcode = trimSlash($_POST['EditModuleCode']);
        $author = trimSlash($_POST['EditModuleAuthor']);
        $authorname = trimSlash($_POST['EditModuleAuthorName']);
        $subject = trimSlash($_POST['EditModuleSubjectCode']);
        $consent = trimSlash($_POST['EditModuleConsent']); 
        $title = trimSlash($_POST['EditModuleTitle']); 
        $intro = trimSlash($_POST['EditModuleIntro']); 
        $outcome = $_POST['EditModuleOutcome'];
        
        $status = trimSlash($_POST['EditModuleStatus']);
        // dd($code);
        try {
            $sql = "SELECT * FROM subjects WHERE subject_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$subject]);
            $row = $stmt->fetch();
            $scode = $row['subject_code'];
            $stitle = $row['subject_title'];

            $sqlCheck = "SELECT * FROM modules 
                WHERE subject_id = ? AND module_title = ? AND module_copier = ? 
                AND module_consent = ? AND module_intro = ? AND module_outcomes = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$subject, $title, $s_aid, $consent, $intro, $outcome]);
            $rowCheck = $stmtCheck->rowCount();
            if ($rowCheck > 0) {
                $_SESSION['error'] = 'You have already edited this module.';
                $_SESSION['subject'] = $subject;
                $_SESSION['subjectcode'] = $scode;
                $_SESSION['subjecttitle'] = $stitle;
                $_SESSION['consent'] = $consent;
                $_SESSION['title'] = $title;
                $_SESSION['intro'] = $intro;
                $_SESSION['outcome'] = $outcome;
                header('Location: ' .BASE_URL. '/'.$s_directory.'/module-edit.php?mcode='.$mcode);
                exit();
            }
            else {
                $sqlEditModule = "UPDATE modules SET subject_id = ?, module_title = ?, module_intro = ?,  
                    module_outcomes = ?, module_author = ?, module_copier = ?, module_consent = ?, module_status = ? 
                    WHERE module_code = ?";
                $stmtEditModule = $pdo->prepare($sqlEditModule);
                $stmtEditModule->execute([$subject, $title, $intro, $outcome, $author, $s_aid, $consent, $status, $mcode]);
                if($stmtEditModule) {
                    // INSERT SYSTEM LOG         
                    $logAction = $s_position .' ' . $s_fullname . ' edited a module entitled: "' . $title .'" in subject '. $scode .' authored by: '.$authorname. '.';
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    $_SESSION['msg'] = 'You have successfully edited a module entitle: "' . $title .'" in subject '. $scode .'. You may now close this tab.';
                    header('Location: ' .BASE_URL. '/'.$s_directory.'/module-edit.php?mcode='.$mcode);
                    exit();
                } 
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }

    // PUBLISH MODULE
    if(isset($_POST['PublishModuleButton'])) {
        $scode = trimSlash($_POST['PublishModuleSubjectCode']);
        $stitle = trimSlash($_POST['PublishModuleSubjectTitle']); 
        $mcode = trimSlash($_POST['PublishModuleCode']);
        $mtitle = trimSlash($_POST['PublishModuleTitle']); 
        $status = trimSlash($_POST['PublishModuleStatus']); 
        $pos = "";
        $mstatus = '';
        if ($s_aat == '4') {
            $mstatus .= 'Dean: For Approval';
            $pos .= "Dean's";
        } 
        if ($s_aat == '3') {
            if($status == 'Dept Head: For Revision') { 
                // dd($_POST);
                $mstatus .= 'Dept Head: For Approval';
                $pos .= "Dept Head's";
            } elseif($status == 'Dean: For Revision') {
                $mstatus .= 'Dean: For Approval';
                $pos .= "Dean's";
            } 
        }

        try {
            $sqlPublish = "UPDATE modules SET module_status = ? WHERE module_code = ? ";
            $stmtPublish = $pdo->prepare($sqlPublish);
            $stmtPublish->execute([$mstatus, $mcode]);
            
            // INSERT SYSTEM LOG         
            $logAction = $s_position .' ' . $s_fullname . ' submitted '.$s_genderadj. ' module entitled: "' . $mtitle .'" in subject '. $scode . ' for ' .$pos. ' approval.' ;
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            header('Location: ' .BASE_URL. '/'.$s_directory.'/module-class.php');
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message ;
            exit();
        }  

    }

    // CREATE OUTLINE
    if(isset($_POST['CreateOutlineButton'])) {
        // dd($_POST);
        $mtitle = trimSlash($_POST['CreateOutlineModuleTitle']);
        $mcode = trimSlash($_POST['CreateOutlineModuleCode']);
        $title = trimSlash($_POST['CreateOutlineTitle']); 
        $objectives = $_POST['CreateOutlineObjectives']; 
        $content = $_POST['CreateOutlineContent'];
        $code = generateRandomString().time();

        try {
            $sqlCheck = "SELECT * FROM outlines 
                WHERE module_code = ? AND outline_title = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$mcode, $title]);
            
            $rowCheck = $stmtCheck->rowCount();
            
            if ($rowCheck > 0) {
                $_SESSION['error'] = 'You have already created this outline.';
                $_SESSION['title'] = $title;
                $_SESSION['obj'] = $objectives;
                $_SESSION['content'] = $content;
                exit();
            } else {
                $sqlOutlineNum = "SELECT outline_number FROM outlines WHERE module_code = ? ORDER BY outline_number DESC LIMIT 1";
                $stmtOutlineNum = $pdo->prepare($sqlOutlineNum);
                $stmtOutlineNum->execute([$mcode]);

                $outnumber = "";
                if($stmtOutlineNum->rowCount() > 0 ) {
                    $rowOutlineNum = $stmtOutlineNum->fetch();
                    $outnum = $rowOutlineNum['outline_number'];
                    $outnumber .= $outnum + 1;
                } else {
                    $outnumber .= 1;
                }
                
                // dd($outnumber);
                $sqlCreateOutline = "INSERT INTO outlines
                    (outline_code, module_code, outline_number, outline_title, outline_objective, outline_content)
                    VALUES (?,?,?,?,?,?)";
                $stmtCreateOutline = $pdo->prepare($sqlCreateOutline);
                $stmtCreateOutline->execute([$code, $mcode, $outnumber, $title, $objectives, $content]);
                
                if($stmtCreateOutline) {
                    // INSERT SYSTEM LOG         
                    $logAction = $s_position .' ' . $s_fullname . ' created an outline entitled: "' .$title.'" in '.$s_genderadj.' module entitled: "'.$mtitle.'".';
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    $_SESSION['msg'] = 'You have successfully created an outline entitled: "' . $title .'" in your module entitled: "'.$mtitle.'".';
                    // dd($mcode);

                    // dd($mcode);
                    header('Location: ' .BASE_URL. '/'.$s_directory.'/module_outline-new.php?mcode='.$mcode);
                    exit();
                } 
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }

    // EDIT OUTLINE
    if(isset($_POST['EditOutlineButton'])) {
        $mcode = trimSlash($_POST['EditModuleCode']); 
        $author = trimSlash($_POST['EditModuleAuthor']); 
        $authorname = trimSlash($_POST['EditModuleAuthorName']); 
        $mtitle = trimSlash($_POST['EditModuleTitle']); 
        $ocode = trimSlash($_POST['EditOutlineCode']); 
        $otitle = trimSlash($_POST['EditOutlineTitle']); 
        $oobj = $_POST['EditOutlineObjectives']; 
        $ocontent = $_POST['EditOutlineContent']; 

        try {
            $sqlCheck = "SELECT * FROM outlines 
                WHERE module_code = ? AND outline_code = ? 
                AND outline_title = ? AND outline_objective = ? AND outline_content = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$mcode, $ocode, $otitle, $oobj, $ocontent]);
            
            $rowCheck = $stmtCheck->rowCount();
            
            if ($rowCheck > 0) {
                $_SESSION['error'] = 'You have no changes in your outline.';
                $_SESSION['title'] = $otitle;
                $_SESSION['obj'] = $oobj;
                $_SESSION['content'] = $ocontent;
                header('Location: ' .BASE_URL. '/'.$s_directory.'/module_outline-edit.php?mcode='.$mcode.'&ocode='.$ocode);
                exit();
            } else {
                $sqlEditOutline = "UPDATE outlines SET outline_title = ?, outline_objective = ?, outline_content = ?
                    WHERE outline_code = ?";
                $stmtEditOutline = $pdo->prepare($sqlEditOutline);
                $stmtEditOutline->execute([$otitle, $oobj, $ocontent, $ocode]);
                
                if($stmtEditOutline) {
                    // INSERT SYSTEM LOG         
                    $logAction = $s_position .' ' . $s_fullname . ' edited an outline entitled: "' .$otitle.'" in '.$s_genderadj.' module entitled: "'.$mtitle.'".';
                    $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);
                    
                    $_SESSION['msg'] = 'You have successfully edited an outline entitled: "' . $otitle .'" in your module entitled: "'.$mtitle.'". You may now close this tab.';
                    header('Location: ' .BASE_URL. '/'.$s_directory.'/module_outline-edit.php?mcode='.$mcode.'&ocode='.$ocode);
                    exit();
                } 
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }

    // COPY MODULE
    if(isset($_POST['CopyModuleButton'])) {
        include('../../../path.php');
        include_once(ROOT_PATH . '/app/config/dbConPDO.php');
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        // dd($_POST);
        $mauthor = trimSlash($_POST['CopyModuleAuthor']);
        $mcode = trimSlash($_POST['CopyModuleCode']);

        // exit();
        try {
            $sqlCheck = "SELECT * FROM modules WHERE module_code = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$mcode]);
            $rowCheck = $stmtCheck->fetch();
            
            $rmcode = $rowCheck['module_code'];
            $rmwater = $rowCheck['module_watermark'];
            $rsid = $rowCheck['subject_id']; 
            $rmtitle = $rowCheck['module_title']; 
            $rmintro = $rowCheck['module_intro']; 
            $rmoutcome = $rowCheck['module_outcomes'];
            $rmauthor = $rowCheck['module_author']; 
            $rmcopier = $rowCheck['module_copier']; 
            $rmconsent = $rowCheck['module_consent'];
            $rmstatus = $rowCheck['module_status']; 

            $mcode_n = md5(time().generateRandomString());

            $sqlInsertModule = "INSERT INTO modules 
                (module_code, module_watermark, subject_id, module_title, module_intro, 
                module_outcomes, module_author, module_copier, module_consent, module_status)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmtInsertModule = $pdo->prepare($sqlInsertModule);
            $stmtInsertModule->execute([$mcode_n, $rmwater, $rsid, $rmtitle, $rmintro, $rmoutcome, $rmauthor, $s_aid, $rmconsent, $rmstatus]);

            $sqlCheck = "SELECT * FROM outlines WHERE module_code = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$mcode]);

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

            // INSERT SYSTEM LOG         
            $logAction = $s_position .' ' . $s_fullname . ' copied the module of '.$mauthor.'entitled: "' .$rmtitle.'".';
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            
            $_SESSION['msg'] = 'You have successfully copied the module of '.$mauthor.' entitled: "' .$rmtitle.'".';

            header('Location: ' .BASE_URL. '/'.$s_directory.'/module-learning.php');
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  

    }
    
    // GET APPROVE MODULE DATA
    if(isset($_POST['GetApproveModuleBtn'])){
        include('../../../path.php');
        include_once(ROOT_PATH . '/app/config/dbConPDO.php');
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
        
        $mcode = $_POST['GetApproveModuleBtn'];
        // dd($_POST);
        $sql = "SELECT * FROM modules 
         INNER JOIN subjects ON modules.subject_id = subjects.subject_id
         WHERE module_code = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mcode]); 
        $row = $stmt->fetch();

        $fmcode = $row['module_code'];
        $fmstatus = $row['module_status'];
        $fmtitle = $row['module_title'];
        $fmsubject = $row['subject_code'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-approveModule.php');
    }// END OF GET APPROVE MODULE DATA


    // APPROVE MODULE DATA
    if(isset($_POST['ApproveModule'])){
        include('../../../path.php');
        include_once(ROOT_PATH . '/app/config/dbConPDO.php');
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
        
        // dd($_POST);
        try {
            $mcode = $_POST['ApproveModuleCode']; 
            $mstatus = $_POST['ApproveModuleStatus'];
            $mtitle = $_POST['ApproveModuleTitle'];
            $msubject = $_POST['ApproveModuleSubject'];

            $logAction = "";
            $status = '';
            $msg = '';

            if ($s_aat == '4') {
                $status .= 'Dean: For Approval';
                $pos = "Dean's";
                $logAction .= $s_position .' ' . $s_fullname . ' endorsed a module entitled: "' . $mtitle .'" in subject '. $msubject . ' for ' .$pos. ' approval.' ;
                $msg .= 'You have endorsed this module for '.$pos.' approval.';
            } elseif ($s_aat == '5') {
                $status .= 'Published';
                $logAction .= $s_position .' ' . $s_fullname . ' approved a module entitled: "' . $mtitle .'" in subject '. $msubject . ' to be published.' ;
                $msg .= 'You have approved this module to be published.';
            }

                $sqlPublish = "UPDATE modules SET module_status = ? WHERE module_code = ? ";
                $stmtPublish = $pdo->prepare($sqlPublish);
                $stmtPublish->execute([$status, $mcode]);
                
                // INSERT SYSTEM LOG     
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success', 'message' => $msg]);
                exit();
            
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }// END OF GET APPROVE MODULE DATA


    // GET APPROVE MODULE DATA
    if(isset($_POST['GetReviseModuleBtn'])){
        include('../../../path.php');
        include_once(ROOT_PATH . '/app/config/dbConPDO.php');
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
        
        // dd($_POST);
        $mcode = $_POST['GetReviseModuleBtn'];
        $sql = "SELECT * FROM modules 
         INNER JOIN subjects ON modules.subject_id = subjects.subject_id
         WHERE module_code = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mcode]); 
        $row = $stmt->fetch();

        $fmcode = $row['module_code'];
        $fmstatus = $row['module_status'];
        $fmtitle = $row['module_title'];
        $fmsubject = $row['subject_code'];
        $fmauthor = $row['module_copier'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-reviseModule.php');
    }// END OF GET Revise MODULE DATA


    // Revise MODULE DATA
    if(isset($_POST['ReviseModule'])){
        include('../../../path.php');
        include_once(ROOT_PATH . '/app/config/dbConPDO.php');
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
        
        // dd($_POST);
        try {
            $mcode = $_POST['ReviseModuleCode']; 
            $mstatus = $_POST['ReviseModuleStatus'];
            $mtitle = $_POST['ReviseModuleTitle'];
            $msubject = $_POST['ReviseModuleSubject'];
            $mauthor = $_POST['ReviseModuleAuthor'];
            $mremarks = $_POST['ReviseModuleMessage'];

            $status = '';

            if ($s_aat == '4') {
                $status .= 'Dept Head: For Revision';
                
            } elseif ($s_aat == '5') {
                $status .= 'Dean: For Revision';
            }

            $sqlPublish = "UPDATE modules SET module_status = ? WHERE module_code = ? ";
            $stmtPublish = $pdo->prepare($sqlPublish);
            $stmtPublish->execute([$status, $mcode]);

            // SEND MESSAGE REMARKS
            // AKO
            $sqlSender = "SELECT * FROM contacts WHERE contact_sender = ? AND contact_receiver = ?  ";
            $stmtSender = $pdo->prepare($sqlSender);
            $stmtSender->execute([$s_aid, $mauthor]);   // from sender to receiver
            $rowSender = $stmtSender->rowCount();
            // SIYA
            $sqlReceiver = "SELECT * FROM contacts WHERE contact_sender = ? AND contact_receiver = ?";
            $stmtReceiver = $pdo->prepare($sqlReceiver);
            $stmtReceiver->execute([$mauthor, $s_aid]);  // from receiver to sender
            $rowReceiver = $stmtReceiver->rowCount();

            // AKO
            if($rowSender < 0) {
                $contact_mnum = 0;
                $contact_status = 0;
                $time = time();
                $sqlSend = "INSERT INTO contacts 
                    (contact_sender, contact_receiver, contact_mnum, contact_status, contact_datetime)
                    VALUES (?, ?, ?, ?, ?)";
                $stmtSend = $pdo->prepare($sqlSend);
                $stmtSend->execute([$s_aid, $mauthor, $contact_mnum, $contact_status, $time]);
                
            }

            // SIYA
            if($rowReceiver < 0) {
                $contact_mnum = 1;
                $contact_status = 1;
                $time = time();
                $sqlReceive = "INSERT INTO contacts 
                    (contact_sender, contact_receiver, contact_mnum, contact_status, contact_datetime)
                    VALUES (?, ?, ?, ?, ?)";
                $stmtReceive = $pdo->prepare($sqlReceive);
                $stmtReceive->execute([$mauthor, $s_aid, $contact_mnum, $contact_status, $time]);
            } elseif ($rowReceiver > 0) {
                $rowReceiver = $stmtReceiver->fetch();
                $contact_mnum = $rowReceiver['contact_mnum']+1;
                $contact_status = 1;
                $time = time();
                
                $sqlUp = "UPDATE contacts 
                    SET contact_mnum = ?, contact_status = ?, contact_datetime = ? 
                    WHERE contact_sender = ? AND contact_receiver = ?";
                $stmtUp = $pdo->prepare($sqlUp);
                $stmtUp->execute([$contact_mnum, $contact_status, $time, $mauthor, $s_aid]);
            }

            $message_content0 = '<h6 class="fst-italic">MODULE: '.$msubject.' - '.$mtitle.'</h6><p class="fw-bold text-uppercase">REMARKS: ';
            $message_content = $message_content0. '<span> '.$mremarks.'</span></p>';
            $message_status = 1;
            $sql = "INSERT INTO messages 
                (message_sender, message_receiver, message_content, message_status)
                VALUE (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$s_aid, $mauthor, $message_content, $message_status]);

            $time = time();
            //update my timedate contact
            $sqlUp = "UPDATE contacts 
                SET contact_datetime = ? 
                WHERE contact_sender = ? AND contact_receiver = ?";
            $stmtUp = $pdo->prepare($sqlUp);
            $stmtUp->execute([$time, $s_aid, $mauthor]);

            $sqlReceiverData = "SELECT * FROM accounts WHERE account_unique = ?";
            $stmtReceiverData = $pdo->prepare($sqlReceiverData);
            $stmtReceiverData->execute([$mauthor]);
            $rowReceiverData = $stmtReceiverData->fetch();

            $rafn = $rowReceiverData['account_firstname'];
            $ramn = $rowReceiverData['account_middlename'];
            $raln = $rowReceiverData['account_lastname'];
            $rasn = $rowReceiverData['account_suffixname'];
            $raat = $rowReceiverData['account_type'];

            $fullname = getFullName($rafn, $ramn, $raln, $rasn);
            $position = getPosition($raat);

        
            // INSERT SYSTEM LOG   
            $logAction = $s_position .' ' . $s_fullname . ' returned a module entitled: "' . $mtitle .'" in subject '. $msubject . ' to be revise.' ;  
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            // INSERT SYSTEM LOG         
            $logAction = $s_position ." ". $s_fullname . " sent a module remarks to" . $position ." ". $fullname;
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $msg = 'You have returned this module for revision.';

            echo json_encode(['status' => 'success', 'message' => $msg]);
            exit();
            
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }// END OF GET Revise MODULE DATA


    
?>
