<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deptheadOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    // $mwatermark = generateRandomString();
    // dd($mwatermark);
?>

<?php 
    $title = 'Learning Modules'; $page = 'learning module';
    $pagehas = array('modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <h2 class="fw-bolder text-center font-title text-uppercase bg-warning rounded p-1"> LEARNING MODULES </h2>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <div class="h-75min card p-3">
                <div class="row my-0">
                    <div class="col-md-12">
                        <?php if(!empty($_SESSION['msg'])) : ?>
                        <ul id="alertCopyModuleSuccess" role="alert" class="alert alert-success">
                            <li id="succMsgCopyModuleAll" class=""><?php echo $_SESSION['msg']; ?></li>
                        </ul>
                        <?php endif; unset($_SESSION['msg']);?>

                        <form id="SearchModuleForm" action="">
                            <div class="input-group">
                                <input type="text" id="SearchSubjectCode" name="SearchSubjectCode"
                                    class="form-control border border-primary" placeholder="Search Subject Code">
                                <input type="text" id="SearchModuleButton" name="SearchModuleButton"
                                    class="form-control border border-primary" value="SearchModuleButton" hidden>
                                <button type="submit" class="btn btn-primary" id="SearchModule">
                                    search
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="SearchModuleLists">

                    </div>

                </div>
            </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
