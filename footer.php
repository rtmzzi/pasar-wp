		<!-- Top Footer Widget -->
		<?php if( !of_get_option( 'footer_widgets_top_disable' ) ) get_template_part( 'block-footer-widgets-top' ); ?>
		<!-- Bottom Footer Widget -->
		<?php if( !of_get_option( 'footer_widgets_bottom_disable' ) ) get_template_part( 'block-footer-widgets-bottom' ); ?>
		<!-- Site Footer -->	
		<?php if( !of_get_option( 'footer_disable' ) ) get_template_part( 'block-footer' ); ?>
	</div>
	
	<!-- Back To Top -->
	<div id="back-top"><i class="ficon-angle-up"></i></div>
	<?php get_template_part( 'block-slidebar-left' ); ?>
	<?php get_template_part( 'block-slidebar-right' ); ?>
	
	<?php wp_footer(); ?>
</body>
</html>
