<?php 

/**
* 
*/
class Practice
{
	
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_practice_register'));
	}
	function customize_practice_register($wp_customize){
		$panelID='practice_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    'priority'       => 3,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Practice Group',
		    'description'    => 'Panel Practice Customize Description',
		) );
    	$sectionID='practice_customize1';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Practice Customize', 'themename'),
	        'description' => 'Practice Customize Description',
	        'priority' => 1,
	        'panel'  => $panelID,
	    ));
    	$sectionID2='practice_customize2';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Practice Seting Icon', 'themename'),
	        'description' => 'Practice Customize Description',
	        'priority' => 3,
	        'panel'  => $panelID,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $wp_customize->add_setting('lawyer_theme_options[practice_areas]', array(
	        'default'        => 'practice areas',
	        // 'transport'		=>'postMessage',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	 
	    $wp_customize->add_control('lawyer_customize_welcome_h1', array(
	        'label'      => __('PRACTICE AREAS', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => 'lawyer_theme_options[practice_areas]',
	    ));

	     // ===================================
	     // = Text Input Overview Experience  =
	     // ===================================
	    $practice_description1='Creativity Is The Language Of Success. Kitchen Is Its Grammar.';
	    $wp_customize->add_setting('lawyer_theme_options[practice_description1]', array(
	        'default'        => $practice_description1,
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control('lawyer_customize_practice_description1', array(
	        'label'      => __('Practice Description', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => 'lawyer_theme_options[practice_description1]',
	        'type'       => 'textarea',
	    ));
	 

        // Add a  control
        require_once CLASS_DIR . 'custom_practice.php';
        $settingsID='lawyer_theme_options[custom_practice_info]';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									array( 
											(object)array(
													"icon" => "familiar" ,
													"tittle" => "CHILD ABUSE",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
											(object)array(
													"icon" => "cup-1" ,
													"tittle" => "EDUCATION DEFENCE",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
											(object)array(
													"icon" => "judge" ,
													"tittle" => "CRIMINAL DEFENCE",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
											(object)array(
													"icon" => "agreement2" ,
													"tittle" => "PROTECTION ORDERS",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
											(object)array(
													"icon" => "familiar2" ,
													"tittle" => "DOMESTIC VIOLENCE",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
											(object)array(
													"icon" => "vehicle23" ,
													"tittle" => "VEHICLE ACCIDENTS",
													"text" => "Nam nec tellus a odio tincidunt auctor rnare sed non mauris vitae erat rquent per conubia nostra, per inceptos himenaeos.",
													 ),
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new Practice_Custom_Control( $wp_customize, $settingsID, array(
            'label'  	 => 'Custom Practice Info',
            'section'    => $sectionID2,
            'settings'   => $settingsID,
            // 'priority' => 5
        ) ) );
	 
	}
}
 ?>