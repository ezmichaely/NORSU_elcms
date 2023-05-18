<form id="CreateOutlineForm" method="POST" class="row g-2"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php if(!empty($_SESSION['msg'])) : ?>
    <ul id="alertCreateOutlineSuccess" role="alert" class="alert alert-success">
        <li id="succMsgCreateOutlineAll" class=""><?php echo $_SESSION['msg']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['msg']);?>

    <?php if(!empty($_SESSION['error'])) : ?>
    <ul role="alert" class="alert alert-danger">
        <li><?php echo $_SESSION['error']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['error']);?>

    <ul id="alertCreateOutlineError" role="alert" class="d-none alert alert-danger">
        <li id="errCreateOutlineAll" class="d-none"></li>
        <li id="errCreateOutlineTitle" class="d-none"></li>
    </ul>

    <!-- MODULE CODE -->
    <div class="col-md-4">
        <label for="CreateOutlineModuleCode" class="form-label"> Module Code </label>
        <input class="form-control border-primary" type="text" name="CreateOutlineModuleCode"
            id="CreateOutlineModuleCode" value="<?php echo $mcode ?>" readonly>
    </div>
    <!-- MODULE AUTHOR -->
    <div class="col-md-4">
        <label for="CreateOutlineModuleAuthor" class="form-label"> Module Author </label>
        <input class="form-control border-primary" type="text" name="CreateOutlineModuleAuthor"
            id="CreateOutlineModuleAuthor" value="<?php echo $mauthor ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $fullname ?>" readonly>
    </div>

    <!-- MODULE STATUS -->
    <div class="col-md-4">
        <label for="CreateOutlineModuleStatus" class="form-label"> Module Status </label>
        <input class="form-control border-primary" type="text" name="CreateOutlineModuleStatus"
            id="CreateOutlineModuleStatus" value="<?php echo $mstatus ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $mstatus ?>" readonly>
    </div>

    <!-- MODULE TITLE -->
    <div class="col-md-12">
        <label for="CreateOutlineModuleTitle" class="form-label"> Module TITLE </label>
        <input class="form-control border-primary" type="text" name="CreateOutlineModuleTitle"
            id="CreateOutlineModuleTitle" value="<?php echo $mtitle ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $mtitle ?>" readonly>
    </div>

    <!-- OUTLINE TITLE -->
    <div class="col-md-12">
        <label for="CreateOutlineTitle" class="form-label ">Outline Title</label>
        <textarea name="CreateOutlineTitle"
            class="form-control border border-primary rounded textarea-2 <?php if(!empty($_SESSION['title'])) {echo 'border-danger';} ?>"
            id="CreateOutlineTitle"
            placeholder="Outline Title"><?php if(!empty($_SESSION['title'])) :?><?php echo $_SESSION['title']; ?><?php endif; unset($_SESSION['title']); ?></textarea>
    </div>

    <!-- OUTLINE OBJECTIVE -->
    <div class="col-md-12">
        <label for="CreateOutlineObjectives" class="form-label"> Outline objectives </label>
        <div
            class="ckCreateor5-classic border border-primary <?php if(!empty($_SESSION['obj'])) {echo 'border-danger';} ?>">
            <textarea name="CreateOutlineObjectives" class="form-control border rounded" id="CreateOutlineObjectives"
                placeholder="Outline Objectives"><?php if(!empty($_SESSION['obj'])) :?><?php echo $_SESSION['obj']; ?><?php endif; unset($_SESSION['obj']); ?></textarea>
        </div>
    </div>

    <!-- OUTLINE CONTENT -->
    <div class="col-md-12 mb-2">
        <label for="CreateOutlineContent" class="form-label">Outline Content</label>
        <div
            class="ckCreateor5-classic border border-primary <?php if(!empty($_SESSION['content'])) {echo 'border-danger';} ?>">
            <textarea name="CreateOutlineContent" class="form-control border rounded" id="CreateOutlineContent" rows="3"
                placeholder="Outline Content"><?php if(!empty($_SESSION['content'])) :?><?php echo $_SESSION['content']; ?><?php endif; unset($_SESSION['content']); ?></textarea>
        </div>
    </div>

    <div class="col-12 text-end">
        <input type="text" id="CreateOutlineButton" name="CreateOutlineButton" class="btn btn-primary"
            value="CreateOutlineButton" hidden>
        <button type="submit" id="CreateOutline" name="CreateOutline" class="btn btn-primary">create outline</button>
    </div>
</form>
