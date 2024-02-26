/** LOGIN FORM VALIDATION */
$(document).ready(function () {
    // LOGIN ADMIN
    $("#LoginAdmin").click(function (e) {
        e.preventDefault();
        // console.log('admin');
        const LoginUsername = $('#LoginUsername').val();
        const LoginPassword = $('#LoginPassword').val();

        var errLoginAll = '';
        var errLoginUsername = '';
        var errLoginPassword = '';

        if (LoginUsername.length == '' && LoginPassword.length == '') {
            errAll = '<li> All fields are empty! </li>';
            $("#errLoginAll").removeClass("d-none");
            $("#errLoginAll").addClass("d-block");
            $("#errLoginAll").html(errLoginAll);
        } else {
            errLoginAll = '';
            $("#errLoginAll").addClass("d-none");
            $("#errLoginAll").removeClass("d-block");
            $("#errLoginAll").html(errLoginAll);

            if (LoginUsername.length == '') {
                errLoginUsername = '<li> Username is required! </li>';
                $("#errLoginUsername").removeClass("d-none");
                $("#errLoginUsername").addClass("d-block");
                $("#errLoginUsername").html(errLoginUsername);
            } else {
                if (LoginUsername.length < 6) {
                    errLoginUsername = '<li> Username must not be less than 6 characters! </li>';
                    $("#errLoginUsername").removeClass("d-none");
                    $("#errLoginUsername").addClass("d-block");
                    $("#errLoginUsername").html(errLoginUsername);
                } else {
                    errLoginUsername = '';
                    $("#errLoginUsername").addClass("d-none");
                    $("#errLoginUsername").removeClass("d-block");
                    $("#errLoginUsername").html(errLoginUsername);
                }
            }

            if (LoginPassword.length == '') {
                errLoginPassword = '<li> Password is required! </li>';
                $("#errLoginPassword").removeClass("d-none");
                $("#errLoginPassword").addClass("d-block");
                $("#errLoginPassword").html(errLoginPassword);
            } else {
                if (LoginPassword.length < 6) {
                    errLoginPassword = '<li> Password must not be less than 6 characters! </li>';
                    $("#errLoginPassword").removeClass("d-none");
                    $("#errLoginPassword").addClass("d-block");
                    $("#errLoginPassword").html(errLoginPassword);
                } else {
                    errLoginPassword = '';
                    $("#errLoginPassword").addClass("d-none");
                    $("#errLoginPassword").removeClass("d-block");
                    $("#errLoginPassword").html(errLoginPassword);
                }
            }
        }

        if (errLoginAll != '' || errLoginUsername != '' || errLoginPassword != '') {
            $("#alertLoginError").addClass("d-block");
            $("#alertLoginError").removeClass("d-none");
            return false;
        } else {
            $("#alertLoginError").removeClass("d-block");
            $("#alertLoginError").addClass("d-none");

            if (LoginUsername.length != '' && LoginPassword.length != '') {

                var formData = $('#LoginForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/authentication.php',
                    data: formData + '&action=LoginAdmin',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertLoginError").addClass("d-block");
                            $("#alertLoginError").removeClass("d-none");
                            $("#errLoginAll").removeClass("d-none");
                            $("#errLoginAll").addClass("d-block");
                            $("#errLoginAll").html(feedback.errAll);

                        } else if (feedback.status === "success") {
                            $("#LoginForm")[0].reset();
                            location.href = baseUrl + "/" + (feedback.directory) + "/index.php";
                        }
                    }
                });
            }
        }
    });

    // LOGIN USER
    $("#LoginUser").click(function (e) {
        e.preventDefault();
        const LoginUsername = $('#LoginUsername').val();
        const LoginPassword = $('#LoginPassword').val();

        var errLoginAll = '';
        var errLoginUsername = '';
        var errLoginPassword = '';

        if (LoginUsername.length == '' && LoginPassword.length == '') {
            errAll = '<li> All fields are empty! </li>';
            $("#errLoginAll").removeClass("d-none");
            $("#errLoginAll").addClass("d-block");
            $("#errLoginAll").html(errLoginAll);
        } else {
            errLoginAll = '';
            $("#errLoginAll").addClass("d-none");
            $("#errLoginAll").removeClass("d-block");
            $("#errLoginAll").html(errLoginAll);

            if (LoginUsername.length == '') {
                errLoginUsername = '<li> Username is required! </li>';
                $("#errLoginUsername").removeClass("d-none");
                $("#errLoginUsername").addClass("d-block");
                $("#errLoginUsername").html(errLoginUsername);
            } else {
                if (LoginUsername.length < 6) {
                    errLoginUsername = '<li> Username must not be less than 6 characters! </li>';
                    $("#errLoginUsername").removeClass("d-none");
                    $("#errLoginUsername").addClass("d-block");
                    $("#errLoginUsername").html(errLoginUsername);
                } else {
                    errLoginUsername = '';
                    $("#errLoginUsername").addClass("d-none");
                    $("#errLoginUsername").removeClass("d-block");
                    $("#errLoginUsername").html(errLoginUsername);
                }
            }

            if (LoginPassword.length == '') {
                errLoginPassword = '<li> Password is required! </li>';
                $("#errLoginPassword").removeClass("d-none");
                $("#errLoginPassword").addClass("d-block");
                $("#errLoginPassword").html(errLoginPassword);
            } else {
                if (LoginPassword.length < 6) {
                    errLoginPassword = '<li> Password must not be less than 6 characters! </li>';
                    $("#errLoginPassword").removeClass("d-none");
                    $("#errLoginPassword").addClass("d-block");
                    $("#errLoginPassword").html(errLoginPassword);
                } else {
                    errLoginPassword = '';
                    $("#errLoginPassword").addClass("d-none");
                    $("#errLoginPassword").removeClass("d-block");
                    $("#errLoginPassword").html(errLoginPassword);
                }
            }
        }

        if (errLoginAll != '' || errLoginUsername != '' || errLoginPassword != '') {
            $("#alertLoginError").addClass("d-block");
            $("#alertLoginError").removeClass("d-none");
            return false;
        } else {
            $("#alertLoginError").removeClass("d-block");
            $("#alertLoginError").addClass("d-none");

            if (LoginUsername.length != '' && LoginPassword.length != '') {

                var formData = $('#LoginForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/authentication.php',
                    data: formData + '&action=LoginUser',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertLoginError").addClass("d-block");
                            $("#alertLoginError").removeClass("d-none");
                            $("#errLoginAll").removeClass("d-none");
                            $("#errLoginAll").addClass("d-block");
                            $("#errLoginAll").html(feedback.errAll);

                        } else if (feedback.status === "success") {
                            $("#LoginForm")[0].reset();
                            location.href = baseUrl + "/" + (feedback.directory) + "/index.php";
                        }
                    }
                });
            }
        }
    });
});

