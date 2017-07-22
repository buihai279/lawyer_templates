<?php 
    $total    = $wp_query->found_posts;
    if ($total<=0)
      return;
 ?>
<p class="post-result-count">
  <?php
    $paged    = max( 1, $wp_query->get( 'paged' ) );
    $per_page = $wp_query->get( 'posts_per_page' );
    // $total    = $wp_query->found_posts;
    $first    = ( $per_page * $paged ) - $per_page + 1;
    $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
    if ( 1 == $total ) {
      _e( 'Showing the single result', 'textdomain' );
    } elseif ( $total <= $per_page || -1 == $per_page ) {
      printf( __( 'Showing all %d results', 'textdomain' ), $total );
    } else {
      printf( _x( 'Showing %1$d &ndash; %2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'textdomain' ), $first, $last, $total );
    }
  ?>
</p>