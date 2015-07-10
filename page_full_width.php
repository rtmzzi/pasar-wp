<?php
/**
 * Template Name: Full Width
 */

get_header(); ?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h1 class="entry-title"><?php the_title(); ?></h1>
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
					<?php else : ?>
						<?php get_template_part( 'content', 'not-found' ); ?>
					<?php endif; ?>
		
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>
