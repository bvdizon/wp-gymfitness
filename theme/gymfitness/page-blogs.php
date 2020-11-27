<?php
/**
 * Template Name: Blogs Page
 */

get_header();
?>

<?php get_header(); ?> 
	<main id="primary" class="site-main wrapper">    
		<h1>home.php</h1>
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'blogs' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
<?php
get_footer();


<?php
get_footer();
