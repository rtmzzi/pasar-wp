<div class="site-header">

	<div class="site-header-top">
		<div class="container">
			<div class="header-logo">
				<a href="<?php echo home_url(); ?>">
					<?php if( of_get_option( 'tokopress_header_logo' ) ) : ?>
						<img class="logo" src="<?php echo of_get_option( 'tokopress_header_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php else : ?>
						<h2 class="site-title"><?php bloginfo( 'name' ); ?></h2>
					<?php endif; ?>
				</a>
			</div>
			<div class="header-links">
				<ul>
					<li class="link-menu visible-sm visible-xs">
						<a rel="nofollow" class="sb-toggle-left" href="javascript:void(0)">
							<span class="link-icon">
								<i class="ficon-menu"></i>
							</span>
							<span class="link-text">
								<?php _e( 'Menu', 'tokopress' ); ?>
							</span>
						</a>
					</li>
					<?php if( !of_get_option( 'tokopress_header_additional_disable' ) && class_exists( 'woocommerce' ) ) : ?>
						<?php if ( is_user_logged_in() ) : ?>
							<li class="link-account visible-md visible-lg">
								<a rel="nofollow" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
									<span class="link-icon">
										<i class="ficon-user"></i>
									</span>
									<span class="link-text hidden-xs"><?php printf ( __( 'Hello, %s', 'tokopress' ), wp_get_current_user()->display_name ); ?>
									</span>
								</a>
								<ul class="sub-menu">
									<li class="link-account">
										<a rel="nofollow" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" title="<?php _e( 'minha conta', 'tokopress' ) ?>">
											<?php _e( 'minha conta', 'tokopress' ); ?>
										</a>
									</li>
																		
									<?php do_action( 'tokopress_vendor_quicknav_account' ); ?>

									<li class="link-signout">
										<a rel="nofollow" href="<?php echo wp_logout_url(home_url('/')); ?>" title="<?php _e( 'Sign out', 'tokopress' ); ?>">
											<?php _e( 'Sign out', 'tokopress' ); ?>
										</a>
									</li>
								
								</ul>
							</li>
						<?php else : ?>
							<li class="link-account visible-md visible-lg">
								<a rel="nofollow" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" title="<?php _e( 'minha conta', 'tokopress' ) ?>">
									<span class="link-icon">
										<i class="ficon-user"></i>
									</span>
									<span class="link-text hidden-xs">
										<?php _e( 'minha conta', 'tokopress' ); ?>
									</span>
								</a>
							</li>
						<?php endif; ?>
					<?php endif; ?>


					<?php if( !of_get_option( 'tokopress_wc_minicart_disable' ) && class_exists( 'woocommerce' ) && !is_cart() && !is_checkout() ) : ?>
						<li class="link-cart">
							<a rel="nofollow" class="<?php echo ( is_cart() || is_checkout() ? '' : 'sb-toggle-right' ) ?>" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="<?php _e( 'My Cart', 'tokopress' ) ?>">
								<span class="link-icon">
									<i class="ficon-bag"></i>
								</span>
                                <span class="link-text">
									<?php echo WC()->cart->cart_contents_count; ?>
								</span>
								
							</a>
						</li>
                    
					<?php endif; ?>
                    <li><div class="btnLoja"><a href="http://www.yumm.com.br/quero-vender" title="Criar loja online">Criar Loja</a></div></li>
				</ul>
			</div>
		</div>
	</div>

	<?php if ( get_the_ID() && ( is_page() || is_front_page() || is_home() ) ) : ?>
		<?php $header_custom = get_post_meta( get_the_ID(), '_tokopress_header_custom', true ); ?>
		<?php if ( trim( $header_custom ) ) : ?>
			<div class="site-header-bottom">
				<div class="container">
					<?php echo do_shortcode( $header_custom ); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
