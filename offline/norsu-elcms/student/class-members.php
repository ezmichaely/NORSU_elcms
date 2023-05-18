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
    $title = 'Class Members'; $page = 'class members';
    $pagehas = array('assessments', 'class');
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
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h4 class="text-uppercase fw-bold"> class members</h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($stmtMembers as $row) : ?>
                                <?php $fullname = getFullName($row['account_firstname'], $row['account_middlename'],$row['account_lastname'], $row['account_suffixname'],)?>
                                <li class="list-unstyled fw-500">
                                    <?php echo $num; ?>
                                    <a href="profile.php" class="">
                                        <?php echo $fullname; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>

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
