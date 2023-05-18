<?php require_once('../path.php');?>
<?php include(ROOT_PATH . '/app/config/dbConPDO.php'); ?>
<?php 
    include(ROOT_PATH . '/app/helpers/middleware.php'); 
    studentOnly();
    $s_aid = $_SESSION['norsu-elcms-sid'];
    include(ROOT_PATH . '/app/controllers/query/getSessionUser.php'); 
    include(ROOT_PATH . '/app/controllers/query/fetchAll.php');
?>

<?php 
    $title = 'NORSU-eLCMS | My Class'; $page = 'myclass';
    $pagehas = array('class');
?>

<?php include ROOT_PATH . '/app/includes/head.php'?>

<body class="">
    <?php include ROOT_PATH . '/app/includes/common/navbar.php'?>
    <main class="container-fluid fluid-padding my-2">
        <div class="container fluid-padding">
            <div class="d-flex justify-content-between align-items-center flex-row">
                <h2 class="fw-bold font-title text-uppercase my-0"> MY CLASSes </h2>

                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success font-title fw-bold ispan-md" data-bs-toggle="modal"
                        data-bs-target="#JoinClassModal">
                        <i class="fa fa-sign-in"></i>
                        <span class="ms-1">JOIN A CLASS</span>
                    </button>

                    <!-- <button type="button" class="btn btn-warning font-title fw-bold ispan-md">
                        <i class="fa-solid fa-file-zipper"></i>
                        <span class="ms-1">archived classes</span>
                    </button> -->
                </div>

                <?php include ROOT_PATH . '/app/includes/modals/JoinClassModal.php'?>
            </div>

            <div class="hr-1 bg-gray-300 my-2"></div>
            <div class="card p-3 h-80min">
                <div class="row g-3" id="TeacherClasses">
                    <?php foreach ($stmtStudentClasses as $row) : ?>
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
    <?php  include ROOT_PATH . '/app/includes/footer.php'?>
    <?php include ROOT_PATH . '/app/includes/script.php'?>
</body>

</html>
