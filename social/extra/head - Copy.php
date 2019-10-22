<?php 
    session_start();
    include('config/db.php');
    include('login-verify.php');
    include('logout-verify.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="isaac j moore">
    <meta name="date" content="august 2019">
    <meta name="description" content="trimedia social platfrom version 1. ">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!-- font link -->
    <link href="https://fonts.googleapis.com/css?family=Carme" rel="stylesheet">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <!-- css link --> 
    <link  href="css/index.css" rel="stylesheet" type="text/css">

    <title> T.R.I. Media </title>
</head>
<body>
    <!-- nav content here -->
    <header>
        <nav class="topnav">            

            <?php
                include('nav-rotor.php');
                echo $page_name;
    
                if($page_name == '/social/social.php'){
                    echo "another try";
                } else {
                    echo "zero";
                }
            ?>

            <a href="index.php" class="logonav"> Lab Social<!-- logo <img> here --> </a>
            <ul class="nav-links">
                <!-- <li><a href="index.php">Home</a></li> -->
                <li class="social-btn"><a href="social.php">Social</a></li>
                <li class="work-btn"><a href="work.php">Work</a></li>
                <li class="school-btn"><a href="school.php">School</a></li>
                <li class="family-btn"><a href="family.php">Family</a></li>
                <?php echo $_SERVER['PHP_SELF']; ?>
            </ul>
                <?php if(isset($_SESSION['userId'])) {
                        include('header2.php');
                    } else {
                        include('header.php');
                    } ?>