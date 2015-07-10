<?php
$terms = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

$taxonomy = 'category';
$taxarray = $terms;

if( empty( $terms ) )
	return;

$args = array(
		'post_type'			=> 'post',
		'posts_per_page'	=> 2,
		'tax_query'			=> array(
								array(
									'taxonomy'=> $taxonomy,
									'terms'=> $taxarray,
									'field'=> 'id'
								)
							),
		'post__not_in'		=> array( get_the_ID() ),
		'orderby'			=>'title',
		'order'				=>'rand'
	);
$query = new WP_Query( $args );
?>

<?php if( $query->have_posts() ) : ?>

	<section class="related-posts">
		<h3 class="section-title"><?php _e( 'Related Posts', 'tokopress' ); ?></h3>

		<div class="tpvc-post-row row">

		<?php $i = 0; ?>
		<?php while ( $query->have_posts() ) : ?>
			<?php $query->the_post(); ?>
			<?php $i++; ?>

			<div class="tpvc-post col-sm-6">
				<div class="tpvc-post-image">
					<a href="<?php echo get_permalink(); ?>">
					<?php if( has_post_thumbnail( get_the_ID() ) ) : ?>
						<?php echo get_the_post_thumbnail( get_the_ID(), 'blog-thumbnail' ); ?>
					<?php else : ?>
						<img src="http://placehold.it/490x270" alt="<?php echo get_the_title(); ?>">
					<?php endif; ?>
					</a>
				</div>

				<div class="tpvc-post-detail">
					<h3 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="post-date"><?php echo get_the_date(); ?></span>
					<p><?php echo wp_trim_words( get_the_excerpt(), 17, '&hellip;' ); ?></p>
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="more-link"><i class="ficon-arrow-right"></i></a>
				</div>
			</div>
		
			<?php if ( $i%2 == 0 ) : ?>
				<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
			<?php endif; ?>
				
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		</div>

	</section>

<?php endif; ?>