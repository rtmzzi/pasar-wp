<?php $author_id = get_queried_object()->post_author; ?>
<section class="author-bio clearfix">
	<h3 class="section-title"><?php _e( 'About The Author', 'tokopress' ); ?></h3>
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email', $author_id ), 150 ); ?>
	</div>
	<div class="author-description">
		<h4><?php echo get_the_author_meta( 'display_name', $author_id ); ?></h4>
		<?php if( get_the_author_meta( 'description', $author_id ) ) : ?>
			<p>
				<?php echo get_the_author_meta( 'description', $author_id ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>
