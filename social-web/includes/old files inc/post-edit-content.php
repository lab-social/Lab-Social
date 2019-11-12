<?php 
        include('post-edit-query.php');
?>

<div <?php if($post['domain_num'] == 1){
                    echo 'class="site-content3 background2 work-shadow"';
                } elseif($post['domain_num'] == 2){
                    echo 'class="site-content3 background2 social-shadow"';
                } elseif($post['domain_num'] == 3){
                    echo 'class="site-content3 background2 school-shadow"';
                } elseif($post['domain_num'] == 4){
                    echo 'class="site-content3 background2 family-shadow"';
                } else {
                    echo 'class="site-content3 background2 index-shadow"';
                }
                ?>>

    <div class="site-content4 background1">

        <div class="post-title text-center" id="edit-title">Edit Post</div>
        <div class="post-title text-center" id="edit-title"><?php echo $msg; ?></div>

        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

            <label>Title</label>
            <input type="text" name="title" class="field-content1 background2"value="<?php echo $post['title']; ?>">

            <label>Body</label>
            <textarea name="body" class="field-content2 background2"><?php echo $post['body']; ?></textarea>

            <input type="submit" name="sub-post-edit" value="Submit" class="button-mini">

        </form>

    </div>


   
</div>        
