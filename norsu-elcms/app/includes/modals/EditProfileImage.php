<!-- Modal -->
<div class="modal fade" id="EditProfileCoverModal" tabindex="-1" aria-labelledby="EditProfileCoverModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="EditProfileCover">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditProfileCoverModalLabel">EDIT PROFILE COVER</h5>
                    <button id="ModalCloseButtonEditProfileCoverOne" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body EditProfileCoverModalBody">
                    <ul id="alertProfileCoverSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgProfileCoverAll" class="d-none"></li>
                    </ul>

                    <input type="file" id="ProfileCoverInput" accept="image/*" name="ProfileCoverInput"
                        class="form-control border-primary">

                    <div id="UploadProfileCoverPreview" class="mt-4">

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseButtonEditProfileCoverTwo" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Close</span></button>

                    <button id="EditProfileCoverBtn" type="button" class="btn btn-primary" disabled>
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span> SUBMIT </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade " id="EditProfilePhotoModal" tabindex="-1" aria-labelledby="EditProfilePhotoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <form action="" id="EditProfilePhoto">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditProfilePhotoModalLabel">EDIT PROFILE PHOTO</h5>
                    <button id="ModalCloseButtonEditProfilePhotoOne" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertProfilePhotoSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgProfilePhotoAll" class="d-none"></li>
                    </ul>

                    <input type="file" id="ProfilePhotoInput" accept="image/*" name="ProfilePhotoInput"
                        class="form-control border-primary">

                    <div id="UploadProfilePhotoPreview" class="mt-4">

                    </div>

                </div>
                <div class="modal-footer">
                    <button id="ModalCloseButtonEditProfilePhotoTwo" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                        <span>Close</span>
                    </button>
                    <button id="EditProfilePhotoBtn" type="button" class="btn btn-primary" disabled>
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span> SUBMIT </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
