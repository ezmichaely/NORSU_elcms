<?php 
    function studentOnly() {
        if(empty($_SESSION['norsu-elcms-sid'])) {
            // echo "<script>alert('Please log in first!')</script>";
            echo "<script>window.open('".BASE_URL."/index.php','_self')</script>";
            exit(0);
        } else {
            if(!empty($_SESSION['norsu-elcms-instructor'])) {
                header('location: ' . BASE_URL . '/instructor/index.php');
                exit(0);
            }
            if(!empty($_SESSION['norsu-elcms-depthead'])) {
                header('location: ' . BASE_URL . '/depthead/index.php');
                exit(0);
            }
            if(!empty($_SESSION['norsu-elcms-dean'])) {
                header('location: ' . BASE_URL . '/dean/index.php');
                exit(0);
            }
            if(!empty($_SESSION['norsu-elcms-admin'])) {
                header('location: ' . BASE_URL . '/admin/index.php');
                exit(0);
            }
        }
    }

    function instructorOnly() {
        if(empty($_SESSION['norsu-elcms-sid'])) {
            header('location: ' . BASE_URL . '/index.php');
            exit();
        } else {
            if(!empty($_SESSION['norsu-elcms-student'])) {
                header('location: ' . BASE_URL . '/student/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-depthead'])) {
                header('location: ' . BASE_URL . '/depthead/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-dean'])) {
                header('location: ' . BASE_URL . '/dean/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-admin'])) {
                header('location: ' . BASE_URL . '/admin/index.php');
                exit();
            }
        }
    }

    function deptheadOnly() {
        if(empty($_SESSION['norsu-elcms-sid'])) {
            header('location: ' . BASE_URL . '/index.php');
            exit();
        } else {
            if(!empty($_SESSION['norsu-elcms-student'])) {
                header('location: ' . BASE_URL . '/student/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-instructor'])) {
                header('location: ' . BASE_URL . '/instructor/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-dean'])) {
                header('location: ' . BASE_URL . '/dean/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-admin'])) {
                header('location: ' . BASE_URL . '/admin/index.php');
                exit();
            }
        }
    }

    function deanOnly() {
        if(empty($_SESSION['norsu-elcms-sid'])) {
            header('location: ' . BASE_URL . '/index.php');
            exit();
        } else {
            if(!empty($_SESSION['norsu-elcms-student'])) {
                header('location: ' . BASE_URL . '/student/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-instructor'])) {
                header('location: ' . BASE_URL . '/instructor/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-depthead'])) {
                header('location: ' . BASE_URL . '/depthead/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-admin'])) {
                header('location: ' . BASE_URL . '/admin/index.php');
                exit();
            }
        }
    }

    function adminOnly() {
        if(empty($_SESSION['norsu-elcms-sid'])) {
            header('location: ' . BASE_URL . '/admin/login.php');
            exit();
        } else {
            if(!empty($_SESSION['norsu-elcms-student'])) {
                header('location: ' . BASE_URL . '/student/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-instructor'])) {
                header('location: ' . BASE_URL . '/instructor/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-depthead'])) {
                header('location: ' . BASE_URL . '/depthead/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-dean'])) {
                header('location: ' . BASE_URL . '/dean/index.php');
                exit();
            }
        }
    }

    function loggedIN() {
        if (!empty($_SESSION['norsu-elcms-sid'])) {
            if(!empty($_SESSION['norsu-elcms-student'])) {
                header('location: ' . BASE_URL . '/student/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-instructor'])) {
                header('location: ' . BASE_URL . '/instructor/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-depthead'])) {
                header('location: ' . BASE_URL . '/depthead/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-dean'])) {
                header('location: ' . BASE_URL . '/dean/index.php');
                exit();
            }
            if(!empty($_SESSION['norsu-elcms-admin'])) {
                header('location: ' . BASE_URL . '/admin/index.php');
                exit();
            }
        }
    }
?>
