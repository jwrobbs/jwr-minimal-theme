<?php
/**
 * Remove unwanted dashbaord meta boxes.
 *
 * @since 2024-02-15
 * @package JWR_Minimal
 */

namespace JWR\Theme\Dashboard_Widgets;

defined( 'ABSPATH' ) || exit;

/**
 * Clean up the admin dashboard.
 *
 * @return void
 */
function clean_up_dashboard() {
	\remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	\remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	\remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	\remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_welcome', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_at_a_glance', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	\remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	\remove_meta_box( 'ws-ame-screen-options', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\clean_up_dashboard' );
