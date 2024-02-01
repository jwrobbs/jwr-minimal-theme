<?php
/**
 * Theme functions file
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

namespace JWR_Minimal;

defined( 'ABSPATH' ) || exit;

define( 'WP_POST_REVISIONS', 3 );

// require_once 'scripts/autoload.php'; // Not added yet.

/**
 * Theme setup
 *
 * @since 2024-01-28
 * @return void
 */
function setup() {
	\add_theme_support( 'post-thumbnails' );
	\add_theme_support( 'html5', array( 'gallery', 'style', 'search-form', 'caption', 'script' ) );

	\register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'jwr_minimal' ),
			'footer'  => __( 'Footer Menu', 'jwr_minimal' ),
			'social'  => __( 'Social Menu', 'jwr_minimal' ),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );

/**
 * Enqueue scripts and styles
 *
 * @return void
 */
function enqueue_scripts() {
	wp_enqueue_style(
		'jwr-minimal',
		get_stylesheet_directory_uri() . '/css/app.css',
		array(),
		filemtime( get_stylesheet_directory() . '/css/app.css' )
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );

/**
 * REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND.
 *
 * I didn't write this code - only collect it. If you have code to add
 * to this, find me on Twitter:
 *
 * @link https://twitter.com/_JoshRobbs
 *
 * @return void;
 */
function remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS.
	wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON.

	// Remove Global Styles and SVG Filters from WP 5.9.1 - 2022-02-27.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\remove_wp_block_library_css', 100 );
