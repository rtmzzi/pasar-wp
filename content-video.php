<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="framebox">
		<?php echo hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true, 'width' => 920, 'height' => 350 ) ); ?>
	</div>

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
