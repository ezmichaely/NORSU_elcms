<div class="profile-top">
    <div class="profile-top-container">
        <div class="profile-cover-wrapper ">
            <div class="profile-cover img-placeholder rounded  ">
                <img src="<?php echo BASE_URL . $s_profilecover ?>" class="coverphoto img-thumbnail img-fluid">
            </div>

            <div class="profile-cover-form">
                <!-- <form method="POST" enctype="multipart/form-data" id="profile-cover-form">
                <label for="profile-cover-input" class="btn btn-light border border-gray-300">
                        <i class="fa-solid fa-camera"></i>
                        <span class="ms-1">EDIT COVER PHOTO</span>
                    </label>


                <input type="file" name="change-profile-cover" id="profile-cover-input" hidden>
                </form> -->
                <div class="divpc">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning ispan-md btn-sm shadow" data-bs-toggle="modal"
                        id="profile-cover-input" data-bs-target="#EditProfileCoverModal">
                        <i class="fa-solid fa-camera"></i>
                        <span class="ms-1">EDIT COVER PHOTO</span>
                    </button>

                </div>
            </div>
        </div>

        <div class="profile-picture-container">
            <div class="profile-picture-wrapper">
                <div class="profile-picture img-placeholder">
                    <img src="<?php echo BASE_URL . $s_profilephoto ?>" class="img-thumbnail">
                </div>
                <div class=" profile-picture-form">
                    <!-- <form method="POST" enctype="multipart/form-data" id="profile-picture-form">
                        <label for="profile-picture-input"
                            class="btn btn-secondary p-0 img-placeholder profile-pic-nav">
                            <i class="fa-solid fa-image"></i>
                        </label>
                        <input type="file" name="change-profile-picture" hidden>
                    </form> -->
                    <div class="divpp">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning p-0 img-placeholder profile-pic-nav btn-sm shadow"
                            data-bs-toggle="modal" data-bs-target="#EditProfilePhotoModal" id="profile-picture-input">
                            <i class="fa-solid fa-image"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include ROOT_PATH . '/app/includes/modals/EditProfileImage.php'; ?>




    <div class="profile-name text-center">
        <h1 class="text-uppercase fw-bold text-wrap mt-4"><?php echo $s_fullname; ?></h1>
        <div class="d-flex justify-content-center align-items-center flex-row flex-wrap">
            <h6 class="text-muted fw-bold text-lowercase font-brand">
                @<?php echo $s_aau ?> •&nbsp;
            </h6>
            <h6 class="text-muted text-uppercase fw-bold">
                <?php echo $s_position?>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ispan-md" id="btnEditProfile">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="ms-2">EDIT PROFILE</span>
                </button>

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
                                    <?php echo $s_aaa; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-envelope fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-lowercase font-text text-dark lh-1">
                                    <?php echo $s_aae; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-phone fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $s_aac; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-cake-candles fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $s_aadobfjy ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-venus-mars fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 text-capitalize font-text text-dark lh-1">
                                    <?php echo $s_aag; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($s_uuclid) || !empty($s_uudid) || !empty($s_uucrid) || !empty($s_uumid)) : ?>
                    <div class="educational_info">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            educational INFORMATION
                        </div>
                        <div class="card-body">
                            <?php if(!empty($s_uuclid)) : ?>
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-solid fa-bank fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $s_clcln; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uudid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-door-open fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark">
                                    <?php echo $s_ddn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uucrid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-graduation-cap fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $s_crcrn; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uumid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-solid fa-star fs-4 text-center w-10min text-primary"></i>
                                <a class="ms-2 fw-500 lh-1 font-text text-dark ">
                                    <?php echo $s_mmn; ?>
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
                                <a href="<?php echo $s_uufblink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uufb ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-instagram-square fs-4 text-instagram text-center w-10min"></i>
                                <a href="<?php echo $s_uuiglink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uuig ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-twitter fs-4 text-twitter text-center w-10min"></i>
                                <a href="<?php echo $s_uutwlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uutw ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-youtube fs-4 text-youtube text-center w-10min"></i>
                                <a href="<?php echo $s_uuytlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uuyt ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- POSTS CONTAINER -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-start align-self-center flex-column">

                    <!-- ADD POST FORM -->
                    <?php include ROOT_PATH . '/app/includes/forms/form-addPost.php'?>

                    <div class="hr-1 bg-gray-300 my-2"></div>

                    <!-- FETCH POSTS -->
                    <div id="PostBox">
                    </div>
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
                                    <?php echo $s_fullname ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-location-dot fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_aaa ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-envelope fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1 text-lowercase">
                                    <?php echo $s_aae ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-phone fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_aac ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-cake-candles fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_aadobfjy; ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-venus-mars fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_aag; ?>
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
                                    <?php echo $s_uuam ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i
                                    class="fa-solid fa-image-polaroid-user fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1 ">
                                    <?php echo $s_uuon ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i class="fa-solid fa-user-music fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_uunp ?>
                                </a>
                            </div>



                            <div class="d-flex justify-content-start align-items-center flex-row mt-3">
                                <i class="fa-solid fa-message-quote fs-4 text-center w-40px-min lh-1 text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1  text-capitalize">
                                    <?php echo $s_uufq ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-0 p-0 g-0">
                <div class="w-50-md border-end-md">
                    <?php if(!empty($s_uuclid) || !empty($s_uudid) || !empty($s_uucrid) || !empty($s_uumid)) : ?>
                    <div class="educational_info">
                        <div class="card-header fw-bold text-uppercase border-top rounded-0">
                            educational INFORMATION
                        </div>
                        <div class="card-body">
                            <?php if(!empty($s_uuclid)) : ?>
                            <div class="d-flex justify-content-start align-items-center flex-row">
                                <i class="fa-solid fa-bank fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $s_clcln; ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uudid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-door-open fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text  lh-1 ">
                                    <?php echo $s_ddn ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uucrid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-graduation-cap fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $s_crcrn ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($s_uumid)) : ?>
                            <div class="mt-2 d-flex justify-content-start align-items-center flex-row mt-2">
                                <i class="fa-solid fa-star fs-4 text-center w-40px-min text-primary"></i>
                                <a class="ms-2 fw-500 text-dark font-text lh-1">
                                    <?php echo $s_mmn ?>
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
                                <a href="<?php echo $s_uufblink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uufb ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-instagram-square fs-3 text-instagram text-center w-40px-min"></i>
                                <a href="<?php echo $s_uuiglink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uuig ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-twitter fs-3 text-twitter text-center w-40px-min"></i>
                                <a href="<?php echo $s_uutwlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uutw ?>
                                </a>
                            </div>

                            <div class="d-flex justify-content-start align-items-center flex-row mt-1">
                                <i class="fa-brands fa-youtube fs-3 text-youtube text-center w-40px-min"></i>
                                <a href="<?php echo $s_uuytlink ?>" class="ms-2 fw-500" target="_blank">
                                    <?php echo $s_uuyt ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="divEditProfile" class="d-none">
        <?php include ROOT_PATH.'/app/includes/forms/form-editProfile.php';?>
    </div>
</div>
