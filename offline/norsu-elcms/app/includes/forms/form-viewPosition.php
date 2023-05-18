<form id="ViewPositionForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Position</h5>
        <button type="button" id="ModalCloseButtonViewPositionFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="">
            <label for="ViewPositionId" class="form-label">Position id</label>
            <input type="text" class="form-control border-primary bg-white" id="ViewPositionId"
                placeholder="Position ID" name="ViewPositionId" value="<?php echo $satype_id ?>" readonly>
        </div>

        <div class="mt-2">
            <label for="ViewPositionName" class="form-label">Position name</label>
            <input type="text" class="form-control border-primary bg-white" id="ViewPositionName"
                placeholder="Position Name" name="ViewPositionName" value="<?php echo $satype_name ?>" readonly>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonViewPositionFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
    </div>
</form>
