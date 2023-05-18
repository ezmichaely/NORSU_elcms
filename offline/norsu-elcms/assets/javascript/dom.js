// /** PASSWORD TOGGLE */
$(document).ready(function () {
  $(function () {
    $('[data-toggle="password"]').each(function () {
      var input = $(this);
      var eye_btn = $(this).parent().find(".input-group-text");
      eye_btn.css("cursor", "pointer").addClass("input-password-hide");
      eye_btn.on("click", function () {
        if (eye_btn.hasClass("input-password-hide")) {
          eye_btn
            .removeClass("input-password-hide")
            .addClass("input-password-show")
            .addClass("active");
          eye_btn.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
          input.attr("type", "text");
        } else {
          eye_btn
            .removeClass("input-password-show")
            .addClass("input-password-hide")
            .removeClass("active");
          eye_btn.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
          input.attr("type", "password");
        }
      });
    });
  });
});

// /** CHOOSE ACCOUNT FORM **/
$(document).ready(function () {
  $("#RegistrationStudentBtn").click(function () {
    if ($("#ChooseAccountForm").hasClass("d-block")) {
      $("#RegisterStudentForm").addClass("d-block");
      $("#RegisterStudentForm").removeClass("d-none");

      $("#ChooseAccountForm").removeClass("d-block");
      $("#ChooseAccountForm").addClass("d-none");

      $("#RegisterBody").removeClass("align-items-center");
      $("#RegisterBody").addClass("align-items-start");
    }
  });

  $("#RegistrationTeacherBtn").click(function () {
    if ($("#ChooseAccountForm").hasClass("d-block")) {
      $("#RegisterTeacherForm").addClass("d-block");
      $("#RegisterTeacherForm").removeClass("d-none");
      $("#ChooseAccountForm").removeClass("d-block");
      $("#ChooseAccountForm").addClass("d-none");

      $("#RegisterBody").removeClass("align-items-center");
      $("#RegisterBody").addClass("align-items-start");
    }
  });

  $("#RegisterStudentBackBtn").click(function () {
    if ($("#RegisterStudentForm").hasClass("d-block")) {
      $("#ChooseAccountForm").removeClass("d-none");
      $("#ChooseAccountForm").addClass("d-block");
      $("#RegisterStudentForm").removeClass("d-block");
      $("#RegisterStudentForm").addClass("d-none");

      $("#RegisterBody").removeClass("align-items-start");
      $("#RegisterBody").addClass("align-items-center");
    }
  });

  $("#RegisterTeacherBackBtn").click(function () {
    if ($("#RegisterTeacherForm").hasClass("d-block")) {
      $("#ChooseAccountForm").addClass("d-block");
      $("#ChooseAccountForm").removeClass("d-none");
      $("#RegisterTeacherForm").removeClass("d-block");
      $("#RegisterTeacherForm").addClass("d-none");

      $("#RegisterBody").removeClass("align-items-start");
      $("#RegisterBody").addClass("align-items-center");
    }
  });
});

/** TEXTAREA AUTO CHANGE HEIGHT **/
$(document).ready(function () {
  $("textarea")
    .each(function () {
      this.setAttribute(
        "style",
        "height:" + this.scrollHeight + "px;overflow-y:hidden;"
      );
    })
    .on("input", function () {
      this.style.height = "auto";
      this.style.height = this.scrollHeight + "px";
    });
});

