<?php if( !class_exists("woocommerce") ) return; ?>

<!-- MODULE Block cart -->
<div class="shopping_cart ">
	<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="View my shopping cart" rel="nofollow" class="cart-contentsxxx">
		<span class="ajax_cart_no_product"><?php echo WC()->cart->cart_contents_count; ?></span>
	</a>	
	<?php if( !is_cart() && !is_checkout() && class_exists("WC_Widget_Cart") ) : ?>
		<div class="cart_block">
			<div class="block_content">
				<!-- block list of products -->
				<div class="cart_block_list">
					<?php 
					$instance = array('title' => '', 'number' => 999);
					$args = array('before_widget' => '<div class="widget_shopping_cart woocommerce group">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget_title">', 'title' => '', 'after_title' => '</h4>');
					$prima_minicart = new WC_Widget_Cart();
					$prima_minicart->number = $instance['number'];
					$prima_minicart->widget($args,$instance);
					?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
