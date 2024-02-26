<div class="col-md-4 col-lg-4">
    <div class="card bg-white">
        <div class="card-body p-0">
            <div class="card-top p-3 text-center">
                <div class="mt-2">
                    <a href="<?php echo BASE_URL . '/'.$s_directory.'/profile.php'; ?>" class="">
                        <div class="profile-pic-big img-placeholder mx-auto">
                            <img src="<?php echo BASE_URL . $s_profilephoto;?>" alt="profile-pic" class="img-thumbnail">
                        </div>
                        <h5 class="text-uppercase fw-bold text-wrap mt-3"><?php echo $s_fullname; ?></h5>
                    </a>
                </div>
                <p class="fs-7 font-title fw-bold text-muted mt-1 p-0 mb-0 text-uppercase">
                    <?php echo $s_position; ?>
                </p>
            </div>

            <div class="p-3 border-top ">
                <h6 class="text-muted fw-bold">POSTED</h6>
                <h2 class="fw-bold text-center"><?php echo $CountPost; ?></h2>
            </div>

            <!-- ACCOUNT NOT ACTIVATED -->
            <?php if ($s_aar != '0'): ?>

            <?php if($s_aat == '2'): ?>
            <!-- MY CLASSESS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold">MY CLASSES</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/myclass.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountStudentClass; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>
            <?php endif; ?>

            <!-- DISPLAY FOR NON STUDENT -->
            <?php if($s_aat != '2'): ?>

            <?php if($s_aat != '5'): ?>
            <!-- MY CLASSESS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold">MY CLASSES</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/myclass.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountTeacherClass; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>
            <?php endif; ?>

            <!-- MY MODULES -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold text-uppercase">MY Modules</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/module-class.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountModules; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>

            <!-- DEPARTMENT HEAD -->
            <?php if($s_aat == '4'): ?>
            <!-- FACULTY MEMBERS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold text-uppercase">Department Faculty Members</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/dashboard-faculty.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountDepartmentFaculty; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>

            <!-- MODULE REQUESTS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold text-uppercase">Module Requests</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/dashboard-home.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountDepartmentModuleRequest; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>
            <?php endif; ?>
            <!-- END OF DEPARTMENT HEAD -->

            <!-- COLLEGE DEAN -->
            <?php if($s_aat == '5'): ?>
            <!-- FACULTY MEMBERS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold text-uppercase">College Faculty Members</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/dashboard-faculty.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountCollegeFaculty; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>

            <!-- MODULE REQUESTS -->
            <div class="p-3 border-top">
                <h6 class="text-muted fw-bold text-uppercase">Module Requests</h6>
                <a href="<?php echo BASE_URL . '/'.$s_directory.'/dashboard-home.php'; ?>"
                    class="d-flex justify-content-between align-items-center cursor-pointer my-2">
                    <i class="invisible fa fa-angles-left"></i>
                    <h2 class="fw-bold text-center text-dark"><?php echo $CountCollegeModuleRequest; ?></h2>
                    <i class="fa fa-angles-right"></i>
                </a>
            </div>
            <?php endif; ?>
            <!-- END OF COLLEGE DEAN -->

            <?php endif; ?>
            <!-- END OF DISPLAY FOR NON STUDENT -->

            <?php endif; ?>
            <!-- END OF ACCOUNT NOT ACTIVATED -->
        </div>
    </div>
</div>
