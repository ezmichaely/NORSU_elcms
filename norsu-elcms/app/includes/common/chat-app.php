<div class="messages card">
    <?php if(!empty(isset($_GET['m']))) : ?>
    <input type="text" id="get_receiver" value="<?php echo $receiver; ?>" hidden>
    <?php endif; ?>

    <input id="SessionUserID" type="text" class="form-control" value="<?php echo $s_aid; ?>" hidden>

    <div class="contact-list">
        <div class="card-header ispan-md">
            <i class="fa-brands fa-facebook-messenger"></i>
            <span class="ms-2">MESSAGES</span>
        </div>
        <div class="card-search border-bottom">
            <div class="dropdown w-100">
                <input type="search" class="form-control" id="SearchUsers" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div class="card-body">
            <div id="ContactLists" class="list-group">

            </div>
        </div>
    </div>
    <div id="MessageListPanel" class="message-list d-none">
        <div class="message-list-content">
            <div class="card-header">
                <a id="ContactProfileUrl" href="">
                    <div class="img-placeholder pp-message">
                        <img id="ContactProfilePhoto" src="" alt="profile-picture">
                    </div>
                    <span id="ContactFullname" class="fs-5">
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div id="MessageList">
                </div>
            </div>

            <div class="card-footer">
                <form class="w-100" id="MessageSendForm">
                    <div class="d-flex justify-content-start align-items-center flex-row">
                        <input type="text" class="form-control flex-grow" id="MessageSender" name="MessageSender"
                            value="<?php echo $s_aid;?>" hidden>
                        <input type="text" class="form-control flex-grow" id="MessageReceiver" name="MessageReceiver"
                            value="" hidden>
                        <input type="text" class="form-control flex-grow" id="MessageContext" name="MessageContext">
                        <button type="submit" id="MessageSend" class="ms-2 btn btn-primary">send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
