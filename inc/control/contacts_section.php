<?php 
/**
* 
*/
class Contacts
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_contacts_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
	}
	function customize_contacts_register($wp_customize){
		$panelID='contacts_panel';
	 	$wp_customize->add_panel( $panelID, array(
		    'priority'       => 1,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => '#Contacts Group',
		    'description'    => 'Panel Contacts Customize Description',
		) );
    	$sectionID1='contacts_section_info';
	    $wp_customize->add_section($sectionID1, array(
	        'title'    => __('# Contacts Customize', 'themename'),
	        'description' => 'Contacts Customize Description',
	        'priority' => 5,
	        'panel'  => $panelID,
	    ));
    	$sectionID2='contacts_section_icon';
	    $wp_customize->add_section($sectionID2, array(
	        'title'    => __('# Contacts Icon setting', 'themename'),
	        'description' => 'Contacts Customize Description',
	        'priority' => 5,
	        'active_callback' => 'is_front_page',
	        'panel'  => $panelID,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[contact_h1]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'CONTACTS',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('pracetice area', 'themename'),
	        'section'    => $sectionID1,
	        'settings'   => $settingsID,
	    ));

	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[contact_description]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'Creativity Is The Language Of Success. Kitchen Is Its Grammar.',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('pracetice area', 'themename'),
	        'section'    => $sectionID1,
	        'settings'   => $settingsID,
	        'type'		=>'textarea'
	    ));

	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options[shortcode_contact_form]';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => '',
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingsID, array(
	        'label'      => __('Shortcode', 'themename'),
	        'section'    => $sectionID1,
	        'settings'   => $settingsID,
	        'type'		=>'textarea'
	    ));


        // Add a post dropdown control
        require_once CLASS_DIR . 'icon_contact.php';
        $settingsID='lawyer_theme_options[icon_contact]';
        $wp_customize->add_setting( $settingsID, array(
            'default'        => json_encode(
									array( 
										(object)array(
												"input_icon" => "map" ,
												"input_label" => "ADDRESS",
												"input_text" => "Collins Street West Victoria<br>8007 Australia"
												 ), 
										(object)array(
												"input_icon" => "phone-2" ,
												"input_label" => "PHONE",
												"input_text" => "+01 (0) 12 3456 7890<br>+01 (0) 12 3456 7891"
												), 
										(object)array(
												"input_icon" => "mail-1" ,
												"input_label" => "MAIL",
												"input_text" => "info@smartythemes.com"
												)
										)
								),
	        'transport'		 =>'refresh',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	        'sanitize_callback'=>''
        ) );
        $wp_customize->add_control( new Icon_Contact_Customize( $wp_customize, $settingsID, array(
            'label'   => 'Post Dropdown Setting',
            'section'    => $sectionID2,
            'settings'   => $settingsID,
            'priority' => 5
        ) ) );


	}
}
/*----------  end class  ----------*/


 ?>