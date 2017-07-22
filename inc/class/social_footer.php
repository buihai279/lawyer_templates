<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class to create a custom post type control
 */
class Social_Footer_Customize extends WP_Customize_Control
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
            <?php 
            $fontArr=array('duckduckgo','aim','delicious','paypal','flattr','android','eventful','smashmag','google-plus','wikipedia','lanyrd','calendar','stumbleupon','fivehundredpx','pinterest','bitcoin','l-w3c','foursquare','html5','ie','klout','weibo','instapaper','viadeo','google','lkdto','hackernews','stackoverflow','intensedebate','cloudapp','linkedin','call','grooveshark','meetup','dropbox','eventbrite','scribd','ebay','vk','ninetyninedesigns','forrst','plancast','facebook','posterous','stripe','github','disqus','digg','spotify','rss','github-circled','opentable','cart','googleplay','skype','reddit','guest','twitter','itunes','print','angellist','plurk','youtube','gowalla','appstore','vimeo','songkick','instagram','dwolla','lastfm','windows','blogger','cc','xing','gmail','appnet','statusnet','pinboard','yahoo','dribbble','evernote','chrome','openid','acrobat','drupal','quora','email','flickr','macstore','soundcloud','buffer','pocket','tumblr','myspace','podcast','eventasaurus','bitbucket','lego','wordpress','amazon','steam','yelp','login',);
            $json=json_decode($this->value()); 
            ?>
            <div id="accordion_icon">
                <?php 
                foreach ($json as  $result) {
                    ?>
                        <div class='group'>
                            <h3>Section:  #<?php echo $result->title.'  '; ?></h3>
                            <div class='sec'>
                                <span class="bizzex-icon-style demo " ><i class="bizzex-social-<?php echo $result->icon; ?>" style="color: #aeaeae;float: left;font-size: 28px;"></i></span>
                                <br style='clear:both'>
                                <label>
                                    <span class="customize-control-title">Icon</span>
                                </label>
                                <input  list="haha1" class='input icon '  placeholder='name icon search...' value='<?php echo $result->icon; ?>' name="icon_value" ><br>
                                <small>ex: phone</small>
                                <datalist id="haha1">
                                    <?php 
                                        if (!isset($result->icon)) {
                                           $result->icon='';
                                        }
                                        foreach ($fontArr as $val) {
                                           printf('<option value="%s" %s>',
                                                        $val,
                                                        selected($result->icon, $val, false));
                                        }
                                    ?>
                                </datalist>
                                <p>
                                    <label>
                                        <span class="customize-control-title">Label</span>
                                    </label>
                                    <input value='<?php echo $result->title; ?>' name='lable' id='' class='input title' placeholder='Label...'>   
                                </p>
                                <p>
                                    <label>
                                        <span class="customize-control-title">Text</span>
                                    </label>
                                    <input value='<?php echo $result->link; ?>' name='text' id='' class='input link' placeholder='Text...'>   
                                </p>
                                <a class='button trash-section' style='float: right;color: #fff;background-color: #e62117;'><span class='bizzex-icon bizzex-icon-trash'></span>delete</a>
                            </div><!-- end .sec -->
                        </div>
                    <?php    
                }
             ?>
             </div><!--- #accordion -->
            <p>
                <button type="button" class="button-secondary add-new-menu-item add-menu-toggle" id="add_new_social" aria-expanded="false">
                    Add a Section
                </button>
            </p>
            <div id='result_config'>
                <input hidden <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
            </div>


            <div id='section_social_demo' style='display: none'>
                <div class='group new'>
                    <h3>New Section</h3>
                        <div class='sec'>
                            <span class="bizzex-icon-style demo " ><i class="bizzex-social-" style="color: #aeaeae;float: left;font-size: 28px;"></i></span>
                            <br style='clear:both'>
                            <label>
                                <span class="customize-control-title">Icon</span>
                            </label>
                            <input  list="haha1" class='input icon '  placeholder='name icon search...' value='' ><br>
                            <small>ex: facebook</small>
                            <datalist id="haha1">
                                <?php 
                                    foreach ($fontArr as $val) {
                                       printf('<option value="%s" >', $val);
                                    }
                                ?>
                            </datalist>
                            <p>
                                <label>
                                    <span class="customize-control-title">Title</span>
                                </label>
                                <input value='' name='lable' id='' class='input title' placeholder='Title...'>   
                            </p>
                            <p>
                                <label>
                                    <span class="customize-control-title">Link</span>
                                </label>
                                <input value='' name='text' id='' class='input link' placeholder='Link...'>   
                            </p>
                            <a class='button trash-section' style='float: right;color: #fff;background-color: #e62117;'><span class='bizzex-icon bizzex-icon-trash'></span>delete</a>
                        </div><!-- end .sec -->
                </div>
            </div>


            <script type='text/javascript'>
                (function($) {
                    function rebuildJsonSocial() {
                        var icon='';
                        var title='';
                        var link='';
                        var data=[];
                        jQuery('#accordion_icon .sec').each(function(index, el) {
                            var th=jQuery('#accordion_icon .sec').eq(index);
                            icon =th.find('.input.icon').val();
                            title =th.find('.input.title').val();
                            link =th.find('.input.link').val();
                            data.push({
                                "icon":icon,
                                "title":title,
                                "link":link
                            });
                        });
                        var str=JSON.stringify(data);//array encode json
                        jQuery('#result_config input').val(str);
                        jQuery('#result_config input').keyup();
                    }

                    jQuery( "#accordion_icon" )
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
                            rebuildJsonSocial();
                        }
                    });
                    ////////////
                    $('#add_new_social').click(function(event) {
                        // console.log(1);
                        $("#accordion_icon").append(($('#section_social_demo .new').clone(true)));
                        $('#accordion_icon').accordion( "refresh" );
                        rebuildJsonSocial();
                    });//add new section
                    ////////////////////
                    $('.trash-section').click(function(event) {
                        $(this).parent().parent().remove();
                        rebuildJsonSocial();
                    });//trash section
                    $('.input').change(function() {
                       rebuildJsonSocial();
                    });//input change callback function rebuildJsonSocial
                    $('.icon').change(function(event) {
                        console.log(1);
                        var icon= $(this).val();
                        $(this).parent().find('.demo i').removeAttr('class').addClass('bizzex-social-'+icon);
                    });
                }(jQuery));
            </script>
            <style>
               #accordion_icon h3:hover{
                    cursor: move;
                }
            </style>
        <?php
    } // end funciton render_content




}
?>