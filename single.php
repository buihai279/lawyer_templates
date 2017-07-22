<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tk
 */
get_header(); ?>
<div class="bizzex-container-fluid max width offset cf">
    <div class="bizzex-main left" role="main">
    	<?php 
	        if (have_posts()): 
                while(have_posts()): the_post();
					$thumb_id = get_post_thumbnail_id();
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		?>
					<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
			            <div class="entry-featured">
			                <div class="entry-thumb"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>"></div>
			            </div>
			            <div class="entry-wrap">
			                <header class="entry-header">
			                    <h1 class="entry-title"><?php the_title(); ?></h1>
			                    <?php get_template_part('layout/meta' ); ?>
			                </header>
			                <div class="entry-content content">
			                    <?php the_content(); ?>
			                </div>
			            </div>
			            <?php get_template_part('layout/time' ); ?>
			        </article>
                    <?php
               	endwhile;
            endif;
     	?>      
        <!-- end #post-<?php the_ID(); ?> -->
       	<?php get_template_part('layout/author-bio' ); ?>
		<?php comments_template(); ?>
    </div>
    <!-- end .bizzex-main -->
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>