/** STUDENT REGISTER FORM VALIDATION */
$(document).ready(function () {
    /** NEXT BUTTONS */
    $("#NextRegisterStudent_1").click(function (e) {
        e.preventDefault();
        const RegisterStudentFirstname = $('#RegisterStudentFirstname').val();
        const RegisterStudentMiddlename = $('#RegisterStudentMiddlename').val();
        const RegisterStudentLastname = $('#RegisterStudentLastname').val();
        const RegisterStudentDob = $('#RegisterStudentDob').val();
        const RegisterStudentGender = $('#RegisterStudentGender').val();

        var errRegisterStudentAll_1 = '';
        var errRegisterStudentFirstname = '';
        var errRegisterStudentMiddlename = '';
        var errRegisterStudentLastname = '';
        var errRegisterStudentDob = '';
        var errRegisterStudentGender = '';

        if (RegisterStudentFirstname.length == '' && RegisterStudentLastname.length == '' &&
            RegisterStudentDob.length == '' && RegisterStudentGender == '0') {
            errRegisterStudentAll_1 = '<li> All Fields is empty! </li>';
            $("#errRegisterStudentAll_1").removeClass("d-none");
            $("#errRegisterStudentAll_1").addClass("d-block");
            $("#errRegisterStudentAll_1").html(errRegisterStudentAll_1);

            $('#RegisterStudentFirstname').addClass('border-danger');
            $('#RegisterStudentLastname').addClass('border-danger');
            $('#RegisterStudentDob').addClass('border-danger');
            $('#RegisterStudentGender').addClass('border-danger');
        } else {
            errRegisterStudentAll_1 = '';
            $("#errRegisterStudentAll_1").addClass("d-none");
            $("#errRegisterStudentAll_1").removeClass("d-block");
            $("#errRegisterStudentAll_1").html(errRegisterStudentAll_1);

            $('#RegisterStudentFirstname').removeClass('border-danger');
            $('#RegisterStudentLastname').removeClass('border-danger');
            $('#RegisterStudentDob').removeClass('border-danger');
            $('#RegisterStudentGender').removeClass('border-danger');

            /** FIRST NAME */
            if (RegisterStudentFirstname.length == '') {
                errRegisterStudentFirstname = '<li> First Name is required. </li>';
                $("#errRegisterStudentFirstname").removeClass("d-none");
                $("#errRegisterStudentFirstname").addClass("d-block");

                $("#errRegisterStudentFirstname").html(errRegisterStudentFirstname);

                $('#RegisterStudentFirstname').addClass('border-danger');
            } else {
                $('#RegisterStudentFirstname').removeClass('border-danger');

                if (RegisterStudentFirstname.length < 2) {
                    errRegisterStudentFirstname = '<li> First name must not be less than 2 characters. </li>';
                    $("#errRegisterStudentFirstname").removeClass("d-none");
                    $("#errRegisterStudentFirstname").addClass("d-block");

                    $("#errRegisterStudentFirstname").html(errRegisterStudentFirstname);
                    $("#RegisterStudentFirstname").addClass("border-danger");
                } else {
                    errRegisterStudentFirstname = ''
                    $("#errRegisterStudentFirstname").removeClass("d-block");
                    $("#errRegisterStudentFirstname").addClass("d-none");

                    $("#errRegisterStudentFirstname").html(errRegisterStudentFirstname);
                    $("#RegisterStudentFirstname").removeClass("border-danger");
                }
            }

            /** MIDDLE NAME */
            if (RegisterStudentMiddlename != '') {
                if (RegisterStudentMiddlename.length < 2) {
                    errRegisterStudentMiddlename = '<li> Middle name must not be less than 2 characters. </li>';
                    $("#errRegisterStudentMiddlename").removeClass("d-none");
                    $("#errRegisterStudentMiddlename").addClass("d-block");

                    $("#errRegisterStudentMiddlename").html(errRegisterStudentMiddlename);
                    $("#RegisterStudentMiddlename").addClass("border-danger");
                } else {
                    errRegisterStudentMiddlename = '';
                    $("#errRegisterStudentMiddlename").removeClass("d-block");
                    $("#errRegisterStudentMiddlename").addClass("d-none");

                    $("#errRegisterStudentMiddlename").html(errRegisterStudentMiddlename);
                    $("#RegisterStudentMiddlename").removeClass("border-danger");
                }
            } else {
                errRegisterStudentMiddlename = '';
                $("#errRegisterStudentMiddlename").removeClass("d-block");
                $("#errRegisterStudentMiddlename").addClass("d-none");

                $("#errRegisterStudentMiddlename").html(errRegisterStudentMiddlename);
                $("#RegisterStudentMiddlename").removeClass("border-danger");
            }

            /** LAST NAME */
            if (RegisterStudentLastname == '') {
                errRegisterStudentLastname = '<li> Last Name is required. </li>';
                $("#errRegisterStudentLastname").removeClass("d-none");
                $("#errRegisterStudentLastname").addClass("d-block");
                $("#errRegisterStudentLastname").html(errRegisterStudentLastname);
                $('#RegisterStudentLastname').addClass('border-danger');
            } else {
                $("#RegisterStudentLastname").removeClass("border-danger");
                if (RegisterStudentLastname.length < 2) {
                    errRegisterStudentLastname = '<li> Last name must not be less than 2 characters. </li>';
                    $("#errRegisterStudentLastname").removeClass("d-none");
                    $("#errRegisterStudentLastname").addClass("d-block");

                    $("#errRegisterStudentLastname").html(errRegisterStudentLastname);
                    $("#RegisterStudentLastname").addClass("border-danger");
                } else {
                    errRegisterStudentLastname = '';
                    $("#errRegisterStudentLastname").removeClass("d-block");
                    $("#errRegisterStudentLastname").addClass("d-none");

                    $("#errRegisterStudentLastname").html(errRegisterStudentLastname);
                    $("#RegisterStudentLastname").removeClass("border-danger");
                }
            }

            /* DATE OF BIRTH */
            if (RegisterStudentDob == '') {
                errRegisterStudentDob = '<li> Add your birthdate. </li>';
                $("#errRegisterStudentDob").removeClass("d-none");
                $("#errRegisterStudentDob").addClass("d-block");

                $("#errRegisterStudentDob").html(errRegisterStudentDob);
                $("#RegisterStudentDob").addClass("border-danger");
            } else {
                errRegisterStudentDob = '';
                $("#errRegisterStudentDob").removeClass("d-block");
                $("#errRegisterStudentDob").addClass("d-none");

                $("#errRegisterStudentDob").html(errRegisterStudentDob);
                $("#RegisterStudentDob").removeClass("border-danger");
            }

            // // /** GENDER */
            if (RegisterStudentGender == "0") {
                errRegisterStudentGender = '<li> Select your gender. </li>';
                $("#errRegisterStudentGender").removeClass("d-none");
                $("#errRegisterStudentGender").addClass("d-block");

                $("#errRegisterStudentGender").html(errRegisterStudentGender);
                $("#RegisterStudentGender").addClass("border-danger");
            } else {
                errRegisterStudentGender = '';
                $("#errRegisterStudentGender").removeClass("d-block");
                $("#errRegisterStudentGender").addClass("d-none");

                $("#errRegisterStudentGender").html(errRegisterStudentGender);
                $("#RegisterStudentGender").removeClass("border-danger");
            }
        }

        if (errRegisterStudentAll_1 != '' || errRegisterStudentFirstname != '' ||
            errRegisterStudentMiddlename != '' || errRegisterStudentLastname != '' ||
            errRegisterStudentDob != '' || errRegisterStudentGender != '') {
            $("#alertRegisterStudentError_1").addClass("d-block");
            $("#alertRegisterStudentError_1").removeClass("d-none");

            return false;
        } else {
            if (RegisterStudentFirstname != '' && RegisterStudentLastname != '' &&
                errRegisterStudentMiddlename == '' && RegisterStudentDob != '' && RegisterStudentGender != '0') {
                $("#alertRegisterStudentError_1").removeClass("d-block");
                $("#alertRegisterStudentError_1").addClass("d-none");

                $("#MultistepRegisterStudent_2").addClass("d-block");
                $("#MultistepRegisterStudent_2").removeClass("d-none");
                $("#MultistepRegisterStudent_1").addClass("d-none");
                $("#MultistepRegisterStudent_1").removeClass("d-block");

                $("#MultistepRegisterStudentProgressBtn_1").removeClass("active");
                $("#MultistepRegisterStudentProgressBtn_1").addClass("finish");
                $("#MultistepRegisterStudentProgressBtn_2").addClass("active");
            }
        }
    });

    $("#NextRegisterStudent_2").click(function (e) {
        e.preventDefault();
        const RegisterStudentHomeAddress = $('#RegisterStudentHomeAddress').val();
        const RegisterStudentEmailAdd = $('#RegisterStudentEmailAdd').val();
        const RegisterStudentContactNo = $('#RegisterStudentContactNo').val();

        var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var errRegisterStudentAll_2 = '';
        var errRegisterStudentHomeAddress = '';
        var errRegisterStudentEmailAdd = '';
        var errRegisterStudentContactNo = '';

        if (RegisterStudentHomeAddress.length == '' && RegisterStudentEmailAdd.length == '' && RegisterStudentContactNo.length == '') {
            errRegisterStudentAll_2 = '<li> All Fields is empty! </li>';
            $("#errRegisterStudentAll_2").removeClass("d-none");
            $("#errRegisterStudentAll_2").addClass("d-block");
            $("#errRegisterStudentAll_2").html(errRegisterStudentAll_2);

            $('#RegisterStudentHomeAddress').addClass('border-danger');
            $("#RegisterStudentEmailAdd").addClass("border-danger");
            $('#RegisterStudentContactNo').addClass("border-danger");
        } else {
            errRegisterStudentAll_2 = '';
            $("#errRegisterStudentAll_2").addClass("d-none");
            $("#errRegisterStudentAll_2").removeClass("d-block");
            $("#errRegisterStudentAll_2").html(errRegisterStudentAll_2);

            $('#RegisterStudentHomeAddress').removeClass('border-danger');
            $("#RegisterStudentEmailAdd").removeClass("border-danger");
            $('#RegisterStudentContactNo').removeClass("border-danger");

            /** HOME ADDRESS */
            if (RegisterStudentHomeAddress.length == '') {
                errRegisterStudentHomeAddress = '<li> Home Address is required. </li>';
                $("#errRegisterStudentHomeAddress").removeClass("d-none");
                $("#errRegisterStudentHomeAddress").addClass("d-block");
                $("#errRegisterStudentHomeAddress").html(errRegisterStudentHomeAddress);
                $('#RegisterStudentHomeAddress').addClass('border-danger');
            } else {
                errRegisterStudentHomeAddress = '';
                $("#errRegisterStudentHomeAddress").removeClass("d-none");
                $("#errRegisterStudentHomeAddress").addClass("d-block");
                $("#errRegisterStudentHomeAddress").html(errRegisterStudentHomeAddress);
                $("#RegisterStudentHomeAddress").removeClass("border-danger");
            }

            /**  EMAIL ADDRESS */
            if (RegisterStudentEmailAdd.length == '') {
                errRegisterStudentEmailAdd = '<li> Email Address is required. </li>';
                $("#errRegisterStudentEmailAdd").removeClass("d-none");
                $("#errRegisterStudentEmailAdd").addClass("d-block");
                $("#errRegisterStudentEmailAdd").html(errRegisterStudentEmailAdd);
                $('#RegisterStudentEmailAdd').addClass('border-danger');
            } else {
                $("#RegisterStudentEmailAdd").removeClass("border-danger");

                if (!regexEmail.test(RegisterStudentEmailAdd)) {
                    errRegisterStudentEmailAdd = '<li> Email Address is invalid. </li>';
                    $("#errRegisterStudentEmailAdd").removeClass("d-none");
                    $("#errRegisterStudentEmailAdd").addClass("d-block");
                    $("#errRegisterStudentEmailAdd").html(errRegisterStudentEmailAdd);
                    $("#RegisterStudentEmailAdd").addClass("border-danger");
                } else {
                    errRegisterStudentEmailAdd = '';
                    $("#errRegisterStudentEmailAdd").removeClass("d-block");
                    $("#errRegisterStudentEmailAdd").addClass("d-none");
                    $("#errRegisterStudentEmailAdd").html(errRegisterStudentEmailAdd);
                    $("#RegisterStudentEmailAdd").removeClass("border-danger");
                }
            }

            /**  CONTACT NUMBER */
            if (RegisterStudentContactNo.length == '') {
                errRegisterStudentContactNo = '<li> Mobile Number is required. </li>';
                $("#errRegisterStudentContactNo").removeClass("d-none");
                $("#errRegisterStudentContactNo").addClass("d-block");
                $('#errRegisterStudentContactNo').html(errRegisterStudentContactNo);
                $('#RegisterStudentContactNo').addClass("border-danger");
            } else {
                $('#RegisterStudentContactNo').removeClass("border-danger");

                if (RegisterStudentContactNo.length != 11) {
                    errRegisterStudentContactNo = '<li> Please check your number again. </li>';
                    $("#errRegisterStudentContactNo").removeClass("d-none");
                    $("#errRegisterStudentContactNo").addClass("d-block");
                    $('#errRegisterStudentContactNo').html(errRegisterStudentContactNo);
                    $('#RegisterStudentContactNo').addClass("border-danger");
                } else {
                    errRegisterStudentContactNo = '';
                    $("#errRegisterStudentContactNo").removeClass("d-block");
                    $("#errRegisterStudentContactNo").addClass("d-none");
                    $('#errRegisterStudentContactNo').html(errRegisterStudentContactNo);
                    $('#RegisterStudentContactNo').removeClass("border-danger");
                }
            }
        }

        if (errRegisterStudentAll_2 != '' || errRegisterStudentHomeAddress != '' || errRegisterStudentEmailAdd != '' || errRegisterStudentContactNo != '') {
            $("#alertRegisterStudentError_2").addClass("d-block");
            $("#alertRegisterStudentError_2").removeClass("d-none");

            return false;
        } else {
            if (RegisterStudentHomeAddress != '' || RegisterStudentEmailAdd != '' || RegisterStudentContactNo != '') {
                $("#alertRegisterStudentError_2").addClass("d-none");
                $("#alertRegisterStudentError_2").removeClass("d-block");

                $("#MultistepRegisterStudent_3").addClass("d-block");
                $("#MultistepRegisterStudent_3").removeClass("d-none");
                $("#MultistepRegisterStudent_2").addClass("d-none");
                $("#MultistepRegisterStudent_2").removeClass("d-block");

                $("#MultistepRegisterStudentProgressBtn_2").removeClass("active");
                $("#MultistepRegisterStudentProgressBtn_2").addClass("finish");
                $("#MultistepRegisterStudentProgressBtn_3").addClass("active");
            }
        }

    });

    $("#NextRegisterStudent_3").click(function (e) {
        e.preventDefault();
        const RegisterStudentID = $('#RegisterStudentID').val();
        const RegisterStudentSelectCollege = $('#RegisterStudentSelectCollege').val();
        const RegisterStudentSelectCourse = $('#RegisterStudentSelectCourse').val();
        const RegisterStudentSelectMajor = $('#RegisterStudentSelectMajor').val();
        const RegisterStudentSelectSchoolyear = $('#RegisterStudentSelectSchoolyear').val();
        const RegisterStudentSelectSemester = $('#RegisterStudentSelectSemester').val();
        const RegisterStudentLoadslip = $('#RegisterStudentLoadslip').val();

        var regexImage = /([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg|.bmp)$/;

        var errRegisterStudentAll_3;
        var errRegisterStudentID = '';
        var errRegisterStudentSelectCollege = '';
        var errRegisterStudentSelectCourse = '';
        var errRegisterStudentSelectMajor = '';
        var errRegisterStudentSelectSchoolyear = '';
        var errRegisterStudentSelectSemester = '';
        var errRegisterStudentLoadslip = '';

        if (RegisterStudentID.length == '' && RegisterStudentSelectCollege == '0' &&
            RegisterStudentSelectCourse == '0' && RegisterStudentLoadslip.length == '' &&
            RegisterStudentSelectSchoolyear == '0' && RegisterStudentSelectSemester == '0') {
            errRegisterStudentAll_3 = '<li> All Fields is empty! </li>';
            $("#errRegisterStudentAll_3").removeClass("d-none");
            $("#errRegisterStudentAll_3").addClass("d-block");
            $("#errRegisterStudentAll_3").html(errRegisterStudentAll_3);

            $('#RegisterStudentID').addClass('border-danger');
            $("#RegisterStudentSelectCollege").addClass("border-danger");
            $('#RegisterStudentSelectCourse').addClass("border-danger");
            $('#RegisterStudentSelectSchoolyear').addClass("border-danger");
            $('#RegisterStudentSelectSemester').addClass("border-danger");
            $('#RegisterStudentLoadslip').addClass("border-danger");
        } else {
            errRegisterStudentAll_3 = '';
            $("#errRegisterStudentAll_3").addClass("d-none");
            $("#errRegisterStudentAll_3").removeClass("d-block");
            $("#errRegisterStudentAll_3").html(errRegisterStudentAll_3);

            $('#RegisterStudentID').removeClass('border-danger');
            $("#RegisterStudentSelectCollege").removeClass("border-danger");
            $('#RegisterStudentSelectCourse').removeClass("border-danger");
            $('#RegisterStudentSelectSchoolyear').removeClass("border-danger");
            $('#RegisterStudentSelectSemester').removeClass("border-danger");
            $('#RegisterStudentLoadslip').removeClass("border-danger");

            /* STUDENT NUMBER */
            if (RegisterStudentID.length == 0) {
                errRegisterStudentID = '<li> Student number is required. </li>';
                $("#errRegisterStudentID").removeClass("d-none");
                $("#errRegisterStudentID").addClass("d-block");

                $("#errRegisterStudentID").html(errRegisterStudentID);
                $("#RegisterStudentID").addClass("border-danger");
            } else {
                errRegisterStudentID = '';
                $("#errRegisterStudentID").removeClass("d-block");
                $("#errRegisterStudentID").addClass("d-none");

                $("#errRegisterStudentID").html(errRegisterStudentID);
                $("#RegisterStudentID").removeClass("border-danger");
            }

            /** COLLEGE */
            if (RegisterStudentSelectCollege == "0") {
                errRegisterStudentSelectCollege = '<li> Select your college.';
                $("#errRegisterStudentSelectCollege").removeClass("d-none");
                $("#errRegisterStudentSelectCollege").addClass("d-block");

                $("#errRegisterStudentSelectCollege").html(errRegisterStudentSelectCollege);
                $("#RegisterStudentSelectCollege").addClass("border-danger");
            } else {
                errRegisterStudentSelectCollege = '';
                $("#errRegisterStudentSelectCollege").removeClass("d-block");
                $("#errRegisterStudentSelectCollege").addClass("d-none");

                $("#errRegisterStudentSelectCollege").html(errRegisterStudentSelectCollege);
                $("#RegisterStudentSelectCollege").removeClass("border-danger");
            }

            /** COURSE */
            if (RegisterStudentSelectCourse == "0") {
                errRegisterStudentSelectCourse = '<li> Select your course. </li>';
                $("#errRegisterStudentSelectCourse").removeClass("d-none");
                $("#errRegisterStudentSelectCourse").addClass("d-block");

                $("#errRegisterStudentSelectCourse").html(errRegisterStudentSelectCourse);
                $("#RegisterStudentSelectCourse").addClass("border-danger");
            } else {
                errRegisterStudentSelectCourse = '';
                $("#errRegisterStudentSelectCourse").removeClass("d-block");
                $("#errRegisterStudentSelectCourse").addClass("d-none");

                $("#errRegisterStudentSelectCourse").html(errRegisterStudentSelectCourse);
                $("#RegisterStudentSelectCourse").removeClass("border-danger");
            }

            /** MAJOR */
            if (RegisterStudentSelectMajor == "0") {
                errRegisterStudentSelectMajor = '<li> Select your major. </li>';
                $("#errRegisterStudentSelectMajor").removeClass("d-none");
                $("#errRegisterStudentSelectMajor").addClass("d-block");

                $("#errRegisterStudentSelectMajor").html(errRegisterStudentSelectMajor);
                $("#RegisterStudentSelectMajor").addClass("border-danger");
            } else {
                errRegisterStudentSelectMajor = '';
                $("#errRegisterStudentSelectMajor").removeClass("d-block");
                $("#errRegisterStudentSelectMajor").addClass("d-none");

                $("#errRegisterStudentSelectMajor").html(errRegisterStudentSelectMajor);
                $("#RegisterStudentSelectMajor").removeClass("border-danger");
            }

            /** School year */
            if (RegisterStudentSelectSchoolyear == "0") {
                errRegisterStudentSelectSchoolyear = '<li> Select schoolyear. </li>';
                $("#errRegisterStudentSelectSchoolyear").removeClass("d-none");
                $("#errRegisterStudentSelectSchoolyear").addClass("d-block");

                $("#errRegisterStudentSelectSchoolyear").html(errRegisterStudentSelectSchoolyear);
                $("#RegisterStudentSelectSchoolyear").addClass("border-danger");
            } else {
                errRegisterStudentSelectSchoolyear = '';
                $("#errRegisterStudentSelectSchoolyear").removeClass("d-block");
                $("#errRegisterStudentSelectSchoolyear").addClass("d-none");

                $("#errRegisterStudentSelectSchoolyear").html(errRegisterStudentSelectSchoolyear);
                $("#RegisterStudentSelectSchoolyear").removeClass("border-danger");
            }

            /** Semester */
            if (RegisterStudentSelectSemester == "0") {
                errRegisterStudentSelectSemester = '<li> Select semester. </li>';
                $("#errRegisterStudentSelectSemester").removeClass("d-none");
                $("#errRegisterStudentSelectSemester").addClass("d-block");

                $("#errRegisterStudentSelectSemester").html(errRegisterStudentSelectSemester);
                $("#RegisterStudentSelectSemester").addClass("border-danger");
            } else {
                errRegisterStudentSelectSemester = '';
                $("#errRegisterStudentSelectSemester").removeClass("d-block");
                $("#errRegisterStudentSelectSemester").addClass("d-none");

                $("#errRegisterStudentSelectSemester").html(errRegisterStudentSelectSemester);
                $("#RegisterStudentSelectSemester").removeClass("border-danger");
            }

            /* Loadslip */
            if (RegisterStudentLoadslip.length == '') {
                errRegisterStudentLoadslip = '<li> Please attach your load slip. </li>';
                $("#errRegisterStudentLoadslip").removeClass("d-none");
                $("#errRegisterStudentLoadslip").addClass("d-block");

                $("#errRegisterStudentLoadslip").html(errRegisterStudentLoadslip);
                $("#RegisterStudentLoadslip").addClass("border-danger");
            } else {
                $("#RegisterStudentLoadslip").removeClass("border-danger");

                if (!regexImage.test(RegisterStudentLoadslip)) {
                    errRegisterStudentLoadslip = '<li> Please upload loadslip as an image having extensions: .png, .jpg, .jpeg .bmp only. </li>';
                    $("#errRegisterStudentLoadslip").removeClass("d-none");
                    $("#errRegisterStudentLoadslip").addClass("d-block");

                    $("#errRegisterStudentLoadslip").html(errRegisterStudentLoadslip);
                    $("#RegisterStudentLoadslip").addClass("border-danger");
                } else {
                    errRegisterStudentLoadslip = '';
                    $("#errRegisterStudentLoadslip").removeClass("d-block");
                    $("#errRegisterStudentLoadslip").addClass("d-none");

                    $("#errRegisterStudentLoadslip").html(errRegisterStudentLoadslip);
                    $("#RegisterStudentLoadslip").removeClass("border-danger");
                }
            }
        }

        if (errRegisterStudentAll_3 != '' || errRegisterStudentID != '' || errRegisterStudentSelectCollege != '' ||
            errRegisterStudentSelectCourse != '' || errRegisterStudentSelectMajor != '' || errRegisterStudentSelectSchoolyear != '' ||
            errRegisterStudentSelectSemester != '' || errRegisterStudentLoadslip != '') {
            $("#alertRegisterStudentError_3").addClass("d-block");
            $("#alertRegisterStudentError_3").removeClass("d-none");
            return false;
        } else {
            if (RegisterStudentID != '' || RegisterStudentSelectCollege != '' || RegisterStudentSelectCourse != '' ||
                RegisterStudentLoadslip != '' || RegisterStudentSelectMajor != '0' || RegisterStudentSelectSchoolyear != '0' ||
                RegisterStudentSelectSemester != '0') {

                // CHECK IF STUDENT NUMBER IS TAKEN
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: 'CheckRegisterStudentID=' + RegisterStudentID,
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertRegisterStudentError_3").addClass("d-block");
                            $("#alertRegisterStudentError_3").removeClass("d-none");

                            $("#errRegisterStudentID").removeClass("d-none");
                            $("#errRegisterStudentID").addClass("d-block");
                            $("#errRegisterStudentID").html(feedback.errAll);
                            $("#RegisterStudentID").addClass("border-danger");
                        } else if (feedback.status === "success") {
                            if ($("#errRegisterStudentID").hasClass("d-block")) {
                                $("#alertRegisterStudentError_3").addClass("d-none");
                                $("#alertRegisterStudentError_3").removeClass("d-block");

                                $("#errRegisterStudentID").addClass("d-none");
                                $("#errRegisterStudentID").removeClass("d-block");
                                $("#errRegisterStudentID").html('');
                                $("#RegisterStudentID").removeClass("border-danger");
                            }

                            $("#MultistepRegisterStudent_4").addClass("d-block");
                            $("#MultistepRegisterStudent_4").removeClass("d-none");
                            $("#MultistepRegisterStudent_3").addClass("d-none");
                            $("#MultistepRegisterStudent_3").removeClass("d-block");

                            $("#MultistepRegisterStudentProgressBtn_3").removeClass("active");
                            $("#MultistepRegisterStudentProgressBtn_3").addClass("finish");
                            $("#MultistepRegisterStudentProgressBtn_4").addClass("active");
                        }
                    }
                });
            }
        }
    });

    $("#MultistepRegisterStudentForm").on('submit', function (e) {
        e.preventDefault();
        const RegisterStudentUsername = $('#RegisterStudentUsername').val();
        const RegisterStudentPassword = $('#RegisterStudentPassword').val();
        const RegisterStudentConfirmPassword = $('#RegisterStudentConfirmPassword').val();

        var errRegisterStudentAll_4 = '';
        var errRegisterStudentUsername = '';
        var errRegisterStudentPassword = '';
        var errRegisterStudentConfirmPassword = '';

        if (RegisterStudentUsername.length == '' && RegisterStudentPassword.length == '' &&
            RegisterStudentConfirmPassword.length == '') {
            errRegisterStudentAll_4 = '<li> All Fields is empty! </li>';
            $("#errRegisterStudentAll_4").removeClass("d-none");
            $("#errRegisterStudentAll_4").addClass("d-block");
            $("#errRegisterStudentAll_4").html(errRegisterStudentAll_4);

            $('#RegisterStudentUsername').addClass('border-danger');
            $("#RegisterStudentPassword").addClass("border-danger");
            $("#RegisterStudentPasswordIcon").addClass("btn-outline-danger");
            $('#RegisterStudentConfirmPassword').addClass("border-danger");
            $("#RegisterStudentConfirmPasswordIcon").addClass("btn-outline-danger");
        } else {
            errRegisterStudentAll_4 = '';
            $("#errRegisterStudentAll_4").addClass("d-none");
            $("#errRegisterStudentAll_4").removeClass("d-block");
            $("#errRegisterStudentAll_4").html(errRegisterStudentAll_4);

            $('#RegisterStudentUsername').removeClass('border-danger');
            $("#RegisterStudentPassword").removeClass("border-danger");
            $("#RegisterStudentPasswordIcon").removeClass("btn-outline-danger");
            $('#RegisterStudentConfirmPassword').removeClass("border-danger");
            $("#RegisterStudentConfirmPasswordIcon").removeClass("btn-outline-danger");
            /* USERNAME */
            if (RegisterStudentUsername.length == '') {
                errRegisterStudentUsername = '<li> Username is required. </li>';
                $("#errRegisterStudentUsername").removeClass("d-none");
                $("#errRegisterStudentUsername").addClass("d-block");

                $("#errRegisterStudentUsername").html(errRegisterStudentUsername);
                $("#RegisterStudentUsername").addClass("border-danger");
            } else {
                $("#RegisterStudentUsername").removeClass("border-danger");

                if (RegisterStudentUsername.length < 6) {
                    errRegisterStudentUsername = '<li> Username must not be < 6 characters </li>';

                    $("#errRegisterStudentUsername").removeClass("d-none");
                    $("#errRegisterStudentUsername").addClass("d-block");

                    $("#errRegisterStudentUsername").html(errRegisterStudentUsername);
                    $("#RegisterStudentUsername").addClass("border-danger");
                } else {
                    errRegisterStudentUsername = ''
                    $("#errRegisterStudentUsername").removeClass("d-block");
                    $("#errRegisterStudentUsername").addClass("d-none");

                    $("#errRegisterStudentUsername").html(errRegisterStudentUsername);
                    $("#RegisterStudentUsername").removeClass("border-danger");
                }
            }

            /** PASSWORD */
            if (RegisterStudentPassword.length == '') {
                errRegisterStudentPassword = '<li> Password is required. </li>';
                $("#errRegisterStudentPassword").removeClass("d-none");
                $("#errRegisterStudentPassword").addClass("d-block");

                $("#errRegisterStudentPassword").html(errRegisterStudentPassword);

                $("#RegisterStudentPassword").addClass("border-danger");
                $("#RegisterStudentPasswordIcon").addClass("btn-outline-danger");
            } else {
                $("#RegisterStudentPassword").removeClass("border-danger");
                $("#RegisterStudentPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterStudentPassword.length < 6) {
                    errRegisterStudentPassword = '<li> Password must not be < 6 characters </li>';
                    $("#errRegisterStudentPassword").removeClass("d-none");
                    $("#errRegisterStudentPassword").addClass("d-block");

                    $("#errRegisterStudentPassword").html(errRegisterStudentPassword);

                    $("#RegisterStudentPassword").addClass("border-danger");
                    $("#RegisterStudentPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterStudentPassword = ''
                    $("#errRegisterStudentPassword").removeClass("d-block");
                    $("#errRegisterStudentPassword").addClass("d-none");

                    $("#errRegisterStudentPassword").html(errRegisterStudentPassword);
                    $("#RegisterStudentPassword").removeClass("border-danger");
                    $("#RegisterStudentPasswordIcon").removeClass("btn-outline-danger");
                }
            }

            /** CONFIRM PASSWORD */
            if (RegisterStudentConfirmPassword.length == '') {
                errRegisterStudentConfirmPassword = '<li> Confirm your password. </li>';
                $("#errRegisterStudentConfirmPassword").removeClass("d-none");
                $("#errRegisterStudentConfirmPassword").addClass("d-block");

                $("#errRegisterStudentConfirmPassword").html(errRegisterStudentConfirmPassword);
                $("#RegisterStudentConfirmPassword").addClass("border-danger");
                $("#RegisterStudentConfirmPasswordIcon").addClass("btn-outline-danger");

            } else {
                $("#RegisterStudentConfirmPassword").removeClass("border-danger");
                $("#RegisterStudentConfirmPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterStudentConfirmPassword != RegisterStudentPassword) {
                    errRegisterStudentConfirmPassword = '<li> Confirm Password is not the same with password </li>';

                    $("#errRegisterStudentConfirmPassword").removeClass("d-none");
                    $("#errRegisterStudentConfirmPassword").addClass("d-block");

                    $("#errRegisterStudentConfirmPassword").html(errRegisterStudentConfirmPassword);
                    $("#RegisterStudentConfirmPassword").addClass("border-danger");
                    $("#RegisterStudentConfirmPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterStudentConfirmPassword = ''
                    $("#errRegisterStudentConfirmPassword").removeClass("d-block");
                    $("#errRegisterStudentConfirmPassword").addClass("d-none");

                    $("#errRegisterStudentConfirmPassword").html(errRegisterStudentConfirmPassword);
                    $("#RegisterStudentConfirmPassword").removeClass("border-danger");
                    $("#RegisterStudentConfirmPasswordIcon").removeClass("btn-outline-danger");
                }
            }
        }

        if (errRegisterStudentAll_4 != '' || errRegisterStudentUsername != '' ||
            errRegisterStudentPassword != '' || errRegisterStudentConfirmPassword != '') {
            $("#alertRegisterStudentError_4").addClass("d-block");
            $("#alertRegisterStudentError_4").removeClass("d-none");

            return false;
        } else {
            $("#alertRegisterStudentError_4").addClass("d-none");
            $("#alertRegisterStudentError_4").removeClass("d-block");

            if (RegisterStudentUsername != '' || RegisterStudentPassword != '' || RegisterStudentConfirmPassword != '') {
                //ajax
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (feedback) { //console.log(response);
                        if (feedback.status === "error") {
                            $("#alertRegisterStudentError_4").addClass("d-block");
                            $("#alertRegisterStudentError_4").removeClass("d-none");
                            $("#errRegisterStudentUsername").removeClass("d-none");
                            $("#errRegisterStudentUsername").addClass("d-block");
                            $("#errRegisterStudentUsername").html(feedback.errAll);
                            $("#RegisterStudentUsername").addClass("border-danger");
                        } else if (feedback.status === "success") {
                            if ($("#alertRegisterStudentError_4").hasClass("d-block")) {
                                $("#alertRegisterStudentError_4").removeClass("d-block");
                                $("#alertRegisterStudentError_4").addClass("d-none");
                                $("#errRegisterStudentUsername").addClass("d-none");
                                $("#errRegisterStudentUsername").removeClass("d-block");
                                $("#errRegisterStudentUsername").html('');
                                $("#RegisterStudentUsername").removeClass("border-danger");
                            }
                            $("#alertRegisterStudentSuccess_4").removeClass("d-none");
                            $("#alertRegisterStudentSuccess_4").addClass("d-block");

                            $("#succMsgRegisterStudentAll_4").removeClass("d-none");
                            $("#succMsgRegisterStudentAll_4").addClass("d-block");
                            $("#succMsgRegisterStudentAll_4").html(feedback.message);

                            // $("#MultistepRegisterStudentForm")[0].reset();
                            setTimeout(function () {
                                $("#alertRegisterStudentSuccess_4").removeClass('d-block');
                                $("#alertRegisterStudentSuccess_4").addClass('d-none');

                                $("#succMsgRegisterStudentAll_4").removeClass('d-block');
                                $("#succMsgRegisterStudentAll_4").addClass('d-none');
                                $("#succMsgRegisterStudentAll_4").html('');
                                $("#MultistepRegisterStudentForm")[0].reset();
                                location.reload();

                            }, 15000);
                        }
                    }
                });
            }
        }

    });

    /** PREVIOUS BUTTONS */
    $("#PrevRegisterStudent_4").click(function () {
        const RegisterStudentUsername = $('#RegisterStudentUsername').val();
        const RegisterStudentPassword = $('#RegisterStudentPassword').val();
        const RegisterStudentConfirmPassword = $('#RegisterStudentConfirmPassword').val();

        if (RegisterStudentUsername != '' && RegisterStudentPassword != '' &&
            RegisterStudentConfirmPassword != '') {
            $("#MultistepRegisterStudentProgressBtn_4").addClass("finish");
        }

        $("#MultistepRegisterStudent_3").addClass("d-block");
        $("#MultistepRegisterStudent_4").removeClass("d-block");

        $("#MultistepRegisterStudent_3").removeClass("d-none");
        $("#MultistepRegisterStudent_4").addClass("d-none");

        $("#MultistepRegisterStudentProgressBtn_4").removeClass("active");
        $("#MultistepRegisterStudentProgressBtn_3").addClass("active");
    });

    $("#PrevRegisterStudent_3").click(function () {
        $("#MultistepRegisterStudent_2").addClass("d-block");
        $("#MultistepRegisterStudent_3").removeClass("d-block");

        $("#MultistepRegisterStudent_2").removeClass("d-none");
        $("#MultistepRegisterStudent_3").addClass("d-none");

        $("#MultistepRegisterStudentProgressBtn_3").removeClass("active");
        // $("#MultistepRegisterStudentProgressBtn_3").addClass("finish");
        $("#MultistepRegisterStudentProgressBtn_2").addClass("active");
    });

    $("#PrevRegisterStudent_2").click(function () {
        $("#MultistepRegisterStudent_1").addClass("d-block");
        $("#MultistepRegisterStudent_2").removeClass("d-block");

        $("#MultistepRegisterStudent_1").removeClass("d-none");
        $("#MultistepRegisterStudent_2").addClass("d-none");

        $("#MultistepRegisterStudentProgressBtn_2").removeClass("active");
        // $("#MultistepRegisterStudentProgressBtn_2").removeClass("finish");
        $("#MultistepRegisterStudentProgressBtn_1").addClass("active");
    });
});

