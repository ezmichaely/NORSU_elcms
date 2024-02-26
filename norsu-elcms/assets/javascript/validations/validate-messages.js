function GetThisMessage(sender, receiver) {
    // console.log(sender, receiver);
    var response1 = 'reachedMax';
    var response2 = 'No Conversation yet.';
    var response2html = '<div class="noconvo">No Conversation yet. </div>';
    setInterval(function () {
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudMessage.php',
            dataType: 'TEXT',
            data: {
                sender: sender,
                receiver: receiver,
                GetThisMessage: 'GetThisMessage'
            },
            success: function (response) {
                if (response == response1) {

                } else {
                    if (response == response2) {
                        $('#MessageList').html('');
                        $('#MessageList').append(response2html);
                    } else {

                        $('#MessageList').html('');
                        $('#MessageList').append(response);
                        $('#MessageList').animate({
                            scrollTop: $('#MessageList').get(0).scrollHeight
                        }, 100);

                    }
                }
            }
        });
    }, 1000);
}

// setInterval(GetThisMessage(), 1000);

function GetThisReceiverInfo(receiver) {
    $.ajax({
        method: 'POST',
        url: baseUrl + '/app/controllers/crud/crudContacts.php',
        dataType: 'JSON',
        data: {
            receiver: receiver,
            GetThisReceiverInfo: 'GetThisReceiverInfo'
        },
        success: function (response) {
            if (response.status = 'success') {
                if ($('#MessageListPanel').hasClass('d-none')) {
                    $('#MessageListPanel').addClass('d-block');
                    $('#MessageListPanel').removeClass('d-none');
                    $("#ContactProfileUrl").attr('href', response.url);
                    $("#ContactFullname").text(response.fullname);
                    $('#ContactProfilePhoto').attr('src', response.profilephoto);
                    $('#MessageReceiver').attr('value', response.mgsreceiver);
                    GetThisMessage(response.mgssender, response.mgsreceiver);
                } else {
                    if ($('#MessageListPanel').hasClass('d-block')) {
                        $("#ContactProfileUrl").attr('href', response.url);
                        $("#ContactFullname").text(response.fullname);
                        $('#ContactProfilePhoto').attr('src', response.profilephoto);
                        $('#MessageReceiver').attr('value', response.mgsreceiver);
                        GetThisMessage(response.mgssender, response.mgsreceiver);
                    }
                }
            }
        }
    });

}

$(document).ready(function () {
    $('#MessageSendForm').on('submit', function (e) {
        e.preventDefault();
        var MessageContext = $('#MessageContext').val();
        var MessageSender = $('#MessageSender').val();
        var MessageReceiver = $('#MessageReceiver').val();
        if (MessageContext == '') {

        } else {
            $.ajax({
                method: 'POST',
                url: baseUrl + '/app/controllers/crud/crudMessage.php',
                dataType: 'JSON',
                data: {
                    MessageContext: MessageContext,
                    MessageSender: MessageSender,
                    MessageReceiver: MessageReceiver,
                    MessageSend: 'MessageSend'
                },
                success: function (feedback) {
                    if (feedback.status == 'success') {
                        GetThisMessage(feedback.sender, feedback.receiver);
                        $('#MessageContext').val('');
                    }
                }
            });
        }
    });
});