<div id="comments" class="bizzex-comments-area">
    <div class="bizzex-comments-wrap">
        <?php 
            if(post_password_required()== true) return;
            if(!comments_open() && get_comment_pages_count() == 0) return;
        ?>
        <?php  $comment_number = get_comments_number(); ?>
        <h2 class="h-comments-title"> 
            <?php 
                if($comment_number == 1)
                    echo '1 Comment';
                else if($comment_number > 1)
                    echo sprintf(' %s Comments',$comment_number);
                else
                    echo ' No Comment';
            ?>
        </h2>

        <ol class="bizzex-comments-list">
             <?php 
                $commentListArr = array('callback'=> 'config_comment');
                wp_list_comments($commentListArr);
            ?>
        </ol>
        <!-- .bizzex-comments-list -->
    </div>
    <!-- .bizzex-comments-wrap -->
    <?php 
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
              'author' =>
                '<input class="input" type="text" id="author" placeholder="'. __( 'Name', 'lawyer' ) . '*" name="author" value="' . esc_attr( $commenter['comment_author'] ) .
        '" ' . $aria_req . ' >',

              'email' => '<input class="input" type="text" id="email" placeholder="' . __( 'Email', 'lawyer' ) . '*" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" ' . $aria_req . ' >',
            );
        $formArr = array(
            'cancel_reply_link'=> __( 'Cancel reply' ),
            'title_reply'       => __( 'Leave Your Comment' ),
            'label_submit'=>__( 'Post Comment' ),
            'comment_notes_before'=>'',
            'comment_field'=>'<textarea name="comment" id="comment" rows="1" cols="1" placeholder="'. __( 'Message', 'lawyer' ) . '"></textarea>',
            'fields' => apply_filters( 'comment_form_default_fields', $fields ),
            );
        comment_form($formArr);
    ?>
    <!-- #respond -->
</div>