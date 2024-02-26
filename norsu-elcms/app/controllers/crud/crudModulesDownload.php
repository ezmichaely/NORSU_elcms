<?php 
    include('../../../path.php');
    include_once(ROOT_PATH . '/app/config/dbConPDO.php');

    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    
    // dd($_POST);
    require_once(ROOT_PATH . '/assets/vendor/dompdf/autoload.inc.php'); 
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    define("DOMPDF_UNICODE_ENABLED", true);

    //initialize dompdf class
    $document = new Dompdf();
    $html = '';
    $html =
        '<style>
            @import url("https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Montserrat:wght@400;500;700&family=Roboto:wght@400;500&display=swap");
            p, span, .blob {font-family: "Roboto", sans-serif !important;}
            h1, h2, h3, h4, h5, h6, .font-title {font-family: "Montserrat", sans-serif !important;}
            .font-brand {font-family: "Lora" !important;}
            .m-1 {margin: 0.25rem !important;}
            .m-2 {margin: 0.5rem !important;}
            .m-3 {margin: 1rem !important;}
            .m-4 {margin: 1.5rem !important;}
            .m-5 {margin: 3rem !important;}
            .my-0 {margin-top: 0 !important; margin-bottom: 0 !important;}
            .my-1 {margin-top: 0.25rem !important; margin-bottom: 0.25rem !important;}
            .my-2 {margin-top: 0.5rem !important; margin-bottom: 0.5rem !important;}
            .my-3 {margin-top: 1rem !important; margin-bottom: 1rem !important;}
            .my-4 {margin-top: 1.5rem !important; margin-bottom: 1.5rem !important;}
            .my-5 {margin-top: 3rem !important; margin-bottom: 3rem !important;}
            .ms-1 {margin-left: 0.25rem !important;}
            .ms-2 {margin-left: 0.5rem !important;}
            .ms-3 {margin-left: 1rem !important;}
            .ms-4 {margin-left: 1.5rem !important;}
            .ms-5 {margin-left: 3rem !important;}
            .p-1 {padding: 0.25rem !important;}
            .p-2 {padding: 0.5rem !important;}
            .p-3 {padding: 1rem !important;}
            .p-4 {padding: 1.5rem !important;}
            .p-5 {padding: 3rem !important;}
            .pt-1 {padding-top: .25rem !important}
            .pt-2 {padding-top: .5rem !important}
            .pt-3 {padding-top: 1rem !important}
            .pt-4 {padding-top: 1.5rem !important}
            .pt-5 {padding-top: 3rem !important}
            .ps-1 {padding-left: .25rem !important}
            .ps-2 {padding-left: .5rem !important}
            .ps-3 {padding-left: 1rem !important}
            .ps-4 {padding-left: 1.5rem !important}
            .ps-5 {padding-left: 3rem !important}
            .px-1 { padding-right: .25rem !important; padding-left: .25rem !important}
            .px-2 { padding-right: .5rem !important; padding-left: .5rem !important}
            .px-3 { padding-right: 1rem !important; padding-left: 1rem !important}
            .px-4 { padding-right: 1.5rem !important; padding-left: 1.5rem !important}
            .px-5 { padding-right: 3rem !important; padding-left: 3rem !important}
            .py-0 { padding-top: 0 !important; padding-bottom: 0 !important}
            .py-1 { padding-top: .25rem !important; padding-bottom: .25rem !important}
            .py-2 { padding-top: .5rem !important; padding-bottom: .5rem !important}
            .py-3 { padding-top: 1rem !important; padding-bottom: 1rem !important}
            .py-4 { padding-top: 1.5rem !important; padding-bottom: 1.5rem !important}
            .py-5 { padding-top: 3rem !important; padding-bottom: 3rem !important}
            .rounded {border-radius: 0.25rem !important;}
            .bg-white {background-color: #fff !important;}
            .bg-warning {background-color: #ffc107 !important;}
            .flex-row {display: flex; align-items: center; justify-content: center; flex-direction: row;} 
            .text-danger {color: #dc3545 !important;}
            .text-primary {color: #0d6efd !important;}
            .text-center {text-align: center !important}
            .text-uppercase { text-transform: uppercase !important; }
            .text-break {  word-wrap: break-word !important; word-break: break-word !important }
            .lh-1 { line-height: 1 !important }
            .fw-500 { font-weight: 500 !important}
            .fw-bold { font-weight: 700 !important }
            .text-muted {color: #6c757d !important}
            .text-decoration-underline { text-decoration: underline !important }
            .border-danger {border: 1px solid red !important; }
        </style>';
        
    $mcode = trimSlash($_POST['DownloadModuleCode']);
    $sqlModules = "SELECT * FROM modules 
        INNER JOIN subjects ON subjects.subject_id = modules.subject_id
        INNER JOIN accounts ON accounts.account_unique = modules.module_author
        WHERE modules.module_code = ?";
    $stmtModules = $pdo->prepare($sqlModules);
    $stmtModules->execute([$mcode]);

    if ($stmtModules->rowCount() > 0 ) {
        while ($rowModules = $stmtModules->fetch()) {
            $mtitle = $rowModules['module_title']; 
            $mintro = $rowModules['module_intro'];
            $moutcome = $rowModules['module_outcomes']; 
            $mauthor = $rowModules['module_author'];

            $scode = $rowModules['subject_code'];

            $aid = $rowModules['account_unique']; 
            $afn = $rowModules['account_firstname']; 
            $amn = $rowModules['account_middlename']; 
            $aln = $rowModules['account_lastname']; 
            $asn = $rowModules['account_suffixname']; 
            $fullname = getFullName($afn, $amn, $aln, $asn);
        } 
    }
    
    $sqlOutline = "SELECT * FROM outlines
        WHERE outlines.module_code = ? 
        ORDER BY outlines.outline_number ASC";
    $stmtOutline = $pdo->prepare($sqlOutline);
    $stmtOutline->execute([$mcode]);
    $html .= '<br/>';
    $html .= '
        <div class="bg-white">
            <div class="text-center">
                <h1 class="font-brand text-uppercase fw-bold text-break lh-1" style="font-size: 3rem !important;">
                    '.$mtitle.'
                </h1>
                <p class="lh-1 ">
                    <span class="text-muted ">Prepared by:</span>
                    <span class="fw-bold text-decoration-underline text-primary">'.$fullname.'</span>
                </p>
            </div>

            <div class="">
                <div class="">
                    <h3 class="font-brand fw-bold text-uppercase text-primary lh-1">Module Introduction : </h3>
                    <p class="ps-3 font-text blob py-0 my-0">'.$mintro.'</p>
                </div>
                <div class="">
                    <h3 class="font-brand fw-bold text-uppercase text-primary lh-1">Module Outcomes : </h3>
                    <div class="ps-3 blob py-0 my-0">'.$moutcome.'</div>
                </div>
            </div>';
        
    foreach ($stmtOutline as $row) {
        $onum = numberToRomanRepresentation($row['outline_number']);
        $otitle = $row['outline_title'];
        $oobj = $row['outline_objective'];
        $ocontent = $row['outline_content'];
        
       $html .= '
            <div class="text-center">
                <h2 class="font-brand fw-bold text-uppercase bg-warning rounded d-inline-flex w-100 lh-1">
                    <span class=" font-brand">'.$onum.'</span>
                    <span class=" font-brand"> - </span>
                    <span class=" font-brand"> '.$otitle.' </span>
                </h2>
            </div>
            <div class="">
                <h3 class="font-brand fw-bold text-uppercase text-primary lh-1"> Outline Objectives : </h3>
                <div class="ps-3 blob py-0 my-0"> '.$oobj.'</div>
            </div>
            <div class="">
                <h3 class="font-brand fw-bold text-uppercase text-primary lh-1"> Outline Content : </h3>
                <div class="ps-3 blob py-0 my-0">'.$ocontent.'</div>
            </div>
        </div>';
    }
    $document->set_option('isRemoteEnabled', TRUE);
    $document->loadHtml($html);
    $document->setPaper('A4', 'portrait');
    $document->render();
    $document->stream($scode.' - '.$mtitle, array("Attachment" => 1));
?>