/** Teacher REGISTER FORM VALIDATION */
$(document).ready(function () {
    /** NEXT BUTTONS */
    $("#NextRegisterTeacher_1").click(function (e) {
        e.preventDefault();
        const RegisterTeacherFirstname = $('#RegisterTeacherFirstname').val();
        const RegisterTeacherMiddlename = $('#RegisterTeacherMiddlename').val();
        const RegisterTeacherLastname = $('#RegisterTeacherLastname').val();
        const RegisterTeacherDob = $('#RegisterTeacherDob').val();
        const RegisterTeacherGender = $('#RegisterTeacherGender').val();

        var errRegisterTeacherAll_1 = '';
        var errRegisterTeacherFirstname = '';
        var errRegisterTeacherMiddlename = '';
        var errRegisterTeacherLastname = '';
        var errRegisterTeacherDob = '';
        var errRegisterTeacherGender = '';

        if (RegisterTeacherFirstname.length == '' && RegisterTeacherLastname.length == '' &&
            RegisterTeacherDob.length == '' && RegisterTeacherGender == '0') {
            errRegisterTeacherAll_1 = '<li> All Fields is empty! </li>';
            $("#errRegisterTeacherAll_1").removeClass("d-none");
            $("#errRegisterTeacherAll_1").addClass("d-block");
            $("#errRegisterTeacherAll_1").html(errRegisterTeacherAll_1);

            $('#RegisterTeacherFirstname').addClass('border-danger');
            $('#RegisterTeacherLastname').addClass('border-danger');
            $('#RegisterTeacherDob').addClass('border-danger');
            $('#RegisterTeacherGender').addClass('border-danger');
        } else {
            errRegisterTeacherAll_1 = '';
            $("#errRegisterTeacherAll_1").addClass("d-none");
            $("#errRegisterTeacherAll_1").removeClass("d-block");
            $("#errRegisterTeacherAll_1").html(errRegisterTeacherAll_1);

            $('#RegisterTeacherFirstname').removeClass('border-danger');
            $('#RegisterTeacherLastname').removeClass('border-danger');
            $('#RegisterTeacherDob').removeClass('border-danger');
            $('#RegisterTeacherGender').removeClass('border-danger');

            /** FIRST NAME */
            if (RegisterTeacherFirstname.length == '') {
                errRegisterTeacherFirstname = '<li> First Name is required. </li>';
                $("#errRegisterTeacherFirstname").removeClass("d-none");
                $("#errRegisterTeacherFirstname").addClass("d-block");

                $("#errRegisterTeacherFirstname").html(errRegisterTeacherFirstname);

                $('#RegisterTeacherFirstname').addClass('border-danger');
            } else {
                // $('#RegisterTeacherFirstname').removeClass('border-danger');

                if (RegisterTeacherFirstname.length < 2) {
                    errRegisterTeacherFirstname = '<li> First name must not be less than 2 characters. </li>';
                    $("#errRegisterTeacherFirstname").removeClass("d-none");
                    $("#errRegisterTeacherFirstname").addClass("d-block");

                    $("#errRegisterTeacherFirstname").html(errRegisterTeacherFirstname);
                    $("#RegisterTeacherFirstname").addClass("border-danger");
                } else {
                    errRegisterTeacherFirstname = ''
                    $("#errRegisterTeacherFirstname").removeClass("d-block");
                    $("#errRegisterTeacherFirstname").addClass("d-none");

                    $("#errRegisterTeacherFirstname").html(errRegisterTeacherFirstname);
                    $("#RegisterTeacherFirstname").removeClass("border-danger");
                }
            }

            /** MIDDLE NAME */
            if (RegisterTeacherMiddlename != '') {
                if (RegisterTeacherMiddlename.length < 2) {
                    errRegisterTeacherMiddlename = '<li> Middle name must not be less than 2 characters. </li>';
                    $("#errRegisterTeacherMiddlename").removeClass("d-none");
                    $("#errRegisterTeacherMiddlename").addClass("d-block");

                    $("#errRegisterTeacherMiddlename").html(errRegisterTeacherMiddlename);
                    $("#RegisterTeacherMiddlename").addClass("border-danger");
                } else {
                    errRegisterTeacherMiddlename = '';
                    $("#errRegisterTeacherMiddlename").removeClass("d-block");
                    $("#errRegisterTeacherMiddlename").addClass("d-none");

                    $("#errRegisterTeacherMiddlename").html(errRegisterTeacherMiddlename);
                    $("#RegisterTeacherMiddlename").removeClass("border-danger");
                }
            } else {
                errRegisterTeacherMiddlename = '';
                $("#errRegisterTeacherMiddlename").removeClass("d-block");
                $("#errRegisterTeacherMiddlename").addClass("d-none");

                $("#errRegisterTeacherMiddlename").html(errRegisterTeacherMiddlename);
                $("#RegisterTeacherMiddlename").removeClass("border-danger");
            }

            /** LAST NAME */
            if (RegisterTeacherLastname == '') {
                errRegisterTeacherLastname = '<li> Last Name is required. </li>';
                $("#errRegisterTeacherLastname").removeClass("d-none");
                $("#errRegisterTeacherLastname").addClass("d-block");
                $("#errRegisterTeacherLastname").html(errRegisterTeacherLastname);
                $('#RegisterTeacherLastname').addClass('border-danger');
            } else {
                $("#RegisterTeacherLastname").removeClass("border-danger");
                if (RegisterTeacherLastname.length < 2) {
                    errRegisterTeacherLastname = '<li> Last name must not be less than 2 characters. </li>';
                    $("#errRegisterTeacherLastname").removeClass("d-none");
                    $("#errRegisterTeacherLastname").addClass("d-block");

                    $("#errRegisterTeacherLastname").html(errRegisterTeacherLastname);
                    $("#RegisterTeacherLastname").addClass("border-danger");
                } else {
                    errRegisterTeacherLastname = '';
                    $("#errRegisterTeacherLastname").removeClass("d-block");
                    $("#errRegisterTeacherLastname").addClass("d-none");

                    $("#errRegisterTeacherLastname").html(errRegisterTeacherLastname);
                    $("#RegisterTeacherLastname").removeClass("border-danger");
                }
            }

            /* DATE OF BIRTH */
            if (RegisterTeacherDob == '') {
                errRegisterTeacherDob = '<li> Add your birthdate. </li>';
                $("#errRegisterTeacherDob").removeClass("d-none");
                $("#errRegisterTeacherDob").addClass("d-block");

                $("#errRegisterTeacherDob").html(errRegisterTeacherDob);
                $("#RegisterTeacherDob").addClass("border-danger");
            } else {
                errRegisterTeacherDob = '';
                $("#errRegisterTeacherDob").removeClass("d-block");
                $("#errRegisterTeacherDob").addClass("d-none");

                $("#errRegisterTeacherDob").html(errRegisterTeacherDob);
                $("#RegisterTeacherDob").removeClass("border-danger");
            }

            // // /** GENDER */
            if (RegisterTeacherGender == "0") {
                errRegisterTeacherGender = '<li> Select your gender. </li>';
                $("#errRegisterTeacherGender").removeClass("d-none");
                $("#errRegisterTeacherGender").addClass("d-block");

                $("#errRegisterTeacherGender").html(errRegisterTeacherGender);
                $("#RegisterTeacherGender").addClass("border-danger");
            } else {
                errRegisterTeacherGender = '';
                $("#errRegisterTeacherGender").removeClass("d-block");
                $("#errRegisterTeacherGender").addClass("d-none");

                $("#errRegisterTeacherGender").html(errRegisterTeacherGender);
                $("#RegisterTeacherGender").removeClass("border-danger");
            }
        }

        if (errRegisterTeacherAll_1 != '' || errRegisterTeacherFirstname != '' ||
            errRegisterTeacherMiddlename != '' || errRegisterTeacherLastname != '' ||
            errRegisterTeacherDob != '' || errRegisterTeacherGender != '') {
            $("#alertRegisterTeacherError_1").addClass("d-block");
            $("#alertRegisterTeacherError_1").removeClass("d-none");

            return false;
        } else {
            // if (RegisterTeacherGender != '0') {
            if (RegisterTeacherFirstname != '' && RegisterTeacherLastname != '' &&
                errRegisterTeacherMiddlename == '' &&
                RegisterTeacherDob != '' && RegisterTeacherGender != '0') {
                // console.log("ez");
                $("#alertRegisterTeacherError_1").removeClass("d-block");
                $("#alertRegisterTeacherError_1").addClass("d-none");

                $("#MultistepRegisterTeacher_2").addClass("d-block");
                $("#MultistepRegisterTeacher_2").removeClass("d-none");
                $("#MultistepRegisterTeacher_1").addClass("d-none");
                $("#MultistepRegisterTeacher_1").removeClass("d-block");

                $("#MultistepRegisterTeacherProgressBtn_1").removeClass("active");
                $("#MultistepRegisterTeacherProgressBtn_1").addClass("finish");
                $("#MultistepRegisterTeacherProgressBtn_2").addClass("active");
            }
        }
    });

    $("#NextRegisterTeacher_2").click(function (e) {
        e.preventDefault();
        const RegisterTeacherHomeAddress = $('#RegisterTeacherHomeAddress').val();
        const RegisterTeacherEmailAdd = $('#RegisterTeacherEmailAdd').val();
        const RegisterTeacherContactNo = $('#RegisterTeacherContactNo').val();

        var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var errRegisterTeacherAll_2 = '';
        var errRegisterTeacherHomeAddress = '';
        var errRegisterTeacherEmailAdd = '';
        var errRegisterTeacherContactNo = '';

        if (RegisterTeacherHomeAddress.length == '' && RegisterTeacherEmailAdd.length == '' && RegisterTeacherContactNo.length == '') {
            errRegisterTeacherAll_2 = '<li> All Fields is empty! </li>';
            $("#errRegisterTeacherAll_2").removeClass("d-none");
            $("#errRegisterTeacherAll_2").addClass("d-block");
            $("#errRegisterTeacherAll_2").html(errRegisterTeacherAll_2);

            $('#RegisterTeacherHomeAddress').addClass('border-danger');
            $("#RegisterTeacherEmailAdd").addClass("border-danger");
            $('#RegisterTeacherContactNo').addClass("border-danger");
        } else {
            errRegisterTeacherAll_2 = '';
            $("#errRegisterTeacherAll_2").addClass("d-none");
            $("#errRegisterTeacherAll_2").removeClass("d-block");
            $("#errRegisterTeacherAll_2").html(errRegisterTeacherAll_2);

            $('#RegisterTeacherHomeAddress').removeClass('border-danger');
            $("#RegisterTeacherEmailAdd").removeClass("border-danger");
            $('#RegisterTeacherContactNo').removeClass("border-danger");

            /** HOME ADDRESS */
            if (RegisterTeacherHomeAddress.length == '') {
                errRegisterTeacherHomeAddress = '<li> Home Address is required. </li>';
                $("#errRegisterTeacherHomeAddress").removeClass("d-none");
                $("#errRegisterTeacherHomeAddress").addClass("d-block");
                $("#errRegisterTeacherHomeAddress").html(errRegisterTeacherHomeAddress);
                $('#RegisterTeacherHomeAddress').addClass('border-danger');
            } else {
                errRegisterTeacherHomeAddress = '';
                $("#errRegisterTeacherHomeAddress").removeClass("d-none");
                $("#errRegisterTeacherHomeAddress").addClass("d-block");
                $("#errRegisterTeacherHomeAddress").html(errRegisterTeacherHomeAddress);
                $("#RegisterTeacherHomeAddress").removeClass("border-danger");
            }

            /**  EMAIL ADDRESS */
            if (RegisterTeacherEmailAdd.length == '') {
                errRegisterTeacherEmailAdd = '<li> Email Address is required. </li>';
                $("#errRegisterTeacherEmailAdd").removeClass("d-none");
                $("#errRegisterTeacherEmailAdd").addClass("d-block");
                $("#errRegisterTeacherEmailAdd").html(errRegisterTeacherEmailAdd);
                $('#RegisterTeacherEmailAdd').addClass('border-danger');
            } else {
                $("#RegisterTeacherEmailAdd").removeClass("border-danger");

                if (!regexEmail.test(RegisterTeacherEmailAdd)) {
                    errRegisterTeacherEmailAdd = '<li> Email Address is invalid. </li>';
                    $("#errRegisterTeacherEmailAdd").removeClass("d-none");
                    $("#errRegisterTeacherEmailAdd").addClass("d-block");
                    $("#errRegisterTeacherEmailAdd").html(errRegisterTeacherEmailAdd);
                    $("#RegisterTeacherEmailAdd").addClass("border-danger");
                } else {
                    errRegisterTeacherEmailAdd = '';
                    $("#errRegisterTeacherEmailAdd").removeClass("d-block");
                    $("#errRegisterTeacherEmailAdd").addClass("d-none");
                    $("#errRegisterTeacherEmailAdd").html(errRegisterTeacherEmailAdd);
                    $("#RegisterTeacherEmailAdd").removeClass("border-danger");
                }
            }

            /**  CONTACT NUMBER */
            if (RegisterTeacherContactNo.length == '') {
                errRegisterTeacherContactNo = '<li> Mobile Number is required. </li>';
                $("#errRegisterTeacherContactNo").removeClass("d-none");
                $("#errRegisterTeacherContactNo").addClass("d-block");
                $('#errRegisterTeacherContactNo').html(errRegisterTeacherContactNo);
                $('#RegisterTeacherContactNo').addClass("border-danger");
            } else {
                $('#RegisterTeacherContactNo').removeClass("border-danger");

                if (RegisterTeacherContactNo.length != 11) {
                    errRegisterTeacherContactNo = '<li> Please check your number again. </li>';
                    $("#errRegisterTeacherContactNo").removeClass("d-none");
                    $("#errRegisterTeacherContactNo").addClass("d-block");
                    $('#errRegisterTeacherContactNo').html(errRegisterTeacherContactNo);
                    $('#RegisterTeacherContactNo').addClass("border-danger");
                } else {
                    errRegisterTeacherContactNo = '';
                    $("#errRegisterTeacherContactNo").removeClass("d-block");
                    $("#errRegisterTeacherContactNo").addClass("d-none");
                    $('#errRegisterTeacherContactNo').html(errRegisterTeacherContactNo);
                    $('#RegisterTeacherContactNo').removeClass("border-danger");
                }
            }
        }


        if (errRegisterTeacherAll_2 != '' || errRegisterTeacherHomeAddress != '' || errRegisterTeacherEmailAdd != '' || errRegisterTeacherContactNo != '') {
            $("#alertRegisterTeacherError_2").addClass("d-block");
            $("#alertRegisterTeacherError_2").removeClass("d-none");

            return false;
        } else {
            if (RegisterTeacherHomeAddress != '' || RegisterTeacherEmailAdd != '' || RegisterTeacherContactNo != '') {
                $("#alertRegisterTeacherError_2").addClass("d-none");
                $("#alertRegisterTeacherError_2").removeClass("d-block");

                $("#MultistepRegisterTeacher_3").addClass("d-block");
                $("#MultistepRegisterTeacher_3").removeClass("d-none");
                $("#MultistepRegisterTeacher_2").addClass("d-none");
                $("#MultistepRegisterTeacher_2").removeClass("d-block");

                $("#MultistepRegisterTeacherProgressBtn_2").removeClass("active");
                $("#MultistepRegisterTeacherProgressBtn_2").addClass("finish");
                $("#MultistepRegisterTeacherProgressBtn_3").addClass("active");
            }
        }

    });

    $("#NextRegisterTeacher_3").click(function (e) {
        e.preventDefault();
        const RegisterTeacherID = $('#RegisterTeacherID').val();
        const RegisterTeacherSelectPosition = $('#RegisterTeacherSelectPosition').val();
        const RegisterTeacherSelectCollege = $('#RegisterTeacherSelectCollege').val();
        const RegisterTeacherSelectDepartment = $('#RegisterTeacherSelectDepartment').val();

        var errRegisterTeacherAll_3;
        var errRegisterTeacherID = '';
        var errRegisterTeacherSelectPosition = '';
        var errRegisterTeacherSelectCollege = '';
        var errRegisterTeacherSelectDepartment = '';

        if (RegisterTeacherID.length == '' && RegisterTeacherSelectCollege == '0' &&
            RegisterTeacherSelectPosition == '0') {
            errRegisterTeacherAll_3 = '<li> All Fields is empty! </li>';
            $("#errRegisterTeacherAll_3").removeClass("d-none");
            $("#errRegisterTeacherAll_3").addClass("d-block");
            $("#errRegisterTeacherAll_3").html(errRegisterTeacherAll_3);

            $('#RegisterTeacherID').addClass('border-danger');
            $("#RegisterTeacherSelectPosition").addClass("border-danger");
            $("#RegisterTeacherSelectCollege").addClass("border-danger");
            $('#RegisterTeacherSelectDepartment').addClass("border-danger");

        } else {
            errRegisterTeacherAll_3 = '';
            $("#errRegisterTeacherAll_3").addClass("d-none");
            $("#errRegisterTeacherAll_3").removeClass("d-block");
            $("#errRegisterTeacherAll_3").html(errRegisterTeacherAll_3);

            $('#RegisterTeacherID').removeClass('border-danger');
            $("#RegisterTeacherSelectPosition").removeClass("border-danger");
            $("#RegisterTeacherSelectCollege").removeClass("border-danger");
            $('#RegisterTeacherSelectDepartment').removeClass("border-danger");

            //     /* Teacher NUMBER */
            if (RegisterTeacherID.length == 0) {
                errRegisterTeacherID = '<li> Teacher number is required. </li>';
                $("#errRegisterTeacherID").removeClass("d-none");
                $("#errRegisterTeacherID").addClass("d-block");

                $("#errRegisterTeacherID").html(errRegisterTeacherID);
                $("#RegisterTeacherID").addClass("border-danger");
            } else {
                errRegisterTeacherID = '';
                $("#errRegisterTeacherID").removeClass("d-block");
                $("#errRegisterTeacherID").addClass("d-none");

                $("#errRegisterTeacherID").html(errRegisterTeacherID);
                $("#RegisterTeacherID").removeClass("border-danger");
            }
            /** Position */
            if (RegisterTeacherSelectPosition == "0") {
                errRegisterTeacherSelectPosition = '<li> Select your Position. </li>';
                $("#errRegisterTeacherSelectPosition").removeClass("d-none");
                $("#errRegisterTeacherSelectPosition").addClass("d-block");

                $("#errRegisterTeacherSelectPosition").html(errRegisterTeacherSelectPosition);
                $("#RegisterTeacherSelectPosition").addClass("border-danger");
            } else {
                errRegisterTeacherSelectPosition = '';
                $("#errRegisterTeacherSelectPosition").removeClass("d-block");
                $("#errRegisterTeacherSelectPosition").addClass("d-none");

                $("#errRegisterTeacherSelectPosition").html(errRegisterTeacherSelectPosition);
                $("#RegisterTeacherSelectPosition").removeClass("border-danger");
            }
            //     /** COLLEGE */
            if (RegisterTeacherSelectCollege == "0") {
                errRegisterTeacherSelectCollege = '<li> Select your College. </li>';
                $("#errRegisterTeacherSelectCollege").removeClass("d-none");
                $("#errRegisterTeacherSelectCollege").addClass("d-block");

                $("#errRegisterTeacherSelectCollege").html(errRegisterTeacherSelectCollege);
                $("#RegisterTeacherSelectCollege").addClass("border-danger");
            } else {
                errRegisterTeacherSelectCollege = '';
                $("#errRegisterTeacherSelectCollege").removeClass("d-block");
                $("#errRegisterTeacherSelectCollege").addClass("d-none");

                $("#errRegisterTeacherSelectCollege").html(errRegisterTeacherSelectCollege);
                $("#RegisterTeacherSelectCollege").removeClass("border-danger");
            }

            //     /** Department */
            if (RegisterTeacherSelectDepartment == "0") {
                errRegisterTeacherSelectDepartment = '<li> Select your department. </li>';
                $("#errRegisterTeacherSelectDepartment").removeClass("d-none");
                $("#errRegisterTeacherSelectDepartment").addClass("d-block");

                $("#errRegisterTeacherSelectDepartment").html(errRegisterTeacherSelectDepartment);
                $("#RegisterTeacherSelectDepartment").addClass("border-danger");
            } else {
                errRegisterTeacherSelectDepartment = '';
                $("#errRegisterTeacherSelectDepartment").removeClass("d-block");
                $("#errRegisterTeacherSelectDepartment").addClass("d-none");

                $("#errRegisterTeacherSelectDepartment").html(errRegisterTeacherSelectDepartment);
                $("#RegisterTeacherSelectDepartment").removeClass("border-danger");
            }
        }

        if (errRegisterTeacherAll_3 != '' || errRegisterTeacherID != '' || errRegisterTeacherSelectPosition != '' ||
            errRegisterTeacherSelectCollege != '' ||
            errRegisterTeacherSelectDepartment != '') {
            $("#alertRegisterTeacherError_3").addClass("d-block");
            $("#alertRegisterTeacherError_3").removeClass("d-none");
            return false;
        } else {
            if (RegisterTeacherID != '' || RegisterTeacherSelectPosition != '0' || RegisterTeacherSelectCollege != '0' || RegisterTeacherSelectDepartment != '0') {
                // CHECK IF Teacher NUMBER IS TAKEN
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: 'CheckRegisterTeacherID=' + RegisterTeacherID,
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertRegisterTeacherError_3").addClass("d-block");
                            $("#alertRegisterTeacherError_3").removeClass("d-none");

                            $("#errRegisterTeacherAll_3").removeClass("d-none");
                            $("#errRegisterTeacherAll_3").addClass("d-block");
                            $("#errRegisterTeacherAll_3").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            if ($("#alertRegisterTeacherError_3").has("d-block")) {

                            }
                            $("#alertRegisterTeacherError_3").addClass("d-none");
                            $("#alertRegisterTeacherError_3").removeClass("d-block");

                            $("#MultistepRegisterTeacher_4").addClass("d-block");
                            $("#MultistepRegisterTeacher_4").removeClass("d-none");
                            $("#MultistepRegisterTeacher_3").addClass("d-none");
                            $("#MultistepRegisterTeacher_3").removeClass("d-block");

                            $("#MultistepRegisterTeacherProgressBtn_3").removeClass("active");
                            $("#MultistepRegisterTeacherProgressBtn_3").addClass("finish");
                            $("#MultistepRegisterTeacherProgressBtn_4").addClass("active");
                        }
                    }
                });
            }
        }
    });

    $("#RegisterTeacher").click(function (e) {
        e.preventDefault();
        const RegisterTeacherUsername = $('#RegisterTeacherUsername').val();
        const RegisterTeacherPassword = $('#RegisterTeacherPassword').val();
        const RegisterTeacherConfirmPassword = $('#RegisterTeacherConfirmPassword').val();

        var errRegisterTeacherAll_4 = '';
        var errRegisterTeacherUsername = '';
        var errRegisterTeacherPassword = '';
        var errRegisterTeacherConfirmPassword = '';

        if (RegisterTeacherUsername.length == '' && RegisterTeacherPassword.length == '' &&
            RegisterTeacherConfirmPassword.length == '') {
            errRegisterTeacherAll_4 = '<li> All Fields is empty! </li>';
            $("#errRegisterTeacherAll_4").removeClass("d-none");
            $("#errRegisterTeacherAll_4").addClass("d-block");
            $("#errRegisterTeacherAll_4").html(errRegisterTeacherAll_4);

            $('#RegisterTeacherUsername').addClass('border-danger');
            $("#RegisterTeacherPassword").addClass("border-danger");
            $("#RegisterTeacherPasswordIcon").addClass("btn-outline-danger");
            $('#RegisterTeacherConfirmPassword').addClass("border-danger");
            $("#RegisterTeacherConfirmPasswordIcon").addClass("btn-outline-danger");
        } else {
            errRegisterTeacherAll_4 = '';
            $("#errRegisterTeacherAll_4").addClass("d-none");
            $("#errRegisterTeacherAll_4").removeClass("d-block");
            $("#errRegisterTeacherAll_4").html(errRegisterTeacherAll_4);

            $('#RegisterTeacherUsername').removeClass('border-danger');
            $("#RegisterTeacherPassword").removeClass("border-danger");
            $("#RegisterTeacherPasswordIcon").removeClass("btn-outline-danger");
            $('#RegisterTeacherConfirmPassword').removeClass("border-danger");
            $("#RegisterTeacherConfirmPasswordIcon").removeClass("btn-outline-danger");
            /* USERNAME */
            if (RegisterTeacherUsername.length == '') {
                errRegisterTeacherUsername = '<li> Username is required. </li>';
                $("#errRegisterTeacherUsername").removeClass("d-none");
                $("#errRegisterTeacherUsername").addClass("d-block");

                $("#errRegisterTeacherUsername").html(errRegisterTeacherUsername);
                $("#RegisterTeacherUsername").addClass("border-danger");
            } else {
                $("#RegisterTeacherUsername").removeClass("border-danger");

                if (RegisterTeacherUsername.length < 6) {
                    errRegisterTeacherUsername = '<li> Username must not be < 6 characters </li>';

                    $("#errRegisterTeacherUsername").removeClass("d-none");
                    $("#errRegisterTeacherUsername").addClass("d-block");

                    $("#errRegisterTeacherUsername").html(errRegisterTeacherUsername);
                    $("#RegisterTeacherUsername").addClass("border-danger");
                } else {
                    errRegisterTeacherUsername = ''
                    $("#errRegisterTeacherUsername").removeClass("d-block");
                    $("#errRegisterTeacherUsername").addClass("d-none");

                    $("#errRegisterTeacherUsername").html(errRegisterTeacherUsername);
                    $("#RegisterTeacherUsername").removeClass("border-danger");
                }
            }

            /** PASSWORD */
            if (RegisterTeacherPassword.length == '') {
                errRegisterTeacherPassword = '<li> Password is required. </li>';
                $("#errRegisterTeacherPassword").removeClass("d-none");
                $("#errRegisterTeacherPassword").addClass("d-block");

                $("#errRegisterTeacherPassword").html(errRegisterTeacherPassword);

                $("#RegisterTeacherPassword").addClass("border-danger");
                $("#RegisterTeacherPasswordIcon").addClass("btn-outline-danger");
            } else {
                $("#RegisterTeacherPassword").removeClass("border-danger");
                $("#RegisterTeacherPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterTeacherPassword.length < 6) {
                    errRegisterTeacherPassword = '<li> Password must not be < 6 characters </li>';
                    $("#errRegisterTeacherPassword").removeClass("d-none");
                    $("#errRegisterTeacherPassword").addClass("d-block");

                    $("#errRegisterTeacherPassword").html(errRegisterTeacherPassword);

                    $("#RegisterTeacherPassword").addClass("border-danger");
                    $("#RegisterTeacherPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterTeacherPassword = ''
                    $("#errRegisterTeacherPassword").removeClass("d-block");
                    $("#errRegisterTeacherPassword").addClass("d-none");

                    $("#errRegisterTeacherPassword").html(errRegisterTeacherPassword);
                    $("#RegisterTeacherPassword").removeClass("border-danger");
                    $("#RegisterTeacherPasswordIcon").removeClass("btn-outline-danger");
                }
            }

            /** CONFIRM PASSWORD */
            if (RegisterTeacherConfirmPassword.length == '') {
                errRegisterTeacherConfirmPassword = '<li> Confirm your password. </li>';
                $("#errRegisterTeacherConfirmPassword").removeClass("d-none");
                $("#errRegisterTeacherConfirmPassword").addClass("d-block");

                $("#errRegisterTeacherConfirmPassword").html(errRegisterTeacherConfirmPassword);
                $("#RegisterTeacherConfirmPassword").addClass("border-danger");
                $("#RegisterTeacherConfirmPasswordIcon").addClass("btn-outline-danger");

            } else {
                $("#RegisterTeacherConfirmPassword").removeClass("border-danger");
                $("#RegisterTeacherConfirmPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterTeacherConfirmPassword != RegisterTeacherPassword) {
                    errRegisterTeacherConfirmPassword = '<li> Confirm Password is not the same with password </li>';

                    $("#errRegisterTeacherConfirmPassword").removeClass("d-none");
                    $("#errRegisterTeacherConfirmPassword").addClass("d-block");

                    $("#errRegisterTeacherConfirmPassword").html(errRegisterTeacherConfirmPassword);
                    $("#RegisterTeacherConfirmPassword").addClass("border-danger");
                    $("#RegisterTeacherConfirmPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterTeacherConfirmPassword = ''
                    $("#errRegisterTeacherConfirmPassword").removeClass("d-block");
                    $("#errRegisterTeacherConfirmPassword").addClass("d-none");

                    $("#errRegisterTeacherConfirmPassword").html(errRegisterTeacherConfirmPassword);
                    $("#RegisterTeacherConfirmPassword").removeClass("border-danger");
                    $("#RegisterTeacherConfirmPasswordIcon").removeClass("btn-outline-danger");
                }
            }
        }

        if (errRegisterTeacherAll_4 != '' || errRegisterTeacherUsername != '' ||
            errRegisterTeacherPassword != '' || errRegisterTeacherConfirmPassword != '') {
            $("#alertRegisterTeacherError_4").addClass("d-block");
            $("#alertRegisterTeacherError_4").removeClass("d-none");

            return false;
        } else {
            $("#alertRegisterTeacherError_4").addClass("d-none");
            $("#alertRegisterTeacherError_4").removeClass("d-block");

            if (RegisterTeacherUsername != '' || RegisterTeacherPassword != '' || RegisterTeacherConfirmPassword != '') {

                //ajax
                var formData = $('#MultistepRegisterTeacherForm').serialize();
                // var formData = new FormData(this);
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: formData,
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertRegisterTeacherError_4").addClass("d-block");
                            $("#alertRegisterTeacherError_4").removeClass("d-none");
                            $("#errRegisterTeacherUsername").removeClass("d-none");
                            $("#errRegisterTeacherUsername").addClass("d-block");
                            $("#errRegisterTeacherUsername").html(feedback.errAll);
                            $("#RegisterTeacherUsername").addClass("border-danger");
                        } else if (feedback.status === "success") {
                            if ($("#alertRegisterTeacherError_4").hasClass("d-block")) {
                                $("#alertRegisterTeacherError_4").removeClass("d-block");
                                $("#alertRegisterTeacherError_4").addClass("d-none");
                                $("#errRegisterTeacherUsername").addClass("d-none");
                                $("#errRegisterTeacherUsername").removeClass("d-block");
                                $("#errRegisterTeacherUsername").html('');
                                $("#RegisterTeacherUsername").removeClass("border-danger");
                            }
                            $("#alertRegisterTeacherSuccess_4").removeClass("d-none");
                            $("#alertRegisterTeacherSuccess_4").addClass("d-block");

                            $("#succMsgRegisterTeacherAll_4").removeClass("d-none");
                            $("#succMsgRegisterTeacherAll_4").addClass("d-block");
                            $("#succMsgRegisterTeacherAll_4").html(feedback.message);

                            setTimeout(function () {
                                $("#alertRegisterTeacherSuccess_4").removeClass('d-block');
                                $("#alertRegisterTeacherSuccess_4").addClass('d-none');

                                $("#succMsgRegisterTeacherAll_4").removeClass('d-block');
                                $("#succMsgRegisterTeacherAll_4").addClass('d-none');
                                $("#succMsgRegisterTeacherAll_4").html('');
                                $("#MultistepRegisterTeacherForm")[0].reset();
                                location.reload();
                            }, 15000);
                        }

                    }
                });
            }
        }
    });

    /** PREVIOUS BUTTONS */
    $("#PrevRegisterTeacher_4").click(function () {
        const RegisterTeacherUsername = $('#RegisterTeacherUsername').val();
        const RegisterTeacherPassword = $('#RegisterTeacherPassword').val();
        const RegisterTeacherConfirmPassword = $('#RegisterTeacherConfirmPassword').val();

        if (RegisterTeacherUsername != '' && RegisterTeacherPassword != '' &&
            RegisterTeacherConfirmPassword != '') {
            $("#MultistepRegisterTeacherProgressBtn_4").addClass("finish");
        }

        $("#MultistepRegisterTeacher_3").addClass("d-block");
        $("#MultistepRegisterTeacher_4").removeClass("d-block");

        $("#MultistepRegisterTeacher_3").removeClass("d-none");
        $("#MultistepRegisterTeacher_4").addClass("d-none");

        $("#MultistepRegisterTeacherProgressBtn_4").removeClass("active");
        $("#MultistepRegisterTeacherProgressBtn_3").addClass("active");
    });

    $("#PrevRegisterTeacher_3").click(function () {
        $("#MultistepRegisterTeacher_2").addClass("d-block");
        $("#MultistepRegisterTeacher_3").removeClass("d-block");

        $("#MultistepRegisterTeacher_2").removeClass("d-none");
        $("#MultistepRegisterTeacher_3").addClass("d-none");

        $("#MultistepRegisterTeacherProgressBtn_3").removeClass("active");
        // $("#MultistepRegisterTeacherProgressBtn_3").addClass("finish");
        $("#MultistepRegisterTeacherProgressBtn_2").addClass("active");
    });

    $("#PrevRegisterTeacher_2").click(function () {
        $("#MultistepRegisterTeacher_1").addClass("d-block");
        $("#MultistepRegisterTeacher_2").removeClass("d-block");

        $("#MultistepRegisterTeacher_1").removeClass("d-none");
        $("#MultistepRegisterTeacher_2").addClass("d-none");

        $("#MultistepRegisterTeacherProgressBtn_2").removeClass("active");
        // $("#MultistepRegisterTeacherProgressBtn_2").removeClass("finish");
        $("#MultistepRegisterTeacherProgressBtn_1").addClass("active");
    });
});

