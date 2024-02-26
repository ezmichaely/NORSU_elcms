<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>

<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    loggedIN();

    // dd($_SESSION);
?>


<?php 
    $title = 'ADMIN | LOG IN'; 
    $page = "LoginAdmin";
    $pagehas = array('authentication');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="bg-change">
    <div class="h-body fluid-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row my-3 mx-0 justify-content-center">
                <div class="col-lg-7 col-md-7 shadow">
                    <div class="row border border-primary rounded bg-primary overflow-hidden">
                        <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center flex-column">
                            <div class="brand-index">
                                <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.svg') ?>" alt="brand-logo"
                                    class="brand-logo" />
                                <h1 class="brand-name">
                                    NORSU&nbsp;-&nbsp;eLCMS
                                </h1>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0 bg-white">
                            <?php include ROOT_PATH . '/app/includes/forms/form-login.php'?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/footer.php') ?>
    <?php include(ROOT_PATH . '/app/includes/script.php') ?>
</body>

</html>
