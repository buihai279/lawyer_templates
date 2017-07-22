<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class to create a custom post type control
 */
class Icon_Contact_Customize extends WP_Customize_Control
{
    private $options = array();

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        // $postargs = wp_parse_args($options, array('public' => true));
        // $this->postTypes = get_post_types($postargs, 'object');
        parent::__construct( $manager, $id, $args );
        $this->options = $options;
    }
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
        ?>
        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/accordion.min.js');?>"></script>
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/icon-admin.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />
            <?php $fontArr=array('minus-in-circle','plus-in-circle-1','bug','volume-up','arrow-down-long','arrow-up-long','arrow-combo','star','arrow-left-thin','arrow-right-thin','arrow-left-bold','arrow-right-bold','star-empty','link','comment-1','mustache','scissors-and-comb','lightbulb','down-dir','left-dir','up-dir','circle','arrow-down','arrow-down-thing','arrow-top-thing','bag-cart','menu','arrow-left','arrow-right','arrow-up','clock-1','social_youtube_square','scissors-1','restaurant-1','hotel-food','login-1','logout-1','quote','dog','social_delicious_square','bookmark','baby','search-2','social_deviantart_square','flashlight','plus','eye','minus','cancel-squared','eye-3','cancel-circled','lock-open','lock-2','tag-2','switch','water','droplet','graduation-cap-1','user','download','upload','picture','thumbs-up','thumbs-down','tag','tags','upload-cloud','download-cloud','globe','sun','cloud','flash','moon','umbrella','flight','leaf','award','cog','paper-plane','right-dir','leaf-1','lifebuoy','direction','feather','pencil','keyboard','print','bell','attention','alert','tools','basket','coffee','food','briefcase','suitcase','heart-empty','glass','music','video','videocam','picture-1','camera','scissors','fire','bookmarks','angle-left','angle-right','angle-up','angle-down','down-dir-1','up-dir-1','left-dir-1','right-dir-1','play','stop','pause','cross','cancel','check-1','alarm','coffee-1','camera-1','map-1','flaticon_4418','user-club2','user-3','friends','search','mail-alt','heart','star-2','star-empty-2','user-1','users','th-large','th','th-list','ok','ok-circled','ok-circled2','plus-squared','help','info','link-ext','attach','lock','pin','eye-1','bookmark-1','flag','quote-left','code','edit','location','login','menu-1','resize-vertical','move','rocket','right','play-circled','font','text-height','text-width','list','megaphone','list-bullet','tasks','money','volume-up-1','music-1','search-1','mail','heart-1','star-3','user-2','videocam-1','camera-2','photo','attach-1','lock-1','eye-2','tag-1','thumbs-up-1','pencil-1','phone-1','comment','location-2','check-empty','check','cup','trash','doc','star-1','note','star-empty-1','cog-1','params','calendar','sound','clock','lightbulb-1','tv','desktop','mobile','cd','inbox','globe-1','cloud-1','paper-plane-1','email','home','fire-1','graduation-cap','megaphone-1','database','key','beaker','truck','credit-card','money-1','location-1','food-1','shop','diamond','t-shirt','wallet','rocket-1','money-2','cog-alt','wrench','sliders','doc-1','attention-alt','direction-1','compass','attention-1','attention-circled','bell-alt','bell-1','eye-off','key-1','filter','beaker-1','magic','euro','pound','dollar','rupee','yen','rouble','try','won','bitcoin','link-1','hammer','anchor','terminal','eraser','puzzle','shield','language','paw','cubes','lifebuoy-1','bomb','android','apple','codeopen','flag-1','upload-cloud-1','mic','cog-2','phone','box','folder','sound-1','hourglass','light-up','adjust','network','air','cloud-sun','cloud-moon','rain','snow-heavy','clouds','asl','male','female','link-2','pencil-2','reply','call','heart-empty-1','reply-1','search-3','search-4','user-4','quote-right','baseball-equipment4','award74','baseball-equipment5','baseball7','basketball-equipment8','bicycles4','bows1','boxer4','boxer5','boxing14','champion2','chess-game1','cycle','dive23','dive24','exercise62','fence4','football-game4','football-referee1','footwear3','footwear5','game96','golfing5','gym39','gymnast62','ice-hockey','ice-hockey1','ice-hockey2','pool8','pool9','pool10','protection16','protection17','protection18','referee3','refresh21','rugby-game1','score2','shirts1','skate21','skiing2','skiing12','sport41','sport42','sporting','sports-ball19','sports-ball20','sports-ball21','sports-ball22','sports-ball23','targeting10','tennis-ball3','tennis-ball4','tower8','transport254','transport257','transport259','transport260','weight30','weights15','winter-season','agreement2','botle-01','boutle-2-01','beaker-01','boutle-2','cake-01','browser','chees-01','diploma','familiar','familiar2','heard','help-1','clock-2','contacts','cup-1','icecream','judge','mail-1','map','mic-1','mushroom','noute-pad','phone-2','saucepan','sister','syringe','timer','target','tooth','vehicle23'); ?>
            <div id="accordion_contact">
            <?php 
                $json=json_decode($this->value());
                foreach ($json as $key=> $result) {
                    ?>

                        <div class='group'>
                            <h3>Section:  #<?php echo $result->input_label.'  '; ?></h3>
                            <div class='sec'>
                                <span class="bizzex-icon-style demo " ><i class="bizzex-icon bizzex-icon-<?php echo $result->input_icon; ?>" style="color: #aeaeae;float: left;font-size: 28px;"></i></span>
                                <br style='clear:both'>
                                <label>
                                    <span class="customize-control-title">Icon</span>
                                </label>
                                <input  list="haha" class='input input_icon '  placeholder='name icon search...' value='<?php echo $result->input_icon; ?>' name="icon_value" ><br>
                                <small>ex: phone</small>
                                <datalist id="haha">
                                    <?php 
                                        if (!isset($result->input_icon)) {
                                           $result->input_icon='';
                                        }
                                        foreach ($fontArr as $val) {
                                           printf('<option value="%s" %s>',
                                                        $val,
                                                        selected($result->input_icon, $val, false));
                                        }
                                    ?>
                                </datalist>
                                <p>
                                    <label>
                                        <span class="customize-control-title">Label</span>
                                    </label>
                                    <input type='text' value='<?php echo $result->input_label; ?>' name='lable' id='' class='input input_label' placeholder='Label...'>   
                                </p>
                                <p>
                                    <label>
                                        <span class="customize-control-title">Text</span>
                                    </label>
                                    <input type='textarea' value='<?php echo $result->input_text; ?>' name='text' id='' class='input input_text' placeholder='Text...'>   
                                </p>
                                <a class='button trash-section' style='float: right;color: #fff;background-color: #e62117;'><span class='bizzex-icon bizzex-icon-trash'></span>delete</a>
                            </div><!-- end .sec -->
                        </div>
                    <?php    

                }
             ?>
            </div><!-- #accordion -->
            <p>
                <button type="button" class="button-secondary add-new-menu-item add-menu-toggle" id="add_new_contact" aria-expanded="false">
                    Add a Section
                </button>
            </p>
            <div id='result_contact_config'>
                <input hidden <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
            </div>
            <script type='text/javascript'>

                function rebuildJsonContact() {
                    var input_icon='';
                    var input_label='';
                    var input_text='';
                    var data=[];
                    jQuery('#accordion_contact .sec').each(function(index_p, el) {
                        var th=jQuery('#accordion_contact .sec').eq(index_p);
                        input_icon =th.find('.input.input_icon').val();
                        input_label =th.find('.input.input_label').val();
                        input_text =th.find('.input.input_text').val();
                        data.push({
                            "input_icon":input_icon,
                            "input_label":input_label,
                            "input_text":input_text
                        });
                    });
                    var str=JSON.stringify(data);//array encode json
                    jQuery('#result_contact_config input').val(str);
                    jQuery('#result_contact_config input').keyup();
                }
            //////////////////////////////
                (function($) {
                    $( "#accordion_contact" )
                        .accordion({
                            collapsible: true,
                            heightStyle: "content",
                            header: "> div > h3"
                        })
                        .sortable({
                            axis: "y",
                            handle: "h3",
                            stop: function( event, ui ) {
                            // IE doesn't register the blur when sorting
                            // so trigger focusout handlers to remove .ui-state-focus
                            ui.item.children( "h3" ).triggerHandler( "focusout" );
                            // Refresh accordion to handle new order
                            $( this ).accordion( "refresh" );
                            rebuildJsonContact();
                        }
                    });//JQUERY UI
                    ////////////
                    $('#add_new_contact').click(function(event) {
                        $("#accordion_contact").append(($('#section_contact_demo .new').clone(true,true)));
                        $('#accordion_contact').accordion( "refresh" );
                        rebuildJsonContact();
                    });//add new section
                    ////////////////////
                    $('.trash-section').click(function(event) {
                        $(this).parent().parent().remove();
                        rebuildJsonContact();
                    });//trash section
                    $('.input').change(function() {
                       rebuildJsonContact();
                    });//input change callback function rebuildJsonContact
                    $('.input_icon').change(function(event) {
                        var icon= $(this).val();
                        $(this).parent().find('.demo i').removeAttr('class').addClass('bizzex-icon bizzex-icon-'+icon);
                    });
                }(jQuery));

            </script>
            <div id='section_contact_demo' style='display: none'>
                <div class='group new'>
                    <h3 class='ui-accordion-header ui-state-default ui-accordion-icons ui-sortable-handle ui-accordion-header-active ui-state-active ui-corner-top'>New Section </h3>
                    <div class='sec sec ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active'>
                        <span class="bizzex-icon-style demo " ><i class="bizzex-icon bizzex-icon-" style="color: #aeaeae;float: left;font-size: 28px;"></i></span>
                        <br style='clear:both'>
                        <label>
                            <span class="customize-control-title">Icon</span>
                        </label>
                        <input  list="haha" class='input input_icon' data-index='' placeholder='name icon search...' value='' name="icon_value" ><br>
                        <small>ex: phone</small>
                        <datalist id="haha">
                            <?php 
                            if (!isset($result->input_icon)) {
                               $result->input_icon='';
                            }
                                foreach ($fontArr as $val) {
                                   printf('<option value="%s" %s>',
                                                $val,
                                                selected($result->input_icon, $val, false));
                                }
                            ?>
                        </datalist>
                        <p>
                            <label>
                                <span class="customize-control-title">Label</span>
                            </label>
                            <input type='text' value='' name='lable' id='' class='input input_label' placeholder='Label...'>   </p>
                        <p>
                            <label>
                                <span class="customize-control-title">Text</span>
                            </label>
                            <textarea value='' name='text' id='' class='input input_text' placeholder='Text...'></textarea>   </p>
                        <a class='button trash-section' style='float: right;color: #fff;background-color: #e62117;'><span class='bizzex-icon bizzex-icon-trash'></span>delete</a>
                    </div><!-- end .sec -->
                </div>
            </div>

            <style>
               #accordion_contact h3:hover{
                    cursor: move;
                }
            </style>
        <?php
    }

}
?>