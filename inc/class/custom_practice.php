 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Practice_Custom_Control extends WP_Customize_Control
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
	      'editor_class'=>'text_content'
	      );
       	$fontArr=array('minus-in-circle','plus-in-circle-1','bug','volume-up','arrow-down-long','arrow-up-long','arrow-combo','star','arrow-left-thin','arrow-right-thin','arrow-left-bold','arrow-right-bold','star-empty','link','comment-1','mustache','scissors-and-comb','lightbulb','down-dir','left-dir','up-dir','circle','arrow-down','arrow-down-thing','arrow-top-thing','bag-cart','menu','arrow-left','arrow-right','arrow-up','clock-1','social_youtube_square','scissors-1','restaurant-1','hotel-food','login-1','logout-1','quote','dog','social_delicious_square','bookmark','baby','search-2','social_deviantart_square','flashlight','plus','eye','minus','cancel-squared','eye-3','cancel-circled','lock-open','lock-2','tag-2','switch','water','droplet','graduation-cap-1','user','download','upload','picture','thumbs-up','thumbs-down','tag','tags','upload-cloud','download-cloud','globe','sun','cloud','flash','moon','umbrella','flight','leaf','award','cog','paper-plane','right-dir','leaf-1','lifebuoy','direction','feather','pencil','keyboard','print','bell','attention','alert','tools','basket','coffee','food','briefcase','suitcase','heart-empty','glass','music','video','videocam','picture-1','camera','scissors','fire','bookmarks','angle-left','angle-right','angle-up','angle-down','down-dir-1','up-dir-1','left-dir-1','right-dir-1','play','stop','pause','cross','cancel','check-1','alarm','coffee-1','camera-1','map-1','flaticon_4418','user-club2','user-3','friends','search','mail-alt','heart','star-2','star-empty-2','user-1','users','th-large','th','th-list','ok','ok-circled','ok-circled2','plus-squared','help','info','link-ext','attach','lock','pin','eye-1','bookmark-1','flag','quote-left','code','edit','location','login','menu-1','resize-vertical','move','rocket','right','play-circled','font','text-height','text-width','list','megaphone','list-bullet','tasks','money','volume-up-1','music-1','search-1','mail','heart-1','star-3','user-2','videocam-1','camera-2','photo','attach-1','lock-1','eye-2','tag-1','thumbs-up-1','pencil-1','phone-1','comment','location-2','check-empty','check','cup','trash','doc','star-1','note','star-empty-1','cog-1','params','calendar','sound','clock','lightbulb-1','tv','desktop','mobile','cd','inbox','globe-1','cloud-1','paper-plane-1','email','home','fire-1','graduation-cap','megaphone-1','database','key','beaker','truck','credit-card','money-1','location-1','food-1','shop','diamond','t-shirt','wallet','rocket-1','money-2','cog-alt','wrench','sliders','doc-1','attention-alt','direction-1','compass','attention-1','attention-circled','bell-alt','bell-1','eye-off','key-1','filter','beaker-1','magic','euro','pound','dollar','rupee','yen','rouble','try','won','bitcoin','link-1','hammer','anchor','terminal','eraser','puzzle','shield','language','paw','cubes','lifebuoy-1','bomb','android','apple','codeopen','flag-1','upload-cloud-1','mic','cog-2','phone','box','folder','sound-1','hourglass','light-up','adjust','network','air','cloud-sun','cloud-moon','rain','snow-heavy','clouds','asl','male','female','link-2','pencil-2','reply','call','heart-empty-1','reply-1','search-3','search-4','user-4','quote-right','baseball-equipment4','award74','baseball-equipment5','baseball7','basketball-equipment8','bicycles4','bows1','boxer4','boxer5','boxing14','champion2','chess-game1','cycle','dive23','dive24','exercise62','fence4','football-game4','football-referee1','footwear3','footwear5','game96','golfing5','gym39','gymnast62','ice-hockey','ice-hockey1','ice-hockey2','pool8','pool9','pool10','protection16','protection17','protection18','referee3','refresh21','rugby-game1','score2','shirts1','skate21','skiing2','skiing12','sport41','sport42','sporting','sports-ball19','sports-ball20','sports-ball21','sports-ball22','sports-ball23','targeting10','tennis-ball3','tennis-ball4','tower8','transport254','transport257','transport259','transport260','weight30','weights15','winter-season','agreement2','botle-01','boutle-2-01','beaker-01','boutle-2','cake-01','browser','chees-01','diploma','familiar','familiar2','heard','help-1','clock-2','contacts','cup-1','icecream','judge','mail-1','map','mic-1','mushroom','noute-pad','phone-2','saucepan','sister','syringe','timer','target','tooth','vehicle23'); ?>

    	<div id="accordion_practice_custom">
    		<?php foreach ($settingInfo as $key => $value): ?>
			  <div class="group">
			    <h3>#<?php echo $value->tittle;?></h3>
			    <div>
			    	<p>
			    		<div class="h-feature-headline icon_type_5 cf">
				    		<div class="icon_wrap" style="color:#555555 ">
					    		<span class="tc"></span>
					    		<span class="rc"></span>
					    		<span class="bc"></span>
					    		<span class="lc"></span>
					    		<i class="bizzex-icon-<?php echo $value->icon;?>"></i>
				    		</div>
			    		</div>
			    	</p>
					<p>
						<label class="customize-control-title">Icon:</label>
					  	<input list='lawyer_icon_practice' type='text' class='icon' value='<?php echo $value->icon;?>' placeholder='Icon ...'>
						<datalist id="lawyer_icon_practice">
                            <?php 
                                if (!isset($value->input_icon)) {
                                   $value->input_icon='';
                                }
                                foreach ($fontArr as $val) {
                                   printf('<option value="%s" %s>',
                                                $val,
                                                selected($value->input_icon, $val, false));
                                }
                            ?>
                        </datalist>
					</p>
					<p>
						<label class="customize-control-title">Tittle:</label>
					  	<input type='text' class='tittle' value='<?php echo $value->tittle;?>' placeholder='Tittle ...'>
						
					</p>
			      	<p>
			      		<label class="customize-control-title">Value:</label>
					  	<?php
							wp_editor($value->text,'', $settings );
						?>
					</p>
			      	<p>
		                <a class='button delete_practice' style='float: right;color: #fff;background-color: #e62117;'>
		                        delete</a>
		           	</p>
			    </div>
			  </div>

    		<?php endforeach;?>
		</div>
        <p>
            <button type="button" class="button-secondary add-new-menu-item add-menu-toggle" id="add_new_practice" aria-expanded="false">
                Add New
            </button>
        </p>
		<input hidden='hidden' class='value_practice' <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
		



        <div id='section_practice_demo' style='display: none'>
            <div class="group new">
			    <h3>#new</h3>
			    <div>
			    	<p>
			    		<div class="h-feature-headline icon_type_5 cf">
				    		<div class="icon_wrap" style="color:#555555 ">
					    		<span class="tc"></span>
					    		<span class="rc"></span>
					    		<span class="bc"></span>
					    		<span class="lc"></span>
					    		<i class="bizzex-icon-"></i>
				    		</div>
			    		</div>
			    	</p>
					<p>
						<label class="customize-control-title">Icon:</label>
					  	<input list='lawyer_icon_practice' type='text' class='icon' value='' placeholder='Icon ...'>
						<datalist id="lawyer_icon_practice">
                            <?php 
                               	$sel='';
                                foreach ($fontArr as $val) {
                                   printf('<option value="%s" %s>',
                                                $val,
                                                selected($sel, $val, false));
                                }
                            ?>
                        </datalist>
					</p>
					<p>
						<label class="customize-control-title">Tittle:</label>
					  	<input type='text' class='tittle' value='' placeholder='Tittle ...'>
						
					</p>
			      	<p>
			      		<label class="customize-control-title">Value:</label>
					  	<?php
							wp_editor('','', $settings );
						?>
					</p>
			      	<p>
		                <a class='button delete_practice' style='float: right;color: #fff;background-color: #e62117;'>
		                        delete</a>
		           	</p>
			    </div>
		  	</div>
        </div>

        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/icon-admin.css';?>' type='text/css' media='all' />
        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/accordion.min.js');?>"></script>
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />

        	<script type='text/javascript'>
			  	(function($) {
			      	function buildAccordionPractice() {
					    jQuery( "#accordion_practice_custom" )
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
					          rebuildJsonPractice();
					        }
					      });
					      //build accordion
			      }
			      	buildAccordionPractice();
                    function rebuildJsonPractice() {
                        var data=[];
                        jQuery('#accordion_practice_custom .group').each(function(index, el) {
	                        var icon='';
	                        var tittle='';
	                        var text='';
	                        var th=jQuery('#accordion_practice_custom .group').eq(index);
	                        icon =th.find('input.icon').val();
	                        tittle =th.find('input.tittle').val();
	                        text =th.find('textarea').val();
	                        data.push({
	                            "icon":icon,
	                            "tittle":tittle,
	                            "text":text,
	                        });
                        });
                        var str=JSON.stringify(data);//array encode json
                        jQuery('.value_practice').val(str);
                        jQuery('.value_practice').keyup();
                        // alert(str);
                    }
                    //build json


                    $('.delete_practice').click(function(event) {
                        $(this).parent().parent().parent().remove();
                        rebuildJsonPractice();
                    });


                    $('#add_new_practice').click(function(event) {
                        $("#accordion_practice_custom").append(($('#section_practice_demo .group').clone(true)));
                        jQuery( "#accordion_practice_custom" ).accordion( "refresh" );
                        rebuildJsonPractice();
                        
                    });//add new 
                    $('.icon').change(function(event) {
                        var icon= $(this).val();
                        $(this).parent().parent().find('.icon_wrap i').removeAttr('class').addClass('bizzex-icon-'+icon);
                    });


                    jQuery('#accordion_practice_custom').find('.tittle').keyup(function(event) {
                    	rebuildJsonPractice();
                    });
                    jQuery('#accordion_practice_custom').find('.icon').change(function(event) {
                    	rebuildJsonPractice();
                    });
                    jQuery('#accordion_practice_custom').find('textarea').keyup(function(event) {
                    	rebuildJsonPractice();
                    });

			      	jQuery('.new .tittle').keyup(function(event) {
			      		rebuildJsonPractice();
			      	});
			      	jQuery('.new .icon').change(function(event) {
			      		rebuildJsonPractice();
			      	});
			      	jQuery('.new textarea').keyup(function(event) {
			      		rebuildJsonPractice();
			      	});
                    //event

			 	}(jQuery));
		  	</script>
		  	<style type="text/css">
		  		.h-feature-headline  {
					cursor: pointer;
					margin-bottom: 1em;
					overflow: hidden;
				}
				.h-feature-headline.icon_type_5 > .icon_wrap i {
					color: inherit;
				}

				.tc {
					border-left: 1px solid;
					border-top: 1px solid;
					height: 30px;
					left: 50%;
					margin-left: -15px;
					position: absolute;
					top: -15px;
					transform: rotate(45deg);
					transition: top 0.5s ease 0s;
					width: 30px;
				}

				.bc {
					border-bottom: 1px solid;
					border-right: 1px solid;
					bottom: -15px;
					height: 30px;
					left: 50%;
					margin-left: -15px;
					position: absolute;
					transform: rotate(45deg);
					transition: bottom 0.5s ease 0s;
					width: 30px;
				}

				.lc {
					border-left: 1px solid;
					border-top: 1px solid;
					height: 30px;
					left: -15px;
					margin-top: -15px;
					position: absolute;
					top: 50%;
					transform: rotate(-45deg);
					transition: left 0.5s ease 0s;
					width: 30px;
				}

				.rc {
					border-right: 1px solid;
					border-bottom: 1px solid;
					height: 30px;
					margin-top: -15px;
					position: absolute;
					right: -15px;
					top: 50%;
					transform: rotate(-45deg);
					transition: right 0.5s ease 0s;
					width: 30px;
				}

				.h-feature-headline.icon_type_5 > .icon_wrap:hover .tc {
					transform: rotate(-135deg);
					transition: top 0.5s ease 0s;
					top: -30px;
				}
				.h-feature-headline.icon_type_5 > .icon_wrap:hover .bc {
					transform: rotate(-135deg);
					transition: bottom 0.5s ease 0s;
					bottom: -30px;
				}
				.h-feature-headline.icon_type_5 > .icon_wrap:hover .lc {
					transform: rotate(135deg);
					transition: left 0.5s ease 0s;
					left: -30px;
				}
				.h-feature-headline.icon_type_5 > .icon_wrap:hover .rc{
					transform: rotate(135deg);
					transition: right 0.5s ease 0s;
					right: -30px;
				}
				.h-feature-headline.icon_type_5 > .icon_wrap {
					font-size:40px;
					height: 90px;
					line-height: 92px;
					margin: 15px auto;
					text-align: center;
					position: relative;
					width: 90px;
				}
		  	</style>
  <?php
	}

}