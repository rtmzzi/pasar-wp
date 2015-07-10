<?php
/**
 * Templatin Theme Options
 *
 * @package Theme Options
 */


/*
 * Load Option Framework
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/option-framework/' );
get_template_part( '/inc/option-framework/options-framework' );

/**
 * Set Option Name For Option Framework
 */
function optionsframework_option_name() {
	$optionsframework_settings = get_option( 'optionsframework' );
	if ( defined( 'THEME_NAME' ) ) {
		$optionsframework_settings['id'] = THEME_NAME;
	}
	else {
		$themename = wp_get_theme();
		$themename = preg_replace("/\W/", "_", strtolower($themename) );
		$optionsframework_settings['id'] = $themename;
	}
	update_option( 'optionsframework', $optionsframework_settings );

    $defaults = optionsframework_defaults();
	add_option( $optionsframework_settings['id'], $defaults, '', 'yes' );
}

/**
 * Get Default Options For Option Framework
 */
function optionsframework_defaults() {
    $options = null;
    $location = apply_filters( 'options_framework_location', array('options.php') );
    if ( $optionsfile = locate_template( $location ) ) {
        $maybe_options = require_once $optionsfile;
        if ( is_array( $maybe_options ) ) {
			$options = $maybe_options;
        } else if ( function_exists( 'optionsframework_options' ) ) {
			$options = optionsframework_options();
		}
    }
    $options = apply_filters( 'of_options', $options );
    $defaults = array();
    foreach ($options as $key => $value) {
    	if( isset($value['id']) && isset($value['std']) ) {
    		$defaults[$value['id']] = $value['std'];
    	}
    }
    return $defaults;
}

/**
 * Load Custom Style For Option Framework
 */
function tokopress_style_option_framework() {
	wp_enqueue_style( 'style-option-framework', get_template_directory_uri() . '/inc/theme/css/option-framework.css' );
}
add_action( 'optionsframework_custom_scripts', 'tokopress_style_option_framework' );

/**
 * Top Navigation Tab Options
 */
function tokopress_topnav_settings( $options ) {
	$options[] = array(
		'name' 	=> __( 'Top Navigation', 'tokopress' ),
		'type' 	=> 'heading'
	);

		$options[] = array(
			'name' 	=> __( 'Top Navigation', 'tokopress' ),
			'desc' 	=> __( 'DISABLE top navigation area', 'tokopress' ),
			'id' 	=> 'topnav_disable',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'Phone Number', 'tokopress' ),
			'id' 	=> 'topnav_phone',
			'std' 	=> '+386 40 123 456',
			'type' 	=> 'text'
		);

		$options[] = array(
			'name' 	=> __( 'E-mail Address', 'tokopress' ),
			'id' 	=> 'topnav_email',
			'std' 	=> get_option( 'admin_email' ),
			'type' 	=> 'text'
		);

	$options[] = array(
		'name' 	=> __( 'Social Icon', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' => __( 'DISABLE Social icons', 'tokopress' ),
			'desc' => __( 'DISABLE social icons', 'tokopress' ),
			'id' => 'topnav_social_disable',
			'type' => 'checkbox'
		);

		$socials = array(
			'' 				=> '&nbsp;',
			'facebook'		=> 'Facebook',
			'twitter'		=> 'Twitter',
			'google-plus'	=> 'Google Plus',
			'linkedin'		=> 'LinkedIn',
			'instagram'		=> 'Instagram',
			'pinterest'		=> 'Pinterest',
			'youtube'		=> 'Youtube',
			'vimeo'			=> 'Vimeo',
			'tumblr'		=> 'Tumblr',
			'foursquare'	=> 'Foursquare',
			'reddit'		=> 'Reddit',
			'vk'			=> 'VK',
		);

		for( $i=1; $i <= 5; $i++ ) {
			$options[] = array(
				'name' => sprintf( __( 'Social #%s', 'tokopress' ), $i ),
				'desc' => '',
				'id' => "topnav_social_{$i}",
				'type' => 'select',
				'options' => $socials
			);
			$options[] = array(
				'name' => sprintf( __( 'Social URL #%s', 'tokopress' ), $i ),
				'desc' => '',
				'id' => "topnav_social_{$i}_url",
				'type' => 'text'
			);
		}

	return $options;
}
add_filter( 'of_options', 'tokopress_topnav_settings' );

/**
 * Header Tab Options
 */
