<div class="sb-slidebar sb-right sb-style-push">
	<?php 
		if ( class_exists('woocommerce') ) {
			$instance = array('title' => 'My Cart', 'number' => 999);
			$args = array('before_widget' => '<div class="widget widget_shopping_cart woocommerce group">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget_title">', 'after_title' => '</h4>');
			$tp_minicart = new WC_Widget_Cart();
			$tp_minicart->number = $instance['number'];
			$tp_minicart->widget($args,$instance);
		}
	?>
</div>
