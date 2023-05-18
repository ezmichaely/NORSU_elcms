<div class="profile-top">
    <div class="profile-top-container">
        <div class="profile-cover-wrapper ">
            <div class="profile-cover img-placeholder rounded  ">
                <img src="<?php echo BASE_URL . $u_profilecover ?>" id="MyCoverPhoto"
                    class="coverphoto img-thumbnail img-fluid">
            </div>
        </div>

        <div class="profile-picture-container">
            <div class="profile-picture-wrapper">
                <div class="profile-picture img-placeholder">
                    <img src="<?php echo BASE_URL . $u_profilephoto ?>" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>

    <div class="profile-name text-center">
        <h1 class="text-uppercase fw-bold text-wrap mt-4"><?php echo $u_fullname; ?></h1>
        <div class="d-flex justify-content-center align-items-center flex-row flex-wrap">
            <h6 class="text-muted fw-bold font-brand text-lowercase">
                @<?php echo $u_aau ?> •&nbsp;
            </h6>
            <h6 class="text-muted text-uppercase fw-bold">
                <?php echo $u_atatn?>
            </h6>
        </div>
    </div>

    <div class="hr-1 bg-gray-300 my-3"></div>

    <div class="card p-2 profile-tabs">
        <div class="d-flex justify-content-between align-items-center flex-row flex-wrap">
            <div class="profile-tabs-buttons">
                <div class="d-flex justify-content-between align-items-center flex-row flex-wrap">
                    <button id="btnProfileTimeline" class="btn btn-outline-primary profile-tabs-buttons active">
                        TIMELINE
                    </button>

                    <button id="btnProfileAbout" class="btn btn-outline-primary profile-tabs-buttons">
                        ABOUT
                    </button>
                </div>
            </div>

            <div class="">
                <!-- IF NOT IN CONTACT LIST -->
                <?php if($contact == 0): ?>
                <form method="POST" id="AddContactForm">
                    <input type="text" id="AddContactSender" name="AddContactSender" class="form-control"
                        value="<?php echo $s_aid;?>" readonly hidden>
                    <input type="text" id="AddContactReceiver" name="AddContactReceiver" class="form-control"
                        value="<?php echo $u_aid;?>" readonly hidden>
                    <button type="submit" id="AddContact" name="AddContact" class="btn btn-primary ispan-md">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="ms-2"> ADD CONTACT </span>
                    </button>
                </form>
                <?php endif; ?>

                <!-- IF IN CONTACT LIST -->
                <?php if($contact != 0): ?>
                <a href="<?php echo BASE_URL .'/'. $s_directory. '/messages.php?m='.$u_aid;?>"
                    class="btn btn-primary ispan-md" id="SendAMessage">
                    <i class="fa-brands fa-facebook-messenger"></i>
                    <span class="ms-2"> message </span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="profile-bottom my-2">
    <div id="divProfileTimeline" class="d-block">
        <div class="row g-2">
            <div class="col-lg-4 d-none d-lg-block">
                <div class="card">
                    <div class="personal_info">
                        <div class="card-header fw-bold text-uppercase">
                            PERSONAL INFORMATION
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-solid fa-location-dot fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $u_aaa; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-envelope fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-lowercase font-text text-dark lh-1">
                                    <?php echo $u_aae; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-phone fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $u_aac; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-cake-candles fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $u_aadobfjy; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-venus-mars fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $u_aag; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($u_uuclid) || !empty($u_uudid) || !empty($u_uucrid) || !empty($u_uumid)) : ?>
                    <div class="educational_info">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            educational INFORMATION
                        </div>
                        <div class="card-body">
                            <?php if(!empty($u_uuclid)) : ?>
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-solid fa-bank fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $u_clcln; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uudid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-door-open fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark">
                                    <?php echo $u_ddn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uucrid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-graduation-cap fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $u_crcrn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uumid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-star fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $u_mmn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="social_media">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            social media
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-brands fa-facebook fs-4 text-facebook text-center w-10min"></i>
                                <a href="<?php echo $u_uufblink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uufb ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-instagram-square fs-4 text-instagram text-center w-10min"></i>
                                <a href="<?php echo $u_uuiglink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uuig ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-twitter fs-4 text-twitter text-center w-10min"></i>
                                <a href="<?php echo $u_uutwlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uutw ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-youtube fs-4 text-youtube text-center w-10min"></i>
                                <a href="<?php echo $u_uuytlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uuyt ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="d-flex justify-content-start align-self-center flex-column">
                    <input type="text" id="ViewProfileID" name="ViewProfileID" value="<?php echo $u_aid ?>" hidden
                        readonly>
                    <!-- FETCH POSTS -->
                    <div id="PostBox"></div>
                </div>
            </div>

        </div>
    </div>

    <div id="divProfileAbout" class="d-none">
        <div class="card border-top-0">
            <div class="row m-0 p-0 g-0">
                <div class="w-50-md border-end-md">
                    <div class="personal_info">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            PERSONAL INFORMATION
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center flex-row ">
                                <i class="fa-solid fa-id-card fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1 text-capitalize">
                                    <?php echo $u_fullname ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-location-dot fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_aaa; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-envelope fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1 text-lowercase">
                                    <?php echo $u_aae; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-phone fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_aac; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-cake-candles fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_aadobfjy; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-venus-mars fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_aag; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-50-md">
                    <div class="other_details">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            other details about me
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-start flex-row">
                                <i class="fa-solid fa-user-pen fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $u_uuam; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i
                                    class="fa-solid fa-image-polaroid-user fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1 ">
                                    <?php echo $u_uuon; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i class="fa-solid fa-user-music fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_uunp; ?>
                                </a>
                            </div>



                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i class="fa-solid fa-message-quote fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $u_uufq; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-0 p-0 g-0">
                <div class="w-50-md border-end-md">
                    <?php if(!empty($u_uuclid) || !empty($u_uudid) || !empty($u_uucrid) || !empty($u_uumid)) : ?>
                    <div class="educational_info">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            educational INFORMATION
                        </div>
                        <div class="card-body">
                            <?php if(!empty($u_uuclid)) : ?>
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-solid fa-bank fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $u_clcln; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uudid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-door-open fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text  lh-1 ">
                                    <?php echo $u_ddn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uucrid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-graduation-cap fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $u_crcrn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($u_uumid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-star fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $u_mmn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="w-50-md">
                    <?php endif; ?>
                    <div class="social_media">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            social media
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-brands fa-facebook fs-3 text-facebook text-center w-40px-min"></i>
                                <a href="<?php echo $u_uufblink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uufb ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-instagram-square fs-3 text-instagram text-center w-40px-min"></i>
                                <a href="<?php echo $u_uuiglink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uuig ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-twitter fs-3 text-twitter text-center w-40px-min"></i>
                                <a href="<?php echo $u_uutwlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uutw ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-youtube fs-3 text-youtube text-center w-40px-min"></i>
                                <a href="<?php echo $u_uuytlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $u_uuyt ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
