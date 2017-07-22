<?php 
/**
* 
*/
class Clients
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_clients_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
		
	}
	function customize_clients_register($wp_customize){
		$panelID='clients_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Clients Group',
		    'description'    => 'Panel Clients Customize Description',
		) );
    	$sectionID='clients_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Clients Customize', 'themename'),
	        'description' => 'Clients Customize Description',
	        'priority' => 5,
	        'panel'  => $panelID,
	    ));
	 
    	$sectionID2='clients_customize2';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Clients Background setting', 'themename'),
	        'description' => 'Clients Customize Description',
	        'priority' => 5,
	        'panel'  => $panelID,
	    ));
    	$sectionID3='clients_customize3';
	    $wp_customize->add_section($sectionID3, array(
	        'title'    => __('# Clients Slides setting', 'themename'),
	        'description' => 'Clients Customize Description',
	        'priority' => 5,
	        'panel'  => $panelID,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingID='lawyer_theme_options[client_h1]';
	    $wp_customize->add_setting($settingID, array(
	        'default'        => 'Client',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingID, array(
	        'label'      => __('Client title', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingID,
	    ));

	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingID='lawyer_theme_options[clients_description]';
	    $wp_customize->add_setting($settingID, array(
	        'default'        => 'Creativity Is The Language Of Success. Kitchen Is Its Grammar.',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingID, array(
	        'label'      => __('Description', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingID,
	        'type'		=>'textarea'
	    ));

        // WP_Customize_Image_Control
        $settingID='lawyer_theme_options[bg_client]';
        $wp_customize->add_setting( $settingID, array(
            'default'        => '',
	        'capability'     => 'edit_theme_options',
	        'transport'		=>'refresh',
	        'type'           => 'theme_mod',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $settingID, array(
            'label'   => 'Image background Setting',
            'section' => $sectionID2,
            'settings'   =>$settingID,
            'priority' => 8
        ) ) );

        require_once CLASS_DIR . 'custom_clients.php';
                // WP_Customize_Image_Control
        $settingID='lawyer_theme_options[list_clients]';
        $wp_customize->add_setting( $settingID, array(
            'default'        => '["http://localhost/test/lawyer/wp-content/uploads/2016/07/1.png","http://localhost/test/lawyer/wp-content/uploads/2016/07/2.png","http://localhost/test/lawyer/wp-content/uploads/2016/07/3.png","http://localhost/test/lawyer/wp-content/uploads/2016/07/4.png","http://localhost/test/lawyer/wp-content/uploads/2016/07/5.png"]',
        ) );


        $wp_customize->add_control( 
        		new Clients_Custom_Control( 
        			$wp_customize, 
        			$settingID, 
        			array(
			            'label'  	 => 'Custom Practice Info',
			            'section'    => $sectionID3,
			            'settings'   => $settingID,
        				// 'priority' => 5
        			) 
    			) 
    		);


	}


}
/*----------  end class  ----------*/



 ?>