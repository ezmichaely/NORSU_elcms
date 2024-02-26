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
    $title = 'Class Home'; 
    $page = 'class home';
    $pagehas = array('assessments');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-between flex-row">
                <a href="myclass.php" class="btn btn-warning">
                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                    <span>BACK</span>
                </a>

                <?php include ROOT_PATH.'/app/includes/forms/form-downloadModule.php'; ?>
            </div>
            <div class="hr-1 bg-gray-300 my-2"></div>

            <?php include ROOT_PATH . '/app/includes/common/class-header.php'?>

            <div class="my-2 h-50min">
                <div class="row g-2">
                    <?php include ROOT_PATH . '/app/includes/common/class-tabs.php'?>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h4 class="text-uppercase fw-bold">INTRODUCTION</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $mintro; ?>
                                </p>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header bg-warning">
                                <h4 class="text-uppercase fw-bold">LEARNING OUTCOMES</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $moutcome; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h4 class="text-uppercase fw-bold">COURSE OUTLINE</h4>
                            </div>
                            <div class="card-body ">
                                <ol type="I" class="">

                                    <?php foreach ($stmtOutline as $row) : ?>
                                    <li>
                                        <a
                                            href="<?php echo BASE_URL .'/'. $s_directory. '/class-lesson.php?ccode='.$ccode.'&ocode='.$row['outline_code'];?>">
                                            <?php echo $row['outline_title']; ?>
                                        </a>
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
    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
