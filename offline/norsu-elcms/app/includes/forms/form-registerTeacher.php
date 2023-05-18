<!-- Teacher form -->
<div id="RegisterTeacherForm" class="RegisterTeacherForm d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-lg-8 p-0">
                    <div class="RegisterationForm">
                        <button class="btn btn-warning w-100" id="RegisterTeacherBackBtn">
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
                                    Teacher REGISTRATION FORM
                                </h5>
                            </div>

                            <div class="MultistepRegisterTeacherProgress px-3 text-center my-3">
                                <button class="MultistepRegisterTeacherProgressBtn active fs-8 cursor-normal"
                                    type="button" id="MultistepRegisterTeacherProgressBtn_1">
                                    personal info
                                </button>
                                <button class="MultistepRegisterTeacherProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterTeacherProgressBtn_2">
                                    Contact info
                                </button>
                                <button class="MultistepRegisterTeacherProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterTeacherProgressBtn_3">
                                    Teacher Info
                                </button>
                                <button class="MultistepRegisterTeacherProgressBtn fs-8 cursor-normal" type="button"
                                    id="MultistepRegisterTeacherProgressBtn_4">
                                    Account info
                                </button>
                            </div>

                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                enctype="multipart/form-data" class="" id="MultistepRegisterTeacherForm">
                                <!-- step 1 -->
                                <div class="MultistepRegisterTeacherFormPanel d-block" id="MultistepRegisterTeacher_1">
                                    <!-- form alert -->
                                    <ul id="alertRegisterTeacherError_1" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none" id="errRegisterTeacherAll_1"></li>
                                        <li class="d-none" id="errRegisterTeacherFirstname"></li>
                                        <li class="d-none" id="errRegisterTeacherMiddlename"></li>
                                        <li class="d-none" id="errRegisterTeacherLastname"></li>
                                        <li class="d-none" id="errRegisterTeacherDob"></li>
                                        <li class="d-none" id="errRegisterTeacherGender"></li>
                                    </ul>

                                    <!-- form subtitle (personal information) -->
                                    <div class="MultistepRegisterTeacherFormTitle">
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
                                    <div class="MultistepRegisterTeacherFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- first name -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherFirstname" class="form-label">
                                                    first name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherFirstname" name="RegisterTeacherFirstname"
                                                    placeholder="First Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- middle name -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherMiddlename" class="form-label">
                                                    middle name
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherMiddlename" name="RegisterTeacherMiddlename"
                                                    placeholder="Middle Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- last name -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherLastname" class="form-label">
                                                    last name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherLastname" name="RegisterTeacherLastname"
                                                    placeholder="Last Name"
                                                    onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- name extension -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherSuffix" class="form-label">
                                                    suffix or name extension
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherSuffix" placeholder="ex. Jr / Sr / III"
                                                    name="RegisterTeacherSuffix" />
                                            </div>

                                            <!-- date of birth -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherDob" class="form-label">
                                                    date of birth <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" class="form-control border-primary"
                                                    id="RegisterTeacherDob" name="RegisterTeacherDob" />
                                            </div>

                                            <!-- gender -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherGender" class="form-label">
                                                    Gender <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example" name="RegisterTeacherGender"
                                                    id="RegisterTeacherGender">
                                                    <option hidden value="0">Select your gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterTeacherFormButton">
                                        <div class="px-3 my-3 d-flex justify-content-end align-items-center flex-row">
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterTeacher_1">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- step 2 -->
                                <div class="MultistepRegisterTeacherFormPanel d-none" id="MultistepRegisterTeacher_2">
                                    <!-- form alert -->
                                    <ul id="alertRegisterTeacherError_2" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none " id="errRegisterTeacherAll_2"></li>
                                        <li class="d-none" id="errRegisterTeacherHomeAddress"></li>
                                        <li class="d-none" id="errRegisterTeacherEmailAdd"></li>
                                        <li class="d-none" id="errRegisterTeacherContactNo"></li>
                                    </ul>

                                    <!-- form subtitle (contact information)-->
                                    <div class="MultistepRegisterTeacherFormTitle">
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
                                    <div class="MultistepRegisterTeacherFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- home address -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherHomeAddress" class="form-label">
                                                    home address <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control textarea-3 border-primary"
                                                    id="RegisterTeacherHomeAddress" name="RegisterTeacherHomeAddress"
                                                    placeholder="Home Address"></textarea>
                                            </div>

                                            <!-- email address -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherEmailAdd" class="form-label">
                                                    Email address <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control border-primary"
                                                    id="RegisterTeacherEmailAdd" name="RegisterTeacherEmailAdd"
                                                    placeholder="Email Address" />
                                            </div>

                                            <!-- contact number -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherContactNo" class="form-label">
                                                    contact number <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherContactNo" name="RegisterTeacherContactNo"
                                                    maxlength="11" placeholder="09XX-XXX-XXXX"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterTeacherFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterTeacher_2" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterTeacher_2">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- step 3 -->
                                <div class="MultistepRegisterTeacherFormPanel d-none" id="MultistepRegisterTeacher_3">
                                    <!-- form alert -->
                                    <ul id="alertRegisterTeacherError_3" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none " id="errRegisterTeacherAll_3"></li>
                                        <li class="d-none" id="errRegisterTeacherID"></li>
                                        <li class="d-none" id="errRegisterTeacherSelectPosition"></li>
                                        <li class="d-none" id="errRegisterTeacherSelectCollege"></li>
                                        <li class="d-none" id="errRegisterTeacherSelectDepartment"></li>
                                    </ul>

                                    <!-- form subtitle (school information) -->
                                    <div class="MultistepRegisterTeacherFormTitle">
                                        <div class="px-3 mt-4 mb-2">
                                            <div class="d-flex justify-content-center align-items-center flex-row">
                                                <div class="hr-2 bg-dark"></div>
                                                <h6 class="text-dark fw-bold text-uppercase px-2">
                                                    Teacher&nbsp;INFORMATION
                                                </h6>
                                                <div class="hr-2 bg-dark"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form body (school information) -->
                                    <div class="MultistepRegisterTeacherFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- teacher number -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherID" class="form-label">
                                                    Teacher number <span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherID" name="RegisterTeacherID"
                                                    placeholder="Teacher number"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                            </div>

                                            <!-- Position -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherSelectPosition" class="form-label">
                                                    Position <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example"
                                                    id="RegisterTeacherSelectPosition"
                                                    name="RegisterTeacherSelectPosition"
                                                    onchange="RegisterTeacherDepartmentChange(this.value)">
                                                    <option hidden value="0" selected>Select your Position
                                                    </option>
                                                    <?php 
                                                        $sqlGetPosition = "";
                                                        $sqlGetPosition .= "SELECT * FROM `atypes` LIMIT 3 OFFSET 2";
                                                        $stmtGetPosition = $pdo->query($sqlGetPosition)->fetchAll();
                
                                                        foreach ($stmtGetPosition as $row) {
                                                            $Position_id = $row['atype_id'];
                                                            $Position_name = $row['atype_name'];
                                                            echo "<option value='".$Position_id."'>".$Position_name."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- college -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherSelectCollege" class="form-label">
                                                    college <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example"
                                                    id="RegisterTeacherSelectCollege"
                                                    name="RegisterTeacherSelectCollege"
                                                    onchange="RegisterTeacherFetchDepartments(this.value)">
                                                    <option hidden value="0" selected>Select your College
                                                    </option>
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

                                            <!-- Department -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherSelectDepartment" class="form-label">
                                                    Department <span class="text-danger"> *</span>
                                                </label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example"
                                                    id="RegisterTeacherSelectDepartment"
                                                    name="RegisterTeacherSelectDepartment" disabled>
                                                    <option hidden value="">Select your Department</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- form buttons -->
                                    <div class="MultistepRegisterTeacherFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterTeacher_3" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 ms-2 btn btn-primary" type="button"
                                                id="NextRegisterTeacher_3">
                                                <span class="me-2">Next</span>
                                                <i class="fa-solid fa-arrow-right-to-line"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <!-- step 4 -->
                                <div class="MultistepRegisterTeacherFormPanel d-none" id="MultistepRegisterTeacher_4">
                                    <!-- form alert -->
                                    <ul id="alertRegisterTeacherSuccess_4" class="d-none alert alert-success mx-3"
                                        role="alert">
                                        <li id="succMsgRegisterTeacherAll_4" class="d-none"></li>
                                    </ul>

                                    <ul id="alertRegisterTeacherError_4" class="d-none alert alert-danger mx-3"
                                        role="alert">
                                        <li class="d-none" id="errRegisterTeacherAll_4"></li>
                                        <li class="d-none" id="errRegisterTeacherUsername"></li>
                                        <li class="d-none" id="errRegisterTeacherPassword"></li>
                                        <li class="d-none" id="errRegisterTeacherConfirmPassword"></li>
                                    </ul>

                                    <!-- form subtitle (account information) -->
                                    <div class="MultistepRegisterTeacherFormTitle">
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
                                    <div class="MultistepRegisterTeacherFormContent">
                                        <div class="px-3 mt-2">
                                            <!-- username -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherUsername" class="form-label">
                                                    username <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control border-primary"
                                                    id="RegisterTeacherUsername" name="RegisterTeacherUsername"
                                                    placeholder="Username" />
                                            </div>

                                            <!-- password -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherPassword" class="form-label">
                                                    Password <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control flex-grow border-primary "
                                                        id="RegisterTeacherPassword" name="RegisterTeacherPassword"
                                                        data-toggle="password"
                                                        aria-describedby="RegisterTeacherPasswordIcon"
                                                        placeholder="Password" />
                                                    <span
                                                        class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                                        id="RegisterTeacherPasswordIcon" style="width: 46px">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- confirm password -->
                                            <div class="mb-2">
                                                <label for="RegisterTeacherConfirmPassword" class="form-label">
                                                    confirm Password <span class="text-danger">*</span>
                                                </label>

                                                <div class="input-group">
                                                    <input type="password" class="form-control flex-grow border-primary"
                                                        id="RegisterTeacherConfirmPassword"
                                                        name="RegisterTeacherConfirmPassword" data-toggle="password"
                                                        aria-describedby="RegisterTeacherConfirmPasswordIcon"
                                                        placeholder="Confirm Password" />
                                                    <span
                                                        class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                                        id="RegisterTeacherConfirmPasswordIcon" style="width: 46px">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- form buttons -->
                                    <div class="MultistepRegisterTeacherFormButton">
                                        <div
                                            class="px-3 my-3 d-flex justify-content-between align-items-center flex-row">
                                            <button id="PrevRegisterTeacher_4" class="w-50 me-2 btn btn-secondary"
                                                type="button">
                                                <i class="fa-solid fa-arrow-left-to-line"></i>
                                                <span class="ms-2">Previous</span>
                                            </button>
                                            <button class="w-50 btn btn-success ms-2" type="button" id="RegisterTeacher"
                                                name="RegisterTeacher">
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
<!-- end of Teacher form -->
