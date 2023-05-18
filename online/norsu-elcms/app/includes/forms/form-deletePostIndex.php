<form method="POST" id="DeletePostIndexForm">
    <div class="modal-header bg-danger">
        <h5 class="modal-title" id="DeletePostIndexModalLabel"> Delete POST
        </h5>
        <button type="button" id="ModalCloseButtonDeletePostIndexOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="WarningDeletePostIndex" class="d-block">
            <div class="form-group d-none">
                <input type="text" id="DeletePostIndexCode" name="DeletePostIndexCode" class="form-control"
                    value="<?php echo $postcode; ?>" readonly />
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

        <div id="AlertDeletePostIndex" class="d-none">
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-check-circle text-success"></i>
                </div>
                <div class="modal-warning-title">
                    <h3 id="AlertDeletePostIndexMsg" class="text-center text-success">
                        Post Successfully deleted!
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div id="DeletePostIndexModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="DeletePostIndex" name="DeletePostIndex" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                <span class="ms-1">DELETE</span>
            </button>
        </div>

        <div id="DeletePostIndexModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonDeletePostIndexTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
