<?php
    include_once('../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');
    
    // LOGIN ADMIN
    if(isset($_POST['action']) && $_POST['action'] == 'LoginAdmin') {
        $account_username = trimSlash($_POST['LoginUsername']);
        $account_unique = trimSlash($_POST['LoginUsername']);
        $account_password = md5(trimSlash($_POST['LoginPassword']));

        $sqlUser = "SELECT * FROM accounts 
                WHERE (accounts.account_type = 1)
                AND (accounts.account_username = ? OR accounts.account_unique = ?)"; 
        $stmtUser = $pdo->prepare($sqlUser);
        $stmtUser->execute([$account_username, $account_unique]);
        $rowUser = $stmtUser->fetch();

        // there is a username
        if($rowUser) {
            $sqlPass = "SELECT * FROM accounts
                WHERE (accounts.account_type = 1)
                AND (accounts.account_username = ? OR accounts.account_unique = ?)
                AND (accounts.account_password = ?)"; 

            $stmtPass = $pdo->prepare($sqlPass);
            $stmtPass->execute([$account_username, $account_unique, $account_password]);
            $rowPass = $stmtPass->fetch();

            // CORRECT PASSWORD
            if ($rowPass) {
                $s_aid = $rowPass['account_unique'];
                $s_type = $rowPass['account_type'];
                $s_firstname = $rowPass['account_firstname'];
                $s_middlename = $rowPass['account_middlename'];
                $s_lastname = $rowPass['account_lastname'];
                $s_suffixname = $rowPass['account_suffixname'];

                $s_fullname = getFullName($s_firstname, $s_middlename, $s_lastname, $s_suffixname);
                $s_position = getPosition($s_type);
                $s_directory = getDirectory($s_type);

                $_SESSION['norsu-elcms-loggedin'] = true;
                $_SESSION['norsu-elcms-sid'] = $s_aid;
                $_SESSION['norsu-elcms-admin'] = true;

                $status = 'ONLINE';
                $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_username=? OR account_unique=?";
                $pdo->prepare($sqlStatus)->execute([$status, $account_username, $account_unique]);
                
                $logAction = $s_position ." ". $s_fullname . " has successfully logged in.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$s_aid, $logAction]);
                
                echo json_encode(['status' => 'success', 'directory' => $s_directory]);   
                exit();
            }
            else { // incorrect password
                echo json_encode(['status' => 'error', 'errAll' => '<li>Password is incorrect!</li>']);
            }
        }
        else { // no user
            echo json_encode(['status' => 'error', 'errAll' => "<li>Username doesn't exists!</li>"]);
        }
    }

    // LOGIN USER
    if(isset($_POST['action']) && $_POST['action'] == 'LoginUser') {
        $account_username = trimSlash($_POST['LoginUsername']);
        $account_unique = trimSlash($_POST['LoginUsername']);
        $account_password = md5(trimSlash($_POST['LoginPassword']));
        
        $sqlUser = "SELECT * FROM accounts
                WHERE (accounts.account_type = 2 OR accounts.account_type = 3 OR
                accounts.account_type = 4 OR accounts.account_type = 5)
                AND (accounts.account_username = ? OR accounts.account_unique = ?)"; 
        $stmtUser = $pdo->prepare($sqlUser);
        $stmtUser->execute([$account_username, $account_unique]);
        $rowUser = $stmtUser->fetch();
        
        // there is a username
        if($rowUser) {
            $sqlPass = "SELECT * FROM accounts
                WHERE (accounts.account_type = 2 OR accounts.account_type = 3 OR
                    accounts.account_type = 4 OR accounts.account_type = 5)
                AND (accounts.account_username = ? OR accounts.account_unique = ?)
                AND (accounts.account_password = ?)"; 

            $stmtPass = $pdo->prepare($sqlPass);
            $stmtPass->execute([$account_username, $account_unique, $account_password]);
            $rowPass = $stmtPass->fetch();

            // CORRECT PASSWORD
            if ($rowPass) {
                $s_aid = $rowPass['account_unique'];
                $s_type = $rowPass['account_type'];
                $s_firstname = $rowPass['account_firstname'];
                $s_middlename = $rowPass['account_middlename'];
                $s_lastname = $rowPass['account_lastname'];
                $s_suffixname = $rowPass['account_suffixname'];

                $s_fullname = getFullName($s_firstname, $s_middlename, $s_lastname, $s_suffixname);
                $s_position = getPosition($s_type);
                $s_directory = getDirectory($s_type);

                if ($s_type == '2') {
                    $_SESSION['norsu-elcms-loggedin'] = true;
                    $_SESSION['norsu-elcms-student'] = true;
                    $_SESSION['norsu-elcms-sid'] = $s_aid;

                    $status = 'ONLINE';
                    $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_username=? OR account_unique=?";
                    $pdo->prepare($sqlStatus)->execute([$status, $account_username, $account_unique]);

                    $logAction = $s_position ." ". $s_fullname . " has successfully logged in.";
                    $sqlLog = "INSERT INTO logs (account_unique, `log_action`) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);

                    echo json_encode(['status' => 'success', 'directory' => $s_directory]);   
                    exit();
                    
                } else if ($s_type == '3') {
                    $_SESSION['norsu-elcms-loggedin'] = true;
                    $_SESSION['norsu-elcms-instructor'] = true;
                    $_SESSION['norsu-elcms-sid'] = $s_aid;

                    $status = 'ONLINE';
                    $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_username=? OR account_unique=?";
                    $pdo->prepare($sqlStatus)->execute([$status, $account_username, $account_unique]);

                    $logAction = $s_position ." ". $s_fullname . " has successfully logged in.";
                    $sqlLog = "INSERT INTO logs (account_unique, `log_action`) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);

                    echo json_encode(['status' => 'success', 'directory' => $s_directory]);   
                    exit();

                } else if ($s_type == '4') {
                    $_SESSION['norsu-elcms-loggedin'] = true;
                    $_SESSION['norsu-elcms-depthead'] = true;
                    $_SESSION['norsu-elcms-sid'] = $s_aid;

                    $status = 'ONLINE';
                    $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_username=? OR account_unique=?";
                    $pdo->prepare($sqlStatus)->execute([$status, $account_username, $account_unique]);

                    $logAction = $s_position ." ". $s_fullname . " has successfully logged in.";
                    $sqlLog = "INSERT INTO logs (account_unique, `log_action`) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);

                    echo json_encode(['status' => 'success', 'directory' => $s_directory]);   
                    exit();

                } else if ($s_type == '5') {
                    $_SESSION['norsu-elcms-loggedin'] = true;
                    $_SESSION['norsu-elcms-dean'] = true;
                    $_SESSION['norsu-elcms-sid'] = $s_aid;

                    $status = 'ONLINE';
                    $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_username=? OR account_unique=?";
                    $pdo->prepare($sqlStatus)->execute([$status, $account_username, $account_unique]);

                    $logAction = $s_position ." ". $s_fullname . " has successfully logged in.";
                    $sqlLog = "INSERT INTO logs (account_unique, `log_action`) VALUES (?,?)";
                    $stmtLog = $pdo->prepare($sqlLog);
                    $stmtLog->execute([$s_aid, $logAction]);

                    echo json_encode(['status' => 'success', 'directory' => $s_directory]);   
                    exit();
                }
            }
            else { // incorrect password
                echo json_encode(['status' => 'error', 'errAll' => '<li>Password is incorrect!</li>']);
            }
        }
        else { // no user
            echo json_encode(['status' => 'error', 'errAll' => "<li>Username doesn't exists!</li>"]);
        }
    }

    
    // REGISTER ADMIN

?>
