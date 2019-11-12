<div class="page-grid">
    <div class="comment-column">
        <div class="grid-content2 index-shadow">
            <div class="post-title"> In </div>
        </div>    
    </div>

    <div class="comment-column">
        <div class="grid-content2 index-shadow">
            <div class="post-title"> Out </div>
        </div>    
    </div>
</div>

<div class="page-grid">

        <div class="comment-column">

            <?php foreach($inmessages as $inmessage) : ?>
                <div class="grid-content2 index-shadow">

                    <div class="">

                        <div class="post-title"> <?php echo $inmessage['title']; ?></div>
                            <br>
                        <div class="post-title"> <?php echo $inmessage['sender']; ?></div>
                            <br>
                        <div class="post-title"> <?php echo $inmessage['publish_date']; ?></div>
                            <br>
                            <br>

                            <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="msg-id" value="<?php echo $inmessage['id']; ?>">
                                <input type="hidden" name="msg-subject" value="<?php echo $inmessage['title']; ?>">
                                <input type="hidden" name="sender-id" value="<?php echo $inmessage['sender_id']; ?>">
                                <input type="hidden" name="reciever-id" value="<?php echo $inmessage['reciever_id']; ?>">
                                <input type="hidden" name="unique-id" value="<?php echo $inmessage['uni_id']; ?>">
                                <button type="submit" class="button-medium" name="message-read">Read</button>
                            </form>

                    </div>

                </div>
            <?php endforeach; ?>

        </div> <!-- comment column --> 

        <div class="comment-column">

        <?php foreach($inmessages as $inmessage) : ?>
                <div class="grid-content2 index-shadow">

                    <div class="">
                     <?php print_r($inmessage); ?>
                        <div class="post-title"> <?php echo $inmessage['title']; ?></div>
                            <br>
                        <div class="post-title"> <?php echo $inmessage['sender']; ?></div>
                            <br>
                        <div class="post-title"> <?php echo $inmessage['publish_date']; ?></div>
                            <br>
                            <br>

                            <form class="reg-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="msg-id" value="<?php echo $inmessage['id']; ?>">
                                <input type="hidden" name="msg-subject" value="<?php echo $inmessage['title']; ?>">
                                <input type="hidden" name="sender-id" value="<?php echo $inmessage['sender_id']; ?>">
                                <input type="hidden" name="reciever-id" value="<?php echo $inmessage['reciever_id']; ?>">
                                <button type="submit" class="button-medium" name="message-read">Read</button>
                            </form>

                    </div>

                </div>
            <?php endforeach; ?>



        </div> <!-- comment column --> 

    </div> <!--page-grid -->