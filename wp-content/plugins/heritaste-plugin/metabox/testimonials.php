<?php
return array(
	'title'      => 'Heritaste Testimonials Setting',
	'id'         => 'heritaste_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'heritaste_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'author_name',
					'type'  => 'text',
					'title' => esc_html__( 'Author Name', 'heritaste' ),
				),
				array(
					'id'    => 'author_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'heritaste' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'heritaste' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
				array(
					'id'    => 'test_link',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'heritaste' ),
				),
			),
		),
	),
);