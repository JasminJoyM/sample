<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'heritaste' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'heritaste' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.ico' ),
		),
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Home One Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'home_one_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home One Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home One logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'home_one_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home One Logo Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home One Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		
		//Mobile Logo
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile One Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'home_mobile_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home One Mobile Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home One Mobile logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'home_mobile_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home One Mobile Logo Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home One Mobile Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		//Home Two Logo
		array(
            'id' => 'normal_logo_show3',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Two Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'home_two_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Two Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home Two logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'home_two_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Two Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home Two Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		
		//Search Form Logo
		array(
            'id' => 'normal_logo_show4',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form Two Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'search_form_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Search Form Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Search Form logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		array(
			'id'       => 'search_form_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Search Form Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Search Form Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		
		//Home Three Logo
		array(
            'id' => 'normal_logo_show5',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Three Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'home_three_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Three Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home Three logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show5', '=', true ),
		),
		array(
			'id'       => 'home_three_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Three Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home Three Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show5', '=', true ),
		),
		
		//Home Four Logo
		array(
            'id' => 'normal_logo_show6',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Four Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'home_four_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Four Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home Four logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show6', '=', true ),
		),
		array(
			'id'       => 'home_four_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Four Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home Four Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show6', '=', true ),
		),
		
		//Home Seven Logo
		array(
            'id' => 'normal_logo_show7',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Seven Logo', 'heritaste'),
            'default' => true,
        ),
		array(
			'id'       => 'search_form_logo7',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Seven Logo Image', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert site Home Seven logo image', 'heritaste' ),
			'required' => array( 'normal_logo_show7', '=', true ),
		),
		array(
			'id'       => 'search_form_logo_dimension7',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Seven Dimentions', 'heritaste' ),
			'subtitle' => esc_html__( 'Select Home Seven Logo Dimentions', 'heritaste' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show7', '=', true ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
