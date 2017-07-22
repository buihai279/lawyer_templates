<?php 
/**
* 
*/
class Footer
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_footer_register'));
	}
	function customize_footer_register($wp_customize){
		$panelID='footer_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    // 'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Footer Group',
		    'description'    => 'Panel Footer Customize Description',
		) );
    	$sectionID='footer_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Footer Customize', 'themename'),
	        'description' => 'Footer Customize Description',
	        // 'priority' => 10,
	        'panel'  => $panelID,
	    ));
    	$sectionID2='footer_customize_icon';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Icon setting', 'themename'),
	        'description' => 'Footer Customize Description',
	        // 'priority' => 10,
	        'panel'  => $panelID,
	    ));
	    //  =============================
	    //  = Textarea Input             =
	    //  =============================
	    $settingsID="lawyer_theme_options[footer_copyright]";
	    $df='Copyright © 2016 - designed by <a href="http://themeforest.net/user/smarty-themes/portfolio">Smarty Themes</a>';
        require_once CLASS_DIR . 'copyright_footer.php';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => $df,
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control(new Copyright_Custom_Control( $wp_customize, $settingsID, array(
            'label'   => 'Copryright',
            'section'    => $sectionID,
            'settings'   => $settingsID,
            'priority' => 5
        ) ));

        // Add a post dropdown control
        require_once CLASS_DIR . 'social_footer.php';
        $settingsID='lawyer_theme_options[social_footer]';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									array( 
											(object)array(
													"icon" => "facebook" ,
													"title" => "Facebook",
													"link" => "#"
													 ),
											(object)array(
													"icon" => "twitter" ,
													"title" => "Twitter",
													"link" => "#"
													 ),
											(object)array(
													"icon" => "google-plus" ,
													"title" => "Google+",
													"link" => "#"
													 ),
											(object)array(
													"icon" => "vimeo" ,
													"title" => "Vimeo",
													"link" => "#"
													 ),
											(object)array(
													"icon" => "instagram" ,
													"title" => "Instagram",
													"link" => "#"
													 ),
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	        // 'sanitize_callback'=>''
        ) );
        $wp_customize->add_control( new Social_Footer_Customize( $wp_customize, $settingsID, array(
            // 'label'   => 'Post Dropdown Setting',
            'section'    => $sectionID2,
            'settings'   => $settingsID,
            // 'priority' => 5
        ) ) );



	}
}
/*----------  end class  ----------*/



 ?>