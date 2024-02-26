<?php require_once('path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>

<?php 
    $title ='NORSU-eLCMS'; 
    $page = "RegisterUser"; 
    $pagehas = array('authentication');
?>

<?php include(ROOT_PATH . '/app/includes/head.php')?>

<body class="bg-change">
    <div id="RegisterBody" class="h-body fluid-padding d-flex justify-content-center align-items-center">
        <div class="container my-3">

            <?php include(ROOT_PATH . '/app/includes/homepage/chooseAccount.php') ?>
            <?php include(ROOT_PATH . '/app/includes/forms/form-registerStudent.php') ?>
            <?php include(ROOT_PATH . '/app/includes/forms/form-registerTeacher.php') ?>

        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/footer.php') ?>
    <?php include(ROOT_PATH . '/app/includes/script.php') ?>
    <script>
    setTimeout(function() {
        let message = $("#succMsgRegisterAll").text();
        if (message != '') {
            $("#succMsgRegisterAll").html('');
            $("#alertRegisterSuccess").removeClass('d-block');
            $("#alertRegisterSuccess").addClass('d-none');
            $("#succMsgRegisterAll").removeClass('d-block');
            $("#succMsgRegisterAll").addClass('d-none');
        }
    }, 15000);
    </script>
</body>

</html>
