<?php
function config_comment($comment, $args,$depth){
    global $post;
    $author_id = $post->post_author;
    switch ($comment->comment_type){
        //pingback - trackback
        case 'pingback':
        case 'trackback': 
?>          
        <li id="comment-<?php comment_ID()?>"  <?php comment_class('clr');?>>
            <div class="pingback-entry">
                <span class="pingback-heading"><?php _e('Pingback:')?></span>
                <?php comment_author_link();?>
            </div>
<?php 
        break;
        case '':
?>

<li id="li-comment-<?php comment_ID()?>"  <?php comment_class(); ?> >
    <div class="bizzex-comment-img">
    	<span class="avatar-wrap cf">
    		<?php echo get_avatar($comment,120)?>
    	</span>
        <cite class="bizzex-comment-author"><?php echo get_comment_author_link();?></cite>
    </div>
    <article id="comment-<?php comment_ID()?>" class="comment cf">
        <header class="bizzex-comment-header">
            <time datetime="<?php comment_date('c'); ?>">
                <i class="bizzex-icon-clock-1"></i>
                <?php 
			        $df=get_option('date_format');
			        comment_date($df,'','');
			        echo " at ";
			        comment_time();
			      ?>
            </time>
            <span class="reply-link-wrap">
            	<?php 
	                $replyArr = array(
	                            'add_below' => 'comment',
	                            'depth'=>$depth,
	                            'reply_text'=>_('Reply'),
	                            'max_depth' => $args['max_depth']
	                            );
	                comment_reply_link($replyArr);
	            ?>    
            </span>
        </header>
        <section class="bizzex-comment-content">
            <p><?php comment_text(); ?></p>
        </section>
    </article>
</li>
<!-- #comment-## -->
<?php 
    break;
    }
}
