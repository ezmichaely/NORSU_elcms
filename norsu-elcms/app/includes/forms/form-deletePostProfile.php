<form method="POST" id="DeletePostProfileForm">
    <div class="modal-header bg-danger">
        <h5 class="modal-title" id="DeletePostProfileModalLabel"> Delete POST
        </h5>
        <button type="button" id="ModalCloseButtonDeletePostProfileOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="WarningDeletePostProfile" class="d-block">
            <div class="form-group d-none">
                <input type="text" id="DeletePostProfileCode" name="DeletePostProfileCode" class="form-control"
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

        <div id="AlertDeletePostProfile" class="d-none">
            <div class="modal-warning">
                <div class="modal-warning-icon">
                    <i class="far fa-check-circle text-success"></i>
                </div>
                <div class="modal-warning-title">
                    <h3 id="AlertDeletePosProfiletMsg" class="text-center text-success">
                        Post Successfully deleted!
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div id="DeletePostProfileModalFooterOne" class="d-block">
            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>

            <button type="submit" id="DeletePostProfile" name="DeletePostProfile" class="btn btn-danger">
                <i class="fas fa-trash"></i>
                <span class="ms-1">DELETE</span>
            </button>
        </div>

        <div id="DeletePostProfileModalFooterTwo" class="d-none">
            <button id="ModalCloseButtonDeletePostProfileTwo" type="button" class="close btn btn-secondary"
                data-bs-dismiss="modal">
                <i class="fas fa-times"></i>
                <span class="ms-1">CLOSE</span>
            </button>
        </div>
    </div>
</form>
