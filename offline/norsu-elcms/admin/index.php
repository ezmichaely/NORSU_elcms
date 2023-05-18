<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    adminOnly();

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/countAll.php');
?>

<?php 
    $title = $page = 'Dashboard Home';
    $head_title = 'Dashboard';
    $pagehas = array('datatables', 'authentications');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>


<body class="container-fluid bg-primary">
    <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/aside.php'?>

    <main id="dashboard" class="dashboard max">
        <?php include ROOT_PATH . '/app/includes/'.$s_directory.'/header.php'?>


        <!-- CONTENT HERE -->
        <div class="content bg-gray-200 p-3">
            <h3 class="text-uppercase fw-500"><?php echo $head_title ?></h3>

            <div class="mt-2"></div>
            <div class="cards mt-3">
                <div class="row g-3 justify-content-center">
                    <div class="col-lg-4">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-users"></i>
                                <span class="ms-3">users</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllAccounts; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card text-center border-warning shadow">
                            <div class="card-header bg-warning text-dark fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-users"></i>
                                <span class="ms-3">requests</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllAccounts; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card text-center border-success shadow">
                            <div class="card-header bg-success text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-users"></i>
                                <span class="ms-3">activated</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllAccounts; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-user-secret"></i>
                                <span class="ms-3">admin</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllAdmins; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-screen-users"></i>
                                <span class="ms-3">students</span>

                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllStudents; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <span class="ms-3">instructors</span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllInstructor; ?> </h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-square-user"></i>
                                <span class="ms-3">Dept Head</span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllDeptHead; ?> </h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center border-primary shadow">
                            <div class="card-header bg-primary text-white fw-bold text-uppercase font-title fs-4">
                                <i class="fa-solid fa-universal-access"></i>
                                <span class="ms-3">Dean</span>
                            </div>
                            <div class="card-body py-4">
                                <h1 class="card-title fw-bold"><?php echo $CountAllDean; ?> </h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
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

                    <div class="col-lg-3">
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


        </div>


        <?php include ROOT_PATH . '/app/includes/footer.php'?>
    </main>


    <?php include ROOT_PATH . '/app/includes/script.php'?>

</body>

</html>
