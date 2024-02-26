<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deptheadOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/crud/crudModules.php');

    if(isset($_GET['mcode'])) {
        $mcode = $_GET['mcode'];
        include(ROOT_PATH . '/app/controllers/query/getModuleData.php'); 
    } else {
        header('Location: ' .BASE_URL. '/'.$s_directory.'/module-class.php');
    }
?>

<?php 
    $title = 'New Course Outline'; $page = 'new module outline';
    $pagehas = array('modules', 'ckeditor');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <h2 class="fw-bolder text-center font-title text-uppercase bg-warning rounded p-1">
                Create a Course Outline of your Module
            </h2>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <div class="card p-3 h-78min">
                <?php include ROOT_PATH . '/app/includes/forms/form-createModuleOutline.php'?>
            </div>
        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>

    <script>
    CKEDITOR.replace('CreateOutlineObjectives', {
        height: 150,
        filebrowserUploadUrl: baseUrl + '/app/controllers/crud/crudModulesUpload.php',
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('CreateOutlineContent', {
        height: 400,
        filebrowserUploadUrl: baseUrl + '/app/controllers/crud/crudModulesUpload.php',
        filebrowserUploadMethod: 'form'
    });
    </script>

</body>

</html>
