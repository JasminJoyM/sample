<?php

return array(
	'title'      => esc_html__( 'Archive Page Settings', 'heritaste' ),
	'id'         => 'archive_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'archive_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Archive Source Type', 'heritaste' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'heritaste' ),
				'e' => esc_html__( 'Elementor', 'heritaste' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'archive_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'heritaste' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'archive_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'archive_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Archive Default', 'heritaste' ),
			'indent'   => true,
			'required' => [ 'archive_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'archive_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'heritaste' ),
			'default' => true,
		),
		array(
			'id'       => 'archive_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'heritaste' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'heritaste' ),
			'required' => array( 'archive_page_banner', '=', true ),
		),
		array(
			'id'       => 'archive_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'heritaste' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'heritaste' ),
			'default'  => array(
			    'url' => HERITASTE_URI . 'assets/images/background/page-title.jpg',
		    ),
			'required' => array( 'archive_page_banner', '=', true ),
		),

		array(
			'id'       => 'archive_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'heritaste' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'heritaste' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'heritaste' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'heritaste' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'heritaste' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'archive_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'heritaste' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'heritaste' ),
			'required' => array(
				array( 'archive_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => heritaste_get_sidebars(),
		),
		array(
			'id'       => 'archive_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'archive_source_type', '=', 'd' ],
		),
	),
);