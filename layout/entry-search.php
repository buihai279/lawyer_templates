<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
      <header class="entry-header">
          <h2 class="entry-title">
          <a href='<?php the_permalink(); ?>' title="Permalink to: &quot;<?php the_title(); ?>&quot;"><?php the_title(); ?></a>
        </h2>
         
      </header>
      <div class="entry-content excerpt">
          <p>
            <?php $content=''; ?>
            <?php $content= get_the_content(); ?>
            <?php 
              $content=fill__content($content); 
            echo $content=wp_trim_words($content,40,' ');
          ?>
          </p>
      </div>
  </div>
</article>
<!-- end #post-49 -->   