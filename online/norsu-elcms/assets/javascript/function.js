// const getUrl = window.location;
// const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
// const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];


// console.log(baseUrl);
// auto background changer
Bgchange($('.bg-change'));
setInterval(Bgchange, 10000);

function Bgchange() {
    var bg_url = baseUrl + '/assets/images/background/';
    let images = [
        bg_url + 'bg-1.jpg',
        bg_url + 'bg-2.jpg',
        bg_url + 'bg-3.jpg',
        bg_url + 'bg-4.jpg',
    ];
    // console.log(images);
    const body = $('.bg-change');
    const bg = images[Math.floor(Math.random() * images.length)];

    var value = "linear-gradient(to bottom, rgba(255, 243, 205, 0.20), rgba(207, 226, 255, 0.20)), url('" + bg + "')";
    body.css({
        "background-image": value,
    });
}

function AddMajorFetchCourses(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'AddMajorSelectCourses=' + id,
        success: function (data) {
            // console.log(id);
            $("#AddMajorSelectCourse").attr("disabled", false);
            $("#AddMajorSelectCourse").html(data);
        }
    });
}

function EditMajorFetchCourses(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditMajorSelectCourses=' + id,
        success: function (data) {
            // console.log(id);
            $("#EditMajorSelectCourse").html(data);
        }
    });
}

function AddSubjectFetchCourses(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'AddSubjectSelectCourses=' + id,
        success: function (data) {
            // console.log(id);
            $("#AddSubjectSelectCourse").attr("disabled", false);
            $("#AddSubjectSelectCourse").html(data);
        }
    });
}

function EditSubjectFetchCourses(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditSubjectSelectCourses=' + id,
        success: function (data) {
            // console.log(id);
            $("#EditSubjectSelectCourse").html(data);
        }
    });
}

function RegisterStudentFetchCourses(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'RegisterStudentSelectCourses=' + id,
        success: function (data) {
            console.log(id);
            $("#RegisterStudentSelectCourse").attr("disabled", false);
            $("#RegisterStudentSelectCourse").html(data);

            $("#RegisterStudentSelectMajor").attr("disabled", true);
            $("#RegisterStudentSelectMajor").html("<option hidden value=''>Select your Major</option>");
        }
    });
}

function RegisterStudentFetchMajors(id) {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'RegisterStudentSelectMajors=' + id,
        success: function (data) {
            console.log(id);
            $("#RegisterStudentSelectMajor").attr("disabled", false);
            $("#RegisterStudentSelectMajor").html(data);
        }
    });
}

function RegisterTeacherFetchDepartments(id) {
    console.log(id);
    const position_id = $('#RegisterTeacherSelectPosition').val();
    if (position_id == 5) {
        $("#RegisterTeacherSelectDepartment").attr("disabled", true);
    } else {
        if (position_id == 3 || position_id == 4) {
            $.ajax({
                method: 'post',
                url: baseUrl + '/app/controllers/query/fetchAjax.php',
                data: 'RegisterTeacherSelectDepartments=' + id,
                success: function (data) {
                    console.log(id);
                    $("#RegisterTeacherSelectDepartment").attr("disabled", false);
                    $("#RegisterTeacherSelectDepartment").html(data);
                }
            });
        }
    }
}

function RegisterTeacherDepartmentChange(id) {
    const college_id = $('#RegisterTeacherSelectCollege').val();
    if ((id == 3 || id == 4) && college_id != 0) {
        $("#RegisterTeacherSelectDepartment").attr("disabled", false);
        var data = "<option hidden value='0' selected>Select your Department</option>";
        $("#RegisterTeacherSelectDepartment").append(data);
    } else {
        if (id == 5 && college_id != 0) {
            var data = "<option hidden value='' selected>Select your Department</option>";
            $("#RegisterTeacherSelectDepartment").attr("disabled", true);
            $("#RegisterTeacherSelectDepartment").append(data);
        } else {
            var data = "<option hidden value=''>Select your Department</option>";
            $("#RegisterTeacherSelectDepartment").attr("disabled", true);
            $("#RegisterTeacherSelectDepartment").html(data);
        }
    }
}

