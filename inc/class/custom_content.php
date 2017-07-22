 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Content_Custom_Control extends WP_Customize_Control
{
    private $posts = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $postargs = wp_parse_args($options, array('numberposts' => '-1'));
        $this->posts = get_posts($postargs);

        parent::__construct( $manager, $id, $args );
    }

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   10/16/2012
	 * @return  void
	 */
	public function render_content() {
		if(!empty($this->posts))
        {
        	?>
        	<?php $customContent=json_decode($this->value());?>
        	<label>
				<span class="customize-control-title"><?php echo $this->label; ?></span>
				<div class='customize-control-content' id='lawyer_custom_post'>
					<p>
						<span>Total post show</span>
						<select class='total_post'>
							<?php 
							for ($i=0; $i <= 6; $i++){
								if ($i==$customContent->total_post)
									echo "<option selected>$i</option>";
								else
									echo "<option>$i</option>";
							}
							?>
						</select>
					</p>
					<p>
						<span>Order</span>
						<select class='order'>
							<option value='asc'>ASC</option>
							<?php 
							if ($customContent->order=='desc')
								echo "<option value='desc' selected>DESC</option>";
							else echo "<option value='desc'>DESC</option>";
							?>
						</select>
					</p>
					<p>
						<span>Order by</span>
						<?php $orderByArr=array('ID'=>'ID','title'=>'Title','date'=>'Date','modified'=>'Date modified','rand'=>'Random' ,'comment_count'=>'Comment count'); ?>

						<select class='order_by'>
							<?php foreach ($orderByArr as $key => $value) {
								if ($customContent->order_by==$key)
									echo "<option value='$key' selected>$value</option>";
								else echo "<option value='$key'>$value</option>";							}
							?>
						</select>
					</p>
					<span>Add Multiple Posts</span>
					<?php if (is_array($customContent->multiple)&&$customContent->multiple!=null): ?>
						<span><input type="checkbox" id='choose_multi' checked></span>
						<p class="selectable_wrap">
					<?php else: ?>
					<span><input type="checkbox" id='choose_multi'></span>
					<p class="selectable_wrap" hidden>
					<?php endif;?>
			        	<select multiple id="selectable">
				        	<?php 
				            foreach ( $this->posts as $post ){
				            	if (is_array($customContent->multiple)&& in_array($post->ID, $customContent->multiple))
									echo "<option value='$post->ID' class='ui-widget-content' selected>$post->post_title</option>";
								else echo "<option value='$post->ID'>$post->post_title</option>";
				            }
				            ?>
						</select>
						<span>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</span>
					</p>
				</div>
			</label>
			<input hidden='hidden' class='result_content_section' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
			<?php
        }
		?>
        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/selectable.min.js');?>"></script>
 		<link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />
        <script type='text/javascript'>
            (function($) {
            	jQuery( "#choose_multi" ).change(function(event) {
            		if($(this).is(":checked")) {
            			jQuery(".selectable_wrap").show('fast');
			        }else{
            			jQuery(".selectable_wrap").hide('fast');
            			jQuery("#selectable").val('');
			        }
			        rebuildJsonContent();
            	});
            	jQuery("#selectable").selectable();
            	jQuery('#lawyer_custom_post select').change(function(event) {
            		rebuildJsonContent();
            	});
                function rebuildJsonContent() {
                    var total_post='';
                    var order='';
                    var order_by='';
                    var multi_post=[];
                    var data=[];
                    var th=jQuery('#lawyer_custom_post');
                    total_post =th.find('.total_post').val();
                    order =th.find('.order').val();
                    order_by =th.find('.order_by').val();
                    multi_post =th.find('#selectable').val();
                    data={
                        "total_post":total_post,
                        "order":order,
                        "order_by":order_by,
                        "multiple":multi_post,
                    };
                    var str=JSON.stringify(data);//array encode json
                    jQuery('.result_content_section').val(str);
                    jQuery('.result_content_section').keyup();
                    
                }

            }(jQuery));
        </script>
        <style>
			select[multiple] { width: 100%;height: 500px; cursor:text}
		</style>
		<?php
	}

}