/** CLASS ASSESSMENT TABS **/
$(document).ready(function () {
  $("#btnClassQuiz").click(function () {
    if ($("#divClassAssignment").hasClass("d-block")) {
      $("#divClassQuiz").addClass("d-block");
      $("#divClassQuiz").removeClass("d-none");
      $("#btnClassQuiz").addClass("active");

      $("#divClassAssignment").removeClass("d-block");
      $("#divClassAssignment").addClass("d-none");
      $("#btnClassAssignment").removeClass("active");
    }

    if ($("#divClassProject").hasClass("d-block")) {
      $("#divClassQuiz").addClass("d-block");
      $("#divClassQuiz").removeClass("d-none");
      $("#btnClassQuiz").addClass("active");

      $("#divClassProject").removeClass("d-block");
      $("#divClassProject").addClass("d-none");
      $("#btnClassProject").removeClass("active");
    }

    if ($("#divClassMajorExam").hasClass("d-block")) {
      $("#divClassQuiz").addClass("d-block");
      $("#divClassQuiz").removeClass("d-none");
      $("#btnClassQuiz").addClass("active");

      $("#divClassMajorExam").removeClass("d-block");
      $("#divClassMajorExam").addClass("d-none");
      $("#btnClassMajorExam").removeClass("active");
    }
  });

  $("#btnClassAssignment").click(function () {
    if ($("#divClassQuiz").hasClass("d-block")) {
      $("#divClassAssignment").addClass("d-block");
      $("#divClassAssignment").removeClass("d-none");
      $("#btnClassAssignment").addClass("active");

      $("#divClassQuiz").removeClass("d-block");
      $("#divClassQuiz").addClass("d-none");
      $("#btnClassQuiz").removeClass("active");
    }

    if ($("#divClassProject").hasClass("d-block")) {
      $("#divClassAssignment").addClass("d-block");
      $("#divClassAssignment").removeClass("d-none");
      $("#btnClassAssignment").addClass("active");

      $("#divClassProject").removeClass("d-block");
      $("#divClassProject").addClass("d-none");
      $("#btnClassProject").removeClass("active");
    }

    if ($("#divClassMajorExam").hasClass("d-block")) {
      $("#divClassAssignment").addClass("d-block");
      $("#divClassAssignment").removeClass("d-none");
      $("#btnClassAssignment").addClass("active");

      $("#divClassMajorExam").removeClass("d-block");
      $("#divClassMajorExam").addClass("d-none");
      $("#btnClassMajorExam").removeClass("active");
    }
  });

  $("#btnClassProject").click(function () {
    if ($("#divClassQuiz").hasClass("d-block")) {
      $("#divClassProject").addClass("d-block");
      $("#divClassProject").removeClass("d-none");
      $("#btnClassProject").addClass("active");

      $("#divClassQuiz").removeClass("d-block");
      $("#divClassQuiz").addClass("d-none");
      $("#btnClassQuiz").removeClass("active");
    }

    if ($("#divClassAssignment").hasClass("d-block")) {
      $("#divClassProject").addClass("d-block");
      $("#divClassProject").removeClass("d-none");
      $("#btnClassProject").addClass("active");

      $("#divClassAssignment").removeClass("d-block");
      $("#divClassAssignment").addClass("d-none");
      $("#btnClassAssignment").removeClass("active");
    }

    if ($("#divClassMajorExam").hasClass("d-block")) {
      $("#divClassProject").addClass("d-block");
      $("#divClassProject").removeClass("d-none");
      $("#btnClassProject").addClass("active");

      $("#divClassMajorExam").removeClass("d-block");
      $("#divClassMajorExam").addClass("d-none");
      $("#btnClassMajorExam").removeClass("active");
    }
  });

  $("#btnClassMajorExam").click(function () {
    if ($("#divClassQuiz").hasClass("d-block")) {
      $("#divClassMajorExam").addClass("d-block");
      $("#divClassMajorExam").removeClass("d-none");
      $("#btnClassMajorExam").addClass("active");

      $("#divClassQuiz").removeClass("d-block");
      $("#divClassQuiz").addClass("d-none");
      $("#btnClassQuiz").removeClass("active");
    }

    if ($("#divClassAssignment").hasClass("d-block")) {
      $("#divClassMajorExam").addClass("d-block");
      $("#divClassMajorExam").removeClass("d-none");
      $("#btnClassMajorExam").addClass("active");

      $("#divClassAssignment").removeClass("d-block");
      $("#divClassAssignment").addClass("d-none");
      $("#btnClassAssignment").removeClass("active");
    }

    if ($("#divClassProject").hasClass("d-block")) {
      $("#divClassMajorExam").addClass("d-block");
      $("#divClassMajorExam").removeClass("d-none");
      $("#btnClassMajorExam").addClass("active");

      $("#divClassProject").removeClass("d-block");
      $("#divClassProject").addClass("d-none");
      $("#btnClassProject").removeClass("active");
    }
  });
});


