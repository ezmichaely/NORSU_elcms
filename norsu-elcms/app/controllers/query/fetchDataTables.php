<?php
    include_once('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    // FETCH SYSTEM LOGS
    if (isset($_POST['fetchSystemLogs'])) {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM logs ORDER BY log_datetime DESC";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                    $log_id = $row['log_id'];
                    $log_action = $row['log_action'];
                    $log_datetime = $row['log_datetime'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td class="text-start">'.$log_action.'</td>
                        <td>'.$log_datetime.'</td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH SYSTEM LOGS

    // FETCH Position
    if (isset($_POST['fetchPosition'])) {
        $i = 0;
        $sql = "";
        $sql .= "SELECT * FROM atypes";
        
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        $sql .= " LIMIT :start, :limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['start' => $start, 'limit' => $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                    $atype_id = $row['atype_id'];
                    $atype_name = $row['atype_name'];
                    $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$atype_name.'</td>
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH POSITION

    // FETCH FACULTY DEPT MEMBERS
    if (isset($_POST['fetchDeptFacultyMembers'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*,
            COUNT(IF(cls.class_teacher IS NULL, 0, 1)) AS classCount
            FROM users AS u
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classes AS cls ON cls.class_teacher = u.account_unique
            WHERE u.department_id = ? GROUP BY a.account_unique";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uudid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];

                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH FACULTY DEPT MEMBERS

    // FETCH DEPT CLASSES
    if (isset($_POST['fetchDeptClasses'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cls.*,sub.*, sy.*, sem.*, modu.*,
            SUM(IF(clsm.class_student IS NULL, 0, 1)) AS studentCount
            FROM classes AS cls
            INNER JOIN subjects AS sub ON sub.subject_id = cls.class_subject
            INNER JOIN schoolyear AS sy ON cls.class_schoolyear = sy.schoolyear_id
            INNER JOIN semesters AS sem ON cls.class_semester = sem.semester_id 
            INNER JOIN modules AS modu ON cls.class_module = modu.module_code 
            INNER JOIN accounts AS a ON a.account_unique = cls.class_teacher
            INNER JOIN users AS u ON cls.class_teacher = u.account_unique
            LEFT JOIN classmembers AS clsm ON clsm.class_code = cls.class_code
            WHERE u.department_id = ? GROUP BY a.account_unique";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uudid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $sc = $row['studentCount'];
                
                $ccode = $row['class_code'];
                $cmodule = $row['class_module']; 
                $csub = $row['class_subject'];
                $csubcode = $row['subject_code'];
                $csy = $row['class_schoolyear']; 
                $syname = $row['schoolyear_name'];
                $csem = $row['class_semester'];
                $semname = $row['semester_name'];
                $cday = $row['class_day']; 
                $ctime = $row['class_time']; 
                $csec = $row['class_section']; 
                $mtitle = $row['module_title'];

                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$ccode.'</td>
                        <td>'.$cday.' - '.$ctime.'</td>
                        <td>'.$semname.' - '.$syname.'</td>
                        <td>'.$csubcode.' - '.$csec.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$cmodule.'&a=view" target="_blank">
                            '.$mtitle.'
                            </a>
                        </td>
                        <td>'.$fullname.'</td>
                        <td>'.$sc.'</td>
                        <!--
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/class-home.php?ccode='.$ccode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        -->
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH DEPT CLASSES
    
    // FETCH DEPT MODULES 
    if (isset($_POST['fetchDeptModules'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT 
                SUM(IF(ot.module_code IS NULL, 0, 1)) AS outlineCount,

                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                u0.account_unique AS u0aid, u0.department_id AS u0udid,

                ac.account_unique AS acaid, ac.account_firstname AS acafn, ac.account_middlename AS acamn, 
                ac.account_lastname AS acaln, ac.account_suffixname AS acasn,

                u1.account_unique AS u1aid, u1.department_id AS u1udid

                FROM modules AS m
                LEFT JOIN outlines AS ot ON ot.module_code = m.module_code
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN users AS u0 ON aa.account_unique = u0.account_unique
                INNER JOIN accounts AS ac ON ac.account_unique = m.module_copier
                INNER JOIN users AS u1 ON aa.account_unique = u1.account_unique
                WHERE u0.department_id = ? OR u1.department_id = ? 
                GROUP BY m.module_code
                ORDER BY module_datetime DESC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uudid, $s_uudid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $otcount = $row['outlineCount'];
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

                $response .= '
                    <tr>
                        <td>'.$mmcode.'</td>
                        <td>'.$mmwater.'</td>
                        <td>'.$mmtitle.'</td>
                        <td>'.$sscode.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank">
                            '.$aafullname.'
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$acaid.'" target="_blank">
                            '.$acfullname.'
                            </a>
                        </td>';
                        if($mmconsent == 'Agreed') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }
                        if($mmconsent == 'Declined') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'To be Publish') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Published') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        $response .= '<td>'.$otcount.'</td>
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$mmcode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH DEPT MODULES 

    // FETCH DEPT MODULE APPROVAL
    if (isset($_POST['fetchDeptModuleApproval'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT 
                SUM(IF(ot.module_code IS NULL, 0, 1)) AS outlineCount,

                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                u0.account_unique AS u0aid, u0.department_id AS u0udid

                FROM modules AS m
                LEFT JOIN outlines AS ot ON ot.module_code = m.module_code
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN users AS u0 ON aa.account_unique = u0.account_unique

                WHERE u0.department_id = ? AND m.module_status = 'Dept Head: For Approval'
                GROUP BY m.module_code
                ORDER BY module_datetime DESC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uudid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $otcount = $row['outlineCount'];
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

                $aafullname = getFullName($aaafn, $aaamn, $aaaln, $aaasn);
                
                $response .= '
                    <tr>
                    <!--
                        <td>'.$mmcode.'</td>
                        <td>'.$mmwater.'</td> -->
                        <td>'.$mmtitle.'</td>
                        <td>'.$sscode.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank">
                            '.$aafullname.'
                            </a>
                        </td>';
                        if($mmconsent == 'Agreed') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }
                        if($mmconsent == 'Declined') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        $response .= '<td>'.$otcount.'</td>
                         <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$mmcode.'&a=view" 
                                class="btn btn-primary btn-sm ispan-md" target="_blank">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                             

                            <button type="button" id="GetApproveModule" class="btn btn-success btn-sm my-2"
                                data-bs-toggle="modal" data-bs-target="#ApproveModuleModal" data-mcode="'.$mmcode.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetReviseModule" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#ReviseModuleModal" data-mcode="'.$mmcode.'">
                                <i class="fa fa-reply"></i>
                            </button>
                         </td> 
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF DEPT MODULE APPROVAL

    // FETCH FACULTY COLLEGE MEMBERS
    if (isset($_POST['fetchCollegeFacultyMembers'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, d.*, 
            COUNT(IF(cls.class_teacher IS NULL, 0, 1)) AS classCount
            FROM users AS u
            LEFT JOIN departments AS d ON d.department_id = u.department_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classes AS cls ON cls.class_teacher = u.account_unique
            WHERE u.college_id = ? AND NOT a.account_type = '2' 
                AND NOT a.account_type = '1'
            GROUP BY a.account_unique 
            ORDER BY a.account_type ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uuclid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $ddname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aty = $row['account_type'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];

                $position = getPosition($aty);
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                    <td>'.$aid.'</td>
                        <td>'.$position.'</td>
                        <td>'.$ddname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH FACULTY COLLEGE MEMBERS

    // FETCH COLLEGE STUDENTS
    if (isset($_POST['fetchCollegeStudents'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cr.*, 
            COUNT(IF(clsm.class_student IS NULL, 0, 1)) AS classCount
            FROM users AS u
            INNER JOIN courses AS cr ON cr.course_id = u.course_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classmembers AS clsm ON clsm.class_student = u.account_unique
            WHERE u.college_id = ? GROUP BY a.account_unique 
            ORDER BY course_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uuclid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $crname = $row['course_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$crname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE STUDENTS

    // FETCH COLLEGE CLASSES
    if (isset($_POST['fetchCollegeClasses'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cls.*,sub.*, sy.*, sem.*, modu.*, dp.*,
            SUM(IF(clsm.class_student IS NULL, 0, 1)) AS studentCount
            FROM classes AS cls
            INNER JOIN subjects AS sub ON sub.subject_id = cls.class_subject
            INNER JOIN schoolyear AS sy ON cls.class_schoolyear = sy.schoolyear_id
            INNER JOIN semesters AS sem ON cls.class_semester = sem.semester_id 
            INNER JOIN modules AS modu ON cls.class_module = modu.module_code 
            INNER JOIN accounts AS a ON a.account_unique = cls.class_teacher
            INNER JOIN users AS u ON cls.class_teacher = u.account_unique
            INNER JOIN departments AS dp ON dp.department_id = u.department_id
            LEFT JOIN classmembers AS clsm ON clsm.class_code = cls.class_code
            WHERE u.college_id = ? GROUP BY a.account_unique ORDER BY department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uuclid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $ddname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $sc = $row['studentCount'];
                
                $ccode = $row['class_code'];
                $cmodule = $row['class_module']; 
                $csub = $row['class_subject'];
                $csubcode = $row['subject_code'];
                $csy = $row['class_schoolyear']; 
                $syname = $row['schoolyear_name'];
                $csem = $row['class_semester'];
                $semname = $row['semester_name'];
                $cday = $row['class_day']; 
                $ctime = $row['class_time']; 
                $csec = $row['class_section']; 
                $mtitle = $row['module_title'];

                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$ddname.'</td>
                        <td>'.$ccode.'</td>
                        <td>'.$cday.' - '.$ctime.'</td>
                        <td>'.$semname.' - '.$syname.'</td>
                        <td>'.$csubcode.' - '.$csec.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$cmodule.'&a=view" target="_blank">
                            '.$mtitle.'
                            </a>
                        </td>
                        <td>'.$fullname.'</td>
                        <td>'.$sc.'</td>
                        <!--
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/class-home.php?ccode='.$ccode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        -->
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE CLASSES
    
    // FETCH COLLEGE MODULES 
    if (isset($_POST['fetchCollegeModules'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT 
                SUM(IF(ot.module_code IS NULL, 0, 1)) AS outlineCount,

                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                u0.account_unique AS u0aid, u0.college_id AS u0uclclid,

                ac.account_unique AS acaid, ac.account_firstname AS acafn, ac.account_middlename AS acamn, 
                ac.account_lastname AS acaln, ac.account_suffixname AS acasn,

                u1.account_unique AS u1aid, u1.college_id AS u1uclclid,
                u1.department_id AS u1udid,

                dp.department_id AS dpid, dp.department_name AS dpname, dp.department_acronym AS dpacro

                FROM modules AS m
                LEFT JOIN outlines AS ot ON ot.module_code = m.module_code
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN users AS u0 ON aa.account_unique = u0.account_unique
                INNER JOIN accounts AS ac ON ac.account_unique = m.module_copier
                INNER JOIN users AS u1 ON aa.account_unique = u1.account_unique
                INNER JOIN departments AS dp ON dp.department_id = u1.department_id
                WHERE u0.college_id = ? OR u1.college_id = ? 
                GROUP BY m.module_code
                ORDER BY module_datetime DESC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uuclid, $s_uuclid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $dpacro = $row['dpacro'];
                $otcount = $row['outlineCount'];
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

                $response .= '
                    <tr>
                        <td>'.$dpacro.'</td>
                        <td>'.$mmcode.'</td>
                        <td>'.$mmwater.'</td>
                        <td>'.$mmtitle.'</td>
                        <td>'.$sscode.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank">
                            '.$aafullname.'
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$acaid.'" target="_blank">
                            '.$acfullname.'
                            </a>
                        </td>';
                        if($mmconsent == 'Agreed') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }
                        if($mmconsent == 'Declined') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'To be Publish') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Published') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        $response .= '<td>'.$otcount.'</td>
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$mmcode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE MODULES 

    // FETCH COLLEGE MODULE APPROVAL
    if (isset($_POST['fetchCollegeModuleApproval'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT 
                SUM(IF(ot.module_code IS NULL, 0, 1)) AS outlineCount,

                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                u0.account_unique AS u0aid, u0.college_id AS u0uclclid

                FROM modules AS m
                LEFT JOIN outlines AS ot ON ot.module_code = m.module_code
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN users AS u0 ON aa.account_unique = u0.account_unique

                WHERE u0.college_id = ? AND m.module_status = 'Dean: For Approval'
                GROUP BY m.module_code
                ORDER BY module_datetime DESC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$s_uuclid, $start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $otcount = $row['outlineCount'];
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

                $aafullname = getFullName($aaafn, $aaamn, $aaaln, $aaasn);
                
                $response .= '
                    <tr>
                    <!--
                        <td>'.$mmcode.'</td>
                        <td>'.$mmwater.'</td> -->
                        <td>'.$mmtitle.'</td>
                        <td>'.$sscode.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank">
                            '.$aafullname.'
                            </a>
                        </td>';
                        if($mmconsent == 'Agreed') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }
                        if($mmconsent == 'Declined') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        $response .= '<td>'.$otcount.'</td>
                        
                         <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$mmcode.'&a=view" 
                                class="btn btn-primary btn-sm ispan-md" target="_blank">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                             

                            <button type="button" id="GetApproveModule" class="btn btn-success btn-sm  my-2"
                                data-bs-toggle="modal" data-bs-target="#ApproveModuleModal" data-mcode="'.$mmcode.'">
                                <i class="fa fa-check"></i>
                            </button>

                            <button type="button" id="GetReviseModule" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#ReviseModuleModal" data-mcode="'.$mmcode.'">
                                <i class="fa fa-reply"></i>
                            </button>
                         </td> 
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE MODULE APPROVAL

    // FETCH ALL STUDENTS
    if (isset($_POST['fetchAllStudents'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cr.*, cl.*,
            COUNT(IF(clsm.class_student IS NULL, 0, 1)) AS classCount
            FROM users AS u
            INNER JOIN courses AS cr ON cr.course_id = u.course_id
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classmembers AS clsm ON clsm.class_student = u.account_unique
            WHERE a.account_type = '2'
            GROUP BY a.account_unique 
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
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$crname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL STUDENTS

    // FETCH ALL INSTRUCTORS
    if (isset($_POST['fetchAllInstructors'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cl.*, cls.*, d.*,
            COUNT(IF(cls.class_teacher IS NULL, 0, 1)) AS classCount
            FROM users AS u
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            INNER JOIN departments AS d ON d.department_id = u.department_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classes AS cls ON cls.class_teacher = u.account_unique
            WHERE a.account_type = '3'
            GROUP BY a.account_unique 
            ORDER BY college_acronym ASC, department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $dname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$dname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL INSTRUCTORS

    // FETCH ALL DEPT HEAD
    if (isset($_POST['fetchAllDeptHead'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cl.*, cls.*, d.*,
            COUNT(IF(cls.class_teacher IS NULL, 0, 1)) AS classCount
            FROM users AS u
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            INNER JOIN departments AS d ON d.department_id = u.department_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            LEFT JOIN classes AS cls ON cls.class_teacher = u.account_unique
            WHERE a.account_type = '4'
            GROUP BY a.account_unique 
            ORDER BY college_acronym ASC, department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $dname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $cc = $row['classCount'];
                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$dname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>'.$cc.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL DEPT HEAD

    // FETCH ALL COLLEGE DEAN
    if (isset($_POST['fetchAllDean'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cl.*
            FROM users AS u
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            WHERE a.account_type = '5'
            GROUP BY a.account_unique 
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
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];

                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$clname.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL COLLEGE DEAN

    // FETCH ALL ADMIN
    if (isset($_POST['fetchAllAdmin'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*
            FROM users AS u
            INNER JOIN accounts AS a ON a.account_unique = u.account_unique
            WHERE a.account_type = '1'
            GROUP BY a.account_unique 
            ORDER BY a.account_unique ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);

                $aid = $row['account_unique'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];

                $fullname = getFullName($afn, $amn, $aln, $asn);

                $response .= '
                    <tr>
                        <td>'.$aid.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$acn.'</td>
                        <td>
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'" 
                            class="btn btn-primary btn-sm ispan-md" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL ADMIN

    // FETCH ALL CLASSES
    if (isset($_POST['fetchAllClasses'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT u.*, a.*, cls.*,sub.*, sy.*, sem.*, modu.*, dp.*, cl.*,
            SUM(IF(clsm.class_student IS NULL, 0, 1)) AS studentCount
            FROM classes AS cls
            INNER JOIN subjects AS sub ON sub.subject_id = cls.class_subject
            INNER JOIN schoolyear AS sy ON cls.class_schoolyear = sy.schoolyear_id
            INNER JOIN semesters AS sem ON cls.class_semester = sem.semester_id 
            INNER JOIN modules AS modu ON cls.class_module = modu.module_code 
            INNER JOIN accounts AS a ON a.account_unique = cls.class_teacher
            INNER JOIN users AS u ON cls.class_teacher = u.account_unique
            INNER JOIN colleges AS cl ON cl.college_id = u.college_id
            INNER JOIN departments AS dp ON dp.department_id = u.department_id
            LEFT JOIN classmembers AS clsm ON clsm.class_code = cls.class_code
            GROUP BY a.account_unique ORDER BY college_acronym ASC, department_acronym ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clname = $row['college_acronym'];
                $ddname = $row['department_acronym'];
                $aid = $row['account_unique'];
                $atype = $row['account_type'];
                $aun = $row['account_username'];
                $afn = $row['account_firstname']; 
                $amn = $row['account_middlename'];
                $aln = $row['account_lastname']; 
                $asn = $row['account_suffixname'];
                $ae = $row['account_email'];
                $acn = $row['account_contactno'];
                $sc = $row['studentCount'];
                
                $ccode = $row['class_code'];
                $cmodule = $row['class_module']; 
                $csub = $row['class_subject'];
                $csubcode = $row['subject_code'];
                $csy = $row['class_schoolyear']; 
                $syname = $row['schoolyear_name'];
                $csem = $row['class_semester'];
                $semname = $row['semester_name'];
                $cday = $row['class_day']; 
                $ctime = $row['class_time']; 
                $csec = $row['class_section']; 
                $mtitle = $row['module_title'];

                $fullname = getFullName($afn, $amn, $aln, $asn);
                $atype = getPosition($atype);

                $response .= '
                    <tr>
                        <td>'.$clname.'</td>
                        <td>'.$ddname.'</td>
                        <td>'.$ccode.'</td>
                        <td>'.$cday.' - '.$ctime.'</td>
                        <td>'.$semname.' - '.$syname.'</td>
                        <td>'.$csubcode.' - '.$csec.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$cmodule.'&a=view" target="_blank">
                            '.$mtitle.'
                            </a>
                        </td>
                        <td>'.$fullname.'</td>
                        <td>'.$atype.'</td>
                        <td>'.$sc.'</td>
                        <!--
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/class-home.php?ccode='.$ccode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        -->
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH COLLEGE CLASSES
    
    // FETCH ALL MODULES 
    if (isset($_POST['fetchAllModules'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $i = 0;
        $sql = "";
        $sql .= "SELECT 
                SUM(IF(ot.module_code IS NULL, 0, 1)) AS outlineCount,

                m.module_id AS mmid, m.module_code AS mmcode, m.module_watermark AS mmwm,
                m.subject_id AS msid, m.module_title AS mmtitle, m.module_intro AS mmintro, m.module_outcomes AS mmoutcomes, 
                m.module_author AS mmauthor, m.module_copier AS mmcopier, m.module_consent AS mmconsent, 
                m.module_status AS mmstatus, 

                s.subject_id AS ssid, s.subject_code AS sscode, s.subject_title AS sstitle,

                aa.account_unique AS aaaid, aa.account_firstname AS aaafn, aa.account_middlename AS aaamn, 
                aa.account_lastname AS aaaln, aa.account_suffixname AS aaasn,

                u0.account_unique AS u0aid, u0.college_id AS u0uclclid, u0.department_id AS u0udid,

                ac.account_unique AS acaid, ac.account_firstname AS acafn, ac.account_middlename AS acamn, 
                ac.account_lastname AS acaln, ac.account_suffixname AS acasn,

                u1.account_unique AS u1aid, u1.college_id AS u1uclclid,
                u1.department_id AS u1udid,

                cl.college_id AS clid, cl.college_name AS clname, cl.college_acronym AS clacro,
                dp.department_id AS dpid, dp.department_name AS dpname, dp.department_acronym AS dpacro

                FROM modules AS m
                LEFT JOIN outlines AS ot ON ot.module_code = m.module_code
                INNER JOIN subjects AS s ON s.subject_id = m.subject_id
                INNER JOIN accounts AS aa ON aa.account_unique = m.module_author
                INNER JOIN users AS u0 ON aa.account_unique = u0.account_unique
                INNER JOIN accounts AS ac ON ac.account_unique = m.module_copier
                INNER JOIN users AS u1 ON aa.account_unique = u1.account_unique
                INNER JOIN colleges AS cl ON cl.college_id = u1.college_id
                INNER JOIN departments AS dp ON dp.department_id = u1.department_id
                GROUP BY m.module_code
                ORDER BY module_datetime DESC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            while ($row = $stmt->fetch()) {
                // dd($row);
                $clacro = $row['clacro'];
                $dpacro = $row['dpacro'];
                $otcount = $row['outlineCount'];
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

                $response .= '
                    <tr>
                        <td>'.$clacro.'</td>
                        <td>'.$dpacro.'</td>
                        <td>'.$mmcode.'</td>
                        <td>'.$mmwater.'</td>
                        <td>'.$mmtitle.'</td>
                        <td>'.$sscode.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank">
                            '.$aafullname.'
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$acaid.'" target="_blank">
                            '.$acfullname.'
                            </a>
                        </td>';
                        if($mmconsent == 'Agreed') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }
                        if($mmconsent == 'Declined') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmconsent.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'To be Publish') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dept Head: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Approval') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Dean: For Revision') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        if($mmstatus == 'Published') {
                            $response .= '<td>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    '.$mmstatus.'
                                </span>
                                </td>';
                        }

                        $response .= '<td>'.$otcount.'</td>
                         <td>
                             <a href="'.BASE_URL . '/'.$s_directory.'/module-read.php?mcode='.$mmcode.'&a=view" 
                             class="btn btn-primary btn-sm ispan-md" target="_blank">
                             <i class="fa-solid fa-eye"></i>
                             </a>
                         </td> 
                        
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL MODULES 

    // FETCH ALL POSTS
    if (isset($_POST['fetchAllPosts'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        $sql = "";
        $sql .= "SELECT 
                SUM(IF(pt.account_unique IS NULL, 0, 1)) AS postCount,

                a.account_unique AS aaaid, a.account_firstname AS aaafn, a.account_middlename AS aaamn, 
                a.account_lastname AS aaaln, a.account_suffixname AS aaasn, a.account_type AS aaat

                FROM accounts AS a
                LEFT JOIN posts AS pt ON pt.account_unique = a.account_unique
                GROUP BY a.account_unique
                ORDER BY a.account_type ASC";
        $sql .= " LIMIT ?, ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$start, $limit]); 
        if($stmt->rowCount() > 0) {
            $response = '';
            $i = 0;
            while ($row = $stmt->fetch()) {
                // dd($row);
                $postCount = $row['postCount'];
                $aaat = $row['aaat'];
                $aaaid = $row['aaaid']; 
                $aaafn = $row['aaafn'];
                $aaamn = $row['aaamn'];  
                $aaaln = $row['aaaln'];
                $aaasn = $row['aaasn'];

                $aafullname = getFullName($aaafn, $aaamn, $aaaln, $aaasn);
                $position = getPosition($aaat);
                
                $response .= '
                    <tr>
                        <td>'.++$i.'</td>
                        <td>'.$position.'</td>
                        <td>'.$aaaid.'</td>
                        <td>'.$aafullname.'</td>
                        <td>'.$postCount.'</td>
                        <td class="text-center">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aaaid.'" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                ';
            } exit($response);
        } else {
            exit('reachedMax');
        }
    }// END OF FETCH ALL POSTS

?>
