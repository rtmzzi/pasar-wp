<?php
/**
 * Tokopress functions and definitions.
 *
 * @category Pasar
 * @package  TokoPress
 * @author   TokoPress
 * @link     
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Set theme name for unique identifier.
 */
define( 'THEME_NAME' , 'pasar-wp' );
define( 'THEME_VERSION', '1.0' );

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 825;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function setup_tokopress() {

	/*
	 * Makes it available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'tokopress', get_template_directory() . '/languages' );

	// Title Tags
	add_theme_support( "title-tag" );

	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'product' ) );
	set_post_thumbnail_size( 850, 376 );

	// post format
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );

	add_image_size( 'blog-featured', 825, 350, true );
	add_image_size( 'blog-thumbnail', 363, 200, true );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

	$args = array(
		'flex-width'	=> true,
		'width'			=> 1000,
		'flex-height'	=> true,
		'height'		=> 150,
		'default-image'	=> '',
	);
	add_theme_support( 'custom-header', $args );

	/* register nav menu */
	register_nav_menus( array(
		'topnav'=> __( 'Top Navigation', 'tokopress' ),
		'header' => __( 'Header Menu', 'tokopress' ),
	) );

}
add_action( 'after_setup_theme', 'setup_tokopress' );

/**
 * Register Sidebar
 */
