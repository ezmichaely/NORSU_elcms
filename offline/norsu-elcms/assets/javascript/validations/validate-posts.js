var start = 0;
var limit = 1000000000000;
const post = $('#PostCode').val();


function fetchAllPosts() {
    var response1 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
    var response2 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
    $.ajax({
        method: 'POST',
        url: baseUrl + '/app/controllers/crud/crudPost.php',
        dataType: 'text',
        data: {
            fetchAllPosts: 1,
            start: start,
            limit: limit
        },
        success: function (response) {
            if (response == response1) {
                $('#PostBox').html('');
                $('#PostBox').append(response);
                start += limit;
                fetchMyPosts(start, limit);
            } else {
                if (response == response2) {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                } else {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                    $('#PostBox').append(response1);
                }
            }
        }
    });
}

function fetchMyPosts() {
    var response1 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
    var response2 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
    $.ajax({
        method: 'POST',
        url: baseUrl + '/app/controllers/crud/crudPost.php',
        dataType: 'text',
        data: {
            fetchMyPosts: 1,
            start: start,
            limit: limit
        },
        success: function (response) {
            if (response == response1) {
                $('#PostBox').html('');
                $('#PostBox').append(response);
                start += limit;
                fetchMyPosts(start, limit);
            } else {
                if (response == response2) {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                } else {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                    $('#PostBox').append(response1);
                }
            }
        }
    });
}


function fetchThisPosts() {
    const ViewProfileID = $('#ViewProfileID').val();
    // console.log(ViewProfileID);
    var response1 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">All&nbsp;Post&nbsp;are&nbsp;loaded!</h6><div class="hr-1 bg-gray-300"></div></div>';
    var response2 = '<div class="d-flex justify-content-between align-items-center flex-row"><div class="hr-1 bg-gray-300"></div><h6 class="fw-bold text-center hl-1 text-uppercase m-0 p-0 px-2">No&nbsp;Post&nbsp;yet!</h6><div class="hr-1 bg-gray-300"></div></div>';
    $.ajax({
        method: 'POST',
        url: baseUrl + '/app/controllers/crud/crudPost.php',
        dataType: 'text',
        data: {
            uid: ViewProfileID,
            fetchThisPosts: 1,
            start: start,
            limit: limit
        },
        success: function (response) {
            if (response == response1) {
                $('#PostBox').html('');
                $('#PostBox').append(response);
                start += limit;
                fetchThisPosts(start, limit);
            } else {
                if (response == response2) {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                } else {
                    $('#PostBox').html('');
                    $('#PostBox').append(response);
                    $('#PostBox').append(response1);
                }
            }
        }
    });
}

function fetchAllComments() {
    $.ajax({
        method: 'POST',
        url: baseUrl + '/app/controllers/crud/crudPost.php',
        dataType: 'text',
        data: {
            fetchAllComments: 'fetchAllComments',
            start: start,
            limit: limit,
            post: post
        },
        success: function (response) {
            if (response == 'reachedMax') {
                $('#CommentsDiv').html('');
                $('#CommentsDiv').append(response);
                start += limit;
                fetchAllComments(post, start, limit);
            } else {
                $('#CommentsDiv').html('');
                $('#CommentsDiv').append(response);
            }
        }
    });
}


