<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
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
    $pagehas = array('class', 'assessment', 'modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">

        <div class="container fluid-padding">
            <div class="modules modules-read">
                <div class="d-flex justify-content-between align-items-center flex-row">

                    <div class="">
                        <?php if($PrevOutlineCode == '') : ?>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-home.php?ccode='.$ccode;?>"
                            class="btn btn-warning ispan-sm">
                            <i class="fa-solid fa-arrow-left-to-line"></i>
                            <span class="ms-1">BACK</span>
                        </a>
                        <?php endif; ?>

                        <?php if($PrevOutlineCode != '') : ?>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-lesson.php?ccode='.$ccode.'&ocode='.$PrevOutlineCode;?>"
                            class="btn btn-warning ispan-sm">
                            <i class="fa-solid fa-arrow-left-to-line"></i>
                            <span class="ms-1">BACK</span>
                        </a>
                        <?php endif; ?>

                        <?php if($NxtOutlineCode != '') : ?>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-lesson.php?ccode='.$ccode.'&ocode='.$NxtOutlineCode;?>"
                            class="btn btn-primary ispan-sm">
                            <span class="me-1">NEXT</span>
                            <i class="fa-solid fa-arrow-right-to-line"></i>
                        </a>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-center align-items-center flex-row">
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-edit.php?mcode='.$mcode.'&ocode='.$row['outline_code'];?> "
                            target="_blank" class="ispan-md btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span class="ms-1">edit outline</span>
                        </a>

                        <div class="mx-1">
                            <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
                        </div>

                        <button class="btn btn-success ispan-md" data-bs-toggle="modal" href="#exampleModalToggle"
                            role="button">
                            <i class="fa-solid fa-plus"></i>
                            <span class="ms-1">
                                create assessment
                            </span>
                        </button>

                        <?php include ROOT_PATH . '/app/includes/modals/AddAssessmentModal.php' ; ?>

                    </div>
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
                            <h4 class="text-uppercase fw-bold">
                                <?php echo $romanum.' - '.$otitle; ?></h4>
                        </div>
                        <div class="card-body ">
                            <p class="m-0">
                                <?php echo $ocontent; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
