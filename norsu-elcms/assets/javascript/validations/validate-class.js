function fetchThisSubjectModules(teacher, subject) {
    const nomodule = "<option value='' hidden>You have no published module for this subject.</option>";
    console.log(teacher, subject);
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/query/fetchAjax.php',
        data: {
            subject: subject,
            teacher: teacher,
            fetchThisSubjectModules: 'fetchThisSubjectModules'
        },
        success: function (data) {
            console.log(data);
            if (data == nomodule) {
                $("#CreateClassModule").attr("disabled", true);
                $("#CreateClassModule").html('');
                $("#CreateClassModule").append(data);
            } else {
                if (data != nomodule) {
                    $("#CreateClassModule").attr("disabled", false);
                    $("#CreateClassModule").html('');
                    $("#CreateClassModule").append(data);
                }
            }
        }
    });
}

function fetchTeacherClasses() {
    $.ajax({
        method: 'post',
        url: baseUrl + '/app/controllers/crud/crudClass.php',
        data: {
            fetchTeacherClasses: 'fetchTeacherClasses'
        },
        success: function (data) {
            // console.log(data);
            if (data == nomodule) {
                $("#CreateClassModule").attr("disabled", true);
                $("#CreateClassModule").html('');
                $("#CreateClassModule").append(data);
            } else {
                if (data != nomodule) {
                    $("#CreateClassModule").attr("disabled", false);
                    $("#CreateClassModule").html('');
                    $("#CreateClassModule").append(data);
                }
            }
        }
    });
}

