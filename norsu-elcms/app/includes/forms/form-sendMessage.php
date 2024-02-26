<form method="POST" id="SendMessageForm">
    <div class="modal-header">
        <h5 class="modal-title" id="SendMessageModalLabel">
            SEND MESSAGE
        </h5>
        <button id="ModalCloseButtonSendMessageOne" type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul id="alertSendMessageSuccess" class="d-none alert alert-success">
            <li id="succMsgSendMessageAll" class="d-none"></li>
        </ul>

        <ul id="alertSendMessageError" role="alert" class="d-none alert alert-danger">
            <li id="errSendMessageContent" class="d-none"></li>
        </ul>

        <div class="d-none">
            <input type="text" id="SendMessageReceiver" name="SendMessageReceiver" class="form-control border-primary"
                value="<?php echo $aid; ?>" readonly />
            <input type="text" id="SendMessageSender" name="SendMessageSender" class="form-control border-primary"
                value="<?php echo $s_aid; ?>" readonly />
        </div>

        <div class="mt-0">
            <label class="form-label">
                Name </label>
            <input type="text" id="SendMessageFullname" name="SendMessageFullname" class="form-control border-primary"
                value="<?php echo $fullname; ?>" readonly />
        </div>

        <div class="mt-1">
            <label class="form-label">
                MESSAGE <span class="text-danger">*</span></label>
            <textarea id="SendMessageContent" name="SendMessageContent" placeholder="Type Message"
                class="form-control border-primary"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times"></i>
            <span class="ms-1">CLOSE</span>
        </button>

        <button type="submit" id="SendMessage" name="SendMessage" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane"></i>
            <span class="ms-1">SEND</span>
        </button>
    </div>
</form>
