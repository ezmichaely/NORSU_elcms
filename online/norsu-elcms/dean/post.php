<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    deanOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 

    if(isset($_GET['p'])) {
        $postcode = $_GET['p'];
        include(ROOT_PATH . '/app/controllers/query/getPostData.php'); 
    } else {
        header('Location: ' .BASE_URL. '/'.$s_directory.'/index.php');
    }
?>

<?php 
    $title = 'Post'; $page = 'post';
    $pagehas = array('posts');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">

            <div class="card bg-white">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo BASE_URL . '/'.$s_directory.'/profile.php?u='.$account_unique; ?>"
                            class="d-flex justify-content-start align-items-center flex-row">
                            <img class="rounded-circle" width="50" height="50"
                                src="<?php echo BASE_URL . $profilephoto; ?>" alt="profile-picture">
                            <div class="ms-2 d-flex justify-content-center align-items-start flex-column">
                                <p class="text-dark fw-bold text-uppercase font-title fs-5 m-0 p-0 lh-1">
                                    <?php echo  $fullname; ?>
                                </p>
                                <div class="fs-7 text-muted d-flex align-items-center font-text flex-wrap">
                                    <span class="fw-bold"><?php echo $atype_name; ?></span>
                                    <span class="fs-9">
                                        &nbsp;&nbsp;
                                        <i class="fa-solid fa-circle-small"></i>
                                        &nbsp;&nbsp;
                                    </span>
                                    <span class="fw-500"><?php echo $postDay; ?></span>
                                    <span class="fs-9">
                                        &nbsp;&nbsp;
                                        <i class="fa-solid fa-circle-small"></i>
                                        &nbsp;&nbsp;
                                    </span>
                                    <span class="fw-500"><?php echo $postTime; ?></span>
                                    <span class="fs-9">
                                        &nbsp;&nbsp;
                                        <i class="fa-solid fa-circle-small fs-9"></i>
                                        &nbsp;&nbsp;
                                    </span>
                                    <span class="fw-500"><?php echo $postDate; ?></span>
                                </div>
                            </div>
                        </a>


                        <!-- IF POSTER = POST ID -->
                        <?php if ($s_aid === $account_unique) : ?>
                        <!-- Button trigger modal -->
                        <div class="">
                            <button type="button" id="GetDeletePostView" class="btn btn-outline-danger border-0 btn-sm"
                                data-bs-toggle="modal" data-bs-target="#DeletePostViewModal"
                                data-post="<?php echo $post_code; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="DeletePostViewModal" tabindex="-1"
                            aria-labelledby="DeletePostViewModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div id="DeletePostViewContentData"></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($post_content == '' && $ext != '') : ?>
                <?php if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "pptx" ||
                                $ext == "ppt" || $ext == "ppt" || $ext == "xlsx")  : ?>
                <div class="card-body p-0 bg-white">
                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">

                        <?php if ($ext == "pdf")  : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-pdf text-danger"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "doc" || $ext == "docx" )  : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-word text-primary"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "ppt" || $ext == "pptx" )  : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "xls" || $ext == "xlsx" )  : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-excel text-success"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp")  : ?>
                <div class="card-body p-0 bg-white">
                    <div class="img-post bg-gray-100 text-center">
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="text-dark fw-bold img-placeholder"
                            target="_blank">
                            <img src="<?php echo BASE_URL.$postFile; ?>" alt="<?php echo $post_filename; ?>"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>

                <?php if ($post_content != '' && $ext != '') : ?>
                <?php if ($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "ppt" ||
                                $ext == "pptx" || $ext == "xls" || $ext == "xlsx") : ?>
                <div class="card-body p-0 bg-white">
                    <div class="p-3"><?php echo $post_content; ?></div>
                    <div class="p-3 m-0 bg-gray-100 d-flex align-items-center justify-content-center">

                        <?php if ($ext == "pdf") : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-pdf text-danger"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "doc" || $ext == "docx" ) : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-word text-primary"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "ppt" || $ext == "pptx" ) : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-powerpoint text-danger"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>
                        <?php if ($ext == "xls" || $ext == "xlsx" ) : ?>
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="btn-download btn-warning text-dark">
                            <i class="fa-solid fa-file-excel text-success"></i>
                            <span class="">
                                <?php echo $post_filename; ?>
                            </span>
                        </a>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp") : ?>
                <div class="card-body p-0 bg-white">
                    <div class="p-3"><?php echo $post_content; ?></div>
                    <div class="img-post bg-gray-100 text-center">
                        <a href="<?php echo BASE_URL.$postFile; ?>" class="text-dark fw-bold img-placeholder"
                            target="_blank">
                            <img src="<?php echo BASE_URL.$postFile; ?>" alt="<?php echo $post_filename; ?>"
                                class="img-fluid">
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>

                <?php if ($post_content != '' && $ext == '') : ?>
                <div class="card-body p-0 bg-white">
                    <div class="p-3"><?php echo $post_content; ?></div>
                </div>
                <?php endif; ?>

                <div class="card-footer p-0 bg-white">
                    <div class="py-2 px-3">
                        <div class="text-white fw-bold text-uppercase btn btn-primary w-100">
                            <i class="fa-solid fa-message-middle"></i>
                            <span class="ms-1">COMMENTS</span>
                        </div>
                    </div>

                    <div class="hr-1 bg-gray-300 mb-2 "></div>
                    <div class="my-2 px-3">
                        <form id="AddCommentForm">
                            <div class="d-flex justify-content-start align-items-start flex-row">
                                <div class="img-placeholder rounded-circle">
                                    <img src="<?php echo BASE_URL . $s_profilephoto ?>" alt="profile-pic"
                                        class="rounded-circle" height="34" width="34">
                                </div>
                                <div class="ms-2 flex-grow w-100">
                                    <div class="d-flex justify-content-start align-items-end flex-row">
                                        <input type="text" name="PostCode" id="PostCode"
                                            class="form-control border-primary" value="<?php echo $post_code; ?>"
                                            hidden>
                                        <input type="text" name="Fullname" class="form-control border-primary"
                                            value="<?php echo $fullname; ?>" hidden>
                                        <input type="text" name="Position" class="form-control border-primary"
                                            value="<?php echo $atype_name; ?>" hidden>
                                        <input type="text" name="Commenter" class="form-control border-primary"
                                            value="<?php echo $s_aid; ?>" hidden>
                                        <textarea class="form-control border-primary textarea-1" name="CommentContent"
                                            id="CommentContent" placeholder="Write Comment.."></textarea>
                                        <input type="text" name="AddComment" value="AddComment"
                                            class="form-control border-primary" hidden>
                                        <button type="submit" class="btn btn-primary ms-2" id="AddComment"
                                            name="AddComment">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="hr-1 bg-gray-300"></div>

                    <div id="CommentsDiv" class="rounded-bottom overflow-hidden">

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>

    <script>
    fetchAllComments();
    </script>
</body>

</html>
