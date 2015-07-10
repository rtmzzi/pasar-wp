<?php
/**
 * WooCommerce Frontend Function
 *
 * @package Tokopress
 */

/**
 * Add Class Woocommerce in body class if woocommerce class not exist
 */
add_filter( 'body_class', 'tokopress_wc_add_class' );
function tokopress_wc_add_class( $classes ) {

	if ( is_woocommerce() && !is_product() ){

		$get_column = of_get_option( 'tokopress_wc_products_column_per_row' );

		$classes[] = 'woocommerce-products-col-' . $get_column;
	
	}

	// if(!is_woocommerce()){
	// 	$classes[] = 'woocommerce';
	// }
	
	return $classes;
}

/**
 * WooCommerce Breadcrumb
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_filter( 'woocommerce_breadcrumb_defaults', 'tokopress_wc_breadcrumb_defaults' );
function tokopress_wc_breadcrumb_defaults( $args ) {
	$args = array(
			'delimiter'   => '<span class="navigation-pipe"> <i class="ficon-angle-right"></i> </span>',
			'wrap_before' => '<div class="breadcrumb clearfix" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</div>',
			'before'      => '',
			'after'       => '',
			'home'        => __( 'Home', 'tokopress' ),
		);
	return $args;
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
 */
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<li class="link-cart">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'My Cart', 'tokopress' ); ?>" rel="nofollow" class="sb-toggle-right">
			<span class="link-text"><?php echo WC()->cart->cart_contents_count; ?></span>
			<span class="link-icon">
				<i class="ficon-bag"></i>
			</span>
		</a>
	</li>
	<?php
	
	$fragments['li.link-cart'] = ob_get_clean();
	
	return $fragments;
	
}

/**
 * Custom product column per row
 */
function tokopress_custom_loop_shop_columns() {
	if( "" == of_get_option( 'tokopress_wc_products_column_per_row' ) ){
		$shop_column = 4;
	} else {
		$shop_column = of_get_option( 'tokopress_wc_products_column_per_row' );
	}
	return $shop_column;
}
add_filter('loop_shop_columns', 'tokopress_custom_loop_shop_columns');

/**
 * Custom column per page
 */
function custom_loop_shop_per_page( $cols ) {
	$shop_per_page = of_get_option( 'tokopress_wc_products_per_page' );
	return $shop_per_page;
}
add_filter( 'loop_shop_per_page', 'custom_loop_shop_per_page', 20 );

/**
 * Hide products sale flash
 */
if( of_get_option( 'tokopress_wc_hide_products_sale_flash' ) )
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

/**
 * Show products new badge
 * Credit: jameskoster http://jameskoster.co.uk
 */
