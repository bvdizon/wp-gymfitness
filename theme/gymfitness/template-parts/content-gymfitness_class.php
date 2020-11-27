<?php
/**
 * Template part for displaying a single class custom post type
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
        <?php 
            // data from ACF plugin
            $class_days = get_field( 'class_days' );
            $start_time = get_field( 'start_time' );
            $end_time = get_field( 'end_time' );
        ?> 
        <h3 class="text-center my-sm">
            <span><?php echo $class_days; ?> </span> - 
            <span><?php echo $start_time ?> to <?php echo $end_time ?>  </span>
        </h3>
        <?php the_content(); ?> 
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->