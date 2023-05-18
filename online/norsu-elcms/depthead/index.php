<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deptheadOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php');
    
?>

<?php 
    $title = 'Home'; 
    $page = 'home'; 
    $pagehas = array('posts', 'announcements');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>

    <main class="my-2 h-main">
        <div class="container-fluid fluid-padding ">
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
        </div>
        <div class="mt-2">
            <?php include ROOT_PATH . '/app/includes/footer.php'?>
        </div>
    </main>


    <?php include ROOT_PATH . '/app/includes/script.php'?>
    <script>
    fetchAllPosts();
    </script>
</body>


</html>
