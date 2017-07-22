<span class="visually-hidden">
        <span class="author vcard">
          <span class="fn"><?php the_author(); ?></span>
</span>
<span class="entry-title"><?php the_title(); ?></span>
<time class="entry-date updated" datetime="<?php echo get_the_date('c'); ?>">
    <?php the_date('m.d.Y','',''); ?>
</time>
</span>
