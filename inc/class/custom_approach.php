 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Approach_Custom_Control extends WP_Customize_Control
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
    	$approachArr=json_decode($this->value());
    	echo '<br>';echo $this->label;
    	echo $this->id;
        $settings = array(
          'textarea_name' => 'textarea_copyright',
          'editor_class'=>'content',
          'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), 
          'media_buttons' => false
          );
		?>

		<label class="customize-control-title">What i do ?:</label>
		<div class='customize-approach'>
	    	<div id="whatido">
	    		<?php foreach ($approachArr->whatido as $key => $value): ?>
				  <div class="group">
				    <h3># <?php echo $value->tittle;?></h3>
				    <div>
						<p>
							<label class="customize-control-title">Tittle:</label>
						  	<input type='text' class="tittle" value='<?php echo $value->tittle;?>' placeholder='Tittle ...'>
						</p>
						<p>
							<label class="customize-control-title">Content :</label>
							<?php
				            	wp_editor($value->content,'', $settings );
				          	?>
						</p>
						<p>
							<label class="customize-control-title">Collapse:</label>
						  	True: <input type='radio' value='false' name="collapse1" class="collapse"
						  	 <?php echo ($value->collapse=='true') ? 'checked' : '' ;?> >
						</p>
				      	<p>
			                <a class='button delete_approach' style='float: right;color: #fff;background-color: #e62117;'>
			                        delete</a>
			           	</p>
				    </div>
				  </div>

	    		<?php endforeach;?>
		        <p>
		            <button type="button" class="button-secondary add-new-menu-item add-menu-toggle add_new_approach" aria-expanded="false">
		                Add New
		            </button>
		        </p>
			</div>

			<label class="customize-control-title" style='clear: both;'>App:</label>
	    	<div id="app">
	    		<?php foreach ($approachArr->app as $key => $value): ?>
				  <div class="group">
				    <h3># <?php echo $value->tittle;?> </h3>
				    <div>
						<p>
							<label class="customize-control-title">Tittle:</label>
						  	<input type='text' class="tittle" value='<?php echo $value->tittle;?>' placeholder='Tittle ...'>
						</p>
						<p>
							<label class="customize-control-title">Content :</label>
						  	<?php
				            	wp_editor($value->content,'', $settings );
				          	?>
						</p>
						<p>
							<label class="customize-control-title">Collapse:</label>
						  	True: <input type='radio' value='false' name="collapse2" class="collapse" <?php echo ($value->collapse=='true') ? 'checked' : '' ;?>>
						</p>
				      	<p>
			                <a class='button delete_approach' style='float: right;color: #fff;background-color: #e62117;'>
			                        delete</a>
			           	</p>
				    </div>
				  </div>

	    		<?php endforeach;?>
		        <p>
		            <button type="button" class="button-secondary add-new-menu-item add-menu-toggle add_new_approach" aria-expanded="false">
		                Add New
		            </button>
		        </p>
			</div>
			



			<input hidden='hidden' class='value_approach' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>

	        <div id='section_approach_demo' style='display: none'>
				<div class="group new_approach">
					<h3>#new</h3>
					<div>
						<p>
							<label class="customize-control-title">Tittle:</label>
						  	<input type='text' class="tittle" value='' placeholder='Tittle ...'>
						</p>
						<p>
							<label class="customize-control-title">Content :</label>
							<?php
				            	wp_editor('','', $settings );
				          	?>						
			          	</p>
						<p>
							<label class="customize-control-title">Collapse:</label>
						  	True: <input type='radio' value='false' name="collapse2" class="collapse">
						</p>
					  	<p>
					        <a class='button delete_approach' style='float: right;color: #fff;background-color: #e62117;'>
					                delete</a>
					   	</p>
					</div>
				</div>
	        </div>
	    </div>



        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/accordion.min.js');?>"></script>
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />

        	<script type='text/javascript'>
			  	(function($) {
			      	function buildAccordionSkills() {
					    jQuery( "#whatido" )
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
					          rebuildJsonApproach();
					        }
					      });
					      //build accordion
					    jQuery( "#app" )
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
					          rebuildJsonApproach();
					        }
					      });
					      //build accordion
			      }
			      	buildAccordionSkills();
                    function rebuildJsonApproach() {
                        var data=[];
                        var data1=[];
                        var result=[];
                        var tittle='';
                        var content='';
                        var collapse='';
                        jQuery('#whatido .group').each(function(index, el) {
	                        var th=jQuery('#whatido .group').eq(index);
	                        tittle =th.find('.tittle').val();
	                        content =th.find('.content').val();
	                        if(th.find('.collapse').is(":checked") ){ // check if the radio is checked
					           collapse ='true';
					        }else{
	                        	collapse =th.find('.collapse').val();
					        }
	                        data.push({
	                            "tittle":tittle,
	                            "content":content,
	                            "collapse":collapse,
	                        });
                        });
                        jQuery('#app .group').each(function(index, el) {
	                        var th=jQuery('#app .group').eq(index);
	                        tittle =th.find('.tittle').val();
	                        content =th.find('.content').val();
	                        if(th.find('.collapse').is(":checked") ){ // check if the radio is checked
					           collapse ='true';
					        }else{
	                        	collapse =th.find('.collapse').val();
					        }
	                        data1.push({
	                            "tittle":tittle,
	                            "content":content,
	                            "collapse":collapse,
	                        });
                        });
                        result={
	                            "whatido":data,
	                            "app":data1
	                        };
                        var str=JSON.stringify(result);//array encode json
                        jQuery('.value_approach').val(str);
                        jQuery('.value_approach').keyup();
                    }
                    //build json


                    $('.delete_approach').click(function(event) {
                        $(this).parent().parent().parent().remove();
                        rebuildJsonApproach();
                    });


                    $('#app .add_new_approach').click(function(event) {
                        jQuery($('#section_approach_demo .group')).find('input:radio').attr('name', 'collapse2');
                        $("#app>p").before(($('#section_approach_demo .group').clone(true,true)));
                        jQuery( "#app" ).accordion( "refresh" );
                        rebuildJsonApproach();
                        
                    });
                    $('#whatido .add_new_approach').click(function(event) {
                        jQuery($('#section_approach_demo .group')).find('input:radio').attr('name', 'collapse1');
                        $("#whatido>p").before(($('#section_approach_demo .group').clone(true,true)));
                        jQuery( "#whatido" ).accordion( "refresh" );
                        rebuildJsonApproach();
                        
                    });//add new 



                    jQuery('#app').find('input').keyup(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('#app').find('input:radio').change(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('#app').find('textarea').keyup(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('#whatido').find('input').keyup(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('#whatido').find('input:radio').change(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('#whatido').find('textarea').keyup(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('.new_approach').find('input').keyup(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('.new_approach').find('input:radio').change(function(event) {
                    	rebuildJsonApproach();
                    });
                    jQuery('.new_approach').find('textarea').keyup(function(event) {
                    	rebuildJsonApproach();
                    });

                    //event

			 	}(jQuery));
		  	</script>
  <?php
	}

}