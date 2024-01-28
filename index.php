<?php
/**
 * Main template file
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

get_header();

// Title.
require_once 'template_parts/shared/page-title.php';

// Category and Byline for posts.
if ( is_single() ) {
	include 'template_parts/singular/category-line.php';
	include 'template_parts/singular/byline.php';
}

// Main content.
if ( is_singular() ) {
	require_once 'template_parts/singular/the-content.php';
} elseif ( is_archive() ) {
	require_once 'template_parts/archive/the-content.php';
}

get_footer();
