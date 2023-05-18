<form id="EditClassForm" method="post">
    <div class="modal-header">
        <h5 class="modal-title" id="EditClassModalLabel">Edit a class </h5>
        <button type="button" id="ModalCloseButtonEditClassOne" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
        </button>
    </div>
    <div class="modal-body">
        <ul id="alertEditClassSuccess" role="alert" class="d-none alert alert-success">
            <li id="succMsgEditClassAll" class="d-none"></li>
        </ul>

        <ul id="alertEditClassError" role="alert" class="d-none alert alert-danger fw-bold fs-7 py-2 px-4">
            <li id="errEditClassAll" class="d-none"></li>
            <li id="errEditClassTeacher" class="d-none"></li>
            <li id="errEditClassSubjectCode" class="d-none"></li>
            <li id="errEditClassSchoolyear" class="d-none"></li>
            <li id="errEditClassSemester" class="d-none"></li>
            <li id="errEditClassDay" class="d-none"></li>
            <li id="errEditClassTime" class="d-none"></li>
            <li id="errEditClassSection" class="d-none"></li>
            <li id="errEditClassModule" class="d-none"></li>
        </ul>

        <ul id="alertEditClassError" role="alert" class="d-none alert alert-success fw-bold fs-7 py-2 px-4">
            <li id="errAll" class="d-none"></li>
        </ul>

        <div class="mb-1">
            <label for="EditClassCode" class="form-label fw-bold text-uppercase">
                Class Code
            </label>
            <input type="text" class="form-control border-primary" id="EditClassCode" name="EditClassCode"
                value="<?php echo $ccode ?>" readonly>
        </div>

        <div class="mb-1">
            <div class="d-flex justify-content-between align-items-center flex-end">
                <label for="EditClassTeacher" class="form-label fw-bold text-uppercase">
                    Class Teacher <span class="text-danger">(ID Number)</span>
                </label>
                <label><a class="text-end cursor-pointer" onclick="changeTeacher()"> change teacher </a></label>
            </div>
            <input type="text" class="form-control border-primary" id="EditClassTeacher" name="EditClassTeacher"
                value="<?php echo $s_aid ?>" readonly>
        </div>

        <div class="mb-1">
            <label for="EditClassSubjectCode" class="form-label fw-bold text-uppercase">
                Subject Code
            </label>
            <select id="EditClassSubjectCode" name="EditClassSubjectCode" class="form-control font-text">
                <option value="<?php echo $sid; ?>" selected> <?php echo $scode; ?> </option>

                <?php foreach ($subjects as $row) : ?>
                <option value="<?php echo $row['subject_id']; ?>">
                    <?php echo $row['subject_code']; ?>
                </option>
                <?php endforeach; ?>
            </select>

        </div>
        <div class="mb-2">
            <label for="EditClassSubjectTitle" class="form-label fw-bold text-uppercase">
                Subject Title
            </label>
            <select id="EditClassSubjectTitle" name="EditClassSubjectTitle" placeholder="Subject Title"
                class="form-control font-text border-primary bg-white" disabled>
                <option value="<?php echo $sid; ?>" selected> <?php echo $stitle; ?> </option>
                <?php foreach ($subjects as $row) : ?>
                <option value="<?php echo $row['subject_id']; ?>">
                    <?php echo $row['subject_title']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-2">
            <label for="EditClassSchoolyear" class="form-label fw-bold text-uppercase">
                School year
            </label>
            <select id="EditClassSchoolyear" name="EditClassSchoolyear"
                class="form-control font-text border-primary cursor-pointer">
                <option value="<?php echo $syid; ?>" selected> <?php echo $syname; ?> </option>
                <?php foreach ($schoolyear as $row) : ?>
                <option value="<?php echo $row['schoolyear_id']; ?>">
                    <?php echo $row['schoolyear_name']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-2">
            <label for="EditClassSemester" class="form-label fw-bold text-uppercase">
                Semester
            </label>
            <select id="EditClassSemester" name="EditClassSemester"
                class="form-control font-text border-primary cursor-pointer">
                <option value="<?php echo $semid; ?>" selected> <?php echo $semname; ?> </option>
                <?php foreach ($semester as $row) : ?>
                <option value="<?php echo $row['semester_id']; ?>">
                    <?php echo $row['semester_name']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-2">
            <label for="EditClassDay" class="form-label fw-bold text-uppercase">
                Class Day
            </label>
            <select id="EditClassDay" name="EditClassDay" class="form-control font-text border-primary cursor-pointer">
                <option value="<?php echo $cday; ?>" selected> <?php echo $cdayname; ?> </option>
                <option value="MWF"> (MWF) Moday, Wednesday, & Friday </option>
                <option value="TTH"> (TTH) Tuesday & Thursday </option>
                <option value="SAT"> (SAT) Saturday </option>
                <option value="SUN"> (SUN) Sunday </option>
            </select>
        </div>


        <div class="mb-2">
            <label for="EditClassTime" class="form-label fw-bold text-uppercase">
                Class Time
            </label>
            <input type="text" class="form-control border-primary" id="EditClassTime" name="EditClassTime"
                value="<?php echo $ctime; ?>" placeholder="Class Time">
        </div>

        <div class="mb-2">
            <label for="EditClassSection" class="form-label fw-bold text-uppercase">
                Class Section
            </label>
            <input type="text" class="form-control border-primary" id="EditClassSection" name="EditClassSection"
                value="<?php echo $csec; ?>" placeholder="Class Section">
        </div>

        <div class="mb-2">
            <label for="EditClassModule" class="form-label fw-bold text-uppercase">
                Module Title
            </label>
            <select id="EditClassModule" name="EditClassModule"
                class="form-control font-text border-primary cursor-pointer border-danger">
                <option value="<?php echo $cmodule; ?>" selected> <?php echo $mtitle; ?> </option>
            </select>
        </div>

    </div>
    <div class="modal-footer">
        <button id="ModalCloseButtonEditClassTwo" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span class="ms-1">CLOSE</span>
        </button>
        <button type="submit" id="EditClass" name="EditClass" class="btn btn-primary">
            <i class="fas fa-save"></i>
            <span>SAVE</span>
        </button>
    </div>
</form>



<script>
const edteacher = $('#EditClassTeacher').val();
$('#EditClassSubjectCode').selectize({
    onInitialize: function() {
        this.trigger('change', this.getValue(), true);
    },
    onChange: function(value, isOnInitialize) {
        if (value !== '') {
            $("#EditClassSubjectTitle").val(value).change();
            $("#EditClassSubjectTitle").removeClass('text-muted');

            fetchEditSubjectModules(edteacher, value);
        }
    }
});

function changeTeacher() {
    $("#EditClassTeacher").attr('readonly', false);
    $("#EditClassTeacher").attr('placeholder', 'Enter Teacher ID Number');
}

function fetchEditSubjectModules(teacher, subject) {
    const nomodule = "<option value='' hidden>You have no published module for this subject.</option>";
    // console.log(teacher, subject);
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: {
            subject: subject,
            teacher: teacher,
            fetchThisSubjectModules: 'fetchThisSubjectModules'
        },
        success: function(data) {
            // console.log(data);
            if (data == nomodule) {
                $("#EditClassModule").attr("disabled", true);
                $("#EditClassModule").html('');
                $("#EditClassModule").append(data);
            } else {
                if (data != nomodule) {
                    $("#EditClassModule").attr("disabled", false);
                    $("#EditClassModule").html('');
                    $("#EditClassModule").append(data);
                }
            }
        }
    });
}
</script>