if( of_get_option( 'tokopress_wc_show_products_newbadge' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_new_badge', 30 );
}
function woocommerce_show_product_loop_new_badge() {
	$postdate 		= get_the_time( 'Y-m-d' );
	$postdatestamp 	= strtotime( $postdate );
	$newness 		= of_get_option( 'tokopress_wc_products_newness' );
	if ( intval( $newness ) <= 0 ) 
		$newness = 7;

	if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { 
		echo '<span class="badge-new">' . __( 'New', 'tokopress' ) . '</span>';
	}
}
	
/**
 * Hide products title
 */
if( of_get_option( 'tokopress_wc_hide_products_title' ) )
	add_action( 'tokopress_custom_styles', 'tokopress_wc_hide_shop_title' );

function tokopress_wc_hide_shop_title() {
	echo '.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3{ display:none; }';
}

/**
 * Hide products rating
 */
if( of_get_option( 'tokopress_wc_hide_products_rating' ) )
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/**
 * Hide products price
 */
if( of_get_option( 'tokopress_wc_hide_products_price' ) )
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

/**
 * Custom price format
 */
add_filter( 'woocommerce_sale_price_html', 'tokopress_wc_sale_price_html', 10, 2 );
add_filter( 'woocommerce_variation_sale_price_html', 'tokopress_wc_sale_price_html', 10, 2 );
function tokopress_wc_sale_price_html( $price, $product ) {
	$tax_display_mode      = get_option( 'woocommerce_tax_display_shop' );
	$display_price         = $tax_display_mode == 'incl' ? $product->get_price_including_tax() : $product->get_price_excluding_tax();
	$display_regular_price = $tax_display_mode == 'incl' ? $product->get_price_including_tax( 1, $product->get_regular_price() ) : $product->get_price_excluding_tax( 1, $product->get_regular_price() );
	$price =  '<ins>' . wc_price( $display_price ) . '</ins> <del>' . wc_price( $display_regular_price ) . '</del>' . $product->get_price_suffix();
	return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'tokopress_wc_variable_sale_price_html', 10, 2 );
function tokopress_wc_variable_sale_price_html( $price, $product ) {
	$from = false;
	$saleprices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	if ( $saleprices[0] !== $saleprices[1] )
		$from = true;
	$regprices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	if ( $regprices[0] !== $regprices[1] )
		$from = true;
	$price =  '<ins>' . wc_price( $saleprices[0] ) . '</ins> <del>' . wc_price( $regprices[0] ) . '</del>' . $product->get_price_suffix();
	if ( $from ) 
		$price =  sprintf( __( 'From: %1$s', 'tokopress' ), $price );
	return $price;
}
add_filter( 'woocommerce_variable_price_html', 'tokopress_wc_variable_price_html', 10, 2 );
function tokopress_wc_variable_price_html( $price, $product ) {
	$from = false;
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	if ( $prices[0] !== $prices[1] )
		$from = true;
	$price =  wc_price( $prices[0] ) . $product->get_price_suffix();
	if ( $from ) 
		$price =  sprintf( __( 'From: %1$s', 'tokopress' ), $price );
	return $price;
}

/**
 * DISABLE products "add to cart" button
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

/**
 * DISABLE result count
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/**
 * DISABLE catalog ordering
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Hide product sale flash
 */
if( of_get_option( 'tokopress_wc_hide_product_sale_flash' ) )
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/**
 * Hide product title
 */
if( of_get_option( 'tokopress_wc_hide_product_title' ) )
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * Hide Product Rating
 */
if( of_get_option( 'tokopress_wc_hide_product_rating' ) )
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

/**
 * Hide product excerpt
 */
if( of_get_option( 'tokopress_wc_hide_product_excerpt' ) )
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/**
 * Wrap single product price & addtocart
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_before_add_to_cart_form', 'tokopress_wc_before_add_to_cart_form' );
function tokopress_wc_before_add_to_cart_form() {
	global $product;
	$product_type = $product->product_type; 
	if ( $product_type == 'variable' ) 
		return;
	if( of_get_option( 'tokopress_wc_hide_product_price' ) && of_get_option( 'tokopress_wc_hide_product_cart_button' ) )
		return;
	echo '<div class="addtocart_wrap">';
	if( ! of_get_option( 'tokopress_wc_hide_product_price' ) ) {
		woocommerce_template_single_price();
	}
}
add_action( 'woocommerce_after_add_to_cart_form', 'tokopress_wc_after_add_to_cart_form' );
function tokopress_wc_after_add_to_cart_form() {
	global $product;
	$product_type = $product->product_type; 
	if ( $product_type == 'variable' ) 
		return;
	if( of_get_option( 'tokopress_wc_hide_product_price' ) && of_get_option( 'tokopress_wc_hide_product_cart_button' ) )
		return;
	echo '</div>';
}
add_action( 'woocommerce_before_single_variation', 'tokopress_wc_before_single_variation' );
function tokopress_wc_before_single_variation() {
	global $product;
	$from = false;
	$saleprices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	if ( $saleprices[0] !== $saleprices[1] )
		$from = true;
	$regprices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	if ( $regprices[0] !== $regprices[1] )
		$from = true;
	if ( !$from )
		woocommerce_template_single_price();
}

/**
 * DISABLE "add to cart" button
 */
if( of_get_option( 'tokopress_wc_hide_product_cart_button' ) )
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

/**
 * DISABLE product meta (categories/tags)
 */
if( of_get_option( 'tokopress_wc_hide_product_meta_tags' ) )
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * DISABLE related products
 */
if( of_get_option( 'tokopress_wc_hide_related_products' ) )
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/**
 * SET related product limit number
 */
function tokopress_related_product_number() {

	if( "" == of_get_option( 'tokopress_wc_products_related_number' ) ) :
		$posts_per_page = 6;
	else :
		$posts_per_page = of_get_option( 'tokopress_wc_products_related_number' );
	endif;

	$args = array(
			'post_type' => 'product',
			'posts_per_page' => $posts_per_page
		);
	return $args;
}
add_filter( 'woocommerce_related_products_args', 'tokopress_related_product_number' );

/**
 * SET realated column product
 */
if ( ! function_exists( 'woocommerce_output_related_products' ) ) {
	function woocommerce_output_related_products() {
		global $woocommerce;
		$posts_per_page = of_get_option('tokopress_wc_products_related_number');
		if ( !$posts_per_page ) $posts_per_page = 4; 
		$columns = of_get_option('tokopress_wc_products_related_column');
		if ( !$columns ) $columns = 4; 
		if ( is_object( $woocommerce ) && version_compare( $woocommerce->version, '2.1', '>=' ) ) {
			woocommerce_related_products( $args = array(
					'posts_per_page' => $posts_per_page,
					'columns' => $columns,
					'orderby' => 'rand'
				)
			);
		}
		else {
			woocommerce_related_products( $posts_per_page, $columns );
		}
	}
}

/**
 * Add related products column body class.
 */
function tokopress_wc_related_body_class( $classes ) {
	if ( !is_product() ) return $classes;
	$columns = of_get_option( 'tokopress_wc_products_related_column' );
	if ( !$columns ) $columns = 4; 
	$classes[] = 'woocommerce-related-col-'.$columns;
	return $classes;
}
add_filter( 'body_class', 'tokopress_wc_related_body_class' );

/**
 * DISABLE up-sells products
 */
if( of_get_option( 'tokopress_wc_hide_upsells_products' ) )
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

/**
 * SET per-page and column up-sells product
 */
function woocommerce_upsell_display( $posts_per_page = 4, $columns = 4, $orderby = 'rand' ) {
	$posts_per_page = of_get_option('tokopress_wc_products_upsells_number');
	if ( !$posts_per_page ) $posts_per_page = 4; 
	$columns = of_get_option('tokopress_wc_products_upsells_column');
	if ( !$columns ) $columns = 4; 
	woocommerce_get_template( 'single-product/up-sells.php', array(
			'posts_per_page'  => $posts_per_page,
			'orderby'    => $orderby,
			'columns'    => $columns
		) );
}

/**
 * Add up-sells column body class.
 */
function tokopress_wc_upsells_body_class( $classes ) {
	if ( !is_product() ) return $classes;
	$columns = of_get_option( 'tokopress_wc_products_upsells_column' );
	if ( !$columns ) $columns = 4; 
	$classes[] = 'woocommerce-upsells-col-' . $columns;
	return $classes;
}
add_filter( 'body_class', 'tokopress_wc_upsells_body_class' );

/**
 * DISABLE cross-sells product on cart page
 */
if( of_get_option( 'tokopress_wc_hide_crosssells_products' ) )
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

/**
 * Add cross-sells column body class.
 */
function tokopress_wc_crosssells_body_class( $classes ) {
	if ( !is_cart() ) return $classes;
	$columns = of_get_option( 'tokopress_wc_products_crosssells_column' );
	if ( !$columns ) $columns = 3; 
	$classes[] = 'woocommerce-crosssells-col-' . $columns;
	return $classes;
}
add_filter( 'body_class', 'tokopress_wc_crosssells_body_class' );

/**
 * Display Sub Categories
 */
function tokopress_wc_sub_categories() {
	
	if( have_posts() ) :
		
		$category_id = get_queried_object();
		$args = array(
				'hierarchical' => 1,
			    'show_option_none' => '',
			    'hide_empty' => 0,
			    'parent' => $category_id->term_id,
			    'taxonomy' => 'product_cat'
			);
		$get_sub_categories = get_categories( $args );

		?>

		<div id="sub-categories">
			<h3>Subcategories</h3>
			<ul class="sub-categori-list">

				<?php

				foreach ($get_sub_categories as $sub_categories) {
					echo '<li><a href="" title="' . $sub_categories->cat_name . '">' . $sub_categories->cat_name . '</a></li>';
				}

				?>
			
			</ul>
		</div>
		<?php
	
	endif;
}
// add_action( 'woocommerce_archive_description', 'tokopress_wc_sub_categories', 15 );

add_filter( 'woocommerce_product_thumbnails_columns', 'tokopress_product_thumbnails_columns' );
function tokopress_product_thumbnails_columns( $columns ) {
	return 4;
}
add_filter( 'woocommerce_cross_sells_columns', 'tokopress_cross_sells_columns' );
function tokopress_cross_sells_columns( $columns ) {
	return 3;
}
add_filter( 'woocommerce_cross_sells_total', 'tokopress_cross_sells_total' );
function tokopress_cross_sells_total( $total ) {
	return 3;
}

function woocommerce_product_archive_description() {
	if ( get_query_var( 'vendor_shop' ) ) {
		return;
	}
	if ( get_query_var( 's' ) ) {
		return;
	}
	if ( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
		$shop_page   = get_post( wc_get_page_id( 'shop' ) );
		if ( $shop_page ) {
			$content = $shop_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			if ( $content ) {
				echo '<div class="page-description">' . $content . '</div>';
			}
		}
	}
}
