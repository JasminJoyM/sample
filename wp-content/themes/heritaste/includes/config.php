<?php
/**
 * Theme config file.
 *
 * @package HERITASTE
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['heritaste_main_header'][] 	= array( 'heritaste_main_header_area', 99 );

$config['default']['heritaste_main_footer'][] 	= array( 'heritaste_main_footer_area', 99 );

$config['default']['heritaste_sidebar'][] 	    = array( 'heritaste_sidebar', 99 );

$config['default']['heritaste_banner'][] 	    = array( 'heritaste_banner', 99 );


return $config;
