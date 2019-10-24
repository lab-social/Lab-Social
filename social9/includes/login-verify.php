<?php

// require ('config/db.php');
// require ('config/config.php');
// require ('db.php');

    $msg = '';
    $msgClass = '';
    $msgButton = 0;

if (isset($_POST['submit2'])) {

    $lusername = $_POST['login-name'];
    $lpassword = $_POST['login-pass'];

    if (empty($lusername) || empty($lpassword)) {
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

            mysqli_stmt_bind_param($stmt, "s", $lusername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($lpassword, $row['password']);
                if ($passcheck == false) {
                    $msg = 'wrong password';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($passcheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['username'];

                    header("Location: index.php");
                    exit();

                    // $msg = 'successfully logged in';
                    // $msgClass = 'reg-success';
                    // $msgButton = 1;
                } else {
                    $msg = 'password error';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                }
            } else {
                $msg = 'username error';
                $msgClass = 'reg-dang';
                $msgButton = 2;
            }
        }
    }

}

// else {
//     header("Location: index.php");
//     exit();
// }