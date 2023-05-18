<?php 
    $sqlUser = 
        "SELECT 
            a.account_unique AS aid, a.account_type AS aat, a.account_status AS aas,
            a.account_username AS aau, a.account_password AS aap, a.account_firstname AS aafn, 
            a.account_middlename AS aamn, a.account_lastname AS aaln, a.account_suffixname AS aasn, 
            a.account_address AS aaa, a.account_email AS aae, a.account_contactno AS aac, 
            a.account_gender AS aag, a.account_dob AS aadob,

            at.atype_id AS atatid, at.atype_name AS atatn,

            u.account_unique AS uaid, u.college_id AS uuclid, u.department_id AS uudid,
            u.course_id AS uucrid, u.major_id AS uumid,  
            u.user_facebook AS uufb, u.user_twitter AS uutw, u.user_instagram AS uuig, u.user_youtube AS uuyt,
            u.fb_link AS uufblink, u.tw_link AS uutwlink, u.ig_link AS uuiglink, u.yt_link AS uuytlink,
            
            u.user_aboutme AS uuam, u.user_othername AS uuon, u.user_namepronounce AS uunp, u.user_favequotes AS uufq,

            cl.college_id AS clclid, cl.college_name AS clcln, cl.college_acronym AS clclan, 
            
            d.department_id AS ddid, d.college_id AS dclid, d.department_name AS ddn, d.department_acronym AS ddan,

            cr.course_id AS crcrid, cr.college_id AS crclid, cr.course_name AS crcrn, cr.course_acronym AS crcran,

            m.major_id AS mmid, m.major_id AS mcrid, m.major_name AS mmn,

            ld.loadslip_id AS ldldid, ld.account_unique AS ldaid, ld.schoolyear_id AS ldsyid, ld.semester_id AS ldsid, 

            sy.schoolyear_id AS sysyid, sy.schoolyear_name AS sysyn, sy.schoolyear_start AS sysys, sy.schoolyear_end AS sysye, 

            s.semester_id AS ssid, s.semester_name AS ssn,

            pc.profilecover_id AS pcpcid, pc.account_unique AS pcaid, pc.profilecover_name AS pcpcn, 
            pc.profilecover_caption AS pcpcc, pc.profilecover_path AS pcpcp, 
            pc.profilecover_filename AS pcpcfn, pc.profilecover_datetime AS pcpcdt,
            pc.profilecover_status AS pcpcs,

            pp.profilephoto_id AS ppppid, pp.account_unique AS ppaid, pp.profilephoto_name AS ppppn, 
            pp.profilephoto_caption AS ppppc, pp.profilephoto_path AS ppppp, 
            pp.profilephoto_filename AS ppppfn, pp.profilephoto_datetime AS ppppdt,
            pp.profilephoto_status AS pppps

            FROM accounts AS a 
            INNER JOIN users AS u ON u.account_unique = a.account_unique
            INNER JOIN atypes AS at ON a.account_type = at.atype_id
            LEFT JOIN colleges AS cl ON u.college_id = cl.college_id
            LEFT JOIN departments AS d ON u.department_id = d.department_id
            LEFT JOIN courses AS cr ON u.course_id = cr.course_id
            LEFT JOIN majors AS m ON u.major_id = m.major_id
            LEFT JOIN loadslips AS ld ON a.account_unique = ld.account_unique
            LEFT JOIN schoolyear AS sy ON ld.schoolyear_id = sy.schoolyear_id
            LEFT JOIN semesters AS s ON ld.semester_id = s.semester_id
            INNER JOIN profilecovers AS pc ON a.account_unique = pc.account_unique
            INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique
            WHERE a.account_unique = ? AND pc.profilecover_status = 'Current' AND pp.profilephoto_status = 'Current'" ;

    $stmtUser = $pdo->prepare($sqlUser);
    $stmtUser->execute([$u_aid]); 
    // $rowUser = $stmtUser->fetch();
    
    if ($stmtUser->rowCount() > 0 ) {
        $sqlContact = "SELECT * FROM contacts WHERE contact_sender =? AND contact_receiver = ?";
        $stmtContact = $pdo->prepare($sqlContact);
        $stmtContact->execute([$s_aid, $u_aid]); 
        $contact = $stmtContact->rowCount();
        while ($rowUser = $stmtUser->fetch()) {
            // dd($rowUser);
            $u_aid = $rowUser['aid']; 
            $u_aat = $rowUser['aat']; 
            $u_aas =  $rowUser['aas']; 
            $u_aau =  $rowUser['aau'];
            $u_aap =  $rowUser['aap']; 
            $u_aafn =  $rowUser['aafn']; 
            $u_aamn =  $rowUser['aamn'];  
            $u_aaln =  $rowUser['aaln']; 
            $u_aasn =  $rowUser['aasn'];
            $u_aaa =  $rowUser['aaa']; 
            $u_aae =  $rowUser['aae']; 
            $u_aac =  $rowUser['aac'];
            $u_aag = $rowUser['aag'];
            $u_aadob = $rowUser['aadob'];

            $u_atatid = $rowUser['atatid'];
            $u_atatn = $rowUser['atatn'];

            $u_uaid = $rowUser['uaid'];
            $u_uuclid = $rowUser['uuclid'];
            $u_uudid = $rowUser['uudid'];
            $u_uucrid = $rowUser['uucrid'];
            $u_uumid = $rowUser['uumid'];

            $u_uufb = $rowSessionUser['uufb'];
            $u_uutw = $rowSessionUser['uutw'];
            $u_uuig = $rowSessionUser['uuig'];
            $u_uuyt = $rowSessionUser['uuyt'];
            $u_uufblink = $rowSessionUser['uufblink'];
            $u_uutwlink = $rowSessionUser['uutwlink'];
            $u_uuiglink = $rowSessionUser['uuiglink'];
            $u_uuytlink = $rowSessionUser['uuytlink'];

            $u_uuam = $rowUser['uuam'];
            $u_uuon = $rowUser['uuon'];
            $u_uunp = $rowUser['uunp'];
            $u_uufq = $rowUser['uufq'];

            $u_clclid = $rowUser['clclid'];
            $u_clcln = $rowUser['clcln'];
            $u_clclan = $rowUser['clclan'];

            $u_ddid = $rowUser['ddid'];
            $u_dclid = $rowUser['dclid'];
            $u_ddn = $rowUser['ddn'];
            $u_ddan = $rowUser['ddan'];

            $u_crcrid = $rowUser['crcrid'];
            $u_crclid = $rowUser['crclid'];
            $u_crcrn = $rowUser['crcrn'];
            $u_crcran = $rowUser['crcran'];

            $u_mmid = $rowUser['mmid'];
            $u_mcrid = $rowUser['mcrid'];
            $u_mmn = $rowUser['mmn'];

            $u_ldldid = $rowUser['ldldid'];
            $u_ldaid = $rowUser['ldaid'];
            $u_ldsyid = $rowUser['ldsyid'];
            $u_ldsid = $rowUser['ldsid'];

            $u_sysyid = $rowUser['sysyid'];
            $u_sysyn = $rowUser['sysyn'];
            $u_sysys = $rowUser['sysys'];
            $u_sysye = $rowUser['sysye'];

            $u_ssid = $rowUser['ssid'];
            $u_ssn = $rowUser['ssn'];
            
            $u_pcpcid = $rowUser['pcpcid'];
            $u_pcaid = $rowUser['pcaid'];
            $u_pcpcn = $rowUser['pcpcn'];
            $u_pcpcc = $rowUser['pcpcc'];
            $u_pcpcp = $rowUser['pcpcp'];
            $u_pcpcfn = $rowUser['pcpcfn'];
            $u_pcpcdt = $rowUser['pcpcdt'];
            $u_pcpcs = $rowUser['pcpcs'];

            $u_ppppid = $rowUser['ppppid'];
            $u_ppaid = $rowUser['ppaid'];
            $u_ppppn = $rowUser['ppppn'];
            $u_ppppc = $rowUser['ppppc'];
            $u_ppppp = $rowUser['ppppp'];
            $u_ppppfn = $rowUser['ppppfn'];
            $u_ppppdt = $rowUser['ppppdt'];
            $u_pppps = $rowUser['pppps'];

            $u_aadobfjy = $u_aadob = date("F j, Y");
            $u_aadobymd = $u_aadob = date("Y-m-d");
            $u_fullname = getFullName($u_aafn, $u_aamn, $u_aaln, $u_aasn);
            $u_position = getPosition($u_aat);
            $u_directory = getDirectory($u_aat);
            $u_genderadj = getGenderAdj($u_aag);
            $u_profilecover = getPhotoPath($u_pcpcp, $u_pcpcfn);
            $u_profilephoto = getPhotoPath($u_ppppp, $u_ppppfn);
        }
    } else {
        header('Location: ' .BASE_URL. '/404.php');
        exit();
    }

    
    // $rowContact = $stmtContact->fetch();
    // dd($contact);
?>
