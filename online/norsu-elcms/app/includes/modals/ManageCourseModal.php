<!-- ADD Course MODAL -->
<div class="modal fade" id="AddCourseModal" tabindex="-1" aria-labelledby="AddCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddCourseForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW Course</h5>
                    <button type="button" id="ModalCloseButtonAddCourseFormOne" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertAddCourseSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgAddCourseAll" class="d-none"></li>
                    </ul>

                    <ul id="alertAddCourseError" role="alert" class="d-none alert alert-danger">
                        <li id="errAddCourseAll" class="d-none"></li>
                        <li id="errAddCourseSelectCollege" class="d-none"></li>
                        <li id="errAddCourseName" class="d-none"></li>
                        <li id="errAddCourseAcronym" class="d-none"></li>
                    </ul>

                    <div class="">
                        <label for="AddCourseSelectCollege" class="form-label">College</label>
                        <select id="AddCourseSelectCollege" class="form-select border-primary"
                            aria-label="Default select example" name="AddCourseSelectCollege">
                            <option value="0" hidden>Select College</option>
                            <?php 
                                foreach ($colleges as $row) {
                                    $college_id = $row['college_id'];
                                    $college_name = $row['college_name'];
                                    $college_acronym = $row['college_acronym'];

                                    echo "<option value='".$college_id."'>".$college_name." (".$college_acronym.")</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="">
                        <label for="AddCourseName" class="form-label">Course name</label>
                        <input type="text" class="form-control border-primary" id="AddCourseName"
                            placeholder="Course Name" name="AddCourseName">
                    </div>

                    <div class="mt-2">
                        <label for="AddCourseAcronym" class="form-label">Course Acronym</label>
                        <input type="text" class="form-control border-primary" id="AddCourseAcronym"
                            placeholder="Acronym" name="AddCourseAcronym">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ModalCloseButtonAddCourseFormTwo" class="btn btn-danger"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>
                    <button type="submit" id="AddCourse" name="AddCourse" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT Course MODAL-->
<div class="modal fade" id="EditCourseModal" tabindex="-1" aria-labelledby="EditCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="EditCourseContentData"></div>
        </div>
    </div>
</div>
