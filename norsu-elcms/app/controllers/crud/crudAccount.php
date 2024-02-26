<?php
    include_once('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');
    
    // CHECK IF STUDENT NUMBER IS TAKEN
    if(isset($_POST['CheckRegisterStudentID'])) {
        $student_id = trimSlash($_POST['CheckRegisterStudentID']);
        try {
            $sqlGetStudentID = "SELECT * FROM accounts WHERE account_unique = ? LIMIT 1";
            $stmtGetStudentID = $pdo->prepare($sqlGetStudentID);
            $stmtGetStudentID->execute([$student_id]); 
            $rowGetStudentID = $stmtGetStudentID->fetch();

            if ($rowGetStudentID) {
                echo json_encode(['status' => 'error', 
                    'errAll' => "<li> Student Number already existed! Please check your Student Number in your school ID. 
                                    If you encounter a problem with the student number, email us. </li>"]);
                exit();
            } else {
                echo json_encode(['status' => 'success']);
                exit();
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // CHECK IF TEACHER NUMBER IS TAKEN
    if(isset($_POST['CheckRegisterTeacherID'])) {
        $teacher_id = trimSlash($_POST['CheckRegisterTeacherID']);
        try {
            $sqlGetTeacherID = "SELECT * FROM accounts WHERE account_unique = ? LIMIT 1";
            $stmtGetTeacherID = $pdo->prepare($sqlGetTeacherID);
            $stmtGetTeacherID->execute([$teacher_id]); 
            $rowGetTeacherID = $stmtGetTeacherID->fetch();

            if ($rowGetTeacherID) {
                echo json_encode(['status' => 'error', 
                    'errAll' => "<li> Teacher Number already existed! Please check your Teacher Number in your school ID. 
                                    If you encounter a problem with the teacher number, email us. </li>"]);
                exit();
            } else {
                echo json_encode(['status' => 'success']);
                exit();
            }
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // REGISTER STUDENT
    if(isset($_POST['RegisterStudentUsername']) || isset($_POST['RegisterStudentID'])){ 
        // insert into accounts TABLE
        $account_unique = trimSlash($_POST['RegisterStudentID']);
        $account_type = '2';
        $account_request = '0';
        $account_status = 'OFFLINE';
        $account_firstname = trimSlash($_POST['RegisterStudentFirstname']);
        $account_middlename = trimSlash($_POST['RegisterStudentMiddlename']);
        $account_lastname = trimSlash($_POST['RegisterStudentLastname']);
        $account_suffixname = trimSlash($_POST['RegisterStudentSuffix']);
        $account_username = trimSlash($_POST['RegisterStudentUsername']);
        $account_password = md5(trimSlash($_POST['RegisterStudentPassword']));
        $account_address = trimSlash($_POST['RegisterStudentHomeAddress']);
        $account_email = trimSlash($_POST['RegisterStudentEmailAdd']);
        $account_contactno = trimSlash($_POST['RegisterStudentContactNo']);
        $account_gender = trimSlash($_POST['RegisterStudentGender']);
        $account_dob = trimSlash($_POST['RegisterStudentDob']);

        try {
            // fetch if username is already existed
            $sqlGetAccountUser = "SELECT account_username FROM accounts WHERE account_username = ? LIMIT 1";
            $stmtGetAccountUser = $pdo->prepare($sqlGetAccountUser);
            $stmtGetAccountUser->execute([$account_username]);
            $rowGetAccountUser =  $stmtGetAccountUser->fetch();

            if($rowGetAccountUser) { // if true that username already existed!
                echo json_encode(['status' => 'error', 'errAll' => "<li> Username already existed! </li>"]);
                exit();
            } else {
                // if username IS GOOD TO GO!
                // insert data into accounts table
                $sqlRegisterStudentAccounts = "INSERT INTO accounts 
                    (account_unique, account_type, account_request, account_status, 
                    account_username, account_password, 
                    account_firstname, account_middlename, account_lastname, account_suffixname, 
                    account_address, account_email, account_contactno,
                    account_gender, account_dob)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmtRegisterStudentAccounts = $pdo->prepare($sqlRegisterStudentAccounts);
                $stmtRegisterStudentAccounts->execute([
                    $account_unique, $account_type, $account_request, $account_status, 
                    $account_username, $account_password, 
                    $account_firstname, $account_middlename, $account_lastname, $account_suffixname, 
                    $account_address, $account_email, $account_contactno, $account_gender, $account_dob
                ]);
            
                // insert into USERS TABLE
                $college_id = trimSlash($_POST['RegisterStudentSelectCollege']);
                $course_id = trimSlash($_POST['RegisterStudentSelectCourse']);
                $major_id = trimSlash($_POST['RegisterStudentSelectMajor']);

                // insert users table
                if (empty($major_id)) { // if major id => NULL
                    $sqlRegisterStudentUsers = "INSERT INTO users 
                        (account_unique, college_id, course_id) VALUES (?,?,?)";
                    $stmtRegisterStudentUsers = $pdo->prepare($sqlRegisterStudentUsers);
                    $stmtRegisterStudentUsers->execute([$account_unique, $college_id, $course_id]);
                } else { // if major id => has 
                    $sqlRegisterStudentUsers = "INSERT INTO users 
                        (account_unique, college_id, course_id, major_id) VALUES (?,?,?,?)";
                    $stmtRegisterStudentUsers = $pdo->prepare($sqlRegisterStudentUsers);
                    $stmtRegisterStudentUsers->execute([$account_unique, $college_id, $course_id, $major_id]);
                }

                /** loadslip process **/
                $schoolyear_id = trimSlash($_POST['RegisterStudentSelectSchoolyear']);
                $semester_id = trimSlash($_POST['RegisterStudentSelectSemester']);

                // school year query
                $sqlSchoolyear = 'SELECT * FROM schoolyear WHERE schoolyear_id = ?';
                $stmtSchoolyear = $pdo->prepare($sqlSchoolyear);
                $stmtSchoolyear->execute([$schoolyear_id]);
                $rowSchoolyear =  $stmtSchoolyear->fetch();
                $schoolyear_name = $rowSchoolyear['schoolyear_name'];

                // semester query
                $sqlSemester = 'SELECT * FROM semesters WHERE Semester_id = ?';
                $stmtSemester = $pdo->prepare($sqlSemester);
                $stmtSemester->execute([$semester_id]);
                $rowSemester =  $stmtSemester->fetch();
                $semester_name = $rowSemester['semester_name'];

                // remove all whitespace (including tabs and line ends)
                $schoolyear_name = preg_replace('/\s+/', '', $schoolyear_name);
                $semester_name = preg_replace('/\s+/', '', $semester_name);

                $loadslip_name = $_FILES['RegisterStudentLoadslip']['name'];
                $loadslip_type = $_FILES['RegisterStudentLoadslip']['type'];
                $loadslip_tmp_name = $_FILES['RegisterStudentLoadslip']['tmp_name'];
                $loadslip_error = $_FILES['RegisterStudentLoadslip']['error'];
                $loadslip_size = $_FILES['RegisterStudentLoadslip']['size'];

                // # get image extension store it in var
                $loadslip_name_ex = pathinfo($loadslip_name, PATHINFO_EXTENSION);
                // loadslip upload path directory
                $loadslip_path = '/upload/users/loadslips/';
                /** renaming the image name (ex. loadslip-201102740_FirstSemester_SY2020-2021.jpg) **/
                $loadslip_new_name = 'Loadslip_'.$account_unique.'_'.$semester_name.'_'.$schoolyear_name.'.'.$loadslip_name_ex;
                // crating upload path on root directory
                $loadslip_upload_path = ROOT_PATH . $loadslip_path . $loadslip_new_name;

                // <----- INSERT QUERY for LOADSLIP
                $sqlLog = "INSERT INTO loadslips 
                    (account_unique, schoolyear_id, semester_id, loadslip_path, loadslip_name) 
                    VALUES (?,?,?,?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$account_unique, $schoolyear_id, $semester_id, $loadslip_path, $loadslip_new_name]);

                $profile_status = 'Current';
                // <----- INSERT QUERY for PROFILE COVERS
                $profilecover_name = 'norsu_banner.png';
                $profilecover_path = '/assets/images/icons/';

                // $profilecover_filename = 'coverphoto_'.$user_id.'_'.$time.'_'.$profilecover_name;
                $sqlCover = "INSERT INTO profilecovers (account_unique, profilecover_name, 
                    profilecover_path, profilecover_filename, profilecover_status) VALUES (?,?,?,?,?)";
                $stmtCover = $pdo->prepare($sqlCover);
                $stmtCover->execute([$account_unique, $profilecover_name, $profilecover_path, $profilecover_name, $profile_status]);

                // <----- INSERT QUERY for PROFILE PHOTO
                $profilephoto_name = getProfilePhoto($account_gender);
                $profilephoto_path = '/assets/images/icons/';
                // $profilephoto_filename = 'profilephoto_'.$user_id.'_'.$time.'_'.$profilephoto_name;
                $sqlPhoto = "INSERT INTO profilephotos (account_unique, profilephoto_name, profilephoto_path, 
                    profilephoto_filename, profilephoto_status) VALUES (?,?,?,?,?)";
                $stmtPhoto = $pdo->prepare($sqlPhoto);
                $stmtPhoto->execute([$account_unique, $profilephoto_name, $profilephoto_path, $profilephoto_name,  $profile_status]);
                
                // insert query in system logs
                $fullname = getFullName($account_firstname, $account_middlename, $account_lastname, $account_suffixname);
                $position = getPosition($account_type);
                
                $logAction = $position ." ". $fullname . " registered an account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$account_unique, $logAction]);
                
                echo json_encode(['status' => 'success', 'message' => '<li> Account successfully registered. You may login now. </li>']);
                
                # move uploaded image to 'uploads' folder
                move_uploaded_file($loadslip_tmp_name, $loadslip_upload_path);
                exit();
                
            }
           
        } catch (PDOException $error) { // error in query while checking if username existed
            $message = $error->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
        
    }

    // REGISTER TEACHER
    if(isset($_POST['RegisterTeacherUsername']) || isset($_POST['RegisterTeacherID'])){ 
        // insert into accounts TABLE
        $account_unique = trimSlash($_POST['RegisterTeacherID']);
        $account_type = trimSlash($_POST['RegisterTeacherSelectPosition']);
        $account_request = '0';
        $account_status = 'OFFLINE';
        $account_firstname = trimSlash($_POST['RegisterTeacherFirstname']);
        $account_middlename = trimSlash($_POST['RegisterTeacherMiddlename']);
        $account_lastname = trimSlash($_POST['RegisterTeacherLastname']);
        $account_suffixname = trimSlash($_POST['RegisterTeacherSuffix']);
        $account_username = trimSlash($_POST['RegisterTeacherUsername']);
        $account_password = md5(trimSlash($_POST['RegisterTeacherPassword']));
        $account_address = trimSlash($_POST['RegisterTeacherHomeAddress']);
        $account_email = trimSlash($_POST['RegisterTeacherEmailAdd']);
        $account_contactno = trimSlash($_POST['RegisterTeacherContactNo']);
        $account_gender = trimSlash($_POST['RegisterTeacherGender']);
        $account_dob = trimSlash($_POST['RegisterTeacherDob']);
        
        // $profile_status = 'Current';

        try {
            // fetch if username is already existed
            $sqlGetAccountUser = "SELECT `account_username` FROM `accounts` WHERE `account_username` = ? LIMIT 1";
            $stmtGetAccountUser = $pdo->prepare($sqlGetAccountUser);
            $stmtGetAccountUser->execute([$account_username]);
            $rowGetAccountUser =  $stmtGetAccountUser->fetch();

            if($rowGetAccountUser) { // if true that username already existed!
                echo json_encode(['status' => 'error', 'errAll' => "<li> Username already existed! </li>"]);
                exit();
            } else {
                // insert data into accounts table
                $sqlRegisterTeacherAccounts = "INSERT INTO accounts 
                    (account_unique, account_type, account_request, account_status, 
                    account_username, account_password, 
                    account_firstname, account_middlename, account_lastname, account_suffixname, 
                    account_address, account_email, account_contactno, account_gender, account_dob)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmtRegisterTeacherAccounts = $pdo->prepare($sqlRegisterTeacherAccounts);
                $stmtRegisterTeacherAccounts->execute([
                    $account_unique, $account_type, $account_request, $account_status, 
                    $account_username, $account_password, 
                    $account_firstname, $account_middlename, $account_lastname, $account_suffixname, 
                    $account_address, $account_email, $account_contactno, $account_gender, $account_dob]);

                if ($stmtRegisterTeacherAccounts) { // if insert data into accounts table processed
                    
                    // insert into USERS TABLE
                    $college_id = trimSlash($_POST['RegisterTeacherSelectCollege']);

                    if(isset($_POST['RegisterTeacherSelectDepartment'])) {
                        $department_id = trimSlash($_POST['RegisterTeacherSelectDepartment']);
                    }
                    // insert users table
                    if (empty($department_id)) { // if department id => NULL
                        $sqlRegisterTeacherUsers = "INSERT INTO users (account_unique, college_id) VALUES (?,?)";
                        $stmtRegisterTeacherUsers = $pdo->prepare($sqlRegisterTeacherUsers);
                        $stmtRegisterTeacherUsers->execute([$account_unique, $college_id]);
                    } else { // if department id => has 
                        $department_id = trimSlash($_POST['RegisterTeacherSelectDepartment']);
                        $sqlRegisterTeacherUsers = "INSERT INTO users (account_unique, college_id, department_id) 
                            VALUES (?,?,?)";
                        $stmtRegisterTeacherUsers = $pdo->prepare($sqlRegisterTeacherUsers);
                        $stmtRegisterTeacherUsers->execute([$account_unique, $college_id, $department_id]);
                    }
                    
                    $profile_status = 'Current';
                // <----- INSERT QUERY for PROFILE COVERS
                $profilecover_name = 'norsu_banner.png';
                $profilecover_path = '/assets/images/icons/';

                // $profilecover_filename = 'coverphoto_'.$user_id.'_'.$time.'_'.$profilecover_name;
                $sqlCover = "INSERT INTO profilecovers (account_unique, profilecover_name, 
                    profilecover_path, profilecover_filename, profilecover_status) VALUES (?,?,?,?,?)";
                $stmtCover = $pdo->prepare($sqlCover);
                $stmtCover->execute([$account_unique, $profilecover_name, $profilecover_path, $profilecover_name, $profile_status]);

                // <----- INSERT QUERY for PROFILE PHOTO
                $profilephoto_name = getProfilePhoto($account_gender);
                $profilephoto_path = '/assets/images/icons/';
                // $profilephoto_filename = 'profilephoto_'.$user_id.'_'.$time.'_'.$profilephoto_name;
                $sqlPhoto = "INSERT INTO profilephotos (account_unique, profilephoto_name, profilephoto_path, 
                    profilephoto_filename, profilephoto_status) VALUES (?,?,?,?,?)";
                $stmtPhoto = $pdo->prepare($sqlPhoto);
                $stmtPhoto->execute([$account_unique, $profilephoto_name, $profilephoto_path, $profilephoto_name,  $profile_status]);
                
                // insert query in system logs
                $fullname = getFullName($account_firstname, $account_middlename, $account_lastname, $account_suffixname);
                $position = getPosition($account_type);
                
                $logAction = $position ." ". $fullname . " registered an account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$account_unique, $logAction]);
                
                echo json_encode(['status' => 'success', 'message' => '<li> Account successfully registered. You may login now. </li>']);
                exit();
                } 
            } 
            
        } catch (PDOException $error) { // error in query while checking if username existed
            $message = $error->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
        
    }

    // REGISTER ADMIN
    if(isset($_POST['RegisterAdmin'])) {
        // dd($_POST);
        $account_unique = trimSlash($_POST['RegisterAdminID']);
        $account_firstname = trimSlash($_POST['RegisterAdminFirstname']);
        $account_middlename = trimSlash($_POST['RegisterAdminMiddlename']);
        $account_lastname = trimSlash($_POST['RegisterAdminLastname']);
        $account_suffixname = trimSlash($_POST['RegisterAdminSuffix']);
        $account_username = trimSlash($_POST['RegisterAdminUsername']);
        $account_password = md5(trimSlash($_POST['RegisterAdminPassword']));
        $account_address = trimSlash($_POST['RegisterAdminHomeAddress']);
        $account_email = trimSlash($_POST['RegisterAdminEmailAdd']);
        $account_contactno = trimSlash($_POST['RegisterAdminContactNo']);
        $account_gender = trimSlash($_POST['RegisterAdminGender']);
        $account_dob = trimSlash($_POST['RegisterAdminDob']);

        $account_type = '1';
        $account_request = '1';
        $account_status = 'OFFLINE';

        try {
            $sqlCheckUser = "SELECT account_username FROM accounts WHERE account_username = ?";
            $stmtCheckUser = $pdo->prepare($sqlCheckUser);
            $stmtCheckUser->execute([$account_username]);
            $rowCheckUserCount = $stmtCheckUser->rowCount();

            $error1 = '';
            if($rowCheckUserCount > 0) {
                $error1 = '<li> This username is already taken. </li>';
            } else {
                $error1 = '';
            }

            $sqlCheckID = "SELECT account_unique FROM accounts WHERE account_unique = ?";
            $stmtCheckID = $pdo->prepare($sqlCheckID);
            $stmtCheckID->execute([$account_unique]);
            $rowCheckIDCount = $stmtCheckID->rowCount();

            $error2 = '';
            if($rowCheckIDCount > 0) {
                $error2 = '<li> Employee number already existed! Please check your employee number in your school ID. 
                                    If you encounter a problem with the employee number, email us. </li>';
            } else {
                $error2 = '';
            }
            
            if ($error1 != '' || $error2 != '') {
                echo json_encode(['
                    status'     => 'error', 
                    'error1'    => $error1, 
                    'error2'    => $error2
                ]);
                exit();
                
            } elseif ($error1 == '' && $error2 == '') {
                $sqlRegisterAdminAccounts = "INSERT INTO accounts 
                    (account_unique, account_type, account_request, account_status, 
                    account_username, account_password, 
                    account_firstname, account_middlename, account_lastname, account_suffixname, 
                    account_address, account_email, account_contactno,
                    account_gender, account_dob)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmtRegisterAdminAccounts = $pdo->prepare($sqlRegisterAdminAccounts);
                $stmtRegisterAdminAccounts->execute([
                    $account_unique, $account_type, $account_request, $account_status, 
                    $account_username, $account_password, 
                    $account_firstname, $account_middlename, $account_lastname, $account_suffixname, 
                    $account_address, $account_email, $account_contactno, $account_gender, $account_dob
                ]);

                $sqlRegisterAdminUsers = 'INSERT INTO users (account_unique) VALUES (?)';
                $stmtRegisterAdminUsers = $pdo->prepare($sqlRegisterAdminUsers);
                $stmtRegisterAdminUsers->execute([$account_unique]);

                $profile_status = 'Current';
                // <----- INSERT QUERY for PROFILE COVERS
                $profilecover_name = 'norsu_banner.png';
                $profilecover_path = '/assets/images/icons/';

                // $profilecover_filename = 'coverphoto_'.$user_id.'_'.$time.'_'.$profilecover_name;
                $sqlCover = "INSERT INTO profilecovers (account_unique, profilecover_name, 
                    profilecover_path, profilecover_filename, profilecover_status) VALUES (?,?,?,?,?)";
                $stmtCover = $pdo->prepare($sqlCover);
                $stmtCover->execute([$account_unique, $profilecover_name, $profilecover_path, $profilecover_name, $profile_status]);

                // <----- INSERT QUERY for PROFILE PHOTO
                $profilephoto_name = getProfilePhoto($account_gender);
                $profilephoto_path = '/assets/images/icons/';
                // $profilephoto_filename = 'profilephoto_'.$user_id.'_'.$time.'_'.$profilephoto_name;
                $sqlPhoto = "INSERT INTO profilephotos (account_unique, profilephoto_name, profilephoto_path, 
                    profilephoto_filename, profilephoto_status) VALUES (?,?,?,?,?)";
                $stmtPhoto = $pdo->prepare($sqlPhoto);
                $stmtPhoto->execute([$account_unique, $profilephoto_name, $profilephoto_path, $profilephoto_name,  $profile_status]);
                
                // insert query in system logs
                $fullname = getFullName($account_firstname, $account_middlename, $account_lastname, $account_suffixname);
                $position = getPosition($account_type);
                
                $logAction = $position ." ". $fullname . " registered an account.";
                $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([$account_unique, $logAction]);
                
                echo json_encode(['status' => 'success', 'message' => '<li> Account successfully registered. You may login now. </li>']);
                exit();
            }
            
        } catch (PDOException $th) {
            $message = $th->getMessage();
            // echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }


    }
    
    // edit personal info
    if(isset($_POST['EditProfileInfo'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $fn = trimSlash($_POST['EditProfileFirstname']); 
        $mn = trimSlash($_POST['EditProfileMiddlename']);
        $ln = trimSlash($_POST['EditProfileLastname']); 
        $sn = trimSlash($_POST['EditProfileSuffixname']); 
        $ha = trimSlash($_POST['EditProfileHomeAddress']); 
        $ea = trimSlash($_POST['EditProfileEmailAdd']); 
        $cn = trimSlash($_POST['EditProfileContactNo']); 
        $dob = trimSlash($_POST['EditProfileDob']); 
        $g = trimSlash($_POST['EditProfileGender']);

        try {
            $sql = 'UPDATE accounts SET account_firstname=?, account_middlename=?, account_lastname=?, account_suffixname=?,
                account_address=?, account_email=?, account_contactno=?, account_gender=?, account_dob=? WHERE account_unique=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$fn, $mn, $ln, $sn, $ha, $ea, $cn, $g, $dob, $s_aid]);

            $sqlg = 'SELECT * FROM profilephotos WHERE account_unique=? AND profilephoto_status="Current"';
            $stmtg = $pdo->prepare($sqlg);
            $stmtg->execute([$s_aid]);
            $rowg = $stmtg->fetch();
            $ppn = $rowg['profilephoto_name'];

            // dd($ppn);

            $ppname = getProfilePhoto($g);

            if($ppn == 'male_user.svg' || $ppn == 'female_user.svg'){
                $sqlug = 'UPDATE profilephotos SET profilephoto_name=?, profilephoto_filename=? 
                    WHERE account_unique=? AND profilephoto_status="Current"';
                $stmtug = $pdo->prepare($sqlug);
                $stmtug->execute([$ppname, $ppname, $s_aid]);
            }

            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." personal information.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => '<li> Your personal information has been updated.</li> <li> This page will be refreshed in 5sec to display your updated info. </li>']);
            exit();
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }
    
    // edit other details info
    if(isset($_POST['EditOtherDetailsInfo'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $am = trimSlash($_POST['EditOtherAboutMe']);
        $om = trimSlash($_POST['EditOtherName']);
        $np = trimSlash($_POST['EditOtherNamePronounce']);
        $fq = trimSlash($_POST['EditOtherFaveQuote']);

        try {
            $sql = 'UPDATE users SET user_aboutme=?, user_othername=?, user_namepronounce=?, user_favequotes=?
                WHERE account_unique=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$am, $om, $np, $fq, $s_aid]);
            
            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." other details information.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => '<li> Your other details information has been updated.</li> <li> This page will be refreshed in 5sec to display your updated info. </li>']);
            exit();

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }

    // edit social media info
    if(isset($_POST['EditSocialMediaInfo'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $fbn = trimSlash($_POST['EditSocialMediaFB']);
        $fbl = trimSlash($_POST['EditSocialMediaFBLink']);
        $twn = trimSlash($_POST['EditSocialMediaTW']);
        $twl = trimSlash($_POST['EditSocialMediaTWLink']);
        $ign = trimSlash($_POST['EditSocialMediaIG']);
        $igl = trimSlash($_POST['EditSocialMediaIGLink']);
        $ytn = trimSlash($_POST['EditSocialMediaYT']);
        $ytl = trimSlash($_POST['EditSocialMediaYTLink']);

         try {
            $sql = 'UPDATE users SET user_facebook=?, fb_link=?, user_twitter=?, tw_link=?, user_instagram=?, ig_link=?, user_youtube=?, yt_link=?
                WHERE account_unique=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$fbn,  $fbl, $twn, $twl, $ign, $igl, $ytn, $ytl, $s_aid]);
            
            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." social media information.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => '<li> Your social media information has been updated.</li> <li> This page will be refreshed in 5sec to display your updated info. </li>']);
            exit();

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        } 
    }

    // edit educational info
    if(isset($_POST['EditEducationInfo'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $college= trimSlash($_POST['EditEducationalInfoSelectCollege']); 

        if(!empty($_POST['EditEducationalInfoSelectDepartment'])) {
            $department = trimSlash($_POST['EditEducationalInfoSelectDepartment']); 
        } elseif(empty($_POST['EditEducationalInfoSelectDepartment'])) {
            $department = NULL; 
        }

        if(!empty($_POST['EditEducationalInfoSelectCourse'])) {
            $course = trimSlash($_POST['EditEducationalInfoSelectCourse']); 
        } elseif (empty($_POST['EditEducationalInfoSelectCourse'])){
            $course = NULL; 
        }

        if(!empty($_POST['EditEducationalInfoSelectMajor'])) {
            $major = trimSlash($_POST['EditEducationalInfoSelectMajor']); 
        } elseif(empty($_POST['EditEducationalInfoSelectMajor'])) {
            $major = NULL; 
        }

        try {
            $sql = 'UPDATE users SET college_id=?, department_id=?, course_id=?, major_id=?
                    WHERE account_unique=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$college,  $department, $course, $major, $s_aid]);
            
            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." educational information.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => '<li> Your educational information has been updated.</li> <li> This page will be refreshed in 5sec to display your updated info. </li>']);
            exit();

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        } 
    }

    // dd($_POST);
    // edit loadslip
    if(isset($_POST['EditLoadslipInfo'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $sy = $_POST['EditLoadSlipSelectSchoolyear'];
        $sem = $_POST['EditLoadSlipSelectSemester'];

        $ldname = $_FILES['EditLoadSlip']['name']; 
        $ldtype = $_FILES['EditLoadSlip']['type']; 
        $ldtmp = $_FILES['EditLoadSlip']['tmp_name'];
        $lderror = $_FILES['EditLoadSlip']['error']; 
        $ldsize = $_FILES['EditLoadSlip']['size'];
        
        try {
            $sqlld = 'SELECT * FROM loadslips WHERE account_unique = ?';
            $stmtld = $pdo->prepare($sqlld);
            $stmtld->execute([$s_aid]);
            $rowld = $stmtld->fetch();
            $fldpath = $rowld['loadslip_path'];
            $fldname = $rowld['loadslip_name'];

            unlink(ROOT_PATH.$fldpath.$fldname);

            // school year query
            $sqlSchoolyear = 'SELECT * FROM schoolyear WHERE schoolyear_id = ?';
            $stmtSchoolyear = $pdo->prepare($sqlSchoolyear);
            $stmtSchoolyear->execute([$sy]);
            $rowSchoolyear =  $stmtSchoolyear->fetch();
            $schoolyear_name = $rowSchoolyear['schoolyear_name'];

            // semester query
            $sqlSemester = 'SELECT * FROM semesters WHERE Semester_id = ?';
            $stmtSemester = $pdo->prepare($sqlSemester);
            $stmtSemester->execute([$sem]);
            $rowSemester =  $stmtSemester->fetch();
            $semester_name = $rowSemester['semester_name'];

            // # get image extension store it in var
            $ldex = pathinfo($ldname, PATHINFO_EXTENSION);
            // loadslip upload path directory
            $ldpath = '/upload/users/loadslips/';
            /** renaming the image name (ex. loadslip-201102740_FirstSemester_SY2020-2021.jpg) **/
            $ldnewname = 'Loadslip_'.$s_aid.'_'.$semester_name.'_'.$schoolyear_name.'.'.$ldex;
            // creating upload path on root directory
            $lduploadpath = ROOT_PATH . $ldpath . $ldnewname;

            // <----- UPDATE QUERY for LOADSLIP
            $sqlLoadslip = "UPDATE loadslips SET schoolyear_id =?, semester_id=?, loadslip_path=?, loadslip_name=?
                WHERE account_unique = ?"; 
            $stmtLoadslip = $pdo->prepare($sqlLoadslip);
            $stmtLoadslip->execute([$sy, $sem, $ldpath, $ldnewname, $s_aid]);
            
            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." loadslip.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            echo json_encode(['status' => 'success', 'message' => '<li> Your loadslip has been updated.</li> <li> This page will be refreshed in 5sec to display your updated info. </li>']);
            move_uploaded_file($ldtmp, $lduploadpath);
            exit();

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        } 
    }

    // edit profile photo
    if(isset($_POST['ProfilePhoto'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $image = $_POST['ProfilePhoto'];
        
        list($type, $image) = explode(';',$image);
        list(, $image) = explode(',',$image);
        $image = base64_decode($image);

        $rnd = generateRandomString();
        $ppname = $rnd.'.png';
        $image_name = 'PP_'.$s_aid.'_'.time().'.png';
        // dd($image_name);
        $updir = '/upload/users/profile_photo/';
        $pp_uploadpath = ROOT_PATH . $updir . $image_name;

        try {
            $prev = 'Previous';
            $curr = 'Current';
            $sqlUp = 'UPDATE profilephotos SET profilephoto_status=? WHERE account_unique = ?';
            $stmtUp = $pdo->prepare($sqlUp);
            $stmtUp->execute([$prev, $s_aid]);

            $sqlIn = 'INSERT INTO profilephotos 
                (account_unique, profilephoto_name, profilephoto_path, profilephoto_filename, profilephoto_status)
                VALUES (?,?,?,?,?)';
            $stmtIn = $pdo->prepare($sqlIn);
            $stmtIn->execute([$s_aid, $ppname, $updir, $image_name, $curr]);

            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." profile picture.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            file_put_contents($pp_uploadpath, $image);
            echo json_encode(['status' => 'success', 'message' => '<li> Your profile picture has been updated.</li>']);
            exit();
            // echo 'successfully uploaded';

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        } 
    }
    
    // edit profile cover
    if(isset($_POST['ProfileCover'])) {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $image = $_POST['ProfileCover'];
        
        list($type, $image) = explode(';',$image);
        list(, $image) = explode(',',$image);
        $image = base64_decode($image);

        $rnd = generateRandomString();
        $ppname = $rnd.'.png';
        $image_name = 'PC_'.$s_aid.'_'.time().'.png';
        // dd($image_name);
        $updir = '/upload/users/profile_cover/';
        $pp_uploadpath = ROOT_PATH . $updir . $image_name;

        try {
            $prev = 'Previous';
            $curr = 'Current';
            $sqlUp = 'UPDATE profilecovers SET profilecover_status=? WHERE account_unique = ?';
            $stmtUp = $pdo->prepare($sqlUp);
            $stmtUp->execute([$prev, $s_aid]);

            $sqlIn = 'INSERT INTO profilecovers 
                (account_unique, profilecover_name, profilecover_path, profilecover_filename, profilecover_status)
                VALUES (?,?,?,?,?)';
            $stmtIn = $pdo->prepare($sqlIn);
            $stmtIn->execute([$s_aid, $ppname, $updir, $image_name, $curr]);

            $logAction = $s_position ." ". $s_fullname . " updated ".$s_genderadj." cover photo.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

             

            file_put_contents($pp_uploadpath, $image);
            echo json_encode(['status' => 'success', 'message' => '<li> Your cover photo has been updated.</li>']);
            exit();
            // echo 'successfully uploaded';

        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message;
            exit();
        }
    }
?>
