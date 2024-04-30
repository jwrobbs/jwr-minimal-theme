<?php
/**
 * Autoloader for the plugin.
 *
 * @package jwr_minimal
 */

namespace JWR_Minimal;

defined( 'ABSPATH' ) || exit;

/**
 * Autoloader for the plugin.
 *
 * @param string $class_name The *fully-qualified* class name.
 *
 * @return void
 */
function theme_autoloader( $class_name ) {
	if ( ! \str_contains( $class_name, __NAMESPACE__ ) ) {
		return;
	}

	$class_name = str_replace( '_', '-', $class_name );
	$class_name = strtolower( $class_name );

	$pattern = '/^(.*\\\)([\w|-]*)$/'; // Separates the last segment.
	$results = preg_match( $pattern, $class_name, $matches );

	if ( 1 === $results ) {
		$path       = $matches[1];
		$path       = str_replace( 'jwr-minimal\\', '', $path ); // Remove the namespace.
		$class_name = $matches[2];
		$file_name  = 'class-' . $class_name . '.php';

		$file = __DIR__ . '/' . $path . $file_name; // Requires full path.
		$file = str_replace( '\\', DIRECTORY_SEPARATOR, $file );
		$file = str_replace( '/', DIRECTORY_SEPARATOR, $file );

		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}
spl_autoload_register( __NAMESPACE__ . '\theme_autoloader' );
