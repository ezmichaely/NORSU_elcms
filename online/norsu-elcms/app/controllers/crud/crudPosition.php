<?php
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    
    // GET SINGLE Position DATA
    if(isset($_REQUEST['GetViewPositionBtn'])){
        $getPosition_id = $_REQUEST['GetViewPositionBtn'];

        $sqlGetPosition = "";
        $sqlGetPosition .= "SELECT * FROM atypes WHERE atype_id = :cid LIMIT 1";

        $stmtGetPosition = $pdo->prepare($sqlGetPosition);
        $stmtGetPosition->execute(['cid' => $getPosition_id]); 
        $rowGetPosition = $stmtGetPosition->fetch();
    
        $satype_id = $rowGetPosition['atype_id'];
        $satype_name = $rowGetPosition['atype_name'];
        // require this
        require(ROOT_PATH . '/app/includes/forms/form-viewPosition.php');
        exit();
    }// END OF GET SINGLE Course DATA

?>
