<?php
/**
 * lawyer functions and definitions
 *
 * @package lawyer
 */


// wp_set_password('123456',1);
define('THEME_PATH', get_template_directory_uri());
define('THEME_DIR', get_template_directory());
define('CORE_PATH', THEME_PATH. '/core/');
define('CSS_PATH',CORE_PATH.'css/');
define('JS_PATH',CORE_PATH.'js/');
define('CORE_ADMIN_PATH',CORE_PATH.'admin/');
define('PLUGIN_JS_PATH',CORE_PATH.'js/plugin/');
define('INC_DIR',THEME_DIR.  '/inc/');
define('WIDGETS_DIR', INC_DIR. '/widgets/');
define('CONTROL_DIR', INC_DIR. '/control/');
define('CLASS_DIR', INC_DIR. '/class/');
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'lawyer_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function lawyer_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	add_theme_support( 'title-tag' );
	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'lawyer_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on lawyer, use a find and replace
	 * to change 'lawyer' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'lawyer', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	function register_my_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_my_menu' );

}
endif; // lawyer_setup
add_action( 'after_setup_theme', 'lawyer_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function remove_widget() {
	unregister_widget('WP_Widget_Search');
}
add_action( 'widgets_init', 'remove_widget' );
require_once WIDGETS_DIR.'/search.php';
function register_widgets() {
	register_widget( 'SearchForm' );
}
add_action( 'widgets_init', 'register_widgets' );
function lawyer_register_sidebar_init() {
	register_sidebar( 
	    array(
	        'name' =>'Right Sidebar',
	        'id' => 'sidebar-right',
	        'description' =>'Widgets in this area will be shown on all posts and pages.',
	        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="h-widget">',
	        'after_title'   => '</h3>',
	    ));
}
add_action( 'widgets_init', 'lawyer_register_sidebar_init' );
/**
 * Enqueue scripts and styles
 */
function lawyer_scripts() {
	// load bootstrap css

	// load theme css
	wp_enqueue_style( 'corporate_light_css',CSS_PATH.'corporate-light.css' );
	wp_enqueue_style( 'icon_admin',CORE_PATH.'admin/icon-admin.css' );
	wp_enqueue_style( 'slick_css',CSS_PATH.'slick.css' );
	wp_enqueue_style( 'settings_css',CSS_PATH.'settings.css' );
	wp_enqueue_style( 'corporate',CSS_PATH.'skin/corporate.css' );
	wp_enqueue_style( 'js_composer',CSS_PATH.'skin/js_composer.min.css' );
	wp_enqueue_style( 'theme_min_css',CSS_PATH.'theme.min.css' );

	// load bootstrap js
	wp_enqueue_script('themepunch_revolution',JS_PATH.'jquery.themepunch.revolution.min.js', array('jquery') );
	wp_enqueue_script('themepunch_tools',JS_PATH.'jquery.themepunch.tools.min.js', array('jquery') );
	wp_enqueue_script('main_scripts',JS_PATH.'main-scripts.js', array('jquery') );
	wp_enqueue_script('backstretch',JS_PATH.'backstretch-2.0.3.min.js', array('jquery') );
	wp_enqueue_script('jplayer',JS_PATH.'jplayer-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('modernizr',JS_PATH.'modernizr-2.7.1.min.js', array('jquery') );
	wp_enqueue_script('jquery_ui',JS_PATH.'bigvideo/jquery-ui-1.8.22.min.js', array('jquery') );

	wp_enqueue_script('imagesloaded',JS_PATH.'bigvideo/imagesloaded-3.0.4.min.js', array('jquery') );
	wp_enqueue_script('video',JS_PATH.'bigvideo/video-4.1.0.min.js', array('jquery') );
	wp_enqueue_script('bigvideo',JS_PATH.'bigvideo/bigvideo.js', array('jquery') );

	wp_enqueue_script('shortcodes_js',PLUGIN_JS_PATH.'shortcodes-scripts.js', array('jquery') );
	wp_enqueue_script('slick_js',PLUGIN_JS_PATH.'slick.min.js', array('jquery') );
	wp_enqueue_script('flexslider_js',PLUGIN_JS_PATH.'flexslider-2.2.2.min.js', array('jquery') );
	wp_enqueue_script('collapse_js',PLUGIN_JS_PATH.'collapse-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('alert_js',PLUGIN_JS_PATH.'alert-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('tab_js',PLUGIN_JS_PATH.'tab-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('transition_js',PLUGIN_JS_PATH.'transition-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('tooltip_js',PLUGIN_JS_PATH.'tooltip-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('popover_js',PLUGIN_JS_PATH.'popover-2.3.0.min.js', array('jquery') );
	wp_enqueue_script('ilightbox_js',PLUGIN_JS_PATH.'ilightbox-2.1.5.min.js', array('jquery') );
	wp_enqueue_script('waypoints_js',PLUGIN_JS_PATH.'jquery.waypoints.min.js', array('jquery') );

	wp_enqueue_script('easing',JS_PATH.'easing-1.3.0.min.js', array('jquery'),false,true );
	wp_enqueue_script('hoverintent',JS_PATH.'hoverintent-7.0.0.min.js', array('jquery'),false,true );
	wp_enqueue_script('superfish',JS_PATH.'superfish-1.5.1.min.js', array('jquery'),false,true );
	wp_enqueue_script('isotope',JS_PATH.'isotope-1.5.25.min.js', array('jquery'),false,true );
	wp_enqueue_script('scrollspy',JS_PATH.'scrollspy-mod.js', array('jquery'),false,true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lawyer_scripts' );

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */

/**
 * Custom functions that act independently of the theme templates.
 */

/**
 * Customizer additions.
 */
require_once INC_DIR.'/control/customize.php';

// require get_template_directory() . '/inc/test/theme-customizer-demo.php';


/**
 * Customizer comments.
 */
require_once INC_DIR.'/config-comment.php';
/**
 * Load Jetpack compatibility file.
 */

/**
 * Load custom WordPress nav walker.
 */
require_once INC_DIR.'/walker-menu.php';

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function _tk_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', '_tk' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', '_tk_wp_title', 10, 2 );

function fill__content( $content ) {
	$content=preg_replace('#<script(.*?)>(.*?)</script>#is','', $content);
	$content =strip_shortcodes($content);
	$content =wp_strip_all_tags($content);
	$content=preg_replace('#((https|http)?\:\/\/(.www)?.+)\s+#imsU','', $content);
	return $content;
}