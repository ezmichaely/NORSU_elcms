<form id="CreateModuleForm" class="row g-2" method="POST"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php if(!empty($_SESSION['msg'])) : ?>
    <ul id="alertCreateModuleSuccess" role="alert" class="alert alert-success">
        <li id="succMsgCreateModuleAll" class=""><?php echo $_SESSION['msg']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['msg']);?>

    <?php if(!empty($_SESSION['error'])) : ?>
    <ul role="alert" class="alert alert-danger">
        <li><?php echo $_SESSION['error']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['error']);?>

    <ul id="alertCreateModuleError" role="alert" class="d-none alert alert-danger">
        <li id="errCreateModuleAll" class="d-none"></li>
        <li id="errCreateModuleSubjectCode" class="d-none"></li>
        <li id="errCreateModuleTitle" class="d-none"></li>
        <li id="errCreateModuleIntro" class="d-none"></li>
    </ul>

    <div class="col-md-4">
        <label for="CreateModuleSubjectCode" class="form-label">
            Subject Code
        </label>
        <select id="CreateModuleSubjectCode" name="CreateModuleSubjectCode" class="form-control font-text">

            <?php if(!empty($_SESSION['subject'])) : ?>
            <option value="<?php echo $_SESSION['subject']; ?>" selected>
                <?php echo $_SESSION['subjectcode']; ?>
            </option>
            <?php endif; unset($_SESSION['subjectcode']);?>

            <option value=""> Subject Code </option>


            <?php foreach ($subjects as $row) : ?>
            <option value="<?php echo $row['subject_id']; ?>">
                <?php echo $row['subject_code']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-8">
        <label for="CreateModuleSubjectTitle" class="form-label">
            Subject Title
        </label>
        <select id="CreateModuleSubjectTitle" name="CreateModuleSubjectTitle" placeholder="Subject Title" disabled
            class="form-control font-text bg-white border-primary text-muted <?php if(!empty($_SESSION['subject'])) {echo 'border-danger';} ?> ">

            <?php if(!empty($_SESSION['subject'])) : ?>
            <option value="<?php echo $_SESSION['subject']; ?>" selected>
                <?php echo $_SESSION['subjecttitle']; ?>
            </option>
            <?php endif; unset($_SESSION['subject']); unset($_SESSION['subjecttitle']);?>

            <option value=""> Subject Title </option>
            <?php foreach ($subjects as $row) : ?>
            <option value="<?php echo $row['subject_id']; ?>">
                <?php echo $row['subject_title']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- <div class="col-md-6">
        <label for="CreateModulePreRequisites" class="form-label fw-bold text-uppercase">Pre-Requisites</label>
        <input type="text"
            class="form-control border-primary <?php //if(!empty($_SESSION['prerequisites'])) {echo 'border-danger';} ?>"
            id="CreateModulePreRequisites" name="CreateModulePreRequisites" placeholder="Example: ITS 142, ITS 145"
            value="<?php //if(!empty($_SESSION['prerequisites'])) {echo $_SESSION['prerequisites'];} unset($_SESSION['prerequisites']);?>">
    </div> -->

    <div class="col-md-12">
        <fieldset class="">
            <label class="col-form-label">Module Consent</label>
            <div class="border border-primary rounded ">
                <div class="row mx-0 py-1 ms-2">
                    <div class="form-check col-6 user-select-none">
                        <?php if(!empty($_SESSION['consent']) && ($_SESSION['consent'] == 'Agreed')) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="CreateModuleConsent"
                            id="CreateModuleConsentAgreed" value="Agreed" checked>
                        <?php endif; unset($_SESSION['consent']); ?>

                        <input class="form-check-input cursor-pointer" type="radio" name="CreateModuleConsent"
                            id="CreateModuleConsentAgreed" value="Agreed">

                        <label class="form-check-label cursor-pointer" for="CreateModuleConsentAgreed">
                            AGREED
                            <span class="text-lowercase fw-500 fst-italic text-danger">
                                (if you want this module to be reused by other instructor)
                            </span>
                        </label>
                    </div>
                    <div class="form-check col-6 user-select-none">

                        <?php if(!empty($_SESSION['consent']) && ($_SESSION['consent'] == 'Declined')) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="CreateModuleConsent"
                            id="CreateModuleConsentDeclined" value="Declined" checked>
                        <?php endif; unset($_SESSION['consent']); ?>

                        <input class="form-check-input cursor-pointer" type="radio" name="CreateModuleConsent"
                            id="CreateModuleConsentDeclined" value="Declined" checked>

                        <label class="form-check-label cursor-pointer" for="CreateModuleConsentDeclined">
                            DECLINED
                            <span class="text-lowercase fw-500 fst-italic text-danger">
                                (if you want this module to be used alone)
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

    <div class="col-md-12">
        <label for="CreateModuleTitle" class="form-label ">
            Module title</label>
        <textarea name="CreateModuleTitle"
            class="form-control border-primary textarea-2 <?php if(!empty($_SESSION['title'])) {echo 'border-danger';} ?>"
            id="CreateModuleTitle"
            placeholder="Module Title"><?php if(!empty($_SESSION['title'])) :?><?php echo $_SESSION['title']; ?><?php endif; unset($_SESSION['title']); ?></textarea>
    </div>

    <div class="col-md-12">
        <label for="CreateModuleIntro" class="form-label">
            Module introduction</label>
        <textarea name="CreateModuleIntro"
            class="form-control border-primary textarea-3 <?php if(!empty($_SESSION['intro'])) {echo 'border-danger';} ?>"
            id="CreateModuleIntro"
            placeholder="Module Introduction"><?php if(!empty($_SESSION['intro'])) :?><?php echo $_SESSION['intro']; ?><?php endif; unset($_SESSION['intro']); ?></textarea>
    </div>

    <div class="col-md-12">
        <label for="CreateModuleOutcome" class="form-label">
            Learning Outcomes
        </label>
        <div
            class="ckeditor5-classic border border-primary <?php if(!empty($_SESSION['outcome'])) {echo 'border-danger';} ?>">
            <textarea name="CreateModuleOutcome" class="form-control border-primary textarea-3" id="CreateModuleOutcome"
                placeholder="Module Outcomes"
                hidden><?php if(!empty($_SESSION['outcome'])) :?><?php echo $_SESSION['outcome']; ?><?php endif; unset($_SESSION['outcome']); ?></textarea>
        </div>
    </div>

    <div class="col-12 text-end">
        <input type="text" id="CreateModuleButton" name="CreateModuleButton" class="btn btn-primary"
            value="CreateModuleButton" hidden>
        <button type="submit" id="CreateModule" name="CreateModule" class="btn btn-primary">
            create module
        </button>
    </div>
</form>
