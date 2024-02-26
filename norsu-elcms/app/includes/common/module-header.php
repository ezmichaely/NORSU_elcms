<div class="card">
    <div class="bg-warning text-center p-2">
        <h3 class="fw-bold text-uppercase">
            <?php echo $scode. ' - ' .$stitle; ?>
        </h3>
    </div>
    <div class="card-body">
        <h2 class="card-title fw-bold text-uppercase text-center">
            <?php echo $mtitle; ?>
        </h2>

        <!-- <div class="d-flex justify-content-evenly align-items-center flex-row flex-wrap my-2"> -->
        <div class="row g-2 my-2">
            <!-- <p class="card-text p-0 fw-500 m-1"> -->
            <p class="card-text col-md-12 col-lg-4 p-0 fw-500 mt-2 text-sm-start text-md-center">
                Author:
                <span class="text-uppercase fw-bold badge bg-primary text-wrap fs-7">
                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/profile.php?u='.$aid;?>" class="text-white">
                        <?php echo $fullname; ?>
                    </a>
                </span>
            </p>
            <!-- <p class="card-text p-0 fw-500 m-1"> -->
            <p class="card-text col-md-6 col-lg-4 p-0 fw-500 mt-2 text-sm-start text-md-center">
                <span class="">
                    Status:
                </span>

                <?php if ($mstatus == 'To be Publish') : ?>
                <span class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                    To be Publish
                </span>
                <?php endif; ?>

                <?php if ($mstatus == 'Dept Head: For Approval') : ?>
                <span class="text-uppercase fw-bold badge bg-secondary text-white text-wrap fs-7 font-title">
                    Dept Head: FOR APPROVAL
                </span>
                <?php endif; ?>

                <?php if ($mstatus == 'Dept Head: For Revision') : ?>
                <span class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                    Dept Head: FOR REVISION
                </span>
                <?php endif; ?>

                <?php if ($mstatus == 'Dean: For Approval') : ?>
                <span class="text-uppercase fw-bold badge bg-secondary text-white text-wrap fs-7  font-title">
                    Dean: FOR APPROVAL
                </span>
                <?php endif; ?>

                <?php if ($mstatus == 'Dean: For Revision') : ?>
                <span class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                    Dean: FOR REVISION
                </span>
                <?php endif; ?>

                <?php if ($mstatus == 'Published') : ?>
                <span class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                    PUBLISHED
                </span>
                <?php endif; ?>

            </p>

            <!-- <p class="card-text p-0 fw-500 m-1"> -->
            <p class="card-text col-md-6 col-lg-4 p-0 fw-500 mt-2 text-sm-start text-md-center">
                <span class="">
                    Module Consent:
                </span>
                <?php if ($mconsent == 'Agreed') : ?>
                <span class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                    <?php echo $mconsent;?>
                </span>
                <?php endif; ?>

                <?php if ($mconsent == 'Declined') : ?>
                <span class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                    <?php echo $mconsent;?>
                </span>
                <?php endif; ?>
            </p>
        </div>


    </div>
</div>
