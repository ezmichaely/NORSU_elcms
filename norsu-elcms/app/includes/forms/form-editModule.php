<form id="EditModuleForm" class="row g-2" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php if(!empty($_SESSION['msg'])) : ?>
    <ul id="alertEditModuleSuccess" role="alert" class="alert alert-success">
        <li id="succMsgEditModuleAll" class=""><?php echo $_SESSION['msg']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['msg']);?>

    <?php if(!empty($_SESSION['error'])) : ?>
    <ul role="alert" class="alert alert-danger">
        <li><?php echo $_SESSION['error']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['error']);?>

    <ul id="alertEditModuleError" role="alert" class="d-none alert alert-danger">
        <li id="errEditModuleAll" class="d-none"></li>
        <li id="errEditModuleSubjectCode" class="d-none"></li>
        <li id="errEditModuleTitle" class="d-none"></li>
        <li id="errEditModuleIntro" class="d-none"></li>
    </ul>

    <div class="col-md-4">
        <label for="EditModuleCode" class="form-label"> Module Code </label>
        <input class="form-control border-primary" type="text" name="EditModuleCode" id="EditModuleCode"
            value="<?php echo $mcode ?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="EditModuleAuthor" class="form-label"> Module Author </label>
        <input class="form-control border-primary" type="text" name="EditModuleAuthor" id="EditModuleAuthor"
            value="<?php echo $mauthor ?>" readonly hidden>
        <input class="form-control border-primary" type="text" name="EditModuleAuthorName" id="EditModuleAuthorName"
            value="<?php echo $fullname ?>" readonly>
    </div>
    <div class="col-md-4">
        <label for="EditModuleStatus" class="form-label"> Module Status </label>
        <input class="form-control border-primary" type="text" name="EditModuleStatus" id="EditModuleStatus"
            value="<?php echo $mstatus ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $mstatus ?>" readonly>
    </div>

    <!-- SUBJECT CODE -->
    <div class="col-md-4">
        <label for="EditModuleSubjectCode" class="form-label">
            Subject Code
        </label>
        <select id="EditModuleSubjectCode" name="EditModuleSubjectCode" class="form-control font-text"
            placeholder="Subject Code">

            <?php if(!empty($_SESSION['subject'])) : ?>
            <option value="<?php echo $_SESSION['subject']; ?>" selected>
                <?php echo $_SESSION['subjectcode']; ?>
            </option>
            <?php endif; unset($_SESSION['subjectcode']);?>

            <?php if(empty($_SESSION['subject'])) : ?>
            <option value="<?php echo $sid; ?>" selected hidden> <?php echo $scode; ?> </option>
            <?php foreach ($subjects as $row) : ?>
            <option value="<?php echo $row['subject_id']; ?>">
                <?php echo $row['subject_code']; if($sid == $row['subject_id']) {echo ' (selected)'; }?>
            </option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- SUBJECT TITLE -->
    <div class="col-md-8">
        <label for="EditModuleSubjectTitle" class="form-label">
            Subject Title
        </label>
        <select id="EditModuleSubjectTitle" name="EditModuleSubjectTitle" placeholder="Subject Title" disabled
            class="form-control font-text bg-white border-primary text-muted <?php if(!empty($_SESSION['subject'])) {echo 'border-danger';} ?> ">

            <?php if(!empty($_SESSION['subject'])) : ?>
            <option value="<?php echo $_SESSION['subject']; ?>" selected>
                <?php echo $_SESSION['subjecttitle']; ?>
            </option>
            <?php endif; unset($_SESSION['subject']); unset($_SESSION['subjecttitle']);?>

            <!-- <option value="<?php //echo $sid; ?>" selected> <?php //echo $stitle; ?> </option> -->
            <?php if(empty($_SESSION['subject'])) : ?>
            <option value=""> Subject Title </option>
            <?php foreach ($subjects as $row) : ?>
            <option value="<?php echo $row['subject_id']; ?>">
                <?php echo $row['subject_title']; ?>
            </option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <!-- MODULE CONSENT -->
    <div class="col-md-12">
        <fieldset class="">
            <label class="col-form-label">Module Consent</label>
            <div class="border border-primary rounded <?php if(!empty($_SESSION['consent'])){echo 'border-danger';}?>">
                <div class="row mx-0 py-1 ms-2">
                    <div class="form-check col-6 user-select-none">
                        <?php if(!empty($_SESSION['consent']) && ($_SESSION['consent'] == 'Agreed')) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="EditModuleConsent"
                            id="EditModuleConsentAgreed" value="Agreed" checked>
                        <?php endif; unset($_SESSION['consent']); ?>

                        <?php if(empty($_SESSION['consent'])) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="EditModuleConsent"
                            id="EditModuleConsentAgreed" value="Agreed"
                            <?php if ($mconsent == 'Agreed') { echo 'checked' ;} ?>>

                        <label class="form-check-label cursor-pointer" for="EditModuleConsentAgreed">
                            AGREED
                            <span class="text-lowercase fw-500 fst-italic text-danger">
                                (if you want this module to be reused by other instructor)
                            </span>
                        </label>
                        <?php endif; ?>
                    </div>
                    <div class="form-check col-6 user-select-none">
                        <?php if(!empty($_SESSION['consent']) && ($_SESSION['consent'] == 'Declined')) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="EditModuleConsent"
                            id="EditModuleConsentDeclined" value="Declined" checked>
                        <?php endif; unset($_SESSION['consent']); ?>

                        <?php if(empty($_SESSION['consent'])) : ?>
                        <input class="form-check-input cursor-pointer" type="radio" name="EditModuleConsent"
                            id="EditModuleConsentDeclined" value="Declined"
                            <?php if ($mconsent == 'Declined') { echo 'checked'; } ?>>

                        <label class="form-check-label  cursor-pointer" for="EditModuleConsentDeclined">
                            DECLINED
                            <span class="text-lowercase fw-500 fst-italic text-danger">
                                (if you want this module to be used alone)
                            </span>
                        </label>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

    <div class="col-md-12">
        <label for="EditModuleTitle" class="form-label ">
            Module title</label>
        <textarea name="EditModuleTitle"
            class="form-control border-primary textarea-2 <?php if(!empty($_SESSION['title'])) {echo 'border-danger';} ?>"
            id="EditModuleTitle"
            placeholder="Module Title"><?php if(!empty($_SESSION['title'])) { echo $_SESSION['title']; unset($_SESSION['title']); } else { echo $mtitle;} ?></textarea>
    </div>

    <div class="col-md-12">
        <label for="EditModuleIntro" class="form-label">
            Module introduction</label>
        <textarea name="EditModuleIntro"
            class="form-control border-primary textarea-3 <?php if(!empty($_SESSION['intro'])) {echo 'border-danger';} ?>"
            id="EditModuleIntro"
            placeholder="Module Introduction"><?php if(!empty($_SESSION['intro'])) { echo $_SESSION['intro']; unset($_SESSION['intro']); }else{ echo $mintro; } ?></textarea>
    </div>

    <div class="col-md-12">
        <label for="EditModuleOutcome" class="form-label">
            Learning Outcomes
        </label>
        <div
            class="ckeditor5-classic border border-primary <?php if(!empty($_SESSION['outcome'])) {echo 'border-danger';} ?>">
            <textarea name="EditModuleOutcome" class="form-control border-primary textarea-3" id="EditModuleOutcome"
                placeholder="Module Outcomes"
                hidden><?php if(!empty($_SESSION['outcome'])) { echo $_SESSION['outcome']; unset($_SESSION['outcome']); } else{echo $moutcome;}  ?></textarea>
        </div>
    </div>

    <div class="col-12 text-end">
        <input type="text" id="EditModuleButton" name="EditModuleButton" class="btn btn-primary"
            value="EditModuleButton" hidden>
        <button type="submit" id="EditModule" name="EditModule" class="btn btn-primary">
            Edit module
        </button>
    </div>
</form>
