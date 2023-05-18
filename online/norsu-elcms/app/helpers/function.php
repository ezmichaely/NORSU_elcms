<?php   
    // print_value
    function dd($value) {
        echo '<pre>', print_r($value, true), '</pre>';
        die();
    }

    // trim special characters
    function trimSlash($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // generate
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // get current date
    // function getDate(){
    //     return date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date("h:i:sa")));
    // }

    function getCurrentDate(){
        date_default_timezone_set('Asia/Manila');
        return date("Y-m-d");
    }

    function getCurrentTime() {
        date_default_timezone_set('Asia/Manila');
        return date("h:i:sa");
    }
    
    function getPostDate($date) {
        date_default_timezone_set('Asia/Manila');
        $date = date("M j, Y", strtotime($date));
        return ($date);
    }

    function getPostDay($day) {
        date_default_timezone_set('Asia/Manila');
        $day = date("D", strtotime($day));
        return ($day);
    }

    function getPostTime($time) {
        date_default_timezone_set('Asia/Manila');
        $time = date("h:i a", strtotime($time));
        return ($time);
    }

    function getDateTime ($datetime) {
        date_default_timezone_set('Asia/Manila');
        $datetime = date("M j, Y h:i a", strtotime($datetime));
        return ($datetime);
    }

    function file_get_contents_curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }


    // get full name
    function getFullName($fname, $mname, $lname, $suffix) {
        $fullname = "";
        if($mname === "" && $suffix === "") {
            $fullname = $fname ." " . $lname;
            return $fullname; 
        }
        else if ($mname !== "" && $suffix === "") {
            $fullname = $fname ." ". $mname ." ". $lname;
            return $fullname; 
        }
        else if ($mname === "" && $suffix !== "") {
            $fullname = $fname ." ". $lname ." ". $suffix;
            return $fullname; 
        } 
        else if ($mname !== "" && $suffix !== "") {
            $fullname .= $fname. " " .$mname. " " .$lname." ".$suffix;
            return $fullname; 
        }
    }

    // get Directory
    function getDirectory($directory) {
        if($directory == '1') {
            $directory = "admin";
            return $directory;
        } else if ($directory == '2') {
            $directory = "student";
            return $directory;
        } else if ($directory == '3') {
            $directory = "instructor"; 
            return $directory;
        } else if ($directory == '4') {
            $directory = "depthead"; 
            return $directory;
        } else if ($directory == '5') {
            $directory = "dean";
            return $directory;
        }
    }

    // get Position
    function getPosition($position) {
        if($position == '1') {
            $position = 'Admin';
            return $position;
        } else if ($position == '2') {
            $position = 'Student';
            return $position;
        } else if ($position == '3') {
            $position = 'Instructor'; 
            return $position;
        } else if ($position == '4') {
            $position = 'Department Head'; 
            return $position;
        } else if ($position == '5') {
            $position = 'College Dean';  
            return $position;
        }
    }

    // default profile photo 
    function getProfilePhoto ($profilephoto) {
        if($profilephoto == 'Male') {
            $profilephoto = 'male_user.svg';
            return $profilephoto;
        } else if ($profilephoto == 'Female') {
            $profilephoto = 'female_user.svg';
            return $profilephoto;
        }
    }

    // get GENDER ADJECTIVE
    function getGenderAdj($gender) {
        $genderadj = "";
        if($gender == 'Male') {
            $genderadj = 'his';
            return $genderadj;
        } else if ($gender == 'Female') {
            $genderadj = 'her';
            return $genderadj;
        }
    }

    // get PHOTO PATH (cover & profile)
    function getPhotoPath($path, $file_name) {
        $photopath = $path.$file_name;
        return $photopath;
    }

    function numberToRomanRepresentation($number) {
        $map = array(
            'M' => 1000, 
            'CM' => 900, 
            'D' => 500, 
            'CD' => 400, 
            'C' => 100, 
            'XC' => 90, 
            'L' => 50, 
            'XL' => 40, 
            'X' => 10, 
            'IX' => 9, 
            'V' => 5, 
            'IV' => 4, 
            'I' => 1
        );
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
?>
