<?php
/**
 * The template for displaying the footer
 *
 * Based on twentyseventeen theme footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

?>

</main><!-- #content -->
		<footer id="colophon" class="site-footer">
			<div class="wrap">
				<?php echo do_shortcode( '[ssi]' ); ?>
				<div class=copyright>
					<?php
					// Get the current year.
					$the_year = gmdate( 'Y' );
					if ( '2024' !== $the_year ) {
						$the_year = '2024 - ' . $the_year;
					}
					?>
					<p>&copy; <?php echo esc_html( $the_year ); ?> Josh Robbs. All rights reserved.</p>
				</div><!-- .copyright -->
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
