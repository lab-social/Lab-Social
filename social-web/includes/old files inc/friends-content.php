<?php 
    include('friend-session2.php');
?>

    <div class="page-grid">

        <div class="comment-column">

            <?php foreach($requests as $request) : ?>
                <div class="grid-content2 index-shadow">

                    <div class="">

                        <div class="post-title"> Connect Request from <?php echo $request['req_sender']; ?></div>
                        <br>

                        <div class="card-flex1">
                            <img src="images/testtube.jpg" alt="test tube">
                            <p>about user content about user content about user content about user content about user content about user content</p>
                        </div>

                        <br>

                        <div class="card-flex1">

                            <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="req-id" value="<?php echo $request['id']; ?>">
                                <input type="hidden" name="user1-id" value="<?php echo $request['user1_id']; ?>">
                                <input type="hidden" name="user2-id" value="<?php echo $request['user2_id']; ?>">
                                <button type="submit" class="button-medium" name="acc-req">Accept Request</button>
                            </form>

                            <a class="button" href="user.php?id=<?php echo $request['user1_id']; ?>"><button type="submit" class="button-medium" name="">See Profile</button></a>

                            <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="req-id" value="<?php echo $request['id']; ?>">
                                <input type="hidden" name="user1-id" value="<?php echo $request['user1_id']; ?>">
                                <input type="hidden" name="user2-id" value="<?php echo $request['user2_id']; ?>">
                                <button type="submit" class="button-medium" name="dec-req">Decline</button>
                            </form>


                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        </div> <!-- comment column --> 

        <div class="comment-column">

            <?php foreach($friends as $friend) :
                $tempid = $friend['id']; 
                $picProfile = "<img src='uploads/profileimage.".$tempid.".jpg'>";
                $picDefault = "<img src='images/testtube.jpg'>"; ?>

            <?php if($friend['user1_id'] !== $_SESSION['userId']) {
                $profile = $friend['user1_id'];
                } elseif($friend['user2_id'] !== $_SESSION['userId']) {
                $profile = $friend['user2_id'];
                }
            ?>
                <div class="grid-content2 index-shadow">

                    <div class="">

                        <div class="post-title"> <?php echo $friend['username']; ?> </div>

                        <br>

                        <div class="card-flex1">
                            <div>
                            <?php 
                            // echo $picProfile;
                                if($friend['pic_status'] == 0){
                                    echo $picDefault;
                                } else {
                                    echo $picProfile;
                                }
                            ?>
                            </div>
                            <div class="post-body"> <?php echo $friend['about']; ?></div>
                        </div>
<br>

                        <a target="blank" class="button" href="user.php?id=<?php echo $friend['id']; ?>"><button type="submit" class="button-medium" name="">See Profile</button></a>

                    </div>

                </div>
            <?php endforeach; ?>

        </div> <!-- comment column --> 


    </div> <!--page-grid -->

