$(document).ready(function () {
    fetchAllStudentRequest(0, 10000000);
    fetchAllInstructorRequest(0, 10000000);
    fetchAllDeptHeadRequest(0, 10000000);
    fetchAllDeanRequest(0, 10000000);

    // FETCH ALL STUDENTS REQUEST
    function fetchAllStudentRequest(start, limit) {
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            method: 'POST',
            dataType: 'text',
            data: {
                fetchAllStudentRequest: 'fetchAllStudentRequest',
                start: start,
                limit: limit
            },
            success: function (response) {
                if (response != "reachedMax") {
                    $('#StudentRequestBody').append(response);
                    start += limit;
                    fetchAllStudentRequest(start, limit);
                } else {
                    $("#StudentRequestTable").DataTable({
                        "columnDefs": [{
                            "targets": [4, 5],
                            "orderable": false,
                        }, ],
                        dom: 'Blfrtip',
                        buttons: [{
                                className: 'btn my-2',
                            },
                            {
                                className: 'btn my-2',
                                text: '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>',
                                orientation: 'portrait',
                                pageSize: 'A4',
                                extend: 'pdfHtml5',
                                // download: 'open',
                                title: 'All Student Request',
                                exportOptions: {
                                    columns: [0, 1, 2, 3]
                                }
                            }
                        ],
                        initComplete: function () {
                            var btns = $('#StudentRequestTableDiv .dt-buttons');
                            btns.find('span').remove();
                            btns.children(':first-child').addClass('btn-success');
                            btns.children(':first-child').removeClass('btn-secondary');
                            btns.children(':first-child').append('<i class="fas fa-check"></i><span class="ms-1">ACCEPT ALL</span>');
                            btns.children(':first-child').attr('data-bs-toggle', 'modal');
                            btns.children(':first-child').attr('data-bs-target', '#AcceptAllStudentsModal');
                            btns.children(':first-child').attr('id', 'AcceptAllStudentsBtn');
                            btns.children(':first-child').prop('disabled', false);
                            btns.children(':last-child').append('<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>');
                            btns.removeClass('btn-group');
                            btns.removeClass('flex-wrap');

                            var table = $('#StudentRequestTable').DataTable();
                            if (!table.data().count()) {
                                $('#AcceptAllStudentsBtn').prop('disabled', true);
                            }
                        },
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ]
                    });
                }
            }
        });
    }

    // FETCH LOADSLIP
    $(document).on('click', '#GetViewLoadslip', function (e) {
        e.preventDefault();
        var GetViewLoadslipBtn = $(this).data('id');
        //alert(per_id);
        $('#GetViewLoadslipContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            type: 'POST',
            data: 'GetViewLoadslipBtn=' + GetViewLoadslipBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#ViewLoadslipContentData').html('');
            $('#ViewLoadslipContentData').html(data);
        }).fail(function () {
            $('#ViewLoadslipContentData').html('<p>Error</p>');
        });
    });

    // FETCH ALL INSTRUCTOR REQUEST
    function fetchAllInstructorRequest(start, limit) {
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            method: 'POST',
            dataType: 'text',
            data: {
                fetchAllInstructorRequest: 'fetchAllInstructorRequest',
                start: start,
                limit: limit
            },
            success: function (response) {
                if (response != "reachedMax") {
                    $('#InstructorRequestBody').append(response);
                    start += limit;
                    fetchAllInstructorRequest(start, limit);
                } else {
                    $("#InstructorRequestTable").DataTable({
                        "columnDefs": [{
                            "targets": [4],
                            "orderable": false,
                        }, ],
                        dom: 'Blfrtip',
                        buttons: [{
                                className: 'btn my-2',
                            },
                            {
                                className: 'btn my-2',
                                text: '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>',
                                orientation: 'portrait',
                                pageSize: 'A4',
                                extend: 'pdfHtml5',
                                // download: 'open',
                                title: 'All Instructor Request',
                                exportOptions: {
                                    columns: [0, 1, 2, 3]
                                }
                            }
                        ],
                        initComplete: function () {
                            var btns = $('#InstructorRequestTableDiv .dt-buttons');
                            btns.find('span').remove();
                            btns.children(':first-child').addClass('btn-success');
                            btns.children(':first-child').removeClass(
                                'btn-secondary');
                            btns.children(':first-child').append(
                                '<i class="fas fa-check"></i><span class="ms-1">ACCEPT ALL</span>'
                            );
                            btns.children(':first-child').attr('data-bs-toggle',
                                'modal');
                            btns.children(':first-child').attr('data-bs-target',
                                '#AcceptAllInstructorsModal');
                            btns.children(':first-child').attr('id', 'AcceptAllInstructorsBtn');
                            btns.children(':first-child').prop('disabled', false);

                            btns.children(':last-child').append(
                                '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>'
                            );
                            btns.removeClass('btn-group');
                            btns.removeClass('flex-wrap');

                            var table = $('#InstructorRequestTable').DataTable();
                            if (!table.data().count()) {
                                $('#AcceptAllInstructorsBtn').prop('disabled', true);
                            }
                        },
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ]
                    });
                }
            }
        });
    }

    // FETCH ALL DEPTHEAD REQUEST
    function fetchAllDeptHeadRequest(start, limit) {
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            method: 'POST',
            dataType: 'text',
            data: {
                fetchAllDeptHeadRequest: 'fetchAllDeptHeadRequest',
                start: start,
                limit: limit
            },
            success: function (response) {
                if (response != "reachedMax") {
                    $('#DeptHeadRequestBody').append(response);
                    start += limit;
                    fetchAllDeptHeadRequest(start, limit);
                } else {
                    $("#DeptHeadRequestTable").DataTable({
                        "columnDefs": [{
                            "targets": [4],
                            "orderable": false,
                        }, ],
                        dom: 'Blfrtip',
                        buttons: [{
                                className: 'btn my-2',
                            },
                            {
                                className: 'btn my-2',
                                text: '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>',
                                orientation: 'portrait',
                                pageSize: 'A4',
                                extend: 'pdfHtml5',
                                // download: 'open',
                                title: 'All DeptHead Request',
                                exportOptions: {
                                    columns: [0, 1, 2, 3]
                                }
                            }
                        ],
                        initComplete: function () {
                            var btns = $('#DeptHeadRequestTableDiv .dt-buttons');
                            btns.find('span').remove();
                            btns.children(':first-child').addClass('btn-success');
                            btns.children(':first-child').removeClass(
                                'btn-secondary');
                            btns.children(':first-child').append(
                                '<i class="fas fa-check"></i><span class="ms-1">ACCEPT ALL</span>'
                            );
                            btns.children(':first-child').attr('data-bs-toggle',
                                'modal');
                            btns.children(':first-child').attr('data-bs-target',
                                '#AcceptAllDeptHeadModal');
                            btns.children(':first-child').attr('id', 'AcceptAllDeptHeadBtn');
                            btns.children(':first-child').prop('disabled', false);

                            btns.children(':last-child').append(
                                '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>'
                            );
                            btns.removeClass('btn-group');
                            btns.removeClass('flex-wrap');

                            var table = $('#DeptHeadRequestTable').DataTable();
                            if (!table.data().count()) {
                                $('#AcceptAllDeptHeadBtn').prop('disabled', true);
                            }
                        },
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ]
                    });
                }
            }
        });
    }

    // FETCH ALL DEAN REQUEST
    function fetchAllDeanRequest(start, limit) {
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            method: 'POST',
            dataType: 'text',
            data: {
                fetchAllDeanRequest: 'fetchAllDeanRequest',
                start: start,
                limit: limit
            },
            success: function (response) {
                if (response != "reachedMax") {
                    $('#DeanRequestBody').append(response);
                    start += limit;
                    fetchAllDeanRequest(start, limit);
                } else {
                    $("#DeanRequestTable").DataTable({
                        "columnDefs": [{
                            "targets": [3],
                            "orderable": false,
                        }, ],
                        dom: 'Blfrtip',
                        buttons: [{
                                className: 'btn my-2',
                            },
                            {
                                className: 'btn my-2',
                                text: '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>',
                                orientation: 'portrait',
                                pageSize: 'A4',
                                extend: 'pdfHtml5',
                                // download: 'open',
                                title: 'All Dean Request',
                                exportOptions: {
                                    columns: [0, 1, 2]
                                }
                            }
                        ],
                        initComplete: function () {
                            var btns = $('#DeanRequestTableDiv .dt-buttons');
                            btns.find('span').remove();
                            btns.children(':first-child').addClass('btn-success');
                            btns.children(':first-child').removeClass(
                                'btn-secondary');
                            btns.children(':first-child').append(
                                '<i class="fas fa-check"></i><span class="ms-1">ACCEPT ALL</span>'
                            );
                            btns.children(':first-child').attr('data-bs-toggle',
                                'modal');
                            btns.children(':first-child').attr('data-bs-target',
                                '#AcceptAllDeanModal');
                            btns.children(':first-child').attr('id', 'AcceptAllDeanBtn');
                            btns.children(':first-child').prop('disabled', false);

                            btns.children(':last-child').append(
                                '<i class="fa-solid fa-download"></i><span class="ms-1">Generate Report</span>'
                            );
                            btns.removeClass('btn-group');
                            btns.removeClass('flex-wrap');

                            var table = $('#DeanRequestTable').DataTable();
                            if (!table.data().count()) {
                                $('#AcceptAllDeanBtn').prop('disabled', true);
                            }
                        },
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ]
                    });
                }
            }
        });
    }

    // ACCEPT ACCOUNT
    $(document).on('click', '#AcceptAccount', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            data: 'AcceptAccountID=' + $('#AcceptAccountID').val() + '&AcceptAccount=AcceptAccount',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#alertAcceptAccount').removeClass('d-none');
                    $('#alertAcceptAccount').addClass('d-block');
                    $('#AcceptAccountModalFooterOne').removeClass('d-block');
                    $('#AcceptAccountModalFooterOne').addClass('d-none');
                    $('#warningAcceptAccount').addClass('d-none');
                    $('#warningAcceptAccount').removeClass('d-block');
                    $('#AcceptAccountModalFooterTwo').removeClass('d-none');
                    $('#AcceptAccountModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonAcceptAccountOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonAcceptAccountTwo").click(function () {
                        location.reload();
                    });

                    $('#AcceptAccountModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });

    // FETCH GET ACCEPT ACCOUNT
    $(document).on('click', '#GetAcceptAccount', function (e) {
        e.preventDefault();
        var GetAcceptAccountBtn = $(this).data('id');
        //alert(per_id);
        $('#GetAcceptAccountContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            type: 'POST',
            data: 'GetAcceptAccountBtn=' + GetAcceptAccountBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#AcceptAccountContentData').html('');
            $('#AcceptAccountContentData').html(data);
        }).fail(function () {
            $('#AcceptAccountContentData').html('<p>Error</p>');
        });
    });

    // ACCEPT ALL STUDENTS ACCOUNT
    $(document).on('click', '#AcceptAllStudents', function (e) {
        e.preventDefault();
        var formData = $('#AcceptAllStudentsForm').serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            data: formData + '&AcceptAllStudents=AcceptAllStudents',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#alertAcceptAllStudents').removeClass('d-none');
                    $('#alertAcceptAllStudents').addClass('d-block');
                    $('#AcceptAllStudentsModalFooterOne').removeClass('d-block');
                    $('#AcceptAllStudentsModalFooterOne').addClass('d-none');
                    $('#warningAcceptAllStudents').addClass('d-none');
                    $('#warningAcceptAllStudents').removeClass('d-block');
                    $('#AcceptAllStudentsModalFooterTwo').removeClass('d-none');
                    $('#AcceptAllStudentsModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonAcceptAllStudentsOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonAcceptAllStudentsTwo").click(function () {
                        location.reload();
                    });

                    $('#AcceptAllStudentsModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });

    // ACCEPT ALL Instructors ACCOUNT
    $(document).on('click', '#AcceptAllInstructors', function (e) {
        e.preventDefault();
        var formData = $('#AcceptAllInstructorsForm').serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            data: formData + '&AcceptAllInstructors=AcceptAllInstructors',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#alertAcceptAllInstructors').removeClass('d-none');
                    $('#alertAcceptAllInstructors').addClass('d-block');
                    $('#AcceptAllInstructorsModalFooterOne').removeClass('d-block');
                    $('#AcceptAllInstructorsModalFooterOne').addClass('d-none');
                    $('#warningAcceptAllInstructors').addClass('d-none');
                    $('#warningAcceptAllInstructors').removeClass('d-block');
                    $('#AcceptAllInstructorsModalFooterTwo').removeClass('d-none');
                    $('#AcceptAllInstructorsModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonAcceptAllInstructorsOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonAcceptAllInstructorsTwo").click(function () {
                        location.reload();
                    });

                    $('#AcceptAllInstructorsModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });

    // ACCEPT ALL DeptHead ACCOUNT
    $(document).on('click', '#AcceptAllDeptHead', function (e) {
        e.preventDefault();
        var formData = $('#AcceptAllDeptHeadForm').serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            data: formData + '&AcceptAllDeptHead=AcceptAllDeptHead',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#alertAcceptAllDeptHead').removeClass('d-none');
                    $('#alertAcceptAllDeptHead').addClass('d-block');
                    $('#AcceptAllDeptHeadModalFooterOne').removeClass('d-block');
                    $('#AcceptAllDeptHeadModalFooterOne').addClass('d-none');
                    $('#warningAcceptAllDeptHead').addClass('d-none');
                    $('#warningAcceptAllDeptHead').removeClass('d-block');
                    $('#AcceptAllDeptHeadModalFooterTwo').removeClass('d-none');
                    $('#AcceptAllDeptHeadModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonAcceptAllDeptHeadOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonAcceptAllDeptHeadTwo").click(function () {
                        location.reload();
                    });

                    $('#AcceptAllDeptHeadModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });

    // ACCEPT ALL Dean ACCOUNT
    $(document).on('click', '#AcceptAllDean', function (e) {
        e.preventDefault();
        var formData = $('#AcceptAllDeanForm').serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            data: formData + '&AcceptAllDean=AcceptAllDean',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#alertAcceptAllDean').removeClass('d-none');
                    $('#alertAcceptAllDean').addClass('d-block');
                    $('#AcceptAllDeanModalFooterOne').removeClass('d-block');
                    $('#AcceptAllDeanModalFooterOne').addClass('d-none');
                    $('#warningAcceptAllDean').addClass('d-none');
                    $('#warningAcceptAllDean').removeClass('d-block');
                    $('#AcceptAllDeanModalFooterTwo').removeClass('d-none');
                    $('#AcceptAllDeanModalFooterTwo').addClass('d-block');

                    $("#ModalCloseButtonAcceptAllDeanOne").click(function () {
                        location.reload();
                    });

                    $("#ModalCloseButtonAcceptAllDeanTwo").click(function () {
                        location.reload();
                    });

                    $('#AcceptAllDeanModal').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                }
            }
        });
    });

    // FETCH GET Send MESSAGE
    $(document).on('click', '#GetSendMessage', function (e) {
        e.preventDefault();
        var GetSendMessageBtn = $(this).data('id');
        //alert(per_id);
        $('#SendMessageContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
            type: 'POST',
            data: 'GetSendMessageBtn=' + GetSendMessageBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#SendMessageContentData').html('');
            $('#SendMessageContentData').html(data);
        }).fail(function () {
            $('#SendMessageContentData').html('<p>Error</p>');
        });
    });

    // FETCH GET Send MESSAGE
    $(document).on('click', '#SendMessage', function (e) {
        e.preventDefault();
        const SendMessageContent = $('#SendMessageContent').val();
        var errSendMessageContent = '';
        if (SendMessageContent == '') {
            errSendMessageContent = '<li> Please type a message before sending! </li>';
            $("#alertSendMessageError").removeClass("d-none");
            $("#alertSendMessageError").addClass("d-block");
            $("#errSendMessageContent").removeClass("d-none");
            $("#errSendMessageContent").addClass("d-block");
            $("#errSendMessageContent").html(errSendMessageContent);
            $('#SendMessageContent').addClass('border-danger');
        } else {
            $("#alertSendMessageError").addClass("d-none");
            $("#alertSendMessageError").removeClass("d-block");
            $("#errSendMessageContent").addClass("d-none");
            $("#errSendMessageContent").removeClass("d-block");
            $("#errSendMessageContent").html('');
            $('#SendMessageContent').removeClass('border-danger');

            var formData = $('#SendMessageForm').serialize();
            console.log(formData);
            $.ajax({
                method: 'post',
                url: baseUrl + '/app/controllers/crud/crudAccountRequest.php',
                data: formData + '&SendMessage=SendMessage',
                dataType: 'JSON',
                success: function (feedback) {
                    if (feedback.status === "error") {
                        $("#alertSendMessageError").addClass("d-block");
                        $("#alertSendMessageError").removeClass("d-none");

                        $("#errSendMessageAll").removeClass("d-none");
                        $("#errSendMessageAll").addClass("d-block");
                        $("#errSendMessageAll").html(feedback.errAll);
                    } else if (feedback.status === "success") {
                        $("#alertSendMessageSuccess").removeClass("d-none");
                        $("#alertSendMessageSuccess").addClass("d-block");

                        $("#succMsgSendMessageAll").removeClass("d-none");
                        $("#succMsgSendMessageAll").addClass("d-block");
                        $("#succMsgSendMessageAll").html(feedback.message);
                        $('#SendMessageContent').val('');

                        setTimeout(function () {
                            $("#alertSendMessageSuccess").removeClass('d-block');
                            $("#alertSendMessageSuccess").addClass('d-none');
                            $("#succMsgSendMessageAll").addClass('d-none');
                            $("#succMsgSendMessageAll").removeClass('d-block');
                        }, 5000);

                        // $("#ModalCloseButtonSendMessageOne").click(function () {
                        //     location.reload()
                        // });

                        // $("#ModalCloseButtonSendMessageTwo").click(function () {
                        //     location.reload()
                        // });

                        // $('#SendMessageModal').on('hidden.bs.modal', function () {
                        //     location.reload();
                        // });
                    }
                }
            });

        }
    });

});