<!-- Modal -->
<div class="modal fade" id="JoinClassModal" tabindex="-1" aria-labelledby="JoinClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="JoinClassForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="JoinClassModalLabel">JOIN A CLASS</h5>
                    <button type="button" id="ModalCloseButtonJoinClassOne" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="alertJoinClassSuccess" role="alert" class="d-none alert alert-success">
                        <li id="succMsgJoinClassAll" class="d-none"></li>
                    </ul>

                    <ul id="alertJoinClassError" role="alert" class="d-none alert alert-danger fw-bold fs-7 py-2 px-4">
                        <li id="errJoinClassAll" class="d-none"></li>
                    </ul>

                    <div class="">
                        <label for="JoinClassCode" class="form-label">
                            CLASS CODE
                        </label>
                        <input type="text" class="form-control border-primary" placeholder="Class Code"
                            name="JoinClassCode" id="JoinClassCode">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ModalCloseButtonJoinClassTwo" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="JoinClass" name="JoinClass" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
