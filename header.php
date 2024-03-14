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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1GZM1FC277"></script>

</head>

<body <?php body_class(); ?>>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-1GZM1FC277');
</script>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentyseventeen' );
		?>
	</a>

	<header id="masthead" class="site-header">
		<div class='header-inner'>
		<?php
			require_once 'template_parts/header/brand-title.php';
			wp_nav_menu( array( 'theme_location' => 'primary' ) );
		?>
		</div><!-- .header-inner -->
	</header><!-- #masthead -->

	<div class="site-content-contain">
		<main id="content" class="site-content">
			
