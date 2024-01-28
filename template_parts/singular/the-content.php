<?php
/**
 * Post/page content
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

/*
NOTE Switched to using the_content() instead of the code below because it was breaking the TOC plugin.
$content = apply_filters( 'the_content', get_the_content() );
$output  = <<<HTML
	<article>
		$content
	</article>
HTML;

echo wp_kses_post( $output );
*/

echo '<article>';
the_content();
echo '</article>';
