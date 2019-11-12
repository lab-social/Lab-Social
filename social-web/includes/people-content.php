    <div class="page-grid">

            <?php foreach($users as $user) : 
            $tempid = $user['id']; 
            $picProfile = "<img src='uploads/profileimage.".$tempid.".jpg'>";
            $picDefault = "<img src='images/testtube.jpg'>";
            ?>

            <div class="comment-column">

                <div class="grid-content index-shadow">

                    <div class="">
                        <div class="post-title"> <?php echo $user['username']; ?></div>

                        <br>

                        <div class="card-flex1">

                            <div>
                            <?php 
                                if($user['pic_status'] == 0){
                                    echo $picDefault;
                                } else {
                                    echo $picProfile;
                                }
                            ?>
                            </div>
                            
                            <p class="body"><?php echo $user['about']; ?></p>

                        </div>

                        <br>

                        <a class="button" href="user.php?id=<?php echo $user['id']; ?>"><button type="submit" class="button-medium" name="">See Profile</button></a>
                       
                    </div>

                </div>

            </div> <!-- comment column --> 

            <?php endforeach; ?>

    </div> <!--page-grid -->