/** ACCOUNT REQUEST TABS **/
$(document).ready(function () {
  $("#btnRequestStudent").click(function () {
    if ($("#InstructorDiv").hasClass("d-block")) {
      $("#StudentDiv").addClass("d-block");
      $("#StudentDiv").removeClass("d-none");
      $("#btnRequestStudent").addClass("active");

      $("#InstructorDiv").removeClass("d-block");
      $("#InstructorDiv").addClass("d-none");
      $("#btnRequestInstructor").removeClass("active");
    }

    if ($("#DeptHeadDiv").hasClass("d-block")) {
      $("#StudentDiv").addClass("d-block");
      $("#StudentDiv").removeClass("d-none");
      $("#btnRequestStudent").addClass("active");

      $("#DeptHeadDiv").removeClass("d-block");
      $("#DeptHeadDiv").addClass("d-none");
      $("#btnRequestDeptHead").removeClass("active");
    }

    if ($("#DeanDiv").hasClass("d-block")) {
      $("#StudentDiv").addClass("d-block");
      $("#StudentDiv").removeClass("d-none");
      $("#btnRequestStudent").addClass("active");

      $("#DeanDiv").removeClass("d-block");
      $("#DeanDiv").addClass("d-none");
      $("#btnRequestDean").removeClass("active");
    }
  });

  $("#btnRequestInstructor").click(function () {
    if ($("#StudentDiv").hasClass("d-block")) {
      $("#InstructorDiv").addClass("d-block");
      $("#InstructorDiv").removeClass("d-none");
      $("#btnRequestInstructor").addClass("active");

      $("#StudentDiv").removeClass("d-block");
      $("#StudentDiv").addClass("d-none");
      $("#btnRequestStudent").removeClass("active");
    }

    if ($("#DeptHeadDiv").hasClass("d-block")) {
      $("#InstructorDiv").addClass("d-block");
      $("#InstructorDiv").removeClass("d-none");
      $("#btnRequestInstructor").addClass("active");

      $("#DeptHeadDiv").removeClass("d-block");
      $("#DeptHeadDiv").addClass("d-none");
      $("#btnRequestDeptHead").removeClass("active");
    }

    if ($("#DeanDiv").hasClass("d-block")) {
      $("#InstructorDiv").addClass("d-block");
      $("#InstructorDiv").removeClass("d-none");
      $("#btnRequestInstructor").addClass("active");

      $("#DeanDiv").removeClass("d-block");
      $("#DeanDiv").addClass("d-none");
      $("#btnRequestDean").removeClass("active");
    }
  });

  $("#btnRequestDeptHead").click(function () {
    if ($("#StudentDiv").hasClass("d-block")) {
      $("#DeptHeadDiv").addClass("d-block");
      $("#DeptHeadDiv").removeClass("d-none");
      $("#btnRequestDeptHead").addClass("active");

      $("#StudentDiv").removeClass("d-block");
      $("#StudentDiv").addClass("d-none");
      $("#btnRequestStudent").removeClass("active");
    }

    if ($("#InstructorDiv").hasClass("d-block")) {
      $("#DeptHeadDiv").addClass("d-block");
      $("#DeptHeadDiv").removeClass("d-none");
      $("#btnRequestDeptHead").addClass("active");

      $("#InstructorDiv").removeClass("d-block");
      $("#InstructorDiv").addClass("d-none");
      $("#btnRequestInstructor").removeClass("active");
    }

    if ($("#DeanDiv").hasClass("d-block")) {
      $("#DeptHeadDiv").addClass("d-block");
      $("#DeptHeadDiv").removeClass("d-none");
      $("#btnRequestDeptHead").addClass("active");

      $("#DeanDiv").removeClass("d-block");
      $("#DeanDiv").addClass("d-none");
      $("#btnRequestDean").removeClass("active");
    }
  });

  $("#btnRequestDean").click(function () {
    if ($("#StudentDiv").hasClass("d-block")) {
      $("#DeanDiv").addClass("d-block");
      $("#DeanDiv").removeClass("d-none");
      $("#btnRequestDean").addClass("active");

      $("#StudentDiv").removeClass("d-block");
      $("#StudentDiv").addClass("d-none");
      $("#btnRequestStudent").removeClass("active");
    }

    if ($("#InstructorDiv").hasClass("d-block")) {
      $("#DeanDiv").addClass("d-block");
      $("#DeanDiv").removeClass("d-none");
      $("#btnRequestDean").addClass("active");

      $("#InstructorDiv").removeClass("d-block");
      $("#InstructorDiv").addClass("d-none");
      $("#btnRequestInstructor").removeClass("active");
    }

    if ($("#DeptHeadDiv").hasClass("d-block")) {
      $("#DeanDiv").addClass("d-block");
      $("#DeanDiv").removeClass("d-none");
      $("#btnRequestDean").addClass("active");

      $("#DeptHeadDiv").removeClass("d-block");
      $("#DeptHeadDiv").addClass("d-none");
      $("#btnRequestDeptHead").removeClass("active");
    }
  });
});


/** MESSAGE INFO BUTTON **/
$(document).ready(function () {
  $("#messages-center-header-info").click(function () {
    if ($("#messages-right").hasClass("d-block")) {
      $("#messages-right").removeClass("d-block");
      $("#messages-right").addClass("d-none");
      $("#messages-center-header-info").removeClass("active");
    } else if ($("#messages-right").hasClass("d-none")) {
      $("#messages-right").removeClass("d-none");
      $("#messages-right").addClass("d-block");
      $("#messages-center-header-info").addClass("active");
    }
  });
});

/** PROFILE TABS BUTTON **/
$(document).ready(function () {
  $("#btnProfileTimeline").click(function () {
    if ($("#divProfileAbout").hasClass("d-block")) {
      $("#divProfileTimeline").addClass("d-block");
      $("#divProfileTimeline").removeClass("d-none");
      $("#btnProfileTimeline").addClass("active");

      $("#divProfileAbout").removeClass("d-block");
      $("#divProfileAbout").addClass("d-none");
      $("#btnProfileAbout").removeClass("active");
    }

    if ($("#divEditProfile").hasClass("d-block")) {
      $("#divProfileTimeline").addClass("d-block");
      $("#divProfileTimeline").removeClass("d-none");
      $("#btnProfileTimeline").addClass("active");

      $("#divEditProfile").removeClass("d-block");
      $("#divEditProfile").addClass("d-none");
      $("#btnEditProfile").removeClass("active");
    }

  });

  $("#btnProfileAbout").click(function () {
    if ($("#divProfileTimeline").hasClass("d-block")) {
      $("#divProfileAbout").addClass("d-block");
      $("#divProfileAbout").removeClass("d-none");
      $("#btnProfileAbout").addClass("active");

      $("#divProfileTimeline").removeClass("d-block");
      $("#divProfileTimeline").addClass("d-none");
      $("#btnProfileTimeline").removeClass("active");
    }

    if ($("#divEditProfile").hasClass("d-block")) {
      $("#divProfileAbout").addClass("d-block");
      $("#divProfileAbout").removeClass("d-none");
      $("#btnProfileAbout").addClass("active");

      $("#divEditProfile").removeClass("d-block");
      $("#divEditProfile").addClass("d-none");
      $("#btnEditProfile").removeClass("active");
    }
  });

  $("#btnEditProfile").click(function () {
    if ($("#divProfileAbout").hasClass("d-block")) {
      $("#divEditProfile").addClass("d-block");
      $("#divEditProfile").removeClass("d-none");
      $("#btnEditProfile").addClass("active");

      $("#divProfileAbout").removeClass("d-block");
      $("#divProfileAbout").addClass("d-none");
      $("#btnProfileAbout").removeClass("active");
    }

    if ($("#divProfileTimeline").hasClass("d-block")) {
      $("#divEditProfile").addClass("d-block");
      $("#divEditProfile").removeClass("d-none");
      $("#btnEditProfile").addClass("active");

      $("#divProfileTimeline").removeClass("d-block");
      $("#divProfileTimeline").addClass("d-none");
      $("#btnProfileTimeline").removeClass("active");
    }
  });
});

