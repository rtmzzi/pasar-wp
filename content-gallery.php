<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$args = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => get_the_ID(),
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1,
	);
	$attachments = get_children( $args ); ?>

	<?php if( $attachments ) : ?>
		<?php wp_enqueue_script( 'tokopress-js-owlcarousel' ); ?>
		<div class="framebox gallery-post">
			<ul>
				<?php foreach ( $attachments as $attachment ) { ?>
					<li>
						<?php echo wp_get_attachment_image( $attachment->ID, 'blog-featured', false, false ); ?>
					</li>
				<?php } ?>
			</ul>
		</div><!-- .framebox -->
	<?php endif; ?>

	<?php if ( is_singular() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php endif; ?>

	<?php if ( is_singular() ) : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'tokopress' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'tokopress' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	<?php else : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" class="read-more-link"><?php _e( 'Read More', 'tokopress' ); ?></a>
		</div>
	<?php endif; ?>

	<div class="entry-meta">
		<?php tokopress_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'tokopress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>

</div>
