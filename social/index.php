<?php include('includes/head.php'); ?>

<!-- body content here -->
    <?php if(isset($_SESSION['userId'])) {
        echo '<div class="index-bar index-shadow nav-flex">';
        echo '<p><div class="menu-flexl">'.$_SESSION['userName'].' is now logged in. <a href="people.php"><button type="submit" class="button-small" name="">See People</button></a><a href="friends.php"><button type="submit" class="button-small" name="">See Friends</button></a></div><div class="menu-flexr"><form><input type="text" placeholder="Search..."><button class="button-mini">search</button></form><a href="profile.php"><button type="submit" class="button-small" name="">Profile</button></a><a href="#"><button type="submit" class="button-small" name="">Settings</button></a></div></p>';
        echo '</div>';
        include('includes/index-content.php');
    } else {
        include('includes/frontpage.php');

    } ?>

<?php include('includes/footer.php') ?>