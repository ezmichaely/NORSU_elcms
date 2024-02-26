<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    studentOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

?>

<?php 
    $title = 'Take Major Exam'; $page = 'take major exam';
    $pagehas = array('assessments');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">

            <div class="d-flex justify-content-between align-items-center flex-row">
                <a href="class-home.php" class="btn btn-warning ispan-sm">
                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                    <span>BACK</span>
                </a>

                <h3 class="fw-bold text-uppercase text-center">major exam #</h3>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ispan-sm" data-bs-toggle="modal"
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
                            <p class="fw-500 fs-6 font-title fw-bold text-uppercase">
                                <span> Question:&nbsp; </span>
                                <span class="badge bg-warning text-dark font-title fs-6 fw-bold">100</span>
                                <span class="">&nbsp;of&nbsp;</span>
                                <span class="badge bg-warning text-dark font-title fs-6 fw-bold">100</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-body text-center">
                    <p class="fw-500 fs-6 font-title fw-bold text-uppercase">
                        <span> time remaining:&nbsp; </span>
                        <span class="badge bg-primary text-white font-title fs-6 fw-bold">02</span>
                        <span class="">&nbsp;:&nbsp;</span>
                        <span class="badge bg-primary text-white font-title fs-6 fw-bold">60</span>
                        <span class="">&nbsp;:&nbsp;</span>
                        <span class="badge bg-primary text-white font-title fs-6 fw-bold">60</span>
                    </p>
                </div>

                <!-- Multiple CHOICE -->
                <div class="card-body d-block pt-0" id="multiple-choice">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white" id="q-number"
                                    placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase ">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center bg-white" id="q-points"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">Question</label>
                            <textarea class="form-control textarea-3 bg-white" id="exampleFormControlTextarea"
                                placeholder="" value="" readonly rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <fieldset class="">
                                <div class="d-flex justify-content-between align-items-center flex-row">
                                    <label class="m-0 p-0 fw-bold text-uppercase">
                                        Choices</label>
                                    <label class="m-0 p-0 fw-bold text-uppercase">Answer</label>
                                </div>

                                <div class="input-group">
                                    <textarea class="form-control bg-white" aria-label="Text input with radio button"
                                        rows="1" placeholder="" value="" readonly></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input cursor-pointer" type="radio" value=""
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control bg-white" aria-label="Text input with radio button"
                                        rows="1" placeholder="" value="" readonly></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input cursor-pointer" type="radio" value=""
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control bg-white" aria-label="Text input with radio button"
                                        rows="1" placeholder="" value="" readonly></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input cursor-pointer" type="radio" value=""
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea class="form-control bg-white" aria-label="Text input with radio button"
                                        rows="1" placeholder="" value="" readonly></textarea>
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input cursor-pointer" type="radio" value=""
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                                    <span class="">previous</span>
                                </button>

                                <button type="button" class="btn btn-primary">
                                    <span class="">next</span>
                                    <i class="fa-solid fa-arrow-right-to-line ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END OF Multiple CHOICE -->


                <!-- TRUE OR FALSE -->
                <div class="card-body d-block" id="true-false">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white text-dark"
                                    id="q-number" placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase ">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center bg-white" id="q-points"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">Question</label>
                            <textarea class="form-control textarea-3 bg-white" id="exampleFormControlTextarea"
                                placeholder="" value="" readonly rows="3"></textarea>
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
                                            <input class="form-check-input cursor-pointer" type="radio" value="True"
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>

                                <div class="input-group mt-2">
                                    <input type="text" readonly class="form-control bg-white text-muted"
                                        aria-label="Text input with radio button" placeholder="False" value="False">
                                    <label class="input-group-text m-0 px-4 cursor-pointer border-start-0">
                                        <div class="form-check-label">
                                            <input class="form-check-input cursor-pointer" type="radio" value="False"
                                                name="opt" aria-label="Radio button for following text input">
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                                    <span class="">previous</span>
                                </button>

                                <button type="button" class="btn btn-primary">
                                    <span class="">next</span>
                                    <i class="fa-solid fa-arrow-right-to-line ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END OF TRUE OR FALSE -->


                <!-- FILL IN THE BLANKS -->
                <div class="card-body d-block" id="fill-blanks">
                    <form class="row g-2">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <div class="col-md-1 me-1">
                                <label for="q-number" class="form-label mb-0 fw-bold text-uppercase">
                                    number</label>
                                <input type="number" class="form-control fw-bold text-center bg-white text-dark"
                                    id="q-number" placeholder="1" readonly>
                            </div>
                            <div class="col-md-1 ms-1">
                                <label for="q-points" class="form-label mb-0 fw-bold text-uppercase ">POINTS</label>
                                <input type="number" class="form-control fw-bold text-center bg-white" id="q-points"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea" class="form-label mb-0 ">
                                <span class=" text-uppercase fw-bold">Question</span>
                                <span class=" text-muted">(Use '_' underscores to replace the words you want to be
                                    filled.)</span>
                            </label>
                            <textarea class="form-control textarea-3 bg-white" id="exampleFormControlTextarea"
                                placeholder="" value="" readonly rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="exampleFormControlTextarea"
                                class="form-label mb-0 fw-bold text-uppercase">ANSWER</label>
                            <textarea class="form-control" id="exampleFormControlTextarea" rows="1"
                                placeholder="Enter Answer"></textarea>
                        </div>

                        <div class="col-12">
                            <div class="text-end">
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fa-solid fa-arrow-left-to-line me-1"></i>
                                        <span class="">previous</span>
                                    </button>

                                    <button type="button" class="btn btn-primary">
                                        <span class="">next</span>
                                        <i class="fa-solid fa-arrow-right-to-line ms-1"></i>
                                    </button>
                                </div>
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
