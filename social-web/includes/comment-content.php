<main class="site-content2">

    <!-- alert success or fail and continue button -->
    <?php if ($msgButton == 1) { ?>

        <div class="reg-msg">
            <div class="reg-su">
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            </div>
                
            <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $_SESSION['pst_cmt']; ?>" class="msg-link msgbutton">Continue</a>     
        </div> <!-- reg-msg -->

    <?php } elseif($msgButton == 2) { ?>

        <div class="reg-er">
            <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>                            
        </div>  

        <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="textarea" class="reg-field2" name="cmt-request" placeholder="Write Comment Here">

            <button type="submit" class="button-large" id="" name="sub-comment">Submit Comment</button>

        </form>

    <?php } else { ?>

        <div class="reg-de">
            please write  your comment
        </div>

        <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="textarea" class="reg-field2" name="cmt-request" placeholder="Write Comment Here">

            <button type="submit" class="button-large" id="" name="sub-comment">Submit Comment</button>

        </form>

    <?php } ?>
    
</main>
