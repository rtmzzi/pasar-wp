<div class="topnav hidden-sm hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-6 topnav-left">
				<?php if( "" !== of_get_option( 'topnav_phone' ) ) : ?>
					<span class="phone"><i class="ficon-phone"></i><?php echo of_get_option( 'topnav_phone' ); ?></span>
				<?php endif ?>
				<?php if( "" !== of_get_option( 'topnav_email' ) ) : ?>
					<span class="email"><i class="ficon-mail"></i><?php echo of_get_option( 'topnav_email' ); ?></span>
				<?php endif ?>
			</div>
			<div class="col-md-6 topnav-right">
				<?php if( has_nav_menu( 'topnav' ) ) : ?>
					<?php
					$args = array(
						'theme_location' 	=> 'topnav',
						'fallback_cb' 		=> '',
						'container'       	=> false,
						'menu_class'      	=> 'topnav-menu',
						'menu_id'         	=> 'topnav-menu'
					);
					wp_nav_menu( $args );
					?>
				<?php endif; ?>
				<?php if( !of_get_option( 'topnav_social_disable' ) ) : ?>
					<?php
					$socials = array(
						'facebook'		=> 'Facebook',
						'twitter'		=> 'Twitter',
						'google-plus'	=> 'Google Plus',
						'linkedin'		=> 'LinkedIn',
						'instagram'		=> 'Instagram',
						'pinterest'		=> 'Pinterest',
						'youtube'		=> 'Youtube',
						'vimeo'			=> 'Vimeo',
						'tumblr'		=> 'Tumblr',
						'foursquare'	=> 'Foursquare',
						'reddit'		=> 'Reddit',
						'vk'			=> 'VK',
					);
					?>
					<?php $numbers = count( $socials ); ?>
					<?php $social_output = ''; ?>
					<?php for ( $i = 1; $i <= $numbers; $i++ ) : ?>
						<?php $social = of_get_option( "topnav_social_{$i}" ); ?>
						<?php $social_url = of_get_option( "topnav_social_{$i}_url" ); ?>
						<?php 
							if ( $social && isset( $socials[$social] ) ) {
								$social_output .= '<a href="' . ( $social_url ? esc_url( $social_url ) : '#' ) . '" title="' . $socials[$social] . '" class="' . $social . '"><i class="ficon-' . $social . '"></i></a>';
							}
						?>
					<?php endfor; ?>
					<?php if ( $social_output ) printf( '<span class="topnav-social">%s</span>', $social_output ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
