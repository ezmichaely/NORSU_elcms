<div class="card">
    <div class="bg-primary text-center p-2 rounded-top border-bottom">
        <h3 class="fw-bold text-uppercase text-white"><?php echo $scode.' - '.$stitle; ?></h3>
    </div>
    <div class="card-body p-2">
        <h2 class="card-title mx-1  fw-bold text-uppercase text-center">
            <?php echo $mtitle; ?>
        </h2>

        <div class="row g-2 mt-1 mb-3 mx-2">
            <div class="col-md-6">
                <p class="card-text p-0 m-0">
                    <span class="fw-500">
                        Instructor:
                    </span>
                    <span class="text-uppercase fw-bold badge bg-primary text-wrap fs-7">
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/profile.php?u='.$aid;?>" class="text-white">
                            <?php echo $fullname; ?>
                        </a>
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p class="card-text p-0 m-0">
                    <span class="fw-500">
                        Class Code:
                    </span>
                    <span class="font-title fw-bold badge bg-danger text-white text-wrap fs-7">
                        <?php echo $ccode; ?>
                    </span>
                </p>
            </div>

            <div class="col-md-6">
                <p class="card-text p-0 m-0">
                    <span class="fw-500">
                        Section & Time:
                    </span>
                    <span class="font-title text-uppercase fw-bold badge bg-warning text-dark text-wrap fs-7">
                        <?php echo 'Section '. $csec . ' / '. $cday .' '.$ctime; ?>
                    </span>
                </p>
            </div>

            <div class="col-md-6">
                <p class="card-text p-0 m-0">
                    <span class="fw-500">
                        Semester & School year:
                    </span>
                    <span class="font-title text-uppercase fw-bold badge bg-warning text-dark text-wrap fs-7">
                        <?php echo $semname .' / '.$syname; ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
