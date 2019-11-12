<main class="site-content3 background1 index-shadow">

  <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>
 
       <div class="reg-msg">

            <div class="post-title">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            </div>
                 
                <a href="login.php"><button type="submit" class="button-medium button-center">Continue</button></a>     
           
        </div> <!-- reg-msg -->
        <br>

        <?php } elseif($msgButton == 2) { ?>

            <div class="post-title">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>                           
            </div>  
            <br>

        <?php } else { ?>

            <div class="post-title">
                registration
            </div>
            <br>

        <?php } ?>
   

    <!-- <div class="reg-form"> -->
        <!-- <form class="reg-form" action="includes/register-verify.php" method="post"> -->
        <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" class="field-content1" name="username1" placeholder="Username" value="<?php echo isset($_POST['username1']) ? $uname1 : ''; ?>">
            <input type="text" class="field-content1" name="username2" placeholder="Confirm Username" value="<?php echo isset($_POST['username2']) ? $uname2 : ''; ?>">
            <input type="text" class="field-content1" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $uemail : ''; ?>">
            <input type="text" class="field-content1" name="phone" placeholder="Phone" value="<?php echo isset($_POST['phone']) ? $uphone : ''; ?>">
            <input type="password" class="field-content1" name="pass1" placeholder="Password" value="<?php echo isset($_POST['pass1']) ? $upass1 : ''; ?>">
            <input type="password" class="field-content1" name="pass2" placeholder="Confirm Password" value="<?php echo isset($_POST['pass2']) ? $upass2 : ''; ?>">
            <input type="text" class="field-content1" name="firstname" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $ufirst : ''; ?>">
            <input type="text" class="field-content1" name="lastname" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $ulast : ''; ?>">
            <input type="text" class="field-content1" name="city" placeholder="City" value="<?php echo isset($_POST['city']) ? $ucity : ''; ?>">
            <input type="text" class="field-content1" name="state" placeholder="state" value="<?php echo isset($_POST['state']) ? $ustate : ''; ?>">

            <textarea class="field-content3" name="aboutuser" placeholder="Write a little about yourself" value=""><?php echo isset($_POST['aboutuser']) ? $uabout : ''; ?></textarea>

            <div>
                <!-- <button type="submit" class="button-medium" id="" name="submit">Profile Picture</button> -->
                <button type="submit" class="button-medium" id="" name="submit">Register</button>
            </div>

            <br>
            <br>
        </form>
    <!-- </div> -->
</main>