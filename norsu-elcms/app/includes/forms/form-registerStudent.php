<!-- student form -->
<div id="RegisterStudentForm" class="RegisterStudentForm d-none ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-lg-8 p-0">
                    <div class="RegisterationForm">
                        <button class="btn btn-warning w-100" id="RegisterStudentBackBtn">
                            <i class="fa-solid fa-arrow-left-to-line"></i>
                            <span class="ms-1">BACK</span>
                        </button>

                        <div class="bg-white rounded-2 border border-primary mt-2">
                            <div class="form-header text-center img-placeholder m-3">
                                <img src="<?php echo (BASE_URL . '/assets/images/icons/norsu-header.png') ?>"
                                    alt="norsu-header" class="" />
                            </div>

                            <div class="hr-1 bg-primary"></div>

                            <!-- form title -->
                            <div class="px-3">
                                <h5
                                    class="bg-primary text-white rounded-2 fw-bold text-center text-uppercase my-3 py-2">
                                    Student REGISTRATION FORM
                                </h5>
                            </div>

                            <div class="MultistepRegisterStudentProgress px-3 text-center my-3">
                                <button class="MultistepRegisterStudentProgressBtn active fs-8 cursor-normal"
                                    type="button" id="MultistepRegisterStudentProgressBtn_1">
                                    personal info
                                </button>
                                <button class="MultistepRegisterStudentProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterStudentProgressBtn_2">
                                    Contact info
                                </button>
                                <button class="MultistepRegisterStudentProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterStudentProgressBtn_3">
                                    Student Info
                                </button>
                                <button class="MultistepRegisterStudentProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterStudentProgressBtn_4">
                                    Account info
                                </button>
                            </div>

                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                enctype="multipart/form-data" class="" id="MultistepRegisterStudentForm">
                                <!-- step 1 -->
                                <div class="MultistepRegisterStudentFormPanel d-block" id="MultistepRegisterStudent_1">
                                    <!-- form alert -->
                                    <ul id="alertRegisterStudentError_1" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none" id="errRegisterStudentAll_1"></li>
                                        <li class="d-none" id="errRegisterStudentFirstname"></li>
                                        <li class="d-none" id="errRegisterStudentMiddlename"></li>
                                        <li class="d-none" id="errRegisterStudentLastname"></li>
                                        <li class="d-none" id="errRegisterStudentDob"></li>
                                        <li class="d-none" id="errRegisterStudentGender"></li>
                                    </ul>

                                    <!-- form subtitle (personal information) -->
                                    <div class="MultistepRegisterStudentFormTitle">
                                        <div class="px-3">
                                            <div class="d-flex justify-content-center align-items-center flex-row">
                                                <div class="hr-2 bg-dark"></div>
                                                <h6 class="text-dark fw-bold text-uppercase px-3">
                                                    PERSONAL&nbsp;INFORMATION
                                                </h6>
                                                <div class="hr-2 bg-dark"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form body (personal information) -->
                                    <div class="MultistepRegisterStudentFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- first name -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentFirstname" class="form-label">
                                                    first name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentFirstname" name="RegisterStudentFirstname"
                                                    placeholder="First Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- middle name -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentMiddlename" class="form-label">
                                                    middle name
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentMiddlename" name="RegisterStudentMiddlename"
                                                    placeholder="Middle Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- last name -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentLastname" class="form-label">
                                                    last name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentLastname" name="RegisterStudentLastname"
                                                    placeholder="Last Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- name extension -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentSuffix" class="form-label">
                                                    suffix or name extension
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentSuffix" placeholder="ex. Jr / Sr / III"
                                                    name="RegisterStudentSuffix" />
                                            </div>

                                            <!-- date of birth -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentDob" class="form-label">
                                                    date of birth <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" class="form-control border-primary"
                                                    id="RegisterStudentDob" name="RegisterStudentDob" />
                                            </div>

                                            <!-- gender -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentGender" class="form-label">
                                                    Gender <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example" name="RegisterStudentGender"
                                                    id="RegisterStudentGender">
                                                    <option hidden value="0">Select your gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterStudentFormButton">
                                        <div class="px-3 my-3 d-flex justify-content-end align-items-center flex-row">
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterStudent_1">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- step 2 -->
                                <div class="MultistepRegisterStudentFormPanel d-none" id="MultistepRegisterStudent_2">
                                    <!-- form alert -->
                                    <ul id="alertRegisterStudentError_2" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none " id="errRegisterStudentAll_2"></li>
                                        <li class="d-none" id="errRegisterStudentHomeAddress"></li>
                                        <li class="d-none" id="errRegisterStudentEmailAdd"></li>
                                        <li class="d-none" id="errRegisterStudentContactNo"></li>
                                    </ul>

                                    <!-- form subtitle (contact information)-->
                                    <div class="MultistepRegisterStudentFormTitle">
                                        <div class="px-3 mt-4 mb-2">
                                            <div class="d-flex justify-content-center align-items-center flex-row">
                                                <div class="hr-2 bg-dark"></div>
                                                <h6 class="text-dark fw-bold text-uppercase px-2">
                                                    contact&nbsp;INFORMATION
                                                </h6>
                                                <div class="hr-2 bg-dark"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form body (contact information)-->
                                    <div class="MultistepRegisterStudentFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- home address -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentHomeAddress" class="form-label">
                                                    home address <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control textarea-3 border-primary"
                                                    id="RegisterStudentHomeAddress" name="RegisterStudentHomeAddress"
                                                    placeholder="Home Address"></textarea>
                                            </div>

                                            <!-- email address -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentEmailAdd" class="form-label">
                                                    Email address <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control border-primary"
                                                    id="RegisterStudentEmailAdd" name="RegisterStudentEmailAdd"
                                                    placeholder="Email Address" />
                                            </div>

                                            <!-- contact number -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentContactNo" class="form-label">
                                                    contact number <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentContactNo" name="RegisterStudentContactNo"
                                                    maxlength="11" placeholder="09XX-XXX-XXXX"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterStudentFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterStudent_2" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterStudent_2">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- step 3 -->
                                <div class="MultistepRegisterStudentFormPanel d-none" id="MultistepRegisterStudent_3">
                                    <!-- form alert -->
                                    <ul id="alertRegisterStudentError_3" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none " id="errRegisterStudentAll_3"></li>
                                        <li class="d-none" id="errRegisterStudentID"></li>
                                        <li class="d-none" id="errRegisterStudentSelectCollege"></li>
                                        <li class="d-none" id="errRegisterStudentSelectCourse"></li>
                                        <li class="d-none" id="errRegisterStudentSelectMajor"></li>
                                        <li class="d-none" id="errRegisterStudentSelectSchoolyear"></li>
                                        <li class="d-none" id="errRegisterStudentSelectSemester"></li>
                                        <li class="d-none" id="errRegisterStudentLoadslip"></li>
                                    </ul>

                                    <!-- form subtitle (school information) -->
                                    <div class="MultistepRegisterStudentFormTitle">
                                        <div class="px-3 mt-4 mb-2">
                                            <div class="d-flex justify-content-center align-items-center flex-row">
                                                <div class="hr-2 bg-dark"></div>
                                                <h6 class="text-dark fw-bold text-uppercase px-2">
                                                    Student&nbsp;INFORMATION
                                                </h6>
                                                <div class="hr-2 bg-dark"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form body (school information) -->
                                    <div class="MultistepRegisterStudentFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- teacher number -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentID" class="form-label">
                                                    student number <span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentID" name="RegisterStudentID"
                                                    placeholder="Student number"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- college -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentSelectCollege" class="form-label">
                                                    college <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example"
                                                    id="RegisterStudentSelectCollege"
                                                    name="RegisterStudentSelectCollege"
                                                    onchange="RegisterStudentFetchCourses(this.value)">
                                                    <option hidden value="0">Select your College</option>
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

                                            <!-- course -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentSelectCourse" class="form-label">
                                                    course <span class="text-danger"> *</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example" id="RegisterStudentSelectCourse"
                                                    name="RegisterStudentSelectCourse" disabled
                                                    onchange="RegisterStudentFetchMajors(this.value)">
                                                    <option hidden value="0">Select your Course</option>
                                                </select>
                                            </div>

                                            <!-- MAJOR -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentSelectMajor" class="form-label">
                                                    major
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example" id="RegisterStudentSelectMajor"
                                                    name="RegisterStudentSelectMajor" disabled>
                                                    <option hidden value="">Select your Major</option>
                                                </select>
                                            </div>

                                            <div
                                                class="mb-2 d-flex justify-content-between align-items-center flex-row">
                                                <!-- School Year -->
                                                <div class="w-49">
                                                    <label for="RegisterStudentSelectSchoolyear" class="form-label">
                                                        Schoolyear <span class="text-danger"> *</span>
                                                    </label>
                                                    <select class="form-select border-primary"
                                                        aria-label="Default select example"
                                                        id="RegisterStudentSelectSchoolyear"
                                                        name="RegisterStudentSelectSchoolyear">
                                                        <option hidden value="0">Select Schoolyear</option>
                                                        <?php 
                                                            $sqlGetSchoolyear = "SELECT * FROM schoolyear";
                                                            $stmtGetSchoolyear = $pdo->query($sqlGetSchoolyear)->fetchAll();
                                                            foreach ($stmtGetSchoolyear as $row) {
                                                                $schoolyear_id = $row['schoolyear_id'];
                                                                $schoolyear_name = $row['schoolyear_name'];
                                                                echo "<option value='".$schoolyear_id."'>".$schoolyear_name."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- Semester -->
                                                <div class="w-49">
                                                    <label for="RegisterStudentSelectSemester" class="form-label">
                                                        Semester <span class="text-danger"> *</span>
                                                    </label>
                                                    <select class="form-select border-primary"
                                                        aria-label="Default select example"
                                                        id="RegisterStudentSelectSemester"
                                                        name="RegisterStudentSelectSemester">
                                                        <option hidden value="0">Select Semester</option>
                                                        <?php 
                                                            $sqlGetSemester = "SELECT * FROM semesters";
                                                            $stmtGetSemester = $pdo->query($sqlGetSemester)->fetchAll();
                                                            foreach ($stmtGetSemester as $row) {
                                                                $semester_id = $row['semester_id'];
                                                                $semester_name = $row['semester_name'];
                                                                echo "<option value='".$semester_id."'>".$semester_name."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- LOADSLIP -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentLoadslip" class="form-label">
                                                    loadslip file <span class="text-danger">*</span>
                                                </label>
                                                <input type="file" class="form-control border-primary"
                                                    name="RegisterStudentLoadslip" id="RegisterStudentLoadslip">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterStudentFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterStudent_3" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterStudent_3">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <!-- step 4 -->
                                <div class="MultistepRegisterStudentFormPanel d-none" id="MultistepRegisterStudent_4">
                                    <!-- form alert -->
                                    <ul id="alertRegisterStudentSuccess_4" role="alert"
                                        class="d-none mx-3 alert alert-success">
                                        <li id="succMsgRegisterStudentAll_4" class="d-none"></li>
                                    </ul>

                                    <ul id="alertRegisterStudentError_4" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none" id="errRegisterStudentAll_4"></li>
                                        <li class="d-none" id="errRegisterStudentUsername"></li>
                                        <li class="d-none" id="errRegisterStudentPassword"></li>
                                        <li class="d-none" id="errRegisterStudentConfirmPassword"></li>
                                    </ul>

                                    <!-- form subtitle (account information) -->
                                    <div class="MultistepRegisterStudentFormTitle">
                                        <div class="px-3 mt-4 mb-2">
                                            <div class="d-flex justify-content-center align-items-center flex-row">
                                                <div class="hr-2 bg-dark"></div>
                                                <h6 class="text-dark fw-bold text-uppercase px-2">
                                                    account&nbsp;INFORMATION
                                                </h6>
                                                <div class="hr-2 bg-dark"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form body (account information) -->
                                    <div class="MultistepRegisterStudentFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- username -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentUsername" class="form-label">
                                                    username <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterStudentUsername" name="RegisterStudentUsername"
                                                    placeholder="Username" />
                                            </div>

                                            <!-- password -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentPassword" class="form-label">
                                                    Password <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control flex-grow border-primary "
                                                        id="RegisterStudentPassword" name="RegisterStudentPassword"
                                                        data-toggle="password"
                                                        aria-describedby="RegisterStudentPasswordIcon"
                                                        placeholder="Password" />
                                                    <span
                                                        class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                                        id="RegisterStudentPasswordIcon" style="width: 46px">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- confirm password -->
                                            <div class="mb-2">
                                                <label for="RegisterStudentConfirmPassword" class="form-label">
                                                    confirm Password <span class="text-danger">*</span>
                                                </label>

                                                <div class="input-group">
                                                    <input type="password" class="form-control flex-grow border-primary"
                                                        id="RegisterStudentConfirmPassword"
                                                        name="RegisterStudentConfirmPassword" data-toggle="password"
                                                        aria-describedby="RegisterStudentConfirmPasswordIcon"
                                                        placeholder="Confirm Password" />
                                                    <span
                                                        class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                                        id="RegisterStudentConfirmPasswordIcon" style="width: 46px">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- form buttons -->
                                    <div class="MultistepRegisterStudentFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterStudent_4" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 btn btn-success ms-2" type="submit" id="RegisterStudent"
                                                name="RegisterStudent">
                                                <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>
                                                <span class="ms-2">Submit</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- end of form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of student form -->