function tokopress_register_sidebar() {
	/* register main sidebar */
	register_sidebar( array(
		'name' 			=> __( 'Main Sidebar', 'tokopress' ),
		'id' 			=> 'sidebar-1',
		'description' 	=> __( 'Widgets in this area will be shown on the left column.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

	/* register shop sidebar */
	register_sidebar( array(
		'name' 			=> __( 'Shop Sidebar', 'tokopress' ),
		'id' 			=> 'shop',
		'description' 	=> __( 'Widgets in this area will be shown on the left column of shop page.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

	/* register top footer widgets */
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#1' ),
		'id' 			=> 'footer-widget-top-1',
		'description' 	=> __( 'Widgets in this area will be shown on the top footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#2' ),
		'id' 			=> 'footer-widget-top-2',
		'description' 	=> __( 'Widgets in this area will be shown on the top footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#3' ),
		'id' 			=> 'footer-widget-top-3',
		'description' 	=> __( 'Widgets in this area will be shown on the top footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#4' ),
		'id' 			=> 'footer-widget-top-4',
		'description' 	=> __( 'Widgets in this area will be shown on the top footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

	/* register bottom footer widgets */
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Bottom Footer Widget %1$s', 'tokopress' ), '#1' ),
		'id' 			=> 'footer-widget-bottom-1',
		'description' 	=> __( 'Widgets in this area will be shown on the bottom footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Bottom Footer Widget %1$s', 'tokopress' ), '#2' ),
		'id' 			=> 'footer-widget-bottom-2',
		'description' 	=> __( 'Widgets in this area will be shown on the bottom footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Bottom Footer Widget %1$s', 'tokopress' ), '#3' ),
		'id' 			=> 'footer-widget-bottom-3',
		'description' 	=> __( 'Widgets in this area will be shown on the bottom footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Bottom Footer Widget %1$s', 'tokopress' ), '#4' ),
		'id' 			=> 'footer-widget-bottom-4',
		'description' 	=> __( 'Widgets in this area will be shown on the bottom footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Bottom Footer Widget %1$s', 'tokopress' ), '#5' ),
		'id' 			=> 'footer-widget-bottom-5',
		'description' 	=> __( 'Widgets in this area will be shown on the bottom footer.', 'tokopress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

}
add_action( 'widgets_init', 'tokopress_register_sidebar' );

/**
 * Enqueue styles.
 */
function tokopress_styles() {

	wp_enqueue_style( 'tokopress-fonts', 'http://fonts.googleapis.com/css?family=Montserrat', array(), THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'tokopress_styles', 16 );

/**
 * Add main stylesheet file to <head> section.
 */
add_action( 'wp_enqueue_scripts', 'tokopress_styles_theme', 99 );
function tokopress_styles_theme() {

    /* If using a child theme, auto-load the parent theme style. */
    if ( is_child_theme() ) {
        wp_enqueue_style( 'style-parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), THEME_VERSION );
    }

    /* Always load active theme's style.css. */
    wp_enqueue_style( 'style-theme', get_stylesheet_uri(), array(), THEME_VERSION );
	
	ob_start();
	do_action('tokopress_custom_styles');
	$custom_styles = ob_get_clean();
	
	if ( $custom_styles ) 
		wp_add_inline_style( 'style-theme', $custom_styles );
}

/**
 * Enqueue scripts.
 */
function tokopress_scripts() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'tokopress-js-superfish', get_template_directory_uri() . '/js/slidebars.js', array( 'jquery' ), '0.10.2', true );
	wp_enqueue_script( 'tokopress-js-slidebars', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.4.8', true );

	wp_register_script( 'tokopress-js-owlcarousel', get_template_directory_uri() . '/js/owl2.carousel.min.js', array( 'jquery' ), '2.0.0', true );

	if( is_page_template( 'page_contact.php' ) ) {
  		wp_enqueue_script( 'tokopress-maps-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array( 'jquery' ), '3', true );
  		wp_enqueue_script( 'tokopress-gmaps-js', get_template_directory_uri() . '/js/gmaps.js', array( 'jquery' ), '0.4.12', true );
  	}

}
add_action( 'wp_enqueue_scripts', 'tokopress_scripts' );

/* This is needed to make it fully compatible with Visual Composer */
function tokopress_scripts_late() {
	// Theme script
	wp_enqueue_script( 'tokopress-js-global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), THEME_VERSION, true );
}
add_action( 'wp_footer', 'tokopress_scripts_late', 11 );

/**
 * Function additional field user
 */
add_filter( 'user_contactmethods', 'tokopress_add_to_author_profile', 10, 1);
function tokopress_add_to_author_profile( $contactmethods ) {

	$contactmethods['phone_number'] 	= __( 'Phone Number', 'tokopress' );
	$contactmethods['facebook_url'] 	= __( 'Facebook Profile URL', 'tokopress' );
	$contactmethods['twitter_url'] 		= __( 'Twitter Profile URL', 'tokopress' );
	$contactmethods['gplus_url']		= __( 'Google Plus Profil URL', 'tokopress' );

	return $contactmethods;
}

/**
 * Unregister MailChimp Widget
 */
function tokopress_unreg_mailchimp_widget() {
	if ( class_exists( 'MC4WP_Lite' ) ) {
		unregister_widget( 'MC4WP_Lite_Widget' );
	}
}
add_action('widgets_init', 'tokopress_unreg_mailchimp_widget');

remove_filter( 'pre_term_description', 'wp_filter_kses' );
add_filter( 'pre_term_description', 'wp_filter_post_kses' );
remove_filter( 'term_description', 'wp_filter_data' );
add_filter( 'term_description', 'wp_kses_post' );

function tokopress_include_file( $file ) {
	include_once( $file );
}
function tokopress_require_file( $file ) {
	require_once( $file );
}

/**
 * Theme Customizer
 */
tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/customizer/customizer-framework.php' );
tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/designs.php' );
tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/update.php' );

/**
 * Theme Function
 */
if( is_admin() ) :

	/* load theme options */
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/options.php' );
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/plugins.php' );
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/metabox.php' );

else :

	/* frontend function */
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/functions/hybrid-media-grabber.php' );
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/functions/tokopress_nav_walker.php' );
	tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/theme/frontend.php' );

endif;

/**
 * Contact Form
 */
tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/functions/contact-form.php' );

/**
 * WooCommerce Function.
 */
if ( class_exists( 'woocommerce' ) ) :

	if( is_admin() ) :
		
		/* include woocommerce setup */
		tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/woocommerce/setup.php' );
		/* include woocommerce options */
		tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/woocommerce/options.php' );

	else :
	
		/* include frontend function */
		tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/woocommerce/frontend.php' );
	
	endif;

	if( class_exists( 'WC_Vendors' ) ) {
		tokopress_require_file( trailingslashit( THEME_DIR ) . 'inc/woocommerce/wcvendors-settings.php' );
	}

endif;

