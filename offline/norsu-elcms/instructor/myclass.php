<?php require_once('../path.php');?>
<?php include_once(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    instructorOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');
?>

<?php 
    $title = 'My Class'; $page = 'myclass';
    $pagehas = array('class');
?>
<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2 h-88min">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-between align-items-center">

                <h2 class="fw-bolder font-title text-uppercase"> MY CLASSes </h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success font-title fw-bold ispan-md" data-bs-toggle="modal"
                    data-bs-target="#CreateClassModal">
                    <i class="fa-solid fa-plus"></i>
                    <span>CREATE CLASS</span>
                </button>

                <?php include ROOT_PATH . '/app/includes/modals/CreateClassModal.php'?>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>
            <div class="card p-3 h-80min">
                <div class="row g-3" id="TeacherClasses">
                    <?php foreach ($stmtTeacherClasses as $row) : ?>
                    <?php 
                        $ccode = $row['class_code'];
                        $cmodule = $row['class_module'];
                        $csubject = $row['class_subject']; 
                        $csy = $row['class_schoolyear']; 
                        $csem = $row['class_semester']; 
                        $cday = $row['class_day'];
                        $ctime = $row['class_time'];
                        $csec = $row['class_section']; 
                        $cteacher = $row['class_teacher'];
                        
                        $syname = $row['schoolyear_name']; 
                        $semname = $row['semester_name'];

                        $sid = $row['subject_id']; 
                        $scode = $row['subject_code']; 
                        $stitle = $row['subject_title']; 

                        $aid = $row['account_unique']; 
                        $afn = $row['account_firstname'];
                        $amn = $row['account_middlename'];
                        $aln = $row['account_lastname'];
                        $asn = $row['account_suffixname']; 

                        $fullname = getFullName($afn, $amn, $aln, $asn);
                    ?>
                    <?php include ROOT_PATH . '/app/includes/common/class-datacard.php'?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </main>
    <?php include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
