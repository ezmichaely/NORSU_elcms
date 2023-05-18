<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    studentOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    if(isset($_GET['ccode'])) {
        $ccode = $_GET['ccode'];
        include(ROOT_PATH . '/app/controllers/query/getClassData.php'); 
    } else {
        header('Location: ' .BASE_URL. '/'.$s_directory.'/myclass.php');
    }
?>

<?php 
    $title = 'Class Lesson'; $page = 'class lesson';
    $pagehas = array('assessments');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">

        <div class="container fluid-padding">
            <div class="d-flex justify-content-between align-items-center flex-row">
                <div class="d-flex justify-content-between align-items-center flex-row">
                    <?php if($PrevOutlineCode == '') : ?>
                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-home.php?ccode='.$ccode;?>"
                        class="btn btn-warning">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span class="ms-1">BACK</span>
                    </a>
                    <?php endif; ?>
                    <?php if($PrevOutlineCode != '') : ?>
                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-lesson.php?ccode='.$ccode.'&ocode='.$PrevOutlineCode;?>"
                        class="btn btn-warning">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span class="ms-1">BACK</span>
                    </a>
                    <?php endif; ?>

                    <?php if($NxtOutlineCode != '') : ?>
                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-lesson.php?ccode='.$ccode.'&ocode='.$NxtOutlineCode;?>"
                        class="btn btn-primary ms-1">
                        <span class="me-1">NEXT</span>
                        <i class="fa-solid fa-arrow-right-to-line"></i>
                    </a>
                    <?php endif; ?>
                </div>

                <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <?php include ROOT_PATH . '/app/includes/common/class-header.php'?>

            <div class="m-0 row g-2">
                <div class="col-md-12 card px-0">
                    <div class="card-header bg-warning">
                        <h5 class="text-uppercase fw-bold">Objectives</h5>
                    </div>
                    <div class="card-body">
                        <p class="m-0">
                            <?php echo $oobj; ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-12 card px-0">
                    <div class="card-header bg-warning">
                        <h4 class="text-uppercase fw-bold text-center"><?php echo $otitle; ?></h4>
                    </div>
                    <div class="card-body ">
                        <p class="m-0">
                            <?php echo $ocontent; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
