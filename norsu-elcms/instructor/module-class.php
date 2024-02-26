<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');
    include(ROOT_PATH . '/app/controllers/crud/crudModules.php'); 
?>

<?php 
    $title = 'Class Modules'; $page = 'class module';
    $pagehas = array('modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bolder text-start font-title text-uppercase"> my learning module </h2>
                <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-new.php';?>" target="_blank"
                    class="ispan-md btn btn-success font-title fw-bold">
                    <i class="fa-solid fa-plus"></i>
                    <span>CREATE MODULE</span>
                </a>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <?php include ROOT_PATH . '/app/includes/common/module-datacard.php'?>

        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
