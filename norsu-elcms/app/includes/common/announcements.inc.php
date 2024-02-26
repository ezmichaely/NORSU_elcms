<div class="announcements">
    <div class="row g-2">
        <div class="announcements-left col-lg-3">
            <div class="card">
                <h5 class="card-header p-3 bg-primary text-uppercase fw-bolder text-white text-center">
                    ANNOUNCEMENT LISTS
                </h5>
                <div class="card-body px-0">
                    <div class="px-3">
                        <?php if($s_aat == '4' || $s_aat == '5') :?>
                        <button id="addAnnouncement" class="btn btn-success w-100 mb-1">
                            <i class="fa-solid fa-plus"></i>
                            <span> create </span>
                        </button>
                        <?php endif; ?>

                        <div class="list-group border"
                            style="max-height: 450px !important; overflow-y: auto !important">
                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action active font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                            <a href="announcement.php?id="
                                class="list-group-item list-group-item-action font-text fw-500">
                                <div class="d-flex justify-content-between align-items-start flex-column">
                                    <div class="lh-1 fs-6 flex-grow">
                                        Announcement Titlesdfsdf sdfsd sdfsd fsdf sdf sdf s
                                    </div>
                                    <div class="badge bg-danger text-white text-uppercase fs-8 mt-1">
                                        3 days ago
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="announcements-right col-lg-9">
            <?php if($s_aat == '4' || $s_aat == '5') :?>
            <div id="NewAnnouncement" class="card d-none">
                <form action="">
                    <div class="card-header p-3 bg-primary ">
                        <div class="d-flex justify-content-between align-items-center flex-row">
                            <h5 class="text-uppercase fw-bolder text-white text-start">
                                Create ANNOUNCEMENT
                            </h5>
                            <button id="NewAnnouncementBtnOne" type="button" class="btn-close"
                                aria-label="Close"></button>
                        </div>

                    </div>


                    <div class="card-body">

                        <ul id="alertAddAnnouncementSuccess" role="alert" class="d-none alert alert-success my-0">
                            <li id="succMsgAddAnnouncementAll" class="d-none"></li>
                        </ul>

                        <ul id="alertAddAnnouncementError" role="alert" class="d-none alert alert-danger my-0">
                            <li id="errAddAnnouncementAll" class="d-none"></li>
                            <li id="errAddAnnouncementTitle" class="d-none"></li>
                            <li id="errAddAnnouncementContent" class="d-none"></li>
                        </ul>

                        <div class="">
                            <label for="AnnouncementTitle">Announcement Title</label>
                            <input type="text" id="AnnouncementTitle" name="AnnouncementTitle"
                                class="form-control border-primary">
                        </div>

                        <div class="mt-2">
                            <label for="AnnouncementContent">Announcement Content</label>
                            <div class="border border-primary rounded overflow-hidden">
                                <textarea type="text" id="AnnouncementContent" name="AnnouncementContent"
                                    class="form-control border-primary"></textarea>
                            </div>
                        </div>

                        <div class="mt-2 text-end">
                            <button id="NewAnnouncementBtnTwo" type="button" class=" btn btn-secondary"
                                aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                                <span> close </span>
                            </button>

                            <!-- <button id="NewAnnouncementBtnTwo" class="btn btn-secondary">
                                <i class="fa-solid fa-xmark"></i>
                                <span> close </span>
                            </button> -->
                            <button class="btn btn-success">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span> submit </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>


            <div id="AnnouncementDiv" class="card d-block">
                <h5 class="card-header p-3 bg-primary text-uppercase fw-bolder text-white text-start">
                    ANNOUNCEMENT title
                </h5>
                <div class="card-body p-0">
                    <div class="card-body-details px-3 py-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?php echo BASE_URL . '/'.$s_directory.'/profile.php?u='.$posterID ?>"
                                class="d-flex justify-content-start align-items-center flex-row flex-wrap fs-6 fw-bold text-uppercase font-title">
                                <span class="badge bg-primary fs-7"><?php echo $fullname; ?></span>
                                <span class="text-muted">&nbsp;•&nbsp;</span>
                                <span class="text-muted fs-7">postTime</span>
                                <span class="text-muted">&nbsp;•&nbsp;</span>
                                <span class="text-muted fs-7">postDate</span>
                            </a>
                        </div>
                    </div>

                    <div class="hr-1 bg-gray-300"></div>

                    <div class="card-body-content px-3 py-2">
                        content
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
