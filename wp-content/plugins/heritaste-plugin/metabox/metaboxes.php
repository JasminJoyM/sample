<?php
if ( ! function_exists( "heritaste_add_metaboxes" ) ) {
	function heritaste_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'gallery.php',
			'service.php',
			'team.php',
			'menu.php',
			'testimonials.php',
			'dimension.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( HERITASTEPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/heritaste_options/boxes", "heritaste_add_metaboxes" );
}

