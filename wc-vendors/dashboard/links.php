<h2><?php _e( 'Control Center', 'tokopress' ); ?></h2>

<div class="shortcut-vendor">
	<a href="<?php echo esc_url( $shop_page ); ?>" class="button alt"><?php _e( 'My shop', 'tokopress' ); ?></a>
	<a href="<?php echo esc_url( $settings_page ); ?>" class="button alt"><?php _e( 'My settings', 'tokopress' ); ?></a>

	<?php if ( $can_submit ) { ?>
		<a target="_TOP" href="<?php echo esc_url( $submit_link ); ?>" class="button alt"><?php _e( 'Submit a product', 'tokopress' ); ?></a>
	<?php } ?>

</div>
