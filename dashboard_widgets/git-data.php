<?php
/**
 * Git Data for the project: Dashboard Widget.
 *
 * Modified from
 *
 * @link https://github.com/builtmighty/builtmighty-kit
 *
 * @since 2024-02-15
 * @package JWR_Minimal
 */

namespace JWR\Theme\Dashboard_Widgets;

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard Widget for Git Data.
 *
 * @return void
 */
function add_custom_dashboard_widget_git_data() {

	// Theme.
	$git_dir = get_template_directory();
	echo_git_data( $git_dir, 'theme' );

	// Plugins.
	$all_dirs = scandir( WP_PLUGIN_DIR );

	if ( ! $all_dirs ) {
		echo '😵 No plugins found.';
	}
	$my_plugin_dirs = preg_grep( '/^jwr-/', $all_dirs );
	foreach ( $my_plugin_dirs as $dir ) {
		$plugin_dir = WP_PLUGIN_DIR . '/' . $dir;
		echo_git_data( $plugin_dir );
	}
}

/**
 * Add Dashboard Widget.
 */
function add_dashboard_widget_git_data() {
	wp_add_dashboard_widget(
		'custom_dashboard_widget_git_data',
		'Project Git Data',
		__NAMESPACE__ . '\add_custom_dashboard_widget_git_data'
	);
}

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\add_dashboard_widget_git_data' );

/**
 * Echo subproject's git data.
 *
 * Modified from
 *
 * @link https://github.com/builtmighty/builtmighty-kit
 *
 * @param string $dir Directory.
 * @param string $mode Mode: "theme" or "plugin".
 */
function echo_git_data( $dir, $mode = 'plugin' ) {
	$git_dir = $dir . '/.git';
	$modes   = array( 'theme', 'plugin' );

	$mode_error_message = <<<HTML
		<div>
			<p style="margin:0;">😵 <strong>Requested mode does not exist.</strong></p>
			<p>Mode: ${mode}<br />
			Dir: ${git_dir}</p>
		</div>
	HTML;

	$dir_error_message = <<<HTML
		<div>
			<p style="margin:0;">😵 <strong>Could not find a Git directory at provided location.</strong></p>
			<p>Mode: ${mode}<br />
			Dir: ${git_dir}</p>
		</div>
	HTML;

	if ( ! is_dir( $git_dir ) ) {
		echo wp_kses_post( $dir_error_message );
		return;
	}
	if ( ! in_array( $mode, $modes, true ) ) {
		echo wp_kses_post( $mode_error_message );
		return;
	}

	if ( ! function_exists( 'get_filesystem_method' ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
	}
	global $wp_filesystem;

	$config = $wp_filesystem->get_contents( $git_dir . '/config' );

	// URL.
	$match = preg_match( '/url = (.*)/', $config, $matches );
	if ( $match ) {
		$repo_url = str_replace( '.git', '', $matches[1] );
	} else {
		echo wp_kses_post( "Error getting repo URL: ${git_dir}" );
		return;
	}

	// Branch.
	$head   = $wp_filesystem->get_contents( $git_dir . '/HEAD' );
	$branch = trim( str_replace( 'ref: refs/heads/', '', $head ) );

	// Style.
	if ( in_array( $branch, array( 'master', 'main', 'prod', 'production' ), true ) ) {
		$colors = ' style="background:green; color:white"';
	} else {
		$colors = ' style="background:orange; color:white"';
	}

	// Name.
	$name = '';
	if ( 'plugin' === $mode ) {
		$plugin_file = $dir . '/index.php';
		$plugin_data = get_plugin_data( $plugin_file );

		if ( $plugin_data['Name'] ) {
			$name = $plugin_data['Name'];
		}
	} else {
		$style_path     = $dir . '/style.css';
		$style_contents = $wp_filesystem->get_contents( $style_path );

		$pattern = '/Theme Name: (.+?)\n/';
		$match   = preg_match( $pattern, $style_contents, $matches );

		if ( $match ) {
			$name = trim( $matches[1] );
			$name = "theme: ${name}";
		}
	}

	if ( ! empty( $name ) ) {
		$name = ' for ' . $name;
	}

	// Git status.
	$status = '';
	$status = check_git_status( $dir );

	$output = <<<HTML
		<div style="margin-bottom: 2rem;">
			<p style="margin-top:0;">
				<strong>💻 Git${name}</strong> (<a href="${repo_url}" target="_blank">repo</a>)
			</p>
			<p>
				<span>Branch: <code ${colors}>${branch}</code></span> ${status} 
			</p>
		</div>
	HTML;

	echo wp_kses_post( $output );
}

/**
 * Check git status.
 *
 * @param string $dir Directory.
 * @return string
 */
function check_git_status( $dir ) {
	if ( ! is_dir( $dir ) ) {
		return false;
	}
	$output = \shell_exec( "cd ${dir} && git status" );

	if ( ! $output ) {
		return false;
	}

	$status_is_good = true;

	if ( \str_contains( $output, 'Changes not staged' ) ) {
		$status_is_good = false;
	}

	if ( $status_is_good ) {
		return '✅';
	} else {
		return '❌';
	}
}
