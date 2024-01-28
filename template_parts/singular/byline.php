<?php
/**
 * Post byline
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

$post_date       = get_the_date();
$author_id       = get_the_author_meta( 'ID', $post->post_author );
$post_author     = get_the_author_meta( 'display_name', $author_id );
$post_author_url = get_author_posts_url( $author_id );

$output = <<<HTML
	<div class="byline"> Posted on 
		<time class="byline__time" datetime="$post_date">$post_date</time>
		<span class="byline__author">by <a href="$post_author_url">$post_author</a></span>
	</div>
HTML;

echo wp_kses_post( $output );