/** QUESTION TYPE SELECTOR **/
$(document).ready(function () {
  $("#question-type").change(function () {

    var qtype = $("#question-type").val();

    if (qtype == "Multiple Choices") {
      if ($("#multiple-choice").hasClass("d-none")) {
        $("#multiple-choice").removeClass("d-none");
        $("#multiple-choice").addClass("d-block");
      }

      if ($("#true-false").hasClass("d-block")) {
        $("#true-false").removeClass("d-block");
        $("#true-false").addClass("d-none");

        $("#multiple-choice").removeClass("d-none");
        $("#multiple-choice").addClass("d-block");
      }

      if ($("#fill-blanks").hasClass("d-block")) {
        $("#fill-blanks").removeClass("d-block");
        $("#fill-blanks").addClass("d-none");

        $("#multiple-choice").removeClass("d-none");
        $("#multiple-choice").addClass("d-block");
      }
    }

    if (qtype == "True or False") {
      if ($("#true-false").hasClass("d-none")) {
        $("#true-false").removeClass("d-none");
        $("#true-false").addClass("d-block");
      }

      if ($("#multiple-choice").hasClass("d-block")) {
        $("#multiple-choice").removeClass("d-block");
        $("#multiple-choice").addClass("d-none");

        $("#true-false").removeClass("d-none");
        $("#true-false").addClass("d-block");
      }

      if ($("#fill-blanks").hasClass("d-block")) {
        $("#fill-blanks").removeClass("d-block");
        $("#fill-blanks").addClass("d-none");

        $("#true-false").addClass("d-block");
        $("#true-false").addClass("d-block");
      }
    }

    if (qtype == "Fill in the Blank") {
      if ($("#fill-blanks").hasClass("d-none")) {
        $("#fill-blanks").removeClass("d-none");
        $("#fill-blanks").addClass("d-block");
      }

      if ($("#multiple-choice").hasClass("d-block")) {
        $("#multiple-choice").removeClass("d-block");
        $("#multiple-choice").addClass("d-none");

        $("#fill-blanks").removeClass("d-none");
        $("#fill-blanks").addClass("d-block");
      }

      if ($("#true-false").hasClass("d-block")) {
        $("#true-false").removeClass("d-block");
        $("#true-false").addClass("d-none");

        $("#fill-blanks").addClass("d-block");
        $("#fill-blanks").addClass("d-block");
      }
    }
    // alert(qtype);
  });



});

/** DASHBOARD SIDE NAVBAR CLASS MEDIA QUERIE ARRANGEMENT **/
$(document).ready(function () {
  /** MEDIA QUIERY */
  function mdWindowWidth(md) {
    if (md.matches) {
      // If media query matches
      $("#btn-toggle-hide").addClass("d-flex");
      $("#btn-toggle-hide").removeClass("d-none");

      $("#icon-hide").removeClass("fa-bars");
      $("#icon-hide").addClass("fa-times");

      $("#dashboard").removeClass("hide");
      $("#dashboard").addClass("show");

      $("#side-navbar").addClass("show");
      $("#side-navbar").removeClass("hide");

      $('[data-bs-toggle="tooltip"]').tooltip("enable");
    }
  }

  function smWindowWidth(sm) {
    if (sm.matches) {
      // If media query matches
      $("#btn-toggle-hide").removeClass("d-none");
      $("#btn-toggle-hide").addClass("d-flex");

      $("#icon-hide").removeClass("fa-times");
      $("#icon-hide").addClass("fa-bars");

      $("#dashboard").removeClass("show");
      $("#dashboard").addClass("hide");

      $("#side-navbar").removeClass("show");
      $("#side-navbar").addClass("hide");

      $('[data-bs-toggle="tooltip"]').tooltip("enable");
    }
  }

  function md_upWindowWidth(md_up) {
    if (md_up.matches) {
      // If media query matches
      $("#btn-toggle-hide").removeClass("d-flex");
      $("#btn-toggle-hide").addClass("d-none");

      $("#dashboard").removeClass("hide");
      $("#dashboard").removeClass("show");

      $("#side-navbar").removeClass("show");
      $("#side-navbar").removeClass("hide");

      $('[data-bs-toggle="tooltip"]').tooltip("disable");
    }
  }
  var md = window.matchMedia("(max-width: 768px) and (min-width: 577px)");
  var sm = window.matchMedia("(max-width: 576px) and (min-width: 0px)");
  var md_up = window.matchMedia("(min-width: 769px)");

  mdWindowWidth(md); // Call listener function at run time
  smWindowWidth(sm); // Call listener function at run time
  md_upWindowWidth(md_up); // Call listener function at run time

  md.addListener(mdWindowWidth); // Attach listener function on state changes
  sm.addListener(smWindowWidth); // Attach listener function on state changes
  md_up.addListener(md_upWindowWidth); // Attach listener function on state changes
});

