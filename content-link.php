<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		$url = $thumb['0'];

		if( !empty( $url ) ) {
			$bg_content = $url;
		} else {
			$bg_content = 'http://placehold.it/920x350&text=featured+image';
		}
	?>

	<div class="post-format-bg" style="background: url(<?php echo esc_url( $bg_content ); ?>)">
		<div class="box-post-content post-link">
			<?php the_content(); ?>
		</div>
	</div>

	<?php if ( is_singular() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

	<div class="entry-meta">
		<?php tokopress_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'tokopress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>

</div>
