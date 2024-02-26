    <aside id="side-navbar" class="side-navbar bg-primary max">
        <div class="brand text-center">
            <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.svg') ?>" alt="" class="brand-logo">
            <h4 class="brand-name text-white font-brand fw-bold">NORSU&nbsp;-&nbsp;eLCMS</h4>
        </div>

        <div class="list-group ">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <!-- DASHBOARD -->
                <a href="index.php" class="list-group-item <?php if($page == 'Dashboard Home' ) {echo 'active';}?>"
                    aria-current="true" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                    <i class="fa-solid fa-laptop"></i>
                    <span class="ms-3"> dashboard </span>
                </a>

                <!-- USERS -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Users">
                        <button class="accordion-button 
                        <?php if($page == 'User - Requests' || $page == 'User - Students' || $page == 'User - Instructors' || $page == 'User - Department Head' 
                            || $page == 'User - College Dean' || $page == 'User - Admin') {echo '';} 
                            else {echo 'collapsed';}?>" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <div class="d-block">
                                <i class="fa-solid fa-users"></i>
                                <span class="ms-3"> users </span>
                            </div>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse 
                        <?php if($page == 'User - Requests' || $page == 'User - Students' || $page == 'User - Instructors' || $page == 'User - Department Head' 
                        || $page == 'User - College Dean' || $page == 'User - Admin') {echo 'show';} ?>"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <a href="#" class="accordion-body-item"></a>
                            <a href="dashboard-user_requests.php"
                                class="accordion-body-item <?php if($page == 'User - Requests' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Account Requests">
                                <i class="fa-solid fa-user-check"></i>
                                <span class="">user Requests</span>
                            </a>
                            <a href="dashboard-user_students.php"
                                class="accordion-body-item <?php if($page == 'User - Students' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Students">
                                <i class="fa-solid fa-screen-users"></i>
                                <span class="">STUDENTS</span>
                            </a>
                            <a href="dashboard-user_instructor.php"
                                class="accordion-body-item <?php if($page == 'User - Instructors' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Instructors">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <span class="">instructors</span>
                            </a>

                            <a href="dashboard-user_depthead.php"
                                class="accordion-body-item <?php if($page == 'User - Department Head' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Department Head">
                                <i class="fa-solid fa-square-user"></i>
                                <span class="">Department Head</span>
                            </a>

                            <a href="dashboard-user_dean.php"
                                class="accordion-body-item <?php if($page == 'User - College Dean' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="College Dean">
                                <i class="fa-solid fa-universal-access"></i>
                                <span class="">college dean</span>
                            </a>

                            <a href="dashboard-user_admin.php"
                                class="accordion-body-item <?php if($page == 'User - Admin' ) {echo 'active';}?>"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Admin">
                                <i class="fa-solid fa-user-secret"></i>
                                <span class="">admin</span>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- POSTS  -->
                <a href="dashboard-posts.php" class="list-group-item <?php if($page == 'Posts' ) {echo 'active';}?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Posts">
                    <i class="fa-solid fa-message-quote"></i>
                    <span class="ms-3"> posts </span>
                </a>

                <!-- CLASSES -->
                <a href="dashboard-classes.php" class="list-group-item <?php if($page == 'Classes' ) {echo 'active';}?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Classes">
                    <i class="fa fa-blackboard"></i>
                    <span class="ms-3"> classes </span>
                </a>

                <!-- MODULES -->
                <a href="dashboard-modules.php" class="list-group-item <?php if($page == 'Modules' ) {echo 'active';}?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Modules">
                    <i class="fa fa-book-open-reader"></i>
                    <span class="ms-3"> modules </span>
                </a>

                <!-- ANNOUNCEMENTS -->
                <!-- <a href="dashboard-announcements.php"
                    class="list-group-item <?php if($page == 'Announcements' ) {echo 'active';}?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Announcements">
                    <i class="fa fa-bullhorn"></i>
                    <span class="ms-3"> announcements </span>
                </a> -->

                <!-- MESSAGES -->
                <a href="dashboard-messages.php"
                    class="list-group-item <?php if($page == 'Messages' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                    data-bs-placement="right" title="Messages">
                    <i class="fa-brands fa-facebook-messenger"></i>
                    <span class="ms-3"> messages </span>
                </a>

                <!-- MANAGE -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Manage">
                        <button class="accordion-button 
                            <?php if($page == 'Manage - College' || $page == 'Manage - Department' || $page == 'Manage - Course' 
                            || $page == 'Manage - Major' || $page == 'Manage - Position' || $page == 'Manage - Subjects') {echo '';} 
                            else {echo 'collapsed ';}?>" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <div class="d-block">
                                <i class="fa-solid fa-folder-gear"></i>
                                <span class="ms-3"> manage </span>
                            </div>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo"
                        class="accordion-collapse collapse 
                        <?php if($page == 'Manage - College' || $page == 'Manage - Department' || $page == 'Manage - Course' 
                            || $page == 'Manage - Major' || $page == 'Manage - Position' || $page == 'Manage - Subjects') {echo 'show';}?>"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <a href="#" class="accordion-body-item"></a>
                            <a href="dashboard-manage_college.php" class="accordion-body-item 
                                <?php if($page == 'Manage - College' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="College">
                                <i class="fa-solid fa-school"></i>
                                <span class="">college</span>
                            </a>
                            <a href="dashboard-manage_department.php" class="accordion-body-item
                                <?php if($page == 'Manage - Department' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Department">
                                <i class="fa-solid fa-landmark"></i>
                                <span class="">department</span>
                            </a>

                            <a href="dashboard-manage_course.php" class="accordion-body-item 
                                <?php if($page == 'Manage - Course' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Course">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span class="">course</span>
                            </a>

                            <a href="dashboard-manage_major.php" class="accordion-body-item 
                                <?php if($page == 'Manage - Major' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Major">
                                <i class="fa-solid fa-star"></i>
                                <span class="">major</span>
                            </a>

                            <a href="dashboard-manage_subjects.php" class="accordion-body-item 
                                <?php if($page == 'Manage - Subjects' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Subjects">
                                <i class="fa-solid fa-books"></i>
                                <span class="">subjects</span>
                            </a>

                            <a href="dashboard-manage_position.php" class="accordion-body-item 
                                <?php if($page == 'Manage - Position' ) {echo 'active';}?>" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Position">
                                <i class="fa-solid fa-users-gear"></i>
                                <span class="">position</span>
                            </a>


                        </div>
                    </div>
                </div>

                <!-- SYSTEM LOGS -->
                <a href="dashboard-system_logs.php"
                    class="list-group-item <?php if($page == 'System Logs' ) {echo 'active';}?>"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="System Logs">
                    <i class="fa-solid fa-file-lines"></i>
                    <span class="ms-3"> system logs </span>
                </a>
            </div>
        </div>
    </aside>
