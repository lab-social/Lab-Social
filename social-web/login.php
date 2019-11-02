<?php   include('includes/head.php');
        // include('includes/login-verify.php');
?>



<!-- registration content here -->
<main class="site-content3 background1 index-shadow">

    <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>

        <div class="reg-msg">
            <div class="post-title">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            </div>
                
            <a href="login.php" class="msg-link msgbutton">Continue</a>     
        </div> <!-- reg-msg -->
        <br>
        
    <?php } elseif($msgButton == 2) { ?>

        <div class="post-title">
            <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        </div>
        <br>

    <?php } else { ?>

        <div class="post-title">
            please login
        </div>
        <br>


    <?php } ?>

    <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <input type="text" class="field-content1" name="login-name" placeholder="Username">

        <input type="password" class="field-content1" name="login-pass" placeholder="Password">

        <button type="submit" class="button-medium" id="reg-button-1" name="submit2">Login</button>

    </form>
    
</main>

<?php include('includes/footer.php') ?>