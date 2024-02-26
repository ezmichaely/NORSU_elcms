 <!-- choose account -->
 <div id="ChooseAccountForm" class="d-block mb-3">
     <div class="row justify-content-center">
         <div class="col-md-6">
             <div class="row justify-content-center ">
                 <div class="col-lg-9">
                     <div class="row justify-content-center border border-primary rounded bg-primary overflow-hidden">
                         <div class="col-md-12">
                             <div class="brand-register">
                                 <img src="<?php echo (BASE_URL . '/assets/images/logo/logo.svg') ?>" alt="brand-logo"
                                     class="brand-logo" />
                                 <h3 class="brand-name">
                                     NORSU&nbsp;-&nbsp;eLCMS
                                 </h3>
                             </div>
                         </div>
                         <div class="col-md-12 p-3 bg-white">
                             <?php if(isset($_SESSION['message'])) : ?>
                             <ul id="alertRegisterSuccess" role="alert"
                                 class="alert alert-success <?php echo $_SESSION['class']; ?>">
                                 <li id="succMsgRegisterAll" class="<?php echo $_SESSION['class']; ?>">
                                     <?php echo $_SESSION['message']; ?>
                                 </li>
                             </ul>
                             <?php endif; unset($_SESSION['message']); unset($_SESSION['class']);?>

                             <h4 class="text-uppercase fw-bold lh-sm text-center">Choose an Account</h4>

                             <button id="RegistrationStudentBtn"
                                 class="mt-3 w-100 btn btn-outline-primary py-2 d-flex justify-content-start align-items-center flex-row">
                                 <div
                                     class="h-60px-min w-60px-min rounded-circle shadow bg-white d-flex justify-content-center align-items-center">
                                     <i class="fa-solid fa-screen-users text-primary fs-3"></i>
                                 </div>
                                 <div class="ms-3 d-flex justify-content-start align-items-start flex-column">
                                     <span class="font-title fs-4 lh-1 text-start">STUDENT ACCOUNT</span>
                                     <span class="fw-500 lh-sm pt-1 text-capitalize font-text fs-7 text-start">
                                         For All Students.
                                     </span>
                                 </div>
                             </button>

                             <button id="RegistrationTeacherBtn"
                                 class="mt-3 w-100 btn btn-outline-primary py-2 d-flex justify-content-start align-items-center flex-row">
                                 <div
                                     class="h-60px-min w-60px-min rounded-circle shadow bg-white d-flex justify-content-center align-items-center">
                                     <i class="fa-solid fa-chalkboard-user text-primary fs-3"></i>
                                 </div>
                                 <div class="ms-3 d-flex justify-content-start align-items-start flex-column">
                                     <span class="font-title fs-4 lh-1 text-start">TEACHER ACCOUNT</span>
                                     <span class="fw-500 lh-sm pt-1 text-capitalize text-start font-text fs-7">
                                         For Instructors, Department Head, and College Deans.
                                     </span>
                                 </div>
                             </button>
                             <p class="my-2 text-center font-text fw-bold fs-7">
                                 Already have an account?
                             </p>

                             <a href="<?php echo (BASE_URL . '/index.php') ?> " class="btn btn-primary w-100">
                                 log in now
                             </a>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- end of choose account -->
