<form method="POST" data-id="<?php echo $fmcode; ?>" id="ReviseModuleForm">
    <div class="modal-header">
        <h5 class="modal-title" id="ReviseModuleModalLabel">
            Revise Module
        </h5>
        <button id="ModalCloseButtonReviseModuleOne" type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="warningReviseModuleSuccess" class="d-block">
            <div class="row">
                <!-- <div class="modal-warning">
                    <div class="modal-warning-icon">
                        <i class="far fa-check-circle text-success"></i>
                    </div>
                    <div class="modal-warning-title ">
                        <h3 class="text-success">Are you sure?</h3>
                    </div>
                    <div class="modal-warning-body">
                        <p class="text-lowercase fw-bold">
                            <span class="text-uppercase">D</span>o you really want to
                            <span class="text-success text-uppercase fw-bolder"><u>Revise</u></span>
                            this Module?
                        </p>
                    </div>
                </div> -->
                <div class="modal-warning-body">
                    <p class="text-lowercase fw-bold text-center">
                        <i class="far fa-circle-xmark text-danger fw-bold"></i>
                        <span class="text-uppercase">D</span>o you really want to return this module for
                        <span class="text-danger text-uppercase fw-bolder"><u>revision</u> </span>?
                    </p>
                </div>
                <div class="mt-1 col-12">
                    <label class="form-label">
                        MODULE CODE <span class="text-danger">*</span></label>
                    <input type="text" id="ReviseModuleCode" name="ReviseModuleCode" class="form-control border-primary"
                        value="<?php echo $fmcode; ?>" readonly />
                </div>

                <div class="mt-1 col-12">
                    <label class="form-label">
                        MODULE title <span class="text-danger">*</span></label>
                    <input type="text" id="ReviseModuleTitle" name="ReviseModuleTitle"
                        class="form-control border-primary" value="<?php echo $fmtitle; ?>" readonly />
                </div>

                <div class="mt-1 col-6">
                    <label class="form-label">
                        SUBJECT <span class="text-danger">*</span></label>
                    <input type="text" id="ReviseModuleSubject" name="ReviseModuleSubject"
                        class="form-control border-primary" value="<?php echo $fmsubject; ?>" readonly />
                </div>
                <div class="mt-1 col-6">
                    <label class="form-label">
                        MODULE status <span class="text-danger">*</span></label>
                    <input type="text" id="ReviseModuleStatus" name="ReviseModuleStatus"
                        class="form-control border-primary" value="<?php echo $fmstatus; ?>" readonly />
                </div>
                <div class="mt-1 col-6 d-none">
                    <label class="form-label">
                        MODULE status <span class="text-danger">*</span></label>
                    <input type="text" id="ReviseModuleAuthor" name="ReviseModuleAuthor"
                        class="form-control border-primary" value="<?php echo $fmauthor; ?>" readonly />
                </div>
                <div class="mt-1 col-md-12">
                    <label class="form-label">
                        Remarks <span class="text-danger">*</span></label>
                    <textarea name="ReviseModuleMessage" id="ReviseModuleMessage"
                        class="form-control border-primary textarea-3" placeholder="Enter remarks"></textarea>
                </div>
            </div>

        </div>

        <div id="alertReviseModuleSuccess" class="d-none">
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
        <div id="ReviseModuleModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="ReviseModule" name="ReviseModule" data-id="<?php echo $fmcode; ?>"
                class="btn btn-danger">
                <i class="fa fa-reply"></i>
                <span class="ms-1">Revise</span>
            </button>
        </div>

        <div id="ReviseModuleModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonReviseModuleTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