/** ADMIN REGISTER FORM VALIDATION */
$(document).ready(function () {
    $("#RegisterAdminBtn").click(function (e) {
        e.preventDefault();
        const RegisterAdminFirstname = $('#RegisterAdminFirstname').val();
        const RegisterAdminMiddlename = $('#RegisterAdminMiddlename').val();
        const RegisterAdminLastname = $('#RegisterAdminLastname').val();
        const RegisterAdminDob = $('#RegisterAdminDob').val();
        const RegisterAdminGender = $('#RegisterAdminGender').val();
        const RegisterAdminHomeAddress = $('#RegisterAdminHomeAddress').val();
        const RegisterAdminEmailAdd = $('#RegisterAdminEmailAdd').val();
        const RegisterAdminContactNo = $('#RegisterAdminContactNo').val();
        const RegisterAdminID = $('#RegisterAdminID').val();
        const RegisterAdminUsername = $('#RegisterAdminUsername').val();
        const RegisterAdminPassword = $('#RegisterAdminPassword').val();
        const RegisterAdminConfirmPassword = $('#RegisterAdminConfirmPassword').val();

        var errRegisterAdminAll = '';
        var errRegisterAdminFirstname = '';
        var errRegisterAdminMiddlename = '';
        var errRegisterAdminLastname = '';
        var errRegisterAdminDob = '';
        var errRegisterAdminGender = '';
        var errRegisterAdminHomeAddress = '';
        var errRegisterAdminEmailAdd = '';
        var errRegisterAdminContactNo = '';
        var errRegisterAdminID = '';
        var errRegisterAdminUsername = '';
        var errRegisterAdminPassword = '';
        var errRegisterAdminConfirmPassword = '';

        var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


        if (RegisterAdminFirstname.length == '' && RegisterAdminLastname.length == '' &&
            RegisterAdminDob.length == '' && RegisterAdminGender == '0' && RegisterAdminHomeAddress.length == '' &&
            RegisterAdminEmailAdd.length == '' && RegisterAdminContactNo.length == '' &&
            RegisterAdminID.length == '' && RegisterAdminUsername.length == '' && RegisterAdminPassword.length == '' &&
            RegisterAdminConfirmPassword.length == '') {
            errRegisterAdminAll = '<li> All Fields is empty! </li>';
            $("#errRegisterAdminAll").removeClass("d-none");
            $("#errRegisterAdminAll").addClass("d-block");
            $("#errRegisterAdminAll").html(errRegisterAdminAll);

            $('#RegisterAdminFirstname').addClass('border-danger');
            $('#RegisterAdminLastname').addClass('border-danger');
            $('#RegisterAdminDob').addClass('border-danger');
            $('#RegisterAdminGender').addClass('border-danger');
            $('#RegisterAdminHomeAddress').addClass('border-danger');
            $('#RegisterAdminEmailAdd').addClass('border-danger');
            $('#RegisterAdminContactNo').addClass("border-danger");
            $("#RegisterAdminID").addClass("border-danger");
            $("#RegisterAdminUsername").addClass("border-danger");
            $("#RegisterAdminPassword").addClass("border-danger");
            $("#RegisterAdminPasswordIcon").addClass("btn-outline-danger");
            $("#RegisterAdminConfirmPassword").addClass("border-danger");
            $("#RegisterAdminConfirmPasswordIcon").addClass("btn-outline-danger");
        } else {
            errRegisterAdminAll = '';
            $("#errRegisterAdminAll").addClass("d-none");
            $("#errRegisterAdminAll").removeClass("d-block");
            $("#errRegisterAdminAll").html(errRegisterAdminAll);

            $('#RegisterAdminFirstname').removeClass('border-danger');
            $('#RegisterAdminLastname').removeClass('border-danger');
            $('#RegisterAdminDob').removeClass('border-danger');
            $('#RegisterAdminGender').removeClass('border-danger');
            $('#RegisterAdminHomeAddress').removeClass('border-danger');
            $('#RegisterAdminEmailAdd').removeClass('border-danger');
            $('#RegisterAdminContactNo').removeClass("border-danger");
            $("#RegisterAdminID").removeClass("border-danger");
            $("#RegisterAdminUsername").removeClass("border-danger");
            $("#RegisterAdminPassword").removeClass("border-danger");
            $("#RegisterAdminPasswordIcon").removeClass("btn-outline-danger");
            $("#RegisterAdminConfirmPassword").removeClass("border-danger");
            $("#RegisterAdminConfirmPasswordIcon").removeClass("btn-outline-danger");

            /** FIRST NAME */
            if (RegisterAdminFirstname.length == '') {
                errRegisterAdminFirstname = '<li> First Name is required. </li>';
                $("#errRegisterAdminFirstname").removeClass("d-none");
                $("#errRegisterAdminFirstname").addClass("d-block");

                $("#errRegisterAdminFirstname").html(errRegisterAdminFirstname);

                $('#RegisterAdminFirstname').addClass('border-danger');
            } else {
                $('#RegisterAdminFirstname').removeClass('border-danger');

                if (RegisterAdminFirstname.length < 2) {
                    errRegisterAdminFirstname = '<li> First name must not be less than 2 characters. </li>';
                    $("#errRegisterAdminFirstname").removeClass("d-none");
                    $("#errRegisterAdminFirstname").addClass("d-block");

                    $("#errRegisterAdminFirstname").html(errRegisterAdminFirstname);
                    $("#RegisterAdminFirstname").addClass("border-danger");
                } else {
                    errRegisterAdminFirstname = ''
                    $("#errRegisterAdminFirstname").removeClass("d-block");
                    $("#errRegisterAdminFirstname").addClass("d-none");

                    $("#errRegisterAdminFirstname").html(errRegisterAdminFirstname);
                    $("#RegisterAdminFirstname").removeClass("border-danger");
                }
            }

            /** MIDDLE NAME */
            if (RegisterAdminMiddlename != '') {
                if (RegisterAdminMiddlename.length < 2) {
                    errRegisterAdminMiddlename = '<li> Middle name must not be less than 2 characters. </li>';
                    $("#errRegisterAdminMiddlename").removeClass("d-none");
                    $("#errRegisterAdminMiddlename").addClass("d-block");

                    $("#errRegisterAdminMiddlename").html(errRegisterAdminMiddlename);
                    $("#RegisterAdminMiddlename").addClass("border-danger");
                } else {
                    errRegisterAdminMiddlename = '';
                    $("#errRegisterAdminMiddlename").removeClass("d-block");
                    $("#errRegisterAdminMiddlename").addClass("d-none");

                    $("#errRegisterAdminMiddlename").html(errRegisterAdminMiddlename);
                    $("#RegisterAdminMiddlename").removeClass("border-danger");
                }
            } else {
                errRegisterAdminMiddlename = '';
                $("#errRegisterAdminMiddlename").removeClass("d-block");
                $("#errRegisterAdminMiddlename").addClass("d-none");

                $("#errRegisterAdminMiddlename").html(errRegisterAdminMiddlename);
                $("#RegisterAdminMiddlename").removeClass("border-danger");
            }

            /** LAST NAME */
            if (RegisterAdminLastname == '') {
                errRegisterAdminLastname = '<li> Last Name is required. </li>';
                $("#errRegisterAdminLastname").removeClass("d-none");
                $("#errRegisterAdminLastname").addClass("d-block");
                $("#errRegisterAdminLastname").html(errRegisterAdminLastname);
                $('#RegisterAdminLastname').addClass('border-danger');
            } else {
                $("#RegisterAdminLastname").removeClass("border-danger");

                if (RegisterAdminLastname.length < 2) {
                    errRegisterAdminLastname = '<li> Last name must not be less than 2 characters. </li>';
                    $("#errRegisterAdminLastname").removeClass("d-none");
                    $("#errRegisterAdminLastname").addClass("d-block");

                    $("#errRegisterAdminLastname").html(errRegisterAdminLastname);
                    $("#RegisterAdminLastname").addClass("border-danger");
                } else {
                    errRegisterAdminLastname = '';
                    $("#errRegisterAdminLastname").removeClass("d-block");
                    $("#errRegisterAdminLastname").addClass("d-none");

                    $("#errRegisterAdminLastname").html(errRegisterAdminLastname);
                    $("#RegisterAdminLastname").removeClass("border-danger");
                }
            }

            /* DATE OF BIRTH */
            if (RegisterAdminDob == '') {
                errRegisterAdminDob = '<li> Add your birthdate. </li>';
                $("#errRegisterAdminDob").removeClass("d-none");
                $("#errRegisterAdminDob").addClass("d-block");

                $("#errRegisterAdminDob").html(errRegisterAdminDob);
                $("#RegisterAdminDob").addClass("border-danger");
            } else {
                errRegisterAdminDob = '';
                $("#errRegisterAdminDob").removeClass("d-block");
                $("#errRegisterAdminDob").addClass("d-none");

                $("#errRegisterAdminDob").html(errRegisterAdminDob);
                $("#RegisterAdminDob").removeClass("border-danger");
            }

            // /** GENDER */
            if (RegisterAdminGender == "0") {
                errRegisterAdminGender = '<li> Select your gender. </li>';
                $("#errRegisterAdminGender").removeClass("d-none");
                $("#errRegisterAdminGender").addClass("d-block");

                $("#errRegisterAdminGender").html(errRegisterAdminGender);
                $("#RegisterAdminGender").addClass("border-danger");
            } else {
                errRegisterAdminGender = '';
                $("#errRegisterAdminGender").removeClass("d-block");
                $("#errRegisterAdminGender").addClass("d-none");

                $("#errRegisterAdminGender").html(errRegisterAdminGender);
                $("#RegisterAdminGender").removeClass("border-danger");
            }

            /** HOME ADDRESS */
            if (RegisterAdminHomeAddress.length == '') {
                errRegisterAdminHomeAddress = '<li> Home Address is required. </li>';
                $("#errRegisterAdminHomeAddress").removeClass("d-none");
                $("#errRegisterAdminHomeAddress").addClass("d-block");
                $("#errRegisterAdminHomeAddress").html(errRegisterAdminHomeAddress);
                $('#RegisterAdminHomeAddress').addClass('border-danger');
            } else {
                errRegisterAdminHomeAddress = '';
                $("#errRegisterAdminHomeAddress").removeClass("d-none");
                $("#errRegisterAdminHomeAddress").addClass("d-block");
                $("#errRegisterAdminHomeAddress").html(errRegisterAdminHomeAddress);
                $("#RegisterAdminHomeAddress").removeClass("border-danger");
            }

            /**  EMAIL ADDRESS */
            if (RegisterAdminEmailAdd.length == '') {
                errRegisterAdminEmailAdd = '<li> Email Address is required. </li>';
                $("#errRegisterAdminEmailAdd").removeClass("d-none");
                $("#errRegisterAdminEmailAdd").addClass("d-block");
                $("#errRegisterAdminEmailAdd").html(errRegisterAdminEmailAdd);
                $('#RegisterAdminEmailAdd').addClass('border-danger');
            } else {
                $("#RegisterAdminEmailAdd").removeClass("border-danger");

                if (!regexEmail.test(RegisterAdminEmailAdd)) {
                    errRegisterAdminEmailAdd = '<li> Email Address is invalid. </li>';
                    $("#errRegisterAdminEmailAdd").removeClass("d-none");
                    $("#errRegisterAdminEmailAdd").addClass("d-block");
                    $("#errRegisterAdminEmailAdd").html(errRegisterAdminEmailAdd);
                    $("#RegisterAdminEmailAdd").addClass("border-danger");
                } else {
                    errRegisterAdminEmailAdd = '';
                    $("#errRegisterAdminEmailAdd").removeClass("d-block");
                    $("#errRegisterAdminEmailAdd").addClass("d-none");
                    $("#errRegisterAdminEmailAdd").html(errRegisterAdminEmailAdd);
                    $("#RegisterAdminEmailAdd").removeClass("border-danger");
                }
            }

            /**  CONTACT NUMBER */
            if (RegisterAdminContactNo.length == '') {
                errRegisterAdminContactNo = '<li> Mobile Number is required. </li>';
                $("#errRegisterAdminContactNo").removeClass("d-none");
                $("#errRegisterAdminContactNo").addClass("d-block");
                $('#errRegisterAdminContactNo').html(errRegisterAdminContactNo);
                $('#RegisterAdminContactNo').addClass("border-danger");
            } else {
                $('#RegisterAdminContactNo').removeClass("border-danger");

                if (RegisterAdminContactNo.length != 11) {
                    errRegisterAdminContactNo = '<li> Please check your number again. </li>';
                    $("#errRegisterAdminContactNo").removeClass("d-none");
                    $("#errRegisterAdminContactNo").addClass("d-block");
                    $('#errRegisterAdminContactNo').html(errRegisterAdminContactNo);
                    $('#RegisterAdminContactNo').addClass("border-danger");
                } else {
                    errRegisterAdminContactNo = '';
                    $("#errRegisterAdminContactNo").removeClass("d-block");
                    $("#errRegisterAdminContactNo").addClass("d-none");
                    $('#errRegisterAdminContactNo').html(errRegisterAdminContactNo);
                    $('#RegisterAdminContactNo').removeClass("border-danger");
                }
            }

            /* Admin NUMBER */
            if (RegisterAdminID.length == 0) {
                errRegisterAdminID = '<li> Admin number is required. </li>';
                $("#errRegisterAdminID").removeClass("d-none");
                $("#errRegisterAdminID").addClass("d-block");

                $("#errRegisterAdminID").html(errRegisterAdminID);
                $("#RegisterAdminID").addClass("border-danger");
            } else {
                errRegisterAdminID = '';
                $("#errRegisterAdminID").removeClass("d-block");
                $("#errRegisterAdminID").addClass("d-none");

                $("#errRegisterAdminID").html(errRegisterAdminID);
                $("#RegisterAdminID").removeClass("border-danger");
            }

            if (RegisterAdminUsername.length == '') {
                errRegisterAdminUsername = '<li> Username is required. </li>';
                $("#errRegisterAdminUsername").removeClass("d-none");
                $("#errRegisterAdminUsername").addClass("d-block");

                $("#errRegisterAdminUsername").html(errRegisterAdminUsername);
                $("#RegisterAdminUsername").addClass("border-danger");
            } else {
                $("#RegisterAdminUsername").removeClass("border-danger");

                if (RegisterAdminUsername.length < 6) {
                    errRegisterAdminUsername = '<li> Username must not be < 6 characters </li>';

                    $("#errRegisterAdminUsername").removeClass("d-none");
                    $("#errRegisterAdminUsername").addClass("d-block");

                    $("#errRegisterAdminUsername").html(errRegisterAdminUsername);
                    $("#RegisterAdminUsername").addClass("border-danger");
                } else {
                    errRegisterAdminUsername = ''
                    $("#errRegisterAdminUsername").removeClass("d-block");
                    $("#errRegisterAdminUsername").addClass("d-none");

                    $("#errRegisterAdminUsername").html(errRegisterAdminUsername);
                    $("#RegisterAdminUsername").removeClass("border-danger");
                }
            }

            /** PASSWORD */
            if (RegisterAdminPassword.length == '') {
                errRegisterAdminPassword = '<li> Password is required. </li>';
                $("#errRegisterAdminPassword").removeClass("d-none");
                $("#errRegisterAdminPassword").addClass("d-block");

                $("#errRegisterAdminPassword").html(errRegisterAdminPassword);

                $("#RegisterAdminPassword").addClass("border-danger");
                $("#RegisterAdminPasswordIcon").addClass("btn-outline-danger");
            } else {
                $("#RegisterAdminPassword").removeClass("border-danger");
                $("#RegisterAdminPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterAdminPassword.length < 6) {
                    errRegisterAdminPassword = '<li> Password must not be < 6 characters </li>';
                    $("#errRegisterAdminPassword").removeClass("d-none");
                    $("#errRegisterAdminPassword").addClass("d-block");

                    $("#errRegisterAdminPassword").html(errRegisterAdminPassword);

                    $("#RegisterAdminPassword").addClass("border-danger");
                    $("#RegisterAdminPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterAdminPassword = ''
                    $("#errRegisterAdminPassword").removeClass("d-block");
                    $("#errRegisterAdminPassword").addClass("d-none");

                    $("#errRegisterAdminPassword").html(errRegisterAdminPassword);
                    $("#RegisterAdminPassword").removeClass("border-danger");
                    $("#RegisterAdminPasswordIcon").removeClass("btn-outline-danger");
                }
            }

            /** CONFIRM PASSWORD */
            if (RegisterAdminConfirmPassword.length == '') {
                errRegisterAdminConfirmPassword = '<li> Confirm your password. </li>';
                $("#errRegisterAdminConfirmPassword").removeClass("d-none");
                $("#errRegisterAdminConfirmPassword").addClass("d-block");

                $("#errRegisterAdminConfirmPassword").html(errRegisterAdminConfirmPassword);
                $("#RegisterAdminConfirmPassword").addClass("border-danger");
                $("#RegisterAdminConfirmPasswordIcon").addClass("btn-outline-danger");

            } else {
                $("#RegisterAdminConfirmPassword").removeClass("border-danger");
                $("#RegisterAdminConfirmPasswordIcon").removeClass("btn-outline-danger");

                if (RegisterAdminConfirmPassword != RegisterAdminPassword) {
                    errRegisterAdminConfirmPassword = '<li> Confirm Password is not the same with password </li>';

                    $("#errRegisterAdminConfirmPassword").removeClass("d-none");
                    $("#errRegisterAdminConfirmPassword").addClass("d-block");

                    $("#errRegisterAdminConfirmPassword").html(errRegisterAdminConfirmPassword);
                    $("#RegisterAdminConfirmPassword").addClass("border-danger");
                    $("#RegisterAdminConfirmPasswordIcon").addClass("btn-outline-danger");
                } else {
                    errRegisterAdminConfirmPassword = ''
                    $("#errRegisterAdminConfirmPassword").removeClass("d-block");
                    $("#errRegisterAdminConfirmPassword").addClass("d-none");

                    $("#errRegisterAdminConfirmPassword").html(errRegisterAdminConfirmPassword);
                    $("#RegisterAdminConfirmPassword").removeClass("border-danger");
                    $("#RegisterAdminConfirmPasswordIcon").removeClass("btn-outline-danger");
                }
            }
        }

        if (errRegisterAdminAll != '' || errRegisterAdminFirstname != '' || errRegisterAdminMiddlename != '' ||
            errRegisterAdminLastname != '' || errRegisterAdminDob != '' || errRegisterAdminGender != '' ||
            errRegisterAdminHomeAddress != '' || errRegisterAdminEmailAdd != '' || errRegisterAdminContactNo != '' ||
            errRegisterAdminID != '' || errRegisterAdminUsername != '' ||
            errRegisterAdminPassword != '' || errRegisterAdminConfirmPassword != '') {
            $("#alertRegisterAdminError").addClass("d-block");
            $("#alertRegisterAdminError").removeClass("d-none");

            return false;
        } else {
            if (RegisterAdminFirstname != '' || RegisterAdminLastname != '' || RegisterAdminDob != '' || RegisterAdminGender != '' ||
                RegisterAdminHomeAddress != '' || RegisterAdminEmailAdd != '' || RegisterAdminContactNo != '' ||
                RegisterAdminID != '' || RegisterAdminUsername != '' ||
                RegisterAdminPassword != '' || RegisterAdminConfirmPassword != '') {
                $("#alertRegisterAdminError").removeClass("d-block");
                $("#alertRegisterAdminError").addClass("d-none");

                var formData = $('#RegisterAdminForm').serialize();
                console.log(formData);

                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: formData,
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertRegisterAdminError").addClass("d-block");
                            $("#alertRegisterAdminError").removeClass("d-none");

                            if (feedback.error1 != '') {
                                $("#errRegisterAdminUsername").removeClass("d-none");
                                $("#errRegisterAdminUsername").addClass("d-block");
                                $("#errRegisterAdminUsername").html(feedback.error1);
                                $("#RegisterAdminUsername").addClass("border-danger");
                            }

                            if (feedback.error2 != '') {
                                $("#errRegisterAdminID").removeClass("d-none");
                                $("#errRegisterAdminID").addClass("d-block");
                                $("#errRegisterAdminID").html(feedback.error2);
                                $("#RegisterAdminID").addClass("border-danger");
                            }

                            setTimeout(function () {
                                $("#alertRegisterAdminError").removeClass('d-block');
                                $("#alertRegisterAdminError").addClass('d-none');

                                if ($('#errRegisterAdminUsername').hasClass('d-block')) {
                                    $("#errMsgRegisterAdminUsername").removeClass('d-block');
                                    $("#errMsgRegisterAdminUsername").addClass('d-none');
                                    $("#errMsgRegisterAdminUsername").html('');
                                    $("#RegisterAdminUsername").removeClass("border-danger");
                                }

                                if ($('#errRegisterAdminID').hasClass('d-block')) {
                                    $("#errMsgRegisterAdminID").removeClass('d-block');
                                    $("#errMsgRegisterAdminID").addClass('d-none');
                                    $("#errMsgRegisterAdminID").html('');
                                    $("#RegisterAdminID").removeClass("border-danger");
                                }

                            }, 15000);

                        } else if (feedback.status === "success") {
                            $("#alertRegisterAdminSuccess").removeClass("d-none");
                            $("#alertRegisterAdminSuccess").addClass("d-block");

                            $("#succMsgRegisterAdminAll").removeClass("d-none");
                            $("#succMsgRegisterAdminAll").addClass("d-block");
                            $("#succMsgRegisterAdminAll").html(feedback.message);

                            setTimeout(function () {
                                $("#alertRegisterAdminSuccess").removeClass('d-block');
                                $("#alertRegisterAdminSuccess").addClass('d-none');

                                $("#succMsgRegisterAdminAll").removeClass('d-block');
                                $("#succMsgRegisterAdminAll").addClass('d-none');
                                $("#succMsgRegisterAdminAll").html('');
                                $("#RegisterAdminForm")[0].reset();
                            }, 15000);
                        }

                    }
                });



            }
        }
    });


});


