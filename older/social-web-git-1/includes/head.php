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
    <meta name="date" content="2018 - 2019">
    <meta name="description" content="Lab Social social media platform at lab-social.xyz ">
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

    <title> Lab Social </title>
</head>
<body>
    <!-- nav content here -->
    <header>

            <?php
                include('nav-rotor.php');
    
                if($page_name == '/social/work.php'){
                    echo '        <nav class="topnav work-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/social/social.php') {
                    echo '<nav class="topnav social-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/social/school.php') {
                    echo '<nav class="topnav school-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/social/family.php') {
                    echo '<nav class="topnav family-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } else {
                    echo '<nav class="topnav index-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                }
            ?>

                <?php if(isset($_SESSION['userId'])) {
                        include('header2.php');
                    } else {
                        include('header.php');
                    } ?>