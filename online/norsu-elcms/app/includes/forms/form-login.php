<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="LoginForm"
    class="px-3 pb-3 pt-2">
    <div class="text-center">
        <img src="<?php echo (BASE_URL . "/assets/images/icons/male_user.svg") ?>" alt="" height="80" class="" />

        <?php if ($page == "LoginAdmin") : ?>
        <h4 class="font-title fw-bold mb-2">ADMIN LOGIN</h4>
        <?php endif; ?>

        <?php if ($page == "LoginUser") : ?>
        <h4 class="font-title fw-bold mb-2">LOGIN</h4>
        <?php endif; ?>

    </div>

    <ul id="alertLoginError" role="alert" class="d-none alert alert-danger">
        <li id="errLoginAll" class="d-none"></li>
        <li id="errLoginUsername" class="d-none"></li>
        <li id="errLoginPassword" class="d-none"></li>
    </ul>

    <div class="mb-2">
        <label for="LoginUsername" class="form-label"> USERNAME </label>
        <input type="text" id="LoginUsername" name="LoginUsername" placeholder="Enter Username"
            class="form-control border-primary" />
    </div>

    <div class="">
        <label for="LoginPassword" class="form-label"> Password </label>
        <div class="input-group">
            <input type="password" class="form-control flex-grow border-primary" id="LoginPassword" name="LoginPassword"
                placeholder="Enter Password" data-toggle="password" aria-describedby="basic-addon2" />
            <span class="input-group-text btn btn-outline-primary d-flex justify-content-center align-items-center"
                id="basic-addon2" style="width: 46px">
                <i class="fa fa-eye"></i>
            </span>
        </div>
    </div>


    <div class="mt-3">
        <!-- <a href="" class="mb-3 text-center font-text fw-bold fs-7 d-flex justify-content-center">
                Forgot Password?
            </a> -->
        <?php if ($page == "LoginAdmin") : ?>
        <button type="submit" class="w-100 btn btn-primary" name="LoginAdmin" id="LoginAdmin">
            ADMIN LOGIN
        </button>
        <?php endif; ?>

        <?php if ($page == "LoginUser") : ?>
        <button type="submit" class="w-100 btn btn-primary" name="LoginUser" id="LoginUser">
            LOGIN
        </button>
        <?php endif; ?>
    </div>

    <?php if ($page == "LoginUser") : ?>
    <div class="">
        <p class="my-2 text-center fw-bold fs-7">Don't have an account?</p>

        <a href="<?php echo (BASE_URL . '/signup.php') ?>" class="btn btn-outline-primary w-100">
            Sign up now
        </a>
    </div>
    <?php endif; ?>

</form>
