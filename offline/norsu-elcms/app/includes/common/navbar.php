<?php 
    $sql = 'SELECT * FROM contacts WHERE contact_sender = ? ORDER BY contact_datetime DESC LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$s_aid]);
    $rowCount = $stmt->rowCount();
    // dd($rowCount);
    if($rowCount > 0 ) {
        while($row = $stmt->fetch()) {
            // dd($row);
            $first_receiver = $row['contact_receiver'];
        }
    }

?>

<nav class="navigation-bar bg-primary container-fluid fluid-padding">
    <div class="container fluid-padding">
        <div class="div-flex d-flex justify-content-between align-items-center">
            <a href="<?php echo (BASE_URL . '/' . $s_directory . '/index.php') ?>"
                class="brand d-flex justify-content-start align-items-center flex-row">
                <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.png') ?>" alt="" class="" height="40" />
                <h3 class="brand-name font-brand fw-bold text-white user-select-none ms-2">
                    NORSU&nbsp;-&nbsp;eLCMS
                </h3>
            </a>

            <div class="navigation d-flex justify-content-end align-items-center flex-row">
                <a href="<?php echo BASE_URL . '/' . $s_directory . '/index.php'; ?>"
                    class="nav-link text-white p-2 btn btn-primary <?php if($page == 'home') {echo 'active';}?> me-1">
                    <i class="fa fa-home"></i>
                    <span class="fw-bold text-uppercase ms-1">HOME</span>
                </a>

                <?php if ($s_aar != '0'): ?>

                <?php if ($s_aat == '2'): ?>
                <a href="<?php echo BASE_URL . '/' . $s_directory . '/myclass.php'; ?>" class="nav-link text-white btn btn-primary mx-1 
                    <?php if($page == 'myclass' || $page == 'class home' || $page == 'class lesson' ||
                     $page == 'class members' || $page == 'class assessment' ) {echo 'active';}?>">
                    <i class="fa fa-blackboard"></i>
                    <span class="fw-bold text-uppercase ms-1">MY CLASS</span>
                </a>
                <?php endif; ?>

                <?php if($s_aat != '2' && $s_aat != '5'): ?>
                <button type="button" class="dropdown-btn nav-link text-white p-2 mx-1 d-flex flex-row align-items-center btn btn-primary
                     <?php if($page == 'learning module'  || $page == 'class module' || $page == 'myclass' 
                        || $page == 'new module'|| $page == 'edit module' || $page == 'read module' 
                        || $page == 'new module outline' || $page == 'edit module outline' || $page == 'read module outline' 
                        || $page == 'new quiz' || $page == 'new assignment' || $page == 'new project' || $page == 'new major exam' 
                        || $page == 'class home' || $page == 'class lesson' || $page == 'class members' || $page == 'class record')  
                        {echo 'active';}?>" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-book-open-reader"></i>
                    <span class="span-name font-title fw-bold text-uppercase px-1 ms-1">
                        MODULES
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end p-0 overflow-hidden">
                    <li class="dropdown-list">
                        <a href="<?php echo BASE_URL . '/' . $s_directory . '/module-learning.php'; ?>" class="dropdown-link border-0 fw-bold btn btn-outline-primary w-100 rounded-0 text-start px-3
                            <?php if($page == 'learning module') {echo 'active';}?>">
                            <i class="fa fa-book-bookmark"></i>
                            <span class="text-uppercase ms-1"> Learning Modules </span>
                        </a>
                    </li>
                    <div class="hr-1 bg-gray-300"></div>
                    <li class="dropdown-list">
                        <a href="<?php echo BASE_URL . '/' . $s_directory . '/module-class.php'; ?>" class="dropdown-link border-0 fw-bold btn btn-outline-primary w-100 rounded-0 text-start px-3
                            <?php if($page == 'class module' || $page == 'new module'|| $page == 'edit module' || $page == 'read module' 
                            || $page == 'new module outline' || $page == 'edit module outline' || $page == 'read module outline' ) 
                            {echo 'active';}?>">
                            <i class="fa fa-book-open-cover"></i>
                            <span class="text-uppercase ms-1"> MY Modules </span>
                        </a>
                    </li>
                    <div class="hr-1 bg-gray-300"></div>
                    <li class="dropdown-list">
                        <a href="<?php echo BASE_URL . '/' . $s_directory . '/myclass.php'; ?>"
                            class="dropdown-link border-0 fw-bold btn btn-outline-primary w-100 rounded-0 text-start px-3
                            <?php if($page == 'myclass' || $page == 'new quiz' || $page == 'new assignment' || $page == 'new project' || $page == 'new major exam' 
                            || $page == 'class home' || $page == 'class lesson' || $page == 'class members' || $page == 'class record') {echo 'active';}?>">
                            <i class="fa fa-blackboard"></i>
                            <span class="text-uppercase ms-1"> MY CLASS </span>
                        </a>
                    </li>
                </ul>

                <?php endif; ?>
                <?php endif; ?>

                <?php if($rowCount < 0 ) : ?>
                <a href="<?php echo BASE_URL . '/' . $s_directory . '/messages.php'; ?>"
                    class="nav-link text-white p-2 btn btn-primary mx-1 <?php if($page == 'messages') {echo 'active';}?>">
                    <i class="fa-brands fa-facebook-messenger"></i>
                    <span class="fw-bold text-uppercase ms-1">MESSAGES</span>
                </a>
                <?php endif; ?>


                <?php if($rowCount > 0 ) : ?>
                <a href="<?php echo BASE_URL . '/' . $s_directory . '/messages.php?m='.$first_receiver; ?>"
                    class="nav-link text-white p-2 btn btn-primary mx-1 <?php if($page == 'messages') {echo 'active';}?>">
                    <i class="fa-brands fa-facebook-messenger"></i>
                    <span class="fw-bold text-uppercase ms-1">MESSAGES</span>
                </a>
                <?php endif; ?>

                <!-- <a href="<?php //echo BASE_URL . '/' . $s_directory . '/announcement.php'; ?>" class="nav-link text-white p-2 btn btn-primary mx-1 
                    <?php //if($page == 'announcement') {echo 'active';}?>">
                    <i class="fa fa-bullhorn"></i>
                    <span class="fw-bold text-uppercase ms-1">ANNOUNCEMENT</span>
                </a> -->

                <button type="button" class="dropdown-btn d-flex flex-row align-items-center btn btn-primary py-1 px-2
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
                        <a href="<?php echo BASE_URL . '/' . $s_directory . '/profile.php'; ?>" class="dropdown-link border-0 fw-bold btn btn-outline-primary w-100 rounded-0 text-start px-3
                            <?php if($page == 'profile') {echo 'active';}?>">
                            <i class="fa fa-user"></i>
                            <span class="text-uppercase ms-1"> PROFILE </span>
                        </a>
                    </li>

                    <?php if($s_aat == '4' || $s_aat == '5'): ?>
                    <div class="hr-1 bg-gray-300"></div>
                    <li class="dropdown-list">
                        <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-home.php'; ?>" class="dropdown-link border-0 fw-bold btn btn-outline-primary w-100 rounded-0 text-start px-3
                            <?php if($page == 'dashboard' ) {echo 'active';}?>">
                            <i class="fa-solid fa-laptop"></i>
                            <span class="text-uppercase ms-1"> dashboard </span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <div class="hr-1 bg-gray-300"></div>
                    <li class="dropdown-list">
                        <a href="<?php echo (BASE_URL . '/app/controllers/logout.php'); ?> "
                            class="dropdown-link border-0 fw-bold btn btn-outline-warning w-100 rounded-0 text-dark text-start px-3">
                            <i class="fas fa-power-off"></i>
                            <span class="text-uppercase ms-1 "> LOG OUT </span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