// EDIT PROFILE
function FetchCollege() {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: {
            FetchCollege: 'FetchCollege'
        },
        success: function (data) {
            $("#EditEducationalInfoSelectCollege").append(data);
        }
    });
}

function FetchSchoolyear() {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: {
            FetchSchoolyear: 'FetchSchoolyear'
        },
        success: function (data) {
            $("#EditLoadSlipSelectSchoolyear").append(data);
        }
    });
}

function FetchSemester() {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: {
            FetchSemester: 'FetchSemester'
        },
        success: function (data) {
            $("#EditLoadSlipSelectSemester").append(data);
        }
    });
}

function OnloadEditEducationalInfoFetchDepartments(id) {
    var departmentid = $("#DepartmentID").val();
    var departmentname = $("#DepartmentName").val();
    var selecteddepartment = '<option value="' + departmentid + '" selected hidden>' + departmentname + '</option>';

    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectDepartments=' + id,
        success: function (data) {
            $("#EditEducationalInfoSelectDepartment").attr("disabled", false);
            $("#EditEducationalInfoSelectDepartment").html('');
            $("#EditEducationalInfoSelectDepartment").append(selecteddepartment);
            $("#EditEducationalInfoSelectDepartment").append(data);
        }
    });
}

function OnloadEditEducationalInfoFetchCourses(id) {
    var courseid = $("#CourseID").val();
    var coursename = $("#CourseName").val();
    var selectedcourse = '<option value="' + courseid + '" selected hidden>' + coursename + '</option>';
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectCourse=' + id,
        success: function (data) {
            $("#EditEducationalInfoSelectCourse").attr("disabled", false);
            $("#EditEducationalInfoSelectCourse").html('');
            $("#EditEducationalInfoSelectCourse").append(selectedcourse);
            $("#EditEducationalInfoSelectCourse").append(data);
        }
    });
}

function OnloadEditEducationalInfoFetchMajors(id) {
    var majorid = $("#MajorID").val();
    var majorname = $("#MajorName").val();
    var selectedmajor = '<option value="' + majorid + '" selected hidden>' + majorname + '</option>';
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectMajors=' + id,
        success: function (data) {
            $("#EditEducationalInfoSelectMajor").attr("disabled", false);
            $("#EditEducationalInfoSelectMajor").html('');
            $("#EditEducationalInfoSelectMajor").append(selectedmajor);
            $("#EditEducationalInfoSelectMajor").append(data);
        }
    });
}

function OnchangeEditEducationalInfoFetchDepartments(id) {
    if ($('#EditEducationalInfoSelectDepartment').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectDepartment').removeClass('border-danger')
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
        $('#alertEditEducationalInfoError').removeClass('d-block');
        $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectDepartment').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectDepartment').removeClass('d-block');
        $('#errEditEducationalInfoSelectDepartment').addClass('d-none');
    }

    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectDepartments=' + id,
        success: function (data) {
            console.log(id);
            $("#EditEducationalInfoSelectDepartment").attr("disabled", false);
            $("#EditEducationalInfoSelectDepartment").html(data);
        }
    });
}

function OnchangeEditEducationalInfoFetchCourses(id) {
    if ($('#EditEducationalInfoSelectCourse').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectCourse').removeClass('border-danger')
    }

    if ($('#EditEducationalInfoSelectMajor').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectMajor').removeClass('border-danger')
    }

    if ($('#EditEduMajors').hasClass('d-block')) {
        $('#EditEduMajors').removeClass('d-block');
        $('#EditEduMajors').addClass('d-none');
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
        $('#alertEditEducationalInfoError').removeClass('d-block');
        $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectCourse').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectCourse').removeClass('d-block');
        $('#errEditEducationalInfoSelectCourse').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectMajor').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectMajor').removeClass('d-block');
        $('#errEditEducationalInfoSelectMajor').addClass('d-none');
    }

    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectCourse=' + id,
        success: function (data) {
            $("#EditEducationalInfoSelectCourse").attr("disabled", false);
            $("#EditEducationalInfoSelectCourse").html('');
            // $("#EditEducationalInfoSelectCourse").append(selected);
            $("#EditEducationalInfoSelectCourse").append(data);

            $("#EditEducationalInfoSelectMajor").attr("disabled", true);
            $("#EditEducationalInfoSelectMajor").html("<option hidden value=''>Select your Major</option>");
        }
    });

}

