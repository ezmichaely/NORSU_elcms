<form id="DownloadModuleForm" method="POST"
    action="<?php echo BASE_URL.'/app/controllers/crud/crudModulesDownload.php'; ?>">
    <input type="text" class="form-control border-primary" id="DownloadModuleCode" name="DownloadModuleCode"
        value="<?php echo $mcode; ?>" hidden>
    <input type="text" class="form-control border-primary" id="DownloadModuleButton" name="DownloadModuleButton"
        value="DownloadModuleButton" hidden>
    <button type="submit" id="DownloadModule" class="btn btn-secondary ispan-md">
        <i class="fa-solid fa-download"></i>
        <span class="ms-1">download module</span>
    </button>
</form>
