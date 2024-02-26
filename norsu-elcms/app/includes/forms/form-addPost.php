<div class="card bg-white p-3 border">
    <h4 class="font-title text-uppercase fw-bold text-muted lh-1 m-0 p-0">Post Timeline</h4>

    <?php if ($page == 'profile') : ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="AddPostProfileForm">
        <?php endif; ?>
        <?php if ($page == 'home') : ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="AddPostIndexForm">
            <?php endif; ?>

            <ul id="alertAddPostSuccess" role="alert" class="d-none alert alert-success my-0 mt-2">
                <li id="succMsgAddPostAll" class="d-none"></li>
            </ul>

            <ul id="alertAddPostError" role="alert" class="d-none alert alert-danger my-0 mt-2">
                <li id="errAddPostAll" class="d-none"></li>
                <li id="errAddPostFile" class="d-none"></li>
            </ul>

            <div class="mt-2">
                <textarea id="AddPostContent" name="AddPostContent" class="form-control textarea-3 border-primary"
                    placeholder="What are you thinking?"></textarea>
            </div>

            <div class="mt-2 d-flex justify-content-betweeen align-items-center flex-row">
                <input id="AddPostFile" name="AddPostFile" class="form-control border-primary me-2" type="file">
                <button id="AddPost" name="AddPost" type="submit" class="btn btn-primary">POST</button>
            </div>
        </form>
</div>
