/** MANAGE VALIDATION */
$(document).ready(function () {
    // ADD COLLEGE
    $("#AddCollege").click(function (e) {
        e.preventDefault();
        const AddCollegeName = $('#AddCollegeName').val();
        const AddCollegeAcronym = $('#AddCollegeAcronym').val();
        var errAddCollegeAll = '';
        var errAddCollegeName = '';
        var errAddCollegeAcronym = '';

        if (AddCollegeName.length == '' && AddCollegeAcronym.length == '') {
            errAddCollegeAll = '<li> All Fields is empty! </li>';
            $("#errAddCollegeAll").removeClass("d-none");
            $("#errAddCollegeAll").addClass("d-block");
            $("#errAddCollegeAll").html(errAddCollegeAll);

        } else {
            errAddCollegeAll = '';
            $("#errAddCollegeAll").addClass("d-none");
            $("#errAddCollegeAll").removeClass("d-block");
            $("#errAddCollegeAll").html(errAddCollegeAll);

            if (AddCollegeName.length == '') {
                errAddCollegeName = '<li> College name is required! </li>';
                $("#errAddCollegeName").removeClass("d-none");
                $("#errAddCollegeName").addClass("d-block");
                $("#errAddCollegeName").html(errAddCollegeName);
            } else {
                errAddCollegeName = '';
                $("#errAddCollegeName").addClass("d-none");
                $("#errAddCollegeName").removeClass("d-block");
                $("#errAddCollegeName").html(errAddCollegeName);
            }

            if (AddCollegeAcronym.length == '') {
                errAddCollegeAcronym = '<li> College acronym is required! </li>';
                $("#errAddCollegeAcronym").removeClass("d-none");
                $("#errAddCollegeAcronym").addClass("d-block");
                $("#errAddCollegeAcronym").html(errAddCollegeAcronym);
            } else {
                errAddCollegeAcronym = '';
                $("#errAddCollegeAcronym").addClass("d-none");
                $("#errAddCollegeAcronym").removeClass("d-block");
                $("#errAddCollegeAcronym").html(errAddCollegeAcronym);
            }
        }

        if (errAddCollegeAll != '' || errAddCollegeName != '' || errAddCollegeAcronym != '') {
            $("#alertAddCollegeError").addClass("d-block");
            $("#alertAddCollegeError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddCollegeError").removeClass("d-block");
            $("#alertAddCollegeError").addClass("d-none");

            if (AddCollegeName != '' && AddCollegeAcronym != '') {

                //ajax
                var formData = $('#AddCollegeForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudCollege.php',
                    data: formData + '&action=AddCollege',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddCollegeError").addClass("d-block");
                            $("#alertAddCollegeError").removeClass("d-none");

                            $("#errAddCollegeAll").removeClass("d-none");
                            $("#errAddCollegeAll").addClass("d-block");
                            $("#errAddCollegeAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertAddCollegeSuccess").removeClass("d-none");
                            $("#alertAddCollegeSuccess").addClass("d-block");

                            $("#succMsgAddCollegeAll").removeClass("d-none");
                            $("#succMsgAddCollegeAll").addClass("d-block");
                            $("#succMsgAddCollegeAll").html(feedback.message);
                            $("#AddCollegeForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertAddCollegeSuccess");
                                let alertLi = $("#succMsgAddCollegeAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonAddCollegeOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddCollegeTwo").click(function () {
                                location.reload()
                            });

                            $('#AddCollegeModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE COLLEGE
    $(document).on('click', '#GetEditCollege', function (e) {
        e.preventDefault();
        var GetEditCollegeBtn = $(this).data('id');
        //alert(per_id);
        $('#GetEditCollegeContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudCollege.php',
            type: 'POST',
            data: 'GetEditCollegeBtn=' + GetEditCollegeBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditCollegeContentData').html('');
            $('#EditCollegeContentData').html(data);
        }).fail(function () {
            $('#EditCollegeContentData').html('<p>Error</p>');
        });
    });

    // EDIT COLLEGE
    $(document).on('click', '#EditCollege', function (e) {
        e.preventDefault();
        const EditCollegeName = $('#EditCollegeName').val();
        const EditCollegeAcronym = $('#EditCollegeAcronym').val();
        var errEditCollegeAll = '';
        var errEditCollegeName = '';
        var errEditCollegeAcronym = '';

        if (EditCollegeName.length == '' && EditCollegeAcronym.length == '') {
            errEditCollegeAll = '<li> All Fields is empty! </li>';
            $("#errEditCollegeAll").removeClass("d-none");
            $("#errEditCollegeAll").addClass("d-block");
            $("#errEditCollegeAll").html(errEditCollegeAll);

        } else {
            errEditCollegeAll = '';
            $("#errEditCollegeAll").addClass("d-none");
            $("#errEditCollegeAll").removeClass("d-block");
            $("#errEditCollegeAll").html(errEditCollegeAll);

            if (EditCollegeName.length == '') {
                errEditCollegeName = '<li> College name is required! </li>';
                $("#errEditCollegeName").removeClass("d-none");
                $("#errEditCollegeName").addClass("d-block");
                $("#errEditCollegeName").html(errEditCollegeName);
            } else {
                errEditCollegeName = '';
                $("#errEditCollegeName").addClass("d-none");
                $("#errEditCollegeName").removeClass("d-block");
                $("#errEditCollegeName").html(errEditCollegeName);
            }

            if (EditCollegeAcronym.length == '') {
                errEditCollegeAcronym = '<li> College acronym is required! </li>';
                $("#errEditCollegeAcronym").removeClass("d-none");
                $("#errEditCollegeAcronym").addClass("d-block");
                $("#errEditCollegeAcronym").html(errEditCollegeAcronym);
            } else {
                errEditCollegeAcronym = '';
                $("#errEditCollegeAcronym").addClass("d-none");
                $("#errEditCollegeAcronym").removeClass("d-block");
                $("#errEditCollegeAcronym").html(errEditCollegeAcronym);
            }
        }

        if (errEditCollegeAll != '' || errEditCollegeName != '' || errEditCollegeAcronym != '') {
            $("#alertEditCollegeError").addClass("d-block");
            $("#alertEditCollegeError").removeClass("d-none");
            return false;
        } else {
            $("#alertEditCollegeError").removeClass("d-block");
            $("#alertEditCollegeError").addClass("d-none");

            if (EditCollegeName != '' && EditCollegeAcronym != '') {

                //ajax
                var formData = $('#EditCollegeForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudCollege.php',
                    data: formData + '&action=EditCollege',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditCollegeError").addClass("d-block");
                            $("#alertEditCollegeError").removeClass("d-none");

                            $("#errEditCollegeAll").removeClass("d-none");
                            $("#errEditCollegeAll").addClass("d-block");
                            $("#errEditCollegeAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditCollegeSuccess").removeClass("d-none");
                            $("#alertEditCollegeSuccess").addClass("d-block");

                            $("#succMsgEditCollegeAll").removeClass("d-none");
                            $("#succMsgEditCollegeAll").addClass("d-block");
                            $("#succMsgEditCollegeAll").html(feedback.message);
                            // $("#EditCollegeForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertEditCollegeSuccess");
                                let alertLi = $("#succMsgEditCollegeAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditCollegeOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonEditCollegeTwo").click(function () {
                                location.reload()
                            });

                            $('#EditCollegeModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // ADD Course
    $("#AddCourse").click(function (e) {
        e.preventDefault();
        const AddCourseSelectCollege = $('#AddCourseSelectCollege').val();
        const AddCourseName = $('#AddCourseName').val();
        const AddCourseAcronym = $('#AddCourseAcronym').val();
        var errAddCourseSelectCollege = '';
        var errAddCourseAll = '';
        var errAddCourseName = '';
        var errAddCourseAcronym = '';

        // console.log(AddCourseSelectCollege);

        if (AddCourseName.length == '' && AddCourseAcronym.length == '' && AddCourseSelectCollege == '0') {
            errAddCourseAll = '<li> All Fields is empty! </li>';
            $("#errAddCourseAll").removeClass("d-none");
            $("#errAddCourseAll").addClass("d-block");
            $("#errAddCourseAll").html(errAddCourseAll);

        } else {
            errAddCourseAll = '';
            $("#errAddCourseAll").addClass("d-none");
            $("#errAddCourseAll").removeClass("d-block");
            $("#errAddCourseAll").html(errAddCourseAll);

            if (AddCourseSelectCollege == '0') {
                errAddCourseSelectCollege = '<li> Please Select a College! </li>';
                $("#errAddCourseSelectCollege").removeClass("d-none");
                $("#errAddCourseSelectCollege").addClass("d-block");
                $("#errAddCourseSelectCollege").html(errAddCourseSelectCollege);
            } else if (AddCourseSelectCollege != '0') {
                errAddCourseSelectCollege = '';
                $("#errAddCourseSelectCollege").addClass("d-none");
                $("#errAddCourseSelectCollege").removeClass("d-block");
                $("#errAddCourseSelectCollege").html(errAddCourseSelectCollege);
            }

            if (AddCourseName.length == '') {
                errAddCourseName = '<li> Course name is required! </li>';
                $("#errAddCourseName").removeClass("d-none");
                $("#errAddCourseName").addClass("d-block");
                $("#errAddCourseName").html(errAddCourseName);
            } else {
                errAddCourseName = '';
                $("#errAddCourseName").addClass("d-none");
                $("#errAddCourseName").removeClass("d-block");
                $("#errAddCourseName").html(errAddCourseName);
            }

            if (AddCourseAcronym.length == '') {
                errAddCourseAcronym = '<li> Course acronym is required! </li>';
                $("#errAddCourseAcronym").removeClass("d-none");
                $("#errAddCourseAcronym").addClass("d-block");
                $("#errAddCourseAcronym").html(errAddCourseAcronym);
            } else {
                errAddCourseAcronym = '';
                $("#errAddCourseAcronym").addClass("d-none");
                $("#errAddCourseAcronym").removeClass("d-block");
                $("#errAddCourseAcronym").html(errAddCourseAcronym);
            }
        }

        if (errAddCourseAll != '' || errAddCourseSelectCollege != '' || errAddCourseName != '' || errAddCourseAcronym != '') {
            $("#alertAddCourseError").addClass("d-block");
            $("#alertAddCourseError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddCourseError").removeClass("d-block");
            $("#alertAddCourseError").addClass("d-none");

            if (AddCourseSelectCollege != '0' && AddCourseName != '' && AddCourseAcronym != '') {
                //ajax
                console.log(AddCourseSelectCollege);
                var formData = $('#AddCourseForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudCourse.php',
                    data: formData + '&action=AddCourse',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddCourseError").addClass("d-block");
                            $("#alertAddCourseError").removeClass("d-none");

                            $("#errAddCourseAll").removeClass("d-none");
                            $("#errAddCourseAll").addClass("d-block");
                            $("#errAddCourseAll").html(feedback.errAll);
                            // console.log(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertAddCourseSuccess").removeClass("d-none");
                            $("#alertAddCourseSuccess").addClass("d-block");

                            $("#succMsgAddCourseAll").removeClass("d-none");
                            $("#succMsgAddCourseAll").addClass("d-block");
                            $("#succMsgAddCourseAll").html(feedback.message);
                            $("#AddCourseForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertAddCourseSuccess");
                                let alertLi = $("#succMsgAddCourseAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonAddCourseOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddCourseTwo").click(function () {
                                location.reload()
                            });

                            $('#AddCourseModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE Course
    $(document).on('click', '#GetEditCourse', function (e) {
        e.preventDefault();
        var GetEditCourseBtn = $(this).data('id');
        //alert(per_id);
        $('#GetEditCourseContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudCourse.php',
            type: 'POST',
            data: 'GetEditCourseBtn=' + GetEditCourseBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditCourseContentData').html('');
            $('#EditCourseContentData').html(data);
        }).fail(function () {
            $('#EditCourseContentData').html('<p>Error</p>');
        });
    });

    // EDIT Course
    $(document).on('click', '#EditCourse', function (e) {
        e.preventDefault();
        const EditCourseSelectCollege = $('#EditCourseSelectCollege').val();
        const EditCourseName = $('#EditCourseName').val();
        const EditCourseAcronym = $('#EditCourseAcronym').val();
        var errEditCourseAll = '';
        var errEditCourseSelectCollege = '';
        var errEditCourseName = '';
        var errEditCourseAcronym = '';

        if (EditCourseName.length == '' && EditCourseAcronym.length == '' && EditCourseSelectCollege == '0') {
            errEditCourseAll = '<li> All Fields is empty! </li>';
            $("#errEditCourseAll").removeClass("d-none");
            $("#errEditCourseAll").addClass("d-block");
            $("#errEditCourseAll").html(errEditCourseAll);

        } else {
            errEditCourseAll = '';
            $("#errEditCourseAll").addClass("d-none");
            $("#errEditCourseAll").removeClass("d-block");
            $("#errEditCourseAll").html(errEditCourseAll);

            if (EditCourseSelectCollege == '0') {
                errEditCourseSelectCollege = '<li> Please Select a College! </li>';
                $("#errEditCourseSelectCollege").removeClass("d-none");
                $("#errEditCourseSelectCollege").addClass("d-block");
                $("#errEditCourseSelectCollege").html(errEditCourseSelectCollege);
            } else if (EditCourseSelectCollege != '0') {
                errEditCourseSelectCollege = '';
                $("#errEditCourseSelectCollege").addClass("d-none");
                $("#errEditCourseSelectCollege").removeClass("d-block");
                $("#errEditCourseSelectCollege").html(errEditCourseSelectCollege);
            }

            if (EditCourseName.length == '') {
                errEditCourseName = '<li> Course name is required! </li>';
                $("#errEditCourseName").removeClass("d-none");
                $("#errEditCourseName").addClass("d-block");
                $("#errEditCourseName").html(errEditCourseName);
            } else {
                errEditCourseName = '';
                $("#errEditCourseName").addClass("d-none");
                $("#errEditCourseName").removeClass("d-block");
                $("#errEditCourseName").html(errEditCourseName);
            }

            if (EditCourseAcronym.length == '') {
                errEditCourseAcronym = '<li> Course acronym is required! </li>';
                $("#errEditCourseAcronym").removeClass("d-none");
                $("#errEditCourseAcronym").addClass("d-block");
                $("#errEditCourseAcronym").html(errEditCourseAcronym);
            } else {
                errEditCourseAcronym = '';
                $("#errEditCourseAcronym").addClass("d-none");
                $("#errEditCourseAcronym").removeClass("d-block");
                $("#errEditCourseAcronym").html(errEditCourseAcronym);
            }
        }

        if (errEditCourseAll != '' || errEditCourseSelectCollege == '0' || errEditCourseName != '' || errEditCourseAcronym != '') {
            $("#alertEditCourseError").addClass("d-block");
            $("#alertEditCourseError").removeClass("d-none");

            return false;
        } else {
            $("#alertEditCourseError").removeClass("d-block");
            $("#alertEditCourseError").addClass("d-none");

            if (EditCourseSelectCollege != '0' && EditCourseName != '' && EditCourseAcronym != '') {

                //ajax
                var formData = $('#EditCourseForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudCourse.php',
                    data: formData + '&action=EditCourse',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditCourseError").addClass("d-block");
                            $("#alertEditCourseError").removeClass("d-none");

                            $("#errEditCourseAll").removeClass("d-none");
                            $("#errEditCourseAll").addClass("d-block");
                            $("#errEditCourseAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditCourseSuccess").removeClass("d-none");
                            $("#alertEditCourseSuccess").addClass("d-block");

                            $("#succMsgEditCourseAll").removeClass("d-none");
                            $("#succMsgEditCourseAll").addClass("d-block");
                            $("#succMsgEditCourseAll").html(feedback.message);
                            // $("#EditCourseForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertEditCourseSuccess");
                                let alertLi = $("#succMsgEditCourseAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditCourseOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonEditCourseTwo").click(function () {
                                location.reload()
                            });

                            $('#EditCourseModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // ADD Major
    $("#AddMajor").click(function (e) {
        e.preventDefault();
        const AddMajorSelectCollege = $('#AddMajorSelectCollege').val();
        const AddMajorSelectCourse = $('#AddMajorSelectCourse').val();
        const AddMajorName = $('#AddMajorName').val();
        var errAddMajorAll = '';
        var errAddMajorSelectCollege = '';
        var errAddMajorSelectCourse = '';
        var errAddMajorName = '';

        if (AddMajorName.length == '' && AddMajorSelectCourse == '0' && AddMajorSelectCollege == '0') {
            errAddMajorAll = '<li> All Fields is empty! </li>';
            $("#errAddMajorAll").removeClass("d-none");
            $("#errAddMajorAll").addClass("d-block");
            $("#errAddMajorAll").html(errAddMajorAll);

        } else {
            errAddMajorAll = '';
            $("#errAddMajorAll").addClass("d-none");
            $("#errAddMajorAll").removeClass("d-block");
            $("#errAddMajorAll").html(errAddMajorAll);

            if (AddMajorSelectCollege == '0') {
                errAddMajorSelectCollege = '<li> Please Select a College! </li>';
                $("#errAddMajorSelectCollege").removeClass("d-none");
                $("#errAddMajorSelectCollege").addClass("d-block");
                $("#errAddMajorSelectCollege").html(errAddMajorSelectCollege);
            } else if (AddMajorSelectCollege != '0') {
                errAddMajorSelectCollege = '';
                $("#errAddMajorSelectCollege").addClass("d-none");
                $("#errAddMajorSelectCollege").removeClass("d-block");
                $("#errAddMajorSelectCollege").html(errAddMajorSelectCollege);
            }

            if (AddMajorSelectCourse == '0') {
                errAddMajorSelectCourse = '<li> Please Select a Course! </li>';
                $("#errAddMajorSelectCourse").removeClass("d-none");
                $("#errAddMajorSelectCourse").addClass("d-block");
                $("#errAddMajorSelectCourse").html(errAddMajorSelectCourse);
            } else {
                errAddMajorSelectCourse = '';
                $("#errAddMajorSelectCourse").addClass("d-none");
                $("#errAddMajorSelectCourse").removeClass("d-block");
                $("#errAddMajorSelectCourse").html(errAddMajorSelectCourse);
            }

            if (AddMajorName.length == '') {
                errAddMajorName = '<li> Major name is required! </li>';
                $("#errAddMajorName").removeClass("d-none");
                $("#errAddMajorName").addClass("d-block");
                $("#errAddMajorName").html(errAddMajorName);
            } else {
                errAddMajorName = '';
                $("#errAddMajorName").addClass("d-none");
                $("#errAddMajorName").removeClass("d-block");
                $("#errAddMajorName").html(errAddMajorName);
            }


        }

        if (errAddMajorAll != '' || errAddMajorSelectCollege != '' || errAddMajorName != '' || errAddMajorSelectCourse != '') {
            $("#alertAddMajorError").addClass("d-block");
            $("#alertAddMajorError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddMajorError").removeClass("d-block");
            $("#alertAddMajorError").addClass("d-none");

            if (AddMajorSelectCollege != '0' && AddMajorName != '' && AddMajorSelectCourse != '0') {
                var formData = $('#AddMajorForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudMajor.php',
                    data: formData + '&action=AddMajor',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddMajorError").addClass("d-block");
                            $("#alertAddMajorError").removeClass("d-none");

                            $("#errAddMajorAll").removeClass("d-none");
                            $("#errAddMajorAll").addClass("d-block");
                            $("#errAddMajorAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertAddMajorSuccess").removeClass("d-none");
                            $("#alertAddMajorSuccess").addClass("d-block");

                            $("#succMsgAddMajorAll").removeClass("d-none");
                            $("#succMsgAddMajorAll").addClass("d-block");
                            $("#succMsgAddMajorAll").html(feedback.message);
                            $("#AddMajorForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertAddMajorSuccess");
                                let alertLi = $("#succMsgAddMajorAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonAddMajorOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddMajorTwo").click(function () {
                                location.reload()
                            });

                            $('#AddMajorModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE Major
    $(document).on('click', '#GetEditMajor', function (e) {
        e.preventDefault();
        var GetEditMajorBtn = $(this).data('id');
        //alert(per_id);
        $('#GetEditMajorContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudMajor.php',
            type: 'POST',
            data: 'GetEditMajorBtn=' + GetEditMajorBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditMajorContentData').html('');
            $('#EditMajorContentData').html(data);
        }).fail(function () {
            $('#EditMajorContentData').html('<p>Error</p>');
        });
    });

    // EDIT Major
    $(document).on('click', '#EditMajor', function (e) {
        e.preventDefault();
        const EditMajorSelectCollege = $('#EditMajorSelectCollege').val();
        const EditMajorSelectCourse = $('#EditMajorSelectCourse').val();
        const EditMajorName = $('#EditMajorName').val();
        var errEditMajorAll = '';
        var errEditMajorSelectCollege = '';
        var errEditMajorName = '';
        var errEditMajorSelectCourse = '';

        if (EditMajorName.length == '' && EditMajorSelectCourse.length == '0' && EditMajorSelectCollege == '0') {
            errEditMajorAll = '<li> All Fields is empty! </li>';
            $("#errEditMajorAll").removeClass("d-none");
            $("#errEditMajorAll").addClass("d-block");
            $("#errEditMajorAll").html(errEditMajorAll);

        } else {
            errEditMajorAll = '';
            $("#errEditMajorAll").addClass("d-none");
            $("#errEditMajorAll").removeClass("d-block");
            $("#errEditMajorAll").html(errEditMajorAll);

            if (EditMajorSelectCollege == '0') {
                errEditMajorSelectCollege = '<li> Please Select a College! </li>';
                $("#errEditMajorSelectCollege").removeClass("d-none");
                $("#errEditMajorSelectCollege").addClass("d-block");
                $("#errEditMajorSelectCollege").html(errEditMajorSelectCollege);
            } else if (EditMajorSelectCollege != '0') {
                errEditMajorSelectCollege = '';
                $("#errEditMajorSelectCollege").addClass("d-none");
                $("#errEditMajorSelectCollege").removeClass("d-block");
                $("#errEditMajorSelectCollege").html(errEditMajorSelectCollege);
            }

            if (EditMajorSelectCourse == '0') {
                errEditMajorSelectCourse = '<li> Please Select a Course! </li>';
                $("#errEditMajorSelectCourse").removeClass("d-none");
                $("#errEditMajorSelectCourse").addClass("d-block");
                $("#errEditMajorSelectCourse").html(errEditMajorSelectCourse);
            } else {
                errEditMajorSelectCourse = '';
                $("#errEditMajorSelectCourse").addClass("d-none");
                $("#errEditMajorSelectCourse").removeClass("d-block");
                $("#errEditMajorSelectCourse").html(errEditMajorSelectCourse);
            }

            if (EditMajorName.length == '') {
                errEditMajorName = '<li> Major name is required! </li>';
                $("#errEditMajorName").removeClass("d-none");
                $("#errEditMajorName").addClass("d-block");
                $("#errEditMajorName").html(errEditMajorName);
            } else {
                errEditMajorName = '';
                $("#errEditMajorName").addClass("d-none");
                $("#errEditMajorName").removeClass("d-block");
                $("#errEditMajorName").html(errEditMajorName);
            }


        }

        if (errEditMajorAll != '' || errEditMajorSelectCollege == '0' || errEditMajorName != '' || errEditMajorSelectCourse == '0') {
            $("#alertEditMajorError").addClass("d-block");
            $("#alertEditMajorError").removeClass("d-none");

            return false;
        } else {
            $("#alertEditMajorError").removeClass("d-block");
            $("#alertEditMajorError").addClass("d-none");

            if (EditMajorSelectCollege != '0' && EditMajorName != '' && EditMajorSelectCourse != '0') {

                //ajax
                var formData = $('#EditMajorForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudMajor.php',
                    data: formData + '&action=EditMajor',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditMajorError").addClass("d-block");
                            $("#alertEditMajorError").removeClass("d-none");

                            $("#errEditMajorAll").removeClass("d-none");
                            $("#errEditMajorAll").addClass("d-block");
                            $("#errEditMajorAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditMajorSuccess").removeClass("d-none");
                            $("#alertEditMajorSuccess").addClass("d-block");

                            $("#succMsgEditMajorAll").removeClass("d-none");
                            $("#succMsgEditMajorAll").addClass("d-block");
                            $("#succMsgEditMajorAll").html(feedback.message);
                            // $("#EditMajorForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertEditMajorSuccess");
                                let alertLi = $("#succMsgEditMajorAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditMajorOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonEditMajorTwo").click(function () {
                                location.reload()
                            });

                            $('#EditMajorModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE Position
    $(document).on('click', '#GetViewPosition', function (e) {
        e.preventDefault();
        var GetViewPositionBtn = $(this).data('id');
        //alert(per_id);
        $('#GetViewPositionContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudPosition.php',
            type: 'POST',
            data: 'GetViewPositionBtn=' + GetViewPositionBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#ViewPositionContentData').html('');
            $('#ViewPositionContentData').html(data);
        }).fail(function () {
            $('#ViewPositionContentData').html('<p>Error</p>');
        });
    });

    // ADD Department
    $("#AddDepartment").click(function (e) {
        e.preventDefault();

        const AddDepartmentSelectCollege = $('#AddDepartmentSelectCollege').val();
        const AddDepartmentName = $('#AddDepartmentName').val();
        const AddDepartmentAcronym = $('#AddDepartmentAcronym').val();
        var errAddDepartmentSelectCollege = '';
        var errAddDepartmentAll = '';
        var errAddDepartmentName = '';
        var errAddDepartmentAcronym = '';

        // console.log(AddDepartmentSelectCollege);

        if (AddDepartmentName.length == '' && AddDepartmentAcronym.length == '' && AddDepartmentSelectCollege == '0') {
            errAddDepartmentAll = '<li> All Fields is empty! </li>';
            $("#errAddDepartmentAll").removeClass("d-none");
            $("#errAddDepartmentAll").addClass("d-block");
            $("#errAddDepartmentAll").html(errAddDepartmentAll);

        } else {
            errAddDepartmentAll = '';
            $("#errAddDepartmentAll").addClass("d-none");
            $("#errAddDepartmentAll").removeClass("d-block");
            $("#errAddDepartmentAll").html(errAddDepartmentAll);

            if (AddDepartmentSelectCollege == '0') {
                errAddDepartmentSelectCollege = '<li> Please Select a College! </li>';
                $("#errAddDepartmentSelectCollege").removeClass("d-none");
                $("#errAddDepartmentSelectCollege").addClass("d-block");
                $("#errAddDepartmentSelectCollege").html(errAddDepartmentSelectCollege);
            } else if (AddDepartmentSelectCollege != '0') {
                errAddDepartmentSelectCollege = '';
                $("#errAddDepartmentSelectCollege").addClass("d-none");
                $("#errAddDepartmentSelectCollege").removeClass("d-block");
                $("#errAddDepartmentSelectCollege").html(errAddDepartmentSelectCollege);
            }

            if (AddDepartmentName.length == '') {
                errAddDepartmentName = '<li> Department name is required! </li>';
                $("#errAddDepartmentName").removeClass("d-none");
                $("#errAddDepartmentName").addClass("d-block");
                $("#errAddDepartmentName").html(errAddDepartmentName);
            } else {
                errAddDepartmentName = '';
                $("#errAddDepartmentName").addClass("d-none");
                $("#errAddDepartmentName").removeClass("d-block");
                $("#errAddDepartmentName").html(errAddDepartmentName);
            }

            if (AddDepartmentAcronym.length == '') {
                errAddDepartmentAcronym = '<li> Department acronym is required! </li>';
                $("#errAddDepartmentAcronym").removeClass("d-none");
                $("#errAddDepartmentAcronym").addClass("d-block");
                $("#errAddDepartmentAcronym").html(errAddDepartmentAcronym);
            } else {
                errAddDepartmentAcronym = '';
                $("#errAddDepartmentAcronym").addClass("d-none");
                $("#errAddDepartmentAcronym").removeClass("d-block");
                $("#errAddDepartmentAcronym").html(errAddDepartmentAcronym);
            }
        }

        if (errAddDepartmentAll != '' || errAddDepartmentSelectCollege != '' || errAddDepartmentName != '' || errAddDepartmentAcronym != '') {
            $("#alertAddDepartmentError").addClass("d-block");
            $("#alertAddDepartmentError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddDepartmentError").removeClass("d-block");
            $("#alertAddDepartmentError").addClass("d-none");

            if (AddDepartmentSelectCollege != '0' && AddDepartmentName != '' && AddDepartmentAcronym != '') {
                var formData = $('#AddDepartmentForm').serialize();
                //ajax
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudDepartment.php',
                    data: formData + '&action=AddDepartment',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddDepartmentError").addClass("d-block");
                            $("#alertAddDepartmentError").removeClass("d-none");

                            $("#errAddDepartmentAll").removeClass("d-none");
                            $("#errAddDepartmentAll").addClass("d-block");
                            $("#errAddDepartmentAll").html(feedback.errAll);
                            // console.log(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertAddDepartmentSuccess").removeClass("d-none");
                            $("#alertAddDepartmentSuccess").addClass("d-block");

                            $("#succMsgAddDepartmentAll").removeClass("d-none");
                            $("#succMsgAddDepartmentAll").addClass("d-block");
                            $("#succMsgAddDepartmentAll").html(feedback.message);
                            $("#AddDepartmentForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertAddDepartmentSuccess");
                                let alertLi = $("#succMsgAddDepartmentAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonAddDepartmentOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddDepartmentTwo").click(function () {
                                location.reload()
                            });

                            $('#AddDepartmentModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE Department
    $(document).on('click', '#GetEditDepartment', function (e) {
        e.preventDefault();
        var GetEditDepartmentBtn = $(this).data('id');
        //alert(per_id);
        $('#GetEditDepartmentContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudDepartment.php',
            type: 'POST',
            data: 'GetEditDepartmentBtn=' + GetEditDepartmentBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditDepartmentContentData').html('');
            $('#EditDepartmentContentData').html(data);
        }).fail(function () {
            $('#EditDepartmentContentData').html('<p>Error</p>');
        });
    });

    // EDIT Department
    $(document).on('click', '#EditDepartment', function (e) {
        e.preventDefault();
        const EditDepartmentSelectCollege = $('#EditDepartmentSelectCollege').val();
        const EditDepartmentName = $('#EditDepartmentName').val();
        const EditDepartmentAcronym = $('#EditDepartmentAcronym').val();
        var errEditDepartmentAll = '';
        var errEditDepartmentSelectCollege = '';
        var errEditDepartmentName = '';
        var errEditDepartmentAcronym = '';

        if (EditDepartmentName.length == '' && EditDepartmentAcronym.length == '' && EditDepartmentSelectCollege == '0') {
            errEditDepartmentAll = '<li> All Fields is empty! </li>';
            $("#errEditDepartmentAll").removeClass("d-none");
            $("#errEditDepartmentAll").addClass("d-block");
            $("#errEditDepartmentAll").html(errEditDepartmentAll);

        } else {
            errEditDepartmentAll = '';
            $("#errEditDepartmentAll").addClass("d-none");
            $("#errEditDepartmentAll").removeClass("d-block");
            $("#errEditDepartmentAll").html(errEditDepartmentAll);

            if (EditDepartmentSelectCollege == '0') {
                errEditDepartmentSelectCollege = '<li> Please Select a College! </li>';
                $("#errEditDepartmentSelectCollege").removeClass("d-none");
                $("#errEditDepartmentSelectCollege").addClass("d-block");
                $("#errEditDepartmentSelectCollege").html(errEditDepartmentSelectCollege);
            } else if (EditDepartmentSelectCollege != '0') {
                errEditDepartmentSelectCollege = '';
                $("#errEditDepartmentSelectCollege").addClass("d-none");
                $("#errEditDepartmentSelectCollege").removeClass("d-block");
                $("#errEditDepartmentSelectCollege").html(errEditDepartmentSelectCollege);
            }

            if (EditDepartmentName.length == '') {
                errEditDepartmentName = '<li> Department name is required! </li>';
                $("#errEditDepartmentName").removeClass("d-none");
                $("#errEditDepartmentName").addClass("d-block");
                $("#errEditDepartmentName").html(errEditDepartmentName);
            } else {
                errEditDepartmentName = '';
                $("#errEditDepartmentName").addClass("d-none");
                $("#errEditDepartmentName").removeClass("d-block");
                $("#errEditDepartmentName").html(errEditDepartmentName);
            }

            if (EditDepartmentAcronym.length == '') {
                errEditDepartmentAcronym = '<li> Department acronym is required! </li>';
                $("#errEditDepartmentAcronym").removeClass("d-none");
                $("#errEditDepartmentAcronym").addClass("d-block");
                $("#errEditDepartmentAcronym").html(errEditDepartmentAcronym);
            } else {
                errEditDepartmentAcronym = '';
                $("#errEditDepartmentAcronym").addClass("d-none");
                $("#errEditDepartmentAcronym").removeClass("d-block");
                $("#errEditDepartmentAcronym").html(errEditDepartmentAcronym);
            }
        }

        if (errEditDepartmentAll != '' || errEditDepartmentSelectCollege == '0' || errEditDepartmentName != '' || errEditDepartmentAcronym != '') {
            $("#alertEditDepartmentError").addClass("d-block");
            $("#alertEditDepartmentError").removeClass("d-none");

            return false;
        } else {
            $("#alertEditDepartmentError").removeClass("d-block");
            $("#alertEditDepartmentError").addClass("d-none");

            if (EditDepartmentSelectCollege != '0' && EditDepartmentName != '' && EditDepartmentAcronym != '') {

                //ajax
                var formData = $('#EditDepartmentForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: 'post',
                    url: baseUrl + '/app/controllers/crud/crudDepartment.php',
                    data: formData + '&action=EditDepartment',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditDepartmentError").addClass("d-block");
                            $("#alertEditDepartmentError").removeClass("d-none");

                            $("#errEditDepartmentAll").removeClass("d-none");
                            $("#errEditDepartmentAll").addClass("d-block");
                            $("#errEditDepartmentAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditDepartmentSuccess").removeClass("d-none");
                            $("#alertEditDepartmentSuccess").addClass("d-block");

                            $("#succMsgEditDepartmentAll").removeClass("d-none");
                            $("#succMsgEditDepartmentAll").addClass("d-block");
                            $("#succMsgEditDepartmentAll").html(feedback.message);
                            // $("#EditDepartmentForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertEditDepartmentSuccess");
                                let alertLi = $("#succMsgEditDepartmentAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditDepartmentOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonEditDepartmentTwo").click(function () {
                                location.reload()
                            });

                            $('#EditDepartmentModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // ADD Subject
    $("#AddSubject").click(function (e) {
        e.preventDefault();

        const AddSubjectCode = $('#AddSubjectCode').val();
        const AddSubjectTitle = $('#AddSubjectTitle').val();

        var errAddSubjectAll = '';
        var errAddSubjectCode = '';
        var errAddSubjectTitle = '';

        if (AddSubjectCode.length == '' && AddSubjectTitle.length == '') {
            errAddSubjectAll = '<li> All Fields is empty! </li>';
            $("#errAddSubjectAll").removeClass("d-none");
            $("#errAddSubjectAll").addClass("d-block");
            $("#errAddSubjectAll").html(errAddSubjectAll);

        } else {
            errAddSubjectAll = '';
            $("#errAddSubjectAll").addClass("d-none");
            $("#errAddSubjectAll").removeClass("d-block");
            $("#errAddSubjectAll").html(errAddSubjectAll);

            if (AddSubjectCode.length == '') {
                errAddSubjectCode = '<li> Subject code is required! </li>';
                $("#errAddSubjectCode").removeClass("d-none");
                $("#errAddSubjectCode").addClass("d-block");
                $("#errAddSubjectCode").html(errAddSubjectCode);
            } else {
                errAddSubjectCode = '';
                $("#errAddSubjectCode").addClass("d-none");
                $("#errAddSubjectCode").removeClass("d-block");
                $("#errAddSubjectCode").html(errAddSubjectCode);
            }

            if (AddSubjectTitle.length == '') {
                errAddSubjectTitle = '<li> Descriptive title is required! </li>';
                $("#errAddSubjectTitle").removeClass("d-none");
                $("#errAddSubjectTitle").addClass("d-block");
                $("#errAddSubjectTitle").html(errAddSubjectTitle);
            } else {
                errAddSubjectTitle = '';
                $("#errAddSubjectTitle").addClass("d-none");
                $("#errAddSubjectTitle").removeClass("d-block");
                $("#errAddSubjectTitle").html(errAddSubjectTitle);
            }
        }

        if (errAddSubjectAll != '' || errAddSubjectCode != '' || errAddSubjectTitle != '') {
            $("#alertAddSubjectError").addClass("d-block");
            $("#alertAddSubjectError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddSubjectError").removeClass("d-block");
            $("#alertAddSubjectError").addClass("d-none");

            if (AddSubjectCode != '' && AddSubjectTitle != '') {
                var formData = $('#AddSubjectForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudSubject.php',
                    data: formData + '&action=AddSubject',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddSubjectError").addClass("d-block");
                            $("#alertAddSubjectError").removeClass("d-none");

                            $("#errAddSubjectAll").removeClass("d-none");
                            $("#errAddSubjectAll").addClass("d-block");
                            $("#errAddSubjectAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertAddSubjectSuccess").removeClass("d-none");
                            $("#alertAddSubjectSuccess").addClass("d-block");

                            $("#succMsgAddSubjectAll").removeClass("d-none");
                            $("#succMsgAddSubjectAll").addClass("d-block");
                            $("#succMsgAddSubjectAll").html(feedback.message);
                            $("#AddSubjectForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertAddSubjectSuccess");
                                let alertLi = $("#succMsgAddSubjectAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonAddSubjectOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddSubjectTwo").click(function () {
                                location.reload()
                            });

                            $('#AddSubjectModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

    // FETCH SINGLE Subject
    $(document).on('click', '#GetEditSubject', function (e) {
        e.preventDefault();
        var GetEditSubjectBtn = $(this).data('id');
        //alert(per_id);
        $('#GetEditSubjectContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudSubject.php',
            type: 'POST',
            data: 'GetEditSubjectBtn=' + GetEditSubjectBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#EditSubjectContentData').html('');
            $('#EditSubjectContentData').html(data);
        }).fail(function () {
            $('#EditSubjectContentData').html('<p>Error</p>');
        });
    });

    // Edit Subject
    $(document).on('click', '#EditSubject', function (e) {
        e.preventDefault();

        const EditSubjectCode = $('#EditSubjectCode').val();
        const EditSubjectTitle = $('#EditSubjectTitle').val();

        var errEditSubjectAll = '';
        var errEditSubjectCode = '';
        var errEditSubjectTitle = '';

        if (EditSubjectCode.length == '' && EditSubjectTitle.length == '') {
            errEditSubjectAll = '<li> All Fields is empty! </li>';
            $("#errEditSubjectAll").removeClass("d-none");
            $("#errEditSubjectAll").addClass("d-block");
            $("#errEditSubjectAll").html(errEditSubjectAll);

        } else {
            errEditSubjectAll = '';
            $("#errEditSubjectAll").addClass("d-none");
            $("#errEditSubjectAll").removeClass("d-block");
            $("#errEditSubjectAll").html(errEditSubjectAll);

            if (EditSubjectCode.length == '') {
                errEditSubjectCode = '<li> Subject code is required! </li>';
                $("#errEditSubjectCode").removeClass("d-none");
                $("#errEditSubjectCode").addClass("d-block");
                $("#errEditSubjectCode").html(errEditSubjectCode);
            } else {
                errEditSubjectCode = '';
                $("#errEditSubjectCode").addClass("d-none");
                $("#errEditSubjectCode").removeClass("d-block");
                $("#errEditSubjectCode").html(errEditSubjectCode);
            }

            if (EditSubjectTitle.length == '') {
                errEditSubjectTitle = '<li> Descriptive title is required! </li>';
                $("#errEditSubjectTitle").removeClass("d-none");
                $("#errEditSubjectTitle").addClass("d-block");
                $("#errEditSubjectTitle").html(errEditSubjectTitle);
            } else {
                errEditSubjectTitle = '';
                $("#errEditSubjectTitle").addClass("d-none");
                $("#errEditSubjectTitle").removeClass("d-block");
                $("#errEditSubjectTitle").html(errEditSubjectTitle);
            }
        }

        if (errEditSubjectAll != '' || errEditSubjectCode != '' || errEditSubjectTitle != '') {
            $("#alertEditSubjectError").addClass("d-block");
            $("#alertEditSubjectError").removeClass("d-none");
            return false;
        } else {
            $("#alertEditSubjectError").removeClass("d-block");
            $("#alertEditSubjectError").addClass("d-none");

            if (EditSubjectCode != '' && EditSubjectTitle != '') {
                var formData = $('#EditSubjectForm').serialize();
                $.ajax({
                    method: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudSubject.php',
                    data: formData + '&action=EditSubject',
                    dataType: 'JSON',
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertEditSubjectError").addClass("d-block");
                            $("#alertEditSubjectError").removeClass("d-none");

                            $("#errEditSubjectAll").removeClass("d-none");
                            $("#errEditSubjectAll").addClass("d-block");
                            $("#errEditSubjectAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            $("#alertEditSubjectSuccess").removeClass("d-none");
                            $("#alertEditSubjectSuccess").addClass("d-block");

                            $("#succMsgEditSubjectAll").removeClass("d-none");
                            $("#succMsgEditSubjectAll").addClass("d-block");
                            $("#succMsgEditSubjectAll").html(feedback.message);
                            // $("#EditSubjectForm")[0].reset();

                            setTimeout(function () {
                                let alertUl = $("#alertEditSubjectSuccess");
                                let alertLi = $("#succMsgEditSubjectAll");
                                alertUl.removeClass('d-block');
                                alertUl.addClass('d-none');

                                alertLi.removeClass('d-block');
                                alertLi.addClass('d-none');
                            }, 5000);

                            $("#ModalCloseButtonEditSubjectOne").click(function () {
                                location.reload()
                            });

                            $("#ModalCloseButtonAddSubjectTwo").click(function () {
                                location.reload()
                            });

                            $('#AddSubjectModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        }
    });

});