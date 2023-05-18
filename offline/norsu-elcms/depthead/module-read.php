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
    $title = 'Read Module'; $page = 'read module';
    $pagehas = array('modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-between align-items-center flex-row">
                <?php if(!empty(isset($_GET['a']))) : ?>
                <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-learning.php'; ?> "
                    class="btn btn-warning ispan-md invisible">
                    <i class="fa-solid fa-arrow-left-to-line"></i>
                    <span class="ms-1">BACK</span>
                </a>
                <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
                <?php endif; ?>

                <?php if(empty(isset($_GET['a']))) : ?>
                <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-class.php'; ?> "
                    class="btn btn-warning ispan-md">
                    <i class="fa-solid fa-arrow-left-to-line"></i>
                    <span class="ms-1">BACK</span>
                </a>


                <div class="d-flex align-items-center justify-content-end flex-row">
                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-edit.php?mcode='.$mcode;?> "
                        target="_blank" class="ispan-md btn btn-warning font-title fw-bold">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="ms-1">edit module</span>
                    </a>

                    <div class="mx-1">
                        <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
                    </div>


                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-new.php?mcode='.$mcode;?>"
                        target="_blank" class="ispan-md btn btn-success font-title fw-bold">
                        <i class="fa-solid fa-plus"></i>
                        <span class="ms-1">COURSE LESSON</span>
                    </a>
                </div>

                <?php endif; ?>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <?php include ROOT_PATH . '/app/includes/common/module-header.php'?>

            <div class="my-2 h-50min">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-uppercase fw-bold text-white">Introduction</h4>
                            </div>
                            <div class="card-body">
                                <p class="m-0">
                                    <?php echo $mintro; ?>
                                </p>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-header bg-primary">
                                <h4 class="text-uppercase fw-bold text-white">Module Outcomes</h4>
                            </div>
                            <div class="card-body">
                                <p class="m-0"><?php echo $moutcome; ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-uppercase fw-bold text-white">module outline</h4>
                            </div>
                            <div class="card-body">
                                <ol type="I" class="">
                                    <?php foreach ($stmtOutline as $row) : ?>
                                    <li>
                                        <?php if(!empty(isset($_GET['a']))) : ?>
                                        <a
                                            href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&a=view&ocode='.$row['outline_code'];?>">
                                            <?php echo $row['outline_title']; ?>
                                        </a>
                                        <?php endif; ?>

                                        <?php if(empty(isset($_GET['a']))) : ?>
                                        <a
                                            href="<?php echo BASE_URL .'/'. $s_directory. '/module_outline-read.php?mcode='.$mcode.'&ocode='.$row['outline_code'];?>">
                                            <?php echo $row['outline_title']; ?>
                                        </a>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
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
