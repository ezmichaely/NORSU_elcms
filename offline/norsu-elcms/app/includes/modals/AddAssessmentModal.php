<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">ADD ASSESSMENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-between align-items-center flex-row flex-wrap">
                    <button class="odd btn btn-outline-primary border border-primary w-49 me-1 my-1"
                        data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                        QUIZ
                    </button>

                    <button class="even btn btn-outline-primary border border-primary w-49 ms-1 my-1"
                        data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">
                        ASSIGNMENT
                    </button>
                    <button class="odd btn btn-outline-primary border border-primary w-49 me-1 my-1"
                        data-bs-target="#exampleModalToggle4" data-bs-toggle="modal">
                        PROJECT
                    </button>
                    <button class="even btn btn-outline-primary border border-primary w-49 ms-1 my-1"
                        data-bs-target="#exampleModalToggle5" data-bs-toggle="modal">
                        MAJOR EXAM
                    </button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                    <span>Close</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">ADD QUIZ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                DATATABLES NI.
            </div>
            <div class="p-3 rounded-bottom border-top">
                <div class="d-flex justify-content-between align-items-center flex-row">
                    <button class="btn btn-warning ispan-sm" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span> BACK </span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-secondary ispan-sm" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                            <span>Close</span>
                        </button>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/quiz-new.php?ccode='.$ccode;?>"
                            target="_blank" type="button" class="btn btn-success ispan-sm">
                            <i class="fa-solid fa-plus"></i>
                            <span> ADD QUIZ </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel3">ADD ASSIGNMENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                DATATABLES NI.
            </div>
            <div class="p-3 rounded-bottom border-top">
                <div class="d-flex justify-content-between align-items-center flex-row">
                    <button class="btn btn-warning ispan-sm" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span> BACK </span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-secondary ispan-sm" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                            <span>Close</span>
                        </button>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/assignment-new.php?ccode='.$ccode;?>"
                            target="_blank" type="button" class="btn btn-success ispan-sm">
                            <i class="fa-solid fa-plus"></i>
                            <span> ADD ASSIGNMENT </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel4">ADD PROJECT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                DATATABLES NI.
            </div>
            <div class="p-3 rounded-bottom border-top">
                <div class="d-flex justify-content-between align-items-center flex-row">
                    <button class="btn btn-warning ispan-sm" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span> BACK </span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-secondary ispan-sm" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                            <span>Close</span>
                        </button>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/project-new.php?ccode='.$ccode;?>"
                            target="_blank" type="button" class="btn btn-success ispan-sm">
                            <i class="fa-solid fa-plus"></i>
                            <span> ADD PROJECT </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5"
    tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel5">ADD MAJOR EXAM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                DATATABLES NI.
            </div>
            <div class="p-3 rounded-bottom border-top">
                <div class="d-flex justify-content-between align-items-center flex-row">
                    <button class="btn btn-warning ispan-sm" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal">
                        <i class="fa-solid fa-arrow-left-to-line"></i>
                        <span> BACK </span>
                    </button>
                    <div>
                        <button type="button" class="btn btn-secondary ispan-sm" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                            <span>Close</span>
                        </button>
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/major_exam-new.php?ccode='.$ccode;?>"
                            target="_blank" type="button" class="btn btn-success ispan-sm">
                            <i class="fa-solid fa-plus"></i>
                            <span>ADD MAJOR EXAM</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
