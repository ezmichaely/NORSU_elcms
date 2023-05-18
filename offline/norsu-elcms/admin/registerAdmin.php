<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    adminOnly();

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
?>

<?php 
    $title = $page = 'Register Admin';
    $head_title = 'Register Admin';
    $pagehas = array('authentication');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <div class="h-body fluid-padding d-flex justify-content-between align-items-center">
        <div class="container my-3 fluid-padding ">
            <div class="row justify-content-center fluid-padding">
                <div class="col-md-8 col-lg-8 border bg-primary rounded shadow p-0">
                    <div class="d-flex justify-content-between align-items-center flex-column ">
                        <div class="brand-register w-100 rounded-top my-2">
                            <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.svg') ?>" alt="brand-logo"
                                class="brand-logo" />
                            <h3 class="brand-name mt-2">
                                NORSU&nbsp;-&nbsp;eLCMS
                            </h3>
                        </div>
                        <div class="bg-white pt-2 pb-3 w-100">
                            <div class="text-center">
                                <img src="<?php echo (BASE_URL . "/assets/images/icons/male_user.svg") ?>" alt=""
                                    height="80" class="" />
                                <h4 class="fw-bold text-center"> ADMIN REGISTRATION </h4>
                            </div>

                            <form id="RegisterAdminForm" action="POST" class="row g-2 mx-0 px-3 mt-2"
                                autocomplete="off">
                                <ul id="alertRegisterAdminSuccess" role="alert" class="d-none alert alert-success">
                                    <li id="succMsgRegisterAdminAll" class="d-none"></li>
                                </ul>

                                <ul id="alertRegisterAdminError" class="d-none alert alert-danger" role="alert">
                                    <li class="d-none" id="errRegisterAdminAll"></li>
                                    <li class="d-none" id="errRegisterAdminFirstname"></li>
                                    <li class="d-none" id="errRegisterAdminMiddlename"></li>
                                    <li class="d-none" id="errRegisterAdminLastname"></li>
                                    <li class="d-none" id="errRegisterAdminDob"></li>
                                    <li class="d-none" id="errRegisterAdminGender"></li>
                                    <li class="d-none" id="errRegisterAdminHomeAddress"></li>
                                    <li class="d-none" id="errRegisterAdminEmailAdd"></li>
                                    <li class="d-none" id="errRegisterAdminContactNo"></li>
                                    <li class="d-none" id="errRegisterAdminID"></li>
                                    <li class="d-none" id="errRegisterAdminUsername"></li>
                                    <li class="d-none" id="errRegisterAdminPassword"></li>
                                    <li class="d-none" id="errRegisterAdminConfirmPassword"></li>
                                </ul>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminFirstname" class="form-label">
                                        first name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminFirstname"
                                        name="RegisterAdminFirstname" placeholder="First Name"
                                        onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminMiddlename" class="form-label">
                                        middle name
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminMiddlename"
                                        name="RegisterAdminMiddlename" placeholder="Middle Name"
                                        onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminLastname" class="form-label">
                                        last name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminLastname"
                                        name="RegisterAdminLastname" placeholder="Last Name"
                                        onkeypress="if (!isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                </div>

                                <!-- date of birth -->
                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminSuffix" class="form-label">
                                        suffix or name extension
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminSuffix"
                                        placeholder="ex. Jr / Sr / III" name="RegisterAdminSuffix" />
                                </div>

                                <!-- date of birth -->
                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminDob" class="form-label">
                                        date of birth <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control border-primary" id="RegisterAdminDob"
                                        name="RegisterAdminDob" />
                                </div>

                                <!-- gender -->
                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminGender" class="form-label">
                                        Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select border-primary" aria-label="Default select example"
                                        name="RegisterAdminGender" id="RegisterAdminGender">
                                        <option hidden value="0">Select your gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="RegisterAdminHomeAddress" class="form-label">
                                        home address <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control textarea-2 border-primary"
                                        id="RegisterAdminHomeAddress" name="RegisterAdminHomeAddress"
                                        placeholder="Home Address"></textarea>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminEmailAdd" class="form-label">
                                        Email address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control border-primary" id="RegisterAdminEmailAdd"
                                        name="RegisterAdminEmailAdd" placeholder="Email Address" />
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminContactNo" class="form-label">
                                        contact number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminContactNo"
                                        name="RegisterAdminContactNo" maxlength="11" placeholder="09XX-XXX-XXXX"
                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminID" class="form-label">
                                        EMPLOYEE ID NUMBER <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminID"
                                        name="RegisterAdminID" placeholder="Employee ID Number" />
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminUsername" class="form-label">
                                        username <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control border-primary" id="RegisterAdminUsername"
                                        name="RegisterAdminUsername" placeholder="Username" />
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminPassword" class="form-label">
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control flex-grow border-primary "
                                            id="RegisterAdminPassword" name="RegisterAdminPassword"
                                            data-toggle="password" aria-describedby="RegisterAdminPasswordIcon"
                                            placeholder="Password" />
                                        <span
                                            class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                            id="RegisterAdminPasswordIcon" style="width: 46px">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <label for="RegisterAdminConfirmPassword" class="form-label">
                                        Confirm Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control flex-grow border-primary "
                                            id="RegisterAdminConfirmPassword" name="RegisterAdminConfirmPassword"
                                            data-toggle="password" aria-describedby="RegisterAdminConfirmPasswordIcon"
                                            placeholder="Confirm Password" />
                                        <span
                                            class="input-group-text d-flex justify-content-center align-items-center btn btn-outline-primary"
                                            id="RegisterAdminConfirmPasswordIcon" style="width: 46px">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end align-items center mt-3">
                                    <input type="text" class="form-control border-primary" id="RegisterAdmin"
                                        name="RegisterAdmin" value="RegisterAdmin" hidden />

                                    <button class="btn btn-primary" type="submit" id="RegisterAdminBtn"
                                        name="RegisterAdminBtn">
                                        <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>
                                        <span class="ms-2">REGISTER NOW</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/footer.php') ?>
    <?php include(ROOT_PATH . '/app/includes/script.php') ?>
    <script>
    setTimeout(function() {
            let message = $(" #succMsgRegisterAll").text();
            if (message != '') {
                $("#succMsgRegisterAll").html('');
                $("#alertRegisterSuccess").removeClass('d-block');
                $("#alertRegisterSuccess").addClass('d-none');
                $("#succMsgRegisterAll").removeClass('d-block');
                $("#succMsgRegisterAll").addClass('d-none');
            }
        },
        15000);
    </script>
</body>

</html>
