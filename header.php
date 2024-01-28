<?php
/**
 * The theme header
 *
 * Based on twentyseventeen theme header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentyseventeen' );
		?>
	</a>

	<header id="masthead" class="site-header">

		<?php
			require_once 'template_parts/header/brand-title.php';
			require_once 'template_parts/header/main-nav.php';
		?>
	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
			
