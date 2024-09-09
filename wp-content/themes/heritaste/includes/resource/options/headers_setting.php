<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'heritaste' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'heritaste' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'heritaste' ),
				'e' => esc_html__( 'Elementor', 'heritaste' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'heritaste' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'heritaste' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'heritaste' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'heritaste' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    ),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style 5', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			    ),
				'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style 6', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header6.png',
			    ),
				'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style 7', 'heritaste' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header7.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Top Bar
		array(
            'id' => 'show_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'welcome_title_v1',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Title', 'heritaste' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'order_text_v1',
			'type'    => 'text',
			'title'   => __( 'Middle Text', 'heritaste' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'text_link_v1',
			'type'    => 'text',
			'title'   => __( 'Text Link', 'heritaste' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'our_address_v1',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_topbar_v1', '=', true ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Cart Icon
		array(
            'id' => 'show_cart_icon_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Social Media		
		array(
            'id' => 'show_social_share_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'heritaste' ),
            'required' => array( 'show_social_share_v1', '=', true ),
        ),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'contact_title_v1',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info', '=', true ),
		),
		array(
			'id'      => 'address_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info', '=', true ),
		),
		array(
			'id'      => 'contact_no_v1',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info', '=', true ),
		),
		array(
			'id'      => 'our_email',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id'    => 'mheader_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v1', '=', true ),
        ),
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Top Bar
		array(
            'id' => 'show_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'welcome_title_v2',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Title', 'heritaste' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'order_text_v2',
			'type'    => 'text',
			'title'   => __( 'Middle Text', 'heritaste' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'text_link_v2',
			'type'    => 'text',
			'title'   => __( 'Text Link', 'heritaste' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'our_address_v2',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_topbar_v2', '=', true ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Cart Icon
		array(
            'id' => 'show_cart_icon_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Social Media		
		array(
            'id' => 'show_social_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'heritaste' ),
            'required' => array( 'show_social_share_v2', '=', true ),
        ),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'contact_title_v2',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info2', '=', true ),
		),
		array(
			'id'      => 'address_v2',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info2', '=', true ),
		),
		array(
			'id'      => 'contact_no_v2',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info2', '=', true ),
		),
		array(
			'id'      => 'our_email2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info2', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id'    => 'mheader_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v2', '=', true ),
        ),
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Top Bar
		array(
            'id' => 'show_topbar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'address_v13',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'whours_v3',
			'type'    => 'textarea',
			'title'   => __( 'Working Hours', 'heritaste' ),
			'required' => array( 'show_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'email_v3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_topbar_v3', '=', true ),
		),
		array(
			'id'      => 'phone_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'heritaste' ),
			'required' => array( 'show_topbar_v3', '=', true ),
		),
		
		//Buttons Info
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_title2_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
			'id'      => 'btn_link2_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Cart Icon
		array(
            'id' => 'show_cart_icon_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Social Media		
		array(
            'id' => 'show_social_share_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id'    => 'header_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'heritaste' ),
            'required' => array( 'show_social_share_v3', '=', true ),
        ),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'contact_title_v3',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info3', '=', true ),
		),
		array(
			'id'      => 'address_v3',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info3', '=', true ),
		),
		array(
			'id'      => 'contact_no_v3',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info3', '=', true ),
		),
		array(
			'id'      => 'our_email3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info3', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id'    => 'mheader_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v3', '=', true ),
        ),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Cart Icon
		array(
            'id' => 'show_cart_icon_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Phone Number
		array(
			'id'      => 'phone_no_v4',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'contact_title_v4',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info4', '=', true ),
		),
		array(
			'id'      => 'address_v4',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info4', '=', true ),
		),
		array(
			'id'      => 'contact_no_v4',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info4', '=', true ),
		),
		array(
			'id'      => 'our_email4',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info4', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id'    => 'mheader_social_share_v4',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v4', '=', true ),
        ),
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Five Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		
		//Top Bar
		array(
            'id' => 'show_topbar_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'address_v15',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_topbar_v5', '=', true ),
		),
		array(
			'id'      => 'whours_v5',
			'type'    => 'textarea',
			'title'   => __( 'Working Hours', 'heritaste' ),
			'required' => array( 'show_topbar_v5', '=', true ),
		),
		array(
			'id'      => 'phone_title_v5',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'heritaste' ),
			'required' => array( 'show_topbar_v5', '=', true ),
		),
		array(
			'id'      => 'phone_v5',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'heritaste' ),
			'required' => array( 'show_topbar_v5', '=', true ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		
		//Button Info
		array(
			'id'      => 'btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
			'id'      => 'btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'contact_title_v5',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info5', '=', true ),
		),
		array(
			'id'      => 'address_v5',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info5', '=', true ),
		),
		array(
			'id'      => 'contact_no_v5',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info5', '=', true ),
		),
		array(
			'id'      => 'our_email5',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info5', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
            'id'    => 'mheader_social_share_v5',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v5', '=', true ),
        ),
		
		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Six Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_seach_form_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		
		//Cart Icon
		array(
            'id' => 'show_cart_icon_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		//Button User Info
		array(
			'id'      => 'btn_ulink_v6',
			'type'    => 'text',
			'title'   => __( 'User Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Button Book Yu Table
		array(
			'id'      => 'btn_title_v6',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
			'id'      => 'btn_link_v6',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'contact_title_v6',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info6', '=', true ),
		),
		array(
			'id'      => 'address_v6',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info6', '=', true ),
		),
		array(
			'id'      => 'contact_no_v6',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info6', '=', true ),
		),
		array(
			'id'      => 'our_email6',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info6', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
            'id'    => 'mheader_social_share_v6',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v6', '=', true ),
        ),
		
		/***********************************************************************
								Header Version 7 Start
		************************************************************************/
		array(
			'id'       => 'header_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Five Settings', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),		
		
		//Topbar Info
		array(
			'id'      => 'address_v7',
			'type'    => 'textarea',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'whours_v7',
			'type'    => 'textarea',
			'title'   => __( 'Working Hours', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'phone_no_v7',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Search Icon		
		array(
            'id' => 'show_search_form_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		
		//Slider Code
		array(
			'id'      => 'slider_code',
			'type'    => 'textarea',
			'title'   => __( 'Slider Code', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Social Media
		array(
            'id' => 'show_social_share_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
            'id'    => 'header_social_share_v7',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'heritaste' ),
            'required' => array( 'show_social_share_v7', '=', true ),
        ),
		array(
			'id'      => 'since_v7',
			'type'    => 'textarea',
			'title'   => __( 'Since Text', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'right_text_v7',
			'type'    => 'textarea',
			'title'   => __( 'Right Text', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'text_link_v7',
			'type'    => 'text',
			'title'   => __( 'Right Text Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Cart Icon		
		array(
            'id' => 'show_cart_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Cart Icon', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),		
		
		//Button Info
		array(
			'id'      => 'btn_title_v7',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_link_v7',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_title2_v7',
			'type'    => 'text',
			'title'   => __( 'Register Button Title', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
			'id'      => 'btn_link2_v7',
			'type'    => 'text',
			'title'   => __( 'Register Button Link', 'heritaste' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		
		//Mobile Info		
		array(
            'id' => 'show_mobile_info7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
			'id'      => 'contact_title_v7',
			'type'    => 'text',
			'title'   => __( 'Contact Title', 'heritaste' ),
			'required' => array( 'show_mobile_info7', '=', true ),
		),
		array(
			'id'      => 'mobile_address_v7',
			'type'    => 'text',
			'title'   => __( 'Address', 'heritaste' ),
			'required' => array( 'show_mobile_info7', '=', true ),
		),
		array(
			'id'      => 'contact_no_v7',
			'type'    => 'text',
			'title'   => __( 'Contact Number', 'heritaste' ),
			'required' => array( 'show_mobile_info7', '=', true ),
		),
		array(
			'id'      => 'our_email7',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'heritaste' ),
			'required' => array( 'show_mobile_info7', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Mobile Social Icons', 'heritaste'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
            'id'    => 'mheader_social_share_v7',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Mobile Social Media', 'heritaste' ),
            'required' => array( 'show_msocial_share_v7', '=', true ),
        ),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
