<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $tp_sidebar;
$shop_sidebar = of_get_option( 'tokopress_wc_show_shop_sidebar' );
$product_sidebar = of_get_option( 'tokopress_wc_show_product_sidebar' );
if( is_product() )
	if( $product_sidebar ) {
		$tp_sidebar = true;
	} else {
		$tp_sidebar = false;
	}
else {
	if( $shop_sidebar ) {
		$tp_sidebar = true;
	} else {
		$tp_sidebar = false;
	}
}

if ( $tp_sidebar ) {
	$tp_class_content = 'col-md-9 col-md-push-3';
}
else {
	$tp_class_content = 'col-md-12';
}

?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $tp_class_content ); ?>">
				<div class="content">

