<?php
/**
 * Abstract class for register post type
 *
 * @package    WordPress
 * @subpackage Student2 Plugin
 * @author     Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version    1.0
 */

namespace HERITASTEPLUGIN\Inc\Post_Types;

use HERITASTEPLUGIN\Inc\Abstracts\Post_Type;

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Abstract Post Type
 * Implemented by classes using the same CRUD(s) pattern.
 *
 * @version  2.6.0
 * @package  HERITASTEPLUGIN/Abstracts
 * @category Abstract Class
 * @author   Wptech
 */
class Services extends Post_Type {

	protected $post_type = 'service';

	protected $menu_icon = 'dashicons-products';

	protected $taxonomies = array();

	public static $instance;


	/**
	 * [instance description]
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * [init description]
	 *
	 * @return [type] [description]
	 */
	public static function init() {

		self::instance()->menu_name = esc_html__( 'Services', 'wpfixker' );
		self::instance()->singular  = esc_html__( 'Service', 'wpheritaste' );
		self::instance()->plural    = esc_html__( 'Services', 'wpheritaste' );
		self::instance()->supports    = array('title', 'editor', 'thumbnail', 'excerpt');

		add_action( 'init', array( self::instance(), 'register' ) );
	}


}
