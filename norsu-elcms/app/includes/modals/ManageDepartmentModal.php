<!-- ADD DEPARTMENT MODAL -->
<div class="modal fade" id="AddDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddDepartmentForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW Department</h5>
                    <button type="button" id="ModalCloseButtonDepartmentFormOne" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertAddDepartmentSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgAddDepartmentAll" class="d-none"></li>
                    </ul>

                    <ul id="alertAddDepartmentError" role="alert" class="d-none alert alert-danger">
                        <li id="errAddDepartmentAll" class="d-none"></li>
                        <li id="errAddDepartmentSelectCollege" class="d-none"></li>
                        <li id="errAddDepartmentName" class="d-none"></li>
                        <li id="errAddDepartmentAcronym" class="d-none"></li>
                    </ul>

                    <div class="">
                        <label for="AddDepartmentSelectCollege" class="form-label">College</label>
                        <select id="AddDepartmentSelectCollege" class="form-select border-primary"
                            aria-label="Default select example" name="AddDepartmentSelectCollege">
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

                    <div class="mt-2">
                        <label for="AddDepartmentName" class="form-label">Department name</label>
                        <input type="text" class="form-control border-primary" id="AddDepartmentName"
                            placeholder="Department Name" name="AddDepartmentName">
                    </div>

                    <div class="mt-2">
                        <label for="AddDepartmentAcronym" class="form-label">Acronym</label>
                        <input type="text" class="form-control border-primary" id="AddDepartmentAcronym"
                            placeholder="Acronym" name="AddDepartmentAcronym">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ModalCloseButtonDepartmentFormTwo" class="btn btn-danger"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>
                    <button type="submit" id="AddDepartment" name="AddDepartment" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDIT Department MODAL-->
<div class="modal fade" id="EditDepartmentModal" tabindex="-1" aria-labelledby="EditDepartmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="EditDepartmentContentData"></div>
        </div>
    </div>
</div>
