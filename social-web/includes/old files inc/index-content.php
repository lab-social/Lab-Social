<?php include('posts-query.php'); ?>

    <div class="page-grid">

        <div class="comment-column">

            <?php foreach($posts as $post) : ?>
                <div <?php if($post['domain_num'] == 1){
                    echo 'class="grid-content2 work-shadow"';
                } elseif($post['domain_num'] == 2){
                    echo 'class="grid-content2 social-shadow"';
                } elseif($post['domain_num'] == 3){
                    echo 'class="grid-content2 school-shadow"';
                } elseif($post['domain_num'] == 4){
                    echo 'class="grid-content2 family-shadow"';
                } else {
                    echo 'class="grid-content2 index-shadow"';
                }
                ?>>

                    <div class="">

                        <div class="post-title"> <?php echo $post['title']; ?></div>

                        <div class="text-right">

                            <span class="post-date"><?php $pdate = date_create($post['publish_date']); echo date_format($pdate, 'm-d-y'); ?> by </span>

                            <span class="post-author"><?php echo $post['author']; ?></span>
                        
                        </div>

                        <div class="post-body"><?php $excerpt = $post['body'];
                        $output = substr($excerpt, 0, 200);
                        echo $output."..."; ?></div>
                        <br>

                        <a href="post.php?id=<?php echo $post['id']; ?>"><button class="button-mini"> Read More</button></a>

                    </div>

                </div>
            <?php endforeach; ?>

        </div> <!-- comment column --> 

        <div class="comment-column">

                <div class="grid-content2 grid-shadow1">
                    <div id="edit-title">alerts (under construction) </div>
                </div>                

                <div class="grid-content2 grid-shadow1">
                    <div id="edit-title">messaging (under construction)</div>
                </div>

                <div class="grid-content2 index-shadow">
                    
                    <div class="post-title text-center" id="edit-title">Add Post</div>

                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="field-content1 background2">
                    
                        <label for="body">Body</label>
                        <textarea name="body" class="field-content2 background2"></textarea>

                        <label for="domain">domain</label>
                        <select class="" name="domain" id="">
                            <option>social</option>
                            <option>work</option>
                            <option>school</option>
                            <option>family</option>
                        </select>

                        <button type="submit" name="sub-post" class="button-mini">Submit</button>
                    </form>

                </div> <!-- grid content -->

                <!-- <div class="grid-content2 grid-shadow1 menu-flexrb2">
                <p> Enter email to recieve updates </p>
                <form action=" " method="post">
                <input type="email" class="nav-field" name="update-email" placeholder="email">
                    <button type="submit" class="navbutton" name="submit2">get updates</button>
                </form>
                </div> -->

                <!-- <div class="grid-content2 grid-shadow1  menu-flexrb2">
                <div>
                    <p> Please Consider a Donation </p>
                    <p> securely through PayPal </p>
                </div>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_donations" />
                    <input type="hidden" name="business" value="HYWZED56YYSMW" />
                    <input type="hidden" name="currency_code" value="USD" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                </form>
                </div> -->

        </div> <!-- comment column --> 


    </div> <!--page-grid -->


