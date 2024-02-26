<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');
    include(ROOT_PATH . '/app/controllers/crud/crudModules.php'); 

    // dd($_SESSION);
    // unset($_SESSION['error']);
    // unset($_SESSION['subject']);
    // unset($_SESSION['preprequisite']); 
    // unset($_SESSION['consent']); 
    // unset($_SESSION['title']); 
    // unset($_SESSION['intro']); 
    // unset($_SESSION['outcome']); 
?>

<?php 
    $title = 'New Module'; $page = 'new module';
    $pagehas = array('modules', 'ckeditor');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <h2 class="fw-bolder text-center font-title text-uppercase bg-warning rounded p-1">
                CREATE NEW LEARNING MODULE
            </h2>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <div class="card p-3 h-78min">
                <?php include ROOT_PATH . '/app/includes/forms/form-createModule.php'?>
            </div>
        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>

    <script>
    CKEDITOR.replace('CreateModuleOutcome', {
        height: 400,
        filebrowserUploadUrl: baseUrl + '/app/controllers/crud/crudModulesUpload.php',
        filebrowserUploadMethod: 'form'
    });
    </script>
</body>

</html>
