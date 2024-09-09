<?php
return array(
	'title'      => 'Heritaste Gallery Setting',
	'id'         => 'heritaste_meta_gallerys',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'gallery' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_gallerys_meta_setting',
			'fields' => array(
				array(
					'id'    => 'client',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Client', 'heritaste' ),
				),
				array(
					'id'    => 'team_members',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Team Members', 'heritaste' ),
				),
				array(
					'id'    => 'new_product',
					'type'  => 'text',
					'title' => esc_html__( 'Enter New Product', 'heritaste' ),
				),
				array(
					'id'    => 'date',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Date', 'heritaste' ),
				),
				array(
					'id'    => 'location',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Location', 'heritaste' ),
				),
				array(
					'id'    => 'gallery_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'heritaste' ),
					'options'  => array(
						'normal_height' => esc_html__( 'Normal Height', 'heritaste' ),
						'normal_width' => esc_html__( 'Normal Width', 'heritaste' ),
						'extra_height' => esc_html__( 'Extra Height', 'heritaste' ),
						'extra_width' => esc_html__( 'Extra Width', 'heritaste' ),
						
					),
					'default'  => 'normal_height',
				),
				array(
					'id'    => 'social_profile2',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'heritaste' ),
				),
			),
		),
	),
);