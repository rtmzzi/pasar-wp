<?php
/**
 * TokoPress WooCommerce Options
 *
 * @package WooCommerce Options
 */

/**
 * Woocommerce Tab Options
 */
function tokopress_woocommerce_settings( $options ) {
	$options[] = array(
		'name' 	=> __( 'WooCommerce', 'tokopress' ),
		'type' 	=> 'heading'
	);

		$options[] = array(
			'name' => __( 'Shop Title', 'tokopress' ),
			'desc' => __( 'HIDE page title on the main shop page', 'tokopress' ),
			'id' => 'tokopress_wc_hide_products_header',
			'std' => '0',
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Shop Sidebar', 'tokopress' ),
			'desc' 	=> __( 'ENABLE shop sidebar', 'tokopress' ),
			'id' 	=> 'tokopress_wc_show_shop_sidebar',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products Per Page', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_per_page',
			'std' 	=> '12',
			'type' 	=> 'text'
		);
		$options[] = array(
			'name' 	=> __( 'Products Column Per Row', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_column_per_row',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				)
		);
		$options[] = array(
			'name' 	=> __( 'Products New Badge', 'tokopress' ),
			'desc' 	=> __( 'ENABLE produts new badge', 'tokopress' ),
			'id' 	=> 'tokopress_wc_show_products_newbadge',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products Newness', 'tokopress' ),
			'desc' 	=> __( 'Display product new badge for how many days?', 'tokopress' ),
			'id' 	=> 'tokopress_wc_products_newness',
			'std' 	=> '7',
			'type' 	=> 'text'
		);
		$options[] = array(
			'name' 	=> __( 'Products Sale Flash', 'tokopress' ),
			'desc' 	=> __( 'DISABLE products sale flash', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_products_sale_flash',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products Title', 'tokopress' ),
			'desc' 	=> __( 'DISABLE products title', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_products_title',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products Rating', 'tokopress' ),
			'desc' 	=> __( 'DISABLE products rating', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_products_rating',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products Price', 'tokopress' ),
			'desc' 	=> __( 'DISABLE products price', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_products_price',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Products "Add To Cart" Button', 'tokopress' ),
			'desc' 	=> __( 'DISABLE products "add to cart" button', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_products_cart_button',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Result Count', 'tokopress' ),
			'desc' 	=> __( 'DISABLE result count message', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_result_count',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Catalog Ordering', 'tokopress' ),
			'desc' 	=> __( 'DISABLE catalog ordering dropdown', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_catalog_ordering',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

	$options[] = array(
		'name' 	=> __( 'WooCommerce - Product Category', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Category Title', 'tokopress' ),
			'desc' 	=> __( 'DISABLE category title', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_cat_title',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Category Count', 'tokopress' ),
			'desc' 	=> __( 'DISABLE category count', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_cat_count',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Category Button', 'tokopress' ),
			'desc' 	=> __( 'DISABLE category button', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_cat_button',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

	$options[] = array(
		'name' 	=> __( 'WooCommerce - Single Product', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Product Sidebar', 'tokopress' ),
			'desc' 	=> __( 'ENABLE product sidebar', 'tokopress' ),
			'id' 	=> 'tokopress_wc_show_product_sidebar',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Sale Flash', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product sale flash', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_sale_flash',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Title', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product title', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_title',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Rating', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product rating', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_rating',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Excerpt', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product excerpt', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_excerpt',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Price', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product price', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_price',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product "Add To Cart" Button', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product "add to cart" button', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_cart_button',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Product Meta (categories/tags)', 'tokopress' ),
			'desc' 	=> __( 'DISABLE product meta (categories/tags)', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_product_meta_tags',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

	$options[] = array(
		'name' 	=> __( 'WooCommerce - Related Product', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Related Products', 'tokopress' ),
			'desc' 	=> __( 'DISABLE related products on single product page', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_related_products',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Number of Related Products', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_related_number',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10'
				)
		);
		$options[] = array(
			'name' 	=> __( 'Related Products Columns Per Row', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_related_column',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				)
		);

	$options[] = array(
		'name' 	=> __( 'WooCommerce - Up-Sells Product', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Up-Sells', 'tokopress' ),
			'desc' 	=> __( 'DISABLE up-sells products on single product page', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_upsells_products',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);
		$options[] = array(
			'name' 	=> __( 'Number of Up-Sells Products', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_upsells_number',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10'
				)
		);
		$options[] = array(
			'name' 	=> __( 'Up-Sells Products Columns Per Row', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_upsells_column',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				)
		);

	$options[] = array(
		'name' 	=> __( 'WooCommerce - Cross-Sells Product', 'tokopress' ),
		'type' 	=> 'info'
	);

		$options[] = array(
			'name' 	=> __( 'Cross-Sells', 'tokopress' ),
			'desc' 	=> __( 'DISABLE Cross-sells products on cart page', 'tokopress' ),
			'id' 	=> 'tokopress_wc_hide_crosssells_products',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'Cross-Sells Products Columns Per Row', 'tokopress' ),
			'desc' 	=> '',
			'id' 	=> 'tokopress_wc_products_crosssells_column',
			'std' 	=> '4',
			'type' 	=> 'select',
			'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
				)
		);

	return $options;
}
add_filter( 'of_options', 'tokopress_woocommerce_settings' );
