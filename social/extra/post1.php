<?php   include('includes/head.php');
        include('includes/post-query.php');
?>

<div class="site-content ">

    <div class="post-title"><?php echo $post['title']; ?></div>

    <div class="post-author">by <?php echo $post['author']; ?></div>

    <div class="post-author"><?php echo $post['publish_date']; ?></div>

    <div class="post-body"><?php echo $post['body']; ?></div>


    <a href="<?php echo ROOT_URL; ?>edit.php?id=<?php echo $post['id']; ?>" class="button">Edit</a>

    <a href="<?php echo ROOT_URL; ?>comment.php?id=<?php echo $post['id']; ?>" class="button">Comment</a>


    <?php foreach($comments as $comment) : ?>

        <div class="comment">
            <div class="post-author">Created on <?php echo $comment['publish_date']; ?></div>

            <div class="post-body"><?php echo $comment['body']; ?></div>
        </div>
    
    <?php endforeach; ?>

</div>

<?php include('includes/footer.php'); ?>