/** EDIT PROFILE */
$(document).ready(function () {
    /** edit personal info */
    $("#EditProfileForm").on('submit', function (e) {
        e.preventDefault();
        const EditProfileFirstname = $('#EditProfileFirstname').val();
        const EditProfileMiddlename = $('#EditProfileMiddlename').val();
        const EditProfileLastname = $('#EditProfileLastname').val();
        const EditProfileDob = $('#EditProfileDob').val();
        const EditProfileGender = $('#EditProfileGender').val();
        const EditProfileHomeAddress = $('#EditProfileHomeAddress').val();
        const EditProfileEmailAdd = $('#EditProfileEmailAdd').val();
        const EditProfileContactNo = $('#EditProfileContactNo').val();

        var errEditProfileAll = '';
        var errEditProfileFirstname = '';
        var errEditProfileMiddlename = '';
        var errEditProfileLastname = '';
        var errEditProfileDob = '';
        var errEditProfileGender = '';

        var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var errEditProfileHomeAddress = '';
        var errEditProfileEmailAdd = '';
        var errEditProfileContactNo = '';


        if (EditProfileFirstname.length == '' && EditProfileLastname.length == '' &&
            EditProfileDob.length == '' && EditProfileGender == '0' && EditProfileHomeAddress.length == '' &&
            EditProfileEmailAdd.length == '' && EditProfileContactNo.length == '') {
            errEditProfileAll = '<li> All Fields is empty! </li>';
            $("#errEditProfileAll").removeClass("d-none");
            $("#errEditProfileAll").addClass("d-block");
            $("#errEditProfileAll").html(errEditProfileAll);

            $('#EditProfileFirstname').addClass('border-danger');
            $('#EditProfileLastname').addClass('border-danger');
            $('#EditProfileDob').addClass('border-danger');
            $('#EditProfileGender').addClass('border-danger');
            $('#EditProfileHomeAddress').addClass('border-danger');
            $("#EditProfileEmailAdd").addClass("border-danger");
            $('#EditProfileContactNo').addClass("border-danger");
        } else {
            errEditProfileAll = '';
            $("#errEditProfileAll").addClass("d-none");
            $("#errEditProfileAll").removeClass("d-block");
            $("#errEditProfileAll").html(errEditProfileAll);

            $('#EditProfileFirstname').removeClass('border-danger');
            $('#EditProfileLastname').removeClass('border-danger');
            $('#EditProfileDob').removeClass('border-danger');
            $('#EditProfileGender').removeClass('border-danger');
            $('#EditProfileHomeAddress').removeClass('border-danger');
            $("#EditProfileEmailAdd").removeClass("border-danger");
            $('#EditProfileContactNo').removeClass("border-danger");

            /** FIRST NAME */
            if (EditProfileFirstname.length == '') {
                errEditProfileFirstname = '<li> First Name is required. </li>';
                $("#errEditProfileFirstname").removeClass("d-none");
                $("#errEditProfileFirstname").addClass("d-block");

                $("#errEditProfileFirstname").html(errEditProfileFirstname);

                $('#EditProfileFirstname').addClass('border-danger');
            } else {
                $('#EditProfileFirstname').removeClass('border-danger');

                if (EditProfileFirstname.length < 2) {
                    errEditProfileFirstname = '<li> First name must not be less than 2 characters. </li>';
                    $("#errEditProfileFirstname").removeClass("d-none");
                    $("#errEditProfileFirstname").addClass("d-block");

                    $("#errEditProfileFirstname").html(errEditProfileFirstname);
                    $("#EditProfileFirstname").addClass("border-danger");
                } else {
                    errEditProfileFirstname = ''
                    $("#errEditProfileFirstname").removeClass("d-block");
                    $("#errEditProfileFirstname").addClass("d-none");

                    $("#errEditProfileFirstname").html(errEditProfileFirstname);
                    $("#EditProfileFirstname").removeClass("border-danger");
                }
            }

            /** MIDDLE NAME */
            if (EditProfileMiddlename != '') {
                if (EditProfileMiddlename.length < 2) {
                    errEditProfileMiddlename = '<li> Middle name must not be less than 2 characters. </li>';
                    $("#errEditProfileMiddlename").removeClass("d-none");
                    $("#errEditProfileMiddlename").addClass("d-block");

                    $("#errEditProfileMiddlename").html(errEditProfileMiddlename);
                    $("#EditProfileMiddlename").addClass("border-danger");
                } else {
                    errEditProfileMiddlename = '';
                    $("#errEditProfileMiddlename").removeClass("d-block");
                    $("#errEditProfileMiddlename").addClass("d-none");

                    $("#errEditProfileMiddlename").html(errEditProfileMiddlename);
                    $("#EditProfileMiddlename").removeClass("border-danger");
                }
            } else {
                errEditProfileMiddlename = '';
                $("#errEditProfileMiddlename").removeClass("d-block");
                $("#errEditProfileMiddlename").addClass("d-none");

                $("#errEditProfileMiddlename").html(errEditProfileMiddlename);
                $("#EditProfileMiddlename").removeClass("border-danger");
            }

            /** LAST NAME */
            if (EditProfileLastname == '') {
                errEditProfileLastname = '<li> Last Name is required. </li>';
                $("#errEditProfileLastname").removeClass("d-none");
                $("#errEditProfileLastname").addClass("d-block");
                $("#errEditProfileLastname").html(errEditProfileLastname);
                $('#EditProfileLastname').addClass('border-danger');
            } else {
                $("#EditProfileLastname").removeClass("border-danger");
                if (EditProfileLastname.length < 2) {
                    errEditProfileLastname = '<li> Last name must not be less than 2 characters. </li>';
                    $("#errEditProfileLastname").removeClass("d-none");
                    $("#errEditProfileLastname").addClass("d-block");

                    $("#errEditProfileLastname").html(errEditProfileLastname);
                    $("#EditProfileLastname").addClass("border-danger");
                } else {
                    errEditProfileLastname = '';
                    $("#errEditProfileLastname").removeClass("d-block");
                    $("#errEditProfileLastname").addClass("d-none");

                    $("#errEditProfileLastname").html(errEditProfileLastname);
                    $("#EditProfileLastname").removeClass("border-danger");
                }
            }

            /** HOME ADDRESS */
            if (EditProfileHomeAddress.length == '') {
                errEditProfileHomeAddress = '<li> Home Address is required. </li>';
                $("#errEditProfileHomeAddress").removeClass("d-none");
                $("#errEditProfileHomeAddress").addClass("d-block");
                $("#errEditProfileHomeAddress").html(errEditProfileHomeAddress);
                $('#EditProfileHomeAddress').addClass('border-danger');
            } else {
                errEditProfileHomeAddress = '';
                $("#errEditProfileHomeAddress").removeClass("d-none");
                $("#errEditProfileHomeAddress").addClass("d-block");
                $("#errEditProfileHomeAddress").html(errEditProfileHomeAddress);
                $("#EditProfileHomeAddress").removeClass("border-danger");
            }

            /**  EMAIL ADDRESS */
            if (EditProfileEmailAdd.length == '') {
                errEditProfileEmailAdd = '<li> Email Address is required. </li>';
                $("#errEditProfileEmailAdd").removeClass("d-none");
                $("#errEditProfileEmailAdd").addClass("d-block");
                $("#errEditProfileEmailAdd").html(errEditProfileEmailAdd);
                $('#EditProfileEmailAdd').addClass('border-danger');
            } else {
                $("#EditProfileEmailAdd").removeClass("border-danger");

                if (!regexEmail.test(EditProfileEmailAdd)) {
                    errEditProfileEmailAdd = '<li> Email Address is invalid. </li>';
                    $("#errEditProfileEmailAdd").removeClass("d-none");
                    $("#errEditProfileEmailAdd").addClass("d-block");
                    $("#errEditProfileEmailAdd").html(errEditProfileEmailAdd);
                    $("#EditProfileEmailAdd").addClass("border-danger");
                } else {
                    errEditProfileEmailAdd = '';
                    $("#errEditProfileEmailAdd").removeClass("d-block");
                    $("#errEditProfileEmailAdd").addClass("d-none");
                    $("#errEditProfileEmailAdd").html(errEditProfileEmailAdd);
                    $("#EditProfileEmailAdd").removeClass("border-danger");
                }
            }

            /**  CONTACT NUMBER */
            if (EditProfileContactNo.length == '') {
                errEditProfileContactNo = '<li> Mobile Number is required. </li>';
                $("#errEditProfileContactNo").removeClass("d-none");
                $("#errEditProfileContactNo").addClass("d-block");
                $('#errEditProfileContactNo').html(errEditProfileContactNo);
                $('#EditProfileContactNo').addClass("border-danger");
            } else {
                $('#EditProfileContactNo').removeClass("border-danger");

                if (EditProfileContactNo.length != 11) {
                    errEditProfileContactNo = '<li> Please check your number again. </li>';
                    $("#errEditProfileContactNo").removeClass("d-none");
                    $("#errEditProfileContactNo").addClass("d-block");
                    $('#errEditProfileContactNo').html(errEditProfileContactNo);
                    $('#EditProfileContactNo').addClass("border-danger");
                } else {
                    errEditProfileContactNo = '';
                    $("#errEditProfileContactNo").removeClass("d-block");
                    $("#errEditProfileContactNo").addClass("d-none");
                    $('#errEditProfileContactNo').html(errEditProfileContactNo);
                    $('#EditProfileContactNo').removeClass("border-danger");
                }
            }

            /* DATE OF BIRTH */
            if (EditProfileDob == '') {
                errEditProfileDob = '<li> Add your birthdate. </li>';
                $("#errEditProfileDob").removeClass("d-none");
                $("#errEditProfileDob").addClass("d-block");

                $("#errEditProfileDob").html(errEditProfileDob);
                $("#EditProfileDob").addClass("border-danger");
            } else {
                errEditProfileDob = '';
                $("#errEditProfileDob").removeClass("d-block");
                $("#errEditProfileDob").addClass("d-none");

                $("#errEditProfileDob").html(errEditProfileDob);
                $("#EditProfileDob").removeClass("border-danger");
            }

            // // /** GENDER */
            if (EditProfileGender == "0") {
                errEditProfileGender = '<li> Select your gender. </li>';
                $("#errEditProfileGender").removeClass("d-none");
                $("#errEditProfileGender").addClass("d-block");

                $("#errEditProfileGender").html(errEditProfileGender);
                $("#EditProfileGender").addClass("border-danger");
            } else {
                errEditProfileGender = '';
                $("#errEditProfileGender").removeClass("d-block");
                $("#errEditProfileGender").addClass("d-none");

                $("#errEditProfileGender").html(errEditProfileGender);
                $("#EditProfileGender").removeClass("border-danger");
            }
        }

        if (errEditProfileAll != '' || errEditProfileFirstname != '' ||
            errEditProfileMiddlename != '' || errEditProfileLastname != '' ||
            errEditProfileDob != '' || errEditProfileGender != '' ||
            errEditProfileHomeAddress != '' || errEditProfileEmailAdd != '' || errEditProfileContactNo != '') {
            $("#alertEditProfileError").addClass("d-block");
            $("#alertEditProfileError").removeClass("d-none");

            return false;
        } else {
            if (EditProfileFirstname != '' && EditProfileLastname != '' &&
                errEditProfileMiddlename == '' && EditProfileDob != '' && EditProfileGender != '0' &&
                EditProfileHomeAddress != '' || EditProfileEmailAdd != '' || EditProfileContactNo != '') {
                $("#alertEditProfileError").removeClass("d-block");
                $("#alertEditProfileError").addClass("d-none");

                var formData = $('#EditProfileForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: formData,
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditProfileError").addClass("d-block");
                            $("#alertEditProfileError").removeClass("d-none");
                            $("#errEditProfileAll").removeClass("d-none");
                            $("#errEditProfileAll").addClass("d-block");
                            $("#errEditProfileAll").html(feedback.error);

                            setTimeout(function () {
                                $("#alertEditProfileError").removeClass('d-block');
                                $("#alertEditProfileError").addClass('d-none');

                                $("#errEditProfileAll").addClass("d-none");
                                $("#errEditProfileAll").removeClass("d-block");
                                $("#errEditProfileAll").html('');
                            }, 15000);

                        } else if (feedback.status === "success") {
                            $("#alertEditProfileSuccess").removeClass("d-none");
                            $("#alertEditProfileSuccess").addClass("d-block");

                            $("#succMsgEditProfileAll").removeClass("d-none");
                            $("#succMsgEditProfileAll").addClass("d-block");
                            $("#succMsgEditProfileAll").html(feedback.message);

                            $("#EditProfileFirstname").attr('readonly', true);
                            $("#EditProfileMiddlename").attr('readonly', true);
                            $("#EditProfileLastname").attr('readonly', true);
                            $("#EditProfileSuffixname").attr('readonly', true);
                            $("#EditProfileHomeAddress").attr('readonly', true);
                            $("#EditProfileEmailAdd").attr('readonly', true);
                            $("#EditProfileContactNo").attr('readonly', true);
                            $("#EditProfileDob").attr('readonly', true);
                            $("#EditProfileGender").attr('disabled', true);

                            $("#EditBtnPersonalInfo").removeClass('d-none');
                            $("#EditBtnPersonalInfo").addClass('d-block');

                            $("#EditCancelBtnPersonalInfo").addClass('d-none');
                            $("#EditCancelBtnPersonalInfo").removeClass('d-block');

                            $("#EditPersonalInfo").addClass('d-none');
                            $("#EditPersonalInfo").removeClass('d-block');

                            setTimeout(function () {
                                $("#alertEditProfileSuccess").removeClass('d-block');
                                $("#alertEditProfileSuccess").addClass('d-none');

                                $("#succMsgEditProfileAll").removeClass('d-block');
                                $("#succMsgEditProfileAll").addClass('d-none');
                                $("#succMsgEditProfileAll").html('');
                                location.reload();
                            }, 5000);
                        }
                    }
                });
            }
        }

    });

    /** edit other details info */
    $("#EditOtherDetailsForm").on('submit', function (e) {
        e.preventDefault();
        var formData = $('#EditOtherDetailsForm').serialize();
        console.log(formData);

        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccount.php',
            data: formData,
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "error") {
                    $("#alertEditOtherError").addClass("d-block");
                    $("#alertEditOtherError").removeClass("d-none");
                    $("#errEditOtherAll").removeClass("d-none");
                    $("#errEditOtherAll").addClass("d-block");
                    $("#errEditOtherAll").html(feedback.error);

                    setTimeout(function () {
                        $("#alertEditOtherError").removeClass('d-block');
                        $("#alertEditOtherError").addClass('d-none');

                        $("#errEditOtherAll").addClass("d-none");
                        $("#errEditOtherAll").removeClass("d-block");
                        $("#errEditOtherAll").html('');
                    }, 15000);

                } else if (feedback.status === "success") {
                    $("#EditOtherAboutMe").attr('readonly', true);
                    $("#EditOtherName").attr('readonly', true);
                    $("#EditOtherNamePronounce").attr('readonly', true);
                    $("#EditOtherFaveQuote").attr('readonly', true);

                    $("#EditBtnOtherDetails").removeClass('d-none');
                    $("#EditBtnOtherDetails").addClass('d-block');

                    $("#EditCancelBtnOtherDetails").addClass('d-none');
                    $("#EditCancelBtnOtherDetails").removeClass('d-block');

                    $("#EditOtherDetails").addClass('d-none');
                    $("#EditOtherDetails").removeClass('d-block');


                    $("#alertEditOtherSuccess").removeClass("d-none");
                    $("#alertEditOtherSuccess").addClass("d-block");

                    $("#succMsgEditOtherAll").removeClass("d-none");
                    $("#succMsgEditOtherAll").addClass("d-block");
                    $("#succMsgEditOtherAll").html(feedback.message);
                    setTimeout(function () {
                        $("#alertEditOtherSuccess").removeClass('d-block');
                        $("#alertEditOtherSuccess").addClass('d-none');

                        $("#succMsgEditOtherAll").removeClass('d-block');
                        $("#succMsgEditOtherAll").addClass('d-none');
                        $("#succMsgEditOtherAll").html('');
                        location.reload();
                    }, 5000);
                }
            }
        });
    });

    /** edit social media info */
    $("#EditSocialMediaForm").on('submit', function (e) {
        e.preventDefault();
        var formData = $('#EditSocialMediaForm').serialize();
        console.log(formData);

        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccount.php',
            data: formData,
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "error") {
                    $("#alertEditSocialMediaError").addClass("d-block");
                    $("#alertEditSocialMediaError").removeClass("d-none");
                    $("#errEditSocialMediaAll").removeClass("d-none");
                    $("#errEditSocialMediaAll").addClass("d-block");
                    $("#errEditSocialMediaAll").html(feedback.error);

                    setTimeout(function () {
                        $("#alertEditSocialMediaError").removeClass('d-block');
                        $("#alertEditSocialMediaError").addClass('d-none');

                        $("#errEditSocialMediaAll").addClass("d-none");
                        $("#errEditSocialMediaAll").removeClass("d-block");
                        $("#errEditSocialMediaAll").html('');
                    }, 15000);

                } else if (feedback.status === "success") {
                    $("#EditSocialMediaFBLink").attr('readonly', true);
                    $("#EditSocialMediaTWLink").attr('readonly', true);
                    $("#EditSocialMediaIGLink").attr('readonly', true);
                    $("#EditSocialMediaYTLink").attr('readonly', true);

                    $("#EditSocialMediaFB").attr('readonly', true);
                    $("#EditSocialMediaTW").attr('readonly', true);
                    $("#EditSocialMediaIG").attr('readonly', true);
                    $("#EditSocialMediaYT").attr('readonly', true);

                    $("#EditBtnSocialMedia").removeClass('d-none');
                    $("#EditBtnSocialMedia").addClass('d-block');

                    $("#EditCancelBtnSocialMedia").addClass('d-none');
                    $("#EditCancelBtnSocialMedia").removeClass('d-block');

                    $("#EditSocialMedia").addClass('d-none');
                    $("#EditSocialMedia").removeClass('d-block');

                    $("#alertEditSocialMediaSuccess").removeClass("d-none");
                    $("#alertEditSocialMediaSuccess").addClass("d-block");

                    $("#succMsgEditSocialMediaAll").removeClass("d-none");
                    $("#succMsgEditSocialMediaAll").addClass("d-block");
                    $("#succMsgEditSocialMediaAll").html(feedback.message);

                    setTimeout(function () {
                        $("#alertEditSocialMediaSuccess").removeClass('d-block');
                        $("#alertEditSocialMediaSuccess").addClass('d-none');

                        $("#succMsgEditSocialMediaAll").removeClass('d-block');
                        $("#succMsgEditSocialMediaAll").addClass('d-none');
                        $("#succMsgEditSocialMediaAll").html('');
                        location.reload();
                    }, 5000);
                }
            }
        });
    });

    /** edit educational info */
    $("#EditEducationalInfoForm").on('submit', function (e) {
        e.preventDefault();

        var atype = $("#Atype").val();
        const EditEducationalInfoSelectCollege = $("#EditEducationalInfoSelectCollege").val();
        const EditEducationalInfoSelectDepartment = $("#EditEducationalInfoSelectDepartment").val();
        const EditEducationalInfoSelectCourse = $("#EditEducationalInfoSelectCourse").val();
        const EditEducationalInfoSelectMajor = $("#EditEducationalInfoSelectMajor").val();

        var errEditEducationalInfoAll;
        var errEditEducationalInfoSelectCollege = '';
        var errEditEducationalInfoSelectDepartment = '';
        var errEditEducationalInfoSelectCourse = '';
        var errEditEducationalInfoSelectMajor = '';

        if (atype == '2') {
            if (EditEducationalInfoSelectCollege == '0' &&
                EditEducationalInfoSelectCourse == '0' && EditEducationalInfoSelectMajor == '0') {
                errEditEducationalInfoAll = '<li> All Fields is empty! </li>';
                $("#errEditEducationalInfoAll").removeClass("d-none");
                $("#errEditEducationalInfoAll").addClass("d-block");
                $("#errEditEducationalInfoAll").html(errEditEducationalInfoAll);

                $('#EditEducationalInfoID').addClass('border-danger');
                $("#EditEducationalInfoSelectCollege").addClass("border-danger");
                $('#EditEducationalInfoSelectCourse').addClass("border-danger");
                $('#EditEducationalInfoSelectMajor').addClass("border-danger");

            } else {
                errEditEducationalInfoAll = '';
                $("#errEditEducationalInfoAll").addClass("d-none");
                $("#errEditEducationalInfoAll").removeClass("d-block");
                $("#errEditEducationalInfoAll").html(errEditEducationalInfoAll);

                $('#EditEducationalInfoID').removeClass('border-danger');
                $("#EditEducationalInfoSelectCollege").removeClass("border-danger");
                $('#EditEducationalInfoSelectCourse').removeClass("border-danger");
                $('#EditEducationalInfoSelectMajor').removeClass("border-danger");

                /** COLLEGE */
                if (EditEducationalInfoSelectCollege == "0") {
                    errEditEducationalInfoSelectCollege = '<li> Select your college.';
                    $("#errEditEducationalInfoSelectCollege").removeClass("d-none");
                    $("#errEditEducationalInfoSelectCollege").addClass("d-block");

                    $("#errEditEducationalInfoSelectCollege").html(errEditEducationalInfoSelectCollege);
                    $("#EditEducationalInfoSelectCollege").addClass("border-danger");
                } else {
                    errEditEducationalInfoSelectCollege = '';
                    $("#errEditEducationalInfoSelectCollege").removeClass("d-block");
                    $("#errEditEducationalInfoSelectCollege").addClass("d-none");

                    $("#errEditEducationalInfoSelectCollege").html(errEditEducationalInfoSelectCollege);
                    $("#EditEducationalInfoSelectCollege").removeClass("border-danger");
                }

                /** COURSE */
                if (EditEducationalInfoSelectCourse == "0") {
                    errEditEducationalInfoSelectCourse = '<li> Select your course. </li>';
                    $("#errEditEducationalInfoSelectCourse").removeClass("d-none");
                    $("#errEditEducationalInfoSelectCourse").addClass("d-block");

                    $("#errEditEducationalInfoSelectCourse").html(errEditEducationalInfoSelectCourse);
                    $("#EditEducationalInfoSelectCourse").addClass("border-danger");
                } else {
                    errEditEducationalInfoSelectCourse = '';
                    $("#errEditEducationalInfoSelectCourse").removeClass("d-block");
                    $("#errEditEducationalInfoSelectCourse").addClass("d-none");

                    $("#errEditEducationalInfoSelectCourse").html(errEditEducationalInfoSelectCourse);
                    $("#EditEducationalInfoSelectCourse").removeClass("border-danger");
                }

                /** MAJOR */
                if (EditEducationalInfoSelectMajor == "0") {
                    errEditEducationalInfoSelectMajor = '<li> Select your major. </li>';
                    $("#errEditEducationalInfoSelectMajor").removeClass("d-none");
                    $("#errEditEducationalInfoSelectMajor").addClass("d-block");

                    $("#errEditEducationalInfoSelectMajor").html(errEditEducationalInfoSelectMajor);
                    $("#EditEducationalInfoSelectMajor").addClass("border-danger");
                } else {
                    errEditEducationalInfoSelectMajor = '';
                    $("#errEditEducationalInfoSelectMajor").removeClass("d-block");
                    $("#errEditEducationalInfoSelectMajor").addClass("d-none");

                    $("#errEditEducationalInfoSelectMajor").html(errEditEducationalInfoSelectMajor);
                    $("#EditEducationalInfoSelectMajor").removeClass("border-danger");
                }

            }

            if (errEditEducationalInfoAll != '' || errEditEducationalInfoSelectCollege != '' ||
                errEditEducationalInfoSelectCourse != '' || errEditEducationalInfoSelectMajor != '') {
                $("#alertEditEducationalInfoError").addClass("d-block");
                $("#alertEditEducationalInfoError").removeClass("d-none");
                return false;
            } else {
                if (EditEducationalInfoSelectCollege != '' || EditEducationalInfoSelectCourse != '' ||
                    EditEducationalInfoSelectMajor != '0') {
                    var formData = $('#EditEducationalInfoForm').serialize();

                    $.ajax({
                        method: 'POST',
                        url: baseUrl + '/app/controllers/crud/crudAccount.php',
                        data: formData,
                        dataType: 'JSON',
                        success: function (feedback) {
                            if (feedback.status === "error") {
                                $("#alertEditEducationalInfoError").addClass("d-block");
                                $("#alertEditEducationalInfoError").removeClass("d-none");
                                $("#errEditEducationalInfoAll").removeClass("d-none");
                                $("#errEditEducationalInfoAll").addClass("d-block");
                                $("#errEditEducationalInfoAll").html(feedback.error);

                                setTimeout(function () {
                                    $("#alertEditEducationalInfoError").removeClass('d-block');
                                    $("#alertEditEducationalInfoError").addClass('d-none');

                                    $("#errEditEducationalInfoAll").addClass("d-none");
                                    $("#errEditEducationalInfoAll").removeClass("d-block");
                                    $("#errEditEducationalInfoAll").html('');
                                }, 15000);

                            } else if (feedback.status === "success") {
                                $("#alertEditEducationalInfoSuccess").removeClass("d-none");
                                $("#alertEditEducationalInfoSuccess").addClass("d-block");

                                $("#succMsgEditEducationalInfoAll").removeClass("d-none");
                                $("#succMsgEditEducationalInfoAll").addClass("d-block");
                                $("#succMsgEditEducationalInfoAll").html(feedback.message);

                                $("#EditEducationalInfoSelectCollege").attr('disabled', true);
                                $("#EditEducationalInfoSelectDepartment").attr('disabled', true);
                                $("#EditEducationalInfoSelectCourse").attr('disabled', true);
                                $("#EditEducationalInfoSelectMajor").attr('disabled', true);

                                $("#EditBtnEducationalInfo").removeClass('d-none');
                                $("#EditBtnEducationalInfo").addClass('d-block');

                                $("#EditCancelBtnEducationalInfo").addClass('d-none');
                                $("#EditCancelBtnEducationalInfo").removeClass('d-block');

                                $("#EditEducationalInfo").addClass('d-none');
                                $("#EditEducationalInfo").removeClass('d-block');

                                setTimeout(function () {
                                    $("#alertEditEducationalInfoSuccess").removeClass('d-block');
                                    $("#alertEditEducationalInfoSuccess").addClass('d-none');

                                    $("#succMsgEditEducationalInfoAll").removeClass('d-block');
                                    $("#succMsgEditEducationalInfoAll").addClass('d-none');
                                    $("#succMsgEditEducationalInfoAll").html('');
                                    location.reload();
                                }, 5000);
                            }
                        }
                    });
                }
            }

        }

        if (atype == '3' || atype == '4') {
            if (EditEducationalInfoSelectCollege == '0' &&
                EditEducationalInfoSelectDepartment == '0') {
                errEditEducationalInfoAll = '<li> All Fields is empty! </li>';
                $("#errEditEducationalInfoAll").removeClass("d-none");
                $("#errEditEducationalInfoAll").addClass("d-block");
                $("#errEditEducationalInfoAll").html(errEditEducationalInfoAll);

                $('#EditEducationalInfoID').addClass('border-danger');
                $("#EditEducationalInfoSelectCollege").addClass("border-danger");
                $('#EditEducationalInfoSelectDepartment').addClass("border-danger");


            } else {
                errEditEducationalInfoAll = '';
                $("#errEditEducationalInfoAll").addClass("d-none");
                $("#errEditEducationalInfoAll").removeClass("d-block");
                $("#errEditEducationalInfoAll").html(errEditEducationalInfoAll);

                $('#EditEducationalInfoID').removeClass('border-danger');
                $("#EditEducationalInfoSelectCollege").removeClass("border-danger");
                $('#EditEducationalInfoSelectDepartment').removeClass("border-danger");

                /** COLLEGE */
                if (EditEducationalInfoSelectCollege == "0") {
                    errEditEducationalInfoSelectCollege = '<li> Select your college.';
                    $("#errEditEducationalInfoSelectCollege").removeClass("d-none");
                    $("#errEditEducationalInfoSelectCollege").addClass("d-block");

                    $("#errEditEducationalInfoSelectCollege").html(errEditEducationalInfoSelectCollege);
                    $("#EditEducationalInfoSelectCollege").addClass("border-danger");
                } else {
                    errEditEducationalInfoSelectCollege = '';
                    $("#errEditEducationalInfoSelectCollege").removeClass("d-block");
                    $("#errEditEducationalInfoSelectCollege").addClass("d-none");

                    $("#errEditEducationalInfoSelectCollege").html(errEditEducationalInfoSelectCollege);
                    $("#EditEducationalInfoSelectCollege").removeClass("border-danger");
                }

                /** DEPARTMENT */
                if (EditEducationalInfoSelectDepartment == "0") {
                    errEditEducationalInfoSelectDepartment = '<li> Select your Department. </li>';
                    $("#errEditEducationalInfoSelectDepartment").removeClass("d-none");
                    $("#errEditEducationalInfoSelectDepartment").addClass("d-block");

                    $("#errEditEducationalInfoSelectDepartment").html(errEditEducationalInfoSelectDepartment);
                    $("#EditEducationalInfoSelectDepartment").addClass("border-danger");
                } else {
                    errEditEducationalInfoSelectDepartment = '';
                    $("#errEditEducationalInfoSelectDepartment").removeClass("d-block");
                    $("#errEditEducationalInfoSelectDepartment").addClass("d-none");

                    $("#errEditEducationalInfoSelectDepartment").html(errEditEducationalInfoSelectDepartment);
                    $("#EditEducationalInfoSelectDepartment").removeClass("border-danger");
                }


            }

            if (errEditEducationalInfoAll != '' || errEditEducationalInfoSelectCollege != '' ||
                errEditEducationalInfoSelectDepartment != '') {
                $("#alertEditEducationalInfoError").addClass("d-block");
                $("#alertEditEducationalInfoError").removeClass("d-none");
                return false;
            } else {
                if (EditEducationalInfoSelectCollege != '' || EditEducationalInfoSelectDepartment != '') {
                    var formData = $('#EditEducationalInfoForm').serialize();

                    $.ajax({
                        method: 'POST',
                        url: baseUrl + '/app/controllers/crud/crudAccount.php',
                        data: formData,
                        dataType: 'JSON',
                        success: function (feedback) {
                            if (feedback.status === "error") {
                                $("#alertEditEducationalInfoError").addClass("d-block");
                                $("#alertEditEducationalInfoError").removeClass("d-none");
                                $("#errEditEducationalInfoAll").removeClass("d-none");
                                $("#errEditEducationalInfoAll").addClass("d-block");
                                $("#errEditEducationalInfoAll").html(feedback.error);

                                setTimeout(function () {
                                    $("#alertEditEducationalInfoError").removeClass('d-block');
                                    $("#alertEditEducationalInfoError").addClass('d-none');

                                    $("#errEditEducationalInfoAll").addClass("d-none");
                                    $("#errEditEducationalInfoAll").removeClass("d-block");
                                    $("#errEditEducationalInfoAll").html('');
                                }, 15000);

                            } else if (feedback.status === "success") {
                                $("#alertEditEducationalInfoSuccess").removeClass("d-none");
                                $("#alertEditEducationalInfoSuccess").addClass("d-block");

                                $("#succMsgEditEducationalInfoAll").removeClass("d-none");
                                $("#succMsgEditEducationalInfoAll").addClass("d-block");
                                $("#succMsgEditEducationalInfoAll").html(feedback.message);

                                $("#EditEducationalInfoSelectCollege").attr('disabled', true);
                                $("#EditEducationalInfoSelectDepartment").attr('disabled', true);
                                $("#EditEducationalInfoSelectCourse").attr('disabled', true);
                                $("#EditEducationalInfoSelectMajor").attr('disabled', true);

                                $("#EditBtnEducationalInfo").removeClass('d-none');
                                $("#EditBtnEducationalInfo").addClass('d-block');

                                $("#EditCancelBtnEducationalInfo").addClass('d-none');
                                $("#EditCancelBtnEducationalInfo").removeClass('d-block');

                                $("#EditEducationalInfo").addClass('d-none');
                                $("#EditEducationalInfo").removeClass('d-block');

                                setTimeout(function () {
                                    $("#alertEditEducationalInfoSuccess").removeClass('d-block');
                                    $("#alertEditEducationalInfoSuccess").addClass('d-none');

                                    $("#succMsgEditEducationalInfoAll").removeClass('d-block');
                                    $("#succMsgEditEducationalInfoAll").addClass('d-none');
                                    $("#succMsgEditEducationalInfoAll").html('');
                                    location.reload();
                                }, 5000);
                            }
                        }
                    });
                }
            }
        }

    });

    /** edit loadslip */
    $("#EditLoadslipForm").on('submit', function (e) {
        e.preventDefault();

        const EditLoadSlipSelectSchoolyear = $('#EditLoadSlipSelectSchoolyear').val();
        const EditLoadSlipSelectSemester = $('#EditLoadSlipSelectSemester').val();
        const EditLoadSlip = $('#EditLoadSlip').val();

        var regexImage = /([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg|.bmp)$/;

        var errEditLoadSlipAll;
        var errEditLoadSlipSelectSchoolyear = '';
        var errEditLoadSlipSelectSemester = '';
        var errEditLoadSlip = '';

        if (EditLoadSlip.length == '' &&
            EditLoadSlipSelectSchoolyear == '0' && EditLoadSlipSelectSemester == '0') {
            errEditLoadSlipAll = '<li> All Fields is empty! </li>';
            $("#errEditLoadSlipAll").removeClass("d-none");
            $("#errEditLoadSlipAll").addClass("d-block");
            $("#errEditLoadSlipAll").html(errEditLoadSlipAll);

            $('#EditLoadSlipSelectSchoolyear').addClass("border-danger");
            $('#EditLoadSlipSelectSemester').addClass("border-danger");
            $('#EditLoadSlip').addClass("border-danger");
        } else {
            errEditLoadSlipAll = '';
            $("#errEditLoadSlipAll").addClass("d-none");
            $("#errEditLoadSlipAll").removeClass("d-block");
            $("#errEditLoadSlipAll").html(errEditLoadSlipAll);

            $('#EditLoadSlipSelectSchoolyear').removeClass("border-danger");
            $('#EditLoadSlipSelectSemester').removeClass("border-danger");
            $('#EditLoadSlip').removeClass("border-danger");

            /** School year */
            if (EditLoadSlipSelectSchoolyear == "0") {
                errEditLoadSlipSelectSchoolyear = '<li> Select schoolyear. </li>';
                $("#errEditLoadSlipSelectSchoolyear").removeClass("d-none");
                $("#errEditLoadSlipSelectSchoolyear").addClass("d-block");

                $("#errEditLoadSlipSelectSchoolyear").html(errEditLoadSlipSelectSchoolyear);
                $("#EditLoadSlipSelectSchoolyear").addClass("border-danger");
            } else {
                errEditLoadSlipSelectSchoolyear = '';
                $("#errEditLoadSlipSelectSchoolyear").removeClass("d-block");
                $("#errEditLoadSlipSelectSchoolyear").addClass("d-none");

                $("#errEditLoadSlipSelectSchoolyear").html(errEditLoadSlipSelectSchoolyear);
                $("#EditLoadSlipSelectSchoolyear").removeClass("border-danger");
            }

            /** Semester */
            if (EditLoadSlipSelectSemester == "0") {
                errEditLoadSlipSelectSemester = '<li> Select semester. </li>';
                $("#errEditLoadSlipSelectSemester").removeClass("d-none");
                $("#errEditLoadSlipSelectSemester").addClass("d-block");

                $("#errEditLoadSlipSelectSemester").html(errEditLoadSlipSelectSemester);
                $("#EditLoadSlipSelectSemester").addClass("border-danger");
            } else {
                errEditLoadSlipSelectSemester = '';
                $("#errEditLoadSlipSelectSemester").removeClass("d-block");
                $("#errEditLoadSlipSelectSemester").addClass("d-none");

                $("#errEditLoadSlipSelectSemester").html(errEditLoadSlipSelectSemester);
                $("#EditLoadSlipSelectSemester").removeClass("border-danger");
            }

            /* EditLoadslip */
            if (EditLoadSlip.length == '') {
                errEditLoadSlip = '<li> Please attach your load slip. </li>';
                $("#errEditLoadSlip").removeClass("d-none");
                $("#errEditLoadSlip").addClass("d-block");

                $("#errEditLoadSlip").html(errEditLoadSlip);
                $("#EditLoadSlip").addClass("border-danger");
            } else {
                $("#EditLoadSlip").removeClass("border-danger");

                if (!regexImage.test(EditLoadSlip)) {
                    errEditLoadSlip = '<li> Please upload loadslip as an image having extensions: .png, .jpg, .jpeg .bmp only. </li>';
                    $("#errEditLoadSlip").removeClass("d-none");
                    $("#errEditLoadSlip").addClass("d-block");

                    $("#errEditLoadSlip").html(errEditLoadSlip);
                    $("#EditLoadSlip").addClass("border-danger");
                } else {
                    errEditLoadSlip = '';
                    $("#errEditLoadSlip").removeClass("d-block");
                    $("#errEditLoadSlip").addClass("d-none");

                    $("#errEditLoadSlip").html(errEditLoadSlip);
                    $("#EditLoadSlip").removeClass("border-danger");
                }
            }
        }

        if (errEditLoadSlipAll != '' || errEditLoadSlipSelectSchoolyear != '' ||
            errEditLoadSlipSelectSemester != '' || errEditLoadSlip != '') {
            $("#alertEditLoadSlipError").addClass("d-block");
            $("#alertEditLoadSlipError").removeClass("d-none");
            return false;
        } else {


            if (EditLoadSlip != '' || EditLoadSlipSelectSchoolyear != '0' ||
                EditLoadSlipSelectSemester != '0') {
                $("#alertEditLoadSlipError").removeClass("d-block");
                $("#alertEditLoadSlipError").addClass("d-none");

                // var formData = $('#EditLoadslipForm').serialize();
                var formData = new FormData(this);

                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudAccount.php',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditLoadSlipError").addClass("d-block");
                            $("#alertEditLoadSlipError").removeClass("d-none");

                            $("#errEditLoadSlipAll").removeClass("d-none");
                            $("#errEditLoadSlipAll").addClass("d-block");
                            $("#errEditLoadSlipAll").html(feedback.errAll);
                            $("#EditLoadSlipAll").addClass("border-danger");

                            setTimeout(function () {
                                $("#alertEditLoadSlipError").addClass("d-none");
                                $("#alertEditLoadSlipError").removeClass("d-block");

                                $("#errEditLoadSlipAll").addClass("d-none");
                                $("#errEditLoadSlipAll").removeClass("d-block");
                                $("#errEditLoadSlipAll").html('');
                            }, 15000);

                        } else if (feedback.status === "success") {
                            $("#alertEditLoadSlipSuccess").removeClass("d-none");
                            $("#alertEditLoadSlipSuccess").addClass("d-block");

                            $("#succMsgEditLoadSlipAll").removeClass("d-none");
                            $("#succMsgEditLoadSlipAll").addClass("d-block");
                            $("#succMsgEditLoadSlipAll").html(feedback.message);

                            $('#EditLoadSlipSelectSchoolyear').attr('disabled', true);
                            $('#EditLoadSlipSelectSemester').attr('disabled', true);
                            $('#EditLoadSlip').attr('disabled', true);

                            $("#EditBtnLoadslip").removeClass('d-none');
                            $("#EditBtnLoadslip").addClass('d-block');
                            $("#EditCancelBtnLoadslip").addClass('d-none');
                            $("#EditCancelBtnLoadslip").removeClass('d-block');

                            $("#EditLoadslip").addClass('d-none');
                            $("#EditLoadslip").removeClass('d-block');

                            $("#LoadSlipInput").addClass('d-none');
                            $("#LoadSlipInput").removeClass('d-block');

                            setTimeout(function () {
                                $("#alertEditLoadSlipSuccess").removeClass('d-block');
                                $("#alertEditLoadSlipSuccess").addClass('d-none');

                                $("#succMsgEditLoadSlipAll").removeClass('d-block');
                                $("#succMsgEditLoadSlipAll").addClass('d-none');
                                $("#succMsgEditLoadSlipAll").html('');
                                location.reload();
                            }, 5000);
                        }
                    }
                });
            }
        }
    });


    /** edit profile picture */
    var optsPP = {
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 200,
            height: 200,
            type: 'square' //square
        },
        boundary: {
            width: 220,
            height: 220
        }
    };

    var resizePP = $('#UploadProfilePhotoPreview').croppie(optsPP);

    function ProfilePhotoDestroy() {
        resizePP.croppie('destroy');
        resizePP.croppie(optsPP);
        $("#EditProfilePhotoBtn").prop("disabled", true);
    }

    $('#ProfilePhotoInput').on('change', function () {
        var input = $('#ProfilePhotoInput').val();
        var reader = new FileReader();
        if (input != '') {
            reader.onload = function (e) {
                resizePP.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $("#EditProfilePhotoBtn").prop("disabled", false);
        } else if (input === '') {
            ProfilePhotoDestroy();
        }
    });

    $('#EditProfilePhotoBtn').on('click', function (ev) {
        resizePP.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            $.ajax({
                url: baseUrl + '/app/controllers/crud/crudAccount.php',
                type: "POST",
                dataType: 'JSON',
                data: {
                    "ProfilePhoto": img
                },
                success: function (feedback) {
                    if (feedback.status === 'success') {
                        $("#alertProfilePhotoSuccess").removeClass("d-none");
                        $("#alertProfilePhotoSuccess").addClass("d-block");

                        $("#succMsgProfilePhotoAll").removeClass("d-none");
                        $("#succMsgProfilePhotoAll").addClass("d-block");
                        $("#succMsgProfilePhotoAll").html(feedback.message);
                        $('#ProfilePhotoInput').val('')
                        ProfilePhotoDestroy();

                        $("#ModalCloseButtonEditProfilePhotoOne").click(function () {
                            location.reload()
                        });

                        $("#ModalCloseButtonEditProfilePhotoTwo").click(function () {
                            location.reload()
                        });

                        $('#EditProfilePhotoModal').on('hidden.bs.modal', function () {
                            location.reload();
                        });
                    }
                }
            });
        });
    });
    /** end of profile picture */

    /** edit profile cover */
    var coversizeWidth = 1000;
    var coversizeHeight = 340;
    var WidthModalLg = 500;

    var boundaryWidth = WidthModalLg - 40;
    var boundaryHeight = (coversizeHeight * boundaryWidth) / coversizeWidth;

    var viewportWidth = boundaryWidth - 20;
    var viewportHeight = boundaryHeight - 20;

    var optsPC = {
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: viewportWidth,
            height: viewportHeight
        },
        boundary: {
            width: boundaryWidth,
            height: boundaryHeight
        }
    };

    var resizePC = $('#UploadProfileCoverPreview').croppie(optsPC);

    function ProfileCoverDestroy() {
        resizePC.croppie('destroy');
        resizePC.croppie(optsPC);
        $("#EditProfileCoverBtn").prop("disabled", true);
    }

    $('#ProfileCoverInput').on('change', function () {
        var input = $('#ProfileCoverInput').val();
        if (input != '') {
            var reader = new FileReader();
            reader.onload = function (e) {
                resizePC.croppie('bind', {
                    url: e.target.result,
                }).then(function () {
                    console.log('jQuery bind complete');
                    $("#EditProfileCoverBtn").prop("disabled", false);
                });
            }
            reader.readAsDataURL(this.files[0]);
        } else if (input === '') {
            ProfileCoverDestroy();
        }
    });

    $('#EditProfileCoverBtn').on('click', function (ev) {
        resizePC.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            $.ajax({
                url: baseUrl + '/app/controllers/crud/crudAccount.php',
                type: "POST",
                dataType: 'JSON',
                data: {
                    "ProfileCover": img
                },
                success: function (feedback) {
                    if (feedback.status === 'success') {
                        $("#alertProfileCoverSuccess").removeClass("d-none");
                        $("#alertProfileCoverSuccess").addClass("d-block");

                        $("#succMsgProfileCoverAll").removeClass("d-none");
                        $("#succMsgProfileCoverAll").addClass("d-block");
                        $("#succMsgProfileCoverAll").html(feedback.message);

                        $('#ProfileCoverInput').val('')
                        ProfileCoverDestroy();

                        $("#ModalCloseButtonEditProfileCoverOne").click(function () {
                            location.reload();
                        });

                        $("#ModalCloseButtonEditProfileCoverTwo").click(function () {
                            location.reload();
                        });

                        $('#EditProfileCoverModal').on('hidden.bs.modal', function () {
                            location.reload();
                        });
                    }
                }
            });
        });
    });
    /** end of profile cover */

});