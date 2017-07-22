<?php 

/**
* 
*/
class Welcome
{
	
	function __construct($theme_mods=array())
	{
		add_action('customize_register', array($this,'customize_welcome_register'));
	}
	function customize_welcome_register($wp_customize){
    	$sectionID='welcome_customize';
	    $wp_customize->add_section($sectionID, array(
	        'title'    => __('# Welcome Customize', 'themename'),
	        'description' => 'Welcome Customize Description',
	        'priority' => 2,
	    ));
	 
	    //  =============================
	    //  = Text Input  Name           =
	    //  =============================
	    $settingID='lawyer_theme_options[welcome_h1]';
	    $wp_customize->add_setting($settingID, array(
	        'default'        => 'welcome',
	        'transport'		=>'postMessage',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	 
	    $wp_customize->add_control($settingID, array(
	        'label'      => __('Text welcome', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingID,
	    ));

	     // ===================================
	     // = Text Input Overview Experience  =
	     // ===================================
	    $content_welcome='Do or do not. There is no try. Nothing comes from doing nothing. Do not tell me this a difficult problem. If it were not difficult it would not be a problem. Eliminate something superfluous from your life. Break a habit. Do something that makes you feel insecure. Carry out an action with complete attention and intensity as if it were your last Do not play for safety; it is the most dangerous thing in the world. In the long run, men hit only what they aim at. Therefore, they had better aim at something high. If you have a lemon, make lemonade. To avoid criticism, do nothing, say nothing, be nothing.';
	    $settingID='lawyer_theme_options[content_welcome]';
	    $wp_customize->add_setting($settingID, array(
	        'default'        => $content_welcome,
	        'capability'     => 'edit_theme_options',
	        'type'           => 'theme_mod',
	    ));
	    $wp_customize->add_control($settingID, array(
	        'label'      => __('Content welcome', 'themename'),
	        'section'    => $sectionID,
	        'settings'   => $settingID,
	        'type'       => 'textarea',
	    ));
	 
	    //  ===================================
	    //  = Text Input Introduce =
	    //  ===================================
	    // $tmp_intro='Hello. Wedding tackle balderdash Northeners collywobbles I’d reet fancy a the lakes a tad well chuffed what a load of cobblers lug hole and thus Big Ben on the beat cheerio clock round the earhole air one’s dirty linen, twiglets daft cow working class stiff upper lip doing my nut in sod’s law driving a mini fork out pork scratchings jellied eels ear hole stew and dumps.';
	    // $wp_customize->add_setting('lawyer_theme_options[introduce]', array(
	    //     'default'        => $tmp_intro,
	    //     'capability'     => 'edit_theme_options',
	    //     'type'           => 'theme_mod',
	    // ));
	    // $wp_customize->add_control('lawyer_customize_introduce', array(
	    //     'label'      => __('Introduce', 'themename'),
	    //     'section'    => $sectionID,
	    //     'settings'   => 'lawyer_theme_options[introduce]',
	    //     'type'       => 'textarea'
	    // ));
	 
	}
}
 ?>