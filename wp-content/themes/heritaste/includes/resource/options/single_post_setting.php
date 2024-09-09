<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'heritaste' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'heritaste' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'heritaste' ),
				'e' => esc_html__( 'Elementor', 'heritaste' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'heritaste' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'heritaste' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'heritaste' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'heritaste' ),
			'default' => true,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'heritaste' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'heritaste' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'heritaste' ),
			'default' => false,
			'required' => [ 'single_post_author_box', '=', true ],
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'heritaste' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'heritaste' ),
			'required' => [ 'single_post_author_links', '=', true ],
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





