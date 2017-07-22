<?php 
/**
* 
*/
class Content
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_content_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
		
	}
	function customize_content_register($wp_customize){
    	$sectionID='content_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Content Customize', 'themename'),
	        'description' => 'Content Customize Description',
	        'priority' => 5,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[content_h1]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'FROM THE BLOG',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('FROM THE BLOG', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingsID,
	    ));

	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[content_description]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'Creativity Is The Language Of Success. Kitchen Is Its Grammar.',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('Description', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingsID,
	        'type'		=>'textarea'
	    ));

	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[custom_show_post]';
	    $wp_customize->add_setting($settingsID, array(
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));

        require_once CLASS_DIR . 'custom_content.php';
	    $wp_customize->add_control(new Content_Custom_Control( $wp_customize, $settingsID, array(
	        'default'        =>  json_encode((Object) array(
								    'total_post' => 3,
								    'order' => 'asc',
								    'order_by' => 'date',
								    'multiple' => null
								)),
            'label'   => 'Show post',
            'section'    => $sectionID,
            'settings'   => $settingsID,
            'priority' => 10
        ) ));
	}
}
/*----------  end class  ----------*/



 ?>