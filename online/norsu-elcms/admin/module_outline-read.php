<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    adminOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    if(isset($_GET['mcode']) && isset($_GET['ocode'])) {
        $mcode = $_GET['mcode'];
        $ocode = $_GET['ocode'];
        include(ROOT_PATH . '/app/controllers/query/getModuleData.php'); 
    } else {
        header('Location: ' .BASE_URL. '/'.$s_directory.'/module-class.php');
    }
?>

<?php 
    $title = 'Read Course Outline'; $page = 'read module outline';
    $pagehas = array('modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <div class="modules modules-read">
                <div class="modules-read-top">
                    <div class="modules-read-top-buttons d-flex justify-content-between align-items-center">
                        <?php if(empty(isset($_GET['a']))) : ?>
                        <div>
                            <?php if($PrevOutlineCode == '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-read.php?mcode='.$mcode;?>"
                                class="btn btn-warning ispan-sm">
                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                <span class="ms-1">BACK</span>
                            </a>
                            <?php endif; ?>

                            <?php if($PrevOutlineCode != '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&ocode='.$PrevOutlineCode;?>"
                                class="btn btn-warning ispan-sm">
                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                <span class="ms-1">BACK</span>
                            </a>
                            <?php endif; ?>

                            <?php if($NxtOutlineCode != '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&ocode='.$NxtOutlineCode;?>"
                                class="btn btn-primary ispan-sm">
                                <span class="me-1">NEXT</span>
                                <i class="fa-solid fa-arrow-right-to-line"></i>
                            </a>
                            <?php endif; ?>
                        </div>


                        <div>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-edit.php?mcode='.$mcode.'&ocode='.$row['outline_code'];?>"
                                target="_blank" class="btn btn-warning font-title fw-bold ispan-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="ms-1">edit outline</span>
                            </a>

                            <a href="assessment-new.php" target="_blank"
                                class="btn btn-success font-title fw-bold ispan-sm">
                                <i class="fa-solid fa-plus"></i>
                                <span class="ms-1">ASSESSMENT</span>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty(isset($_GET['a']))) : ?>
                        <div>
                            <?php if($PrevOutlineCode == '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-read.php?mcode='.$mcode.'&a=view';?>"
                                class="btn btn-warning ispan-sm">
                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                <span class="ms-1">BACK</span>
                            </a>
                            <?php endif; ?>

                            <?php if($PrevOutlineCode != '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&a=view&ocode='.$PrevOutlineCode;?>"
                                class="btn btn-warning ispan-sm">
                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                <span class="ms-1">BACK</span>
                            </a>
                            <?php endif; ?>

                            <?php if($NxtOutlineCode != '') : ?>
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&a=view&ocode='.$NxtOutlineCode;?>"
                                class="btn btn-primary ispan-sm">
                                <span class="me-1">NEXT</span>
                                <i class="fa-solid fa-arrow-right-to-line"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="hr-1 bg-gray-300 my-2"></div>

                <?php include ROOT_PATH . '/app/includes/common/module-header.php'?>

                <div class="m-0 row g-2">
                    <div class="col-md-12 card px-0">
                        <div class="card-header bg-primary">
                            <h5 class="text-uppercase fw-bold text-white ">Objectives :</h5>
                        </div>
                        <div class="card-body">
                            <p class="m-0">
                                <?php echo $oobj; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 card px-0">
                        <div class="card-header bg-primary">
                            <h4 class="text-uppercase fw-bold text-white">
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
