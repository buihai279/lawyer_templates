<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _tk
 */
get_header(); ?>
<?php get_template_part('layout/header-archive'); ?>
	<div class="bizzex-container-fluid max width offset cf">
	  	<div class="bizzex-main left cf" role="main">
			<div id="bizzex-iso-container">
		        <?php 
			        if (have_posts()): 
		                while(have_posts()): the_post();
		                    get_template_part('layout/entry','search' );
		               	endwhile;
		               	else:
		               		get_template_part('no-results' );
		            endif;
             	?>      
			</div>
	    <?php get_template_part('layout/layout','pagination' ); ?>
		</div>
		<?php get_sidebar(); ?>
	</div> <!-- end .bizzex-container-fluid.max.width.offset.cf -->
<?php get_footer(); ?>