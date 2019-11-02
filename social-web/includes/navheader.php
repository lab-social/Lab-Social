<body>
<header>
            <?php include('nav-rotor.php');
                if($page_name == '/work.php'){
                    echo '<nav class="topnav work-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/social.php') {
                    echo '<nav class="topnav social-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/school.php') {
                    echo '<nav class="topnav school-shadow">            
                    <a href="index.php" class="logonav"> Lab Social </a>
                    <ul class="nav-links">
                        <li><a class="social-btn" href="social.php">Social</a></li>
                        <li><a class="work-btn" href="work.php">Work</a></li>
                        <li><a class="school-btn" href="school.php">School</a></li>
                        <li><a class="family-btn" href="family.php">Family</a></li>
                    </ul>';
                } elseif($page_name == '/family.php') {
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
                } ?>

                 <?php if(isset($_SESSION['userId'])) {
                        include('header2.php');
                    } else {
                        include('header.php');
                    } ?>
    </header>