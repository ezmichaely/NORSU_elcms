<?php
    $sqlCountPost = "SELECT * FROM posts WHERE account_unique = ?";
    $stmtCountPost = $pdo->prepare($sqlCountPost);
    $stmtCountPost->execute([$s_aid]);
    $CountPost = $stmtCountPost->rowCount();

    $sqlCountModules = "SELECT * FROM modules WHERE module_copier = ?";
    $stmtCountModules = $pdo->prepare($sqlCountModules);
    $stmtCountModules->execute([$s_aid]);
    $CountModules = $stmtCountModules->rowCount();

    $sqlCountStudentClass = "SELECT * FROM classmembers WHERE class_student = ?";
    $stmtCountStudentClass = $pdo->prepare($sqlCountStudentClass);
    $stmtCountStudentClass->execute([$s_aid]);
    $CountStudentClass = $stmtCountStudentClass->rowCount();

    $sqlCountTeacherClass = "SELECT * FROM classes WHERE class_teacher = ?";
    $stmtCountTeacherClass = $pdo->prepare($sqlCountTeacherClass);
    $stmtCountTeacherClass->execute([$s_aid]);
    $CountTeacherClass = $stmtCountTeacherClass->rowCount();

    $sqlCountContacts = "SELECT * FROM contacts WHERE contact_sender = ?";
    $stmtCountContacts = $pdo->prepare($sqlCountContacts);
    $stmtCountContacts->execute([$s_aid]);
    $CountContacts = $stmtCountContacts->rowCount();


    // DEPARTMENT COUNT
    $sqlCountDepartmentClass = "SELECT * FROM classes 
        INNER JOIN users ON classes.class_teacher = users.account_unique
        WHERE users.department_id = ?";
    $stmtCountDepartmentClass = $pdo->prepare($sqlCountDepartmentClass);
    $stmtCountDepartmentClass->execute([$s_uudid]);
    $CountDepartmentClass = $stmtCountDepartmentClass->rowCount();
    //  dd($stmtCountTeacherClass->rowCount());
    
     $sqlCountDepartmentFaculty = "SELECT * FROM users 
        INNER JOIN accounts ON users.account_unique = accounts.account_unique
        WHERE users.department_id = ? AND accounts.account_type = '3' OR accounts.account_type = '4'";
    $stmtCountDepartmentFaculty = $pdo->prepare($sqlCountDepartmentFaculty);
    $stmtCountDepartmentFaculty->execute([$s_uudid]);
    $CountDepartmentFaculty = $stmtCountDepartmentFaculty->rowCount();

    $sqlCountDepartmentModuleRequest = "SELECT * FROM modules 
        INNER JOIN users ON modules.module_author = users.account_unique
        INNER JOIN departments ON departments.department_id = users.department_id
        WHERE departments.department_id = ? AND module_status = 'Dept Head: For Approval'";
    $stmtCountDepartmentModuleRequest = $pdo->prepare($sqlCountDepartmentModuleRequest);
    $stmtCountDepartmentModuleRequest->execute([$s_ddid]);
    $CountDepartmentModuleRequest = $stmtCountDepartmentModuleRequest->rowCount();

    $sqlCountDepartmentModule = "SELECT * FROM modules 
        INNER JOIN users ON modules.module_copier = users.account_unique
        INNER JOIN departments ON departments.department_id = users.department_id
        WHERE departments.department_id = ?";
    $stmtCountDepartmentModule = $pdo->prepare($sqlCountDepartmentModule);
    $stmtCountDepartmentModule->execute([$s_ddid]);
    $CountDepartmentModule = $stmtCountDepartmentModule->rowCount();


    $sqlCountCollegeClass = "SELECT * FROM classes 
        INNER JOIN users ON classes.class_teacher = users.account_unique
        WHERE users.college_id = ?";
    $stmtCountCollegeClass = $pdo->prepare($sqlCountCollegeClass);
    $stmtCountCollegeClass->execute([$s_uuclid]);
    $CountCollegeClass = $stmtCountCollegeClass->rowCount();
    

    $sqlCountCollegeFaculty = "SELECT * FROM users 
        INNER JOIN accounts ON users.account_unique = accounts.account_unique
        WHERE users.college_id = ? 
        AND accounts.account_type = '3' OR accounts.account_type = '4' OR accounts.account_type = '5'";
    $stmtCountCollegeFaculty = $pdo->prepare($sqlCountCollegeFaculty);
    $stmtCountCollegeFaculty->execute([$s_uuclid]);
    $CountCollegeFaculty = $stmtCountCollegeFaculty->rowCount();

    $sqlCountCollegeStudents = "SELECT * FROM users 
        INNER JOIN accounts ON users.account_unique = accounts.account_unique
        WHERE users.college_id = ? 
        AND accounts.account_type = '2'";
    $stmtCountCollegeStudents = $pdo->prepare($sqlCountCollegeStudents);
    $stmtCountCollegeStudents->execute([$s_uuclid]);
    $CountCollegeStudents = $stmtCountCollegeStudents->rowCount();

    // dd($s_uuclid);

    $sqlCountCollegeModule = "SELECT * FROM modules 
        INNER JOIN users ON modules.module_copier = users.account_unique
        INNER JOIN colleges ON colleges.college_id = users.college_id
        WHERE colleges.college_id = ?";
    $stmtCountCollegeModule = $pdo->prepare($sqlCountCollegeModule);
    $stmtCountCollegeModule->execute([$s_uuclid]);
    $CountCollegeModule = $stmtCountCollegeModule->rowCount();
    
    $sqlCountCollegeModuleRequest = "SELECT * FROM modules 
        INNER JOIN users ON modules.module_author = users.account_unique
        INNER JOIN colleges ON colleges.college_id = users.college_id
        WHERE colleges.college_id = ? AND module_status = 'DEAN: FOR APPROVAL'";
    $stmtCountCollegeModuleRequest = $pdo->prepare($sqlCountCollegeModuleRequest);
    $stmtCountCollegeModuleRequest->execute([$s_uuclid]);
    $CountCollegeModuleRequest = $stmtCountCollegeModuleRequest->rowCount();

    $sqlCountAllAccounts = "SELECT * FROM accounts";
    $stmtCountAllAccounts = $pdo->query($sqlCountAllAccounts);
    $CountAllAccounts = $stmtCountAllAccounts->rowCount();
    
    $sqlCountAllAdmins = "SELECT * FROM accounts 
        WHERE accounts.account_type = '1'";
    $stmtCountAllAdmins = $pdo->query($sqlCountAllAdmins);
    $CountAllAdmins = $stmtCountAllAdmins->rowCount();


    $sqlCountAllStudents = "SELECT * FROM accounts 
        WHERE accounts.account_type = '2'";
    $stmtCountAllStudents = $pdo->query($sqlCountAllStudents);
    $CountAllStudents = $stmtCountAllStudents->rowCount();

    $sqlCountAllInstructor = "SELECT * FROM accounts 
        WHERE accounts.account_type = '3'";
    $stmtCountAllInstructor = $pdo->query($sqlCountAllInstructor);
    $CountAllInstructor = $stmtCountAllInstructor->rowCount();


    $sqlCountAllDeptHead = "SELECT * FROM accounts 
        WHERE accounts.account_type = '4'";
    $stmtCountAllDeptHead = $pdo->query($sqlCountAllDeptHead);
    $CountAllDeptHead = $stmtCountAllDeptHead->rowCount();

    $sqlCountAllDean = "SELECT * FROM accounts 
        WHERE accounts.account_type = '5'";
    $stmtCountAllDean = $pdo->query($sqlCountAllDean);
    $CountAllDean = $stmtCountAllDean->rowCount();

    
    $sqlCountAllStudentRequest = "SELECT * FROM accounts 
        WHERE accounts.account_type = '2' AND accounts.account_request = '0'";
    $stmtCountAllStudentRequest = $pdo->query($sqlCountAllStudentRequest);
    $CountAllStudentRequest = $stmtCountAllStudentRequest->rowCount();

    

    
    
?>
