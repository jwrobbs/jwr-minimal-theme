<?php
/**
 * Server Data Dashboard Widget function.
 *
 * @since 2024-02-15
 * @package JWR_Minimal
 */

namespace JWR\Theme\Dashboard_Widgets;

defined( 'ABSPATH' ) || exit;

/**
 * Server Data Dashboard Widget function.
 *
 * Modified from
 *
 * @link https://github.com/builtmighty/builtmighty-kit
 *
 * @return void
 */
function add_custom_dashboard_widget_server_data() {
	// Global.
	global $wpdb;

	// Get information for developers.
	$php         = phpversion();
	$db_version  = $wpdb->db_version();
	$wp          = get_bloginfo( 'version' );
	$server_info = $wpdb->db_server_info();

	$pattern = '%' . $db_version . '-(\w+)-%';
	$results = \preg_match( $pattern, $server_info, $matches );
	if ( $results ) {
		$database   = $matches[1];
		$db_version = "$database-{$db_version} ";
	}

	$html = <<<HTML
		<div class="built-panel">
			<p style="margin-top:0;"><strong>Developer Info</strong></p>
			<ul style="margin:0;">
				<li>PHP <code>{$php}</code></li>
				<li>Database <code>{$db_version}</code></li>
				<li>WordPress <code>{$wp}</code></li>
			</ul>
		</div>
		HTML;

		echo \wp_kses_post( $html );
}

/**
 * Create Server Data Dashboard Widget.
 *
 * @return void
 */
function add_server_data_db_widget() {
	\wp_add_dashboard_widget(
		'jwr_server_data_dashboard_widget', // Widget slug.
		'Server Data',   // Widget title.
		__NAMESPACE__ . '\add_custom_dashboard_widget_server_data'  // Display function.
	);
}

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\add_server_data_db_widget' );
