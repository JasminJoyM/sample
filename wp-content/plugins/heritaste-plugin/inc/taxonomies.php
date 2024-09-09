<?php

namespace HERITASTEPLUGIN\Inc;


use HERITASTEPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Gallery Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Gallery Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Gallery Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'gallery_cat' ),
		);
		
		register_taxonomy( 'gallery_cat', 'gallery', $args );
		
		//Menu
		$labels = array(
			'name'              => _x( 'Menu Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Menu Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Menu Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'menu_cat' ),
		);

		register_taxonomy( 'menu_cat', 'menu', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Service Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Service Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Testimonials Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Team Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Team Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpheritaste' ),
			'singular_name'     => _x( 'Faqs Category', 'wpheritaste' ),
			'search_items'      => __( 'Search Category', 'wpheritaste' ),
			'all_items'         => __( 'All Categories', 'wpheritaste' ),
			'parent_item'       => __( 'Parent Category', 'wpheritaste' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpheritaste' ),
			'edit_item'         => __( 'Edit Category', 'wpheritaste' ),
			'update_item'       => __( 'Update Category', 'wpheritaste' ),
			'add_new_item'      => __( 'Add New Category', 'wpheritaste' ),
			'new_item_name'     => __( 'New Category Name', 'wpheritaste' ),
			'menu_name'         => __( 'Faqs Category', 'wpheritaste' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
