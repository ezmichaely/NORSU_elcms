<div class="card border-top-0 overflow-hidden">
    <div class="row m-0 p-0 g-0">
        <div class="w-50-md border-end-md">
            <form action="" id="EditProfileForm">
                <div class="personal_info">
                    <div class="card-header fw-bold text-uppercase border-top rounded-0 bg-dark">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <h6 class="fw-bold text-warning">PERSONAL INFORMATION</h6>
                            <div class="d-inline-flex">
                                <button type="button" id="EditBtnPersonalInfo"
                                    class="btn btn-warning btn-sm ispan-md px-3 d-block ">
                                    <i class="fa-solid fa-pen fs-8"></i>
                                    <!-- <span class="fs-8">edit</span> -->
                                </button>


                                <button type="button" id="EditCancelBtnPersonalInfo"
                                    class="btn btn-secondary btn-sm d-none ispan-md px-3">
                                    <i class="fa-solid fa-xmark fs-7"></i>
                                    <!-- <span class="fs-8">Cancel</span> -->
                                </button>

                                <input type="text" id="EditProfileInfo" name="EditProfileInfo" value="EditProfileInfo"
                                    hidden>

                                <button type="submit" id="EditPersonalInfo" name="EditPersonalInfo"
                                    value="EditPersonalInfo" class="btn btn-primary btn-sm d-none ispan-md px-3 ms-2">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <!-- <span class="fs-8">save</span> -->
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul id="alertEditProfileSuccess" role="alert" class="d-none alert alert-success">
                            <li id="succMsgEditProfileAll" class="d-none"></li>
                        </ul>

                        <ul id="alertEditProfileError" class="d-none alert alert-danger" role="alert">
                            <li class="d-none" id="errEditProfileAll"></li>
                            <li class="d-none" id="errEditProfileFirstname"></li>
                            <li class="d-none" id="errEditProfileMiddlename"></li>
                            <li class="d-none" id="errEditProfileLastname"></li>
                            <li class="d-none" id="errEditProfileHomeAddress"></li>
                            <li class="d-none" id="errEditProfileEmailAdd"></li>
                            <li class="d-none" id="errEditProfileContactNo"></li>
                            <li class="d-none" id="errEditProfileDob"></li>
                            <li class="d-none" id="errEditProfileGender"></li>
                        </ul>

                        <div class="d-flex justify-content-start align-items-start flex-row ">
                            <i class="fa-solid fa-id-card fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row g-2">
                                    <div class="col-lg-6">
                                        <label for="EditProfileFirstname" class="form-label fs-8 mb-0 p-0">first name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditProfileFirstname" placeholder="First Name"
                                            name="EditProfileFirstname" value="<?php echo $s_aafn; ?>"
                                            onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                            readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="EditProfileMiddlename" class="form-label fs-8 mb-0 p-0">Middle
                                            name</label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditProfileMiddlename" placeholder="Middle Name"
                                            name="EditProfileMiddlename" value="<?php echo $s_aamn; ?>"
                                            onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                            readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="EditProfileLastname" class="form-label fs-8 mb-0 p-0">Last name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditProfileLastname" placeholder="Last Name" name="EditProfileLastname"
                                            value="<?php echo $s_aaln; ?>"
                                            onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                            readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="EditProfileSuffixname" class="form-label fs-8 m-0 p-0">suffix
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditProfileSuffixname" placeholder="ex. jr / sr / III"
                                            name="EditProfileSuffixname" value="<?php echo $s_aasn; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-location-dot fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditProfileHomeAddress" class="form-label fs-8 mb-1 p-0">
                                            home address <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control textarea-2 border-primary p-1 px-2"
                                            id="EditProfileHomeAddress" name="EditProfileHomeAddress"
                                            placeholder="Home Address" readonly><?php echo $s_aaa; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-envelope fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditProfileEmailAdd" class="form-label fs-8 mb-1 p-0">
                                            Email address <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control border-primary p-1 px-2"
                                            id="EditProfileEmailAdd" name="EditProfileEmailAdd"
                                            placeholder="Email Address" value="<?php echo $s_aae ?>" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-phone fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditProfileContactNo" class="form-label fs-8 mb-1 p-0">
                                            contact number <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditProfileContactNo" name="EditProfileContactNo" maxlength="11"
                                            placeholder="09XX-XXX-XXXX" value="<?php echo $s_aac ?>"
                                            onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-cake-candles fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditProfileDob" class="form-label fs-8 mb-1 p-0">
                                            date of birth <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control border-primary p-1 px-2"
                                            id="EditProfileDob" name="EditProfileDob" value="<?php echo $s_aadobymd; ?>"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3 ">
                            <i class="fa-solid fa-venus-mars fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditProfileGender" class="form-label fs-8 mb-1 p-0">
                                            Gender <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" name="EditProfileGender"
                                            id="EditProfileGender" disabled>
                                            <option hidden value="<?php echo $s_aag; ?>" selected>
                                                <?php echo $s_aag; ?>
                                            </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-50-md">
            <form action="" id="EditOtherDetailsForm">
                <div class="other_details">
                    <div class="card-header fw-bold text-uppercase border-top rounded-0 bg-dark">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <h6 class="fw-bold text-warning">other details about me</h6>
                            <div class="d-inline-flex">
                                <button type="button" id="EditBtnOtherDetails"
                                    class="btn btn-warning btn-sm ispan-md px-3">
                                    <i class="fa-solid fa-pen fs-8"></i>
                                    <!-- <span class="fs-8">edit</span> -->
                                </button>

                                <button type="button" id="EditCancelBtnOtherDetails"
                                    class="btn btn-secondary btn-sm d-none ispan-md px-3">
                                    <i class="fa-solid fa-xmark fs-7"></i>
                                    <!-- <span class="fs-8">Cancel</span> -->
                                </button>

                                <input type="text" id="EditOtherDetailsInfo" name="EditOtherDetailsInfo"
                                    value="EditOtherDetailsInfo" hidden>

                                <button type="submit" id="EditOtherDetails" name="EditOtherDetails"
                                    value="EditOtherDetails" class="btn btn-primary btn-sm d-none ms-2 ispan-md px-3">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <!-- <span class="fs-8">save</span> -->
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul id="alertEditOtherSuccess" role="alert" class="d-none alert alert-success">
                            <li id="succMsgEditOtherAll" class="d-none"></li>
                        </ul>

                        <ul id="alertEditOtherError" class="d-none alert alert-danger" role="alert">
                            <li class="d-none" id="errEditOtherAll"></li>
                        </ul>

                        <div class="d-flex justify-content-start align-items-start flex-row">
                            <i class="fa-solid fa-user-pen fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditOtherAboutMe" class="form-label fs-8 mb-1 p-0">
                                            About me
                                        </label>
                                        <textarea class="form-control textarea-3 border-primary p-1 px-2"
                                            id="EditOtherAboutMe" name="EditOtherAboutMe" placeholder="About me"
                                            readonly><?php echo $s_uuam ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i
                                class="fa-solid fa-image-polaroid-user fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditOtherName" class="form-label fs-8 mb-1 p-0">
                                            Other Name
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditOtherName" name="EditOtherName" placeholder="Other Name"
                                            value="<?php echo $s_uuon ?>" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-user-music fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditOtherNamePronounce" class="form-label fs-8 mb-1 p-0">
                                            Name Pronounciation
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditOtherNamePronounce" name="EditOtherNamePronounce"
                                            placeholder="Name Pronounciation" value="<?php echo $s_uunp ?>" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-message-quote fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditOtherFaveQuote" class="form-label fs-8 mb-1 p-0">
                                            Favorite Quote
                                        </label>
                                        <textarea class="form-control border-primary p-1 px-2 textarea-3"
                                            id="EditOtherFaveQuote" name="EditOtherFaveQuote"
                                            placeholder="Favorite Quote" readonly><?php echo $s_uufq ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row m-0 p-0 g-0">
        <div class="w-50-md border-end-md">
            <form action="" id="EditEducationalInfoForm">
                <?php if(!empty($s_uuclid) || !empty($s_uudid) || !empty($s_uucrid) || !empty($s_uumid)) : ?>
                <div class="educational_info">
                    <div class="card-header fw-bold text-uppercase border-top rounded-0 bg-dark">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <h6 class="fw-bold text-warning">educational INFORMATION</h6>
                            <div class="d-inline-flex">
                                <button type="button" id="EditBtnEducationalInfo"
                                    class="btn btn-warning btn-sm ispan-md px-3">
                                    <i class="fa-solid fa-pen fs-8"></i>
                                    <!-- <span class="fs-8">edit</span> -->
                                </button>
                                <button type="button" id="EditCancelBtnEducationalInfo"
                                    class="btn btn-secondary btn-sm d-none ispan-md px-3">
                                    <i class="fa-solid fa-xmark fs-7"></i>
                                    <!-- <span class="fs-8">Cancel</span> -->
                                </button>
                                <input type="text" id="EditEducationInfo" name="EditEducationInfo"
                                    value="EditEducationInfo" hidden>

                                <button type="submit" id="EditEducationalInfo" name="EditEducationalInfo"
                                    value="EditEducationalInfo"
                                    class="btn btn-primary btn-sm d-none ms-2 ispan-md px-3">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <!-- <span class="fs-8">save</span> -->
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul id="alertEditEducationalInfoSuccess" role="alert" class="d-none alert alert-success">
                            <li id="succMsgEditEducationalInfoAll" class="d-none"></li>
                        </ul>

                        <ul id="alertEditEducationalInfoError" class="d-none alert alert-danger" role="alert">
                            <li class="d-none " id="errEditEducationalInfoAll_3"></li>
                            <li class="d-none" id="errEditEducationalInfoSelectCollege"></li>
                            <li class="d-none" id="errEditEducationalInfoSelectDepartment"></li>
                            <li class="d-none" id="errEditEducationalInfoSelectCourse"></li>
                            <li class="d-none" id="errEditEducationalInfoSelectMajor"></li>

                        </ul>
                        <?php if(!empty($s_uuclid)) : ?>
                        <div class="d-flex justify-content-start align-items-start flex-row">
                            <i class="fa-solid fa-bank fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditEducationalInfoSelectCollege" class="form-label fs-8 mb-1 p-0">
                                            college <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditEducationalInfoSelectCollege"
                                            name="EditEducationalInfoSelectCollege"
                                            onchange="OnChangeEditEduCollege(this.value)" disabled>
                                            <option hidden selected value="<?php echo $s_uuclid ?>">
                                                <?php echo $s_clcln.' ('.$s_clclan.')'; ?>
                                            </option>
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
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($s_uudid)) : ?>
                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-door-open fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditEducationalInfoSelectDepartment"
                                            class="form-label fs-8 mb-1 p-0">
                                            Department <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditEducationalInfoSelectDepartment"
                                            name="EditEducationalInfoSelectDepartment" disabled
                                            onchange="OnchangeDepartments()">
                                            <option hidden selected value="<?php echo $s_uudid ?>">
                                                <?php echo $s_ddn.' ('.$s_ddan.')'; ?>
                                            </option>
                                            <?php 
                                                foreach ($departments as $row) {
                                                    $department_id = $row['department_id'];
                                                    $department_name = $row['department_name'];
                                                    $department_acronym = $row['department_acronym'];
                                                    echo "<option value='".$department_id."'>".$department_name." (".$department_acronym.")</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($s_uucrid)) : ?>
                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-graduation-cap fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditEducationalInfoSelectCourse" class="form-label fs-8 mb-1 p-0">
                                            Course <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditEducationalInfoSelectCourse"
                                            name="EditEducationalInfoSelectCourse"
                                            onchange="OnchangeEditEducationalInfoFetchMajors(this.value)" disabled>
                                            <option hidden selected value="<?php echo $s_uucrid ?>">
                                                <?php echo $s_crcrn.' ('.$s_crcran.')'; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php endif; ?>


                        <div class="d-flex justify-content-start align-items-start flex-row mt-3 <?php if(!empty($s_uumid)) {echo 'd-block';}elseif(empty($s_uumid)){echo 'd-none';} ?>"
                            id="EditEduMajors">
                            <i class="fa-solid fa-star fs-4 text-start text-primary w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditEducationalInfoSelectMajor" class="form-label fs-8 mb-1 p-0">
                                            Major <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditEducationalInfoSelectMajor"
                                            name="EditEducationalInfoSelectMajor" disabled onchange="OnchangeMajors()">
                                            <option hidden selected value="<?php echo $s_uumid ?>">
                                                <?php echo $s_mmn; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div class="w-50-md">
            <?php endif; ?>
            <form action="" id="EditSocialMediaForm">
                <div class="social_media">
                    <div class="card-header fw-bold text-uppercase border-top rounded-0 bg-dark">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <h6 class="fw-bold text-warning">social media</h6>
                            <div class="d-inline-flex">
                                <button type="button" id="EditBtnSocialMedia"
                                    class="btn btn-warning btn-sm ispan-md px-3">
                                    <i class="fa-solid fa-pen fs-8"></i>
                                    <!-- <span class="fs-8">edit</span> -->
                                </button>
                                <button type="button" id="EditCancelBtnSocialMedia"
                                    class="btn btn-secondary btn-sm d-none ispan-md px-3">
                                    <i class="fa-solid fa-xmark fs-7"></i>
                                    <!-- <span class="fs-8">Cancel</span> -->
                                </button>

                                <input type="text" id="EditSocialMediaInfo" name="EditSocialMediaInfo"
                                    value="EditSocialMediaInfo" hidden>

                                <button type="submit" id="EditSocialMedia" name="EditSocialMedia"
                                    value="EditSocialMedia" class="btn btn-primary btn-sm d-none ms-2 ispan-md px-3">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <!-- <span class="fs-8">save</span> -->
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul id="alertEditSocialMediaSuccess" role="alert" class="d-none alert alert-success">
                            <li id="succMsgEditSocialMediaAll" class="d-none"></li>
                        </ul>

                        <ul id="alertEditSocialMediaError" class="d-none alert alert-danger" role="alert">
                            <li class="d-none" id="errEditSocialMediaAll"></li>
                        </ul>

                        <div class="d-flex justify-content-start align-items-start flex-row">
                            <i class="fa-brands fa-facebook fs-3 text-facebook text-start w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaFBLink" class="form-label fs-8 mb-1 p-0">
                                            Facebook link <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaFBLink" name="EditSocialMediaFBLink"
                                            placeholder="Facebook link" value="<?php echo $s_uufblink ?>" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaFB" class="form-label fs-8 mb-1 p-0">
                                            Facebook Username <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaFB" name="EditSocialMediaFB"
                                            placeholder="Facebook username" value="<?php echo $s_uufb ?>" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i
                                class="fa-brands fa-instagram-square fs-3 text-instagram text-start w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaIGLink" class="form-label fs-8 mb-1 p-0">
                                            Instagram link <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaIGLink" name="EditSocialMediaIGLink"
                                            placeholder="Instagram link" value="<?php echo $s_uuiglink ?>" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaIG" class="form-label fs-8 mb-1 p-0">
                                            Instagram Username <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaIG" name="EditSocialMediaIG"
                                            placeholder="Instagram username" value="<?php echo $s_uuig ?>" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-brands fa-twitter fs-3 text-twitter text-start w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaTWLink" class="form-label fs-8 mb-1 p-0">
                                            twitter link <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaTWLink" name="EditSocialMediaTWLink"
                                            placeholder="Twitter link" value="<?php echo $s_uutwlink ?>" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaTW" class="form-label fs-8 mb-1 p-0">
                                            twitter Username <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaTW" name="EditSocialMediaTW"
                                            placeholder="Twitter username" value="<?php echo $s_uutw ?>" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-brands fa-youtube fs-3 text-youtube text-start w-40px-min p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">

                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaYTLink" class="form-label fs-8 mb-1 p-0">
                                            YOUTUBE link <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaYTLink" name="EditSocialMediaYTLink"
                                            placeholder="Youtube link" value="<?php echo $s_uuytlink ?>" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="EditSocialMediaYT" class="form-label fs-8 mb-1 p-0">
                                            YOUTUBE Username <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control border-primary p-1 px-2"
                                            id="EditSocialMediaYT" name="EditSocialMediaYT"
                                            placeholder="Youtube username" value="<?php echo $s_uuyt ?>" readonly />
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php if($s_aat == '2') : ?>
        <div class="w-100">
            <form action="" id="EditLoadslipForm">
                <div class="load_slip">
                    <div class="card-header fw-bold text-uppercase border-top rounded-0 bg-dark">
                        <div class="d-flex justify-content-between align-items-center flex-row ">
                            <h6 class="fw-bold text-warning">LOADSLIP</h6>
                            <div class="d-inline-flex">
                                <button type="button" id="EditBtnLoadslip" class="btn btn-warning btn-sm ispan-md px-3">
                                    <i class="fa-solid fa-pen fs-8"></i>
                                    <!-- <span class="fs-8">edit</span> -->
                                </button>
                                <button type="button" id="EditCancelBtnLoadslip"
                                    class="btn btn-secondary btn-sm d-none ispan-md px-3">
                                    <i class="fa-solid fa-xmark fs-7"></i>
                                    <!-- <span class="fs-8">Cancel</span> -->
                                </button>

                                <input type="text" id="EditLoadslipInfo" name="EditLoadslipInfo"
                                    value="EditLoadslipInfo" hidden>

                                <button type="submit" id="EditLoadslip" name="EditLoadslip" value="EditLoadslip"
                                    class="btn btn-primary btn-sm d-none ms-2 ispan-md px-3">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <!-- <span class="fs-8">save</span> -->
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul id="alertEditLoadSlipSuccess" role="alert" class="d-none alert alert-success">
                            <li id="succMsgEditLoadSlipAll" class="d-none"></li>
                        </ul>

                        <ul id="alertEditLoadSlipError" class="d-none alert alert-danger" role="alert">
                            <li class="d-none" id="errEditLoadSlipAll"></li>
                            <li class="d-none" id="errEditLoadSlipSelectSchoolyear"></li>
                            <li class="d-none" id="errEditLoadSlipSelectSemester"></li>
                            <li class="d-none" id="errEditLoadSlip"></li>
                        </ul>

                        <div class="d-flex justify-content-start align-items-start flex-row">
                            <i class="fa-solid fa-calendar fs-4 text-start w-40px-min text-primary p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditLoadSlipSelectSchoolyear" class="form-label fs-8 mb-1 p-0">
                                            Schoolyear <span class="text-danger"> *</span>
                                        </label>
                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditLoadSlipSelectSchoolyear"
                                            name="EditLoadSlipSelectSchoolyear" disabled>
                                            <option hidden selected value="<?php echo $s_ldsyid ?>">
                                                <?php echo $s_sysyn ?></option>
                                            <?php 
                                                foreach ($schoolyear as $row) {
                                                    $schoolyear_id = $row['schoolyear_id'];
                                                    $schoolyear_name = $row['schoolyear_name'];
                                                    echo "<option value='".$schoolyear_id."'>".$schoolyear_name."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-calendar-range fs-4 text-start w-40px-min text-primary p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12">
                                        <label for="EditLoadSlipSelectSemester" class="form-label fs-8 mb-1 p-0">
                                            Semester <span class="text-danger"> *</span>
                                        </label>
                                        <select class="form-select border-primary p-1 px-2"
                                            aria-label="Default select example" id="EditLoadSlipSelectSemester"
                                            name="EditLoadSlipSelectSemester" disabled>
                                            <option hidden value="<?php echo $s_ldsid; ?>"><?php echo $s_ssn; ?>
                                            </option>
                                            <?php 
                                                foreach ($semester as $row) {
                                                    $semester_id = $row['semester_id'];
                                                    $semester_name = $row['semester_name'];
                                                    echo "<option value='".$semester_id."'>".$semester_name."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start align-items-start flex-row mt-3">
                            <i class="fa-solid fa-folder-image fs-4 text-start w-40px-min text-primary p-0 lh-1"></i>
                            <div class="fw-500 text-dark font-text lh-1 w-100">
                                <div class="row gx-2 gy-1">
                                    <div class="col-md-12 d-none" id="LoadSlipInput">
                                        <label for="EditLoadSlip" class="form-label fs-8 mb-1 p-0">
                                            loadslip file <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control border-primary p-1 px-2"
                                            name="EditLoadSlip" id="EditLoadSlip" value="<?php echo $loadslip; ?>"
                                            onchange="getLoadSlipPreview(event)" disabled>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label class="form-label fs-8 p-0 mb-1">
                                            loadslip
                                        </label>
                                        <div class="rounded border border-primary img-placeholder px-0 bg-gray-300">
                                            <a href="<?php echo $loadslip; ?>" target="_blank">
                                                <img id="EditLoadSlipPreview" src="<?php echo $loadslip; ?>"
                                                    style="max-height: 300px !important;" alt="" class="img-fluid ">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>

    </div>
</div>

<div class="">
    <input type="text" class="form-control border-primary p-1 px-2" id="EditEducationalInfoAType"
        name="EditEducationalInfoAType" value="<?php echo $s_aat ?>" readonly hidden />

    <input type="text" id="Atype" value="<?php echo $s_aat; ?>" hidden>

    <input type="text" id="Fname" value="<?php echo $s_aafn; ?>" hidden>
    <input type="text" id="Mname" value="<?php echo $s_aamn; ?>" hidden>
    <input type="text" id="Lname" value="<?php echo $s_aaln; ?>" hidden>
    <input type="text" id="Suffix" value="<?php echo $s_aasn; ?>" hidden>
    <input type="text" id="Home" value="<?php echo $s_aaa; ?>" hidden>
    <input type="text" id="Email" value="<?php echo $s_aae; ?>" hidden>
    <input type="text" id="Contact" value="<?php echo $s_aac; ?>" hidden>
    <input type="text" id="Dob" value="<?php echo $s_aadobymd; ?>" hidden>
    <input type="text" id="Gender" value="<?php echo $s_aag; ?>" hidden>

    <input type="text" id="About" value="<?php echo $s_uuam; ?>" hidden>
    <input type="text" id="Other" value="<?php echo $s_uuon; ?>" hidden>
    <input type="text" id="Pronounce" value="<?php echo $s_uunp; ?>" hidden>
    <input type="text" id="Quote" value="<?php echo $s_uufq; ?>" hidden>

    <input type="text" id="CollegeID" value="<?php echo $s_uuclid ?>" hidden>
    <input type="text" id="CollegeName" value="<?php echo $s_clcln.' ('.$s_clclan.')'; ?>" hidden>
    <input type="text" id="DepartmentID" value="<?php echo $s_uudid ?>" hidden>
    <input type="text" id="DepartmentName" value="<?php echo $s_ddn.' ('.$s_ddan.')'; ?>" hidden>
    <input type="text" id="CourseID" value="<?php echo $s_uucrid ?>" hidden>
    <input type="text" id="CourseName" value="<?php echo $s_crcrn.' ('.$s_crcran.')'; ?>" hidden>
    <input type="text" id="MajorID" value="<?php echo $s_uumid ?>" hidden>
    <input type="text" id="MajorName" value="<?php echo $s_mmn; ?>" hidden>

    <input type="text" id="FbLink" value="<?php echo $s_uufblink; ?>" hidden>
    <input type="text" id="FbName" value="<?php echo $s_uufb; ?>" hidden>
    <input type="text" id="IgLink" value="<?php echo $s_uuiglink; ?>" hidden>
    <input type="text" id="IgName" value="<?php echo $s_uuig; ?>" hidden>
    <input type="text" id="TwLink" value="<?php echo $s_uutwlink; ?>" hidden>
    <input type="text" id="TwName" value="<?php echo $s_uutw; ?>" hidden>
    <input type="text" id="YtLink" value="<?php echo $s_uuytlink; ?>" hidden>
    <input type="text" id="YtName" value="<?php echo $s_uuyt; ?>" hidden>

    <input type="text" id="SchoolyearID" value="<?php echo $s_ldsyid ?>" hidden>
    <input type="text" id="SchoolyearName" value="<?php echo $s_sysyn ?>" hidden>
    <input type="text" id="SemesterID" value="<?php echo $s_ldsid; ?>" hidden>
    <input type="text" id="SemesterName" value="<?php echo $s_ssn; ?>" hidden>
    <input type="text" id="ThisLoadSlip" value="<?php echo $loadslip; ?>" hidden>

</div>
