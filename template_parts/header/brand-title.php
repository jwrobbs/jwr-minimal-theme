<?php
/**
 * Brand/title area of theme header
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

if ( is_front_page() ) {
	$brand_title_element = 'h1';
} else {
	$brand_title_element = 'div';
}
?>
<div class='site-title-container'>
	<<?php echo wp_kses_post( $brand_title_element ); ?> class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			Josh Robbs
		</a>
	</<?php echo wp_kses_post( $brand_title_element ); ?>>
	<div class='site-description'>Consulting & Development</div><!-- .site-description -->
</div><!-- .site-title-container -->
