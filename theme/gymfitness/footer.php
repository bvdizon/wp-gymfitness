<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gym_Fitness
 */

?>

	<footer id="colophon" class="site-footer mt-sm">
		<div class="wrapper footer-items">
			<nav class="footer-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?> 
			</nav>
			<div class="site-info">
				<?php esc_html_e( 'Developed by ', 'gymfitness' ); ?> 
				<a href="<?php echo esc_url( 'https://facebook.com/bvdizon', 'gymfitness' ); ?>" target="_blank">
					<?php esc_html_e( 'Brian Dizon', 'gymfitness' ); ?>
				</a>			
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
