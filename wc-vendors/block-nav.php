<li>
    <a rel="nofollow" href="<?php echo get_edit_user_link(); ?>">
        <?php _e( 'My Profile', 'tokopress' ); ?>
    </a>
</li>
<li>
    <a rel="nofollow" href="<?php echo get_permalink( WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ) ); ?>">
        <?php _e( 'My Dashboard', 'tokopress' ); ?>
    </a>
</li>
<li>
    <a rel="nofollow" href="<?php echo WCV_Vendors::get_vendor_shop_page( wp_get_current_user()->user_login ); ?>">
        <?php _e( 'My Shop', 'tokopress' ); ?>
    </a>
</li>
<li>
    <a rel="nofollow" href="<?php echo get_permalink( WC_Vendors::$pv_options->get_option( 'shop_settings_page' ) ); ?>">
        <?php _e( 'My Settings', 'tokopress' ); ?>
    </a>
</li>
<?php $can_submit = WC_Vendors::$pv_options->get_option( 'can_submit_products' ); ?>
<?php if ( $can_submit ) : ?>
    <li>
        <a rel="nofollow" href="<?php echo admin_url( 'post-new.php?post_type=product' ); ?>">
            <?php _e( 'Submit a Product', 'tokopress' ); ?>
        </a>
    </li>
<?php endif; ?>
