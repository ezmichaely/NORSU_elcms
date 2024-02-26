<?php 
    include('../../../path.php');
    include(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    if(isset($_FILES['upload']['name'])) {
        // dd($_POST);
        $file_name = $_FILES['upload']['name'];
        $file_type = $_FILES['upload']['type'];
        $file_tmp_name = $_FILES['upload']['tmp_name'];
        $file_error = $_FILES['upload']['error'];
        $file_size = $_FILES['upload']['size'];

        $file_name_array = explode(".", $file_name);
        $extension = end($file_name_array);
        $code = generateRandomString();
        $file_path_directory = '/upload/modules/';

        $file_name_new = 'Module_'.$s_aid.'_'.time().'_'.$code.'.'.$extension;
        $file_upload_path = ROOT_PATH . $file_path_directory . $file_name_new;

        $file_directory = ROOT_PATH . $file_path_directory;
        $file_location = $file_path_directory.$file_name_new;

        chmod($file_directory, 0777);
        $allowed_extension = array("jpg", "gif", "png");
        
        if(in_array($extension, $allowed_extension)){
            move_uploaded_file($file_tmp_name, $file_upload_path);
            $function_number = $_GET['CKEditorFuncNum'];
            $url = BASE_URL.$file_location;
            $message = '';
            echo "<script type='text/javascript'>
                        window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');
                    </script>";
        }
    }
?>
