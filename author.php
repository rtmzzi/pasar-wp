<?php
/**
 * Author/User page
 */

$user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

get_header(); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="content">

					<section class="content-area" id="primary">
						<div class="section-user-biography">
							<div class="user-biography">
							    <?php if ( $user->user_description ) : ?>
								    <?php echo wpautop( $user->user_description ); ?>
							    <?php else : ?>
							    	<?php printf( __( '%s does not have personal biography.', 'tokopress' ), $user->display_name ); ?>
							    <?php endif; ?>
							</div>
						    <?php do_action( 'tokopress_section_user_biography' ); ?>
						</div>
					</section>
				
				</div>
			</div>

			<div class="col-md-3 col-md-pull-9">

				<aside class="sidebar" id="secondary" role="complementary">
					<div class="section-user-detail">
						<div class="user-detail">
					        <?php echo get_avatar( get_the_author_meta( 'user_email', $user->ID ), 90 ); ?>
					        <h2><?php echo esc_attr( $user->display_name ); ?></h2>
						</div>
					    <?php if ( $user->facebook_url || $user->twitter_url || $user->gplus_url ) : ?>
					        <p class="user-social social-share">
					            <?php if( $user->facebook_url ) : ?>
					                <span class="user-facebook"><a rel="nofollow" href="<?php echo esc_url( $user->facebook_url ); ?>"><i class="icon ficon-facebook"></i></a></span>
					            <?php endif; ?>

					            <?php if( $user->twitter_url ) : ?>
					                <span class="user-twitter"><a rel="nofollow" href="<?php echo esc_url( $user->twitter_url ); ?>"><i class="icon ficon-twitter"></i></a></span>
					            <?php endif; ?>

					            <?php if( $user->gplus_url ) : ?>
					                <span class="user-googleplus"><a rel="nofollow" href="<?php echo esc_url( $user->gplus_url ); ?>"><i class="icon ficon-google-plus"></i></a></span>
					            <?php endif; ?>
					        </p>
					    <?php endif; ?>

				        <?php if( $user->phone_number && ( of_get_option( 'tokopress_wcvendors_phone' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_phone' ) == 'loggedin' ) ) ) : ?>
						    <?php echo '<p class="user-social"><span class="user-phone"><i class="icon ficon-phone2"></i> '.$user->phone_number.'</span></p>'; ?>
					    <?php endif; ?>

				        <?php if( $user->user_email && ( of_get_option( 'tokopress_wcvendors_email' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_email' ) == 'loggedin' ) ) ) : ?>
						    <?php echo '<p class="user-social"><span class="user-email"><i class="icon ficon-mail2"></i> '.antispambot($user->user_email).'</span></p>'; ?>
					    <?php endif; ?>

				        <?php if( $user->user_url && ( of_get_option( 'tokopress_wcvendors_url' ) == 'yes' || ( is_user_logged_in() && of_get_option( 'tokopress_wcvendors_url' ) == 'loggedin' ) ) ) : ?>
						    <?php echo '<p class="user-social"><span class="user-url"><i class="icon ficon-link"></i> <a rel="nofollow" href="'.$user->user_url.'">'.$user->user_url.'</a></span></p>'; ?>
					    <?php endif; ?>

					    <?php do_action( 'tokopress_section_user_detail' ); ?>
					</div>
				</aside>
			
			</div>
		</div>
	</div>
</div>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
