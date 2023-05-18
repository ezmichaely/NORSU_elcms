<form id="EditSubjectForm">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Subject</h5>
        <button type="button" id="ModalCloseButtonEditSubjectFormOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertEditSubjectSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditSubjectAll" class="d-none"></li>
        </ul>

        <ul id="alertEditSubjectError" role="alert" class="d-none alert alert-danger">
            <li id="errEditSubjectAll" class="d-none"></li>
            <li id="errEditSubjectCode" class="d-none"></li>
            <li id="errEditSubjectTitle" class="d-none"></li>
        </ul>

        <div class="d-none">
            <label for="EditSubjectId" class="form-label">Subject id</label>
            <input type="text" class="form-control border-primary" id="EditSubjectId" placeholder="Subject ID"
                name="EditSubjectId" value="<?php echo $ssubject_id; ?>">
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="EditSubjectCode" class="form-label">Subject code</label>
                <input type="text" class="form-control border-primary" id="EditSubjectCode" placeholder="Subject Code"
                    name="EditSubjectCode" value="<?php echo $ssubject_code; ?>">
            </div>

            <div class="mt-2 col-md-12">
                <label for="EditSubjectTitle" class="form-label">Subject Title</label>
                <textarea name="EditSubjectTitle" class="form-control border-primary textarea-2" id="EditSubjectTitle"
                    placeholder="Subject Title"><?php echo $ssubject_title; ?></textarea>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="ModalCloseButtonEditSubjectFormTwo" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
        <button type="submit" id="EditSubject" name="EditSubject" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>