function OnchangeEditEducationalInfoFetchMajors(id) {
    if ($('#EditEducationalInfoSelectCourse').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectCourse').removeClass('border-danger')
    }

    if ($('#EditEducationalInfoSelectMajor').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectMajor').removeClass('border-danger')
    }

    if ($('#EditEduMajors').hasClass('d-block')) {
        $('#EditEduMajors').removeClass('d-block');
        $('#EditEduMajors').addClass('d-none');
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
        $('#alertEditEducationalInfoError').removeClass('d-block');
        $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectMajor').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectMajor').removeClass('d-block');
        $('#errEditEducationalInfoSelectMajor').addClass('d-none');
    }

    $("#EditEducationalInfoSelectMajor").html('');
    $("#EditEducationalInfoSelectMajor").append(response1);

    var response1 = "<option value='' selected>No Major</option>";
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: 'EditEducationalInfoSelectMajors=' + id,
        datatype: 'JSON',
        success: function (response) {
            // console.log(id);
            if (response === response1) {
                if ($("#EditEduMajors").hasClass('d-block')) {
                    $("#EditEduMajors").addClass('d-none');
                    $("#EditEduMajors").removeClass('d-block');
                } else if ($("#EditEduMajors").hasClass('d-none')) {

                }

            } else if (response != response1) {
                if ($("#EditEduMajors").hasClass('d-block')) {

                } else if ($("#EditEduMajors").hasClass('d-none')) {
                    $("#EditEduMajors").removeClass('d-none');
                    $("#EditEduMajors").addClass('d-block');
                }

                $("#EditEducationalInfoSelectMajor").attr("disabled", false);
                $("#EditEducationalInfoSelectMajor").html('');
                $("#EditEducationalInfoSelectMajor").html(response);

            }
        }
    });
}

function OnchangeDepartments() {
    if ($('#EditEducationalInfoSelectDepartment').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectDepartment').removeClass('border-danger')
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
        $('#alertEditEducationalInfoError').removeClass('d-block');
        $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectDepartment').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectDepartment').removeClass('d-block');
        $('#errEditEducationalInfoSelectDepartment').addClass('d-none');
    }
}

function OnchangeMajors() {
    if ($('#EditEducationalInfoSelectMajor').hasClass('border-danger')) {
        $('#EditEducationalInfoSelectMajor').removeClass('border-danger')
    }

    if ($('#alertEditEducationalInfoError').hasClass('d-block')) {
        $('#alertEditEducationalInfoError').removeClass('d-block');
        $('#alertEditEducationalInfoError').addClass('d-none');
    }

    if ($('#errEditEducationalInfoSelectMajor').hasClass('d-block')) {
        $('#errEditEducationalInfoSelectMajor').removeClass('d-block');
        $('#errEditEducationalInfoSelectMajor').addClass('d-none');
    }
}

function OnChangeEditEduCollege(id) {
    var atype = $("#Atype").val();
    // console.log(atype, id);

    if (atype == '2') {
        OnchangeEditEducationalInfoFetchCourses(id);
    }

    if (atype == '3' || atype == '4') {
        OnchangeEditEducationalInfoFetchDepartments(id);
    }

    if (atype == '5') {

    }
}


function getLoadSlipPreview(event) {
    var image = URL.createObjectURL(event.target.files[0]);
    $('#EditLoadSlipPreview').attr('src', image);
}

// END OF EDIT PROFILE