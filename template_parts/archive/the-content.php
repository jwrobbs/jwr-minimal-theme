<?php
/**
 * Post/page content
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

echo '<main>';

if ( have_posts() ) {
	echo '<div class=posts>';
	while ( have_posts() ) {
		the_post();
		include 'post-card.php';
	}
	echo '</div><!-- .posts -->';
} else {
	// If no content, include the "No posts found" template.
	require_once 'no-posts.php';
}

if ( function_exists( 'wp_paginate' ) && ! ( ( defined( 'WP_CLI' ) && WP_CLI ) ) ) {
	wp_paginate();
}

echo '</main>';
