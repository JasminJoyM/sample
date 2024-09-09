<?php
return array(
	'title'      => 'Heritaste Service Setting',
	'id'         => 'heritaste_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'heritaste' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'number',
					'type'  => 'text',
					'title' => esc_html__( 'Number', 'heritaste' ),
				),
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'heritaste' ),
				),
			),
		),
	),
);