/** DASHBOARD MENU TOGGLE HIDE-SHOW **/
$(document).ready(function () {
  $("#btn-toggle-hide").click(function () {
    if ($("#dashboard").hasClass("show")) {
      $("#side-navbar").removeClass("show");
      $("#side-navbar").addClass("hide");

      $("#dashboard").removeClass("show");
      $("#dashboard").addClass("hide");

      $("#icon-hide").removeClass("fa-times");
      $("#icon-hide").addClass("fa-bars");

      $('[data-bs-toggle="tooltip"]').tooltip("disable");
    } else {
      $("#side-navbar").removeClass("hide");
      $("#side-navbar").addClass("show");

      $("#dashboard").removeClass("hide");
      $("#dashboard").addClass("show");

      $("#icon-hide").removeClass("fa-bars");
      $("#icon-hide").addClass("fa-times");

      $('[data-bs-toggle="tooltip"]').tooltip("enable");
    }
  });
});

/** DASHBOARD MENU TOGGLE MINI-MAX **/
$(document).ready(function () {
  $("#btn-toggle-collapse").click(function () {
    if ($("#side-navbar").hasClass("mini")) {
      $("#side-navbar").removeClass("mini");
      $("#side-navbar").addClass("max");

      $("#dashboard").removeClass("mini");
      $("#dashboard").addClass("max");

      $("#icon-collapse").removeClass("fa-chevron-right");
      $("#icon-collapse").addClass("fa-chevron-left");

      $("#btn-toggle-collapse").removeClass("mini");
      $("#btn-toggle-collapse").addClass("max");

      $('[data-bs-toggle="tooltip"]').tooltip("disable");

    } else if ($("#side-navbar").hasClass("max")) {
      $("#side-navbar").removeClass("max");
      $("#side-navbar").addClass("mini");

      $("#dashboard").removeClass("max");
      $("#dashboard").addClass("mini");

      $("#icon-collapse").removeClass("fa-chevron-left");
      $("#icon-collapse").addClass("fa-chevron-right");

      $("#btn-toggle-collapse").removeClass("max");
      $("#btn-toggle-collapse").addClass("mini");

      $('[data-bs-toggle="tooltip"]').tooltip("enable");
    }
  });

});

/** TOOLTIP FOR DASHBOARD**/
$(document).ready(function () {
  function tooltips() {
    if (($("#dashboard").hasClass("max")) && ($("#dashboard").hasClass("show"))) {
      $('[data-bs-toggle="tooltip"]').tooltip("enable");
    } else if ($("#dashboard").hasClass("max")) {
      $('[data-bs-toggle="tooltip"]').tooltip("disable");
    }
  }
  tooltips(); // Call listener function at run time
});

/** TOOLTIP FOR POSTS **/
$(document).ready(function () {
  $('.fileinput-button').tooltip("enable");
});

