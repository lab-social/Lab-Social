<body>
    <!-- nav content here -->
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

                 <?php if(isset($_SESSION['userId'])) { ?>
                    <div class="menu-flexrb">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
                    <button type="submit" class="button-medium" name="logout-sub">Logout</button>
                    </form>
                    <a href="about-help.php"><button type="submit" class="button-medium" name="">About/Help</button></a>
                    <div>
                    </nav>
                    </header>
                    
                    <? } else { ?>
                        <div class="nav-form">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" class="nav-field" name="login-name" placeholder="Username">
                        <input type="password" class="nav-field" name="login-pass" placeholder="Password">
                        <button type="submit" class="button-small" name="submit2">Login</button>
                        </form>
                        <!-- <a href="register.php" class="abuffer1">Register</a> -->
                        </div>
                        </nav>
                        </header>
                    <? } ?>