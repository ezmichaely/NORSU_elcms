<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deptheadOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
?>

<?php 
    $title = 'Announcements'; 
    $page = 'announcement';
    $pagehas = array('ckeditor');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-center align-items-center flew-row bg-warning rounded p-1">
                <i class="fas fa-bullhorn me-3 fs-4"></i>
                <h2 class="fw-bolder text-center font-title text-uppercase"> ANNOUNCEMENTS </h2>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <?php include ROOT_PATH.'/app/includes/common/announcements.inc.php'; ?>
        </div>
    </main>

    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>

    <script>
    CKEDITOR.replace('AnnouncementContent', {
        height: 280,
        filebrowserUploadUrl: baseUrl + '/app/controllers/crud/crudAnnoucementUpload.php',
        filebrowserUploadMethod: 'form'
    });
    </script>
</body>

</html>
