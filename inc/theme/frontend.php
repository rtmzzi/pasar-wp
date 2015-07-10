<?php
/**
 * Frontend Function
 *
 * @package frontEnd
 */

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 */
if ( ! function_exists( 'of_get_option' ) ) :

function of_get_option( $name, $default = false ) {
	$config = get_option( 'optionsframework' );

	if ( ! isset( $config['id'] ) ) {
		return $default;
	}

	$options = get_option( $config['id'] );

	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}

endif;

/**
 * Filter the page title.
 */
function tokopress_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'tokopress' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'tokopress_wp_title', 10, 2 );

/**
 * Set up post entry meta.
 */
if ( ! function_exists( 'tokopress_entry_meta' ) ) :
function tokopress_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'tokopress' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'tokopress' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'tokopress' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if( is_singular() ) {
		if ( $tag_list ) {
			$utility_text = __( '<span class="post-date">%3$s</span><span class="post-categories">%1$s</span><span class="post-tags">%2$s</span><span class="post-author"> by %4$s</span>', 'tokopress' );
		} elseif ( $categories_list ) {
			$utility_text = __( '<span class="post-date">%3$s</span><span class="post-categories">%1$s</span><span class="post-author"> by %4$s</span>', 'tokopress' );
		} else {
			$utility_text = __( '<span class="post-date">%3$s</span><span class="post-author"> by %4$s</span>', 'tokopress' );
		}
	} else {
		if ( $categories_list ) {
			$utility_text = __( '<span class="post-date">%3$s</span><span class="post-categories">%1$s</span><span class="post-author"> by %4$s</span>', 'tokopress' );
		} else {
			$utility_text = __( '<span class="post-date">%3$s</span><span class="by-author"> by %4$s</span>', 'tokopress' );
		}
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

function tokopress_excerpt_ellipsis($content) {
	return str_replace('[&hellip;]', '&hellip;', $content );
}
add_filter('the_excerpt', 'tokopress_excerpt_ellipsis');

/**
 * Display navigation to next/previous set of posts when applicable.
 */
if ( ! function_exists( 'tokopress_paging_nav' ) ) :
function tokopress_paging_nav() {
	
	// Don't print empty markup if there's only one page.
	global $wp_query;
	
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}
	
	?>
	
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'tokopress' ); ?></h1>
		
		<div class="nav-links">

			<?php
			
			echo paginate_links( array(
				'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
				'format' 		=> '',
				'current' 		=> max( 1, get_query_var( 'paged' ) ),
				'total' 		=> $wp_query->max_num_pages,
				'prev_text' 	=> '<i class="ficon-angle-left"></i>',
				'next_text' 	=> '<i class="ficon-angle-right"></i>',
				'type'			=> 'list',
				'end_size'		=> 3,
				'mid_size'		=> 3
			) );
			
			?>

		</div><!-- .nav-links -->
	
	</nav><!-- .navigation -->
	
	<?php

}
endif;

if ( ! function_exists( 'tokopress_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function tokopress_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'tokopress' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'tokopress' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 68 );
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tokopress' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php
				printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
					get_comment_author_link(),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'tokopress' ) . '</span>' : ''
				);
				printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					/* translators: 1: date, 2: time */
					sprintf( __( '%1$s at %2$s', 'tokopress' ), get_comment_date(), get_comment_time() )
				);

				comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'tokopress' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tokopress' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;