<?php
/**
 * Post/page content
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		include 'post-card.php';
	}
} else {
	// If no content, include the "No posts found" template.
	require_once 'no-posts.php';
}
