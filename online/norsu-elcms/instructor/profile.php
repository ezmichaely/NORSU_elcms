<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php');
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');

    if(isset($_GET['u'])) {
        $u_aid = $_GET['u'];
        if($u_aid == $s_aid) {
        } else {
            if($u_aid != $s_aid) {
                include(ROOT_PATH . '/app/controllers/query/getUserData.php'); 
            }
        }
    }
?>
<?php 
    $title = 'NORSU-eLCMS | Profile'; 
    $page = 'profile'; 
    $pagehas = array('authentication','posts','messages', 'contacts', 'croppie');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>

    <main class="container-fluid fluid-padding my-2">
        <div class="profile container fluid-padding">
            <?php if(isset($_GET['u'])):?>
            <?php if($u_aid == $s_aid) : ?>
            <?php include ROOT_PATH . '/app/includes/common/profile_mine.php'?>
            <?php endif; ?>

            <?php if($u_aid != $s_aid) : ?>
            <?php include ROOT_PATH . '/app/includes/common/profile_view.php'?>
            <?php endif; ?>
            <?php endif; ?>


            <?php if(empty(isset($_GET['u']))) : ?>
            <?php include ROOT_PATH . '/app/includes/common/profile_mine.php'?>
            <?php endif; ?>
        </div>
    </main>


    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>


    <script>
    $(document).ready(function() {
        <?php if(empty(isset($_GET['u']))) : ?>
        fetchMyPosts();
        <?php endif; ?>

        <?php if(isset($_GET['u'])):?>
        <?php if($u_aid == $s_aid) : ?>
        fetchMyPosts();
        <?php endif; ?>

        <?php if($u_aid != $s_aid) : ?>
        fetchThisPosts();
        <?php endif; ?>
        <?php endif; ?>
    });
    </script>
</body>

</html>
