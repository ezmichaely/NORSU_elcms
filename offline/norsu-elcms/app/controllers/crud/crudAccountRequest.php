<?php 
    include_once('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    // FETCH ALL STUDENTS
    if (isset($_POST['fetchAllStudentRequest'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cr.*, cl.*
            FROM accounts AS a
            INNER JOIN users AS u ON u.account_unique = a.account_unique
            INNER JOIN courses AS cr ON cr.course_id = u.course_id
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            WHERE a.account_type = '2' AND a.account_request = '0'
            ORDER BY college_acronym ASC, course_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $crname = $row['course_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$crname.'</td>
                        <td>'.$fullname.'</td>
                        <td>
                            <button type="button" id="GetViewLoadslip" class="btn btn-primary btn-sm" data-id="'.$aid.'"
                                data-bs-toggle="modal" data-bs-target="#ViewLoadslipModal">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>

                            <button type="button" id="GetAcceptAccount" class="btn btn-success btn-sm my-1"
                                data-bs-toggle="modal" data-bs-target="#AcceptAccountModal" data-id="'.$aid.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetSendMessage" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#SendMessageModal" data-id="'.$aid.'">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL STUDENTS

    // GET STUDENT LOADSLIP
    if(isset($_POST['GetViewLoadslipBtn'])){
        $aid = $_POST['GetViewLoadslipBtn'];
        $sql = "SELECT * FROM loadslips as ld
            INNER JOIN schoolyear AS sy ON sy.schoolyear_id = ld.schoolyear_id
            INNER JOIN semesters AS sem ON sem.semester_id = ld.semester_id
            WHERE ld.account_unique = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$aid]); 
        $row = $stmt->fetch();

        $sy = $row['schoolyear_name'];
        $sem = $row['semester_name'];
        $ldpath = $row['loadslip_path'];
        $ldname = $row['loadslip_name'];
        $loadslip = BASE_URL.$ldpath.$ldname;
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-viewLoadslip.php');
    }// END OF GET STUDENT LOADSLIP


    // FETCH ALL INSTRUCTORS
    if (isset($_POST['fetchAllInstructorRequest'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, dp.*, cl.*
            FROM accounts AS a
            INNER JOIN users AS u ON u.account_unique = a.account_unique
            INNER JOIN departments AS dp ON dp.department_id = u.department_id
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            WHERE a.account_type = '3' AND a.account_request = '0'
            ORDER BY college_acronym ASC, department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $dlname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$dlname.'</td>
                        <td>'.$fullname.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>

                            <button type="button" id="GetAcceptAccount" class="btn btn-success btn-sm my-1"
                                data-bs-toggle="modal" data-bs-target="#AcceptAccountModal" data-id="'.$aid.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetSendMessage" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#SendMessageModal" data-id="'.$aid.'">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL INSTRUCTORS

    // FETCH ALL DEPTHEAD
    if (isset($_POST['fetchAllDeptHeadRequest'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, dp.*, cl.*
            FROM accounts AS a
            INNER JOIN users AS u ON u.account_unique = a.account_unique
            INNER JOIN departments AS dp ON dp.department_id = u.department_id
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            WHERE a.account_type = '4' AND a.account_request = '0'
            ORDER BY college_acronym ASC, department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $dlname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$dlname.'</td>
                        <td>'.$fullname.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>

                            <button type="button" id="GetAcceptAccount" class="btn btn-success btn-sm my-1"
                                data-bs-toggle="modal" data-bs-target="#AcceptAccountModal" data-id="'.$aid.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetSendMessage" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#SendMessageModal" data-id="'.$aid.'">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL DEPTHEAD


    // FETCH ALL DEPTHEAD
    if (isset($_POST['fetchAllDeanRequest'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cl.*
            FROM accounts AS a
            INNER JOIN users AS u ON u.account_unique = a.account_unique
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            WHERE a.account_type = '5' AND a.account_request = '0'
            ORDER BY college_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$fullname.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>

                            <button type="button" id="GetAcceptAccount" class="btn btn-success btn-sm my-1"
                                data-bs-toggle="modal" data-bs-target="#AcceptAccountModal" data-id="'.$aid.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetSendMessage" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#SendMessageModal" data-id="'.$aid.'">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </button>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL DEPTHEAD


    // GET ACCEPT ACCOUNT
    if(isset($_POST['GetAcceptAccountBtn'])){
        $aid = $_POST['GetAcceptAccountBtn'];
        // $sql = "SELECT * FROM accounts as a
        //     WHERE a.account_unique = ? LIMIT 1";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute([$aid]); 
        // $row = $stmt->fetch();

        // $sy = $row['schoolyear_name'];
        // $sem = $row['semester_name'];
        // $ldpath = $row['loadslip_path'];
        // $ldname = $row['loadslip_name'];
        // $loadslip = BASE_URL.$ldpath.$ldname;
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-acceptAccount.php');
    }// END OF GET STUDENT LOADSLIP


    // GET SEND MESSAGE
    if(isset($_POST['GetSendMessageBtn'])){
        $aid = $_POST['GetSendMessageBtn'];
        $sql = "SELECT * FROM accounts as a
            WHERE a.account_unique = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$aid]); 
        $row = $stmt->fetch();

        $aid = $row['account_unique'];
        $aun = $row['account_username'];
        $afn = $row['account_firstname']; 
        $amn = $row['account_middlename'];
        $aln = $row['account_lastname']; 
        $asn = $row['account_suffixname'];
        $fullname = getFullName($afn, $amn, $aln, $asn);
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-sendMessage.php');
    }// END OF GET SEND MESSAGE


    // ACCEPT ACCOUNT
    if(isset($_POST['AcceptAccount'])) {
        $aid = trimSlash($_POST['AcceptAccountID']);

        try {
            $sqlCheck = 'SELECT * FROM accounts WHERE account_unique = ? LIMIT 1';
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$aid]);
            $rowCount =  $stmtCheck->rowCount();
            if($rowCount > 0) {
                while($rowCheck =  $stmtCheck->fetch()) {
                    $aid = $rowCheck['account_unique'];
                    $aun = $rowCheck['account_username'];
                    $afn = $rowCheck['account_firstname']; 
                    $amn = $rowCheck['account_middlename'];
                    $aln = $rowCheck['account_lastname']; 
                    $asn = $rowCheck['account_suffixname'];
                    $fullname = getFullName($afn, $amn, $aln, $asn);
                }

                $sql = 'UPDATE accounts SET account_request = ? WHERE account_unique = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['1', $aid]);

                $logAction = $s_position ." ". $s_fullname . " accepted ".$fullname."'s account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success']);
                exit();
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // ACCEPT all students ACCOUNT
    if(isset($_POST['AcceptAllStudents'])) {
        // dd($_POST);
        $atype = trimSlash($_POST['AcceptAllStudentsType']);

        try {
            $sqlCheck = 'SELECT * FROM accounts WHERE account_request = ? AND account_type = ? LIMIT 1';
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute(['0', $atype]);
            $rowCount =  $stmtCheck->rowCount();
            if($rowCount > 0) {
                $sql = 'UPDATE accounts SET account_request = ? WHERE account_type = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['1', $atype]);

                $logAction = $s_position ." ". $s_fullname . " accepted all the students account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success']);
                exit();
            } else {
                // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // ACCEPT all instructors ACCOUNT
    if(isset($_POST['AcceptAllInstructors'])) {
        // dd($_POST);
        $atype = trimSlash($_POST['AcceptAllInstructorsType']);

        try {
            $sqlCheck = 'SELECT * FROM accounts WHERE account_request = ? AND account_type = ? LIMIT 1';
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute(['0', $atype]);
            $rowCount =  $stmtCheck->rowCount();
            if($rowCount > 0) {
                $sql = 'UPDATE accounts SET account_request = ? WHERE account_type = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['1', $atype]);

                $logAction = $s_position ." ". $s_fullname . " accepted all the Instructors account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success']);
                exit();
            } else {
                // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // ACCEPT all DeptHead ACCOUNT
    if(isset($_POST['AcceptAllDeptHead'])) {
        // dd($_POST);
        $atype = trimSlash($_POST['AcceptAllDeptHeadType']);

        try {
            $sqlCheck = 'SELECT * FROM accounts WHERE account_request = ? AND account_type = ? LIMIT 1';
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute(['0', $atype]);
            $rowCount =  $stmtCheck->rowCount();
            if($rowCount > 0) {
                $sql = 'UPDATE accounts SET account_request = ? WHERE account_type = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['1', $atype]);

                $logAction = $s_position ." ". $s_fullname . " accepted all the DeptHead account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success']);
                exit();
            } else {
                // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // ACCEPT all Dean ACCOUNT
    if(isset($_POST['AcceptAllDean'])) {
        // dd($_POST);
        $atype = trimSlash($_POST['AcceptAllDeanType']);

        try {
            $sqlCheck = 'SELECT * FROM accounts WHERE account_request = ? AND account_type = ? LIMIT 1';
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute(['0', $atype]);
            $rowCount =  $stmtCheck->rowCount();
            if($rowCount > 0) {
                $sql = 'UPDATE accounts SET account_request = ? WHERE account_type = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['1', $atype]);

                $logAction = $s_position ." ". $s_fullname . " accepted all the Dean account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);

                echo json_encode(['status' => 'success']);
                exit();
            } else {
                // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // send a message
    if(isset($_POST['SendMessage'])) {
        $receiver = trimSlash($_POST['SendMessageReceiver']);
        $sender = trimSlash($_POST['SendMessageSender']); 
        $fullname = trimSlash($_POST['SendMessageFullname']); 
        $message_content = trimSlash($_POST['SendMessageContent']); 

        try {
            // AKO
            $sqlSender = "SELECT * FROM contacts WHERE contact_sender = ? AND contact_receiver = ?  ";
            $stmtSender = $pdo->prepare($sqlSender);
            $stmtSender->execute([$sender, $receiver]);   // from sender to receiver
            $rowSender = $stmtSender->rowCount();

            // SIYA
            $sqlReceiver = "SELECT * FROM contacts WHERE contact_sender = ? AND contact_receiver = ?";
            $stmtReceiver = $pdo->prepare($sqlReceiver);
            $stmtReceiver->execute([$receiver, $sender]);  // from receiver to sender
            $rowReceiver = $stmtReceiver->rowCount();

            // AKO
            if($rowSender == '0') {
                $contact_mnum = 0;
                $contact_status = 0;
                $time = time();
                $sqlSend = "INSERT INTO contacts 
                    (contact_sender, contact_receiver, contact_mnum, contact_status, contact_datetime)
                    VALUES (?, ?, ?, ?, ?)";
                $stmtSend = $pdo->prepare($sqlSend);
                $stmtSend->execute([$sender, $receiver, $contact_mnum, $contact_status, $time]);
            }

            // SIYA
            if($rowReceiver == '0') {
                $contact_mnum = 1;
                $contact_status = 1;
                $time = time();
                $sqlReceive = "INSERT INTO contacts 
                    (contact_sender, contact_receiver, contact_mnum, contact_status, contact_datetime)
                    VALUES (?, ?, ?, ?, ?)";
                $stmtReceive = $pdo->prepare($sqlReceive);
                $stmtReceive->execute([$receiver, $sender, $contact_mnum, $contact_status, $time]);
            } else {
                $rowReceiver = $stmtReceiver->fetch();
                $contact_mnum = $rowReceiver['contact_mnum']+1;
                $contact_status = 1;
                $time = time();
                
                $sqlUp = "UPDATE contacts 
                    SET contact_mnum = ?, contact_status = ?, contact_datetime = ? 
                    WHERE contact_sender = ? AND contact_receiver = ?";
                $stmtUp = $pdo->prepare($sqlUp);
                $stmtUp->execute([$contact_mnum, $contact_status, $time, $receiver, $sender]);
            }

            $message_status = 1;
            $sql = "INSERT INTO messages 
                (message_sender, message_receiver, message_content, message_status)
                VALUE (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$sender, $receiver, $message_content, $message_status]);

            $time = time();

            //update my timedate contact
            $sqlUp = "UPDATE contacts 
                SET contact_datetime = ? 
                WHERE contact_sender = ? AND contact_receiver = ?";
            $stmtUp = $pdo->prepare($sqlUp);
            $stmtUp->execute([$time, $sender, $receiver]);

            // INSERT SYSTEM LOG         
            $logAction = $s_position ." ". $s_fullname . " sent a message to " . $fullname;
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success' , 'message' => '<li>Message Sent</li>']);
            exit();

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }




    }

?>
