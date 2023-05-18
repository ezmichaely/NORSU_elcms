$(document).ready(function () {
    $('#CreateModuleSubjectCode').selectize({
        onInitialize: function () {
            this.trigger('change', this.getValue(), true);
        },
        onChange: function (value, isOnInitialize) {
            if (value !== '') {
                $("#CreateModuleSubjectTitle").val(value).change();
                $("#CreateModuleSubjectTitle").removeClass('text-muted');
            }
        }
    });

    $('#EditModuleSubjectCode').selectize({
        onInitialize: function () {
            this.trigger('change', this.getValue(), true);
        },
        onChange: function (value, isOnInitialize) {
            if (value !== '') {
                $("#EditModuleSubjectTitle").val(value).change();
                $("#EditModuleSubjectTitle").removeClass('text-muted');
            }
        }
    });

    // CREATE MODULE
    $("#CreateModule").click(function (e) {
        e.preventDefault();

        const CreateModuleSubjectCode = $('#CreateModuleSubjectCode').val();
        const CreateModuleTitle = $('#CreateModuleTitle').val();
        const CreateModuleIntro = $('#CreateModuleIntro').val();

        var errCreateModuleAll = '';
        var errCreateModuleSubjectCode = '';
        var errCreateModuleTitle = '';
        var errCreateModuleIntro = '';


        if (CreateModuleSubjectCode == '' && CreateModuleTitle.length == '' && CreateModuleIntro.length == '') {
            errCreateModuleAll = '<li> All Fields is empty! </li>';
            $("#errCreateModuleAll").removeClass("d-none");
            $("#errCreateModuleAll").addClass("d-block");
            $("#errCreateModuleAll").html(errCreateModuleAll);

            $('#CreateModuleSubjectTitle').addClass('border-danger');
            $('#CreateModuleTitle').addClass('border-danger');
            $('#CreateModuleIntro').addClass('border-danger');


        } else {
            errCreateModuleAll = '';
            $("#errCreateModuleAll").addClass("d-none");
            $("#errCreateModuleAll").removeClass("d-block");
            $("#errCreateModuleAll").html(errCreateModuleAll);

            $('#CreateModuleSubjectTitle').removeClass('border-danger');
            $('#CreateModuleTitle').removeClass('border-danger');
            $('#CreateModuleIntro').removeClass('border-danger');

            if (CreateModuleSubjectCode == '') {
                errCreateModuleSubjectCode = '<li> Please select a subject. </li>';
                $("#errCreateModuleSubjectCode").removeClass("d-none");
                $("#errCreateModuleSubjectCode").addClass("d-block");
                $("#errCreateModuleSubjectCode").html(errCreateModuleSubjectCode);
                $('#CreateModuleSubjectTitle').addClass('border-danger');
            } else if (CreateModuleSubjectCode != '') {
                errCreateModuleSubjectCode = '';
                $("#errCreateModuleSubjectCode").addClass("d-none");
                $("#errCreateModuleSubjectCode").removeClass("d-block");
                $("#errCreateModuleSubjectCode").html(errCreateModuleSubjectCode);
                $('#CreateModuleSubjectTitle').removeClass('border-danger');
            }

            if (CreateModuleTitle.length == '') {
                errCreateModuleTitle = '<li> Please enter the Title of the Module. </li>';
                $("#errCreateModuleTitle").removeClass("d-none");
                $("#errCreateModuleTitle").addClass("d-block");
                $("#errCreateModuleTitle").html(errCreateModuleTitle);
                $('#CreateModuleTitle').addClass('border-danger');
            } else if (CreateModuleTitle != '') {
                errCreateModuleTitle = '';
                $("#errCreateModuleTitle").addClass("d-none");
                $("#errCreateModuleTitle").removeClass("d-block");
                $("#errCreateModuleTitle").html(errCreateModuleTitle);
                $('#CreateModuleTitle').removeClass('border-danger');
            }

            if (CreateModuleIntro.length == '') {
                errCreateModuleIntro = '<li> Module Introduction is missing. </li>';
                $("#errCreateModuleIntro").removeClass("d-none");
                $("#errCreateModuleIntro").addClass("d-block");
                $("#errCreateModuleIntro").html(errCreateModuleIntro);
                $('#CreateModuleIntro').addClass('border-danger');
            } else {
                errCreateModuleIntro = '';
                $("#errCreateModuleIntro").addClass("d-none");
                $("#errCreateModuleIntro").removeClass("d-block");
                $("#errCreateModuleIntro").html(errCreateModuleIntro);
                $('#CreateModuleIntro').removeClass('border-danger');
            }
        }

        if (errCreateModuleAll != '' || errCreateModuleSubjectCode != '' ||
            errCreateModuleTitle != '' || errCreateModuleIntro != '') {
            $("#alertCreateModuleError").addClass("d-block");
            $("#alertCreateModuleError").removeClass("d-none");
            return false;
        } else {
            $("#alertCreateModuleError").removeClass("d-block");
            $("#alertCreateModuleError").addClass("d-none");

            if (CreateModuleSubjectCode != '' && CreateModuleTitle != '' && CreateModuleIntro != '') {
                $('#CreateModuleForm').submit();
            }
        }
    });

    // EDIT MODULE
    $("#EditModule").click(function (e) {
        e.preventDefault();

        // console.log('click');
        const EditModuleSubjectCode = $('#EditModuleSubjectCode').val();
        const EditModuleTitle = $('#EditModuleTitle').val();
        const EditModuleIntro = $('#EditModuleIntro').val();

        var errEditModuleAll = '';
        var errEditModuleSubjectCode = '';
        var errEditModuleTitle = '';
        var errEditModuleIntro = '';


        if (EditModuleSubjectCode == '' && EditModuleTitle.length == '' && EditModuleIntro.length == '') {
            errEditModuleAll = '<li> All Fields is empty! </li>';
            $("#errEditModuleAll").removeClass("d-none");
            $("#errEditModuleAll").addClass("d-block");
            $("#errEditModuleAll").html(errEditModuleAll);

            $('#EditModuleSubjectTitle').addClass('border-danger');
            $('#EditModuleTitle').addClass('border-danger');
            $('#EditModuleIntro').addClass('border-danger');


        } else {
            errEditModuleAll = '';
            $("#errEditModuleAll").addClass("d-none");
            $("#errEditModuleAll").removeClass("d-block");
            $("#errEditModuleAll").html(errEditModuleAll);

            $('#EditModuleSubjectTitle').removeClass('border-danger');
            $('#EditModuleTitle').removeClass('border-danger');
            $('#EditModuleIntro').removeClass('border-danger');

            if (EditModuleSubjectCode == '') {
                errEditModuleSubjectCode = '<li> Please select a subject. </li>';
                $("#errEditModuleSubjectCode").removeClass("d-none");
                $("#errEditModuleSubjectCode").addClass("d-block");
                $("#errEditModuleSubjectCode").html(errEditModuleSubjectCode);
                $('#EditModuleSubjectTitle').addClass('border-danger');
            } else if (EditModuleSubjectCode != '') {
                errEditModuleSubjectCode = '';
                $("#errEditModuleSubjectCode").addClass("d-none");
                $("#errEditModuleSubjectCode").removeClass("d-block");
                $("#errEditModuleSubjectCode").html(errEditModuleSubjectCode);
                $('#EditModuleSubjectTitle').removeClass('border-danger');
            }

            if (EditModuleTitle.length == '') {
                errEditModuleTitle = '<li> Please enter the Title of the Module. </li>';
                $("#errEditModuleTitle").removeClass("d-none");
                $("#errEditModuleTitle").addClass("d-block");
                $("#errEditModuleTitle").html(errEditModuleTitle);
                $('#EditModuleTitle').addClass('border-danger');
            } else if (EditModuleTitle != '') {
                errEditModuleTitle = '';
                $("#errEditModuleTitle").addClass("d-none");
                $("#errEditModuleTitle").removeClass("d-block");
                $("#errEditModuleTitle").html(errEditModuleTitle);
                $('#EditModuleTitle').removeClass('border-danger');
            }

            if (EditModuleIntro.length == '') {
                errEditModuleIntro = '<li> Module Introduction is missing. </li>';
                $("#errEditModuleIntro").removeClass("d-none");
                $("#errEditModuleIntro").addClass("d-block");
                $("#errEditModuleIntro").html(errEditModuleIntro);
                $('#EditModuleIntro').addClass('border-danger');
            } else {
                errEditModuleIntro = '';
                $("#errEditModuleIntro").addClass("d-none");
                $("#errEditModuleIntro").removeClass("d-block");
                $("#errEditModuleIntro").html(errEditModuleIntro);
                $('#EditModuleIntro').removeClass('border-danger');
            }
        }

        if (errEditModuleAll != '' || errEditModuleSubjectCode != '' ||
            errEditModuleTitle != '' || errEditModuleIntro != '') {
            $("#alertEditModuleError").addClass("d-block");
            $("#alertEditModuleError").removeClass("d-none");
            return false;
        } else {
            $("#alertEditModuleError").removeClass("d-block");
            $("#alertEditModuleError").addClass("d-none");

            if (EditModuleSubjectCode != '' && EditModuleTitle != '' && EditModuleIntro != '') {
                $('#EditModuleForm').submit();
            }
        }
    });

    // CREATE OUTLINE
    $("#CreateOutline").click(function (e) {
        e.preventDefault();
        // console.log('EEEEE');
        const CreateOutlineTitle = $('#CreateOutlineTitle').val();
        var errCreateOutlineTitle = '';

        if (CreateOutlineTitle.length == '') {
            errCreateOutlineTitle = '<li> Please enter the Title of the Outline. </li>';
            $("#errCreateOutlineTitle").removeClass("d-none");
            $("#errCreateOutlineTitle").addClass("d-block");
            $("#errCreateOutlineTitle").html(errCreateOutlineTitle);
            $('#CreateOutlineTitle').addClass('border-danger');
        } else if (CreateOutlineTitle != '') {
            errCreateOutlineTitle = '';
            $("#errCreateOutlineTitle").addClass("d-none");
            $("#errCreateOutlineTitle").removeClass("d-block");
            $("#errCreateOutlineTitle").html(errCreateOutlineTitle);
            $('#CreateOutlineTitle').removeClass('border-danger');
        }

        if (errCreateOutlineTitle != '') {
            $("#alertCreateOutlineError").addClass("d-block");
            $("#alertCreateOutlineError").removeClass("d-none");
            return false;
        } else {
            $("#alertCreateOutlineError").removeClass("d-block");
            $("#alertCreateOutlineError").addClass("d-none");

            if (CreateOutlineTitle != '') {
                $('#CreateOutlineForm').submit();
            }
        }
    });

    // EDIT OUTLINE
    $("#EditOutline").click(function (e) {
        e.preventDefault();
        // console.log('EditOutline');
        const EditOutlineTitle = $('#EditOutlineTitle').val();
        var errEditOutlineTitle = '';

        if (EditOutlineTitle.length == '') {
            errEditOutlineTitle = '<li> Please enter the title of the Outline. </li>';
            $("#errEditOutlineTitle").removeClass("d-none");
            $("#errEditOutlineTitle").addClass("d-block");
            $("#errEditOutlineTitle").html(errEditOutlineTitle);
            $('#EditOutlineTitle').addClass('border-danger');
        } else if (EditOutlineTitle != '') {
            errEditOutlineTitle = '';
            $("#errEditOutlineTitle").addClass("d-none");
            $("#errEditOutlineTitle").removeClass("d-block");
            $("#errEditOutlineTitle").html(errEditOutlineTitle);
            $('#EditOutlineTitle').removeClass('border-danger');
        }

        if (errEditOutlineTitle != '') {
            $("#alertEditOutlineError").addClass("d-block");
            $("#alertEditOutlineError").removeClass("d-none");
            return false;
        } else {
            $("#alertEditOutlineError").removeClass("d-block");
            $("#alertEditOutlineError").addClass("d-none");

            if (EditOutlineTitle != '') {
                $('#EditOutlineForm').submit();
            }
        }
    });

    // SEARCH MODULE 
    $("#SearchSubjectCode").keyup(function (e) {
        const string = $('#SearchSubjectCode').val();
        console.log(string);
        var maxx = '<div class="col-md-12 mt-2 text-center fw-bold"> All Modules are loaded. </div>';
        var nomod = '<div class="col-md-12 mt-2 text-center fw-bold"> No module available. </div>';
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/query/fetchAjax.php',
            dataType: 'text',
            data: {
                SearchSubjectCode: string,
                SearchModule: 'SearchModule'
            },
            success: function (feedback) {
                if (feedback == 'reachedMax') {
                    $('#SearchModuleLists').append(maxx);
                } else {
                    if (feedback == nomod) {
                        $('#SearchModuleLists').html('');
                        $('#SearchModuleLists').append(feedback);
                    } else {
                        $('#SearchModuleLists').html('');
                        $('#SearchModuleLists').append(feedback);
                        $('#SearchModuleLists').append(maxx);
                    }
                }

                // if (feedback.status == 'success') {

                //     $('#MessageContext').val('');
                // }
            }

        });
    });

    // FETCH GET APPROVE MODULE DATA
    $(document).on('click', '#GetApproveModule', function (e) {
        e.preventDefault();
        var GetApproveModuleBtn = $(this).data('mcode');
        //alert(per_id);
        $('#GetApproveModuleContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudModules.php',
            type: 'POST',
            data: 'GetApproveModuleBtn=' + GetApproveModuleBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#GetApproveModuleContentData').html('');
            $('#GetApproveModuleContentData').html(data);
        }).fail(function () {
            $('#GetApproveModuleContentData').html('<p>Error</p>');
        });
    });

    // APPROVE MODULE DATA
    $(document).on('click', '#ApproveModule', function (e) {
        e.preventDefault();
        var formData = $('#ApproveModuleForm').serialize();
        console.log(formData)
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudModules.php',
            data: formData + '&ApproveModule=ApproveModule',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#warningApproveModuleSuccess').addClass('d-none');
                    $('#warningApproveModuleSuccess').removeClass('d-block');

                    $('#ApproveModuleModalFooterOne').removeClass('d-block');
                    $('#ApproveModuleModalFooterOne').addClass('d-none');

                    $('#alertApproveModuleSuccess').removeClass('d-none');
                    $('#alertApproveModuleSuccess').addClass('d-block');
                    $('#succMsg').html(feedback.message);

                    $('#ApproveModuleModalFooterTwo').removeClass('d-none');
                    $('#ApproveModuleModalFooterTwo').addClass('d-block');
                    // fetchMyPosts();

                    $("#ModalCloseButtonApproveModuleOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonApproveModuleTwo").click(function () {
                        location.reload();
                    });

                    $('#ApproveModuleModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });


    // FETCH GET REVISE MODULE DATA
    $(document).on('click', '#GetReviseModule', function (e) {
        e.preventDefault();
        var GetReviseModuleBtn = $(this).data('mcode');
        //alert(per_id);
        $('#GetReviseModuleContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudModules.php',
            type: 'POST',
            data: 'GetReviseModuleBtn=' + GetReviseModuleBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#GetReviseModuleContentData').html('');
            $('#GetReviseModuleContentData').html(data);
        }).fail(function () {
            $('#GetReviseModuleContentData').html('<p>Error</p>');
        });
    });

    // Revise MODULE DATA
    $(document).on('click', '#ReviseModule', function (e) {
        e.preventDefault();
        var formData = $('#ReviseModuleForm').serialize();
        console.log(formData)
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudModules.php',
            data: formData + '&ReviseModule=ReviseModule',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#warningReviseModuleSuccess').addClass('d-none');
                    $('#warningReviseModuleSuccess').removeClass('d-block');

                    $('#ReviseModuleModalFooterOne').removeClass('d-block');
                    $('#ReviseModuleModalFooterOne').addClass('d-none');

                    $('#alertReviseModuleSuccess').removeClass('d-none');
                    $('#alertReviseModuleSuccess').addClass('d-block');
                    $('#succMsg').html(feedback.message);

                    $('#ReviseModuleModalFooterTwo').removeClass('d-none');
                    $('#ReviseModuleModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonReviseModuleOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonReviseModuleTwo").click(function () {
                        location.reload();
                    });

                    $('#ReviseModuleModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });




});