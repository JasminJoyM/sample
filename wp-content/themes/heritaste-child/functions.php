<?php
/**
 * Theme functions and definitions.
 */
function heritaste_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'heritaste-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'heritaste-minified-style' , get_template_directory_uri() . '/style.css' );
    }

    wp_enqueue_style( 'heritaste-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'heritaste-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'heritaste_child_enqueue_styles' );