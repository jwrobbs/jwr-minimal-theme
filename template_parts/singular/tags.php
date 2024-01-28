<?php
/**
 * Post byline
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

$tags = get_the_tag_list( '', ', ' );

if ( ! $tags ) {
	return;
}

$output = <<<HTML
	<div class="tags">
		Tagged: $tags
	</div>
HTML;

echo wp_kses_post( $output );
