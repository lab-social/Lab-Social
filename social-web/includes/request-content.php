<main class="site-content3 background2 index-shadow">

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
            <label for="domain">Select connection type </label>
                        <select class="" name="domain" id="">
                            <option>social</option>
                            <option>work</option>
                            <option>school</option>
                            <option>family</option>
                        </select>
            <br>
            <br>

            <button type="submit" class="button-medium" id="" name="sub-request">Send Request</button>

        </form>
        </div>
    <?php } else { ?>
        <div class="site-content4 background1">
        <div class="post-title">
            Please send a message to <?php echo $sendname['username']; ?> with your request.
        </div>

        <br>

        <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="textarea" class="field-content1 background2" name="msg-request" placeholder="Message here">

            <br>
            <br>
            <label for="domain">Select connection type </label>
                        <select class="" name="domain" id="">
                            <option>social</option>
                            <option>work</option>
                            <option>school</option>
                            <option>family</option>
                        </select>
            <br>
            <br>

            <button type="submit" class="button-medium" id="" name="sub-request">Send Request</button>

        </form>
        </div>
    <?php } ?>
    
</main>