<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawyer
 */

get_header(); ?>
<?php get_template_part('layout/header-archive'); ?>
  <div class="bizzex-container-fluid max width offset cf">
    <div class="bizzex-main left cf" role="main">
  		<div id="bizzex-iso-container">
       	<?php 
         	if (have_posts()): 
            while(have_posts()): the_post();
              get_template_part('layout/entry-home' );
           	endwhile;
          endif;
       	?>
      </div>
      <!-- end .bizzex-main -->
      <?php get_template_part('layout/layout','pagination' ); ?>
    </div>
    <?php get_sidebar(); ?>
</div> <!-- end .bizzex-container-fluid.max.width.offset.cf -->
<?php get_footer(); ?>
