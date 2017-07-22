<?php 
	function lawyer_customize_register($wp_customize){
    
    $wp_customize->add_section('lawyer_customize', array(
        'title'    => __('# Lawyer Customize', 'themename'),
        'description' => 'Lawyer Customize',
        'priority' => 1,
    ));
 
    //  =============================
    //  = Text Input  Name           =
    //  =============================
    $wp_customize->add_setting('lawyer_theme_options[name]', array(
        'default'        => 'Noah Wilson',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('lawyer_customize_name', array(
        'label'      => __('Name', 'themename'),
        'section'    => 'lawyer_customize',
        'settings'   => 'lawyer_theme_options[name]',
    ));

    //  ===================================
    //  = Text Input Overview Experience  =
    //  ===================================
    $wp_customize->add_setting('lawyer_theme_options[overview_experience]', array(
        'default'        => 'With over 20 years of experience practicing law',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('lawyer_customize_overview_experience', array(
        'label'      => __('Overview Experience', 'themename'),
        'section'    => 'lawyer_customize',
        'settings'   => 'lawyer_theme_options[overview_experience]',
        'type'       => 'textarea',
    ));
 
    //  ===================================
    //  = Text Input Introduce =
    //  ===================================
    $tmp_intro='Hello. Wedding tackle balderdash Northeners collywobbles I’d reet fancy a the lakes a tad well chuffed what a load of cobblers lug hole and thus Big Ben on the beat cheerio clock round the earhole air one’s dirty linen, twiglets daft cow working class stiff upper lip doing my nut in sod’s law driving a mini fork out pork scratchings jellied eels ear hole stew and dumps.';
    $wp_customize->add_setting('lawyer_theme_options[introduce]', array(
        'default'        => $tmp_intro,
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('lawyer_customize_introduce', array(
        'label'      => __('Introduce', 'themename'),
        'section'    => 'lawyer_customize',
        'settings'   => 'lawyer_theme_options[introduce]',
        'type'       => 'textarea'
    ));
 
    //  =============================
    //  = Radio Input               =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[color_scheme]', array(
    //     'default'        => 'value2',
    //     'capability'     => 'edit_theme_options',
    //     'type'           => 'option',
    // ));
 
    // $wp_customize->add_control('lawyer_customize', array(
    //     'label'      => __('Color Scheme', 'themename'),
    //     'section'    => 'lawyer_customize',
    //     'settings'   => 'lawyer_theme_options[color_scheme]',
    //     'type'       => 'radio',
    //     'choices'    => array(
    //         'value1' => 'Choice 1',
    //         'value2' => 'Choice 2',
    //         'value3' => 'Choice 3',
    //     ),
    // ));
 
    //  =============================
    //  = Checkbox                  =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[checkbox_test]', array(
    //     'capability' => 'edit_theme_options',
    //     'type'       => 'option',
    // ));
 
    // $wp_customize->add_control('display_header_text', array(
    //     'settings' => 'lawyer_theme_options[checkbox_test]',
    //     'label'    => __('Display Header Text'),
    //     'section'  => 'lawyer_customize',
    //     'type'     => 'checkbox',
    // ));
 
 
    //  =============================
    //  = Select Box                =
    //  =============================

    //  $wp_customize->add_setting('lawyer_theme_options[header_select]', array(
    //     'default'        => 'value2',
    //     'capability'     => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
    // $wp_customize->add_control( 'example_select_box', array(
    //     'settings' => 'lawyer_theme_options[header_select]',
    //     'label'   => 'Select Something:',
    //     'section' => 'lawyer_customize',
    //     'type'    => 'select',
    //     'choices'    => array(
    //         'value1' => 'Choice 1',
    //         'value2' => 'Choice 2',
    //         'value3' => 'Choice 3',
    //     ),
    // ));
 
 
    //  =============================
    //  = Image Upload              =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[image_upload_test]', array(
    //     'default'           => 'image.jpg',
    //     'capability'        => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
 
    // $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
    //     'label'    => __('Image Upload Test', 'themename'),
    //     'section'  => 'lawyer_customize',
    //     'settings' => 'lawyer_theme_options[image_upload_test]',
    // )));
 
    //  =============================
    //  = File Upload               =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[upload_test]', array(
    //     'default'           => 'arse',
    //     'capability'        => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
 
    // $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
    //     'label'    => __('Upload Test', 'themename'),
    //     'section'  => 'lawyer_customize',
    //     'settings' => 'lawyer_theme_options[upload_test]',
    // )));
 
 
    //  =============================
    //  = Color Picker              =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[link_color]', array(
    //     'default'           => '#000',
    //     'sanitize_callback' => 'sanitize_hex_color',
    //     'capability'        => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
 
    // $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
    //     'label'    => __('Link Color', 'themename'),
    //     'section'  => 'lawyer_customize',
    //     'settings' => 'lawyer_theme_options[link_color]',
    // )));
 
 
    //  =============================
    //  = Page Dropdown             =
    //  =============================

    // $wp_customize->add_setting('lawyer_theme_options[page_test]', array(
    //     'capability'     => 'edit_theme_options',
    //     'type'           => 'option',
 
    // ));
 
    // $wp_customize->add_control('themename_page_test', array(
    //     'label'      => __('Page Test', 'themename'),
    //     'section'    => 'lawyer_customize',
    //     'type'    => 'dropdown-pages',
    //     'settings'   => 'lawyer_theme_options[page_test]',
    // ));

    // =====================
    //  = Category Dropdown =
    //  =====================

 //    $categories = get_categories();
	// $cats = array();
	// $i = 0;
	// foreach($categories as $category){
	// 	if($i==0){
	// 		$default = $category->slug;
	// 		$i++;
	// 	}
	// 	$cats[$category->slug] = $category->name;
	// }
 
	// $wp_customize->add_setting('_s_f_slide_cat', array(
	// 	'default'        => $default
	// ));
	// $wp_customize->add_control( 'cat_select_box', array(
	// 	'settings' => '_s_f_slide_cat',
	// 	'label'   => 'Select Category:',
	// 	'section'  => '_s_f_home_slider',
	// 	'type'    => 'select',
	// 	'choices' => $cats,
	// ));
}
 
add_action('customize_register', 'lawyer_customize_register');

 ?>