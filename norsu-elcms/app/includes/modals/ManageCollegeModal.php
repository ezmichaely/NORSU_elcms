<!-- ADD COLLEGE MODAL -->
<div class="modal fade" id="AddCollegeModal" tabindex="-1" aria-labelledby="AddCollegeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddCollegeForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW college</h5>
                    <button type="button" id="ModalCloseButtonAddCollegeFormOne" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertAddCollegeSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgAddCollegeAll" class="d-none"></li>
                    </ul>

                    <ul id="alertAddCollegeError" role="alert" class="d-none alert alert-danger">
                        <li id="errAddCollegeAll" class="d-none"></li>
                        <li id="errAddCollegeName" class="d-none"></li>
                        <li id="errAddCollegeAcronym" class="d-none"></li>
                    </ul>

                    <div class="">
                        <label for="AddCollegeName" class="form-label">College name</label>
                        <input type="text" class="form-control border-primary" id="AddCollegeName"
                            placeholder="College Name" name="AddCollegeName">
                    </div>

                    <div class="mt-2">
                        <label for="AddCollegeAcronym" class="form-label">College Acronym</label>
                        <input type="text" class="form-control border-primary" id="AddCollegeAcronym"
                            placeholder="Acronym" name="AddCollegeAcronym">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ModalCloseButtonAddCollegeFormTwo" class="btn btn-danger"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>
                    <button type="submit" id="AddCollege" name="AddCollege" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT COLLEGE MODAL-->
<div class="modal fade" id="EditCollegeModal" tabindex="-1" aria-labelledby="EditCollegeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="EditCollegeContentData"></div>
        </div>
    </div>
</div>
