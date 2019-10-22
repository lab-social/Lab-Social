<?php
        // include('includes/request-verify.php');
        include('friend-session.php');

?>

<div class="page-grid">
    <div class="comment-column">
        <div class="grid-content2 index-shadow">

            <div class="post-title"><?php echo $user2['username']; ?></div>

            <div class="post-author"> user profile content </div>
            <br>
            <div class="post-author"> user profile content </div>
            <br>
            <div class="post-author"> user profile content </div>
            <br>

            <a class="button" href="request.php?id=<?php echo $user2['id']; ?>"><button type="submit" class="button-small" name="">Add Friend</button></a>

        </div>
    </div> <!-- column -->

    <div class="comment-column">
        <div class="grid-content2 index-shadow">

    <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>

        <div class="site-content4 background1">
        <div class="post-title">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            </div>

        <br>
                
            <a href="people.php"><button type="submit" class="button-medium button-center">Continue</button></a>     
        </div> <!-- reg-msg -->

    <?php } elseif($msgButton == 2) { ?>

        <div class="site-content4 background1">
        <div class="post-title">
            <?php echo $msg; ?>    
        </div>                 

        <br>

        <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="textarea" class="field-content1 background2" name="msg-request" placeholder="Message here">

            <br>
            <br>

            <button type="submit" class="button-medium" id="" name="sub-request">Send Request</button>

        </form>
        </div>
    <?php } else { ?>
        <div class="site-content4 background1">
        <div class="post-title">
            please send a message with your request
        </div>

        <br>

        <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="textarea" class="field-content1 background2" name="msg-request" placeholder="Message here">

            <br>
            <br>

            <button type="submit" class="button-medium" id="" name="sub-request">Send Request</button>

        </form>
        </div>
    <?php } ?>

        </div>
    </div> <!-- column -->

</div> <!--page-grid -->


