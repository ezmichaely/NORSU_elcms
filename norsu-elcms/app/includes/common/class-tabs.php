<div class="col-lg-2">
    <ul class="list-group overflow-hidden">
        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-home.php?ccode='.$ccode;?>" class="list-group-item fw-bold text-uppercase lh-1 p-3
        <?php if($page == 'class home'){echo 'active';}?>">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                CLASS HOME
            </span>
        </a>

        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-members.php?ccode='.$ccode;?>" class="list-group-item fw-bold text-uppercase lh-1 p-3
        <?php if($page == 'class members'){echo 'active';}?>">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                members
            </span>
        </a>

        <?php if($s_aat == '2'): ?>
        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-assessment.php?ccode='.$ccode;?>" class="list-group-item fw-bold text-uppercase lh-1 p-3
        <?php if($page == 'class assessment'){echo 'active';}?>">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                assessments
            </span>
        </a>
        <?php endif; ?>


        <?php if($s_aat != '2'): ?>
        <a class="list-group-item fw-bold lh-1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                <i class="m-1 fa-solid fa-plus"></i>
                <span class="m-1 text-uppercase">
                    create assessment
                </span>
            </span>
        </a>

        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-assessment.php?ccode='.$ccode;?>" class="list-group-item fw-bold text-uppercase lh-1 p-3
        <?php if($page == 'class assessment'){echo 'active';}?>">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                assessment results
            </span>
        </a>

        <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-record.php?ccode='.$ccode;?>" class="list-group-item fw-bold text-uppercase lh-1 p-3
        <?php //if($page == 'class-assessment'){echo 'active';}?>">
            <span class="d-flex align-items-center justify-content-center flex-row flex-wrap text-center">
                CLASS RECORD
            </span>
        </a>
        <?php endif; ?>
    </ul>
</div>



<?php include ROOT_PATH . '/app/includes/modals/AddAssessmentModal.php' ; ?>
