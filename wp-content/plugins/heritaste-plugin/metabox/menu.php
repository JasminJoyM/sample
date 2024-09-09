<?php
return array(
	'title'      => 'Heritaste Menu Setting',
	'id'         => 'heritaste_meta_menu',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'menu' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_menu_meta_setting',
			'fields' => array(
				array(
					'id'    => 'menu_text',
					'type'  => 'text',
					'title' => esc_html__( 'Enter The BG Text', 'heritaste' ),
				),
				array(
					'id'    => 'features_list',
					'type'  => 'textarea',
					'title' => esc_html__( 'Enter Feature List', 'heritaste' ),
				),
				array(
					'id'    => 'menu_price',
					'type'  => 'text',
					'title' => esc_html__( 'Enter The Price', 'heritaste' ),
				),
				array(
					'id'    => 'menu_rating',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Rating', 'heritaste' ),
				),
				array(
					'id'    => 'menu_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'heritaste' ),
				),
			),
		),
	),
);