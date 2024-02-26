<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    if(!empty(isset($_GET['m']))) {
        $receiver = $_GET['m'];
    }
?>


<?php 
    $title = 'NORSU-eLCMS | Messages'; $page = 'messages';
    $pagehas = array('contacts', 'messages');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>
<?php include ROOT_PATH . '/app/includes/script.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <div class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">
            <?php include ROOT_PATH . '/app/includes/common/chat-app.php'; ?>
        </div>
    </div>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>

    <script>
    $(document).ready(function() {
        <?php if (!empty(isset($_GET['m']))) : ?>

        var get_receiver = $('#get_receiver').val();
        var SessionUserID = $('#SessionUserID').val();
        var string = $.trim($("#SearchUsers").val());

        FetchContacts(SessionUserID, string, get_receiver);
        GetThisReceiverInfo(get_receiver);

        function FetchContacts(siad, string, get_receiver) {
            var nocontacts =
                '<a href="#" class="list-group-item list-group-item-action border-bottom"> <div class="fw-500 text-uppercase text-center fs-7 lh-1"> No available contacts </div> </a>';
            $.ajax({
                method: 'post',
                url: baseUrl + '/app/controllers/crud/crudContacts.php',
                dataType: 'text',
                data: {
                    FetchContacts: 'FetchContacts',
                    SessionUserID: siad,
                    string: string,
                    get_receiver: get_receiver
                },
                success: function(response) {
                    if (response != 'reachedMax' && response != 'no contacts') {
                        $("#ContactLists").html('');
                        $("#ContactLists").append(response);
                        // SetActiveContact();
                    }
                    if (response == 'no contacts') {
                        $("#ContactLists").html('');
                        $("#ContactLists").append(nocontacts);
                    }
                }
            });
        }

        $("#SearchUsers").on('click', function() {
            FetchContacts(SessionUserID, string);
        });

        $("#SearchUsers").keyup(function() {
            var string = $.trim($("#SearchUsers").val());
            FetchContacts(SessionUserID, string);
        });


        <?php endif; ?>
    });
    </script>
</body>

</html>
