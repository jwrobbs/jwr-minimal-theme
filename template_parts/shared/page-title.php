<?php
/**
 * Post/page/archive title
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

if ( is_singular() ) {
	the_title( '<h1 class="post-title">', '</h1>' );
} elseif ( is_archive() ) {
	the_archive_title( '<h1 class="archive-title">', '</h1>' );
}
