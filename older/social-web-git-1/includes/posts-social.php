<?php 
    include('posts-query.php');
?>

    <div class="page-grid">

        <div class="comment-column">

            <?php foreach($socialposts as $socialpost) : ?>
                <div class="grid-content2 social-shadow">

                    <div class="">

                        <div class="post-title"> <?php echo $socialpost['title']; ?></div>

                        <div class="text-right">

                            <span class="post-date"><?php $pdate = date_create($socialpost['publish_date']); echo date_format($pdate, 'm-d-y') ?> by </span>

                            <span class="post-author"><?php echo $socialpost['author']; ?></span>
                        
                        </div>

                        <div class="post-body"><?php $excerpt = $socialpost['body'];
                        $output = substr($excerpt, 0, 200);
                        echo $output."..." ; ?></div>

                        <br>

                        <a class="button" href="post.php?id=<?php echo $socialpost['id']; ?>"><button class="button-mini"> read more</button></a>

                    </div>

                </div>
            <?php endforeach; ?>

        </div> <!-- comment column --> 

        <div class="comment-column">
        <div class="grid-content2 social-shadow">
                    
                    <div class="post-title text-center" id="edit-title">Add Post</div>

                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                        <label>Title</label>
                        <input type="text" name="title" class="field-content1 background2">
                    
                        <label>Body</label>
                        <textarea name="body" class="field-content2 background2"></textarea>

                        <input type="hidden" name="domain" value="social">

                        <input type="submit" name="sub-post" value="Submit" class="button-mini">
                    </form>

                </div> <!-- grid content -->

        </div> <!-- comment column --> 
    
    </div> <!--page-grid -->
