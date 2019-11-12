<div class="site-content3">
    <div class="post-title"> Search Results </div>
        <br>
    <?php foreach($srchrslts as $srchrslt) : ?>
        <!-- <div class="site-content5 background1"> -->
        <div <?php if($srchrslt['domain_num'] == 1){
                    echo 'class="site-content5 background2 work-shadow"';
                } elseif($srchrslt['domain_num'] == 2){
                    echo 'class="site-content5 background2 social-shadow"';
                } elseif($srchrslt['domain_num'] == 3){
                    echo 'class="site-content5 background2 school-shadow"';
                } elseif($srchrslt['domain_num'] == 4){
                    echo 'class="site-content5 background2 family-shadow"';
                } else {
                    echo 'class="site-content5 background2 index-shadow"';
                }
                ?>>
            <div class="post-title"><?php echo $srchrslt['title']; ?></div>
                <br>

            <span class="post-author"><?php echo $srchrslt['author']; ?></span>
    
                <br>
            <div class="post-body"><?php echo $srchrslt['body']; ?></div>
        </div>
    <?php endforeach; ?>
</div>
