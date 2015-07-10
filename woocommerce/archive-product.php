<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( ! ( of_get_option( 'tokopress_wc_hide_products_header' ) && is_shop() && !is_search() && ! get_query_var( 'vendor_shop' ) ) ) : ?>
			<div class="page-header">
				<h1 class="page-heading"><?php woocommerce_page_title(); ?></h1>
				<?php woocommerce_breadcrumb(); ?>
			</div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20 - removed
				 * @hooked woocommerce_catalog_ordering - 30 - removed
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php if ( woocommerce_products_will_display() ) : ?>
				<?php if ( !of_get_option( 'tokopress_wc_hide_result_count' ) || !of_get_option( 'tokopress_wc_hide_catalog_ordering' ) ) : ?>
					<div class="section_before_shop_loop clearfix">
						<?php if ( !of_get_option( 'tokopress_wc_hide_result_count' ) ) : ?>
							<?php woocommerce_result_count(); ?>
						<?php endif; ?>
						<?php if ( !of_get_option( 'tokopress_wc_hide_catalog_ordering' ) ) : ?>
							<?php woocommerce_catalog_ordering(); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<div class="section_after_shop_loop clearfix">
			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
			</div>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
