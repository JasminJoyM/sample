<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'heritaste_setup_theme' );
add_action( 'after_setup_theme', 'heritaste_load_default_hooks' );


function heritaste_setup_theme() {

	load_theme_textdomain( 'heritaste', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post', 'page-attributes' );
    add_theme_support( 'post-formats', array('video', 'quote') );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'heritaste_150x150', 150, 150, true ); //heritaste_150x150 Fresh Food V1
	add_image_size( 'heritaste_370x370', 370, 370, true ); //heritaste_370x370 Fresh Food V2
	add_image_size( 'heritaste_370x574', 370, 574, true ); //heritaste_370x574 Feature Services V2
	add_image_size( 'heritaste_360x320', 360, 320, true ); //heritaste_360x320 Feature Services V3
	add_image_size( 'heritaste_70x70', 70, 70, true ); //heritaste_70x70 Our Testimonials V1
	add_image_size( 'heritaste_77x77', 77, 77, true ); //heritaste_77x77 Our Testimonials V1
	add_image_size( 'heritaste_110x110', 110, 110, true ); //heritaste_110x110 Our Testimonials V2
	add_image_size( 'heritaste_355x230', 355, 230, true ); //heritaste_355x230 Latest News V2
	add_image_size( 'heritaste_340x370', 340, 370, true ); //heritaste_340x370 Latest News V1
	add_image_size( 'heritaste_355x230', 355, 230, true ); //heritaste_355x230 Latest News V3
	add_image_size( 'heritaste_355x350', 355, 350, true ); //heritaste_355x350 Latest News V4
	add_image_size( 'heritaste_355x500', 355, 500, true ); //heritaste_355x500 Latest News V4
	add_image_size( 'heritaste_218x218', 218, 218, true ); //heritaste_218x218 Our Gallery V1
	add_image_size( 'heritaste_545x370', 545, 370, true ); //heritaste_545x370 Our Gallery V2
	add_image_size( 'heritaste_330x370', 330, 370, true ); //heritaste_330x370 Our Gallery V2
	add_image_size( 'heritaste_285x395', 285, 395, true ); //heritaste_285x395 Our Gallery V8
	add_image_size( 'heritaste_302x370', 302, 370, true ); //heritaste_285x395 Our Gallery V8
	add_image_size( 'heritaste_605x370', 605, 370, true ); //heritaste_285x395 Our Gallery V8
	add_image_size( 'heritaste_480x480', 480, 480, true ); //heritaste_480x480 Our Gallery V3
	add_image_size( 'heritaste_570x570', 570, 570, true ); //heritaste_570x570 Our Gallery V4
	add_image_size( 'heritaste_422x422', 422, 422, true ); //heritaste_422x422 Our Gallery V6
	add_image_size( 'heritaste_570x300', 570, 300, true ); //heritaste_570x300 Our Gallery V7
	add_image_size( 'heritaste_270x630', 270, 630, true ); //heritaste_270x630 Our Gallery V7
	add_image_size( 'heritaste_270x300', 270, 300, true ); //heritaste_270x300 Our Gallery V7
	add_image_size( 'heritaste_545x370', 545, 370, true ); //heritaste_545x370 Our Gallery V8
	add_image_size( 'heritaste_370x480', 370, 480, true ); //heritaste_370x480 Our Team V1
	add_image_size( 'heritaste_330x505', 330, 505, true ); //heritaste_330x505 Our Team V3
	add_image_size( 'heritaste_370x505', 370, 505, true ); //heritaste_370x505 team details
	add_image_size( 'heritaste_1170x470', 1170, 470, true ); //heritaste_1170x470 Blog Classic
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'heritaste' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'heritaste' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'heritaste_admin_init', 2000000 );
}

/**
 * [heritaste_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function heritaste_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [heritaste_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function heritaste_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'heritaste' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'heritaste' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'heritaste' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'heritaste'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'heritaste'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'heritaste'),
		'id' => 'footer-sidebar2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'heritaste'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'heritaste'),
		'id' => 'footer-sidebar3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'heritaste'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'heritaste'),
		'id' => 'footer-sidebar4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'heritaste'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Five', 'heritaste'),
		'id' => 'footer-sidebar5',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'heritaste'),
		'before_widget'=>'<div class="col-lg-6 col-md-12 col-sm-12 content-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'heritaste'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'heritaste'),
		'before_widget'=>'<div id="%1$s" class="service-widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Shop Widget', 'heritaste'),
		'id' => 'shop-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Shop Area.', 'heritaste'),
		'before_widget'=>'<div id="%1$s" class="widget shop-widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'heritaste' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'heritaste' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="widget-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	}
	if ( ! is_object( heritaste_WSH() ) ) {
		return;
	}

	$sidebars = heritaste_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( heritaste_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'heritaste_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function heritaste_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'heritaste' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'heritaste' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'heritaste' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'heritaste' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'heritaste' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'heritaste' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'heritaste' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'heritaste' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'heritaste' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'heritaste_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function heritaste_enqueue_scripts() {
	$options = heritaste_WSH()->option();
	
    //styles
    wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/css/font-awesome-all.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'jquery-lightcase', get_template_directory_uri() . '/assets/css/lightcase.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'heritaste-color', get_template_directory_uri() . '/assets/css/color.css' );
	wp_enqueue_style( 'heritaste-nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'timePicker', get_template_directory_uri() . '/assets/css/timePicker.css' );
	wp_enqueue_style( 'jquery-bootstrap-touchspin', get_template_directory_uri() . '/assets/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'heritaste-main', get_stylesheet_uri() );
	wp_enqueue_style( 'heritaste-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'heritaste-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'heritaste-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	wp_enqueue_style( 'heritaste-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-lightcase', get_template_directory_uri().'/assets/js/lightcase.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/assets/js/mixitup.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'heritaste-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'nav-tool', get_template_directory_uri().'/assets/js/nav-tool.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'heritaste-plugins', get_template_directory_uri().'/assets/js/plugins.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'TweenMax', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-lettering', get_template_directory_uri().'/assets/js/jquery.lettering.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-circleType', get_template_directory_uri().'/assets/js/jquery.circleType.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'timePicker', get_template_directory_uri().'/assets/js/timePicker.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'text-animation', get_template_directory_uri().'/assets/js/text_animation.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'text-plugins', get_template_directory_uri().'/assets/js/text_plugins.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'heritaste-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'heritaste_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function heritaste_fonts_url() {
	
	$fonts_url = '';
	
		$font_families['Urbanist']      	   = 'Urbanist:ital,wght@0,300,400,500,600,700,800,900&display=swap';
		$font_families['Kumbh+Sans']    	   = 'Kumbh Sans:wght@0,200,300,400,500,600,700,800,900&display=swap';
		$font_families['Just+Another+Hand']    = 'Just Another Hand:wght@0,200,300,400,500,600,700,800,900&display=swap';

		$font_families = apply_filters( 'HERITASTE/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function heritaste_theme_styles() {
    wp_enqueue_style( 'heritaste-theme-fonts', heritaste_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'heritaste_theme_styles' );
add_action( 'admin_enqueue_scripts', 'heritaste_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) heritaste_set function

/**
 * [heritaste_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'heritaste_set' ) ) {
	function heritaste_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) heritaste_add_editor_styles function

function heritaste_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'heritaste_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = heritaste_WSH()->option(); 
if( heritaste_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);