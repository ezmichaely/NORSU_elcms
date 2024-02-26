<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    adminOnly();

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
?>

<?php 
    $title = $page = $head_title = 'User - Requests';
    $pagehas = array('datatables', 'requests');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="container-fluid bg-primary">
    <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/aside.php'?>

    <main id="dashboard" class="dashboard max">
        <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/header.php'?>

        <div class="content bg-gray-200 p-3">
            <h3 class="text-uppercase fw-500"><?php echo $head_title ?></h3>

            <div class="card mt-2 card-assessment-tabs bg-white shadow-sm rounded-bottom">
                <div class="card-header bg-white rounded-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-row flex-wrap py-2">
                        <button id="btnRequestStudent"
                            class="btn btn-outline-primary card-header-list active text-uppercase fw-bold text-center">
                            <i class="fa-solid fa-screen-users"></i>
                            <span class="ms-1">STUDENTS</span></button>
                        </button>

                        <button id="btnRequestInstructor"
                            class="btn btn-outline-primary card-header-list text-uppercase fw-bold text-center">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span class="ms-1">instructors</span>
                        </button>

                        <button id="btnRequestDeptHead"
                            class=" btn btn-outline-primary card-header-list text-uppercase fw-bold text-center">
                            <i class="fa-solid fa-square-user"></i>
                            <span class="ms-1">Dept Head</span>
                        </button>

                        <button id="btnRequestDean"
                            class="btn btn-outline-primary card-header-list text-uppercase fw-bold text-center">
                            <i class="fa-solid fa-universal-access"></i>
                            <span class="ms-1">college dean</span>
                        </button>
                    </div>
                </div>
            </div>

            <div id="StudentDiv" class="d-block">
                <div class="mt-2"></div>
                <div class="card mt-3 p-3 shadow-sm">
                    <h3 class="text-uppercase fw-bold text-center bg-warning rounded py-2">STUDENT REQUESTS</h3>
                    <div id="StudentRequestTableDiv" class="data-table table-responsive hasAddButton">
                        <table id="StudentRequestTable" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>College</th>
                                    <th>Course</th>
                                    <th>Name</th>
                                    <th>Loadslip</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="StudentRequestBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="InstructorDiv" class="d-none">
                <div class="mt-2"></div>
                <div class="card mt-3 p-3 shadow-sm">
                    <h3 class="text-uppercase fw-bold text-center bg-warning rounded py-2">Instructor REQUESTS</h3>

                    <div id="InstructorRequestTableDiv" class="data-table table-responsive hasAddButton">
                        <table id="InstructorRequestTable" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="InstructorRequestBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="DeptHeadDiv" class="d-none">
                <div class="mt-2"></div>
                <div class="card mt-3 p-3 shadow-sm">
                    <h3 class="text-uppercase fw-bold text-center bg-warning rounded py-2">DeptHead REQUESTS</h3>

                    <div id="DeptHeadRequestTableDiv" class="data-table table-responsive hasAddButton">
                        <table id="DeptHeadRequestTable" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="DeptHeadRequestBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="DeanDiv" class="d-none">
                <div class="mt-2"></div>
                <div class="card mt-3 p-3 shadow-sm">
                    <h3 class="text-uppercase fw-bold text-center bg-warning rounded py-2">Dean REQUESTS</h3>

                    <div id="DeanRequestTableDiv" class="data-table table-responsive hasAddButton">
                        <table id="DeanRequestTable" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>College</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="DeanRequestBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include ROOT_PATH . '/app/includes/modals/AccountRequestModal.php'?>
        <?php include ROOT_PATH . '/app/includes/footer.php'?>
    </main>


    <?php include ROOT_PATH . '/app/includes/script.php'?>

</body>

</html>
