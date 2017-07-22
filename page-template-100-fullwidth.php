<?php
/**
 * Template Name: template-100-fullwidth
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php 
$theme_mods=get_theme_mod("lawyer_theme_options");
 
 ?>
<div class="bizzex-main full" role="main">
    <article id="post-<?php the_ID();?>" <?php post_class('no-post-thumbnail' );?>>
        <div class="entry-content">
            <div id="bizzex-content-band-1" class="bizzex-content-band vc bg-image parallax man" style="background-image: url(<?php echo $theme_mods['bg_introduce']; ?>); background-color: transparent; padding-top: 96px; padding-bottom: 96px;">
                <div class="bizzex-container-fluid max width">
                    <div class="bizzex-column vc one-half animate-in-from-left " style="" data-fade="true">
                        <img class="bizzex-img bizzex-img-none none" style="min-width:100%;" src="<?php echo $theme_mods['avatar_introduce']; ?>" alt="">
                    </div>
                    <div class="bizzex-column vc one-half animate-in-from-right " style="" data-fade="true">
                        <h1 style="margin-top: 0;"><?php  echo $theme_mods['name'];?></h1>
                        <p><span style="color: #3e3e3e;"><?php  echo $theme_mods['overview_experience'];?></span>
                    </p>
                        <p><span class="bizzex-divider"></span>
                    </p>
                        <p>
                    </p>
                        <p><?php  echo $theme_mods['introduce']; ?>
                    </p>
                        <?php 
                            $infoArr=json_decode($theme_mods['custom_introduce_info']);
                            foreach ($infoArr as  $v): ?>
                            <p>
                                <strong><?php echo $v->label; ?>:</strong>
                                <?php echo $v->value; ?>
                            </p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <script>
            if (jQuery('html').hasClass('ie8')) {
                jQuery('#bizzex-content-band-1').backstretch('<?php echo $theme_mods['bg_introduce']; ?>');
            }
            </script>
            <div id="bizzex-content-band-2" class="bizzex-content-band vc man" style="background-color: #ffffff; padding-top: 96px; padding-bottom: 96px; border-bottom:1px solid #c6d6e0;">
                <div class="bizzex-container-fluid max width">
                    <div class="bizzex-column vc whole animate-in-from-bottom " style="" data-fade="true">
                        <h1 style="margin-top: 0px; text-align: center;">
                            <?php  echo $theme_mods['welcome_h1'];?>
                        </h1>
                        <p>&nbsp;</p>
                        <p style="text-align: center;">
                            <span style="color: #393939; font-weight: 300; font-size: 24px;">
                                <?php  echo $theme_mods['content_welcome'];?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div id="practice" class="bizzex-content-band vc man" style="background-color: #ffffff; padding-top: 96px; padding-bottom: 96px; border-bottom:1px solid #c6d6e0;">
                <div class="bizzex-container-fluid max width">
                    <div class="bizzex-column vc whole" style="">
                        <h1 style="text-align: center;">
                        <span style="color: #3e3e3e;"><?php  echo $theme_mods['practice_areas'];?></span>
                        </h1>
                        <p>
                            <span style="color: #949494;"><?php  echo $theme_mods['practice_description1'];?></span>
                            <br>
                            <span style="color: #949494;">tempor incididunt ut labore et dolore magna aliqua. </span>
                        </p>
                        <p style="text-align: center;"><span class="bizzex-divider"></span>
                    </p>
                        <hr class="bizzex-gap" style="margin: 5em 0 0 0;">
                        <div id="bizzex-content-band-4" class="bizzex-content-band vc" style="background-color: transparent;">
                            <?php $practiceArr=json_decode( $theme_mods['custom_practice_info']);?>
                            <div class="bizzex-column vc one-third" style="">
                                <?php foreach ($practiceArr as $key => $val) :?>

                                    <div class="h-feature-headline icon_type_5 cf">
                                        <div class="icon_wrap" style="color:#555555 ">
                                            <span class="tc"></span>
                                            <span class="rc"></span>
                                            <span class="bc"></span>
                                            <span class="lc"></span>
                                            <i class="bizzex-icon-<?php echo $val->icon; ?>"></i>
                                        </div>
                                    </div>
                                    <h3 style="text-align: center;"><?php echo $val->tittle; ?></h3>
                                    <p style="text-align: center;"><?php echo $val->text; ?>
                                </p>

                                    <?php if (($key%2!=0)&&($key!=count($practiceArr)-1)): ?>
                                        </div>
                                        <div class="bizzex-column vc one-third" style="">
                                    <?php endif ?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="skills" class="bizzex-content-band vc bg-image man" style="background-image: url(<?php echo $theme_mods['bg_skill']; ?>); background-color: #ffffff; padding-top: 196px; padding-bottom: 196px;">
                <div class="bizzex-container-fluid max width">
                    <div class="bizzex-column vc whole" style="">
                        <div id="bizzex-content-band-6" class="bizzex-content-band vc" style="background-color: transparent;">

                            <?php 
                                $skillsJson=json_decode( $theme_mods['custom_skills']);
                                $speed=$skillsJson->speed;
                                $data=$skillsJson->data;

                             ?>
                             <?php foreach ($data as $k => $v): ?>
                            <div class="bizzex-column vc one-fourth" style="">
                                <div id="counter-<?php echo $k; ?>" class="counter-bar" style="color:#2f383d">
                                    <span class="counter-value" style="color:#2f383d"><?php echo $v->counter;?></span>
                                    <span class="num_suffix">+</span>
                                </div>
                                <script>
                                jQuery(document).ready(function($) {
                                    var $this = $("#counter-<?php echo $k; ?>");
                                    $this.waypoint(function() {
                                        $("#counter-<?php echo $k; ?> .counter-value").countTo({
                                            from: 0,
                                            to: <?php echo $v->counter;?>,
                                            speed: <?php echo $speed; ?>,
                                            refreshInterval: 5
                                        });
                                        this.destroy();
                                    }, {
                                        offset: "bottom-in-view"
                                    });
                                });
                                </script>
                                <h3 style="text-align: center;"><?php echo $v->tittle; ?></h3>
                            </div>
                                 
                             <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <script>
            if (jQuery('html').hasClass('ie8')) {
                jQuery('#bizzex-content-band-5').backstretch('<?php echo $theme_mods['bg_skill']; ?>');
            }
            </script>
            <div id="approach" class="bizzex-content-band vc man" style="background-color: #ffffff; padding-top: 96px; padding-bottom: 96px; border-top:1px solid #c6d6e0;">
                <div class="bizzex-container-fluid max width">
                    <div class="bizzex-column vc whole" style="">
                        <h1 style="text-align: center;">
                            <span style="color: #3e3e3e;">OUR APPROACH<br>
</span></h1>
                        <p style="text-align: center;">
                            <span style="color: #949494;">Creativity Is The Language Of Success. Kitchen Is Its Grammar.</span>
                            <br>
                            <span style="color: #949494;">tempor incididunt ut labore et dolore magna aliqua. </span>
                        </p>
                        <p style="text-align: center;">
                            <span class="bizzex-divider"></span>
                        </p>
                        <hr class="bizzex-gap" style="margin: 5em 0 0 0;">
                        <div id="bizzex-content-band-8" class="bizzex-content-band vc" style="background-color: transparent;">
                            <div class="bizzex-column vc one-half animate-in-from-left " style="" data-fade="true">
                                <?php $approachApproach=json_decode($theme_mods['custom_approach']);?>
                                <div id="whatido" class="bizzex-accordion">
                                    <?php $t=1;?>
                                    <?php foreach ($approachApproach->whatido as $key => $value): ?>
                                        <div class="bizzex-accordion-group">
                                            <h3 class="bizzex-accordion-heading">
                                                <a class="bizzex-accordion-toggle <?php echo ($value->collapse=='false') ? 'collapsed' : '' ; ?>" data-toggle="collapse" data-parent="#whatido" href="#collapse-<?php echo $t;?>">
                                                    <?php echo $value->tittle;?>
                                                    <span class="rhomb"></span>
                                                    <span class="rcross"></span>
                                                </a>
                                            </h3>
                                            <!-- end .bizzex-accordion-heading -->
                                            <div id="collapse-<?php echo $t;?>" class="accordion-body collapse <?php echo ($value->collapse=='true') ? 'in' : '' ; ?>">
                                                <div class="bizzex-accordion-inner">
                                                    <p><?php echo $value->content;?>
                                                </p>
                                                </div>
                                                <!-- end .bizzex-accordion-inner -->
                                            </div>
                                            <!-- end .bizzex-accordion-body -->
                                        </div>
                                        <?php $t++; ?>
                                    <?php endforeach ?>
                                </div>
                            </div>



                            <div class="bizzex-column vc one-half animate-in-from-right " style="" data-fade="true">
                                <div id="app" class="bizzex-accordion">
                                    <?php foreach ($approachApproach->app as $key => $value): ?>
                                        <div class="bizzex-accordion-group">
                                            <h3 class="bizzex-accordion-heading">
                                                <a class="bizzex-accordion-toggle <?php echo ($value->collapse=='false') ? 'collapsed' : '' ; ?>" data-toggle="collapse" data-parent="#app" href="#collapse-<?php echo $t;?>">
                                                    <?php echo $value->tittle;?>
                                                    <span class="rhomb"></span>
                                                    <span class="rcross"></span>
                                                </a>
                                            </h3>
                                            <!-- end .bizzex-accordion-heading -->
                                            <div id="collapse-<?php echo $t;?>" class="accordion-body collapse <?php echo ($value->collapse=='true') ? 'in' : '' ; ?>">
                                                <div class="bizzex-accordion-inner">
                                                    <p><?php echo $value->content;?>
                                                </p>
                                                </div>
                                                <!-- end .bizzex-accordion-inner -->
                                            </div>
                                            <!-- end .bizzex-accordion-body -->
                                        </div>
                                        <?php $t++; ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="clients" class="bizzex-content-band vc bg-image parallax man" style="background-image: url(<?php echo $theme_mods['bg_client']; ?>); background-color: #ffffff; padding-top: 96px; padding-bottom: 96px; border-top:1px solid #c6d6e0;">
                <div class="bizzex-column vc whole" style="">
                    <h1 style="text-align: center;">
                    <span style="color: #3e3e3e;">
                        <span style="color: #393939;">
                            <?php echo $theme_mods['client_h1']; ?>
                        </span><br>
                    </span></h1>
                    <p style="text-align: center;">
                        <span style="color: #c0c0c0;">
                        <?php echo $theme_mods['client_description']; ?>
                        </span>
                        <br>
                        <span style="color: #c0c0c0;">tempor incididunt ut labore et dolore magna aliqua. </span>
                    </p>
                    <p style="text-align: center;">
                        <span class="bizzex-divider"></span>
                    </p>
                    <hr class="bizzex-gap" style="margin: 3em 0 0 0;">
                    <div id="bizzex-content-band-10" class="bizzex-content-band vc man" style="background-color: transparent; padding-top: 0px; padding-bottom: 0px;">
                        <div class="bizzex-container-fluid max width">
                            <div class="bizzex-column vc whole" style="">
                                <div class="bizzex-slider-shortcode-container bizzex-slider-shortcode-container">
                                    <div class="bizzex-slider bizzex-slider-shortcode bizzex-slider-shortcode-1 ">
                                        <?php foreach (json_decode($theme_mods['list_clients']) as  $val):?>
                                          <div class="bizzex-slide">
                                            <p>
                                                <img class="aligncenter size-full wp-image-44" src="<?php echo $val;?>">
                                            </p>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <script>
                                    jQuery(window).load(function() {
                                        jQuery('.bizzex-slider-shortcode-1').slick({
                                            fade: false,
                                            dots: false,
                                            arrows: false,
                                            autoplaySpeed: 5000,
                                            speed: 650,
                                            autoplay: true,
                                            slidesToShow: 5,
                                            slidesToScroll: 1,
                                            adaptiveHeight: true,
                                            responsive: true
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color:#e7e7e7;margin-bottom:4em;" class="bizzex-hr" />
                    <div id="bizzex-content-band-11" class="bizzex-content-band vc" style="background-color: transparent;">
                        <div class="bizzex-column vc whole" style="">
                            <div class="bizzex-slider-shortcode-container bizzex-slider-shortcode-container">
                                <div class="bizzex-slider bizzex-slider-shortcode bizzex-slider-shortcode-2">
                                    <div class="bizzex-slide">
                                        <img class="size-full wp-image-106 aligncenter" src="http://themes.smartythemes.com/bizzex/davidbrown/wp-content/uploads/sites/2/2016/01/bigstock-Young-handsome-man-looking-tho-28364042.png" alt="bigstock-Young-handsome-man-looking-tho-28364042" width="110" height="110" /></p>
                                        <h4 style="text-align: center; margin-bottom: 0.25em;">PETER SPENCER</h4>
                                        <p style="text-align: center;">Web Designer</p>
                                        <p style="text-align: center; font-size: 18px;">
                                            <em>“Thank you for all your help and assistance over the years with our products. I would have no hesitation<br />in recommending you to my clients.”</em>
                                        </p>
                                    </div>
                                    <div class="bizzex-slide">
                                        <img class="size-full wp-image-106 aligncenter" src="http://themes.smartythemes.com/bizzex/davidbrown/wp-content/uploads/sites/2/2016/01/bigstock-Young-handsome-man-looking-tho-28364042.png" alt="bigstock-Young-handsome-man-looking-tho-28364042" width="110" height="110" /></p>
                                        <h4 style="text-align: center; margin-bottom: 0.25em;">PETER SPENCER</h4>
                                        <p style="text-align: center;">Web Designer</p>
                                        <p style="text-align: center; font-size: 18px;">
                                            <em>“Thank you for all your help and assistance over the years with our products. I would have no hesitation<br />in recommending you to my clients.”</em>
                                        </p>
                                    </div>
                                    <div class="bizzex-slide">
                                        <img class="size-full wp-image-106 aligncenter" src="http://themes.smartythemes.com/bizzex/davidbrown/wp-content/uploads/sites/2/2016/01/bigstock-Young-handsome-man-looking-tho-28364042.png" alt="bigstock-Young-handsome-man-looking-tho-28364042" width="110" height="110" /></p>
                                        <h4 style="text-align: center; margin-bottom: 0.25em;">PETER SPENCER</h4>
                                        <p style="text-align: center;">Web Designer</p>
                                        <p style="text-align: center; font-size: 18px;">
                                            <em>“Thank you for all your help and assistance over the years with our products. I would have no hesitation<br />in recommending you to my clients.”</em>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <script>
                                jQuery(window).load(function() {
                                    jQuery('.bizzex-slider-shortcode-2').slick({
                                        fade: false,
                                        dots: true,
                                        arrows: false,
                                        autoplaySpeed: 5000,
                                        speed: 650,
                                        autoplay: true,
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        adaptiveHeight: true,
                                        responsive: true
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            if (jQuery('html').hasClass('ie8')) {
                jQuery('#bizzex-content-band-9').backstretch('http://themes.smartythemes.com/bizzex/lawyer/wp-content/uploads/sites/7/2016/01/bg3.jpg');
            }
            </script>
            <div id="blog" class="bizzex-content-band vc man" style="background-color: #f2f2f2; padding-top: 96px; padding-bottom: 96px;">
                <div class="bizzex-column vc whole" style="">
                    <h1 style="text-align: center;">
                        <span style="color: #3e3e3e;">
                            <span style="color: #3e3e3e;">
                            <?php echo $theme_mods['content_h1']; ?>
                        </span>
                        <br>
                        </span>
                    </h1>
                    <p style="text-align: center;">
                        <span style="color: #949494;">
                            <?php echo $theme_mods['content_description']; ?>
                        </span>
                        <br>
                        <span style="color: #949494;">tempor incididunt ut labore et dolore magna aliqua. </span>
                    </p>
                    <p style="text-align: center;"><span class="bizzex-divider"></span>
                </p>
                    <hr class="bizzex-gap" style="margin: 3em 0 0 0;">
                    <div id="bizzex-content-band-13" class="bizzex-content-band vc man" style="background-color: transparent; padding-top: 0px; padding-bottom: 0px;">
                        <div class="bizzex-container-fluid max width">
                            <div class="bizzex-column vc whole" style="">
                                <div class="recent-posts-wrapper">
                                    <div id="post-slider-1" class="bizzex-recent post-slider slick-initialized slick-slider">
                                        <div aria-live="polite" class="slick-list draggable" tabindex="0">
                                            <div class="slick-track" style="opacity: 1; width: 1197px; transform: translate3d(0px, 0px, 0px);">
                                            </script>
                                                <?php 

                                                    $contentArr=json_decode($theme_mods['custom_show_post']);
                                                    // the query
                                                    $args = array(
                                                        'orderby' => $contentArr->order_by,
                                                        'order'   => $contentArr->order,
                                                        'post__in' =>$contentArr->multiple,
                                                        'posts_per_page' => $contentArr->total_post
                                                    );
                                                    $total=1;
                                                    wp_reset_query();
                                                    $the_query = new WP_Query( $args ); ?>
                                                    <?php if ( $the_query->have_posts() ) : ?>
                                                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                                <div id="post-<?php the_ID(); ?>" <?php post_class('bizzex-post-article slick-slide animate-in-from-bottom slick-active ' ); ?> data-slick-index="<?php echo $total-1;?>" aria-hidden="false" style="width: 399px;">
                                                    <div class="entry-featured">
                                                        <a class="entry-thumb" href="<?php the_permalink(); ?>" title="Permalink to: &quot;<?php the_title(); ?>&quot;">
                                                            <img src="<?php echo the_post_thumbnail_url('600,400'); ?>" alt="">
                                                        </a>
                                                        <div class="entry-wrap">
                                                            <header class="entry-header">
                                                                <h3 class="h-recent-posts"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                                <p class="p-meta">
                                                                <span class="related-date">
                                                                <time class="entry-date" datetime="<?php echo get_the_date('c'); ?>">
                                                                <i class="bizzex-icon-clock-1"></i><?php 
                                                                    $df=get_option('date_format');
                                                                    echo get_the_date($df,'','');
                                                                  ?>
                                                                </time>
                                                                <span>&nbsp;by 
                                                                    <span class="bizzex-post-author"><?php the_author(); ?></span>
                                                                </span>
                                                                </span>
                                                                </p>
                                                            </header>
                                                            <div class="entry-content excerpt">
                                                                <p><?php $content=''; ?>
                                                                    <?php $content= get_the_content(); ?>
                                                                    <?php 
                                                                        $content=fill__content($content); 
                                                                        echo $content=wp_trim_words($content,40,' ');
                                                                    ?>
                                                                </p>
                                                                <a href="<?php the_permalink(); ?>" class="button bizzex-btn bizzex-btn-inverse">Read More</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <?php if ($total==$contentArr->total_post)
                                                            break;
                                                        else
                                                            $total++;
                                                        ?>
                                                    <?php endwhile; ?>
                                                    <?php wp_reset_postdata(); // reset the query  ?>
                                                <?php else : ?>
                                                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?>
                                                </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                jQuery(document).ready(function($) {
                                    jQuery("#post-slider-1").slick({
                                        arrows: true,
                                        slidesToShow: 3,
                                        dots: false,
                                        responsive: [{
                                            breakpoint: 979,
                                            settings: {
                                                slidesToShow: 1,
                                                slidesToScroll: 1
                                            }
                                        }]
                                    });
                                    jQuery("#post-slider-1 .post").each(function(i) {
                                        var $this = jQuery(this);
                                        $this.waypoint(function() {
                                            setTimeout(function() {
                                                $this.addClass("animated")
                                            }, i * 300);
                                        }, {
                                            offset: "65%"
                                        });
                                    });
                                    jQuery(window)   .resize(function(event) {
                                        
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                    <hr class="bizzex-gap" style="margin: 2em 0 0 0;">
                    <p style="text-align: center;">
                        <a class="bizzex-design-btn" style="background-color:;" 
                                href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" 
                                title="Title" target="_blank">
                            <span class="top-trian"></span>
                            <span class="bot-trian"></span>
                        </a>
                    </p>
                </div>
            </div>
            <div id="contacts" class="bizzex-content-band vc man" style="background-color: #ffffff; padding-top: 96px; padding-bottom: 96px; border-top:1px solid #c6d6e0;">
                <div class="bizzex-column vc whole" style="">
                    <h1 style="text-align: center;">
                        <span style="color: #3e3e3e;"><?php echo $theme_mods['contact_h1']; ?></span>
                    </h1>
                    <p style="text-align: center;"><span style="color: #949494;"><?php echo $theme_mods['contact_description'] ?></span>
                        <br>
                        <span style="color: #949494;"> tempor incididunt ut labore et dolore magna aliqua. </span>
                    </p>
                    <p style="text-align: center;">
                        <span class="bizzex-divider"></span>
                    </p>
                    <hr class="bizzex-gap" style="margin: 3em 0 0 0;">
                    <div id="bizzex-content-band-15" class="bizzex-content-band vc man" style="background-color: transparent; padding-top: 0px; padding-bottom: 0px;">
                        <div class="bizzex-container-fluid max width">
                            <div class="bizzex-column vc one-third animate-in-from-left" style="padding-left:60px;" data-fade="true">
                                <?php 
                                    $listContact=json_decode($theme_mods['icon_contact']);
                                    foreach ($listContact as  $value) {
                                        ?>
                                        <hr class="bizzex-clear">
                                            <span class="bizzex-icon-style" style="font-size:;color:;">
                                                <i class="bizzex-icon  bizzex-icon-<?php echo $value->input_icon;?>" style="color: #aeaeae;float: left;font-size: 34px;margin-bottom: 1em;margin-right: 20px;position:relative;top: 5px;"></i>
                                            </span>
                                        <h3><?php echo $value->input_label;;?></h3>
                                        <p><?php echo $value->input_text;?>
                                    </p>
                                        <p>
                                    </p>
                                <?php 
                                    }
                                 ?>
                            </div>
                            <div class="bizzex-column vc two-thirds animate-in-from-right" style="" data-fade="true">
                                <?php  
                                    if (shortcode_exists('contact-form-7' )&& has_shortcode( $theme_mods['shortcode_contact_form'], 'contact-form-7' ) ) {
                                        echo do_shortcode($theme_mods['shortcode_contact_form']);
                                    }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .entry-content -->
        <span class="visually-hidden"><span class="author vcard"><span class="fn">Peter Spence</span></span><span class="entry-title">Home</span>
        <time class="entry-date updated" datetime="2016-01-20T14:54:53+02:00">01.20.2016</time>
        </span>
    </article>
    <!-- end .hentry -->
</div>

<?php get_footer(); ?>
