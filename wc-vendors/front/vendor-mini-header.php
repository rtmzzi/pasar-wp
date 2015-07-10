<?php
/**
 *  Vendor Mini Header - Hooked into archive-product page
 *
 * @author WCVendors
 * @package WCVendors
 * @version 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
*	Template Variables available
*   $shop_name : pv_shop_name
*   $shop_description : pv_shop_description (completely sanitized)
*   $vendor_id  : current vendor id for customization
*/

?>

<div class="shop_description pv_shop_description">
	<?php if ( ! of_get_option( 'tokopress_wc_hide_products_header' ) ) : ?>
        <h2 class="page-heading"><?php echo esc_attr( $shop_name ); ?></h1>
    <?php endif; ?>

	<div class="wcv_shop_description">
		<?php echo wpautop( $shop_description ); ?>
	</div>

	<?php if ( of_get_option( 'tokopress_wcvendors_product_profile' ) != 'no' ) : ?>
		<?php $author = WCV_Vendors::get_vendor_from_product( get_the_ID() ); $user = get_userdata( $author ); ?>
        <p class="user-social">
        <?php if( $user->facebook_url ) : ?>
            <span class="user-facebook"><a rel="nofollow" href="<?php echo esc_url( $user->facebook_url ); ?>"><i class="icon ficon-facebook"></i></a></span>
        <?php endif; ?>

        <?php if( $user->twitter_url ) : ?>
            <span class="user-twitter"><a rel="nofollow" href="<?php echo esc_url( $user->twitter_url ); ?>"><i class="icon ficon-twitter"></i></a></span>
        <?php endif; ?>

        <?php if( $user->gplus_url ) : ?>
            <span class="user-googleplus"><a rel="nofollow" href="<?php echo esc_url( $user->gplus_url ); ?>"><i class="icon ficon-google-plus"></i></a></span>
        <?php endif; ?>

        <?php if( $user->phone_number && ( of_get_option( 'tokopress_wcvendors_phone' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_phone' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<span class="user-phone"><i class="icon ficon-phone2"></i> '.$user->phone_number.'</span>'; ?>
	    <?php endif; ?>

        <?php if( $user->user_email && ( of_get_option( 'tokopress_wcvendors_email' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_email' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<span class="user-email"><i class="icon ficon-mail2"></i> '.antispambot($user->user_email).'</span>'; ?>
	    <?php endif; ?>

        <?php if( $user->user_url && ( of_get_option( 'tokopress_wcvendors_url' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_url' ) == 'loggedin' ) ) ) : ?>
		    <?php echo '<span class="user-url"><i class="icon ficon-link"></i> <a rel="nofollow" href="'.$user->user_url.'">'.$user->user_url.'</a></span>'; ?>
	    <?php endif; ?>
        </p>
    <?php endif; ?>

</div>
