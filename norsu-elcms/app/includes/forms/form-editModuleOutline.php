<form id="EditOutlineForm" class="row g-2" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php if(!empty($_SESSION['msg'])) : ?>
    <ul id="alertEditOutlineSuccess" role="alert" class="alert alert-success">
        <li id="succMsgEditOutlineAll" class=""><?php echo $_SESSION['msg']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['msg']);?>

    <?php if(!empty($_SESSION['error'])) : ?>
    <ul role="alert" class="alert alert-danger">
        <li><?php echo $_SESSION['error']; ?></li>
    </ul>
    <?php endif; unset($_SESSION['error']);?>

    <ul id="alertEditOutlineError" role="alert" class="d-none alert alert-danger">
        <li id="errEditOutlineAll" class="d-none"></li>
        <li id="errEditOutlineTitle" class="d-none"></li>
    </ul>

    <!-- MODULE CODE -->
    <div class="col-md-4">
        <label for="EditModuleCode" class="form-label"> Module Code </label>
        <input class="form-control border-primary" type="text" name="EditModuleCode" id="EditModuleCode"
            value="<?php echo $mcode ?>" readonly>
    </div>

    <!-- MODULE AUTHOR -->
    <div class="col-md-4">
        <label for="EditModuleAuthor" class="form-label"> Module Author </label>
        <input class="form-control border-primary" type="text" name="EditModuleAuthor" id="EditModuleAuthor"
            value="<?php echo $mauthor ?>" readonly hidden>
        <input class="form-control border-primary" type="text" name="EditModuleAuthorName" id="EditModuleAuthorName"
            value="<?php echo $fullname ?>" readonly>
    </div>

    <!-- MODULE STATUS -->
    <div class="col-md-4">
        <label for="EditModuleStatus" class="form-label"> Module Status </label>
        <input class="form-control border-primary" type="text" name="EditModuleStatus" id="EditModuleStatus"
            value="<?php echo $mstatus ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $mstatus ?>" readonly>
    </div>

    <!-- MODULE TITLE -->
    <div class="col-md-6">
        <label for="EditModuleTitle" class="form-label"> Module TITLE </label>
        <input class="form-control border-primary" type="text" name="EditModuleTitle" id="EditModuleTitle"
            value="<?php echo $mtitle ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $mtitle ?>" readonly>
    </div>

    <!-- OUTLINE CODE -->
    <div class="col-md-6">
        <label for="EditOutlineCode" class="form-label"> Outline Code </label>
        <input class="form-control border-primary" type="text" name="EditOutlineCode" id="EditOutlineCode"
            value="<?php echo $ocode ?>" readonly hidden>
        <input class="form-control border-primary" type="text" value="<?php echo $ocode ?>" readonly>
    </div>

    <!-- OUTLINE TITLE -->
    <div class="col-md-12">
        <label for="EditOutlineTitle" class="form-label ">Outline Title</label>
        <textarea name="EditOutlineTitle"
            class="form-control border border-primary rounded textarea-2 <?php if(!empty($_SESSION['title'])) {echo 'border-danger';} ?>"
            id="EditOutlineTitle"
            placeholder="Outline Title"><?php if(!empty($_SESSION['title'])) { echo $_SESSION['title']; unset($_SESSION['title']);} else{echo $otitle; }?></textarea>
    </div>

    <!-- OUTLINE OBJECTIVE -->
    <div class="col-md-12">
        <label for="EditOutlineObjectives" class="form-label"> Outline objectives </label>
        <div
            class="ckeditor5-classic border border-primary <?php if(!empty($_SESSION['obj'])) {echo 'border-danger';} ?>">
            <textarea name="EditOutlineObjectives" class="form-control border rounded" id="EditOutlineObjectives"
                placeholder="Outline Objectives"><?php if(!empty($_SESSION['obj'])) {echo $_SESSION['obj']; unset($_SESSION['obj']); }else{echo $oobj;} ?></textarea>
        </div>
    </div>

    <!-- OUTLINE CONTENT -->
    <div class="col-md-12 mb-2">
        <label for="EditOutlineContent" class="form-label">Outline Content</label>
        <div
            class="ckeditor5-classic border border-primary <?php if(!empty($_SESSION['content'])) {echo 'border-danger';} ?>">
            <textarea name="EditOutlineContent" class="form-control border rounded" id="EditOutlineContent" rows="3"
                placeholder="Outline Content"><?php if(!empty($_SESSION['content'])) { echo $_SESSION['content']; unset($_SESSION['content']); }else{echo $ocontent;} ?></textarea>
        </div>
    </div>

    <div class="col-12 text-end">
        <input type="text" id="EditOutlineButton" name="EditOutlineButton" class="btn btn-primary"
            value="EditOutlineButton" hidden>
        <button type="submit" id="EditOutline" name="EditOutline" class="btn btn-primary">Edit outline</button>
    </div>
</form>
