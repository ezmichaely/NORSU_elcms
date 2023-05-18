<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deptheadOnly();
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
   $title = 'Create Major Exam'; $page = 'new major exam';
    $pagehas = array('posts', 'announcements');
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

                <h3 class="fw-bold text-uppercase text-center">NEW MAJOR EXAM</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ispan" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span class="ms-1">submit</span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">SUBMIT QUIZ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>

            <h2 class="fw-bolder text-center text-uppercase font-title bg-warning rounded p-1">
                ITS 207 - Object oriented Programming II
            </h2>

            <div class="card my-2">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center flex-row flex-wrap">
                        <p class="text-uppercase fw-bold font-title fs-6">Questions</p>
                        <div class="d-flex justify-content-between align-items-center flex-row">
                            <p class="fw-500 fs-6">Total Questions:
                                <span class="badge bg-warning text-dark font-title fs-6 fw-bold">100</span>
                            </p>
                            <p class="fw-500 fs-6">&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                            <p class="fw-500 fs-6">Total Points:
                                <span class="badge bg-warning text-dark font-title fs-6 fw-bold">100</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row m-0 g-0">
                        <div class="col-md-6 mx-auto">
                            <select id="question-type" class="form-select form-select-lg mb-0"
                                aria-label="Default select example">
                                <option value="0" hidden value>Select Questionaire Type</option>
                                <option value="Multiple Choices">Multiple Choices</option>
                                <option value="True or False">True or False</option>
                                <option value="Fill in the Blank">Fill in the Blank</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Multiple CHOICE -->
                <div class="card-body d-none" id="multiple-choice">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white" id="q-number"
                                    placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center" id="q-points">
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">Question</label>
                            <textarea class="form-control textarea-3" id="exampleFormControlTextarea"
                                placeholder="Enter Question" rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <fieldset class="">
                                <div class="d-flex justify-content-between align-items-center flex-row">
                                    <label class="m-0 p-0 fw-bold text-uppercase">
                                        Choices</label>
                                    <label class="m-0 p-0 fw-bold text-uppercase">Answer</label>
                                </div>

                                <div class="input-group">
                                    <textarea class="form-control" aria-label="Text input with radio button" rows="1"
                                        placeholder="Enter Choice"></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control" aria-label="Text input with radio button" rows="1"
                                        placeholder="Enter Choice"></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control" aria-label="Text input with radio button" rows="1"
                                        placeholder="Enter Choice"></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control" aria-label="Text input with radio button" rows="1"
                                        placeholder="Enter Choice"></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
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
                <!-- END OF Multiple CHOICE -->


                <!-- TRUE OR FALSE -->
                <div class="card-body d-none" id="true-false">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white text-dark"
                                    id="q-number" placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center" id="q-points">
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">Question</label>
                            <textarea class="form-control textarea-3" id="exampleFormControlTextarea" rows="3"
                                placeholder="Enter Question"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <fieldset class="">
                                <div class="d-flex justify-content-between align-items-center flex-row">
                                    <label class="m-0 p-0 fw-bold text-uppercase">
                                        Choices</label>
                                    <label class="m-0 p-0 fw-bold text-uppercase">Answer</label>
                                </div>

                                <div class="input-group">
                                    <!-- <span class="form-control px-2">True</span> -->
                                    <input type="text" readonly class="form-control bg-white text-muted"
                                        aria-label="Text input with radio button" placeholder="True" value="True">
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="True" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <input type="text" readonly class="form-control bg-white text-muted"
                                        aria-label="Text input with radio button" placeholder="False" value="False">
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input" type="radio" value="False" name="opt"
                                                aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
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
                <!-- END OF TRUE OR FALSE -->


                <!-- FILL IN THE BLANKS -->
                <div class="card-body d-none" id="fill-blanks">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white text-dark"
                                    id="q-number" placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center" id="q-points">
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea" class="form-label mb-0 ">
                                <span class=" text-uppercase fw-bold">Question</span>
                                <span class=" text-muted">(Use '_' underscores to replace the words you want to be
                                    filled.)</span>
                            </label>
                            <textarea class="textarea-3 form-control" id="exampleFormControlTextarea" rows="3"
                                placeholder="Enter Question"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">ANSWER</label>
                            <textarea class="form-control" id="exampleFormControlTextarea" rows="1"
                                placeholder="Enter Answer"></textarea>
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
                <!-- END OF FILL IN THE BLANKS -->



            </div>
        </div>
    </main>
    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
