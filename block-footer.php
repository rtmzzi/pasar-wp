<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 footer-left">
				<?php if ( of_get_option( 'footer_left' ) ) : ?>
					<?php echo wpautop( of_get_option( 'footer_left' ) ); ?>
				<?php else : ?>
					<p><?php _e( 'Copyright &copy; Pasar &amp; TokoPress', 'tokopress' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-sm-6 footer-right">
				<?php if ( of_get_option( 'footer_right' ) ) : ?>
					<?php echo wpautop( of_get_option( 'footer_right' ) ); ?>
				<?php else : ?>
					<p><img src="<?php echo get_template_directory_uri() ?>/img/payment.png" alt="payment"></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>
