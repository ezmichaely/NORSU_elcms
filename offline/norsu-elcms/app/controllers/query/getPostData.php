<?php 
    $sqlFetch = "SELECT p.*, a.*, at.*, pp.*
        FROM posts AS p
        INNER JOIN accounts AS a ON p.account_unique = a.account_unique
        INNER JOIN profilephotos AS pp ON a.account_unique = pp.account_unique
        INNER JOIN atypes AS at ON a.account_type = at.atype_id
        WHERE p.post_code = ?";

    $stmtFetch = $pdo->prepare($sqlFetch);
    $stmtFetch->execute([$postcode]); 

    if ($stmtFetch->rowCount() > 0 ) {
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

            // dd($profilephoto);
        }
    } else {
        header('Location: ' .BASE_URL. '/404.php');
        exit();
    }

    
    // $rowContact = $stmtContact->fetch();
    // dd($contact);
?>