$(document).ready(function () {
    // ADD Profile POSTS
    $("#AddPostProfileForm").on('submit', function (e) {
        e.preventDefault();
        const AddPostContent = $('#AddPostContent').val();
        const AddPostFile = $('#AddPostFile').val();
        var regexFile = /([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg|.bmp|.pdf|.doc|.docx|.pptx|.ppt|.xls|.xlsx)$/;
        var errAddPostAll = '';
        var errAddPostFile = '';
        if (AddPostContent == '' && AddPostFile == '') {
            return false;
        } else {
            if (AddPostFile != '') {
                if (!regexFile.test(AddPostFile)) {
                    errAddPostFile = '<li> Please upload a file containing the following extensions: </br> for image => [.png, .jpg, .jpeg, and .bmp] </br> for document => [.pdf, .doc, .docx, .pptx, .ppt, .xls, and .xlsx only]. </li>';
                    $("#errAddPostFile").removeClass("d-none");
                    $("#errAddPostFile").addClass("d-block");
                    $("#errAddPostFile").html(errAddPostFile);
                    $("#AddPostFile").addClass("border-danger");
                } else {
                    errAddPostFile = '';
                    $("#errAddPostFile").removeClass("d-block");
                    $("#errAddPostFile").addClass("d-none");
                    $("#errAddPostFile").html(errAddPostFile);
                    $("#AddPostFile").removeClass("border-danger");
                }
            }
        }

        if (errAddPostAll != '' || errAddPostFile != '') {
            $("#alertAddPostError").addClass("d-block");
            $("#alertAddPostError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddPostError").removeClass("d-block");
            $("#alertAddPostError").addClass("d-none");

            if (errAddPostFile == '') {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudPost.php',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddPostError").addClass("d-block");
                            $("#alertAddPostError").removeClass("d-none");

                            $("#errAddPostAll").removeClass("d-none");
                            $("#errAddPostAll").addClass("d-block");
                            $("#errAddPostAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            if ($("#alertAddPostError").hasClass("d-block")) {
                                $("#alertAddPostError").addClass("d-none");
                                $("#alertAddPostError").removeClass("d-block");

                                $("#errAddPostAll").addClass("d-none");
                                $("#errAddPostAll").removeClass("d-block");
                                $("#errAddPostAll").html('');
                            }

                            fetchMyPosts();

                            $("#alertAddPostSuccess").addClass("d-block");
                            $("#alertAddPostSuccess").removeClass("d-none");

                            $("#succMsgAddPostAll").removeClass("d-none");
                            $("#succMsgAddPostAll").addClass("d-block");
                            $("#succMsgAddPostAll").html(feedback.message);
                            $("#AddPostProfileForm")[0].reset();

                            setTimeout(function () {
                                $("#alertAddPostSuccess").removeClass('d-block');
                                $("#alertAddPostSuccess").addClass('d-none');
                                $("#succMsgAddPostAll").removeClass('d-block');
                                $("#succMsgAddPostAll").addClass('d-none');
                                $("#succMsgAddPostAll").html('');
                            }, 10000);
                        }
                    }
                });
            }
        }


    });

    // FETCH GET DELETE POST FORM PROFILE
    $(document).on('click', '#GetDeletePostProfile', function (e) {
        e.preventDefault();
        var GetDeletePostProfileBtn = $(this).data('post');
        //alert(per_id);
        $('#GetDeletePostProfileContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            type: 'POST',
            data: 'GetDeletePostProfileBtn=' + GetDeletePostProfileBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#DeletePostProfileContentData').html('');
            $('#DeletePostProfileContentData').html(data);
        }).fail(function () {
            $('#DeletePostProfileContentData').html('<p>Error</p>');
        });
    });

    // DELETE POSTS form profile
    $(document).on('click', '#DeletePostProfile', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            data: 'DeletePostProfileCode=' + $('#DeletePostProfileCode').val() + '&action=DeletePostProfile',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#AlertDeletePostProfile').removeClass('d-none');
                    $('#AlertDeletePostProfile').addClass('d-block');
                    $('#DeletePostProfileModalFooterOne').removeClass('d-block');
                    $('#DeletePostProfileModalFooterOne').addClass('d-none');
                    $('#WarningDeletePostProfile').addClass('d-none');
                    $('#WarningDeletePostProfile').removeClass('d-block');
                    $('#DeletePostProfileModalFooterTwo').removeClass('d-none');
                    $('#DeletePostProfileModalFooterTwo').addClass('d-block');
                    // fetchMyPosts();

                    $("#ModalCloseButtonDeletePostProfileOne").click(function () {
                        fetchMyPosts();
                    });

                    $("#ModalCloseButtonDeletePostProfileTwo").click(function () {
                        fetchMyPosts();
                    });

                    $('#DeletePostProfileModal').on('hidden.bs.modal', function () {
                        fetchMyPosts();
                    });
                }
            }
        });
    });

    // ADD Index POSTS
    $("#AddPostIndexForm").on('submit', function (e) {
        e.preventDefault();
        const AddPostContent = $('#AddPostContent').val();
        const AddPostFile = $('#AddPostFile').val();
        var regexFile = /([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg|.bmp|.pdf|.doc|.docx|.pptx|.ppt|.xls|.xlsx)$/;
        var errAddPostAll = '';
        var errAddPostFile = '';
        if (AddPostContent == '' && AddPostFile == '') {
            return false;
        } else {
            if (AddPostFile != '') {
                if (!regexFile.test(AddPostFile)) {
                    errAddPostFile = '<li> Please upload a file containing the following extensions: </br> for image => [.png, .jpg, .jpeg, and .bmp] </br> for document => [.pdf, .doc, .docx, .pptx, .ppt, .xls, and .xlsx only]. </li>';
                    $("#errAddPostFile").removeClass("d-none");
                    $("#errAddPostFile").addClass("d-block");
                    $("#errAddPostFile").html(errAddPostFile);
                    $("#AddPostFile").addClass("border-danger");
                } else {
                    errAddPostFile = '';
                    $("#errAddPostFile").removeClass("d-block");
                    $("#errAddPostFile").addClass("d-none");
                    $("#errAddPostFile").html(errAddPostFile);
                    $("#AddPostFile").removeClass("border-danger");
                }
            }
        }

        if (errAddPostAll != '' || errAddPostFile != '') {
            $("#alertAddPostError").addClass("d-block");
            $("#alertAddPostError").removeClass("d-none");
            return false;
        } else {
            $("#alertAddPostError").removeClass("d-block");
            $("#alertAddPostError").addClass("d-none");

            if (errAddPostFile == '') {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/app/controllers/crud/crudPost.php',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (feedback) {
                        if (feedback.status === "error") {
                            $("#alertAddPostError").addClass("d-block");
                            $("#alertAddPostError").removeClass("d-none");

                            $("#errAddPostAll").removeClass("d-none");
                            $("#errAddPostAll").addClass("d-block");
                            $("#errAddPostAll").html(feedback.errAll);
                        } else if (feedback.status === "success") {
                            if ($("#alertAddPostError").hasClass("d-block")) {
                                $("#alertAddPostError").addClass("d-none");
                                $("#alertAddPostError").removeClass("d-block");

                                $("#errAddPostAll").addClass("d-none");
                                $("#errAddPostAll").removeClass("d-block");
                                $("#errAddPostAll").html('');
                            }

                            fetchAllPosts();

                            $("#alertAddPostSuccess").addClass("d-block");
                            $("#alertAddPostSuccess").removeClass("d-none");

                            $("#succMsgAddPostAll").removeClass("d-none");
                            $("#succMsgAddPostAll").addClass("d-block");
                            $("#succMsgAddPostAll").html(feedback.message);
                            $("#AddPostIndexForm")[0].reset();

                            setTimeout(function () {
                                $("#alertAddPostSuccess").removeClass('d-block');
                                $("#alertAddPostSuccess").addClass('d-none');
                                $("#succMsgAddPostAll").removeClass('d-block');
                                $("#succMsgAddPostAll").addClass('d-none');
                                $("#succMsgAddPostAll").html('');
                            }, 10000);
                        }
                    }
                });
            }
        }


    });

    // FETCH GET DELETE POST FORM Index
    $(document).on('click', '#GetDeletePostIndex', function (e) {
        e.preventDefault();
        var GetDeletePostIndexBtn = $(this).data('post');
        //alert(per_id);
        $('#GetDeletePostIndexContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            type: 'POST',
            data: 'GetDeletePostIndexBtn=' + GetDeletePostIndexBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#DeletePostIndexContentData').html('');
            $('#DeletePostIndexContentData').html(data);
        }).fail(function () {
            $('#DeletePostIndexContentData').html('<p>Error</p>');
        });
    });

    // DELETE POSTS from index
    $(document).on('click', '#DeletePostIndex', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            data: 'DeletePostIndexCode=' + $('#DeletePostIndexCode').val() + '&action=DeletePostIndex',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#AlertDeletePostIndex').removeClass('d-none');
                    $('#AlertDeletePostIndex').addClass('d-block');
                    $('#DeletePostIndexModalFooterOne').removeClass('d-block');
                    $('#DeletePostIndexModalFooterOne').addClass('d-none');
                    $('#WarningDeletePostIndex').addClass('d-none');
                    $('#WarningDeletePostIndex').removeClass('d-block');
                    $('#DeletePostIndexModalFooterTwo').removeClass('d-none');
                    $('#DeletePostIndexModalFooterTwo').addClass('d-block');
                    // fetchMyPosts();

                    $("#ModalCloseButtonDeletePostIndexOne").click(function () {
                        fetchAllPosts();
                    });

                    $("#ModalCloseButtonDeletePostIndexTwo").click(function () {
                        fetchAllPosts();
                    });

                    $('#DeletePostIndexModal').on('hidden.bs.modal', function () {
                        fetchAllPosts();
                    });
                }
            }
        });
    });

    // FETCH GET DELETE POST FORM View
    $(document).on('click', '#GetDeletePostView', function (e) {
        e.preventDefault();
        var GetDeletePostViewBtn = $(this).data('post');
        //alert(per_id);
        $('#GetDeletePostViewContentData').html('');
        $.ajax({
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            type: 'POST',
            data: 'GetDeletePostViewBtn=' + GetDeletePostViewBtn,
            dataType: 'html'
        }).done(function (data) {
            $('#DeletePostViewContentData').html('');
            $('#DeletePostViewContentData').html(data);
        }).fail(function () {
            $('#DeletePostViewContentData').html('<p>Error</p>');
        });
    });

    // DELETE POSTS from View
    $(document).on('click', '#DeletePostView', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudPost.php',
            data: 'DeletePostViewCode=' + $('#DeletePostViewCode').val() + '&action=DeletePostView',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === "success") {
                    $('#AlertDeletePostView').removeClass('d-none');
                    $('#AlertDeletePostView').addClass('d-block');
                    $('#DeletePostViewModalFooterOne').removeClass('d-block');
                    $('#DeletePostViewModalFooterOne').addClass('d-none');
                    $('#WarningDeletePostView').addClass('d-none');
                    $('#WarningDeletePostView').removeClass('d-block');
                    $('#DeletePostViewModalFooterTwo').removeClass('d-none');
                    $('#DeletePostViewModalFooterTwo').addClass('d-block');
                    // fetchMyPosts();

                    $("#ModalCloseButtonDeletePostViewOne").click(function () {
                        location.href = baseUrl + '/' + (feedback.directory) + '/index.php';
                    });

                    $("#ModalCloseButtonDeletePostViewTwo").click(function () {
                        location.href = baseUrl + '/' + (feedback.directory) + '/index.php';
                    });

                    $('#DeletePostViewModal').on('hidden.bs.modal', function () {
                        location.href = baseUrl + '/' + (feedback.directory) + '/index.php';
                    });
                }
            }
        });
    });

    // add comment
    $("#AddCommentForm").on('submit', function (e) {
        e.preventDefault();
        const comment = $('#CommentContent').val();

        if (comment == '') {

        } else if (comment != '') {
            var formData = $("#AddCommentForm").serialize();
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: baseUrl + '/app/controllers/crud/crudPost.php',
                data: formData,
                dataType: 'JSON',
                success: function (feedback) {
                    if (feedback.status === 'success') {
                        $('#CommentContent').val('');
                        fetchAllComments();
                    }
                }
            });
        }
    });

});