<?php 

/**
* 
*/
class Introduce
{
	
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_introduce_register'));
	}
	function customize_introduce_register($wp_customize){
		$panelID='introduce_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Introduce Group',
		    'description'    => 'Panel Introduce Customize Description',
		) );
    	$sectionID='introduce_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Introduce Customize', 'themename'),
	        'description' => 'Introduce Customize Description',
	        'priority' => 1,
    		'panel'  => $panelID,
	    ));
    	$sectionID2='introduce_background';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Background Introduce', 'themename'),
	        'description' => 'Introduce Customize Description',
	        'priority' => 4,
    		'panel'  => $panelID,
	    ));
    	$sectionID3='avatar';
	    $wp_customize->add_section($sectionID3, array(
	        'title'    => __('# Avatar', 'themename'),
	        'description' => 'Avatar',
	        'priority' => 3,
    		'panel'  => $panelID,
	    ));
    	$sectionID4='info';
	    $wp_customize->add_section($sectionID4, array(
	        'title'    => __('# Info custom', 'themename'),
	        'description' => 'Info custom description',
	        'priority' => 2,
    		'panel'  => $panelID,
	    ));
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $wp_customize->add_setting('lawyer_theme_options[name]', array(
	        'default'        => 'Noah Wilson',
	        'transport'		=>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	 
	    $wp_customize->add_control('lawyer_customize_name', array(
	        'label'      => __('Name', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => 'lawyer_theme_options[name]',
	    ));

	    //  ===================================
	    //  = Text Input Overview Experience  =
	    //  ===================================
	    $wp_customize->add_setting('lawyer_theme_options[overview_experience]', array(
	        'default'        => 'With over 20 years of experience practicing law',
	        'capability'     => 'edit_theme_options',
	        'transport'		=>'refresh',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control('lawyer_customize_overview_experience', array(
	        'label'      => __('Overview Experience', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => 'lawyer_theme_options[overview_experience]',
	        'type'       => 'textarea',
	    ));
	 
	    //  ===================================
	    //  = Text Input Introduce =
	    //  ===================================
	    $tmp_intro='Hello. Wedding tackle balderdash Northeners collywobbles I’d reet fancy a the lakes a tad well chuffed what a load of cobblers lug hole and thus Big Ben on the beat cheerio clock round the earhole air one’s dirty linen, twiglets daft cow working class stiff upper lip doing my nut in sod’s law driving a mini fork out pork scratchings jellied eels ear hole stew and dumps.';
	    $wp_customize->add_setting('lawyer_theme_options[introduce]', array(
	        'default'        => $tmp_intro,
	        'transport'		=>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control('lawyer_customize_introduce', array(
	        'label'      => __('Introduce', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => 'lawyer_theme_options[introduce]',
	        'type'       => 'textarea'
	    ));
	 

        // WP_Customize_Image_Control
        $settingID='lawyer_theme_options[bg_introduce]';
        $wp_customize->add_setting( $settingID, array(
            'default'        => '',
	        'capability'     => 'edit_theme_options',
	        'transport'		=>'refresh',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $settingID, array(
            'label'   => 'Image Setting',
            'section' => $sectionID2,
            'settings'   =>$settingID,
        ) ) );
        // WP_Customize_Image_Control
        $settingID='lawyer_theme_options[avatar_introduce]';
        $wp_customize->add_setting( $settingID, array(
            'default'        => '',
	        'capability'     => 'edit_theme_options',
	        'transport'		=>'refresh',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $settingID, array(
            'label'   => 'Image Setting',
            'section' => $sectionID3,
            'settings'   =>$settingID,
        ) ) );


	     // ===================================
	     // = Custom  =
	     // ===================================
	 
        // Add a post dropdown control
        require_once CLASS_DIR . 'custom_introduce.php';
        $settingsID='lawyer_theme_options[custom_introduce_info]';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									array( 
											(object)array(
													"label" => "Name" ,
													"value" => "Noah Wilson"
													 ),
											(object)array(
													"label" => "Date of birth" ,
													"value" => "14 February 1968"
													 ),
											(object)array(
													"label" => "Skype ID" ,
													"value" => "NoahWilson"
													 ),
											(object)array(
													"label" => "Address" ,
													"value" => " 23 High Hope Blvd., Some City, Some Country"
													 ),
											(object)array(
													"label" => "Phone" ,
													"value" => "(123) – 456-7890"
													 ),
											(object)array(
													"label" => "Email" ,
													"value" => "Noah.Wilson@gmail.com"
													 ),
											(object)array(
													"label" => "Website" ,
													"value" => '<a href="http://www.noahwilson.com" target="_blank">www.NoahWilson.com</a>'
													 ),
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new Introduce_Custom_Control( $wp_customize, $settingsID, array(
            'label'  	 => 'Info Setting',
            'section'    => $sectionID4,
            'settings'   => $settingsID,
            // 'priority' => 5
        ) ) );
	}
}
 ?>