<form id="EditCourseForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Course</h5>
        <button type="button" id="ModalCloseButtonEditCourseFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertEditCourseSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditCourseAll" class="d-none"></li>
        </ul>

        <ul id="alertEditCourseError" role="alert" class="d-none alert alert-danger">
            <li id="errEditCourseAll" class="d-none"></li>
            <li id="errEditCourseSelectCollege" class="d-none"></li>
            <li id="errEditCourseName" class="d-none"></li>
            <li id="errEditCourseAcronym" class="d-none"></li>
        </ul>

        <div class="d-none">
            <label for="EditCourseId" class="form-label">Course id</label>
            <input type="text" class="form-control border-primary" id="EditCourseId" placeholder="Course ID"
                name="EditCourseId" value="<?php echo $scourse_id; ?>">
        </div>

        <div class="">
            <label for="EditCourseSelectCollege" class="form-label">College</label>
            <select id="EditCourseSelectCollege" class="form-select border-primary" aria-label="Default select example"
                name="EditCourseSelectCollege">
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
            <label for="EditCourseName" class="form-label">Course name</label>
            <input type="text" class="form-control border-primary" id="EditCourseName" placeholder="Course Name"
                name="EditCourseName" value="<?php echo $scourse_name; ?>">
        </div>

        <div class="mt-2">
            <label for="EditCourseAcronym" class="form-label">Course Acronym</label>
            <input type="text" class="form-control border-primary" id="EditCourseAcronym" placeholder="Acronym"
                name="EditCourseAcronym" value="<?php echo $scourse_acronym; ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonEditCourseFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
        <button type="submit" id="EditCourse" name="EditCourse" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>
