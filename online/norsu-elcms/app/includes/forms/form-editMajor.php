<form id="EditMajorForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Major</h5>
        <button type="button" id="ModalCloseButtonEditMajorFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertEditMajorSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditMajorAll" class="d-none"></li>
        </ul>

        <ul id="alertEditMajorError" role="alert" class="d-none alert alert-danger">
            <li id="errEditMajorAll" class="d-none"></li>
            <li id="errEditMajorName" class="d-none"></li>
            <li id="errEditMajorAcronym" class="d-none"></li>
        </ul>

        <div class="d-none">
            <label for="EditMajorId" class="form-label">Major id</label>
            <input type="text" class="form-control border-primary" id="EditMajorId" placeholder="Major ID"
                name="EditMajorId" value="<?php echo $smajor_id; ?>">
        </div>

        <div class="">
            <label for="EditMajorSelectCollege" class="form-label">College</label>
            <select id="EditMajorSelectCollege" class="form-select border-primary" aria-label="Default select example"
                name="EditMajorSelectCollege" onchange="EditMajorFetchCourses(this.value)">
                <option value="<?php echo $scollege_id; ?>" hidden>
                    <?php echo $scollege_name." (".$scollege_acronym.")"; ?>
                </option>
                <?php 
                    $sqlGetCollege = "SELECT * FROM colleges";
                    $stmtGetCollege = $pdo->query($sqlGetCollege)->fetchAll();
                    foreach ($stmtGetCollege as $row) {
                        $college_id = $row['college_id'];
                        $college_name = $row['college_name'];
                        $college_acronym = $row['college_acronym'];
                        echo "<option value='".$college_id."'>".$college_name." (".$college_acronym.")</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mt-2">
            <label for="EditMajorSelectCourse" class="form-label">Course</label>
            <select id="EditMajorSelectCourse" class="form-select border-primary" aria-label="Default select example"
                name="EditMajorSelectCourse">
                <option value="<?php echo $scourse_id; ?>" hidden selected>
                    <?php echo $scourse_name." (".$scourse_acronym.")" ?>
                </option>

                <?php 
                    $sqlGetCourse = "SELECT * FROM courses 
                        INNER JOIN colleges ON colleges.college_id = courses.college_id 
                        WHERE courses.college_id = :cid";
                    $stmtGetCourse = $pdo->prepare($sqlGetCourse);
                    $stmtGetCourse->execute(['cid' => $scollege_id]); 
                    $rowGetCourse = $stmtGetCourse->fetchAll();
                    foreach ($rowGetCourse as $row) {
                        $course_id = $row['course_id'];
                        $course_name = $row['course_name'];
                        $course_acronym = $row['course_acronym'];
                        echo "<option value='".$course_id."'>".$course_name." (".$course_acronym.")</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mt-2">
            <label for="EditMajorName" class="form-label">Major name</label>
            <input type="text" class="form-control border-primary" id="EditMajorName" placeholder="Major Name"
                name="EditMajorName" value="<?php echo $smajor_name; ?>">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonEditMajorFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
        <button type="submit" id="EditMajor" name="EditMajor" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>
