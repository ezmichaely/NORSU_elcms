<?php 
    $sqlClass = 
        "SELECT *
            FROM classes  
            INNER JOIN modules ON classes.class_module = modules.module_code
            INNER JOIN subjects ON classes.class_subject = subjects.subject_id
            INNER JOIN accounts ON classes.class_teacher = accounts.account_unique
            INNER JOIN schoolyear ON classes.class_schoolyear = schoolyear.schoolyear_id
            INNER JOIN semesters ON classes.class_semester = semesters.semester_id
            WHERE classes.class_code = ?" ;

    $stmtClass = $pdo->prepare($sqlClass);
    $stmtClass->execute([$ccode]); 
    // $rowClass = $stmtClass->fetch();
    
    // dd($rowClass);
    if ($stmtClass->rowCount() > 0 ) {
        while ($rowClass = $stmtClass->fetch()) {
            $ccode = $rowClass['class_code']; 
            $cmod = $rowClass['class_module']; 
            $csub = $rowClass['class_subject'];
            $csy = $rowClass['class_schoolyear'];
            $csem = $rowClass['class_semester'];
            $cday = $rowClass['class_day']; 
            $ctime = $rowClass['class_time']; 
            $csec = $rowClass['class_section'];
            $cteach = $rowClass['class_teacher']; 
            $syname = $rowClass['schoolyear_name'];
            $semname = $rowClass['semester_name'];
 
            $mcode = $rowClass['module_code']; 
            $mtitle = $rowClass['module_title']; 
            $mintro = $rowClass['module_intro']; 
            $moutcome = $rowClass['module_outcomes']; 
            $scode = $rowClass['subject_code']; 
            $stitle = $rowClass['subject_title']; 

            $aid = $rowClass['account_unique']; 
            $afn = $rowClass['account_firstname']; 
            $amn = $rowClass['account_middlename'];    
            $aln = $rowClass['account_lastname']; 
            $asn = $rowClass['account_suffixname'];    
            
            $fullname = getFullName($afn, $amn, $aln, $asn);
        }
    } else {
        header('Location: ' .BASE_URL. '/404.php');
        exit();
    }

    
    // $rowContact = $stmtContact->fetch();
    // dd($contact);

    $sqlOutline = "SELECT * FROM outlines
        WHERE outlines.module_code = ? ORDER BY outlines.outline_number ASC";
    $stmtOutline = $pdo->prepare($sqlOutline);
    $stmtOutline->execute([$mcode]);
    // dd($stmtOutline->fetchAll());

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


    $sqlMembers = "SELECT * FROM classmembers
        INNER JOIN accounts ON classmembers.class_student = accounts.account_unique
        WHERE classmembers.class_code = ? ORDER BY accounts.account_lastname ASC";
    $stmtMembers = $pdo->prepare($sqlMembers);
    $stmtMembers->execute([$ccode]);
    // dd($stmtMembers->fetchAll());

    $i = 1;
    $num = $i++ . '.'; 
?>
