<?php
include('includes/head2.php');
include('includes/posts-query.php');
?>
<?php
include('includes/headhtml.php');
?>


<body>
    <header>
        <nav class="topnav index-shadow">   
            <a href="index.php" class="logonav"> Lab Social </a>
            <ul class="nav-links">
                <li><a class="social-btn" href="social.php">Social</a></li>
                <li><a class="work-btn" href="work.php">Work</a></li>
                <li><a class="school-btn" href="school.php">School</a></li>
                <li><a class="family-btn" href="family.php">Family</a></li>
            </ul>

            <div class="menu-flexrb">
                <form action="" method="post">
                    <button type="submit" class="button-medium" name="logout-sub">Logout</button>
                </form>
                <a href="about-help.php"><button type="submit" class="button-medium" name="">About/Help</button></a>
            <div>
        </nav>
    </header>
  
    <div class="index-bar index-shadow nav-flex">
        <p><div class="menu-flexl">logged in<a href="people.php"><button type="submit" class="button-small" name="">See People</button></a><a href="friends.php"><button type="submit" class="button-small" name="">See Friends</button></a></div><div class="menu-flexr"><form><input type="text" placeholder="Search..."><button class="button-mini">search</button></form><a href="profile.php"><button type="submit" class="button-small" name="">Profile</button></a><a href="#"><button type="submit" class="button-small" name="">Settings</button></a></div></p>
    </div>

    <div class="page-grid">

        <div class="comment-column">

            <?php foreach($posts as $post) : ?>
                <div class="grid-content2 index-shadow">

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

        </div> <!-- comment column --> 

    </div> <!-- page grid -->

<?php include('includes/footer.php'); ?>