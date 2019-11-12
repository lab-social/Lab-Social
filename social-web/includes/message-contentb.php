<main class="site-content3 background2 index-shadow">

    <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>

        <div class="site-content4 background1">
            <div class="post-title">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; echo var_dump(); ?></div>
            </div>
            <br>
            <a href="messages.php"><button type="submit" class="button-medium button-center">Continue</button></a>     
            <!-- <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <button type="submit" class="button-medium button-center" name="message-cont">Continue</button>
            </form> -->
        </div> <!-- reg-msg -->

    <?php } elseif($msgButton == 2) { ?>

        <div class="site-content4 background1">
            <div class="post-title">
                <?php echo $msg; ?>    
            </div>                 

            <br>

            <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" class="field-content1" name="msgsubject" placeholder="Subject">
                <!-- <input type="textarea" class="field-content1" name="msgbody" placeholder="Message here"> -->
                <input type="text" class="field-content1 background2" name="msgbody" placeholder="Message here">
                <input type="hidden" name="reciever" value="<?php $_['username']; ?>">
                <input type="hidden" name="recieverid" value="<?php $_GET['id']; ?>">
                <button type="submit" class="button-medium" name="message-submit">Send Message</button>
            </form>
        </div>

    <?php } else { ?>
        <div class="site-content4 background1">
        <div class="post-title">
            Please send a message.
        </div>

        <br>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="text" class="field-content1" name="msgsubject" placeholder="Subject">
            <!-- <input type="textarea" class="field-content1" name="msgbody" placeholder="Message here"> -->
            <input type="text" class="field-content1 background2" name="msgbody" placeholder="Message here">
            <input type="hidden" name="reciever" value="<?php echo $_GET['username']; ?>">
            <input type="hidden" name="recieverid" value="<?php echo $_GET['id']; ?>">
            <button type="submit" class="button-medium" name="message-submit">Send Message</button>

        </form>
        </div>
    <?php } ?>
    
</main>