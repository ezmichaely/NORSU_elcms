<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    if(isset($_GET['ccode'])) {
        $ccode = $_GET['ccode'];
        include(ROOT_PATH . '/app/controllers/query/getClassData.php'); 
    } else {
        header('Location: ' .BASE_URL. '/'.$s_directory.'/myclass.php');
    }
?>

<?php 
    $title = 'Create Assignment'; $page = 'new assignment';
    $pagehas = array('');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">

            <div class="d-flex justify-content-between align-items-center flex-row">
                <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-home.php?ccode='.$ccode;?>"
                    class="btn btn-warning ispan">
                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                    <span>BACK</span>
                </a>

                <h3 class="fw-bold text-uppercase text-center">NEW assignment</h3>


                <a href="#" class="invisible btn btn-warning ispan d-none d-lg-block ">
                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                    <span>BACK</span>
                </a>


            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <h2 class="fw-bolder text-center text-uppercase font-title bg-warning rounded p-1">
                ITS 207 - Object oriented Programming II
            </h2>

            <div class="card my-2">
                <div class="card-header bg-primary text-white">
                    <p class="text-uppercase fw-bold font-title fs-6">Questions</p>
                </div>

                <!-- PROJECT -->
                <div class="card-body">
                    <form class="row g-2">
                        <div class="col-md-4">
                            <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                due date</label>
                            <input type="date" class="form-control text-center cursor-pointer" id="q-number">
                        </div>

                        <div class="col-md-4">
                            <label for="q-points" class="form-label mb-0 fw-bold text-uppercase">POINTS</label>
                            <input type="number" class="form-control fw-bold text-center" id="q-points">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0 fw-bold text-uppercase">submission type</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="0" hidden>Select Submission Type</option>
                                <option value="File">File</option>
                                <option value="Link">Link</option>
                            </select>
                        </div>


                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">Question</label>
                            <textarea class="form-control textarea-3" id="exampleFormControlTextarea"
                                placeholder="Enter Question" rows="3"></textarea>
                        </div>

                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>
                                    <span class="ms-1">
                                        sAVE QUESTION
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END OF PROJECT -->

            </div>
        </div>
    </main>
    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
