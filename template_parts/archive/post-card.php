<?php
/**
 * Post/page content for archive pages
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

use function JWR_Minimal\get_linked_category_list;

$post_date  = get_the_date();
$post_date  = "<span class='post-date'>$post_date</span>";
$post_title = get_the_title();
$post_link  = get_the_permalink();

if ( has_excerpt() ) {
	$post_excerpt = get_the_excerpt();
} else {
	$post_excerpt = get_the_content();
	$post_excerpt = wp_trim_words( $post_excerpt, 20, '' );
}
$post_excerpt = "<div class='post-excerpt'>$post_excerpt  <a href='$post_link' class='read-more'>>>></a></div>";

$post_categories = '';
if ( ! is_category() ) {
	$post_categories = get_linked_category_list( get_the_ID() );
	$post_categories = "<span class='post-categories'>$post_categories:</span>";
}

$output = <<<HTML
	<article>
		$post_categories <a href="$post_link" class="post-title">$post_title</a>
		$post_date
		$post_excerpt
	</article>
HTML;

echo wp_kses_post( $output );
