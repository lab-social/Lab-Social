<?php   include('includes/head.php'); 
        include('includes/profile-edit-query.php');
?>

<!-- registration content here -->
<main class="site-content3 background1 index-shadow">

        <div class="field-content1">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <p class="body">Update Profile Picture</p>
            <br>
            <input type="file" name="file">
            <button type="submit" class="button-medium" id="" name="pic-submit">Update Picture</button>
        </form>
        </div>
        <br>
        <!-- <img src="images/testtube.jpg" alt="test tube" width="175" height="175"> -->
        <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="img-row">
          <?php  
                    $picProfile = "<img src='uploads/profileimage.".$_SESSION['userId'].".jpg' width='175' height='175'>";
                    $picDefault = "<img src='images/testtube.jpg'>";
    
                    if($profile['pic_status'] == 0){
                        echo $picDefault;
                    } else {
                        echo $picProfile;
                    }
                ?>
          </div>
            <p class="field-content1 background3"><?php echo $profile['username']; ?></p>
          
            <input type="text" class="field-content1" name="email" placeholder="Email" value="<?php echo $profile['email']; ?>">
            <input type="text" class="field-content1" name="phone" placeholder="Phone" value="<?php echo $profile['phone']; ?>">
        
            <input type="text" class="field-content1" name="firstname" placeholder="First Name" value="<?php echo $profile['firstname']; ?>">
            <input type="text" class="field-content1" name="lastname" placeholder="Last Name" value="<?php echo $profile['lastname']; ?>">
            <input type="text" class="field-content1" name="city" placeholder="City" value="<?php echo $profile['city']; ?>">
            <input type="text" class="field-content1" name="state" placeholder="state" value="<?php echo $profile['state']; ?>">

            <textarea class="field-content3" name="aboutuser" placeholder="Write a little about yourself" value=""><?php echo $profile['about']; ?></textarea>

            <div>
                <button type="submit" class="button-medium" id="" name="profile-edit">Update Profile</button>
            </div>

        </form>

    <!-- </div> -->
</main>

<?php include('includes/footer.php') ?>