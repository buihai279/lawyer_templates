<p class="p-meta">
  <span>
    <time class="entry-date" datetime="<?php echo get_the_date('c'); ?>">
      <i class="bizzex-icon-clock-1"></i>
      <?php 
        $df=get_option('date_format');
        echo get_the_date($df,'','');
      ?>
    </time>
  </span>
  <span>&nbsp;by <?php the_author(); ?></span>
  <span>&nbsp;in&nbsp;
    <?php 
    $list_cate=get_the_category(get_the_id());
     foreach ($list_cate as $value) {
      ?>
      <a href="<?php echo get_category_link($value->cat_ID); ?>" title="View all posts in: “<?php echo $value->name;?>”"><?php echo $value->name;?></a>
      <?php
    }
     ?>
  </span>
  <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
    <span>
      <a href="<?php the_permalink(); ?>#comments" title="Leave a comment on: “<?php the_title(); ?>”" class="meta-comments"> <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></a>
    </span>
  <?php endif; ?>
</p>