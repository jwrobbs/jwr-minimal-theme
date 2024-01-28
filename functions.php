<?php
/**
 * Theme functions file
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

namespace WPMB_Theme_2024;

defined( 'ABSPATH' ) || exit;

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
			'primary' => __( 'Primary Menu', 'wpmb-theme-2024' ),
			'footer'  => __( 'Footer Menu', 'wpmb-theme-2024' ),
			'social'  => __( 'Social Menu', 'wpmb-theme-2024' ),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );
