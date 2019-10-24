<?php

    $msg = '';
    $msgClass = '';
    $msgButton = 0;

if(isset($_POST['submit'])) {

    $uname1 = htmlspecialchars($_POST['username1']);
    $uname2 = htmlspecialchars($_POST['username2']);
    $uemail = htmlspecialchars($_POST['email']);
    $uphone = htmlspecialchars($_POST['phone']);
    $upass1 = htmlspecialchars($_POST['pass1']);
    $upass2 = htmlspecialchars($_POST['pass2']);
    $ufirst = htmlspecialchars($_POST['firstname']);
    $ulast = htmlspecialchars($_POST['lastname']);
    $uabout = htmlspecialchars($_POST['aboutuser']);
    $ucity = htmlspecialchars($_POST['city']);
    $ustate = htmlspecialchars($_POST['state']);

    if(empty($uname1) || empty($uname2) || empty($uemail) || empty($uphone) || empty($upass1) || empty($upass2) || empty($ufirst) || empty($ulast) || empty($uabout) || empty($ucity) || empty($ustate)) {
        // error fill in all fields
        $msg = 'please fill in all fields';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } elseif(filter_var($uemail, FILTER_VALIDATE_EMAIL) === false) {
        // error please use valid email
        $msg = 'please enter a valid email';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } elseif($uname1 !== $uname2) {
        // error usernames do not match   
        $msg = 'user names do not match';
        $msgClass = 'reg-dang';
        $msgButton = 2;   
    } elseif($upass1 !== $upass2) {
        // error passwords do not match   
        $msg = 'passwords do not match';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } elseif(!preg_match("/^[a-zA-Z0-9]*$/", $uname1)) {
        // error invalid username    
        $msg = 'invalid username';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            // error sql error
            $msg = 'sql error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname1);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0) {
                // error username taken
                $msg = 'username unavailable';
                $msgClass = 'reg-dang';
                $msgButton = 2;
            } else {
                $sql = "INSERT INTO users (username, email, phone, password, firstname, lastname, about, city, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    // error sql error
                    $msg = 'sql error';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else {
                    $hashedPwd = password_hash($upass1, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssss", $uname1, $uemail, $uphone, $hashedPwd, $ufirst, $ulast, $uabout, $ucity, $ustate);
                    mysqli_stmt_execute($stmt);
// success 
$msg = 'successfully registered';
$msgClass = 'reg-success';
$msgButton = 1;
                }
            }
        }
    }
    // myslqi_stmt_close($stmt);
    mysqli_close($conn);
} 

 
// else {
    // end if
// } 
?>