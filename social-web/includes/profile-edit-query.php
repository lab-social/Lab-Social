<?php

include ('config/db.php');

$profile_id = $_SESSION['userId'];


    if (isset($_POST['profile-edit'])) {
        $pusername = mysqli_real_escape_string($conn, $_POST['username1']);
        $pemail = mysqli_real_escape_string($conn, $_POST['email']);
        $pphone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pfirstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $plastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $pcity = mysqli_real_escape_string($conn, $_POST['city']);
        $pstate = mysqli_real_escape_string($conn, $_POST['state']);
        $pabout = mysqli_real_escape_string($conn, $_POST['aboutuser']);

        $profile_id = $_SESSION['userId'];


        $query = "UPDATE users SET 
        username='$pusername',
        email='$pemail',
        phone='$pphone',
        firstname='$pfirstname',
        lastname='$plastname',
        city='$pcity',
        state='$pstate',
        about='$pabout'
               WHERE id = {$profile_id}";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'profile.php');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }

        }


        // $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $query2 = 'SELECT * FROM users WHERE id = '.$profile_id;

        // Get Result
        $result = mysqli_query($conn, $query2);

        // Fetch Data
        $profile = mysqli_fetch_assoc($result);
        // var_dump($posts);

        // Free Result
        mysqli_free_result($result);

        $idval = $_SESSION['userId'];
        $front = "uploads/profileimage.".$idval;


if (isset($_POST['pic-submit'])){
    $file = $_FILES['file'];

    // print_r($file);
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    ;
    if(in_array($fileActExt, $allowed)) {
        if($fileError === 0){      
            if($fileSize < 1000000){;
                $fileNameId = $front.".".$fileActExt;
                $fileDest = $fileNameId;
                move_uploaded_file($fileTmpName, $fileDest);
                header("refresh: 0");
                }  else {
                    echo "File too large.";
                }
            } else {
                echo "Error during upload.";
            }
        } else {
            echo "File type not allowed.";
        }

        $sqlx = "UPDATE profile_img SET 
        status=1
        WHERE user_id = {$_SESSION['userId']}";
        mysqli_query($conn, $sqlx);
    

        $sqly = "UPDATE users SET 
        pic_status=1
        WHERE id = {$_SESSION['userId']}";
        mysqli_query($conn, $sqly);

        if(mysqli_query($conn, $sqly) && mysqli_query($conn, $sqlx)){
            header('Location: '.ROOT_URL.'profile-edit.php');
            // header('Location: '.ROOT_URL.'profile.php');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }

}

// change username
if(isset($_POST['username-update'])) {

    $msg = '';
    $msgClass = '';
    $msgButton = 0;
 
    $username1 = htmlspecialchars($_POST['username1']);
    $username2 = htmlspecialchars($_POST['username2']);
    $password1 = htmlspecialchars($_POST['password1']);
    $username3 = htmlspecialchars($_POST['username3']);
    
    if(empty($username1) || empty($username2) || empty($password1) || empty($username3)) {
       // error fill in all fields
       $msg = 'please fill in all fields';
       $msgClass = 'reg-dang';
       $msgButton = 2;
       } else if ($username2 !== $username3) {
        // error usernames do not match   
        $msg = 'user names do not match';
        $msgClass = 'reg-dang';
        $msgButton = 2;
       } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username3)) {
        // error invalid username    
        $msg = 'invalid username';
        $msgClass = 'reg-dang';
        $msgButton = 2;
        } else {

            $sqla = "SELECT username FROM users WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sqla)) {
                // error sql error
                $msg = 'sql error';
                $msgClass = 'reg-dang';
                $msgButton = 2;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username3);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
    
                if($resultCheck > 0) {
                    // error username taken
                    $msg = 'username unavailable';
                    $msgClass = 'reg-dang';
                    $msgButton = 2; 
                } else {
                    $sql1 = "SELECT * FROM users WHERE username=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql1)) {
                        $msg = 'data error';
                        $msgClass = 'reg-dang';
                        $msgButton = 2;
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $username1);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if ($row = mysqli_fetch_assoc($result)) {
                            $passcheck = password_verify($password1, $row['password']);
                            if ($passcheck == false) {
                                $msg = 'wrong password';
                                $msgClass = 'reg-dang';
                                $msgButton = 2;
                            } else if ($passcheck == true) {
            //
                                $sqlx = "UPDATE users 
                                SET username=?
                                WHERE id = {$_SESSION['userId']}";

                                $stmt2 = mysqli_stmt_init($conn);

                                if(!mysqli_stmt_prepare($stmt2, $sqlx)) {
                                    // error sql error
                                    $msg = 'sql error1';
                                    $msgClass = 'reg-dang';
                                    $msgButton = 2;
                                } else {
                                    mysqli_stmt_bind_param($stmt2, "s", $username3);
                                    mysqli_stmt_execute($stmt2);
                                    // success 
                                    header("Location: profile-edit.php");
                                    $msg = 'success';
                                    $msgClass = 'reg-success';
                                    $msgButton = 1; 
                                                    exit(); }

                                    } else {
                                        $msg = 'password error';
                                        $msgClass = 'reg-dang';
                                        $msgButton = 2;
                                    }
                                } else {
                                    $msg = 'username error1';
                                    $msgClass = 'reg-dang';
                                    $msgButton = 2;
                        }
                    }
                }
            }
        }
    }

// MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM

if (isset($_POST['password-update'])) {

    $username4 = $_POST['username4'];
    $password5 = $_POST['password2'];
    $password6 = $_POST['password3'];
    $password7 = $_POST['password4'];

    if (empty($username4) || empty($password5) || empty($password6) || empty($password7)) {
        $msg = 'please fill in all fields';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } else {
        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $msg = 'data error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username4);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($password5, $row['password']);
                if ($passcheck == false) {
                    $msg = 'wrong password';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($password6 !== $password7) {
                    // error passwords do not match   
                    $msg = 'passwords do not match';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($passcheck == true) {
                    
                    $sqlaabb = "UPDATE users 
                    SET password=?
                    WHERE id = {$_SESSION['userId']}";
                            
                            if(!mysqli_stmt_prepare($stmt, $sqlaabb)) {
                                // error sql error
                                $msg = 'sql error';
                                $msgClass = 'reg-dang';
                                $msgButton = 2;
                            } else {
                                $hashedPwd = password_hash($password6, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
                                mysqli_stmt_execute($stmt);
                                // success 
                                header("Location: profile-edit.php");

                                $msg = 'success';
                                $msgClass = 'reg-success';
                                $msgButton = 1;
                                exit();
                            }
                        }
                    } else {
                        $msg = 'password error';
                        $msgClass = 'reg-dang';
                        $msgButton = 2; } 
                }
            } 
        // } else {
        //     $msg = 'username error';
        //     $msgClass = 'reg-dang';
        //     $msgButton = 2;
        }
    // Close Connection
    mysqli_close($conn);
?>  
