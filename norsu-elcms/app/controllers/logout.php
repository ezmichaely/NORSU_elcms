<?php
    include '../../path.php';
    include(ROOT_PATH . '/app/config/dbConPDO.php');

    if(empty($_SESSION['norsu-elcms-sid'])) {
        header('Location: ' .BASE_URL. '/index.php');
        exit;
    } elseif (!empty($_SESSION['norsu-elcms-sid'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $status = 'OFFLINE';
        $sqlStatus = "UPDATE accounts SET account_status=? WHERE account_unique=?";
        $pdo->prepare($sqlStatus)->execute([$status, $s_aid]);

        $logAction = $s_position ." ". $s_fullname . " has successfully logged out.";
        $sqlLog = "INSERT INTO logs (account_unique, `log_action`) VALUES (?,?)";
        $stmtLog = $pdo->prepare($sqlLog);
        $stmtLog->execute([$s_aid, $logAction]);

        unset($_SESSION['norsu-elcms-loggedin']);
        unset($_SESSION['norsu-elcms-sid']);
    }
    

    if (!empty($_SESSION['norsu-elcms-admin'])) {
        unset($_SESSION['norsu-elcms-admin']);
        header('Location: ' .BASE_URL. '/admin/login.php');
        exit;
    } 
    else if (!empty($_SESSION['norsu-elcms-student'])) {
        unset($_SESSION['norsu-elcms-student']);
    } 
    else if (!empty($_SESSION['norsu-elcms-instructor'])) {
        unset($_SESSION['norsu-elcms-instructor']);
        // header('Location: ' .BASE_URL. '/index.php');
        // exit;
    } 
    else if (!empty($_SESSION['norsu-elcms-depthead'])) {
        unset($_SESSION['norsu-elcms-depthead']);
        // header('Location: ' .BASE_URL. '/index.php');
        // exit;
    } 
    else if (!empty($_SESSION['norsu-elcms-dean'])) {
        unset($_SESSION['norsu-elcms-dean']);
        // header('Location: ' .BASE_URL. '/index.php');
        // exit;
    }
    header('Location: ' .BASE_URL. '/index.php');
    exit;
?>
