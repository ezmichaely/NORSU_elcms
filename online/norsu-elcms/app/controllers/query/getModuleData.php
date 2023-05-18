<?php 
    if(isset($_GET['mcode'])) {
        $mcode = $_GET['mcode'];
    } 
    
    $sqlModule = "SELECT * FROM modules 
        INNER JOIN subjects ON modules.subject_id = subjects.subject_id 
        INNER JOIN accounts ON modules.module_author = accounts.account_unique
        WHERE modules.module_code = ? ";
    $stmtModule = $pdo->prepare($sqlModule);
    $stmtModule->execute([$mcode]);
    // dd($stmtModule->fetch());

    if ($stmtModule->rowCount() > 0 ) {
        while ($rowModule = $stmtModule->fetch()) {
            $mcode = $rowModule['module_code']; 
            $mtitle = $rowModule['module_title']; 
            $mintro = $rowModule['module_intro'];
            $moutcome = $rowModule['module_outcomes']; 
            $mauthor = $rowModule['module_author'];
            $mconsent = $rowModule['module_consent']; 
            $mstatus = $rowModule['module_status'];
            $sid = $rowModule['subject_id']; 
            $scode = $rowModule['subject_code']; 
            $stitle = $rowModule['subject_title'];
            $aid = $rowModule['account_unique']; 
            $afn = $rowModule['account_firstname']; 
            $amn = $rowModule['account_middlename']; 
            $aln = $rowModule['account_lastname']; 
            $asn = $rowModule['account_suffixname']; 
            $fullname = getFullName($afn, $amn, $aln, $asn);
        } 

    } else {
        header('Location: ' .BASE_URL. '/404.php');
        exit();
    }

    // $sqlDownloadModule = "SELECT * FROM `modules` 
    //         INNER JOIN outlines ON outlines.module_code = modules.module_code 
    //         WHERE outlines.module_code = ?";
    // $stmtDownloadModule = $pdo->prepare($sqlDownloadModule);
    // $stmtDownloadModule->execute([$mcode]);
    // $rowDownloadModule = $stmtDownloadModule->fetchAll();
    
    // dd($rowDownloadModule);






    
    $sqlOutline = "SELECT * FROM outlines
        WHERE outlines.module_code = ? ORDER BY outlines.outline_number ASC";
    $stmtOutline = $pdo->prepare($sqlOutline);
    $stmtOutline->execute([$mcode]);
    // dd($row = $stmtOutline->fetchAll());

    if(isset($_GET['ocode'])) {
        $ocode = $_GET['ocode'];

        $sqlOutlineSingle = "SELECT * FROM outlines
            WHERE outline_code = ? AND module_code = ?";
        $stmtOutlineSingle = $pdo->prepare($sqlOutlineSingle);
        $stmtOutlineSingle->execute([$ocode, $mcode]);

        foreach ($stmtOutlineSingle as $row) {
            $otitle = $row['outline_title'];
            $oobj = $row['outline_objective'];
            $ocontent = $row['outline_content'];
            $onum = $row['outline_number'];
        }   
        
        // dd($onum);
        $romanum = numberToRomanRepresentation($onum);
        $NxtOutline = $onum + 1;
        $PrevOutline = $onum - 1;

        $sqlGetNxtOutline = "SELECT outline_code FROM outlines
            WHERE outline_number = ? AND module_code = ? ORDER BY outline_number DESC LIMIT 1";
        $stmtGetNxtOutline = $pdo->prepare($sqlGetNxtOutline);
        $stmtGetNxtOutline->execute([$NxtOutline, $mcode]);

        $NxtOutlineCode = '';
        if($stmtGetNxtOutline->rowCount() > 0 ){
            $rowGetNxtOutline = $stmtGetNxtOutline->fetch();
            $NxtOutlineCode .= $rowGetNxtOutline['outline_code'];
        } else {
            $NxtOutlineCode .= '';
        }

        $sqlGetPrevOutline = "SELECT outline_code FROM outlines
            WHERE outline_number = ? AND module_code = ? ORDER BY outline_number";
        $stmtGetPrevOutline = $pdo->prepare($sqlGetPrevOutline);
        $stmtGetPrevOutline->execute([$PrevOutline, $mcode]);

        $PrevOutlineCode = '';
        if($stmtGetPrevOutline->rowCount() > 0 ){
            $rowGetPrevOutline = $stmtGetPrevOutline->fetch();
            $PrevOutlineCode .= $rowGetPrevOutline['outline_code'];
        } else {
            $PrevOutlineCode .= '';
        }
    } 
?>
