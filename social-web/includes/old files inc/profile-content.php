<?php 
    include('profile-query.php');
?>

<div class="site-content3 background2 index-shadow">
        <div class="site-content5 background1">

            <div class="post-title"><?php echo $profile['username']; ?></div>

            <br>

            <div class="card-flex1">
                <?php 
                // $tempid = $profile['id']; 
                $picProfile = "<img src='uploads/profileimage.".$_SESSION['userId'].".jpg'>";
                $picDefault = "<img src='images/testtube.jpg'>";
                ?>

                            <div>
                            <?php 
                                if($profile['pic_status'] == 0){
                                    echo $picDefault;
                                } else {
                                    echo $picProfile;
                                }
                            ?>
                            </div>                            

                            <div>
                                <span class="post-author"> <?php echo $profile['firstname']; ?> <?php echo $profile['lastname']; ?> </span>
                                
                                <br>
                                
                                <span class="post-author"> <?php echo $profile['city']; ?> <?php echo $profile['state']; ?> </span>
                                <br>
                                <br>
                                <div class="post-body"> <?php echo $profile['about']; ?></div>
                            </div>

            </div>

                        <br>
            

            <a class="button" href="profile-edit.php?id=<?php echo $_SESSION['userId']; ?>"><button type="submit" class="button-small" name="">Edit profile</button></a>

        </div>
</div> <!-- site-content -->