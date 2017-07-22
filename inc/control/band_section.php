<?php 
/**
* 
*/
class Band
{
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_band_register'));
		// add_action( 'customize_preview_init', array($this,'live_preview'));
		
	}
	function customize_band_register($wp_customize){
    	$sectionID='band_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Band Customize', 'themename'),
	        'description' => 'Band Customize Description',
	        'priority' => 5,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingsID='lawyer_theme_options_band_h1';
	    $wp_customize->add_setting($settingsID, array(
	        'default'        => 'practice areas',
	        'transport'		 =>'postMessage',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control('lawyer_theme_options_band_h1', array(
	        'label'      => __('pracetice area', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingsID,
	    ));
	}
}
/*----------  end class  ----------*/



 ?>