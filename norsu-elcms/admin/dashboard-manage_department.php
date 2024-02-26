<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    adminOnly();

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');

?>

<?php 
    $title = $page = $head_title = 'Manage - Department';
    $pagehas = array('manage', 'datatables');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="container-fluid bg-primary">
    <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/aside.php'?>

    <main id="dashboard" class="dashboard max">
        <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/header.php'?>

        <div class="content bg-gray-200 p-3">
            <h3 class="text-uppercase fw-500"><?php echo $head_title ?></h3>

            <div class="card mt-3 p-3 shadow-sm">

                <div class="data-table table-responsive hasAddButton">
                    <table id="DepartmentTable" class="display table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>College</th>
                                <th>Department</th>
                                <th>Acronym</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>


        <?php include ROOT_PATH . '/app/includes/footer.php'?>
        <?php include ROOT_PATH . '/app/includes/modals/ManageDepartmentModal.php'?>
    </main>
    <?php include ROOT_PATH . '/app/includes/script.php'?>


    <script>
    $(document).ready(function() {
        fetchDepartment(0, 10000000);
        // FETCH ALL DepartmentS
        function fetchDepartment(start, limit) {
            $.ajax({
                url: baseUrl + '/app/controllers/crud/crudDepartment.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'fetchDepartment',
                    start: start,
                    limit: limit
                },
                success: function(response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                        start += limit;
                        fetchDepartment(start, limit);
                    } else {
                        $("#DepartmentTable").DataTable({
                            "columnDefs": [{
                                "targets": [3],
                                "orderable": false,
                            }, ],
                            dom: 'Blfrtip',
                            buttons: [{
                                    className: 'btn',
                                },
                                {
                                    className: 'btn',
                                    orientation: 'portrait',
                                    pageSize: 'A4',
                                    extend: 'pdfHtml5',
                                    // download: 'open',
                                    title: 'Departments',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3]
                                    }
                                }
                            ],
                            initComplete: function() {
                                var btns = $('.dt-buttons');
                                $('.dt-buttons').find('span').remove();
                                btns.children(':first-child').addClass('btn-success');
                                btns.children(':first-child').removeClass(
                                    'btn-secondary');
                                btns.children(':first-child').append(
                                    '<i class="fas fa-plus"></i><span class="ms-1">ADD NEW Department</span>'
                                );
                                btns.children(':first-child').attr('data-bs-toggle',
                                    'modal');
                                btns.children(':first-child').attr('data-bs-target',
                                    '#AddDepartmentModal');
                                btns.children(':last-child').append(
                                    '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>'
                                );
                                btns.removeClass('btn-group');
                                btns.removeClass('flex-wrap');

                            },
                            "lengthMenu": [
                                [10, 25, 50, -1],
                                [10, 25, 50, "All"]
                            ]
                        });
                    }
                }
            });
        }
    });
    </script>


</body>

</html>
