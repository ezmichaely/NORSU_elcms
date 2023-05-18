    <aside id="side-navbar" class="side-navbar bg-primary max">
        <div class="brand text-center">
            <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.svg') ?>" alt="" class="brand-logo">
            <h4 class="brand-name text-white font-brand fw-bold">NORSU&nbsp;-&nbsp;eLCMS</h4>
        </div>

        <div class="list-group">
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-home.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard home' ) {echo 'active';}?>" aria-current="true"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <i class="fa-solid fa-laptop"></i>
                <span class="ms-3"> dashboard </span>
            </a>
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-faculty.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard faculty' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Faculty">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span class="ms-3"> faculty </span>
            </a>
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-students.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard students' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Students">
                <i class="fa-solid fa-screen-users"></i>
                <span class="ms-3"> students </span>
            </a>
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-classes.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard classes' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Classes">
                <i class="fa fa-blackboard"></i>
                <span class="ms-3"> classes </span>
            </a>
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/dashboard-modules.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard modules' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Modules">
                <i class="fa fa-book-open-reader"></i>
                <span class="ms-3"> modules </span>
            </a>
            <!-- <a href="<?php echo BASE_URL . '/' . $s_directory . '/announcement.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard announcements' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Announcements">
                <i class="fa fa-bullhorn"></i>
                <span class="ms-3"> announcements </span>
            </a> -->
            <a href="<?php echo BASE_URL . '/' . $s_directory . '/messages.php'; ?>"
                class="list-group-item <?php if($page == 'dashboard messages' ) {echo 'active';}?>"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Messages">
                <i class="fa-brands fa-facebook-messenger"></i>
                <span class="ms-3"> messages </span>
            </a>
        </div>
    </aside>
