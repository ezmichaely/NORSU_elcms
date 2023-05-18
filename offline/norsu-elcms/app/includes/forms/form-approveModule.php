<form method="POST" data-id="<?php echo $fmcode; ?>" id="ApproveModuleForm">
    <div class="modal-header">
        <h5 class="modal-title" id="ApproveModuleModalLabel">
            Approve Module
        </h5>
        <button id="ModalCloseButtonApproveModuleOne" type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="warningApproveModuleSuccess" class="d-block">
            <div class="row g-2">
                <div class="modal-warning">
                    <!-- <div class="modal-warning-icon">
                        <i class="far fa-check-circle text-success"></i>
                    </div>
                    <div class="modal-warning-title ">
                        <h3 class="text-success">Are you sure?</h3>
                    </div> -->
                    <div class="modal-warning-body">
                        <p class="text-lowercase fw-bold text-center">
                            <i class="far fa-check-circle text-success fw-bold"></i>
                            <span class="text-uppercase">D</span>o you really want to
                            <span class="text-success text-uppercase fw-bolder"><u>Approve</u></span>
                            this Module?
                        </p>
                    </div>
                </div>
                <div class="mt-1 col-md-12">
                    <label class="form-label">
                        MODULE CODE <span class="text-danger">*</span></label>
                    <input type="text" id="ApproveModuleCode" name="ApproveModuleCode"
                        class="form-control border-primary" value="<?php echo $fmcode; ?>" readonly />
                </div>

                <div class="mt-1 col-md-12">
                    <label class="form-label">
                        MODULE title <span class="text-danger">*</span></label>
                    <input type="text" id="ApproveModuleTitle" name="ApproveModuleTitle"
                        class="form-control border-primary" value="<?php echo $fmtitle; ?>" readonly />
                </div>

                <div class="mt-1 col-md-6">
                    <label class="form-label">
                        SUBJECT <span class="text-danger">*</span></label>
                    <input type="text" id="ApproveModuleSubject" name="ApproveModuleSubject"
                        class="form-control border-primary" value="<?php echo $fmsubject; ?>" readonly />
                </div>
                <div class="mt-1 col-md-6">
                    <label class="form-label">
                        MODULE status <span class="text-danger">*</span></label>
                    <input type="text" id="ApproveModuleStatus" name="ApproveModuleStatus"
                        class="form-control border-primary" value="<?php echo $fmstatus; ?>" readonly />
                </div>


            </div>

        </div>

        <div id="alertApproveModuleSuccess" class="d-none">
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-check-circle text-success"></i>
                </div>
                <div class="modal-warning-title">
                    <h3 id="succMsg" class="text-center text-success"></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div id="ApproveModuleModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="ApproveModule" name="ApproveModule" data-id="<?php echo $fmcode; ?>"
                class="btn btn-success">
                <i class="fas fa-check"></i>
                <span class="ms-1">APPROVE</span>
            </button>
        </div>

        <div id="ApproveModuleModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonApproveModuleTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
