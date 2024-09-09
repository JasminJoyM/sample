<?php
	return array(
		'title'      => 'heritaste post Setting',
		'id'         => 'heritaste_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'dimension',
						'type'  => 'select',
						'title' => esc_html__( 'Choose the Extra height', 'heritaste' ),
						'options'  => array(
							'normal_height' => esc_html__( 'Normal Height', 'heritaste' ),
							'extra_height' => esc_html__( 'Extra Height', 'heritaste' ),
							'medium_height' => esc_html__( 'Medium Height', 'heritaste' ),
							'extra_width' => esc_html__( 'Extra Width', 'heritaste' ),
						),
					),
				),
			),
		),
	);


?>