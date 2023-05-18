<!-- ADD Major MODAL -->
<div class="modal fade fluid-padding" id="AddMajorModal" tabindex="-1" aria-labelledby="AddMajorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddMajorForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW Major</h5>
                    <button type="button" id="ModalCloseButtonAddMajorFormOne" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertAddMajorSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgAddMajorAll" class="d-none"></li>
                    </ul>

                    <ul id="alertAddMajorError" role="alert" class="d-none alert alert-danger">
                        <li id="errAddMajorAll" class="d-none"></li>
                        <li id="errAddMajorSelectCollege" class="d-none"></li>
                        <li id="errAddMajorSelectCourse" class="d-none"></li>
                        <li id="errAddMajorName" class="d-none"></li>
                    </ul>

                    <div class="mt-2">
                        <label for="AddMajorSelectCollege" class="form-label">College</label>
                        <select id="AddMajorSelectCollege" class="form-select border-primary"
                            aria-label="Default select example" name="AddMajorSelectCollege"
                            onchange="AddMajorFetchCourses(this.value)">
                            <option value="0" hidden>Select College</option>
                            <?php 
                                include(ROOT_PATH . '/app/controllers/fetchAllColleges.php');
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
                        <label for="AddMajorSelectCourse" class="form-label">Course</label>
                        <select id="AddMajorSelectCourse" class="form-select border-primary"
                            aria-label="Default select example" name="AddMajorSelectCourse" disabled>
                            <option value="0" hidden>Select Course</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <label for="AddMajorName" class="form-label">Major name</label>
                        <input type="text" class="form-control border-primary" id="AddMajorName"
                            placeholder="Major Name" name="AddMajorName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ModalCloseButtonAddMajorFormTwo" class="btn btn-danger"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>
                    <button type="submit" id="AddMajor" name="AddMajor" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT Major MODAL-->
<div class="modal fade" id="EditMajorModal" tabindex="-1" aria-labelledby="EditMajorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="EditMajorContentData"></div>
        </div>
    </div>
</div>
