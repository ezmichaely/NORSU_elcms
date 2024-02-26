<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    // dd($_POST);
    // FETCH ALL CONTACTS 
    if(isset($_POST['FetchContacts']) == 'FetchContacts') {
        // dd($_SESSION);
        // 202131842213  202131842213 20113215542

        $said = $_POST['SessionUserID']; 

        if(!empty($_POST['get_receiver'])) {
            $get_receiver = $_POST['get_receiver'];
        } else {
            $get_receiver = '';
        }

        if(!empty($_POST['string'])) {
            $search = trimSlash($_POST['string']);
            $pattern = $search. "%";
        } else {
            $search = '';
            $pattern = $search. "%";
        }

        $current = 'Current';
        try {
            $sqlContacts = "";
            $sqlContacts .= 
                "SELECT 
                    cn.contact_sender AS cncns, cn.contact_receiver AS cncnr,

                    a.account_unique AS aid, a.account_type AS aat, a.account_request AS aar, a.account_status AS aas,
                    a.account_firstname AS aafn, a.account_middlename AS aamn, 
                    a.account_lastname AS aaln, a.account_suffixname AS aasn, 

                    pp.profilephoto_id AS ppppid, pp.account_unique AS ppaid, pp.profilephoto_path AS ppppp, 
                    pp.profilephoto_filename AS ppppfn, pp.profilephoto_status AS pppps

                FROM contacts AS cn
                INNER JOIN accounts AS a ON cn.contact_receiver = a.account_unique
                INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique ";


            if ($search != '') {
                $sqlContacts .= " WHERE CONCAT(a.account_firstname, a.account_lastname) LIKE ? ";
                $sqlContacts .= " AND cn.contact_sender = ? AND pp.profilephoto_status = ? ";
                $sqlContacts .= " AND NOT a.account_unique = ? ";
                $sqlContacts .= " ORDER BY a.account_firstname = ? DESC, cn.contact_datetime DESC";
                $stmtContacts = $pdo->prepare($sqlContacts);
                $stmtContacts->execute([$pattern, $s_aid, $current, $s_aid, $s_aafn]);
                // dd($row = $stmtContacts->fetchAll());

                if ($stmtContacts->rowCount() < 0) {
                    exit('no contacts');
                }
            } else {
                $sqlContacts .= " WHERE cn.contact_sender = ? AND pp.profilephoto_status = ? ";
                $sqlContacts .= " ORDER BY cn.contact_datetime DESC";
                $stmtContacts = $pdo->prepare($sqlContacts);
                $stmtContacts->execute([$s_aid, $current]);

 
            }
            
            // dd($stmtContacts->fetch());
            $response = ''; 
            if($stmtContacts->rowCount() > 0) {
                while ($rowContacts = $stmtContacts->fetch()) {
                    // dd($rowContacts);
                    $cncnr = $rowContacts['cncnr'];
                    $aid = $rowContacts['aid'];
                    $aat = $rowContacts['aat'];
                    $aas = $rowContacts['aas'];
                    $aafn = $rowContacts['aafn'];
                    $aamn = $rowContacts['aamn'];
                    $aaln = $rowContacts['aaln'];
                    $aasn = $rowContacts['aasn'];

                    $ppppid = $rowContacts['ppppid'];
                    $ppaid = $rowContacts['ppaid'];
                    $ppppp = $rowContacts['ppppp'];
                    $ppppfn = $rowContacts['ppppfn'];
                    $pppps = $rowContacts['pppps'];

                    $fullname = getFullName($aafn, $aamn, $aaln, $aasn);
                    $profilephoto = getPhotoPath($ppppp, $ppppfn);

                    $cncnr_n = "'".$cncnr."'";
                    // dd($cncnr_n);
                    
                    $response .= '
                        <a class="list-group-item list-group-item-action border-bottom';
                            if($get_receiver == $aid) {
                                $response .=  ' active "';
                            }
                            $response .=  '" 
                            data-receiver="'.$cncnr.'" 
                            href = "'.BASE_URL.'/'.$s_directory.'/messages.php?m='.$aid.'">
                            <div class="list-group-item-details">
                                <div class="img-placeholder pp-contact position-relative">
                                    <img src="'.BASE_URL.$profilephoto.'"
                                        alt="profile-pic" class="img-thumbnail">';

                                    if($aas == 'ONLINE') {
                                        $response .= '<div class="status position-absolute bg-success"></div>';
                                    } else {
                                        $response .= '<div class="status position-absolute bg-secondary"></div>';
                                    }
                                $response .= '</div>
                                <span class="span-name fs-7">'.$fullname.'</span>
                            </div>
                        </a>';
                } 
                // dd($response);
                exit($response);
            } else {
                if ($stmtContacts->rowCount() == 0) {
                    exit('no contacts');
                }
                else {
                    exit('reachedMax');
                } 
            }
    
        } catch (PDOException $th) {
            $message = $th->getMessage();
            echo $message ;
            exit();
        }  
            
        
    }
    
    // GetThisReceiverInfo
    if(isset($_POST['GetThisReceiverInfo']) == 'GetThisReceiverInfo') {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $receiver = trimSlash($_POST['receiver']);
        $sql = "SELECT * FROM accounts 
                INNER JOIN profilephotos ON accounts.account_unique = profilephotos.account_unique
                WHERE accounts.account_unique = ? AND profilephotos.profilephoto_status = 'Current'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$receiver]);   
        $row = $stmt->fetch();
        $r_aafn = $row['account_firstname'];
        $r_aamn = $row['account_middlename'];
        $r_aaln = $row['account_lastname'];
        $r_aasn = $row['account_suffixname'];

        $r_ppppp = $row['profilephoto_path'];
        $r_ppppfn = $row['profilephoto_filename'];

        $new_fullname = getFullName($r_aafn, $r_aamn, $r_aaln, $r_aasn);
        $new_profilephoto = getPhotoPath($r_ppppp, $r_ppppfn);
        $new_profilephoto_path = BASE_URL .$new_profilephoto;
        $new_profile_url = BASE_URL . '/' . $s_directory . '/profile.php?u='. $receiver ;
        echo json_encode([
            'status'            => 'success', 
            'url'               => $new_profile_url,
            'fullname'          => $new_fullname,
            'profilephoto'      => $new_profilephoto_path,
            'mgsreceiver'       => $receiver,
            'mgssender'         => $s_aid
        ]);   

        exit();
    }
    
    // ADD CONTACTS 
    if(isset($_POST['AddContact']) == 'AddContact') {
        // dd($s_aid);
        try {
            $s_aid = trimSlash($_POST['AddContactSender']);
            $u_aid = trimSlash($_POST['AddContactReceiver']);
            $contact_mnum = 0;
            $contact_status = 0;
            $datetime = time();
            
            $data = array(
                'contact_sender'    => $s_aid, 
                'contact_receiver'  => $u_aid,
                'contact_mnum'      => $contact_mnum,
                'contact_status'    => $contact_status,
                'contact_datetime'  => $datetime,
            );

            // dd($data);
            $sqlAddContact = "INSERT INTO contacts 
                (contact_sender, contact_receiver, contact_mnum, contact_status, contact_datetime) 
                VALUES (?,?,?,?,?)";
            $stmtAddContact = $pdo->prepare($sqlAddContact);
            $stmtAddContact->execute([$s_aid, $u_aid, $contact_mnum, $contact_status, $datetime]);
            
            // dd($stmtAddContact);
            // GET RECIEVER DATA TO INSERT IN SYSTEM LOGS
            $sqlReciever = "SELECT * FROM accounts WHERE accounts.account_unique = ?";
            $stmtReciever = $pdo->prepare($sqlReciever);
            $stmtReciever->execute([$u_aid]);
            $rowReciever = $stmtReciever->fetch();
            
            $r_account_type = $rowReciever['account_type'];
            $r_account_firstname = $rowReciever['account_firstname'];
            $r_account_middlename = $rowReciever['account_middlename'];
            $r_account_lastname = $rowReciever['account_lastname'];
            $r_account_suffixname = $rowReciever['account_suffixname'];
            $r_fullname = getFullName($r_account_firstname, $r_account_middlename, $r_account_lastname, $r_account_suffixname);
            $r_position = getPosition($r_account_type);

            $logAction = $s_position ." ". $s_fullname . " added ".$r_position." ".$r_fullname." in ".$s_genderadj." contact lists.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $output = array(
                'status'    => 'success',
                'directory' => $s_directory, 
                'u'         => $u_aid,
            );

            echo json_encode($output);
            exit();
            
        } catch (PDOException $error) { // error in query while checking if username existed
            $message = $error->getMessage();
            echo $message;
            exit();
        } 
    }
    
    // FetchThisReceiverInfo
    if(isset($_POST['FetchThisReceiverInfo']) == 'FetchThisReceiverInfo') {
        $s_aid = $_SESSION['norsu-elcms-sid'];
        include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

        $receiver = trimSlash($_POST['receiver']);
        $sql = "SELECT * FROM accounts 
                INNER JOIN profilephotos ON accounts.account_unique = profilephotos.account_unique
                WHERE accounts.account_unique = ? AND profilephotos.profilephoto_status = 'Current'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$receiver]);   
        $row = $stmt->fetch();
        $r_aafn = $row['account_firstname'];
        $r_aamn = $row['account_middlename'];
        $r_aaln = $row['account_lastname'];
        $r_aasn = $row['account_suffixname'];

        $r_ppppp = $row['profilephoto_path'];
        $r_ppppfn = $row['profilephoto_filename'];

        $new_fullname = getFullName($r_aafn, $r_aamn, $r_aaln, $r_aasn);
        $new_profilephoto = getPhotoPath($r_ppppp, $r_ppppfn);
        $new_profilephoto_path = BASE_URL .$new_profilephoto;
        $new_profile_url = BASE_URL . '/' . $s_directory . '/profile.php?u='. $receiver ;
        echo json_encode([
            'status'            => 'success', 
            'url'               => $new_profile_url,
            'fullname'          => $new_fullname,
            'profilephoto'      => $new_profilephoto_path,
            'mgsreceiver'       => $receiver,
            'mgssender'         => $s_aid
        ]);   

        exit();
    }
    
?>
