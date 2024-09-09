<?php
return array(
	'title'      => 'Heritaste Project Setting',
	'id'         => 'heritaste_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'heritaste' ),
				),
				array(
					'id'    => 'project_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'heritaste' ),
					'options'  => array(
						'normal_height' => esc_html__( 'Normal Height', 'heritaste' ),
						'extra_height' => esc_html__( 'Extra Height', 'heritaste' ),
						'extra_width' => esc_html__( 'Extra Width', 'heritaste' ),
					),
					'default'  => 'normal_height',
				),
			),
		),
	),
);