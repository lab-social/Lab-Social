<?php   include('includes/head.php');
        include('includes/post-query.php');
?>

<div <?php if($post['domain_num'] == 1){
                    echo 'class="site-content3 work-shadow">';
                } elseif($post['domain_num'] == 2){
                    echo 'class="site-content3 social-shadow">';
                } elseif($post['domain_num'] == 3){
                    echo 'class="site-content3 school-shadow">';
                } elseif($post['domain_num'] == 4){
                    echo 'class="site-content3 family-shadow">';
                } else {
                    echo 'class="site-content3 index-shadow">';
                }
                ?>

    <div class="post-title"><?php echo $post['title']; ?></div>

    <br>

    <div class="text-right">

        <span class="post-date"><?php $pdate = date_create($post['publish_date']); echo date_format($pdate, 'm-d-y') ?> by </span>

        <span class="post-author"><?php echo $post['author']; ?></span>

    </div>

    <br>

    <div class="post-body"><?php echo $post['body']; ?></div>

    <br>

    <a href="<?php echo ROOT_URL; ?>comment.php?id=<?php echo $post['id']; ?>" class="button">Comment</a>

        <br>
        <br>

    <?php foreach($comments as $comment) : ?>

        <div class="site-content4">

            <div class="text-center">

                <span class="post-date"><?php $pdate = date_create($comment['publish_date']); echo date_format($pdate, 'm-d-y') ?> by </span>


                <span class="post-author"><?php echo $comment['author']; ?></span>

            </div>

            <br>

            <div class="post-body"><?php echo $comment['body']; ?></div>
        </div>

        <br>
    
    <?php endforeach; ?>

</div>

<?php include('includes/footer.php'); ?>