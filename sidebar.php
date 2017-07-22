<?php
/**
 * The sidebar containing the main widget area
 *
 * @package lawyer
 */
?>
<aside class="bizzex-sidebar right" role="complementary">
	<?php 
		if ( is_active_sidebar( 'sidebar-right' ) ) :
			dynamic_sidebar( 'sidebar-right' );
	    endif;
	?>
</aside>

