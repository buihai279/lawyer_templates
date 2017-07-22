 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Introduce_Custom_Control extends WP_Customize_Control
{
    public function __construct($manager, $id, $args = array(), $options = array())
    {

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
    	$settingInfo=json_decode($this->value());
    	echo '<br>';echo $this->label;
    	echo $this->id;
	    $settings = array(
	      'media_buttons' => false,
	      'textarea_rows'=>7,
	      'editor_class'=>'haha'
	      );
						       ?>
    	<div id="accordion_intro_custom">
    		<?php foreach ($settingInfo as $key => $value): ?>
			  <div class="group">
			    <h3>#<?php echo $value->label;?></h3>
			    <div>
					<p>
						<label class="customize-control-title">Label:</label>
					  	<input type='text' class='label' value='<?php echo $value->label;?>' placeholder='Label ...'>
						
					</p>
			      	<p>
			      		<label class="customize-control-title">Value:</label>
					  	<?php
							wp_editor($value->value,'', $settings );
						?>
					</p>
			      	<p>
		                <a class='button delete_intro' style='float: right;color: #fff;background-color: #e62117;'>
		                        delete</a>
		           	</p>
			    </div>
			  </div>

    		<?php endforeach;?>
		</div>
        <p>
            <button type="button" class="button-secondary add-new-menu-item add-menu-toggle" id="add_new_intro" aria-expanded="false">
                Add New
            </button>
        </p>
		<input hidden='hidden' class='value_intro' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
		



        <div id='section_intro_demo' style='display: none'>
            <div class="group new">
			    <h3>#new</h3>
			    <div>
					<p>
						<label class="customize-control-title">Label:</label>
					  	<input type='text' class='label' value='' placeholder='Label ...'>
						
					</p>
			      	<p>
			      		<label class="customize-control-title">Value:</label>
					  	<?php
							wp_editor('','', $settings );
						?>
					</p>
			      	<p>
		                <a class='button delete_intro' style='float: right;color: #fff;background-color: #e62117;'>
		                        delete</a>
		           	</p>
			    </div>
		  	</div>
        </div>


        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/accordion.min.js');?>"></script>
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />

        	<script type='text/javascript'>
			  	(function($) {
			      	function buildAccordion() {
					    jQuery( "#accordion_intro_custom" )
					      .accordion({
					      	collapsible: true,
					        heightStyle: "content",
					        header: "> div > h3"
					      })
					      .sortable({
					        axis: "y",
					        handle: "h3",
					        stop: function( event, ui ) {
					          ui.item.children( "h3" ).triggerHandler( "focusout" );
					          jQuery( this ).accordion( "refresh" );
					          rebuildJsonIntro();
					        }
					      });
					      //build accordion
			      }
			      	buildAccordion();
                    function rebuildJsonIntro() {
                        var data=[];
                        jQuery('#accordion_intro_custom .group').each(function(index, el) {
	                        var label='';
	                        var value='';
	                        var th=jQuery('#accordion_intro_custom .group').eq(index);
	                        label =th.find('.label').val();
	                        value =th.find('textarea').val();
	                        data.push({
	                            "label":label,
	                            "value":value,
	                        });
                        });
                        var str=JSON.stringify(data);//array encode json
                        jQuery('.value_intro').val(str);
                        jQuery('.value_intro').keyup();
                        console.log(str);
                    }
                    //build json


                    $('.delete_intro').click(function(event) {
                        $(this).parent().parent().parent().remove();
                        rebuildJsonIntro();
                    });


                    $('#add_new_intro').click(function(event) {
                        $("#accordion_intro_custom").append(($('#section_intro_demo .group').clone(true)));
                        jQuery( "#accordion_intro_custom" ).accordion( "refresh" );
                        rebuildJsonIntro();
                        
                    });//add new 



                    jQuery('#accordion_intro_custom').find('input').keyup(function(event) {
                    	rebuildJsonIntro();
                    });
                    jQuery('#accordion_intro_custom').find('textarea').keyup(function(event) {
                    	rebuildJsonIntro();
                    });

			      	jQuery('.new input').keyup(function(event) {
			      		rebuildJsonIntro();
			      	});
			      	jQuery('.new textarea').keyup(function(event) {
			      		rebuildJsonIntro();
			      	});
                    //event

			 	}(jQuery));
		  	</script>
  <?php
	}

}