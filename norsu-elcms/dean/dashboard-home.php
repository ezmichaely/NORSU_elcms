<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deanOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php');
?>

<?php 
    $title = 'Dashboard Home'; 
    $page = 'dashboard home';
    $head_title = 'Dashboard';
    $pagehas = array('datatables','modules');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="container-fluid bg-primary">
    <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/aside.php'?>

    <main id="dashboard" class="dashboard max">
        <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/header.php'?>

        <div class="content bg-gray-200 p-3">
            <h3 class="text-uppercase fw-500"><?php echo $head_title ?></h3>

            <div class="mt-2"></div>
            <div class="cards mt-3">
                <div class="row g-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <span class="ms-3">faculty members</span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountCollegeFaculty; ?> </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-screen-users"></i>
                                <span class="ms-3">students</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountCollegeStudents; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa fa-blackboard"></i>
                                <span class="ms-3"> classes </span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountCollegeClass; ?></h1>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa fa-book-open-reader"></i>
                                <span class="ms-3"> modules </span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountCollegeModule;?></h1>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-users-medical"></i>
                                <span class="ms-3"> announcements </span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php //echo $totalAccounts;?></h1>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="card mt-5 p-3 shadow">
                <h3 class="text-uppercase fw-bold text-center">MODULE APPROVAL</h3>
                <div class="data-table table-responsive hasNoAddButton">
                    <table id="ModuleApprovalTable" class="display table table-bordered table-hover">
                        <thead>
                            <tr>
                                <!-- <th>Code</th>
                                <th>Watermark</th> -->
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Author</th>
                                <th>Consent</th>
                                <th>Status</th>
                                <th># of Outline</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <?php include ROOT_PATH . '/app/includes/modals/ApprovalModuleModal.php'?>

        <?php include ROOT_PATH . '/app/includes/footer.php'?>
    </main>


    <?php include ROOT_PATH . '/app/includes/script.php'?>
    <script>
    $(document).ready(function() {
        fetchCollegeModuleApproval(0, 10000000);
        // FETCH ALL MajorS
        function fetchCollegeModuleApproval(start, limit) {
            $.ajax({
                url: baseUrl + '/app/controllers/query/fetchDataTables.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    fetchCollegeModuleApproval: 'fetchCollegeModuleApproval',
                    start: start,
                    limit: limit
                },
                success: function(response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                        start += limit;
                        fetchCollegeModuleApproval(start, limit);
                    } else {
                        $("#ModuleApprovalTable").DataTable({
                            "columnDefs": [{
                                "targets": [6],
                                "orderable": false,
                            }, ],
                            dom: 'Blfrtip',
                            buttons: [{
                                className: 'btn btn-secondary my-2',
                                text: '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                extend: 'pdfHtml5',
                                // download: 'open',
                                title: 'Module Approval',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            }],
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
