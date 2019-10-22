<?php
        include('includes/request-verify.php');
        // include('post-query.php');
?>

<div class="site-content ">

    <div class="post-title"><?php echo $user['username']; ?></div>
    <div class="post-author"> user content </div>
    <a class="button" href="request.php?id=<?php echo $user['id']; ?>"><button type="submit" class="button-small" name="">Add Friend</button></a>

    <div class="comment">

    <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>

        <div class="reg-msg">
            <div class="reg-su">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            </div>
                
            <a href="login.php" class="msg-link msgbutton">Continue</a>     
        </div> <!-- reg-msg -->

    <?php } elseif($msgButton == 2) { ?>

        <div class="reg-er">
            <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>                            
        </div>  

    <?php } else { ?>

        <div class="reg-de">
            please send a message with your request
        </div>

    <?php } ?>

    <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <input type="hidden" class="reg-field2" name="req-user1" value="<?php echo $user['id']; ?>">
        <input type="textarea" class="reg-field2" name="msg-request" placeholder="Message here">
        
        <button type="submit" class="reg-button" id="" name="sub-request">Send Request</button>
        
    </form>

    </div>


</div>
    

<?php include('includes/footer.php') ?>