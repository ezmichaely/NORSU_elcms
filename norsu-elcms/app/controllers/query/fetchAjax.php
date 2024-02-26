<?php
    include_once('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    // FETCH SYSTEM LOGS
    

    // ADD MAJOR SELECT COURSES
    if(isset($_POST['AddMajorSelectCourses'])) {
        $college_id = trimSlash($_POST['AddMajorSelectCourses']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];
                echo "<option value='0' hidden>Select Course</option> </br> <option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            exit();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
        }
    }

    // Edit MAJOR SELECT COURSES
    if(isset($_POST['EditMajorSelectCourses'])) {
        $college_id = trimSlash($_POST['EditMajorSelectCourses']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                // echo json_encode(['status' => 'success']);
                echo "<option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // EDIT MAJOR Fetch SELECT COURSES
    if(isset($_POST['EditMajorFetchCoursesFromCollege'])) {
        $college_id = trimSlash($_POST['EditMajorFetchCoursesFromCollege']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                // echo json_encode(['status' => 'success']);
                echo "<option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // ADD SUBJECT SELECT COURSES
    if(isset($_POST['AddSubjectSelectCourses'])) {
        $college_id = trimSlash($_POST['AddSubjectSelectCourses']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                echo "<option value='0' hidden>Select Course</option> </br> <option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }
    
    // Edit SUBJECT SELECT COURSES
    if(isset($_POST['EditSubjectSelectCourses'])) {
        $college_id = trimSlash($_POST['EditSubjectSelectCourses']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                // echo json_encode(['status' => 'success']);
                echo "<option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
                
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // EDIT SUBJECT Fetch SELECT COURSES
    if(isset($_POST['EditSubjectFetchCoursesFromCollege'])) {
        $college_id = trimSlash($_POST['EditSubjectFetchCoursesFromCollege']);
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                // echo json_encode(['status' => 'success']);
                echo "<option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
                
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }
// EditEducationalInfoSelectDepartment
    // REGISTER TEACHER SELECT DEPARTMENTS
    if(isset($_POST['RegisterTeacherSelectDepartments']) || isset($_POST['EditEducationalInfoSelectDepartments'])) {
        // $college_id = trimSlash($_POST['RegisterTeacherSelectDepartments']);
        if(!empty(isset($_POST['RegisterTeacherSelectDepartments']))) {
            $college_id = trimSlash($_POST['RegisterTeacherSelectDepartments']);
        }
        
        if(!empty(isset($_POST['EditEducationalInfoSelectDepartments']))) {
            $college_id = trimSlash($_POST['EditEducationalInfoSelectDepartments']);
        }
        
        try {
            $sqlGetDepartment = "";
            $sqlGetDepartment .= "SELECT * FROM departments
                WHERE college_id = :cid";

            $stmtGetDepartment = $pdo->prepare($sqlGetDepartment);
            $stmtGetDepartment->execute(['cid' => $college_id]); 
            $rowGetDepartment = $stmtGetDepartment->fetchAll();

            // dd($rowGetDepartment);
            foreach ($rowGetDepartment as $row) {
                $department_id = $row['department_id'];
                $college_id = $row['college_id'];
                $department_name = $row['department_name'];
                $department_acronym = $row['department_acronym'];

                echo "<option value='0' hidden>Select Department</option> </br> <option value='".$department_id."'>".$department_name." (".$department_acronym.") </option>";
                
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // REGISTER STUDENT SELECT COURSES
    if(isset($_POST['RegisterStudentSelectCourses']) || isset($_POST['EditEducationalInfoSelectCourse'])) {
        if(!empty(isset($_POST['RegisterStudentSelectCourses']))) {
            $college_id = trimSlash($_POST['RegisterStudentSelectCourses']);
        }
        
        if(!empty(isset($_POST['EditEducationalInfoSelectCourse']))) {
            $college_id = trimSlash($_POST['EditEducationalInfoSelectCourse']);
        }
        
        
        try {
            $sqlGetCourse = "";
            $sqlGetCourse .= "SELECT * FROM courses 
                WHERE college_id = :cid";

            $stmtGetCourse = $pdo->prepare($sqlGetCourse);
            $stmtGetCourse->execute(['cid' => $college_id]); 
            $rowGetCourse = $stmtGetCourse->fetchAll();

            // dd($rowGetCourse);
            foreach ($rowGetCourse as $row) {
                $course_id = $row['course_id'];
                $college_id = $row['college_id'];
                $course_name = $row['course_name'];
                $course_acronym = $row['course_acronym'];

                echo "<option value='0' hidden>Select Course</option> </br> <option value='".$course_id."'>".$course_name." (".$course_acronym.") </option>";
                
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            exit();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
        }
    }

    // REGISTER STUDENT SELECT MAJORS 
    if(isset($_POST['RegisterStudentSelectMajors']) || isset($_POST['EditEducationalInfoSelectMajors'])) {
        if(!empty(isset($_POST['RegisterStudentSelectMajors']))) {
            $course_id = trimSlash($_POST['RegisterStudentSelectMajors']);
        }
        
        if(!empty(isset($_POST['EditEducationalInfoSelectMajors']))) {
            $course_id = trimSlash($_POST['EditEducationalInfoSelectMajors']);
        }
        
        try {
            $sqlGetMajor = "";
            $sqlGetMajor .= "SELECT * FROM majors 
                WHERE course_id = :cid";

            $stmtGetMajor = $pdo->prepare($sqlGetMajor);
            $stmtGetMajor->execute(['cid' => $course_id]); 
            
            // dd($rowGetMajor);
            if($stmtGetMajor->rowCount() > 0) {
                $rowGetMajor = $stmtGetMajor->fetchAll();
                
                foreach ($rowGetMajor as $row) {
                    $major_id = $row['major_id'];
                    $course_id = $row['course_id'];
                    $major_name = $row['major_name'];
    
                    echo "<option value='0' hidden>Select Major</option> </br> <option value='".$major_id."'>".$major_name."</option>";
                    
                } exit();
            } else {
                echo "<option value='' selected>No Major</option>";
                exit();
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

   
    // fetchThisSubjectModules
    if(isset($_POST['fetchThisSubjectModules'])) {
        $subject = trimSlash($_POST['subject']); 
        $teacher = trimSlash($_POST['teacher']); 
        
        try {
            $sql = "SELECT * FROM modules 
            WHERE subject_id = ? 
            AND module_copier = ?
            AND module_status = 'Published'
            ORDER BY module_datetime DESC ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$subject, $teacher]);

        if($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                echo "
                    <option value='' hidden>Select Module</option> </br> 
                    <option value='".$row['module_code']."'>".$row['module_title']."</option>";
            } exit();
        }
        else {
            echo "<option value='' hidden>You have no module for this subject.</option>";
            exit();
        }

        } catch (PDOException $th) {
            $message = $th->getMessage();
            exit();
        }  
    }

    // dd($_POST);
    if(isset($_POST['SearchSubjectCode'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $string = trimSlash($_POST['SearchSubjectCode']);
        $pattern = $string. "%";
        try {
            $sql = "SELECT 
                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                ac.account_unique AS acaid, ac.account_firstname AS acafn, ac.account_middlename AS acamn, 
                ac.account_lastname AS acaln, ac.account_suffixname AS acasn

                FROM modules AS m
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN accounts AS ac ON ac.account_unique = m.module_copier
                WHERE CONCAT(s.subject_code) LIKE ? 
                AND m.module_status = 'Published'
                -- AND NOT modules.module_author = ? OR modules.module_copier = ?
                ORDER BY module_datetime DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$pattern]);
            // $stmt->execute([$pattern, $s_aid, $s_aid]);
            // $row = $stmt->fetchAll();
            // dd($row);
            $output = '';
            if($stmt->rowCount() > 0 ) {
                $s_aid = $_SESSION['norsu-elcms-sid'];
                include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
                while($row = $stmt->fetch()) {
                    $mmcode = $row['mmcode'];
                    $mmwater = $row['mmwm'];
                    $msid = $row['msid'];
                    $mmtitle = $row['mmtitle'];
                    $mmintro = $row['mmintro'];
                    $mmoutcomes = $row['mmoutcomes']; 
                    $mmauthor = $row['mmauthor']; 
                    $mmcopier = $row['mmcopier']; 
                    $mmconsent = $row['mmconsent'];
                    $mmstatus = $row['mmstatus']; 
                    $ssid = $row['ssid'];
                    $sscode = $row['sscode']; 
                    $sstitle = $row['sstitle']; 

                    $aaaid = $row['aaaid']; 
                    $aaafn = $row['aaafn'];
                    $aaamn = $row['aaamn'];  
                    $aaaln = $row['aaaln'];
                    $aaasn = $row['aaasn'];

                    $acaid = $row['acaid'];
                    $acafn = $row['acafn']; 
                    $acamn = $row['acamn'];
                    $acaln = $row['acaln'];
                    $acasn = $row['acasn'];
                    
                    $aafullname = getFullName($aaafn, $aaamn, $aaaln, $aaasn);
                    $acfullname = getFullName($acafn, $acamn, $acaln, $acasn);

                    $output .= '
                        <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <div class="bg-warning h-100 d-flex justify-content-center align-items-center p-3">
                                        <h2 class="fw-bold text-uppercase text-center">
                                            '.$sscode.'
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold text-uppercase">
                                            '.$mmtitle.'
                                        </h4>
                                    
                                        <p class="card-text p-0 m-0 mt-2 fw-bold">
                                            <span class="fw-500">
                                                Author:
                                            </span>
                                            <span class="text-uppercase fw-bold badge bg-primary text-wrap fs-7">
                                            
                                                <a href="'.BASE_URL.'/'. $s_directory. '/profile.php?u='.$aaaid.'"
                                                    class="text-white">
                                                    '.$aafullname.'
                                                </a>
                                            </span>
                                        </p>

                                        <p class="card-text p-0 m-0 mt-2 fw-bold">
                                            <span class="fw-500">
                                                Revised by:
                                            </span>

                                            <span class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7">
                                                <a href="'.BASE_URL.'/'. $s_directory.'/profile.php?u='.$acaid.'"
                                                    class="text-white">
                                                 '.$acfullname.'
                                                </a>
                                            </span>
                                        </p>

                                        <p class="card-text p-0 m-0 mt-2 fw-bold">
                                            <span class="fw-500">
                                                Status:
                                            </span> 
                                            <span
                                                class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                                PUBLISHED
                                            </span>
                                        </p>

                                        <p class="card-text p-0 m-0 mt-2 fw-bold ">
                                            <span class="fw-500">
                                                Subject Title:
                                            </span>
                                            <span class="text-primary ">
                                                 '.$sstitle.'
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div
                                        class="h-100 d-flex justify-content-center align-items-center flex-column p-3 ">
                                        <a href="'.BASE_URL.'/'. $s_directory.'/module-read.php?mcode='.$mmcode.'&a=view"
                                            class="btn btn-primary w-100"  target="_blank">
                                            view module
                                        </a>';

                                        if($s_aid != $acaid) {
                                         $output .= '<form id="CopyModuleForm" method="POST" class="w-100" action="'.BASE_URL.'/app/controllers/crud/crudModules.php">
                                            <input type="text" id="CopyModuleAuthor" name="CopyModuleAuthor"
                                                class="form-control" value="'.$aafullname.'"
                                                hidden>
                                            <input type="text" id="CopyModuleCode" name="CopyModuleCode"
                                                class="form-control" value="'.$mmcode.'"
                                                hidden>
                                            <input type="text" id="CopyModuleButton" name="CopyModuleButton"
                                                class="form-control" value="CopyModuleButton" hidden>
                                            <button type="submit" id="CopyModuleBtn" name="CopyModuleBtn"
                                                class="btn btn-outline-primary w-100 mt-2 border border-primary">
                                                COPY MODULE
                                            </button>
                                        </form>';
                                        }
                                    $output .= '</div>
                                </div>
                            </div>
                        </div>
                    </div>';
                } 
                exit($output);
            } else {
                if($stmt->rowCount() == 0) {
                    $output = '<div class="col-md-12 mt-2 text-center fw-bold"> No module available. </div>';
                    exit($output);
                } else {
                    $output = 'reachedMax';
                    exit($output);
                }
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }  
    }


    if(isset($_POST['FetchCollege'])) {
        try {
            $colleges = $pdo->query("SELECT * FROM colleges")->fetchAll();
            foreach ($colleges as $row) {
                $college_id = $row['college_id'];
                $college_name = $row['college_name'];
                $college_acronym = $row['college_acronym'];
                echo "<option value='".$college_id."'>".$college_name." (".$college_acronym.") </option>"; 
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }

    if(isset($_POST['FetchSchoolyear'])) {
        try {
            $schoolyear = $pdo->query("SELECT * FROM schoolyear")->fetchAll();
            foreach ($schoolyear as $row) {
                $schoolyear_id = $row['schoolyear_id'];
                $schoolyear_name = $row['schoolyear_name'];
                $schoolyear_start = $row['schoolyear_start'];
                $schoolyear_end = $row['schoolyear_end'];
                echo "<option value='".$schoolyear_id."'>".$schoolyear_name."</option>"; 
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }

    if(isset($_POST['FetchSemester'])) {
        try {
            $semesters = $pdo->query("SELECT * FROM semesters")->fetchAll();
            foreach ($semesters as $row) {
                $semester_id = $row['semester_id'];
                $semester_name = $row['semester_name'];
                echo "<option value='".$semester_id."'>".$semester_name."</option>"; 
            } exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }
?>
