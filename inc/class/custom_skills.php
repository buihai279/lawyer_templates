 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Skills_Custom_Control extends WP_Customize_Control
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
    	$skillsArr=json_decode($this->value());
    	echo '<br>';echo $this->label;
    	echo $this->id;
		?>
    	<div id="skills_custom">
			<p>
				<label class="customize-control-title">Speed:</label>
				<input  type="number" min="1"  class="speed" value='<?php echo $skillsArr->speed;?>' placeholder='Speed ...'>
				
			</p>
    		<?php foreach ($skillsArr->data as $key => $value): ?>
			  <div class="group">
			    <h3><?php echo $value->num_prefix . ' ' . $value->counter . ' ' . $value->num_suffix;?> </h3>
			    <div>
					<p>
						<label class="customize-control-title">Number Prefix:</label>
					  	<input type='text' class="num_prefix" value='<?php echo $value->num_prefix;?>' placeholder='Number Prefix ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Counter Value:</label>
					  	<input  type="number" min="1"  class="counter" value='<?php echo $value->counter;?>' placeholder='Counter Value ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Number Suffix:</label>
					  	<input type='text' class="num_suffix" value='<?php echo $value->num_suffix;?>' placeholder='Number suffix ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Tittle:</label>
					  	<input type='text' class="tittle" value='<?php echo $value->tittle;?>' placeholder='Tittle ...'>
						
					</p>
			      	<p>
		                <a class='button delete_skills' style='float: right;color: #fff;background-color: #e62117;'>
		                        delete</a>
		           	</p>
			    </div>
			  </div>

    		<?php endforeach;?>
		</div>
        <p>
            <button type="button" class="button-secondary add-new-menu-item add-menu-toggle" id="add_new_skills" aria-expanded="false">
                Add New
            </button>
        </p>
		<input hidden='hidden' class='value_skills' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
		



        <div id='section_skills_demo' style='display: none'>
            <div class="group new">
			    <h3>#new</h3>
			    <div>
					<p>
						<label class="customize-control-title">Number Prefix:</label>
					  	<input type='text' class="num_prefix" value='' placeholder='Number Prefix ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Counter Value:</label>
					  	<input  type="number" min="1"  class="counter" value='' placeholder='Counter Value ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Number Suffix:</label>
					  	<input type='text' class="num_suffix" value='' placeholder='Number suffix ...'>
						
					</p>
					<p>
						<label class="customize-control-title">Tittle:</label>
					  	<input type='text' class="tittle" value='' placeholder='Tittle ...'>
						
					</p>
			      	<p>
		                <a class='button delete_skills' style='float: right;color: #fff;background-color: #e62117;'>
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
			      	function buildAccordionSkills() {
					    jQuery( "#skills_custom" )
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
					          rebuildJsonSkills();
					        }
					      });
					      //build accordion
			      }
			      	buildAccordionSkills();
                    function rebuildJsonSkills() {
                        var data=[];
                        var result=[];
                        var speed='';
                        jQuery('#skills_custom .group').each(function(index, el) {
	                        var num_prefix='';
	                        var counter='';
	                        var num_suffix='';
	                        var tittle='';
	                        var th=jQuery('#skills_custom .group').eq(index);
	                        num_prefix =th.find('.num_prefix').val();
	                        num_suffix =th.find('.num_suffix').val();
	                        counter =th.find('.counter').val();
	                        tittle =th.find('.tittle').val();
	                        data.push({
	                            "num_prefix":num_prefix,
	                            "counter":counter,
	                            "num_suffix":num_suffix,
	                            "tittle":tittle
	                        });
                        });
                        speed =jQuery('#skills_custom').find('.speed').val();
                        result={
	                            "speed":speed,
	                            "data":data
	                        };
                        var str=JSON.stringify(result);//array encode json
                        jQuery('.value_skills').val(str);
                        jQuery('.value_skills').keyup();
                        console.log(str);
                    }
                    //build json


                    $('.delete_skills').click(function(event) {
                        $(this).parent().parent().parent().remove();
                        rebuildJsonSkills();
                    });


                    $('#add_new_skills').click(function(event) {
                        $("#skills_custom").append(($('#section_skills_demo .group').clone(true)));
                        jQuery( "#skills_custom" ).accordion( "refresh" );
                        rebuildJsonSkills();
                        
                    });//add new 



                    jQuery('#skills_custom').find('input').keyup(function(event) {
                    	rebuildJsonSkills();
                    });
                    jQuery('#skills_custom').find('input.counter').change(function(event) {
                    	rebuildJsonSkills();
                    });

			      	jQuery('.new input').keyup(function(event) {
			      		rebuildJsonSkills();
			      	});
			      	jQuery('.new input.counter').change(function(event) {
			      		rebuildJsonSkills();
			      	});
                    //event

			 	}(jQuery));
		  	</script>
  <?php
	}

}