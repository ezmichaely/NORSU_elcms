<header class="top-navbar px-3 z-index-1000">
    <div class="toggle">
        <div id="btn-toggle-collapse" class="toggle-collapse max btn-primary active rounded-circle">
            <i id="icon-collapse" class="fa-solid fa-chevron-left"></i>
        </div>

        <div id="btn-toggle-hide" class="toggle-hide btn-primary active rounded-circle">
            <i id="icon-hide" class="fa-solid fa-times"></i>
        </div>

    </div>
    <div class="user-action">
        <div class="user-action_profile">
            <button type="button" class="dropdown-btn d-flex flex-row align-items-center btn btn-primary dropdown-toggle p-1 
                    <?php if($page == 'profile' || $page == 'dashboard') {echo 'active';}?>" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="img-placeholder profile-pic-nav">
                    <img src="<?php echo BASE_URL . $s_profilephoto ?>" alt="profile-pic" class="img-thumbnail">
                </div>
                <span class="span-name font-title fw-bold text-uppercase px-1">
                    <?php echo $s_aafn; ?>
                </span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end p-0 overflow-hidden">

                <li class="dropdown-list">
                    <a href="<?php echo BASE_URL . '/' . $s_directory . '/profile.php'; ?>" class="dropdown-link fw-bold btn btn-outline-primary w-100 rounded-0 border-0 text-start px-3
                            <?php if($page == 'profile') {echo 'active';}?>">
                        <i class="fa fa-user"></i>
                        <span class="text-uppercase ms-1"> PROFILE </span>
                    </a>
                </li>
                <div class="hr-1 bg-gray-300"></div>
                <li class="dropdown-list">
                    <a href="<?php echo BASE_URL . '/' . $s_directory . '/index.php'; ?>" class="dropdown-link fw-bold btn btn-outline-primary w-100 rounded-0 border-0 text-start px-3
                            <?php if($page == 'home' ) {echo 'active';}?>">
                        <i class="fa fa-home"></i>
                        <span class="text-uppercase ms-1"> HOME PAGE </span>
                    </a>
                </li>
                <div class="hr-1 bg-gray-300"></div>
                <li class="dropdown-list">
                    <a href="<?php echo (BASE_URL . '/app/controllers/logout.php'); ?> "
                        class="dropdown-link fw-bold btn btn-outline-warning w-100 rounded-0 border-0 text-dark text-start px-3">
                        <i class="fas fa-power-off"></i>
                        <span class="text-uppercase ms-1 "> LOG OUT </span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</header>
