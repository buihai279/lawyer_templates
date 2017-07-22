<div class="pagination">
  <?php wp_reset_query(); ?>
  <?php
    global $wp_query;
      $big = 999999999; // need an unlikely integer
      echo paginate_links( array(
          'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format'  => '?paged=%#%',
          'current'   => max( 1, get_query_var('paged') ),
          'total'   => $wp_query->max_num_pages,
          'type'    =>'list',
          'prev_next' => true,
          'prev_text' => '<i class="bizzex-icon-angle-left"></i>',
          'next_text' =>'<i class="bizzex-icon-angle-right"></i>'
        ) );
  ?>
</div>
<?php get_template_part('layout/layout','count-result' ); ?>