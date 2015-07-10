<div class="post-not-found">
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<h2 class="entry-title"><?php _e( 'Not Found', 'tokopress' ); ?></h2>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tokopress' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<h2 class="entry-title"><?php _e( 'No Results', 'tokopress' ); ?></h2>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tokopress' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<h2 class="entry-title"><?php _e( 'Not Found', 'tokopress' ); ?></h2>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tokopress' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div>
