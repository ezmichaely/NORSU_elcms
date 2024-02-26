<form id="EditCollegeForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT college</h5>
        <button type="button" id="ModalCloseButtonEditCollegeFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertEditCollegeSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditCollegeAll" class="d-none"></li>
        </ul>

        <ul id="alertEditCollegeError" role="alert" class="d-none alert alert-danger">
            <li id="errEditCollegeAll" class="d-none"></li>
            <li id="errEditCollegeName" class="d-none"></li>
            <li id="errEditCollegeAcronym" class="d-none"></li>
        </ul>

        <div class="d-none">
            <label for="EditCollegeId" class="form-label">College id</label>
            <input type="text" class="form-control border-primary" id="EditCollegeId" placeholder="College ID"
                name="EditCollegeId" value="<?php echo $scollege_id; ?>">
        </div>

        <div class="">
            <label for="EditCollegeName" class="form-label">College name</label>
            <input type="text" class="form-control border-primary" id="EditCollegeName" placeholder="College Name"
                name="EditCollegeName" value="<?php echo $scollege_name; ?>">
        </div>

        <div class="mt-2">
            <label for="EditCollegeAcronym" class="form-label">Acronym</label>
            <input type="text" class="form-control border-primary" id="EditCollegeAcronym" placeholder="Acronym"
                name="EditCollegeAcronym" value="<?php echo $scollege_acronym; ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonEditCollegeFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
        <button type="submit" id="EditCollege" name="EditCollege" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>
