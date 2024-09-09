<?php

namespace HERITASTEPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'banner_v1',
		'love_our_taste',
		'about_us',
		'feature_services_v1',
		'menu_section_v1',
		'funfact_and_video',
		'fresh_food_v1',
		'booking_form',
		'mobile_app',
		'our_testimonial_v1',
		'latest_news_v1',
		'our_gallery_v1',
		
		//Home Page Two
		'banner_v2',
		'about_us_v2',
		'feature_services_v2',
		'booking_form_v2',
		'funfacts_v1',
		'menu_section_v2',
		'our_team_v1',
		'video_section',
		'our_gallery_v2',
		'our_testimonial_v2',
		'call_to_action_v1',
		
		//Home Page Three
		'banner_v3',
		'about_us_v3',
		'deals_section',
		'menu_section_v3',
		'why_choose_us',
		'our_testimonial_v3',
		'eat_fresh',
		
		//Home Page Four
		'banner_v4',
		'feature_services_v3',
		'about_us_v4',
		'our_gallery_v3',
		'menu_section_v4',
		'funfacts_v2',
		'fresh_food_v2',
		'our_faqs_v1',
		'latest_news_v2',
		'booking_form_v3',
		
		//Home Page Five
		'banner_v5',
		'menu_section_v5',
		'booking_form_v4',
		
		//Home Page Six
		'banner_v6',
		
		//Home Page Seven
		'banner_v7',
		
		//Inner Pages
		'history_section',
		'feature_services_v4',
		'our_team_v2',
		'our_team_v3',
		'our_team_v4',
		'coming_soon',
		'menu_section_v6',
		'menu_section_v7',
		'menu_section_v8',
		'latest_news_v3',
		'latest_news_v4',
		'our_gallery_v4',
		'our_gallery_v5',
		'our_gallery_v6',
		'our_gallery_v7',
		'our_gallery_v8',
		'contact_us',
		'reserve_section',
		'branches_section',		
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = HERITASTEPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\HERITASTEPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'heritaste',
			[
				'title' => esc_html__( 'Heritaste', 'heritaste' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'heritaste' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();