function tokopress_header_settings( $options ) {
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options[] = array(
		'name' 	=> __( 'Header', 'tokopress' ),
		'type' 	=> 'heading'
	);

	if( class_exists('woocommerce') ) {
		$options[] = array(
			'name' 	=> __( 'Additional Menu', 'tokopress' ),
			'desc' 	=> __( 'DISABLE additional menu', 'tokopress' ),
			'id' 	=> 'tokopress_header_additional_disable',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
	}

	$options[] = array(
		'name' 	=> __( 'Header - Main Header', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Main Header', 'tokopress' ),
			'desc' 	=> __( 'DISABLE main header', 'tokopress' ),
			'id' 	=> 'tokopress_header_disable',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'Site Logo', 'tokopress' ),
			'id' 	=> 'tokopress_header_logo',
			'type' 	=> 'upload'
		);

		if( class_exists('woocommerce') ) {
			$options[] = array(
				'name' 	=> __( 'Mini Cart', 'tokopress' ),
				'desc' 	=> __( 'Disable mini cart', 'tokopress' ),
				'id' 	=> 'tokopress_wc_minicart_disable',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);
		}

	return $options;
}
add_filter( 'of_options', 'tokopress_header_settings' ); 

/**
 * Footer Tab Options
 */
function tokopress_footer_settings( $options ) {
	
	$this_theme = wp_get_theme();

	$options[] = array(
		'name' 	=> __( 'Footer', 'tokopress' ),
		'type' 	=> 'heading'
	);

		$options[] = array(
			'name' 	=> __( 'Top Footer Widgets', 'tokopress' ),
			'desc' 	=> __( 'DISABLE top footer widgets area', 'tokopress' ),
			'id' 	=> 'footer_widgets_top_disable',
			'std' 	=> '',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'Bottom Footer Widgets', 'tokopress' ),
			'desc' 	=> __( 'DISABLE bottom footer widgets area', 'tokopress' ),
			'id' 	=> 'footer_widgets_bottom_disable',
			'std' 	=> '',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name'	=> __( 'Footer Credits', 'tokopress' ),
			'desc' 	=> __( 'DISABLE site footer area', 'tokopress' ),
			'id' 	=> 'footer_disable',
			'std' 	=> '',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name'	=> __( 'Footer Left', 'tokopress' ),
			'desc'	=> __( 'insert text here, you can use HTML tag', 'tokopress' ),
			'id' 	=> 'footer_left',
			'std' 	=> '',
			'type' 	=> 'textarea'
		);

		$options[] = array(
			'name' 	=> __( 'Footer Right', 'tokopress' ),
			'desc' 	=> __( 'insert text here, you can use HTML tag', 'tokopress' ),
			'id' 	=> 'footer_right',
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
	return $options;
}
add_filter( 'of_options', 'tokopress_footer_settings' );

/**
 * Contact Tab Options
 */
function tokopress_contact_settings( $options ) {
	$options[] =array(
		'name' => __( 'Contact Map', 'tokopress' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'DISABLE Title Contact', 'tokopress' ),
			'desc' => __( 'DISABLE title in contact page', 'tokopress' ),
			'id' => 'tokopress_disable_title_contact',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __( 'DISABLE Map', 'tokopress' ),
			'desc' => __( 'DISABLE map in contact page', 'tokopress' ),
			'id' => 'tokopress_disable_map',
			'type' => 'checkbox'
		);

		$options[] = array(
			'name'=> __( 'Latitude', 'tokopress' ),
			'desc'=> __( 'Insert map Latitude koordinat', 'tokopress' ),
			'id'=> 'tokopress_contact_lat',
			'type'=> 'text',
			'std'=> '-6.903932'
		);
		$options[] = array(
			'name'=> __( 'Longitude', 'tokopress' ),
			'desc'=> __( 'Insert map Longitude koordinat', 'tokopress' ),
			'id'=> 'tokopress_contact_long',
			'type'=> 'text',
			'std'=> '107.610344'
		);
		$options[] = array(
			'name'=> __( 'Marker Title', 'tokopress' ),
			'desc'=> __( 'Insert marker title', 'tokopress' ),
			'id'=> 'tokopress_contact_marker_title',
			'type'=> 'text',
			'std'=> 'Marker Title'
		);
		$options[] = array(
			'name'=> __( 'Marker Description', 'tokopress' ),
			'desc'=> __( 'Insert marker description', 'tokopress' ),
			'id'=> 'tokopress_contact_marker_desc',
			'type'=> 'textarea',
			'std'=> 'Marker Content'
		);

	return $options;
}
add_filter( 'of_options', 'tokopress_contact_settings' );
