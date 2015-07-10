<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Plugins
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'tokopress_register_required_plugins' );
function tokopress_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		/* Required Plugin */
		array(
			'name'		=> 'WooCommerce',
			'slug'		=> 'woocommerce',
			'required'	=> true,
		),
		array(
			'name'     	=> 'Pasar Shortcode',
			'slug'     	=> 'pasar-vc-shortcode',
			'source'   	=> get_template_directory() . '/inc/plugins/pasar-vc-shortcode-v1.0.zip',
			'version'	=> '1.0',
			'required' 	=> true,
		),
		array(
			'name'     	=> 'Visual Composer',
			'slug'     	=> 'js_composer',
			'source'   	=> get_template_directory() . '/inc/plugins/js_composer-v4.4.2.zip',
			'version' 	=> '4.4.2',
			'required' 	=> true,
		),

		/* Recommended Plugin */
		array(
			'name'		=> 'MailChimp for WordPress',
			'slug'		=> 'mailchimp-for-wp',
			'required'	=> false,
		),
		array(
			'name'		=> 'WordPress Importer',
			'slug'		=> 'wordpress-importer',
			'source'   	=> get_template_directory() . '/inc/plugins/wordpress-importer-v2.0.zip',
			'version' 	=> '2.0',
			'required' 	=> false,
		),
		array(
			'name'		=> 'Widget Importer Exporter',
			'slug'		=> 'widget-importer-exporter',
			'required'	=> false,
		),
		array(
			'name'		=> 'Regenerate Thumbnails',
			'slug'		=> 'regenerate-thumbnails',
			'required'	=> false,
		),
		array(
			'name'		=> 'WooCommerce Product Image Flipper',
			'slug'		=> 'woocommerce-product-image-flipper',
			'required'	=> false,
		)

	);

	// Text Domain
	$theme_text_domain = 'tokopress';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'tokopress' ),
			'menu_title'                       			=> __( 'Install Plugins', 'tokopress' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'tokopress' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'tokopress' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tokopress' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tokopress' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tokopress' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'tokopress' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'tokopress' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'tokopress' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'tokopress' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/* Set Visual Composer as Theme part and disable Visual Composer Updater */
if ( function_exists( 'vc_set_as_theme' ) ) 
	vc_set_as_theme( true );


add_filter('vc_load_default_templates','tokopress_load_vc_templates');
function tokopress_load_vc_templates( $args ) {
	$args2 = array ( 
		array(
			'name'=> '1. '.__('Pasar - Home','tokopress'),
			'image_path'=> THEME_URI . '/img/vc-homepage.png', 
			'content'=>'[vc_row css=".vc_custom_1428545143519{margin-top: 100px !important;margin-right: -5px !important;margin-bottom: 0px !important;margin-left: -5px !important;}"][vc_column width="1/3" css=".vc_custom_1428484244400{padding-right: 5px !important;padding-left: 5px !important;}"][pasar_banner image_id="2570" title="Gentleman\'s Bag" link="#"][/vc_column][vc_column width="1/3" css=".vc_custom_1428484253175{padding-right: 5px !important;padding-left: 5px !important;}"][pasar_banner image_id="2572" title="Man\'s Pant" link="#"][/vc_column][vc_column width="1/3" css=".vc_custom_1428484261104{padding-right: 5px !important;padding-left: 5px !important;}"][pasar_banner image_id="2576" title="Summer Collection" link="#"][/vc_column][/vc_row][vc_row css=".vc_custom_1428485164666{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column width="1/1"][vc_separator color="custom" align="align_center" accent_color="#c8beb2"][/vc_column][/vc_row][vc_row css=".vc_custom_1428485064199{margin-bottom: 0px !important;}"][vc_column width="1/1"][pasar_wc_products title="Special For You" title_position="left" columns="4" orderby="date" order="DESC" carousel="yes" numbers="8"][/vc_column][/vc_row][vc_row css=".vc_custom_1428485265482{margin-top: 20px !important;margin-bottom: 60px !important;}"][vc_column width="1/1"][vc_separator color="custom" align="align_center" accent_color="#c8beb2"][/vc_column][/vc_row][vc_row css=".vc_custom_1428476101956{margin-bottom: 0px !important;}"][vc_column width="1/1"][pasar_promotions title_position="hide" promo_desc_1="The Ultimate" promo_title_1="Hat Collections 2015" promo_btn_text_1="Buy Now" promo_desc_2="See Better Look Better" promo_title_2="Glass Collections" promo_btn_text_2="Buy Now" promo_desc_3="Comfort For Every Woman" promo_title_3="Shoes 2015" promo_btn_text_3="Buy Now" promo_desc_4="The Ultimate" promo_title_4="Woman Collections" promo_btn_text_4="Buy Now" promo_image_1="2492" promo_image_2="2493" promo_image_3="2494" promo_image_4="2495"][/vc_column][/vc_row][vc_row css=".vc_custom_1428488016250{margin-top: 60px !important;margin-bottom: 50px !important;}"][vc_column width="1/1"][vc_separator color="custom" align="align_center" accent_color="#c8beb2"][/vc_column][/vc_row][vc_row css=".vc_custom_1428486784954{margin-bottom: 0px !important;}"][vc_column width="1/1"][pasar_posts title_position="center" post_type="post" numbers="3" orderby="date" order="DESC" title="From Our Blog"][/vc_column][/vc_row][vc_row css=".vc_custom_1428485164666{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column width="1/1"][vc_separator color="custom" align="align_center" accent_color="#c8beb2"][/vc_column][/vc_row][vc_row css=".vc_custom_1428545198011{margin-bottom: 100px !important;}"][vc_column width="1/1"][pasar_brands title_position="center" title="Popular Brands" image_id_1="2490" image_id_2="2489" image_id_3="2488" image_id_4="2487" image_id_5="2486" image_id_6="2485"][/vc_column][/vc_row]', 
		),
	);
	return array_merge( $args, $args2 );
}
