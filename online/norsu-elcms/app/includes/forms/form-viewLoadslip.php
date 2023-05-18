<form id="ViewLoadslipForm">
    <div class="modal-header">
        <h5 class="modal-title" id="ViewLoadslipModalLabel">View Loadslip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mt-0">
            <label for="ViewLoadslipSchoolyear" class="form-label">School year</label>
            <input type="text" class="form-control border-primary bg-white" id="ViewLoadslipSchoolyear"
                placeholder="Schoolyear" name="ViewLoadslipSchoolyear" value="<?php echo $sy; ?>" readonly>
        </div>

        <div class="mt-1">
            <label for="ViewLoadslipSemester" class="form-label">Semester</label>
            <input type="text" class="form-control border-primary bg-white" id="ViewLoadslipSemester"
                placeholder="Semester" name="ViewLoadslipSemester" value="<?php echo $sem; ?>" readonly>
        </div>

        <div class="mt-1">
            <label for="ViewLoadslipName" class="form-label">Loadslip Name</label>
            <input type="text" class="form-control border-primary bg-white" id="ViewLoadslipName"
                placeholder="Loadslip Name" name="ViewLoadslipName" value="<?php echo $ldname; ?>" readonly>
        </div>
        <a href="<?php echo $loadslip; ?>" target="_blank" class="">
            <div class="img-placeholder mt-2 rounded border border-primary overflow-hidden">
                <img src="<?php echo $loadslip; ?>" class="img-fluid" alt="LoadSlip">
            </div>
        </a>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span>CLOSE</span>
        </button>
    </div>
</form>