$(document).ready(function () {
    const teacher = $('#CreateClassTeacher').val();
    $('#CreateClassSubjectCode').selectize({
        onInitialize: function () {
            this.trigger('change', this.getValue(), true);
        },
        onChange: function (value, isOnInitialize) {
            if (value !== '') {
                $("#CreateClassSubjectTitle").val(value).change();
                $("#CreateClassSubjectTitle").removeClass('text-muted');

                fetchThisSubjectModules(teacher, value);
            }
        }
    });


    // create class
    $('#CreateClass').click(function (e) {
        e.preventDefault();
        const CreateClassSubject = $('#CreateClassSubjectCode').val();
        const CreateClassSchoolyear = $('#CreateClassSchoolyear').val();
        const CreateClassSemester = $('#CreateClassSemester').val();
        const CreateClassDay = $('#CreateClassDay').val();
        const CreateClassTime = $('#CreateClassTime').val();
        const CreateClassSection = $('#CreateClassSection').val();
        const CreateClassModule = $('#CreateClassModule').val();

        console.log(CreateClassSubject);

        var errCreateClassAll = "";
        var errCreateClassSubject = "";
        var errCreateClassSchoolyear = "";
        var errCreateClassSemester = "";
        var errCreateClassTime = "";
        var errCreateClassSection = "";
        var errCreateClassModule = "";

        if (CreateClassSubject == '' && CreateClassSchoolyear == '' && CreateClassSemester == '' &&
            CreateClassDay == '' && CreateClassTime == '' && CreateClassSection == '' && CreateClassModule == '') {
            errCreateClassAll = '<li> All Fields is empty! </li>';
            $("#errCreateClassAll").removeClass("d-none");
            $("#errCreateClassAll").addClass("d-block");
            $("#errCreateClassAll").html(errCreateClassAll);

            $('#CreateClassSubjectTitle').addClass('border-danger');
            $('#CreateClassSchoolyear').addClass('border-danger');
            $('#CreateClassSemester').addClass('border-danger');
            $('#CreateClassDay').addClass('border-danger');
            $('#CreateClassTime').addClass('border-danger');
            $('#CreateClassSection').addClass('border-danger');
            $('#CreateClassModule').addClass('border-danger');

        } else {
            errCreateClassAll = '';
            $("#errCreateClassAll").addClass("d-none");
            $("#errCreateClassAll").removeClass("d-block");
            $("#errCreateClassAll").html(errCreateClassAll);

            $('#CreateClassSubjectTitle').removeClass('border-danger');
            $('#CreateClassSchoolyear').removeClass('border-danger');
            $('#CreateClassSemester').removeClass('border-danger');
            $('#CreateClassDay').removeClass('border-danger');
            $('#CreateClassTime').removeClass('border-danger');
            $('#CreateClassSection').removeClass('border-danger');
            $('#CreateClassModule').removeClass('border-danger');

            if (CreateClassSubject == '') {
                errCreateClassSubject = '<li> Please Select a Subject! </li>';
                $("#errCreateClassSubject").removeClass("d-none");
                $("#errCreateClassSubject").addClass("d-block");
                $("#errCreateClassSubject").html(errCreateClassSubject);
                $('#CreateClassSubjectTitle').addClass('border-danger');

            } else if (CreateClassSubject != '') {
                errCreateClassSubject = '';
                $("#errCreateClassSubject").addClass("d-none");
                $("#errCreateClassSubject").removeClass("d-block");
                $("#errCreateClassSubject").html(errCreateClassSubject);
                $('#CreateClassSubjectTitle').removeClass('border-danger');
            }

            if (CreateClassSchoolyear == '') {
                errCreateClassSchoolyear = '<li> Please select a school year! </li>';
                $("#errCreateClassSchoolyear").removeClass("d-none");
                $("#errCreateClassSchoolyear").addClass("d-block");
                $("#errCreateClassSchoolyear").html(errCreateClassSchoolyear);
                $('#CreateClassSchoolyear').addClass('border-danger');
            } else {
                errCreateClassSchoolyear = '';
                $("#errCreateClassSchoolyear").addClass("d-none");
                $("#errCreateClassSchoolyear").removeClass("d-block");
                $("#errCreateClassSchoolyear").html(errCreateClassSchoolyear);
                $('#CreateClassSchoolyear').removeClass('border-danger');
            }

            if (CreateClassSemester == '') {
                errCreateClassSemester = '<li> Please select a semester! </li>';
                $("#errCreateClassSemester").removeClass("d-none");
                $("#errCreateClassSemester").addClass("d-block");
                $("#errCreateClassSemester").html(errCreateClassSemester);
                $('#CreateClassSemester').addClass('border-danger');
            } else {
                errCreateClassSemester = '';
                $("#errCreateClassSemester").addClass("d-none");
                $("#errCreateClassSemester").removeClass("d-block");
                $("#errCreateClassSemester").html(errCreateClassSemester);
                $('#CreateClassSemester').removeClass('border-danger');
            }

            if (CreateClassDay == '') {
                errCreateClassDay = '<li> Please enter class day! </li>';
                $("#errCreateClassDay").removeClass("d-none");
                $("#errCreateClassDay").addClass("d-block");
                $("#errCreateClassDay").html(errCreateClassDay);
                $('#CreateClassDay').addClass('border-danger');
            } else {
                errCreateClassDay = '';
                $("#errCreateClassDay").addClass("d-none");
                $("#errCreateClassDay").removeClass("d-block");
                $("#errCreateClassDay").html(errCreateClassDay);
                $('#CreateClassDay').removeClass('border-danger');
            }

            if (CreateClassTime == '') {
                errCreateClassTime = '<li> Please enter class time! </li>';
                $("#errCreateClassTime").removeClass("d-none");
                $("#errCreateClassTime").addClass("d-block");
                $("#errCreateClassTime").html(errCreateClassTime);
                $('#CreateClassTime').addClass('border-danger');
            } else {
                errCreateClassTime = '';
                $("#errCreateClassTime").addClass("d-none");
                $("#errCreateClassTime").removeClass("d-block");
                $("#errCreateClassTime").html(errCreateClassTime);
                $('#CreateClassTime').removeClass('border-danger');
            }

            if (CreateClassSection == '') {
                errCreateClassSection = '<li> Please enter class section! </li>';
                $("#errCreateClassSection").removeClass("d-none");
                $("#errCreateClassSection").addClass("d-block");
                $("#errCreateClassSection").html(errCreateClassSection);
                $('#CreateClassSection').addClass('border-danger');
            } else {
                errCreateClassSection = '';
                $("#errCreateClassSection").addClass("d-none");
                $("#errCreateClassSection").removeClass("d-block");
                $("#errCreateClassSection").html(errCreateClassSection);
                $('#CreateClassSection').removeClass('border-danger');
            }

            if (CreateClassModule == '') {
                errCreateClassModule = '<li> Please select a module for this class! </li>';
                $("#errCreateClassModule").removeClass("d-none");
                $("#errCreateClassModule").addClass("d-block");
                $("#errCreateClassModule").html(errCreateClassModule);
                $('#CreateClassModule').addClass('border-danger');
            } else {
                errCreateClassModule = '';
                $("#errCreateClassModule").addClass("d-none");
                $("#errCreateClassModule").removeClass("d-block");
                $("#errCreateClassModule").html(errCreateClassModule);
                $('#CreateClassModule').removeClass('border-danger');
            }
        }

        if (errCreateClassAll != '' ||
            errCreateClassSubject != '' || errCreateClassSchoolyear != '' || errCreateClassSemester != '' ||
            errCreateClassDay != '' || errCreateClassTime != '' || errCreateClassSection != '' || errCreateClassModule != '') {

            $("#alertCreateClassError").addClass("d-block");
            $("#alertCreateClassError").removeClass("d-none");
            return false;
        } else {
            $("#alertCreateClassError").removeClass("d-block");
            $("#alertCreateClassError").addClass("d-none");

            if (CreateClassSubject != '' && CreateClassSchoolyear != '' && CreateClassSemester != '' &&
                CreateClassDay != '' && CreateClassTime != '' && CreateClassSection != '' && CreateClassModule != '') {
                var formData = $('#CreateClassForm').serialize();
                //ajax
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudClass.php',
                    data: formData + '&CreateClass=CreateClass',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertCreateClassError").addClass("d-block");
                            $("#alertCreateClassError").removeClass("d-none");

                            $("#errCreateClassAll").removeClass("d-none");
                            $("#errCreateClassAll").addClass("d-block");
                            $("#errCreateClassAll").html(feedback.errAll);

                            setTimeout(function () {
                                $("#alertCreateClassError").removeClass("d-block");
                                $("#alertCreateClassError").addClass("d-none");
                                $("#errCreateClassAll").addClass("d-none");
                                $("#errCreateClassAll").removeClass("d-block");
                                $("#errCreateClassAll").html('');
                            }, 8000);
                            // console.log(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertCreateClassSuccess").removeClass("d-none");
                            $("#alertCreateClassSuccess").addClass("d-block");

                            $("#succMsgCreateClassAll").removeClass("d-none");
                            $("#succMsgCreateClassAll").addClass("d-block");
                            $("#succMsgCreateClassAll").html(feedback.message);
                            $("#CreateClassForm")[0].reset();

                            setTimeout(function () {
                                $("#alertCreateClassSuccess").removeClass('d-block');
                                $("#alertCreateClassSuccess").addClass('d-none');
                                $("#succMsgCreateClassAll").removeClass('d-block');
                                $("#succMsgCreateClassAll").addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonCreateClassOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonCreateClassTwo").click(function () {
                                location.reload()
                            });

                            $('#CreateClassModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // JOIN CLASS
    $('#JoinClass').click(function (e) {
        e.preventDefault();
        const JoinClassCode = $('#JoinClassCode').val();
        var errJoinClassAll = "";

        if (JoinClassCode == '') {
            errJoinClassAll = '<li> Please add the class code! </li>';
            $("#errJoinClassAll").removeClass("d-none");
            $("#errJoinClassAll").addClass("d-block");
            $("#errJoinClassAll").html(errJoinClassAll);
            $('#JoinClassCode').addClass('border-danger');

        } else if (JoinClassCode != '') {
            errJoinClassAll = '';
            $("#errJoinClassAll").addClass("d-none");
            $("#errJoinClassAll").removeClass("d-block");
            $("#errJoinClassAll").html(errJoinClassAll);
            $('#JoinClassCode').removeClass('border-danger');
        }

        if (errJoinClassAll != '') {
            $("#alertJoinClassError").addClass("d-block");
            $("#alertJoinClassError").removeClass("d-none");
            return false;
        } else {
            $("#alertJoinClassError").removeClass("d-block");
            $("#alertJoinClassError").addClass("d-none");

            if (JoinClassCode != '') {
                var formData = $('#JoinClassForm').serialize();
                //ajax
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudClass.php',
                    data: formData + '&JoinClass=JoinClass',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertJoinClassError").addClass("d-block");
                            $("#alertJoinClassError").removeClass("d-none");

                            $("#errJoinClassAll").removeClass("d-none");
                            $("#errJoinClassAll").addClass("d-block");
                            $("#errJoinClassAll").html(feedback.errAll);

                            setTimeout(function () {
                                $("#alertJoinClassError").removeClass("d-block");
                                $("#alertJoinClassError").addClass("d-none");
                                $("#errJoinClassAll").addClass("d-none");
                                $("#errJoinClassAll").removeClass("d-block");
                                $("#errJoinClassAll").html('');
                            }, 8000);
                            // console.log(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertJoinClassSuccess").removeClass("d-none");
                            $("#alertJoinClassSuccess").addClass("d-block");

                            $("#succMsgJoinClassAll").removeClass("d-none");
                            $("#succMsgJoinClassAll").addClass("d-block");
                            $("#succMsgJoinClassAll").html(feedback.message);
                            $("#JoinClassForm")[0].reset();

                            setTimeout(function () {
                                $("#alertJoinClassSuccess").removeClass('d-block');
                                $("#alertJoinClassSuccess").addClass('d-none');
                                $("#succMsgJoinClassAll").removeClass('d-block');
                                $("#succMsgJoinClassAll").addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonJoinClassOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonJoinClassTwo").click(function () {
                                location.reload()
                            });

                            $('#JoinClassModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // fetch delete data 
    $(document).on('click', '#GetDeleteClass', function (e) {
        e.preventDefault();
        var GetDeleteClassBtn = $(this).data('class');

        // console.log(GetDeleteClassBtn);
        $('#GetDeleteClassContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudClass.php',
            type: 'POST',
            data: 'GetDeleteClassBtn=' + GetDeleteClassBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#DeleteClassContentData').html('');
            $('#DeleteClassContentData').html(data);
        }).fail(function () {
            $('#DeleteClassContentData').html('<p>Error</p>');
        });
    });


    // DELETE class
    $(document).on('click', '#DeleteClass', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudClass.php',
            data: 'DeleteClassCode=' + $('#DeleteClassCode').val() + '&action=DeleteClass',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#AlertDeleteClass').removeClass('d-none');
                    $('#AlertDeleteClass').addClass('d-block');
                    $('#DeleteClassModalFooterOne').removeClass('d-block');
                    $('#DeleteClassModalFooterOne').addClass('d-none');
                    $('#WarningDeleteClass').addClass('d-none');
                    $('#WarningDeleteClass').removeClass('d-block');
                    $('#DeleteClassModalFooterTwo').removeClass('d-none');
                    $('#DeleteClassModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonDeleteClassOne").click(function () {
                        location.reload()
                    });

                    $("#ModalCloseButtonDeleteClassTwo").click(function () {
                        location.reload()
                    });

                    $('#DeleteClassModal').on('hidden.bs.modal', function () {
                        location.reload()
                    });
                }
            }
        });
    });


    // fetch edit data 
    $(document).on('click', '#GetEditClass', function (e) {
        e.preventDefault();
        var GetEditClassBtn = $(this).data('class');

        // console.log(GetEditClassBtn);
        $('#GetEditClassContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudClass.php',
            type: 'POST',
            data: 'GetEditClassBtn=' + GetEditClassBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditClassContentData').html('');
            $('#EditClassContentData').html(data);
        }).fail(function () {
            $('#EditClassContentData').html('<p>Error</p>');
        });
    });


    // create class
    $(document).on('click', '#EditClass', function (e) {
        e.preventDefault();
        const EditClassTeacher = $('#EditClassTeacher').val();
        const EditClassSubject = $('#EditClassSubjectCode').val();
        const EditClassSchoolyear = $('#EditClassSchoolyear').val();
        const EditClassSemester = $('#EditClassSemester').val();
        const EditClassDay = $('#EditClassDay').val();
        const EditClassTime = $('#EditClassTime').val();
        const EditClassSection = $('#EditClassSection').val();
        const EditClassModule = $('#EditClassModule').val();

        // console.log(EditClassSubject);

        var errEditClassAll = "";
        var errEditClassTeacher = "";
        var errEditClassSubject = "";
        var errEditClassSchoolyear = "";
        var errEditClassSemester = "";
        var errEditClassTime = "";
        var errEditClassSection = "";
        var errEditClassModule = "";

        if (EditClassTeacher == '' && EditClassSubject == '' && EditClassSchoolyear == '' && EditClassSemester == '' &&
            EditClassDay == '' && EditClassTime == '' && EditClassSection == '' && EditClassModule == '') {
            errEditClassAll = '<li> All Fields is empty! </li>';
            $("#errEditClassAll").removeClass("d-none");
            $("#errEditClassAll").addClass("d-block");
            $("#errEditClassAll").html(errEditClassAll);

            $('#EditClassTeacher').addClass('border-danger');
            $('#EditClassSubjectTitle').addClass('border-danger');
            $('#EditClassSchoolyear').addClass('border-danger');
            $('#EditClassSemester').addClass('border-danger');
            $('#EditClassDay').addClass('border-danger');
            $('#EditClassTime').addClass('border-danger');
            $('#EditClassSection').addClass('border-danger');
            $('#EditClassModule').addClass('border-danger');

        } else {
            errEditClassAll = '';
            $("#errEditClassAll").addClass("d-none");
            $("#errEditClassAll").removeClass("d-block");
            $("#errEditClassAll").html(errEditClassAll);

            $('#EditClassTeacher').removeClass('border-danger');
            $('#EditClassSubjectTitle').removeClass('border-danger');
            $('#EditClassSchoolyear').removeClass('border-danger');
            $('#EditClassSemester').removeClass('border-danger');
            $('#EditClassDay').removeClass('border-danger');
            $('#EditClassTime').removeClass('border-danger');
            $('#EditClassSection').removeClass('border-danger');
            $('#EditClassModule').removeClass('border-danger');

            if (EditClassTeacher == '') {
                errEditClassTeacher = '<li> Please enter the teacher id number. </li>';
                $("#errEditClassTeacher").removeClass("d-none");
                $("#errEditClassTeacher").addClass("d-block");
                $("#errEditClassTeacher").html(errEditClassTeacher);
                $('#EditClassTeacher').addClass('border-danger');

            } else if (EditClassTeacher != '') {
                errEditClassTeacher = '';
                $("#errEditClassTeacher").addClass("d-none");
                $("#errEditClassTeacher").removeClass("d-block");
                $("#errEditClassTeacher").html(errEditClassTeacher);
                $('#EditClassTeacher').removeClass('border-danger');
            }

            if (EditClassSubject == '') {
                errEditClassSubject = '<li> Please Select a Subject! </li>';
                $("#errEditClassSubject").removeClass("d-none");
                $("#errEditClassSubject").addClass("d-block");
                $("#errEditClassSubject").html(errEditClassSubject);
                $('#EditClassSubjectTitle').addClass('border-danger');

            } else if (EditClassSubject != '') {
                errEditClassSubject = '';
                $("#errEditClassSubject").addClass("d-none");
                $("#errEditClassSubject").removeClass("d-block");
                $("#errEditClassSubject").html(errEditClassSubject);
                $('#EditClassSubjectTitle').removeClass('border-danger');
            }

            if (EditClassSchoolyear == '') {
                errEditClassSchoolyear = '<li> Please select a school year! </li>';
                $("#errEditClassSchoolyear").removeClass("d-none");
                $("#errEditClassSchoolyear").addClass("d-block");
                $("#errEditClassSchoolyear").html(errEditClassSchoolyear);
                $('#EditClassSchoolyear').addClass('border-danger');
            } else {
                errEditClassSchoolyear = '';
                $("#errEditClassSchoolyear").addClass("d-none");
                $("#errEditClassSchoolyear").removeClass("d-block");
                $("#errEditClassSchoolyear").html(errEditClassSchoolyear);
                $('#EditClassSchoolyear').removeClass('border-danger');
            }

            if (EditClassSemester == '') {
                errEditClassSemester = '<li> Please select a semester! </li>';
                $("#errEditClassSemester").removeClass("d-none");
                $("#errEditClassSemester").addClass("d-block");
                $("#errEditClassSemester").html(errEditClassSemester);
                $('#EditClassSemester').addClass('border-danger');
            } else {
                errEditClassSemester = '';
                $("#errEditClassSemester").addClass("d-none");
                $("#errEditClassSemester").removeClass("d-block");
                $("#errEditClassSemester").html(errEditClassSemester);
                $('#EditClassSemester').removeClass('border-danger');
            }

            if (EditClassDay == '') {
                errEditClassDay = '<li> Please enter class day! </li>';
                $("#errEditClassDay").removeClass("d-none");
                $("#errEditClassDay").addClass("d-block");
                $("#errEditClassDay").html(errEditClassDay);
                $('#EditClassDay').addClass('border-danger');
            } else {
                errEditClassDay = '';
                $("#errEditClassDay").addClass("d-none");
                $("#errEditClassDay").removeClass("d-block");
                $("#errEditClassDay").html(errEditClassDay);
                $('#EditClassDay').removeClass('border-danger');
            }

            if (EditClassTime == '') {
                errEditClassTime = '<li> Please enter class time! </li>';
                $("#errEditClassTime").removeClass("d-none");
                $("#errEditClassTime").addClass("d-block");
                $("#errEditClassTime").html(errEditClassTime);
                $('#EditClassTime').addClass('border-danger');
            } else {
                errEditClassTime = '';
                $("#errEditClassTime").addClass("d-none");
                $("#errEditClassTime").removeClass("d-block");
                $("#errEditClassTime").html(errEditClassTime);
                $('#EditClassTime').removeClass('border-danger');
            }

            if (EditClassSection == '') {
                errEditClassSection = '<li> Please enter class section! </li>';
                $("#errEditClassSection").removeClass("d-none");
                $("#errEditClassSection").addClass("d-block");
                $("#errEditClassSection").html(errEditClassSection);
                $('#EditClassSection').addClass('border-danger');
            } else {
                errEditClassSection = '';
                $("#errEditClassSection").addClass("d-none");
                $("#errEditClassSection").removeClass("d-block");
                $("#errEditClassSection").html(errEditClassSection);
                $('#EditClassSection').removeClass('border-danger');
            }

            if (EditClassModule == '') {
                errEditClassModule = '<li> Please select a module for this class! </li>';
                $("#errEditClassModule").removeClass("d-none");
                $("#errEditClassModule").addClass("d-block");
                $("#errEditClassModule").html(errEditClassModule);
                $('#EditClassModule').addClass('border-danger');
            } else {
                errEditClassModule = '';
                $("#errEditClassModule").addClass("d-none");
                $("#errEditClassModule").removeClass("d-block");
                $("#errEditClassModule").html(errEditClassModule);
                $('#EditClassModule').removeClass('border-danger');
            }
        }

        if (errEditClassAll != '' || errEditClassTeacher != '' ||
            errEditClassSubject != '' || errEditClassSchoolyear != '' || errEditClassSemester != '' ||
            errEditClassDay != '' || errEditClassTime != '' || errEditClassSection != '' || errEditClassModule != '') {

            $("#alertEditClassError").addClass("d-block");
            $("#alertEditClassError").removeClass("d-none");
            return false;
        } else {
            $("#alertEditClassError").removeClass("d-block");
            $("#alertEditClassError").addClass("d-none");

            if (EditClassTeacher != '' && EditClassSubject != '' && EditClassSchoolyear != '' && EditClassSemester != '' &&
                EditClassDay != '' && EditClassTime != '' && EditClassSection != '' && EditClassModule != '') {
                var formData = $('#EditClassForm').serialize();
                //ajax
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudClass.php',
                    data: formData + '&EditClass=EditClass',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditClassError").addClass("d-block");
                            $("#alertEditClassError").removeClass("d-none");

                            $("#errEditClassAll").removeClass("d-none");
                            $("#errEditClassAll").addClass("d-block");
                            $("#errEditClassAll").html(feedback.errAll);

                            setTimeout(function () {
                                $("#alertEditClassError").removeClass("d-block");
                                $("#alertEditClassError").addClass("d-none");
                                $("#errEditClassAll").addClass("d-none");
                                $("#errEditClassAll").removeClass("d-block");
                                $("#errEditClassAll").html('');
                            }, 8000);
                            // console.log(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditClassSuccess").removeClass("d-none");
                            $("#alertEditClassSuccess").addClass("d-block");

                            $("#succMsgEditClassAll").removeClass("d-none");
                            $("#succMsgEditClassAll").addClass("d-block");
                            $("#succMsgEditClassAll").html(feedback.message);
                            // $("#EditClassForm")[0].reset();

                            setTimeout(function () {
                                $("#alertEditClassSuccess").removeClass('d-block');
                                $("#alertEditClassSuccess").addClass('d-none');
                                $("#succMsgEditClassAll").removeClass('d-block');
                                $("#succMsgEditClassAll").addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditClassOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonEditClassTwo").click(function () {
                                location.reload()
                            });

                            $('#EditClassModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

});