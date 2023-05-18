<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    // dd($_POST);
    if(isset($_POST['GetThisMessage']) == 'GetThisMessage') {
        $sender = trimSlash($_POST['sender']);
        $receiver = trimSlash($_POST['receiver']);
        try {
            $sql = "SELECT * FROM messages
                    INNER JOIN accounts ON accounts.account_unique = messages.message_receiver
                    WHERE messages.message_sender = ? AND messages.message_receiver = ? 
                        || messages.message_receiver = ? AND  messages.message_sender = ? 
                    ORDER BY messages.message_datetime ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$sender, $receiver, $sender, $receiver]);   
            // $row = $stmt->fetch();

            $response = "";
            if($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    if($sender == $row['account_unique']){
                        $response .= '
                            <div class="mgread">
                                <div class="mgread-content">
                                    <div class="mgread-time fs-8">
                                        '.getDateTime($row['message_datetime']).'
                                    </div>
                                    <div class="mgread-mgs">
                                        '.$row['message_content'].'
                                    </div>

                                </div>
                            </div>';
                    } else {
                        $response .=
                            '<div class="mgsend">
                                <div class="mgsend-content">
                                    <div class="mgsend-time fs-8">
                                        '.getDateTime($row['message_datetime']).'
                                    </div>
                                    <div class="mgsend-mgs text-right">
                                        '.$row['message_content'].'
                                    </div>
                                </div>
                            </div>';
                    }
                }
                try {
                    $mnum = 0;
                    $status = 0;
                    $sql = "UPDATE contacts SET contact_mnum = ?, contact_status = ?
                        WHERE contact_sender = ? AND contact_receiver = ? ";
                    $stmt = $pdo->prepare($sql)->execute([$mnum, $status, $sender, $receiver]);
                    exit($response);
                
                } catch (PDOException $th) {
                    $message = $th->getMessage();
                    echo $message ;
                    exit();
                }  
                
            }
            else {
                if($stmt->rowCount() == 0) {
                    $response .= 'No Conversation yet.';
                    exit($response);
                }
                else {
                    $response .= 'reachedMax';
                    exit($response);
                }
            }    
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message ;
            exit();
        }  
    }

    if(isset($_POST['MessageSend']) == 'MessageSend') {
        // dd($_POST);
        $message_content = trimSlash($_POST['MessageContext']);
        $sender = trimSlash($_POST['MessageSender']);
        $receiver = trimSlash($_POST['MessageReceiver']);
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

            $sqlReceiverData = "SELECT * FROM accounts WHERE account_unique = ?";
            $stmtReceiverData = $pdo->prepare($sqlReceiverData);
            $stmtReceiverData->execute([$receiver]);
            $rowReceiverData = $stmtReceiverData->fetch();

            $rafn = $rowReceiverData['account_firstname'];
            $ramn = $rowReceiverData['account_middlename'];
            $raln = $rowReceiverData['account_lastname'];
            $rasn = $rowReceiverData['account_suffixname'];
            $raat = $rowReceiverData['account_type'];

            $fullname = getFullName($rafn, $ramn, $raln, $rasn);
            $position = getPosition($raat);

            // INSERT SYSTEM LOG         
            $logAction = $s_position ." ". $s_fullname . " sent a message to " . $position ." ". $fullname;
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            
            $message = 'message sent';
            echo json_encode([
                'status'            => 'success', 
                'sender'            => $sender,
                'receiver'          => $receiver
            ]);  
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message ;
            exit();
        }  
    }


?>
