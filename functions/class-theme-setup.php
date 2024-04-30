<?php
/**
 * Theme functions file - Setup
 *
 * @package JWR_Minimal
 *
 * @since 2024-04-30
 */

namespace JWR_Minimal\functions;

defined( 'ABSPATH' ) || exit;

/**
 * Class Theme_Setup
 */
class Theme_Setup {
	/**
	 * Setup the class / constructor
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
	}

	/* HOOKS */
	/**
	 * Functions for after_setup_theme
	 *
	 * @return void
	 */
	public function after_setup_theme() {
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
	/**
	 * Scripts and styles to be enqueued
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_style(
			'jwr-minimal',
			get_stylesheet_directory_uri() . '/css/app.css',
			array(),
			filemtime( get_stylesheet_directory() . '/css/app.css' )
		);
	}

	/**
	 * WP Head hook
	 *
	 * @return void
	 */
	public function wp_head() {
		self::add_website_icons();
	}
	/**
	 * Admin head hook
	 *
	 * @return void
	 */
	public function admin_head() {
		self::add_website_icons();
	}

	/* STATIC METHODS */
	/**
	 * Add website icons
	 *
	 * @return void
	 */
	public static function add_website_icons() {
		$path_to_theme = get_template_directory_uri();
		$icon_path     = $path_to_theme . '/icons/favicon.png';
		echo '<link rel="icon" sizes="16x16 32x32 48x48 96x96 180x180 512x512" type="image/png" href="' . $icon_path . '">';// phpcs:ignore
	}
}
