<?php 
    $sqlSessionUser = 
        "SELECT 
            a.account_unique AS aid, a.account_type AS aat, a.account_request AS aar, a.account_status AS aas,
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
            ld.loadslip_path AS ldldp, ld.loadslip_name AS ldldn,

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
            INNER JOIN atypes AS at ON a.account_type = at.atype_id
            INNER JOIN users AS u ON a.account_unique = u.account_unique
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

    $stmtSessionUser = $pdo->prepare($sqlSessionUser);
    $stmtSessionUser->execute([$s_aid]); 
    $rowSessionUser = $stmtSessionUser->fetch();

    // dd($rowSessionUser);
    $s_aid = $rowSessionUser['aid']; 
    $s_aat = $rowSessionUser['aat']; 
    $s_aar = $rowSessionUser['aar']; 
    $s_aas =  $rowSessionUser['aas']; 
    $s_aau =  $rowSessionUser['aau'];
    $s_aap =  $rowSessionUser['aap']; 
    $s_aafn =  $rowSessionUser['aafn']; 
    $s_aamn =  $rowSessionUser['aamn'];  
    $s_aaln =  $rowSessionUser['aaln']; 
    $s_aasn =  $rowSessionUser['aasn'];
    $s_aaa =  $rowSessionUser['aaa']; 
    $s_aae =  $rowSessionUser['aae']; 
    $s_aac =  $rowSessionUser['aac'];
    $s_aag = $rowSessionUser['aag'];
    $s_aadob = $rowSessionUser['aadob'];

    $s_atatid = $rowSessionUser['atatid'];
    $s_atatn = $rowSessionUser['atatn'];

    $s_uaid = $rowSessionUser['uaid'];
    $s_uuclid = $rowSessionUser['uuclid'];
    $s_uudid = $rowSessionUser['uudid'];
    $s_uucrid = $rowSessionUser['uucrid'];
    $s_uumid = $rowSessionUser['uumid'];
    
    $s_uufb = $rowSessionUser['uufb'];
    $s_uutw = $rowSessionUser['uutw'];
    $s_uuig = $rowSessionUser['uuig'];
    $s_uuyt = $rowSessionUser['uuyt'];
    $s_uufblink = $rowSessionUser['uufblink'];
    $s_uutwlink = $rowSessionUser['uutwlink'];
    $s_uuiglink = $rowSessionUser['uuiglink'];
    $s_uuytlink = $rowSessionUser['uuytlink'];

    $s_uuam = $rowSessionUser['uuam'];
    $s_uuon = $rowSessionUser['uuon'];
    $s_uunp = $rowSessionUser['uunp'];
    $s_uufq = $rowSessionUser['uufq'];

    $s_clclid = $rowSessionUser['clclid'];
    $s_clcln = $rowSessionUser['clcln'];
    $s_clclan = $rowSessionUser['clclan'];

    $s_ddid = $rowSessionUser['ddid'];
    $s_dclid = $rowSessionUser['dclid'];
    $s_ddn = $rowSessionUser['ddn'];
    $s_ddan = $rowSessionUser['ddan'];

    $s_crcrid = $rowSessionUser['crcrid'];
    $s_crclid = $rowSessionUser['crclid'];
    $s_crcrn = $rowSessionUser['crcrn'];
    $s_crcran = $rowSessionUser['crcran'];

    $s_mmid = $rowSessionUser['mmid'];
    $s_mcrid = $rowSessionUser['mcrid'];
    $s_mmn = $rowSessionUser['mmn'];

    $s_ldldid = $rowSessionUser['ldldid'];
    $s_ldaid = $rowSessionUser['ldaid'];
    $s_ldsyid = $rowSessionUser['ldsyid'];
    $s_ldsid = $rowSessionUser['ldsid'];
    $s_ldldp = $rowSessionUser['ldldp'];
    $s_ldldn = $rowSessionUser['ldldn'];

    $loadslip = BASE_URL . $s_ldldp . $s_ldldn;


    $s_sysyid = $rowSessionUser['sysyid'];
    $s_sysyn = $rowSessionUser['sysyn'];
    $s_sysys = $rowSessionUser['sysys'];
    $s_sysye = $rowSessionUser['sysye'];

    $s_ssid = $rowSessionUser['ssid'];
    $s_ssn = $rowSessionUser['ssn'];
    
    $s_pcpcid = $rowSessionUser['pcpcid'];
    $s_pcaid = $rowSessionUser['pcaid'];
    $s_pcpcn = $rowSessionUser['pcpcn'];
    $s_pcpcc = $rowSessionUser['pcpcc'];
    $s_pcpcp = $rowSessionUser['pcpcp'];
    $s_pcpcfn = $rowSessionUser['pcpcfn'];
    $s_pcpcdt = $rowSessionUser['pcpcdt'];
    $s_pcpcs = $rowSessionUser['pcpcs'];

    $s_ppppid = $rowSessionUser['ppppid'];
    $s_ppaid = $rowSessionUser['ppaid'];
    $s_ppppn = $rowSessionUser['ppppn'];
    $s_ppppc = $rowSessionUser['ppppc'];
    $s_ppppp = $rowSessionUser['ppppp'];
    $s_ppppfn = $rowSessionUser['ppppfn'];
    $s_ppppdt = $rowSessionUser['ppppdt'];
    $s_pppps = $rowSessionUser['pppps'];

    $s_aadobfjy = $s_aadob = date("F j, Y");
    $s_aadobymd = $s_aadob = date("Y-m-d");
    $s_fullname = getFullName($s_aafn, $s_aamn, $s_aaln, $s_aasn);
    $s_position = getPosition($s_aat);
    $s_directory = getDirectory($s_aat);
    $s_genderadj = getGenderAdj($s_aag);
    $s_profilecover = getPhotoPath($s_pcpcp, $s_pcpcfn);
    $s_profilephoto = getPhotoPath($s_ppppp, $s_ppppfn);
?>
