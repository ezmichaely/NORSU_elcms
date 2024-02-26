<?php
    // FETCH ALL SUBJECTS
    $subjects = $pdo->query("SELECT * FROM subjects ORDER BY subject_code")->fetchAll();
    $schoolyear = $pdo->query("SELECT * FROM schoolyear")->fetchAll();
    $semester = $pdo->query("SELECT * FROM semesters")->fetchAll();
    $colleges = $pdo->query("SELECT * FROM colleges")->fetchAll();

    // FETCH MY MODULES
    $sqlMyModules = "SELECT * FROM modules 
        INNER JOIN subjects ON modules.subject_id = subjects.subject_id
        INNER JOIN accounts ON modules.module_author = accounts.account_unique
        WHERE modules.module_copier = ?";
    $stmtMyModules = $pdo->prepare($sqlMyModules);
    $stmtMyModules->execute([$s_aid]);
    // $stmtMyModules->fetch();

    $sqlTeacherClasses = "SELECT * FROM classes
        INNER JOIN subjects ON subjects.subject_id = classes.class_subject
        INNER JOIN schoolyear ON classes.class_schoolyear = schoolyear.schoolyear_id
        INNER JOIN semesters ON classes.class_semester = semesters.semester_id
        INNER JOIN accounts ON classes.class_teacher = accounts.account_unique
        WHERE classes.class_teacher = ? 
        ORDER BY schoolyear.schoolyear_id DESC, semesters.semester_id ASC, classes.class_day ASC, classes.class_time ASC";
    $stmtTeacherClasses = $pdo->prepare($sqlTeacherClasses);
    $stmtTeacherClasses->execute([$s_aid]);

    // dd($row = $stmtTeacherClasses->fetch());
    // foreach ($stmtTeacherClasses as $row) {
    //     $ccode = $row['class_code'];
    //     $cmodule = $row['class_module'];
    //     $csubject = $row['class_subject']; 
    //     $csy = $row['class_schoolyear']; 
    //     $csem = $row['class_semester']; 
    //     $cday = $row['class_day'];
    //     $ctime = $row['class_time'];
    //     $csec = $row['class_section']; 
    //     $cteacher = $row['class_teacher']; 

    //     $sid = $row['subject_id']; 
    //     $scode = $row['subject_code']; 
    //     $stitle = $row['subject_title']; 

    //     $aid = $row['account_unique']; 
    //     $afn = $row['account_firstname'];
    //     $amn = $row['account_middlename'];
    //     $aln = $row['account_lastname'];
    //     $asn = $row['account_suffixname']; 
    // }

    // dd($stmtTeacherClasses->fetchAll());


    $sqlStudentClasses = "SELECT * FROM classmembers
        INNER JOIN classes ON classes.class_code = classmembers.class_code
        INNER JOIN subjects ON subjects.subject_id = classes.class_subject
        INNER JOIN schoolyear ON classes.class_schoolyear = schoolyear.schoolyear_id
        INNER JOIN semesters ON classes.class_semester = semesters.semester_id
        INNER JOIN accounts ON classes.class_teacher = accounts.account_unique
        WHERE classmembers.class_student = ? 
        ORDER BY schoolyear.schoolyear_id DESC, semesters.semester_id ASC, 
            classes.class_day ASC, classes.class_time ASC";
    $stmtStudentClasses = $pdo->prepare($sqlStudentClasses);
    $stmtStudentClasses->execute([$s_aid]);

    // dd($stmtStudentClasses->fetchAll());








?>
