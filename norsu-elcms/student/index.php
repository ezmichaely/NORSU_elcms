<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    studentOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php');
?>

<?php 
    $title = 'NORSU-eLCMS | Home'; 
    $page = 'home'; 
    $pagehas = array('announcements', 'posts');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>

    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">
            <div class="row g-2">
                <!-- LEFT SIDE -->
                <?php include ROOT_PATH . '/app/includes/common/index-left.php'?>

                <!-- CENTER -->
                <div class="col-md-8 col-lg-8">
                    <?php include ROOT_PATH . '/app/includes/forms/form-addPost.php'?>

                    <div class="hr-1 bg-gray-300 my-2"></div>

                    <!-- FETCH POSTS -->
                    <div id="PostBox"></div>

                </div>

                <!-- RIGHT SIDE -->
                <?php // include ROOT_PATH . '/app/includes/fetch/fetch-right_profile.php'?>
            </div>
        </div>
    </main>


    <?php include ROOT_PATH . '/app/includes/script.php'?>
    <script>
    fetchAllPosts();
    </script>
</body>

</html>
