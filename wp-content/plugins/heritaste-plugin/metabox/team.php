<?php
return array(
	'title'      => 'Heritaste Team Setting',
	'id'         => 'heritaste_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'heritaste' ),
				),
				array(
					'id'    => 'team_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'heritaste' ),
				),
				array(
					'id'    => 'video_link',
					'type'  => 'text',
					'title' => esc_html__( 'Video Url', 'heritaste' ),
				),
				array(
					'id'    => 'side_image',
					'type'  => 'media',
					'title' => esc_html__( 'Side Image', 'heritaste' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'heritaste' ),
				),
			),
		),
	),
);