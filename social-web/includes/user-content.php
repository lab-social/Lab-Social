<div class="site-content3 background2 index-shadow">
        <div class="site-content5 background1">

            <div class="post-title"><?php echo $user2['username']; ?></div>

            <br>

            <div class="card-flex1">
                <div>
                <?php  
                    $tempid = $user2['id']; 
                    $picProfile = "<img src='uploads/profileimage.".$tempid.".jpg'>";
                    $picDefault = "<img src='images/testtube.jpg'>";
    
                    if($user2['pic_status'] == 0){
                        echo $picDefault;
                    } else {
                        echo $picProfile;
                    }
                ?>
                </div>
                <p><?php echo $user2['about']; ?></p>
            </div>

            <br>
            

            <a class="button" href="request.php?id=<?php echo $user2['id']; ?>"><button type="submit" class="button-small" name="">Add Friend</button></a>

        </div>
</div> <!-- site-content -->