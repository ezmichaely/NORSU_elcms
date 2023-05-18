<form method="POST" id="DeleteClassForm">
    <div class="modal-header bg-danger">
        <h5 class="modal-title" id="DeleteClassModalLabel"> Delete Class
        </h5>
        <button type="button" id="ModalCloseButtonDeleteClassOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="WarningDeleteClass" class="d-block">
            <div class="form-group d-none">
                <input type="text" id="DeleteClassCode" name="DeleteClassCode" class="form-control"
                    value="<?php echo $ccode; ?>" readonly />
            </div>
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-times-circle"></i>
                </div>
                <div class="modal-warning-title">
                    <h3>Are you sure?</h3>
                </div>
                <div class="modal-warning-body">
                    <p class="text-center hl-1">
                        Do you really want to delete these record? </br>
                        This process cannot be undone.
                    </p>
                </div>
            </div>
        </div>

        <div id="AlertDeleteClass" class="d-none">
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-check-circle text-success"></i>
                </div>
                <div class="modal-warning-title">
                    <h3 id="AlertDeleteClassMsg" class="text-center text-success">
                        Class Successfully deleted!
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div id="DeleteClassModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="DeleteClass" name="DeleteClass" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                <span class="ms-1">DELETE</span>
            </button>
        </div>

        <div id="DeleteClassModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonDeleteClassTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
