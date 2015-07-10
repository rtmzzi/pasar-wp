<?php
/**
 * Template Name: Visual Composer
 */

get_header(); ?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'not-found' ); ?>
					<?php endif; ?>
		
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>
