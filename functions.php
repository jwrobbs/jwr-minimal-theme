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

require_once 'autoloader.php';

/**
 * Theme setup
 *
 * @since 2024-01-28
 * @return void
 */
function setup() {
	\add_theme_support( 'post-thumbnails' );
	\add_theme_support( 'html5', array( 'gallery', 'style', 'search-form', 'caption', 'script' ) );
	\add_theme_support( 'title-tag' );

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
 * Add website icons.
 *
 * @return void
 */
function add_website_icons() {
	$path_to_theme = get_template_directory_uri();
	$icon_path     = $path_to_theme . '/icons/favicon.png';
	echo '<link rel="icon" sizes="16x16 32x32 48x48 96x96 180x180 512x512" type="image/png" href="' . $icon_path . '">'; // phpcs:ignore
}
add_action( 'wp_head', __NAMESPACE__ . '\add_website_icons' );
add_action( 'admin_head', __NAMESPACE__ . '\add_website_icons' );

/**
 * Get linked category list.
 *
 * @param int|false $post_id The post ID.
 *
 * @return string
 */
function get_linked_category_list( $post_id = false ) {
	$post_id         = $post_id ? $post_id : get_the_ID();
	$post_categories = get_the_category( get_the_ID() );

	$categories_array = array();
	foreach ( $post_categories as $category ) {
		$category->name     = \str_replace( ' ', '&nbsp;', $category->name );
		$categories_array[] = array( $category->name, get_category_link( $category->term_id ) );
	}

	$count = 0;
	$html  = '';

	foreach ( $categories_array as $category ) {

		if ( 0 !== $count ) {
			$html .= ', ';
		}
		$html .= "<a href='$category[1]'>$category[0]</a>";

		++$count;
	}

	return $html;
}
