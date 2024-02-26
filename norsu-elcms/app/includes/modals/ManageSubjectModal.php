<!-- ADD Subject MODAL -->
<div class="modal fade" id="AddSubjectModal" tabindex="-1" aria-labelledby="AddSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddSubjectForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW Subject</h5>
                    <button type="button" id="ModalCloseButtonAddSubjectFormOne" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertAddSubjectSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgAddSubjectAll" class="d-none"></li>
                    </ul>

                    <ul id="alertAddSubjectError" role="alert" class="d-none alert alert-danger">
                        <li id="errAddSubjectAll" class="d-none"></li>
                        <li id="errAddSubjectCode" class="d-none"></li>
                        <li id="errAddSubjectTitle" class="d-none"></li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="AddSubjectCode" class="form-label">Subject code</label>
                            <input type="text" class="form-control border-primary" id="AddSubjectCode"
                                placeholder="Subject Code" name="AddSubjectCode">
                        </div>

                        <div class="mt-2 col-md-12">
                            <label for="AddSubjectTitle" class="form-label">Subject Title</label>
                            <textarea name="AddSubjectTitle" class="form-control border-primary textarea-2"
                                id="AddSubjectTitle" placeholder="Subject Title"></textarea>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="ModalCloseButtonAddSubjectFormTwo" class="btn btn-danger"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>
                    <button type="submit" id="AddSubject" name="AddSubject" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT Subject MODAL-->
<div class="modal fade" id="EditSubjectModal" tabindex="-1" aria-labelledby="EditSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="EditSubjectContentData"></div>
        </div>
    </div>
</div>
