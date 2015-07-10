<?php get_header() ?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="content">

					<?php if ( have_posts() ) : ?>
					
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
							<?php get_template_part( 'block', 'author-bio' ); ?>
							<?php get_template_part( 'block', 'related-posts' ); ?>
							<?php comments_template( '', true ); ?>
						<?php endwhile; ?>
						<?php tokopress_paging_nav(); ?>
					
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
