<div class="col-md-6 col-lg-4">
    <div class="card">
        <div class="card-header p-3 bg-primary">
            <div class="d-flex justify-content-between align-items-center flex-row">
                <h4 class=" text-uppercase fw-bolder text-white">
                    <?php echo $scode.' - Sec '. $csec; ?>

                </h4>
                <?php if($s_aat != '2') :?>

                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-primary rounded-end" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end py-0 overflow-hidden">
                        <li class="dropdown-item">
                            <button type="button" id="GetEditClass" data-class="<?php echo $ccode; ?>"
                                class="btn btn-warning rounded-0 w-100 fs-6 py-1" data-bs-toggle="modal"
                                data-bs-target="#EditClassModal">
                                <i class="fa-solid fa-pen"></i>
                                <span class="ms-1">EDIT</span>
                            </button>
                        </li>
                        <div class="hr-1 bg-gray-300"></div>
                        <li class="dropdown-item">
                            <button type="button" id="GetDeleteClass" data-class="<?php echo $ccode; ?>"
                                class="btn btn-danger rounded-0 w-100 fs-6 py-1" data-bs-toggle="modal"
                                data-bs-target="#DeleteClassModal">
                                <i class="fa-solid fa-trash"></i>
                                <span class="ms-1">DELETE</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="EditClassModal" tabindex="-1" aria-labelledby="EditClassModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div id="EditClassContentData"></div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="DeleteClassModal" tabindex="-1" aria-labelledby="DeleteClassModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div id="DeleteClassContentData"></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title fw-bold font-text">
                <?php echo $stitle; ?>
            </h4>
            <div class="my-2">
                <p class="card-text p-0 m-0 ">
                    <span class="fw-500"> Instructor: </span>
                    <span class="text-uppercase fw-bold badge bg-primary text-wrap fs-7">
                        <a href="<?php echo BASE_URL .'/'. $s_directory. '/profile.php?u='.$aid;?>" class="text-white">
                            <?php echo $fullname; ?>
                        </a>
                    </span>
                </p>

                <p class="card-text p-0 m-0 my-2">
                    <span class="fw-500"> Class Code:</span>
                    <span class="font-title fw-bold badge bg-danger text-white text-wrap fs-7">
                        <?php echo $ccode; ?>
                    </span>
                </p>

                <p class="card-text p-0 m-0  my-2">
                    <span class="fw-500">School Year:</span>
                    <span class="font-title text-uppercase fw-bold badge bg-warning text-dark text-wrap fs-7">
                        <?php echo $syname; ?>
                    </span>
                </p>

                <p class="card-text p-0 m-0 my-2">
                    <span class="fw-500">Semester:</span>
                    <span class="font-title text-uppercase fw-bold badge bg-warning text-dark text-wrap fs-7">
                        <?php echo $semname; ?>
                    </span>
                </p>

                <p class="card-text p-0 m-0 my-2">
                    <span class="fw-500">Time:</span>
                    <span class="font-title text-uppercase fw-bold badge bg-warning text-dark text-wrap fs-7">
                        <?php echo $cday.' '.$ctime; ?>
                    </span>

                </p>
            </div>

            <a href="<?php echo BASE_URL .'/'. $s_directory. '/class-home.php?ccode='.$ccode;?>"
                class="btn btn-primary mt-2">
                open class
            </a>
        </div>
    </div>
</div>
