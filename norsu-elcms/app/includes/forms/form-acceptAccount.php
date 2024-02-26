<form method="POST" id="AcceptAccountForm">
    <div class="modal-header">
        <h5 class="modal-title" id="AcceptAccountModalLabel">
            Accept Account
        </h5>
        <button id="ModalCloseButtonAcceptAccountOne" type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="warningAcceptAccount" class="d-block">
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
                            this Account?
                        </p>
                    </div>
                </div>
                <div class="mt-1 col-md-12 d-none">
                    <label class="form-label">
                        ACCOUNT ID <span class="text-danger">*</span></label>
                    <input type="text" id="AcceptAccountID" name="AcceptAccountID" class="form-control border-primary"
                        value="<?php echo $aid; ?>" readonly />
                </div>
            </div>

        </div>

        <div id="alertAcceptAccount" class="d-none">
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-check-circle text-success"></i>
                </div>
                <div class="modal-warning-title">
                    <h3 id="succMsg" class="text-center text-success">You have successfully accepted this account.</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div id="AcceptAccountModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="AcceptAccount" name="AcceptAccount" data-id="<?php echo $aid; ?>"
                class="btn btn-success">
                <i class="fas fa-check"></i>
                <span class="ms-1">ACCEPT</span>
            </button>
        </div>

        <div id="AcceptAccountModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonAcceptAccountTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
