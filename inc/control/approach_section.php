<?php 
/**
* 
*/
class Approach
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_approach_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
		
	}
	function customize_approach_register($wp_customize){
		$panelID='approach_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    // 'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Approach Group',
		    'description'    => 'Panel Approach Customize Description',
		) );
    	$sectionID='approach_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# approach Customize', 'themename'),
	        'description' => 'approach Customize Description',
	        'priority' => 5,
	        'panel'  => $panelID,

	    ));
    	$sectionID2='approach_customize2';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('#  Approach Customize 2', 'themename'),
	        'description' => ' Approach Customize Description',
	        'priority' => 3,
	        'panel'  => $panelID,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[approach_h1]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'OUR APPROACH',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('OUR APPROACH', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingsID,
	    ));  
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[approach_description]';
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


        // Add a  control
        require_once CLASS_DIR . 'custom_approach.php';
        $settingsID='lawyer_theme_options[custom_approach]';
        $text='Design by Luís Rebelo de Andrade, Tiago Rebelo de Andrade Photography by Ricardo Oliveira Alves Designed by Luís Rebelo de Andrade and Tiago Rebelo de Andrade, Tree Snake Houses was recently awarded the Hospitality Architecture – Building of the Year award by ArchDaily. Design by Luís Rebelo de Andrade, Tiago Rebelo de Andrade Photography by Ricardo Oliveira Alves Designed by Luís Rebelo de Andrade and Tiago Rebelo de Andrade, Tree Snake Houses was recently awarded the Design by Luís Rebelo de Andrade.';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									(object)array(	
											"whatido"=>array(
													(object)array(
																"tittle" => "Html5 / css3" ,
																"content" => $text ,
																"collapse" => "true" ,
													),
													(object)array(
																"tittle" => "Html5 / css3" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Adobe Photoshop" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Adobe Photoshop" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Adobe Photoshop" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
												),
											"app"=>array(
													(object)array(
																"tittle" => "Wordpress" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Wordpress" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Wordpress" ,
																"content" => $text ,
																"collapse" => "true" ,
													),
													(object)array(
																"tittle" => "Wordpress" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
													(object)array(
																"tittle" => "Wordpress" ,
																"content" => $text ,
																"collapse" => "fasle" ,
													),
												)
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new Approach_Custom_Control( $wp_customize, $settingsID, array(
            'label'  	 => 'Custom Skills Info',
            'section'    => $sectionID2,
            'settings'   => $settingsID,
            // 'priority' => 5
        ) ) );
	}
}
/*----------  end class  ----------*/



 ?>