<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gym_Fitness
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
    style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; ">
    <div class="overlay blog-post">

        <header class="entry-header">
            <?php the_category( ' ' ); ?>
        </header><!-- .entry-header -->


        <div class="entry-content">
            <a href="<?php the_permalink(); ?> ">
                <h2 class="white-text header-text"><?php the_title(); ?> </h2>
            </a>
            <div class="post-meta">
                <h3>
                    <span class="accent-text"><?php echo esc_html( 'By: ', 'gymfitness' ) ?></span>
                    <span class="white-text"><?php the_author(); ?></span>
                </h3>
                <h3>
                    <span class="accent-text"><?php echo esc_html( 'Date: ', 'gymfitness' ) ?></span>
                    <span class="white-text"><?php the_time( 'F j, Y' ); ?></span>
                </h3>
            </div>
        </div><!-- .entry-content -->

    </div>
</article><!-- #post-<?php the_ID(); ?> -->