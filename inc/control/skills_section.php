<?php 
/**
* 
*/
class Skills
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_skills_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
		
	}
	function customize_skills_register($wp_customize){
		$panelID='skills_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Skills Group',
		    'description'    => 'Panel Clients Customize Description',
		) );
    	$sectionID='skills_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Skills Customize', 'themename'),
	        'description' => 'Skills Customize Description',
	        'priority' => 1,
	         'panel'  => $panelID,
	    ));
    	$sectionID2='skills_customize2';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Background setting', 'themename'),
	        'description' => 'Skills Customize Description',
	        'priority' => 3,
	        'panel'  => $panelID,
	    ));
    	$sectionID3='skills_customize3';
	    $wp_customize->add_section($sectionID3, array(
	        'title'    => __('# Skills setting', 'themename'),
	        'description' => 'Skills Customize Description',
	        'priority' => 2,
	        'panel'  => $panelID,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options_skill_h1';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'practice areas',
	        'transport'		 =>'postMessage',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control('lawyer_theme_options_skillv_h1', array(
	        'label'      => __('pracetice area', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingsID,
	    ));
        // WP_Customize_Image_Control
        $settingID='lawyer_theme_options[bg_skill]';
        $wp_customize->add_setting( $settingID, array(
            'default'        => '',
	        'capability'     => 'edit_theme_options',
	        'transport'		=>'refresh',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $settingID, array(
            'label'   => 'Background',
            'section' => $sectionID2,
            'settings'   =>$settingID,
            'priority' => 8
        ) ) );



        // Add a  control
        require_once CLASS_DIR . 'custom_skills.php';
        $settingsID='lawyer_theme_options[custom_skills]';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									(object)array(	
											"speed"=>1500,
											"data"=>array(
													(object)array(
															"num_prefix" => "" ,
															"counter-value" => "470",
															"num_suffix" => "+",
															"tittle"=>"TRUSTED CLIENTS"
															 ),
													(object)array(
															"num_prefix" => "$" ,
															"counter-value" => "950",
															"num_suffix" => "K",
															"tittle"=>"TRUSTED CLIENTS"
															 ),
													(object)array(
															"num_prefix" => "" ,
															"counter-value" => "95",
															"num_suffix" => "%",
															"tittle"=>"TRUSTED CLIENTS"
															 ),
													(object)array(
															"num_prefix" => "" ,
															"counter-value" => "760",
															"num_suffix" => "+",
															"tittle"=>"TRUSTED CLIENTS"
															 ),

												)
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new Skills_Custom_Control( $wp_customize, $settingsID, array(
            'label'  	 => 'Custom Skills Info',
            'section'    => $sectionID3,
            'settings'   => $settingsID,
            // 'priority' => 5
        ) ) );
	}
}
/*----------  end class  ----------*/



 ?>