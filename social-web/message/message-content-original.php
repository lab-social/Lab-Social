<!-- registration content here -->
<main class="site-content3 background1 index-shadow">
        <br>
        <p class="body">Create Message</p>

        <!-- <img src="images/testtube.jpg" alt="test tube" width="175" height="175"> -->
        <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
            <input type="text" class="field-content1" name="msgsubject" placeholder="Subject">

            <textarea class="field-content3" name="msgbody" placeholder="Message Here"></textarea>

            <div>
                <button type="submit" class="button-medium" id="" name="message-submit">Send Message</button>
            </div>

        </form>

    <!-- </div> -->
</main>