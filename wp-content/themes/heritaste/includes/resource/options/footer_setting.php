<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'heritaste' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'heritaste' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'heritaste' ),
				'e' => esc_html__( 'Elementor', 'heritaste' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'heritaste' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'heritaste' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'heritaste' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'heritaste' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
				'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
				'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
			    ),
				'footer_v6'  => array(
				    'alt' => esc_html__( 'Footer Style 6', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer6.png',
			    ),
				'footer_v7'  => array(
				    'alt' => esc_html__( 'Blank Footer Style', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer7.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_v1_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu_v1',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_menu_v2',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_upper_title_v3',
			'type'    => 'text',
			'title'   => __( 'Footer Title', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_upper_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Footer Text', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_v3_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'footer_menu_v3',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
            'id' => 'show_social_icons',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'heritaste'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
        ),
		array(
            'id'    => 'footer_v4_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Footer Social Media', 'heritaste' ),
            'required' => array( 'show_social_icons', '=', true ),
        ),
		array(
			'id'       => 'footer_logo4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'heritaste' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_v4_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_menu_v4',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'footer_icons_v4',
			'type'    => 'textarea',
			'title'   => __( 'Footer Icons HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_v5_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_menu_v5',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu HTML', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		/***********************************************************************
								Footer Version 6 Start
		************************************************************************/
		array(
			'id'       => 'footer_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Six Settings', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_address_v6',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_working_v6',
			'type'    => 'textarea',
			'title'   => __( 'Working Hours', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_phone_v6',
			'type'    => 'textarea',
			'title'   => __( 'Phone Number', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_email_v6',
			'type'    => 'textarea',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
            'id' => 'show_social_share_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'heritaste'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
        ),
		array(
            'id'    => 'header_social_share_v6',
            'type'  => 'social_media',
            'title' => esc_html__( 'Footer Social Media', 'heritaste' ),
            'required' => array( 'show_social_share_v6', '=', true ),
        ),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
