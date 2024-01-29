<?php
/**
 * Post/page content for archive pages
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

$post_date  = get_the_date();
$post_title = get_the_title();
$post_link  = get_the_permalink();

if ( has_excerpt() ) {
	$post_excerpt = get_the_excerpt();
} else {
	$post_excerpt = get_the_content();
	$post_excerpt = wp_trim_words( $post_excerpt, 20, '...' );
}
$post_excerpt = "<span class='post-excerpt'>$post_excerpt</span>";

if ( ! is_category() ) {
	$post_categories = get_the_category_list( ', ' );
	$post_categories = "<span class='post-categories'>($post_categories)</span>";
}

$output = <<<HTML
	<article>
		$post_date: <a href="$post_link" class="post-title">$post_title</a>
		$post_categories
		$post_excerpt
	</article>
HTML;

echo wp_kses_post( $output );
