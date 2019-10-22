<?php   include('includes/head.php');
        include('includes/post-query.php');
        // include('includes/comment-verify.php');
?>



<div <?php if($post['domain_num'] == 1){
                    echo 'class="site-content3 background2 work-shadow">';
                } elseif($post['domain_num'] == 2){
                    echo 'class="site-content3 background2 social-shadow">';
                } elseif($post['domain_num'] == 3){
                    echo 'class="site-content3 background2 school-shadow">';
                } elseif($post['domain_num'] == 4){
                    echo 'class="site-content3 background2 family-shadow">';
                } else {
                    echo 'class="site-content3 background2 index-shadow">';
                }
                ?>

    <div class="site-content5 background1">

    <div class="post-title"><?php echo $post['title']; ?></div>

    <br>

    <div class="text-right">

        <span class="post-date"><?php $pdate = date_create($post['publish_date']); echo date_format($pdate, 'm-d-y') ?> by </span>

        <span class="post-author"><?php echo $post['author']; ?></span>

    </div>

    <br>

    <div class="post-body"><?php echo $post['body']; ?></div>

        <br>
        <br>

    </div>


    <?php foreach($comments as $comment) : ?>

        <div class="site-content4 background1">

            <div class="text-center">

                <span class="post-date"><?php $pdate = date_create($comment['publish_date']); echo date_format($pdate, 'm-d-y') ?> by </span>


                <span class="post-author"><?php echo $comment['author']; ?></span>

            </div>

            <br>

            <div class="post-body"><?php echo $comment['body']; ?></div>
        </div>

        <br>
    
    <?php endforeach; ?>

        <div class="site-content4 background1"> 

            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                <div class="text-center">Comment</div>
                <textarea name="cmt-request" class="field-content1 background2" placeholder="Comment"></textarea>

                <input type="submit" name="sub-comment" value="Submit" class="button-mini">

            </form>
        </div>
</div>        

<?php include('includes/footer.php'); ?>