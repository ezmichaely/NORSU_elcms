<div class="card p-3 h-80min">
    <div class="row g-3">
        <div class="col-md-12">
            <?php foreach ($stmtMyModules as $row) : ?>
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3">
                        <div class="bg-warning h-100 d-flex justify-content-center align-items-center p-3">
                            <h2 class="fw-bold text-uppercase text-center">
                                <?php echo $row['subject_code'];?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-uppercase">
                                <?php echo $row['module_title'];?>
                            </h4>
                            <p class="card-text p-0 m-0 mt-2 fw-bold">
                                <span class="fw-500">
                                    Author:
                                </span>

                                <span class="text-uppercase fw-bold badge bg-primary text-wrap fs-7">
                                    <a href="<?php echo BASE_URL .'/'. $s_directory. '/profile.php?u='.$row['module_author'];?>"
                                        class="text-white">
                                        <?php $fullname = getFullName($row['account_firstname'], $row['account_middlename'], $row['account_lastname'], $row['account_suffixname']); ?>
                                        <?php echo $fullname;?>
                                    </a>
                                </span>
                            </p>
                            <p class="card-text p-0 m-0 mt-2 fw-bold">
                                <span class="fw-500">
                                    Status:
                                </span>

                                <?php if ($row['module_status'] == 'To be Publish') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-danger text-wrap fs-7 text-white font-title">
                                    To be Publish
                                </span>
                                <?php endif; ?>

                                <?php if ($row['module_status'] == 'Dept Head: For Approval') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-white text-wrap fs-7 font-title">
                                    Dept Head: FOR APPROVAL
                                </span>
                                <?php endif; ?>

                                <?php if ($row['module_status'] == 'Dept Head: For Revision') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    Dept Head: FOR REVISION
                                </span>
                                <?php endif; ?>

                                <?php if ($row['module_status'] == 'Dean: For Approval') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-secondary text-white text-wrap fs-7  font-title">
                                    Dean: FOR APPROVAL
                                </span>
                                <?php endif; ?>

                                <?php if ($row['module_status'] == 'Dean: For Revision') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-warning text-wrap fs-7 text-dark font-title">
                                    Dean: FOR REVISION
                                </span>
                                <?php endif; ?>

                                <?php if ($row['module_status'] == 'Published') : ?>
                                <span
                                    class="text-uppercase fw-bold badge bg-success text-wrap fs-7 text-white font-title">
                                    PUBLISHED
                                </span>
                                <?php endif; ?>

                            </p>

                            <p class="card-text p-0 m-0 mt-2 fw-bold ">
                                <span class="fw-500">
                                    Subject Title:
                                </span>
                                <span class="text-primary ">
                                    <?php echo $row['subject_title'];?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="h-100 d-flex justify-content-center align-items-center flex-column p-3 ">
                            <a href="<?php echo BASE_URL .'/'. $s_directory. '/module-read.php?mcode='.$row['module_code'];?>"
                                class="btn btn-primary w-100">
                                view module
                            </a>
                            <?php if ($row['module_status'] == 'To be Publish' || $row['module_status'] == 'Dept Head: For Revision' || $row['module_status'] == 'Dean: For Revision') : ?>
                            <form id="PublishModuleForm" method="POST"
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="w-100">

                                <input type="text" id="PublishModule" name="PublishModule" class="form-control"
                                    value="publish" hidden>

                                <input type="text" id="PublishModuleSubjectCode" name="PublishModuleSubjectCode"
                                    class="form-control" value="<?php echo $row['subject_code'];?>" hidden>

                                <input type="text" id="PublishModuleSubjectTitle" name="PublishModuleSubjectTitle"
                                    class="form-control" value="<?php echo $row['subject_title'];?>" hidden>

                                <input type="text" id="PublishModuleCode" name="PublishModuleCode" class="form-control"
                                    value="<?php echo $row['module_code'];?>" hidden>

                                <input type="text" id="PublishModuleTitle" name="PublishModuleTitle"
                                    class="form-control" value="<?php echo $row['module_title'];?>" hidden>

                                <input type="text" id="PublishModuleStatus" name="PublishModuleStatus"
                                    class="form-control" value="<?php echo $row['module_status'];?>" hidden>

                                <input type="text" id="PublishModuleButton" name="PublishModuleButton"
                                    class="form-control" value="PublishModuleButton" hidden>

                                <button type="submit" id="PublishModuleBtn" name="PublishModuleBtn"
                                    class="btn btn-outline-primary w-100 mt-2 border border-primary">
                                    submit to publish
                                </button>
                            </form>
                            <?php endif; ?>
                            <?php //dd($_POST); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2"></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
