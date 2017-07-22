<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawyer
 */
get_header(); ?>
  <div class="bizzex-container-fluid max width offset cf">
    <div class="bizzex-main left cf" role="main">
    		<div id="bizzex-iso-container">
    			<?php 
            // get all post types
            $args = array (
                'post_type'              => 'post',
                'post_status'            => 'publish',
                'pagination'             => true,
                'paged'                  => (get_query_var('paged') ? get_query_var('paged') : 1),
                'order'                  => 'ASC',
                'orderby'                => 'date',
            );
              $wp_query = null; 
              $wp_query = new WP_Query(); 
              $wp_query->query( $args ); 
            if ($wp_query->have_posts()): 
                while($wp_query->have_posts()): $wp_query->the_post();
                  get_template_part('layout/entry','home' );
               endwhile;
            endif;
            
      wp_reset_postdata();
          ?>	
      </div>
      <!-- end .bizzex-main -->
      <?php get_template_part('layout/layout','pagination' ); ?>
    </div>
    <?php get_sidebar(); ?>
</div> <!-- end .bizzex-container-fluid.max.width.offset.cf -->
<?php get_footer(); ?>