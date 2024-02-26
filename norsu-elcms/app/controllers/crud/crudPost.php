<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php'); 

    // FETCH ALL POSTS
    if (isset($_POST['fetchAllPosts'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        
        try {
            $CountContacts = $stmtCountContacts->rowCount();
            $sqlFetch = 
                "SELECT 
                    p.account_unique AS paid, p.post_code AS ppcd, p.post_content AS ppct,
                    p.post_filename AS ppfn, p.post_filepath AS ppfp, p.post_filenamedb AS ppfndb,
                    p.post_datetime AS ppdt, p.post_status AS pps,

                    a.account_unique AS aid, a.account_type AS aat, a.account_status AS aas,
                    a.account_firstname AS aafn, a.account_middlename AS aamn, 
                    a.account_lastname AS aaln, a.account_suffixname AS aasn, 

                    u.account_unique AS uaid, u.college_id AS uuclid, 
                    u.department_id AS uudid, u.course_id AS uucrid, 

                    pp.profilephoto_id AS ppppid, pp.account_unique AS ppaid, pp.profilephoto_name AS ppppn, 
                    pp.profilephoto_caption AS ppppc, pp.profilephoto_path AS ppppp, 
                    pp.profilephoto_filename AS ppppfn, pp.profilephoto_datetime AS ppppdt,
                    pp.profilephoto_status AS pppps,

                    cn.contact_id AS cncnid, cn.contact_sender AS cncns, cn.contact_receiver AS cncnr

                FROM posts AS p
                INNER JOIN accounts AS a ON p.account_unique = a.account_unique
                INNER JOIN users AS u ON a.account_unique = u.account_unique
                
                INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique

                LEFT JOIN contacts AS cn ON p.account_unique = cn.contact_sender
                WHERE  p.post_status = 'Publish' AND pp.profilephoto_status = 'Current'
                GROUP BY p.post_code ORDER BY p.post_datetime DESC
                LIMIT ?, ?";

                $stmtFetch = $pdo->prepare($sqlFetch);
                $stmtFetch->execute([$start, $limit]); 

            $response = "";
            if((empty($stmtFetch->rowCount()))) {
                $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
                exit($response);
            } else {
                if($stmtFetch->rowCount() > 0) {
                    while ($rowFetch = $stmtFetch->fetch()) {
                        // dd($rowFetch);
                        $post_code = $rowFetch['ppcd'];
                        $post_content = $rowFetch['ppct'];
                        $post_filename = $rowFetch['ppfn'];
                        $post_filepath = $rowFetch['ppfp'];
                        $post_filenamedb = $rowFetch['ppfndb'];
                        $post_datetime = $rowFetch['ppdt'];

                        $poster_id = $rowFetch['paid'];
                        $poster_type = $rowFetch['aat'];
                        $poster_firstname = $rowFetch['aafn'];
                        $poster_middlename = $rowFetch['aamn'];
                        $poster_lastname = $rowFetch['aaln'];
                        $poster_suffixname = $rowFetch['aasn'];

                        $profilephoto_name = $rowFetch['ppppn'];
                        $profilephoto_path = $rowFetch['ppppp'];
                        $profilephoto_filename = $rowFetch['ppppfn'];
                        $fullname = getFullName($poster_firstname, $poster_middlename, $poster_lastname, $poster_suffixname);
                        $position = getPosition($poster_type);
                        $profilephoto = getPhotoPath($profilephoto_path, $profilephoto_filename);
                        $postFile = getPhotoPath($post_filepath, $post_filenamedb);

                        $postDate = getPostDate($post_datetime);
                        $postDay = getPostDay($post_datetime);
                        $postTime = getPostTime($post_datetime);
                        
                        $ext = pathinfo($post_filenamedb, PATHINFO_EXTENSION);

                        $sql = "SELECT * FROM comments WHERE post_code = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$post_code]);
                        $rowCount = $stmt->rowCount();

                        $response .= '<div class="card bg-white">
                            <div class="card-header bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$poster_id.'"
                                        class="d-flex justify-content-start align-items-center flex-row">
                                        <img class="rounded-circle" width="50" height="50"
                                            src="'.BASE_URL . $profilephoto.'" alt="profile-picture">
                                        <div class="ms-2 d-flex justify-content-center align-items-start flex-column">
                                            <p class="text-dark fw-bold text-uppercase font-title fs-5 m-0 p-0 lh-1">'
                                                .$fullname.
                                            '</p>
                                            <div class="fs-7 text-muted d-flex align-items-center font-text flex-wrap">
                                                <span class="fw-bold">'.$position.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDay.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postTime.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small fs-9"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDate.'</span>
                                            </div>
                                        </div>
                                    </a>';

                                    
                                    if ($poster_id == $s_aid) {
                                    $response .= '<div class="">
                                        <button type="button" id="GetDeletePostIndex" class="btn btn-outline-danger border-0 btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#DeletePostIndexModal" data-post="'.$post_code.'">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="DeletePostIndexModal" tabindex="-1"
                                        aria-labelledby="DeletePostIndexModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div id="DeletePostIndexContentData"></div>  
                                            </div>
                                        </div>
                                    </div>'; }
                                $response .= '</div>
                            </div>';
                                    

                        if ($post_content == '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "pptx" ||
                                $ext == "ppt" || $ext == "ppt" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }

                        if ($post_content != '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "ppt" ||
                                $ext == "pptx" || $ext == "xls" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }
                        
                        if ($post_content != '' && $ext == '') {
                            $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    </div>';
                        }

                        $response .= '<div class="card-footer py-3 bg-white">
                            <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'" target="_blank"
                                class="text-white fw-bold text-uppercase btn btn-primary w-100">
                                <i class="fa-solid fa-message-middle"></i>
                                <span class="ms-1">COMMENTS ('.$rowCount.')</span>
                            </a></div></div><div class="my-2">
                        </div>';
                        // dd($response);
                    } 
                    exit($response);
                } else {
                    $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
                    exit($response);
                }
            }
            

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo '<li>Error:' . $message . '</li>';
            exit();
        }
    }

    // FETCH This POSTS
    if (isset($_POST['fetchThisPosts'])) {
        $uid = $_POST['uid'];
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        try {
            $sqlFetch = "";
            $sqlFetch .= "SELECT p.*, a.*, at.*, pp.* ";
            
            $sqlFetch .= " FROM posts AS p
                INNER JOIN accounts AS a ON p.account_unique = a.account_unique
                INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique
                INNER JOIN atypes AS at ON a.account_type = at.atype_id
                WHERE p.account_unique = ?";
            $sqlFetch .= " GROUP BY p.post_code ORDER BY p.post_datetime DESC";
            $sqlFetch .= " LIMIT ?, ?";
            $stmtFetch = $pdo->prepare($sqlFetch);
            $stmtFetch->execute([$uid, $start, $limit]); 

            
            $response = "";
            if((empty($stmtFetch->rowCount()))) {
                // dd($stmtFetch->rowCount());
                $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
                exit($response);
            } else {
                if($stmtFetch->rowCount() > 0) {
                    while ($rowFetch = $stmtFetch->fetch()) {
                        // dd($rowFetch);
                        $account_unique = $rowFetch['account_unique'];
                        $post_code = $rowFetch['post_code'];
                        $post_content = $rowFetch['post_content'];
                        $post_filename = $rowFetch['post_filename'];
                        $post_filepath = $rowFetch['post_filepath'];
                        $post_filenamedb = $rowFetch['post_filenamedb'];
                        $post_datetime = $rowFetch['post_datetime'];
                        $account_firstname = $rowFetch['account_firstname'];
                        $account_middlename = $rowFetch['account_middlename'];
                        $account_lastname = $rowFetch['account_lastname'];
                        $account_suffixname = $rowFetch['account_suffixname'];
                        $atype_name = $rowFetch['atype_name'];
                        $profilephoto_name = $rowFetch['profilephoto_name'];
                        $profilephoto_path = $rowFetch['profilephoto_path'];
                        $profilephoto_filename = $rowFetch['profilephoto_filename'];

                        $profilephoto = getPhotoPath($profilephoto_path, $profilephoto_filename);
                        $fullname = getFullName($account_firstname, $account_middlename, $account_lastname, $account_suffixname);
                        $postFile = getPhotoPath($post_filepath, $post_filenamedb);

                        $postDate = getPostDate($post_datetime);
                        $postDay = getPostDay($post_datetime);
                        $postTime = getPostTime($post_datetime);
                        
                        $ext = pathinfo($post_filenamedb, PATHINFO_EXTENSION);

                        $sql = "SELECT * FROM comments WHERE post_code = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$post_code]);
                        $rowCount = $stmt->rowCount();

                        $response .= '<div class="card bg-white">
                            <div class="card-header bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$account_unique.'"
                                        class="d-flex justify-content-start align-items-center flex-row">
                                        <img class="rounded-circle" width="50" height="50"
                                            src="'.BASE_URL . $profilephoto.'" alt="profile-picture">
                                        <div class="ms-2 d-flex justify-content-center align-items-start flex-column">
                                            <p class="text-dark fw-bold text-uppercase font-title fs-5 m-0 p-0 lh-1">'
                                                .$fullname.
                                            '</p>
                                            <div class="fs-7 text-muted d-flex align-items-center font-text flex-wrap">
                                                <span class="fw-bold">'.$atype_name.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDay.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postTime.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small fs-9"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDate.'</span>
                                            </div>
                                        </div>
                                    </a>';

                                    
                                    if ($uid == $s_aid) {
                                    $response .= '<div class="">
                                        <button type="button" id="GetDeletePost" class="btn btn-outline-danger border-0 btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#DeletePostModal" data-post="'.$post_code.'">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="DeletePostModal" tabindex="-1"
                                        aria-labelledby="DeletePostModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div id="DeletePostContentData"></div>  
                                            </div>
                                        </div>
                                    </div>'; }
                                $response .= '</div>
                            </div>';
                                    

                        if ($post_content == '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "pptx" ||
                                $ext == "ppt" || $ext == "ppt" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }

                        if ($post_content != '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "ppt" ||
                                $ext == "pptx" || $ext == "xls" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }
                        
                        if ($post_content != '' && $ext == '') {
                            $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    </div>';
                        }

                        $response .= '<div class="card-footer py-3 bg-white">
                            <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'" target="_blank"
                                class="text-white fw-bold text-uppercase btn btn-primary w-100">
                                <i class="fa-solid fa-message-middle"></i>
                                <span class="ms-1">COMMENTS ('.$rowCount.')</span>
                            </a></div></div><div class="my-2">
                        </div>';
                        // dd($response);
                    } 
                    exit($response);
                } else {
                    $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
                    exit($response);
                }
            }
            

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo '<li>Error:' . $message . '</li>';
            exit();
        }
        
    }

    // FETCH MY POSTS
    if (isset($_POST['fetchMyPosts'])) {
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);
        try {
            $sqlFetch = "";
            $sqlFetch .= "SELECT p.*, a.*, at.*, pp.* ";
            
            $sqlFetch .= " FROM posts AS p
                INNER JOIN accounts AS a ON p.account_unique = a.account_unique
                INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique
                INNER JOIN atypes AS at ON a.account_type = at.atype_id

                WHERE p.account_unique = ?";
            $sqlFetch .= " GROUP BY p.post_code ORDER BY p.post_datetime DESC";
            $sqlFetch .= " LIMIT ?, ?";
            $stmtFetch = $pdo->prepare($sqlFetch);
            $stmtFetch->execute([$s_aid, $start, $limit]); 

            $response = "";
            if((empty($stmtFetch->rowCount()))) {
                // dd($stmtFetch->rowCount());
                $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
                exit($response);
            } else {
                if($stmtFetch->rowCount() > 0) {
                    while ($rowFetch = $stmtFetch->fetch()) {
                        $account_unique = $rowFetch['account_unique'];
                        $post_code = $rowFetch['post_code'];
                        $post_content = $rowFetch['post_content'];
                        $post_filename = $rowFetch['post_filename'];
                        $post_filepath = $rowFetch['post_filepath'];
                        $post_filenamedb = $rowFetch['post_filenamedb'];
                        $post_datetime = $rowFetch['post_datetime'];
                        $account_firstname = $rowFetch['account_firstname'];
                        $account_middlename = $rowFetch['account_middlename'];
                        $account_lastname = $rowFetch['account_lastname'];
                        $account_suffixname = $rowFetch['account_suffixname'];
                        $atype_name = $rowFetch['atype_name'];
                        $profilephoto_name = $rowFetch['profilephoto_name'];
                        $profilephoto_path = $rowFetch['profilephoto_path'];
                        $profilephoto_filename = $rowFetch['profilephoto_filename'];


                        $profilephoto = getPhotoPath($profilephoto_path, $profilephoto_filename);
                        $fullname = getFullName($account_firstname, $account_middlename, $account_lastname, $account_suffixname);
                        $postFile = getPhotoPath($post_filepath, $post_filenamedb);

                        $postDate = getPostDate($post_datetime);
                        $postDay = getPostDay($post_datetime);
                        $postTime = getPostTime($post_datetime);
                        
                        $ext = pathinfo($post_filenamedb, PATHINFO_EXTENSION);

                        $sql = "SELECT * FROM comments WHERE post_code = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$post_code]);
                        $rowCount = $stmt->rowCount();

                        $response .= '<div class="card bg-white">
                            <div class="card-header bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$account_unique.'"
                                        class="d-flex justify-content-start align-items-center flex-row">
                                        <img class="rounded-circle" width="50" height="50"
                                            src="'.BASE_URL . $profilephoto.'" alt="profile-picture">
                                        <div class="ms-2 d-flex justify-content-center align-items-start flex-column">
                                            <p class="text-dark fw-bold text-uppercase font-title fs-5 m-0 p-0 lh-1">'
                                                .$fullname.
                                            '</p>
                                            <div class="fs-7 text-muted d-flex align-items-center font-text flex-wrap">
                                                <span class="fw-bold">'.$atype_name.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDay.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postTime.'</span>
                                                <span class="fs-9">
                                                    &nbsp;&nbsp;
                                                    <i class="fa-solid fa-circle-small fs-9"></i>
                                                    &nbsp;&nbsp;
                                                </span>
                                                <span class="fw-500">'.$postDate.'</span>
                                            </div>
                                        </div>
                                    </a>

                                    
                                    <!-- IF POSTER = POST ID -->
                                    <!-- Button trigger modal -->
                                    <div class="">
                                        <button type="button" id="GetDeletePostProfile" class="btn btn-outline-danger border-0 btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#DeletePostProfileModal" data-post="'.$post_code.'">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="DeletePostProfileModal" tabindex="-1"
                                        aria-labelledby="DeletePostProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div id="DeletePostProfileContentData"></div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        if ($post_content == '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "pptx" ||
                                $ext == "ppt" || $ext == "ppt" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }

                        if ($post_content != '' && $ext != '') {
                            if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "ppt" ||
                                $ext == "pptx" || $ext == "xls" || $ext == "xlsx") {
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">';
                                    
                                if ($ext == "pdf") {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-pdf text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "doc" || $ext == "docx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-word text-primary"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "ppt" || $ext == "pptx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 
                                if ($ext == "xls" || $ext == "xlsx" ) {
                                    $response .= '<a href="'.BASE_URL.$postFile.'" class="btn-download btn-warning text-dark">
                                            <i class="fa-solid fa-file-excel text-success"></i>
                                                <span class="">
                                                    '.$post_filename.'
                                                </span>
                                            </a>';
                                } 

                                $response .= '</div></div>';
                            }

                            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") { 
                                $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    <div class="img-post bg-gray-100 text-center">
                                        <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'"
                                            class="text-dark fw-bold img-placeholder" target="_blank">
                                            <img src="'.BASE_URL.$postFile.'"
                                                alt="'.$post_filename.'" class="img-fluid">
                                        </a>
                                    </div>
                                </div>';
                            }
                        }
                        
                        if ($post_content != '' && $ext == '') {
                            $response .= '<div class="card-body p-0 bg-white">
                                    <div class="p-3">'.$post_content.'</div>
                                    </div>';
                        }

                        $response .= '<div class="card-footer py-3 bg-white">
                            <a href="'.BASE_URL.'/'.$s_directory.'/post.php?p='.$post_code.'" target="_blank"
                                class="text-white fw-bold text-uppercase btn btn-primary w-100">
                                <i class="fa-solid fa-message-middle"></i>
                                <span class="ms-1">COMMENTS ('.$rowCount.')</span>
                            </a></div></div><div class="my-2">
                        </div>';
                        // dd($response);
                    } 
                    exit($response);
                } else {
                    $response .= '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
                    exit($response);
                }
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo '<li>Error:' . $message . '</li>';
            exit();
        }
        
    }

    // ADD Post
    if((isset($_FILES['AddPostFile']['name'])) || (isset($_POST['AddPostContent']))) {
        $postcontent = trimSlash($_POST['AddPostContent']); // <= post_content
        // $postcontent = nl2br(htmlentities($postcontent, ENT_QUOTES, 'UTF-8'));
        $postcode = md5(time().generateRandomString());  // <= post_code
        $postfile_name = '';
        $new_postfile_name = '';
        $post_path = '';

        if (!empty(isset($_FILES['AddPostFile']['name']))) {
            $postfile_name = $_FILES['AddPostFile']['name']; // <= post_filename
            $postfile_type = $_FILES['AddPostFile']['type'];
            $postfile_tmp_name = $_FILES['AddPostFile']['tmp_name'];
            $postfile_error = $_FILES['AddPostFile']['error'];
            $postfile_size = $_FILES['AddPostFile']['size'];
            
            $ext = pathinfo($postfile_name, PATHINFO_EXTENSION);
            if($ext =="png" || $ext == "jpeg" || $ext == "jpg" || $ext == "bmp") {
                $new_postfile_name .= 'Post-Img_'.$s_aid.'_'.time().'_'.$postcode.'_'.$postfile_name; // <= post_filenamedb
                $post_path .= '/upload/users/posts/images/';  // <= post_filepath
                $postfile_upload_path = ROOT_PATH . $post_path . $new_postfile_name;
                move_uploaded_file($postfile_tmp_name, $postfile_upload_path);
            } else {
                if ($ext =="pdf" || $ext == "doc" || $ext == "docx" || $ext == "pptx" || $ext == "ppt" || $ext == "xls" || $ext == "xlsx") {
                    $new_postfile_name .= 'Post-File_'.$s_aid.'_'.time().'-'.$postcode.'_'.$postfile_name; // <= post_filenamedb
                    $post_path .= '/upload/users/posts/documents/';  // <= post_filepath
                    $postfile_upload_path = ROOT_PATH . $post_path . $new_postfile_name;
                    move_uploaded_file($postfile_tmp_name, $postfile_upload_path);
                }
            }
        } 
        else {
            if (empty(isset($_FILES['AddPostFile']['name']))) {
                $postfile_name .= '';
                $new_postfile_name .= '';
                $post_path .= '';
            }
        }
        
        try {
            $sqlAddPost = "INSERT INTO posts (account_unique, post_code, post_content, post_filename,
                post_filepath, post_filenamedb) VALUES (?,?,?,?,?,?)";
            $stmtAddPost = $pdo->prepare($sqlAddPost);
            $stmtAddPost->execute([$s_aid, $postcode, $postcontent, $postfile_name, $post_path, $new_postfile_name]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " added a new post.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            
            echo json_encode(['status' => 'success', 'message' => '<li> New Post has been added! </li>']);
            exit();
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    } // END OF ADD Post

    // GET DELETE POST DATA
    if(isset($_REQUEST['GetDeletePostProfileBtn'])){
        $GetPostCode = $_REQUEST['GetDeletePostProfileBtn'];
        $sqlGetPost = "SELECT * FROM posts WHERE post_code = ? LIMIT 1";
        $stmtGetPost = $pdo->prepare($sqlGetPost);
        $stmtGetPost->execute([$GetPostCode]); 
        $rowGetPost = $stmtGetPost->fetch();

        $postcode = $rowGetPost['post_code'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-deletePostProfile.php');
        exit();
    }// END OF GET SINGLE Course DATA

    // DELETE POST
    if(isset($_POST['action']) && $_POST['action'] == 'DeletePostProfile') {
        $post_code = trimSlash($_POST['DeletePostProfileCode']);
        
        try {
            $sqlFetchPost = "SELECT * FROM posts WHERE post_code = ?";
            $stmtFetchPost = $pdo->prepare($sqlFetchPost);
            $stmtFetchPost->execute([$post_code]);
            $rowFetchPost = $stmtFetchPost->fetch();
            
            $pf_filename = $rowFetchPost['post_filenamedb'];
            $pf_path = $rowFetchPost['post_filepath'];

            $sqlpost = "DELETE FROM posts WHERE post_code = ?";
            $stmtpost = $pdo->prepare($sqlpost);
            $stmtpost->execute([$post_code]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " deleted a post.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $output = array(
                'status' => 'success'
            );

            if($pf_path != '') {
                unlink(ROOT_PATH.$pf_path.$pf_filename);
            }
            echo json_encode($output);
            exit();

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }

    // GET DELETE POST DATA
    if(isset($_REQUEST['GetDeletePostIndexBtn'])){
        $GetPostCode = $_REQUEST['GetDeletePostIndexBtn'];
        $sqlGetPost = "SELECT * FROM posts WHERE post_code = ? LIMIT 1";
        $stmtGetPost = $pdo->prepare($sqlGetPost);
        $stmtGetPost->execute([$GetPostCode]); 
        $rowGetPost = $stmtGetPost->fetch();

        $postcode = $rowGetPost['post_code'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-deletePostIndex.php');
        exit();
    }// END OF GET SINGLE Course DATA

    // DELETE POST
    if(isset($_POST['action']) && $_POST['action'] == 'DeletePostIndex') {
        $post_code = trimSlash($_POST['DeletePostIndexCode']);
        
        try {
            $sqlFetchPost = "SELECT * FROM posts WHERE post_code = ?";
            $stmtFetchPost = $pdo->prepare($sqlFetchPost);
            $stmtFetchPost->execute([$post_code]);
            $rowFetchPost = $stmtFetchPost->fetch();
            
            $pf_filename = $rowFetchPost['post_filenamedb'];
            $pf_path = $rowFetchPost['post_filepath'];

            $sqlpost = "DELETE FROM posts WHERE post_code = ?";
            $stmtpost = $pdo->prepare($sqlpost);
            $stmtpost->execute([$post_code]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " deleted a post.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $output = array(
                'status' => 'success'
            );

            if($pf_path != '') {
                unlink(ROOT_PATH.$pf_path.$pf_filename);
            }
            echo json_encode($output);
            exit();

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }
    

    // GET DELETE POST DATA
    if(isset($_REQUEST['GetDeletePostViewBtn'])){
        $GetPostCode = $_REQUEST['GetDeletePostViewBtn'];
        $sqlGetPost = "SELECT * FROM posts WHERE post_code = ? LIMIT 1";
        $stmtGetPost = $pdo->prepare($sqlGetPost);
        $stmtGetPost->execute([$GetPostCode]); 
        $rowGetPost = $stmtGetPost->fetch();

        $postcode = $rowGetPost['post_code'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-deletePostView.php');
        exit();
    }// END OF GET SINGLE Course DATA

    // DELETE POST
    if(isset($_POST['action']) && $_POST['action'] == 'DeletePostView') {
        $post_code = trimSlash($_POST['DeletePostViewCode']);
        
        try {
            $sqlFetchPost = "SELECT * FROM posts WHERE post_code = ?";
            $stmtFetchPost = $pdo->prepare($sqlFetchPost);
            $stmtFetchPost->execute([$post_code]);
            $rowFetchPost = $stmtFetchPost->fetch();
            
            $pf_filename = $rowFetchPost['post_filenamedb'];
            $pf_path = $rowFetchPost['post_filepath'];

            $sqlpost = "DELETE FROM posts WHERE post_code = ?";
            $stmtpost = $pdo->prepare($sqlpost);
            $stmtpost->execute([$post_code]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " deleted a post.";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);

            $output = array(
                'status' => 'success',
                'directory' => $s_directory
            );

            if($pf_path != '') {
                unlink(ROOT_PATH.$pf_path.$pf_filename);
            }
            echo json_encode($output);
            exit();

        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo json_encode(['status' => 'error', 'errAll' => '<li>Error:' . $message . '</li>']);
            exit();
        }
    }
    

    if(isset($_POST['AddComment'])) {
        // dd($_POST);
        $pcode = trimSlash($_POST['PostCode']); 
        $commentor = trimSlash($_POST['Commenter']); 
        $content = trimSlash($_POST['CommentContent']); 
        $fullname= trimSlash($_POST['Fullname']);
        $position = trimSlash($_POST['Position']);
        $ccode = time().generateRandomString();

        // dd($ccode);
        try {
            $sql = "INSERT INTO comments 
                (comment_code, post_code, account_unique, comment_content)
                VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$ccode, $pcode, $commentor, $content]);

            // INSERT SYSTEM LOG
            $logAction = $s_position ." ". $s_fullname . " commented in the post of ".$position." ".$fullname.".";
            $sqlLog = "INSERT INTO logs (account_unique, log_action) VALUES (?,?)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([$s_aid, $logAction]);
            
            echo json_encode(['status' => 'success']);
            exit();
            
        } catch (PDOException $error) {
            $message = $error->getMessage();
            echo $message;
            exit();
        }

    }

    // dd($_POST);
    if(isset($_POST['fetchAllComments'])) {
        $post = trimSlash($_POST['post']);
        $start = trimSlash($_POST['start']);
        $limit = trimSlash($_POST['limit']);

        try {
            $sql = "SELECT * FROM comments
                INNER JOIN accounts ON comments.account_unique = accounts.account_unique
                INNER JOIN profilephotos ON profilephotos.account_unique = accounts.account_unique
                WHERE post_code = ? AND profilephoto_status = 'Current' 
                ORDER BY comment_datetime DESC LIMIT ?, ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$post, $start, $limit]);
            
            $response = "";
            if((empty($stmt->rowCount()))) {
                $response = 'reachedMax';
                exit();
            } else {
                if($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch()) {
                        // dd($row);
                        $content = $row['comment_content']; 
                        $datetime = $row['comment_datetime'];
                        $aid = $row['account_unique']; 
                        $fn = $row['account_firstname']; 
                        $mn = $row['account_middlename']; 
                        $ln = $row['account_lastname']; 
                        $sn = $row['account_suffixname'];

                        $ppp = $row['profilephoto_path']; 
                        $ppfn = $row['profilephoto_filename'];

                        $dt = getDateTime($datetime);
                        $fullname = getFullName($fn, $mn, $ln, $sn);

                        $pp = getPhotoPath($ppp, $ppfn);

                        $response .='
                            <div class="py-2 px-3 bg-gray-100">
                            <a href="'.BASE_URL . '/'.$s_directory.'/profile.php?u='.$aid.'"
                                class="d-flex justify-content-start align-items-start flex-row" target="_blank">
                                <div class="img-placeholder rounded-circle">
                                    <img src="'.BASE_URL . $pp.'" alt="profile-pic"
                                        class="rounded-circle" height="34" width="34">
                                </div>
                                <div class="ms-2 flex-grow w-100">
                                    <div class="d-flex justify-content-between align-items-start flex-column">
                                        <h6 class="text-dark m-0 p-0 lh-1 fw-bold text-uppercase">
                                            '.$fullname.'
                                        </h6>
                                        <div class="mt-1 p-0 font-text text-muted fs-7 lh-1 fw-500">
                                            '.$dt.'
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div class="d-flex justify-content-start align-items-start flex-row my-1">
                                <div class="img-placeholder rounded-circle invisible">
                                    <img src="" alt="profile-pic" class="rounded-circle" height="34" width="34">
                                </div>

                                <div class="ms-2 flex-grow w-100">
                                    <div class="py-1 px-2 border border-primary rounded">
                                        '.$content.'
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-1 bg-gray-300"></div>';
                    } exit($response);
                } else {
                    $response = 'reachedMax';
                    exit();
                }
            }
        }  catch (PDOException $error) {
            $message = $error->getMessage();
            echo $message;
            exit();
        }
    }
?>
