<?php
/**
 * Template part for displaying a single blog post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gym_Fitness
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header header-font">
        <h1><?php the_title(); ?> </h1>
        <figure>
            <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'sample-class', 'alt' => 'something to say about this image' ] ); ?> 
        </figure>
    </header><!-- .entry-header -->


    <div class="entry-content">
        <?php the_content(); ?> 
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->