/** EDIT PROFILE BTN  **/
$(document).ready(function () {
  // edit personal info
  $("#EditBtnPersonalInfo").click(function () {
    $("#EditProfileFirstname").attr('readonly', false);
    $("#EditProfileMiddlename").attr('readonly', false);
    $("#EditProfileLastname").attr('readonly', false);
    $("#EditProfileSuffixname").attr('readonly', false);
    $("#EditProfileHomeAddress").attr('readonly', false);
    $("#EditProfileEmailAdd").attr('readonly', false);
    $("#EditProfileContactNo").attr('readonly', false);
    $("#EditProfileDob").attr('readonly', false);
    $("#EditProfileGender").attr('disabled', false);

    $("#EditBtnPersonalInfo").addClass('d-none');
    $("#EditBtnPersonalInfo").removeClass('d-block');

    $("#EditCancelBtnPersonalInfo").removeClass('d-none');
    $("#EditCancelBtnPersonalInfo").addClass('d-block');

    $("#EditPersonalInfo").removeClass('d-none');
    $("#EditPersonalInfo").addClass('d-block');
  });

  // cancel edit personal info
  $("#EditCancelBtnPersonalInfo").click(function () {
    var fn = $("#Fname").val();
    var mn = $("#Mname").val();
    var ln = $("#Lname").val();
    var sn = $("#Suffix").val();
    var ha = $("#Home").val();
    var ea = $("#Email").val();
    var cn = $("#Contact").val();
    var dob = $("#Dob").val();
    var gender = $("#Gender").val();
    if (gender == 'Male') {
      var selectedgender1 = '<option value="' + gender + '" selected>' + gender + '</option>';
      var selectedgender2 = '<option value="Female">Female</option>';
      $("#EditProfileGender").html('');
      $("#EditProfileGender").append(selectedgender1);
      $("#EditProfileGender").append(selectedgender2);
    } else if (gender == 'Female') {
      var selectedgender1 = '<option value="' + gender + '" selected>' + gender + '</option>';
      var selectedgender2 = '<option value="Male">Male</option>';
      $("#EditProfileGender").html('');
      $("#EditProfileGender").append(selectedgender1);
      $("#EditProfileGender").append(selectedgender2);
    }

    $("#EditProfileFirstname").val(fn);
    $("#EditProfileMiddlename").val(mn);
    $("#EditProfileLastname").val(ln);
    $("#EditProfileSuffixname").val(sn);
    $("#EditProfileHomeAddress").val(ha);
    $("#EditProfileEmailAdd").val(ea);
    $("#EditProfileContactNo").val(cn);
    $("#EditProfileDob").val(dob);

    if ($('#alertEditProfileError').hasClass('d-block')) {
      $('#alertEditProfileError').removeClass('d-block');
      $('#alertEditProfileError').addClass('d-none');
    }

    if ($('#errEditProfileAll').hasClass('d-block')) {
      $('#errEditProfileAll').removeClass('d-block');
      $('#errEditProfileAll').addClass('d-none');
      $('#errEditProfileAll').html('');
    }

    if ($('#errEditProfileFirstname').hasClass('d-block')) {
      $('#errEditProfileFirstname').removeClass('d-block');
      $('#errEditProfileFirstname').addClass('d-none');
      $('#errEditProfileFirstname').html('');
    }

    if ($('#errEditProfileMiddlename').hasClass('d-block')) {
      $('#errEditProfileMiddlename').removeClass('d-block');
      $('#errEditProfileMiddlename').addClass('d-none');
      $('#errEditProfileMiddlename').html('');
    }

    if ($('#errEditProfileLastname').hasClass('d-block')) {
      $('#errEditProfileLastname').removeClass('d-block');
      $('#errEditProfileLastname').addClass('d-none');
      $('#errEditProfileLastname').html('');
    }

    if ($('#errEditProfileHomeAddress').hasClass('d-block')) {
      $('#errEditProfileHomeAddress').removeClass('d-block');
      $('#errEditProfileHomeAddress').addClass('d-none');
      $('#errEditProfileAll').html('');
    }

    if ($('#errEditProfileEmailAdd').hasClass('d-block')) {
      $('#errEditProfileEmailAdd').removeClass('d-block');
      $('#errEditProfileEmailAdd').addClass('d-none');
      $('#errEditProfileEmailAdd').html('');
    }

    if ($('#errEditProfileContactNo').hasClass('d-block')) {
      $('#errEditProfileContactNo').removeClass('d-block');
      $('#errEditProfileContactNo').addClass('d-none');
      $('#errEditProfileContactNo').html('');
    }

    if ($('#errEditProfileGender').hasClass('d-block')) {
      $('#errEditProfileGender').removeClass('d-block');
      $('#errEditProfileGender').addClass('d-none');
      $('#errEditProfileGender').html('');
    }

    if ($('#EditProfileFirstname').hasClass('border-danger')) {
      $('#EditProfileFirstname').removeClass('border-danger');
    }
    if ($('#EditProfileMiddlename').hasClass('border-danger')) {
      $('#EditProfileMiddlename').removeClass('border-danger');
    }
    if ($('#EditProfileLastname').hasClass('border-danger')) {
      $('#EditProfileLastname').removeClass('border-danger');
    }
    if ($('#EditProfileSuffixname').hasClass('border-danger')) {
      $('#EditProfileSuffixname').removeClass('border-danger');
    }
    if ($('#EditProfileHomeAddress').hasClass('border-danger')) {
      $('#EditProfileHomeAddress').removeClass('border-danger');
    }
    if ($('#EditProfileEmailAdd').hasClass('border-danger')) {
      $('#EditProfileEmailAdd').removeClass('border-danger');
    }
    if ($('#EditProfileContactNo').hasClass('border-danger')) {
      $('#EditProfileContactNo').removeClass('border-danger');
    }
    if ($('#EditProfileDob').hasClass('border-danger')) {
      $('#EditProfileDob').removeClass('border-danger');
    }
    if ($('#EditProfileGender').hasClass('border-danger')) {
      $('#EditProfileGender').removeClass('border-danger');
    }

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
  });

  // edit other details
  $("#EditBtnOtherDetails").click(function () {
    $("#EditOtherAboutMe").attr('readonly', false);
    $("#EditOtherName").attr('readonly', false);
    $("#EditOtherNamePronounce").attr('readonly', false);
    $("#EditOtherFaveQuote").attr('readonly', false);

    $("#EditBtnOtherDetails").addClass('d-none');
    $("#EditBtnOtherDetails").removeClass('d-block');

    $("#EditCancelBtnOtherDetails").removeClass('d-none');
    $("#EditCancelBtnOtherDetails").addClass('d-block');

    $("#EditOtherDetails").removeClass('d-none');
    $("#EditOtherDetails").addClass('d-block');
  });

  // cancel edit  other details
  $("#EditCancelBtnOtherDetails").click(function () {
    var am = $("#About").val();
    var on = $("#Other").val();
    var pn = $("#Pronounce").val();
    var fq = $("#Quote").val();

    $("#EditOtherAboutMe").val(am);
    $("#EditOtherName").val(on);
    $("#EditOtherNamePronounce").val(pn);
    $("#EditOtherFaveQuote").val(fq);

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
  });

  // edit educational info
  $("#EditBtnEducationalInfo").click(function () {
    $("#EditEducationalInfoSelectCollege").attr('disabled', false);
    var atype = $("#Atype").val();
    var clid = $("#EditEducationalInfoSelectCollege").val();
    var crid = $("#EditEducationalInfoSelectCourse").val();

    var mid = $('#MajorID').val();

    if (atype == '2') {
      if (mid == '') {
        OnloadEditEducationalInfoFetchCourses(clid);
      } else if (mid != '') {
        OnloadEditEducationalInfoFetchCourses(clid);
        OnloadEditEducationalInfoFetchMajors(crid);
      }
    }

    if (atype == '3' || atype == '4') {
      OnloadEditEducationalInfoFetchDepartments(clid);
    }

    $("#EditBtnEducationalInfo").addClass('d-none');
    $("#EditBtnEducationalInfo").removeClass('d-block');

    $("#EditCancelBtnEducationalInfo").removeClass('d-none');
    $("#EditCancelBtnEducationalInfo").addClass('d-block');

    $("#EditEducationalInfo").removeClass('d-none');
    $("#EditEducationalInfo").addClass('d-block');
  });

  // cancel edit educational info
  $("#EditCancelBtnEducationalInfo").click(function () {
    var collegeid = $("#CollegeID").val();
    var collegename = $("#CollegeName").val();
    var selectedcollege = '<option value="' + collegeid + '" selected hidden>' + collegename + '</option>';
    $("#EditEducationalInfoSelectCollege").html('');
    $("#EditEducationalInfoSelectCollege").append(selectedcollege);
    FetchCollege();

    var deparmentid = $("#DepartmentID").val();
    var deparmentname = $("#DepartmentName").val();
    var selecteddepartment = '<option value="' + deparmentid + '" selected>' + deparmentname + '</option>';
    $("#EditEducationalInfoSelectDepartment").html('');
    $("#EditEducationalInfoSelectDepartment").append(selecteddepartment);

    var courseid = $("#CourseID").val();
    var coursename = $("#CourseName").val();
    var selectedcourse = '<option value="' + courseid + '" selected>' + coursename + '</option>';
    $("#EditEducationalInfoSelectCourse").html('');
    $("#EditEducationalInfoSelectCourse").append(selectedcourse);


    var majorid = $("#MajorID").val();
    var majorname = $("#MajorName").val();
    var selectedmajor = '<option value="' + majorid + '" selected>' + majorname + '</option>';

    if ($("#EditEduMajors").hasClass('d-none')) {
      if (majorid != '') {
        $("#EditEduMajors").removeClass('d-none');
        $("#EditEduMajors").addClass('d-block');

        $("#EditEducationalInfoSelectMajor").html('');
        $("#EditEducationalInfoSelectMajor").append(selectedmajor);
      } else {

      }

    } else if ($("#EditEduMajors").hasClass('d-block')) {
      if (majorid != '') {
        $("#EditEducationalInfoSelectMajor").html('');
        $("#EditEducationalInfoSelectMajor").append(selectedmajor);
      } else {
        $("#EditEduMajors").addClass('d-none');
        $("#EditEduMajors").removeClass('d-block');
      }
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
      $('#alertEditEducationalInfoError').removeClass('d-block');
      $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#EditEducationalInfoSelectDepartment').hasClass('border-danger')) {
      $('#EditEducationalInfoSelectDepartment').removeClass('border-danger')
    }

    if ($('#EditEducationalInfoSelectCourse').hasClass('border-danger')) {
      $('#EditEducationalInfoSelectCourse').removeClass('border-danger')
    }

    if ($('#EditEducationalInfoSelectMajor').hasClass('border-danger')) {
      $('#EditEducationalInfoSelectMajor').removeClass('border-danger')
    }

    if ($('#errEditEducationalInfoSelectDepartment').hasClass('d-block')) {
      $('#errEditEducationalInfoSelectDepartment').removeClass('d-block');
      $('#errEditEducationalInfoSelectDepartment').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectCourse').hasClass('d-block')) {
      $('#errEditEducationalInfoSelectCourse').removeClass('d-block');
      $('#errEditEducationalInfoSelectCourse').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectMajor').hasClass('d-block')) {
      $('#errEditEducationalInfoSelectMajor').removeClass('d-block');
      $('#errEditEducationalInfoSelectMajor').addClass('d-none');
    }

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
  });

  // edit social media
  $("#EditBtnSocialMedia").click(function () {
    $("#EditSocialMediaFBLink").attr('readonly', false);
    $("#EditSocialMediaTWLink").attr('readonly', false);
    $("#EditSocialMediaIGLink").attr('readonly', false);
    $("#EditSocialMediaYTLink").attr('readonly', false);

    $("#EditSocialMediaFB").attr('readonly', false);
    $("#EditSocialMediaTW").attr('readonly', false);
    $("#EditSocialMediaIG").attr('readonly', false);
    $("#EditSocialMediaYT").attr('readonly', false);

    $("#EditBtnSocialMedia").addClass('d-none');
    $("#EditBtnSocialMedia").removeClass('d-block');

    $("#EditCancelBtnSocialMedia").removeClass('d-none');
    $("#EditCancelBtnSocialMedia").addClass('d-block');

    $("#EditSocialMedia").removeClass('d-none');
    $("#EditSocialMedia").addClass('d-block');
  });

  // cancel edit social media
  $("#EditCancelBtnSocialMedia").click(function () {
    var fbl = $('#FbLink').val();
    var fbn = $('#FbName').val();
    var igl = $('#IgLink').val();
    var ign = $('#IgName').val();
    var twl = $('#TwLink').val();
    var twn = $('#TwName').val();
    var ytl = $('#YtLink').val();
    var ytn = $('#YtName').val();

    $("#EditSocialMediaFBLink").val(fbl);
    $("#EditSocialMediaTWLink").val(twl);
    $("#EditSocialMediaIGLink").val(igl);
    $("#EditSocialMediaYTLink").val(ytl);

    $("#EditSocialMediaFB").val(fbn);
    $("#EditSocialMediaTW").val(twn);
    $("#EditSocialMediaIG").val(ign);
    $("#EditSocialMediaYT").val(ytn);

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
  });

  // edit loadslip
  $('#EditBtnLoadslip').click(function () {
    $('#EditLoadSlipSelectSchoolyear').attr('disabled', false);
    $('#EditLoadSlipSelectSemester').attr('disabled', false);
    $('#EditLoadSlip').attr('disabled', false);

    $("#EditBtnLoadslip").addClass('d-none');
    $("#EditBtnLoadslip").removeClass('d-block');

    $("#EditCancelBtnLoadslip").removeClass('d-none');
    $("#EditCancelBtnLoadslip").addClass('d-block');

    $("#EditLoadslip").removeClass('d-none');
    $("#EditLoadslip").addClass('d-block');

    $("#LoadSlipInput").removeClass('d-none');
    $("#LoadSlipInput").addClass('d-block');
  });

  // cancel edit loadslip
  $('#EditCancelBtnLoadslip').click(function () {
    var schoolyearid = $("#SchoolyearID").val();
    var schoolyearname = $("#SchoolyearName").val();
    var selectedschoolyear = '<option value="' + schoolyearid + '" selected hidden>' + schoolyearname + '</option>';
    $("#EditLoadSlipSelectSchoolyear").html('');
    $("#EditLoadSlipSelectSchoolyear").append(selectedschoolyear);
    FetchSchoolyear();

    var semesterid = $("#SemesterID").val();
    var semestername = $("#SemesterName").val();
    var selectedsemester = '<option value="' + semesterid + '" selected hidden>' + semestername + '</option>';
    $("#EditLoadSlipSelectSemester").html('');
    $("#EditLoadSlipSelectSemester").append(selectedsemester);
    FetchSemester();

    var loadslip = $('#ThisLoadSlip').val();
    $('#EditLoadSlipPreview').attr('src', loadslip);
    $('#EditLoadSlip').val('');


    if ($('#alertEditLoadSlipError').hasClass('d-block')) {
      $('#alertEditLoadSlipError').removeClass('d-block');
      $('#alertEditLoadSlipError').addClass('d-none');
    }

    if ($('#EditLoadSlipSelectSchoolyear').hasClass('border-danger')) {
      $('#EditLoadSlipSelectSchoolyear').removeClass('border-danger')
    }

    if ($('#EditLoadSlipSelectSemester').hasClass('border-danger')) {
      $('#EditLoadSlipSelectSemester').removeClass('border-danger')
    }

    if ($('#EditLoadSlip').hasClass('border-danger')) {
      $('#EditLoadSlip').removeClass('border-danger')
    }

    if ($('#errEditLoadSlipSelectSchoolyear').hasClass('d-block')) {
      $('#errEditLoadSlipSelectSchoolyear').removeClass('d-block');
      $('#errEditLoadSlipSelectSchoolyear').addClass('d-none');
    }

    if ($('#errEditLoadSlipSelectSemester').hasClass('d-block')) {
      $('#errEditLoadSlipSelectSemester').removeClass('d-block');
      $('#errEditLoadSlipSelectSemester').addClass('d-none');
    }

    if ($('#errEditLoadSlip').hasClass('d-block')) {
      $('#errEditLoadSlip').removeClass('d-block');
      $('#errEditLoadSlip').addClass('d-none');
    }

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
  });
});

/** CREATE ANNOUNCEMENT  **/
$(document).ready(function () {
  $("#addAnnouncement").click(function () {
    if ($('#AnnouncementDiv').hasClass('d-block')) {
      $('#AnnouncementDiv').removeClass('d-block');
      $('#AnnouncementDiv').addClass('d-none');

      $('#NewAnnouncement').removeClass('d-none');
      $('#NewAnnouncement').addClass('d-block');
    }
  });

  $("#NewAnnouncementBtnOne").click(function () {
    if ($('#AnnouncementDiv').hasClass('d-none')) {
      $('#AnnouncementDiv').removeClass('d-none');
      $('#AnnouncementDiv').addClass('d-block');

      $('#NewAnnouncement').removeClass('d-block');
      $('#NewAnnouncement').addClass('d-none');
    }
  });

  $("#NewAnnouncementBtnTwo").click(function () {
    if ($('#AnnouncementDiv').hasClass('d-none')) {
      $('#AnnouncementDiv').removeClass('d-none');
      $('#AnnouncementDiv').addClass('d-block');

      $('#NewAnnouncement').removeClass('d-block');
      $('#NewAnnouncement').addClass('d-none');
    }
  });
});