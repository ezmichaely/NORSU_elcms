<!-- Modal -->
<div class="modal fade" id="CreateClassModal" tabindex="-1" aria-labelledby="CreateClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="CreateClassForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateClassModalLabel">Create a class </h5>
                    <button type="button" id="ModalCloseButtonCreateClassOne" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="alertCreateClassSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgCreateClassAll" class="d-none"></li>
                    </ul>

                    <ul id="alertCreateClassError" role="alert"
                        class="d-none alert alert-danger fw-bold fs-7 py-2 px-4">
                        <li id="errCreateClassAll" class="d-none"></li>
                        <li id="errCreateClassSubjectCode" class="d-none"></li>
                        <li id="errCreateClassSchoolyear" class="d-none"></li>
                        <li id="errCreateClassSemester" class="d-none"></li>
                        <li id="errCreateClassDay" class="d-none"></li>
                        <li id="errCreateClassTime" class="d-none"></li>
                        <li id="errCreateClassSection" class="d-none"></li>
                        <li id="errCreateClassModule" class="d-none"></li>
                    </ul>

                    <ul id="alertCreateClassError" role="alert"
                        class="d-none alert alert-success fw-bold fs-7 py-2 px-4">
                        <li id="errAll" class="d-none"></li>
                    </ul>

                    <div class="mb-1 d-none">
                        <label for="CreateClassTeacher" class="form-label fw-bold text-uppercase">
                            Class Teacher
                        </label>
                        <input type="text" class="form-control border-primary" id="CreateClassTeacher"
                            name="CreateClassTeacher" value="<?php echo $s_aid ?>">
                    </div>

                    <div class="mb-1">
                        <label for="CreateClassSubjectCode" class="form-label fw-bold text-uppercase">
                            Subject Code
                        </label>
                        <select id="CreateClassSubjectCode" name="CreateClassSubjectCode"
                            class="form-control font-text">
                            <option value=""> Search Subject Code </option>

                            <?php foreach ($subjects as $row) : ?>
                            <option value="<?php echo $row['subject_id']; ?>">
                                <?php echo $row['subject_code']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-2">
                        <label for="CreateClassSubjectTitle" class="form-label fw-bold text-uppercase">
                            Subject Title
                        </label>
                        <select id="CreateClassSubjectTitle" name="CreateClassSubjectTitle" placeholder="Subject Title"
                            class="form-control font-text border-primary text-muted" disabled>
                            <option value=""> Subject Title </option>
                            <?php foreach ($subjects as $row) : ?>
                            <option value="<?php echo $row['subject_id']; ?>">
                                <?php echo $row['subject_title']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="CreateClassSchoolyear" class="form-label fw-bold text-uppercase">
                            School year
                        </label>
                        <select id="CreateClassSchoolyear" name="CreateClassSchoolyear"
                            class="form-control font-text border-primary cursor-pointer">
                            <option value="" hidden> Select School year </option>
                            <?php foreach ($schoolyear as $row) : ?>
                            <option value="<?php echo $row['schoolyear_id']; ?>">
                                <?php echo $row['schoolyear_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="CreateClassSemester" class="form-label fw-bold text-uppercase">
                            Semester
                        </label>
                        <select id="CreateClassSemester" name="CreateClassSemester"
                            class="form-control font-text border-primary cursor-pointer">
                            <option value="" hidden> Select Semester </option>
                            <?php foreach ($semester as $row) : ?>
                            <option value="<?php echo $row['semester_id']; ?>">
                                <?php echo $row['semester_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="CreateClassDay" class="form-label fw-bold text-uppercase">
                            Class Day
                        </label>
                        <select id="CreateClassDay" name="CreateClassDay"
                            class="form-control font-text border-primary cursor-pointer">
                            <option value="" hidden> Select Class Day </option>
                            <option value="MWF"> (MWF) Moday, Wednesday, & Friday </option>
                            <option value="TTH"> (TTH) Tuesday & Thursday </option>
                            <option value="SAT"> (SAT) Saturday </option>
                            <option value="SUN"> (SUN) Sunday </option>
                        </select>
                    </div>


                    <div class="mb-2">
                        <label for="CreateClassTime" class="form-label fw-bold text-uppercase">
                            Class Time
                        </label>
                        <input type="text" class="form-control border-primary" id="CreateClassTime"
                            name="CreateClassTime" placeholder="Class Time">
                    </div>

                    <div class="mb-2">
                        <label for="CreateClassSection" class="form-label fw-bold text-uppercase">
                            Class Section
                        </label>
                        <input type="text" class="form-control border-primary" id="CreateClassSection"
                            name="CreateClassSection" placeholder="Class Section">
                    </div>

                    <div class="mb-2">
                        <label for="CreateClassModule" class="form-label fw-bold text-uppercase">
                            Module Title
                        </label>
                        <select id="CreateClassModule" name="CreateClassModule"
                            class="form-control font-text border-primary cursor-pointer" disabled>
                            <option value="" hidden> Select Module Title</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="ModalCloseButtonCreateClassTwo" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="CreateClass" name="CreateClass" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
