<?php
/**
 * Template Name: Contact Form
 */

get_header() ?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="content">

				<?php if ( have_posts() ) : ?>
					<?php if( !of_get_option( 'tokopress_disable_map' ) ) : ?>
						<?php 
							$latitude = of_get_option( 'tokopress_contact_lat' );
							$longitude = of_get_option( 'tokopress_contact_long' );

							$get_marker_title = of_get_option( 'tokopress_contact_marker_title' );
							$get_marker_content = of_get_option( 'tokopress_contact_marker_desc' );
							$get_zoom = 15;
						 ?>
						<script type="text/javascript">
						var map;
						jQuery(document).ready(function(){
							if( typeof window.google === 'object' && window.google.maps ) {
								map = new GMaps({
									el: '#map',
									lat: <?php $map_latitude = ( ! empty( $latitude ) ) ? $latitude : -6.903932 ; echo esc_attr( $map_latitude ); ?>,
									lng: <?php $map_longitude = ( ! empty( $longitude ) ) ? $longitude : 107.610344 ; echo esc_attr( $map_longitude ); ?>,
									zoom :<?php echo esc_attr( $get_zoom ); ?>
								});

								<?php
									$marker_title = ( ! empty( $get_marker_title ) ) ? $get_marker_title : 'Marker Title' ;
									$clear_marker_title = str_replace( "\r\n", "<br/>", $marker_title );
								?>

								<?php
									$marker_content = ( ! empty( $get_marker_content ) ) ? $get_marker_content : 'Marker Content' ;
									$clear_marker_content = str_replace( "\r\n", "<br/>", $marker_content );
								?>

								var markerTitle = "<?php printf( '<h2>%s</h2>', $clear_marker_title ); ?>";
								var markerContent = "<?php printf( '<p>%s</p>', $clear_marker_content ); ?>";

								map.addMarker({
									lat: <?php echo esc_attr( $map_latitude ); ?>,
									lng: <?php echo esc_attr( $map_longitude ); ?>,
									infoWindow: {
										content: markerTitle + markerContent,
									}
								});
							}
						});
						</script>
					<?php endif; ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if( !of_get_option( 'tokopress_disable_map' ) ) : ?>
								<div class="map-section map-block">		
									<div id="map" style="height:500px;"></div>
								</div><!-- Maps Section -->
							<?php endif; ?>

							<?php if( !of_get_option( 'tokopress_disable_title_contact' ) ) : ?>
								<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php endif; ?>
							
							<div class="entry-content">
								<?php the_content(); ?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'tokopress' ),
										'after'  => '</div>',
									) );
								?>
							</div>					
						</div>	
						
					<?php endwhile; ?>

					<?php
					$current_page_id = $wp_query->get_queried_object_id();
					
					$args = array();

					$email = tokopress_get_post_meta( '_toko_contact_email', $current_page_id );
					if ( $email ) $args['email'] = $email;

					$subject = tokopress_get_post_meta( '_toko_contact_subject', $current_page_id );
					if ( $subject ) $args['subject'] = $subject;

					$sendcopy = tokopress_get_post_meta( '_toko_contact_sendcopy', $current_page_id );
					if ( $sendcopy ) $args['sendcopy'] = $sendcopy;

					$button_text = tokopress_get_post_meta( '_toko_contact_button', $current_page_id );
					if ( $button_text ) $args['button_text'] = $button_text;

					echo tokopress_get_contact_form( $args );
					?>
					<!-- Contact Form -->
				
				<?php else : ?>
					
					<?php get_template_part( 'content', 'not-found' ); ?>
				
				<?php endif; ?>
		
				</div>
			</div>

			<?php get_sidebar() ?>

		</div>
	</div>
</div>

<?php get_footer() ?>
