<!-- Modal -->
<div class="modal fade" id="ViewLoadslipModal" tabindex="-1" aria-labelledby="ViewLoadslipModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="ViewLoadslipContentData"></div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AcceptAccountModal" tabindex="-1" aria-labelledby="AcceptAccountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="AcceptAccountContentData"></div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="SendMessageModal" tabindex="-1" aria-labelledby="SendMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="SendMessageContentData">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AcceptAllStudentsModal" tabindex="-1" aria-labelledby="AcceptAllStudentsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="AcceptAllStudentsContentData">
                <form method="POST" id="AcceptAllStudentsForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AcceptAllStudentsModalLabel">
                            Accept ALL STUDENTS Account
                        </h5>
                        <button id="ModalCloseButtonAcceptAllStudentsOne" type="button"
                            class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="warningAcceptAllStudents" class="d-block">
                            <div class="row g-2">
                                <div class="modal-warning">
                                    <div class="modal-warning-icon">
                                        <i class="far fa-check-circle text-success"></i>
                                    </div>
                                    <div class="modal-warning-title ">
                                        <h3 class="text-success">Are you sure?</h3>
                                    </div>
                                    <div class="modal-warning-body">
                                        <p class="text-lowercase fw-bold text-center">
                                            <!-- <i class="far fa-check-circle text-success fw-bold"></i> -->
                                            <span class="text-uppercase">D</span>o you really want to
                                            <span class="text-success text-uppercase fw-bolder"><u>Accept</u></span>
                                            all of the student's accounts?
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-1 col-md-12 d-none">
                                    <label class="form-label">
                                        ACCOUNT type <span class="text-danger">*</span></label>
                                    <input type="text" id="AcceptAllStudentsType" name="AcceptAllStudentsType"
                                        class="form-control border-primary" value="2" readonly />
                                </div>
                            </div>

                        </div>

                        <div id="alertAcceptAllStudents" class="d-none">
                            <div class="modal-warning">
                                <div class="modal-warning-icon">
                                    <i class="far fa-check-circle text-success"></i>
                                </div>
                                <div class="modal-warning-title">
                                    <h3 id="succMsg" class="text-center text-success">
                                        You have successfully accepted
                                        all of the student's accounts.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="AcceptAllStudentsModalFooterOne" class="d-block">
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>

                            <button type="submit" id="AcceptAllStudents" name="AcceptAllStudents" data-id="2"
                                class="btn btn-success">
                                <i class="fas fa-check"></i>
                                <span class="ms-1">ACCEPT</span>
                            </button>
                        </div>

                        <div id="AcceptAllStudentsModalFooterTwo" class="d-none">
                            <button id="ModalCloseButtonAcceptAllStudentsTwo" type="button"
                                class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AcceptAllInstructorsModal" tabindex="-1" aria-labelledby="AcceptAllInstructorsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="AcceptAllInstructorsContentData">
                <form method="POST" id="AcceptAllInstructorsForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AcceptAllInstructorsModalLabel">
                            Accept ALL instructor Account
                        </h5>
                        <button id="ModalCloseButtonAcceptAllInstructorsOne" type="button"
                            class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="warningAcceptAllInstructors" class="d-block">
                            <div class="row g-2">
                                <div class="modal-warning">
                                    <div class="modal-warning-icon">
                                        <i class="far fa-check-circle text-success"></i>
                                    </div>
                                    <div class="modal-warning-title ">
                                        <h3 class="text-success">Are you sure?</h3>
                                    </div>
                                    <div class="modal-warning-body">
                                        <p class="text-lowercase fw-bold text-center">
                                            <!-- <i class="far fa-check-circle text-success fw-bold"></i> -->
                                            <span class="text-uppercase">D</span>o you really want to
                                            <span class="text-success text-uppercase fw-bolder"><u>Accept</u></span>
                                            all of the instructor's accounts?
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-1 col-md-12 d-none">
                                    <label class="form-label">
                                        ACCOUNT type <span class="text-danger">*</span></label>
                                    <input type="text" id="AcceptAllInstructorsType" name="AcceptAllInstructorsType"
                                        class="form-control border-primary" value="3" readonly />
                                </div>
                            </div>

                        </div>

                        <div id="alertAcceptAllInstructors" class="d-none">
                            <div class="modal-warning">
                                <div class="modal-warning-icon">
                                    <i class="far fa-check-circle text-success"></i>
                                </div>
                                <div class="modal-warning-title">
                                    <h3 id="succMsg" class="text-center text-success">
                                        You have successfully accepted
                                        all of the instructor's accounts.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="AcceptAllInstructorsModalFooterOne" class="d-block">
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>

                            <button type="submit" id="AcceptAllInstructors" name="AcceptAllInstructors" data-id="3"
                                class="btn btn-success">
                                <i class="fas fa-check"></i>
                                <span class="ms-1">ACCEPT</span>
                            </button>
                        </div>

                        <div id="AcceptAllInstructorsModalFooterTwo" class="d-none">
                            <button id="ModalCloseButtonAcceptAllInstructorsTwo" type="button"
                                class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AcceptAllDeptHeadModal" tabindex="-1" aria-labelledby="AcceptAllDeptHeadModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="AcceptAllDeptHeadContentData">

                <form method="POST" id="AcceptAllDeptHeadForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AcceptAllDeptHeadModalLabel">
                            Accept ALL dept head Account
                        </h5>
                        <button id="ModalCloseButtonAcceptAllDeptHeadOne" type="button"
                            class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="warningAcceptAllDeptHead" class="d-block">
                            <div class="row g-2">
                                <div class="modal-warning">
                                    <div class="modal-warning-icon">
                                        <i class="far fa-check-circle text-success"></i>
                                    </div>
                                    <div class="modal-warning-title ">
                                        <h3 class="text-success">Are you sure?</h3>
                                    </div>
                                    <div class="modal-warning-body">
                                        <p class="text-lowercase fw-bold text-center">
                                            <!-- <i class="far fa-check-circle text-success fw-bold"></i> -->
                                            <span class="text-uppercase">D</span>o you really want to
                                            <span class="text-success text-uppercase fw-bolder"><u>Accept</u></span>
                                            all of the dept head's accounts?
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-1 col-md-12 d-none">
                                    <label class="form-label">
                                        ACCOUNT type <span class="text-danger">*</span></label>
                                    <input type="text" id="AcceptAllDeptHeadType" name="AcceptAllDeptHeadType"
                                        class="form-control border-primary" value="4" readonly />
                                </div>
                            </div>

                        </div>

                        <div id="alertAcceptAllDeptHead" class="d-none">
                            <div class="modal-warning">
                                <div class="modal-warning-icon">
                                    <i class="far fa-check-circle text-success"></i>
                                </div>
                                <div class="modal-warning-title">
                                    <h3 id="succMsg" class="text-center text-success">
                                        You have successfully accepted
                                        all of the dept head's accounts.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="AcceptAllDeptHeadModalFooterOne" class="d-block">
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>

                            <button type="submit" id="AcceptAllDeptHead" name="AcceptAllDeptHead" data-id="4"
                                class="btn btn-success">
                                <i class="fas fa-check"></i>
                                <span class="ms-1">ACCEPT</span>
                            </button>
                        </div>

                        <div id="AcceptAllDeptHeadModalFooterTwo" class="d-none">
                            <button id="ModalCloseButtonAcceptAllDeptHeadTwo" type="button"
                                class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AcceptAllDeanModal" tabindex="-1" aria-labelledby="AcceptAllDeanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="AcceptAllDeanContentData">

                <form method="POST" id="AcceptAllDeanForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AcceptAllDeanModalLabel">
                            Accept ALL dean Account
                        </h5>
                        <button id="ModalCloseButtonAcceptAllDeanOne" type="button" class="btn-close btn-close-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="warningAcceptAllDean" class="d-block">
                            <div class="row g-2">
                                <div class="modal-warning">
                                    <div class="modal-warning-icon">
                                        <i class="far fa-check-circle text-success"></i>
                                    </div>
                                    <div class="modal-warning-title ">
                                        <h3 class="text-success">Are you sure?</h3>
                                    </div>
                                    <div class="modal-warning-body">
                                        <p class="text-lowercase fw-bold text-center">
                                            <!-- <i class="far fa-check-circle text-success fw-bold"></i> -->
                                            <span class="text-uppercase">D</span>o you really want to
                                            <span class="text-success text-uppercase fw-bolder"><u>Accept</u></span>
                                            all of the dean's accounts?
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-1 col-md-12 d-none">
                                    <label class="form-label">
                                        ACCOUNT type <span class="text-danger">*</span></label>
                                    <input type="text" id="AcceptAllDeanType" name="AcceptAllDeanType"
                                        class="form-control border-primary" value="5" readonly />
                                </div>
                            </div>

                        </div>

                        <div id="alertAcceptAllDean" class="d-none">
                            <div class="modal-warning">
                                <div class="modal-warning-icon">
                                    <i class="far fa-check-circle text-success"></i>
                                </div>
                                <div class="modal-warning-title">
                                    <h3 id="succMsg" class="text-center text-success">
                                        You have successfully accepted
                                        all of the dean's accounts.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="AcceptAllDeanModalFooterOne" class="d-block">
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>

                            <button type="submit" id="AcceptAllDean" name="AcceptAllDean" data-id="5"
                                class="btn btn-success">
                                <i class="fas fa-check"></i>
                                <span class="ms-1">ACCEPT</span>
                            </button>
                        </div>

                        <div id="AcceptAllDeanModalFooterTwo" class="d-none">
                            <button id="ModalCloseButtonAcceptAllDeanTwo" type="button" class="close btn btn-secondary"
                                data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                                <span class="ms-1">CLOSE</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
