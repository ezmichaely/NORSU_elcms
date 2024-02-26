<div class="col-md-3 d-none d-lg-block">
    <div class="card border-bottom-0 ">
        <div class="card-header fs-5 text-uppercase text-white bg-warning text-center">
            <i class="fas fa-bullhorn me-1 text-dark"></i>
            <span class="fw-bold font-brand text-dark">Announcements!</span>
        </div>
        <div class="card-body p-0">
            <?php
            while($rowAnnouncements = mysqli_fetch_array($stmtAnnouncements)) {
                $idAnn = $rowAnnouncements['a_refID'];
                $titleAnn = $rowAnnouncements['a_Title'];
                $contentAnn = $rowAnnouncements['a_Context'];

            // dd($rowAnnouncements);
        ?>
            <div class="ann-container p-3">
                <div class="ann-title">
                    <h5 class="text-danger fw-bold text-uppercase">
                        <?php echo (strlen($titleAnn) > 150) ? substr($titleAnn,0,150) : $titleAnn;?>
                    </h5>
                </div>

                <div class="ann-content my-2">
                    <p>
                        <?php echo (strlen($contentAnn) > 150) ? substr($contentAnn,0,150 ) : $contentAnn;?>
                    </p>
                </div>

                <div class="ann-footer d-flex justify-content-around align-items-center flex-row flex-wrap">
                    <a href="<?php echo BASE_URL.'/'.$s_directory.'/viewannouncement.php?id='.$idAnn?>"
                        class="btn btn-outline-primary text-uppercase fs-8 badge text-primary border border-primary mt-2 px-3">Read
                        More</a>
                    <button type="button" onclick="deactivate(<?php echo $idAnn; ?>);"
                        class="btn badge btn-primary fs-8 mt-2 px-3">
                        Mark as Read
                    </button>
                </div>
            </div>

            <div class="hr-1 bg-gray-300"></div>
            <?php } ?>

        </div>
    </div>
    <!-- <div class="my-2">
        <?php  //include ROOT_PATH . '/app/includes/footer.php'?>
    </div> -->
</div>
