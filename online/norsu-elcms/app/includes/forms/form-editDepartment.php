<form id="EditDepartmentForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Department</h5>
        <button type="button" id="ModalCloseButtonEditDepartmentFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertEditDepartmentSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditDepartmentAll" class="d-none"></li>
        </ul>

        <ul id="alertEditDepartmentError" role="alert" class="d-none alert alert-danger">
            <li id="errEditDepartmentAll" class="d-none"></li>
            <li id="errEditDepartmentSelectCollege" class="d-none"></li>
            <li id="errEditDepartmentName" class="d-none"></li>
            <li id="errEditDepartmentAcronym" class="d-none"></li>
        </ul>

        <div class="d-none">
            <label for="EditDepartmentId" class="form-label">Department id</label>
            <input type="text" class="form-control border-primary" id="EditDepartmentId" placeholder="Department ID"
                name="EditDepartmentId" value="<?php echo $sdepartment_id; ?>">
        </div>

        <div class="mt-2">
            <label for="EditDepartmentSelectCollege" class="form-label">College</label>
            <select id="EditDepartmentSelectCollege" class="form-select border-primary"
                aria-label="Default select example" name="EditDepartmentSelectCollege">
                <option value="<?php echo $scollege_id; ?>" hidden selected>
                    <?php echo $scollege_name . " (".$scollege_acronym.")"; ?></option>
                <?php 
                    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');
                    foreach ($colleges as $row) {
                        $college_id = $row['college_id'];
                        $college_name = $row['college_name'];
                        $college_acronym = $row['college_acronym'];
                        echo "<option value='".$college_id."'>".$college_name." (".$college_acronym.")</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mt-2">
            <label for="EditDepartmentName" class="form-label">Department name</label>
            <input type="text" class="form-control border-primary" id="EditDepartmentName" placeholder="Department Name"
                name="EditDepartmentName" value="<?php echo $sdepartment_name; ?>">
        </div>

        <div class="mt-2">
            <label for="EditDepartmentAcronym" class="form-label">Department Acronym</label>
            <input type="text" class="form-control border-primary" id="EditDepartmentAcronym" placeholder="Acronym"
                name="EditDepartmentAcronym" value="<?php echo $sdepartment_acronym; ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonEditDepartmentFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
        <button type="submit" id="EditDepartment" name="EditDepartment" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>
