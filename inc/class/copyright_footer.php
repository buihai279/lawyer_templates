 <?php
/**
 * Customize for textarea, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Copyright_Custom_Control extends WP_Customize_Control
{
	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   10/16/2012
	 * @return  void
	 */
	public function render_content() {
		?>
		<input hidden='hidden' class='value' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
		<label>

			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          	<?php
	            $settings = array(
	              'textarea_name' => 'textarea_copyright',
	              'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), 
	              'media_buttons' => false
	              );

            	wp_editor($this->value(),'textarea_copyright', $settings );
          	?>
        </label>
        <script type='text/javascript'>
                (function($) {
                    jQuery('#textarea_copyright').keyup(function(event) {
                    	jQuery('.value').val(jQuery(this).val());
	                    jQuery('.value').keyup();
                    });

                }(jQuery));

            </script>
		<?php
	}

}