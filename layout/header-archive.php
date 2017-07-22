
<header class="bizzex-header-landmark bizzex-container-fluid max width">
  <h1 class="h-landmark">
    <span>
      <?php
        if ( is_category() ) :

          printf( __( 'Category Archive : %s', '_tk' ), single_cat_title('',false) );

        elseif ( is_tag() ) :
          printf( __( 'Tag Archive: %s', '_tk' ), single_cat_title('',false)  );  

        elseif ( is_author() ) :
          /* Queue the first post, that way we know
           * what author we're dealing with (if that is the case).
          */
          the_post();
          printf( __( 'Post archive by Author: %s', '_tk' ),  get_the_author() );
          /* Since we called the_post() above, we need to
           * rewind the loop back to the beginning that way
           * we can run the loop properly, in full.
           */
          rewind_posts();

        elseif ( is_day() ) :
          printf( __( 'Post archive by day: %s', '_tk' ), get_the_date() );

        elseif ( is_month() ) :
          printf( __( 'Post archive by month: %s', '_tk' ), get_the_date( 'F Y' ) );

        elseif ( is_year() ) :
          printf( __( 'Post archive by year: %s', '_tk' ), get_the_date( 'Y' ) );

        elseif ( is_search() ) :
          printf( __( 'Search Results %s', '_tk' ), $_GET['s'] );

        else :
          _e( 'Archives', '_tk' );

        endif;
      ?>
    </span>
  </h1>
</header>