<?php 

// CLASSES
function gymfitness_classes_query() {

    $args = [
        'post_type' => 'gymfitness_class',
        'order'   => 'ASC',
    ];

    if( is_front_page() ) {
        $args['posts_per_page'] = 4;
    }

    $classes = new WP_Query($args);    
    ?>

    <section class="class-cards wrapper" >
        <?php while ( $classes->have_posts() ) : $classes->the_post(); ?>

        <article class="class-card gradient-overlay">
            <?php the_post_thumbnail( 'medium_large', [ 'class' => 'class-card__img' ] ); ?> 

            <div class="class-card__content">
                <a href="<?php the_permalink(); ?>"> 
                    <h2><?php the_title(); ?> </h2>
                </a> 

                <?php 
                    // data from ACF plugin
                    $class_days = get_field( 'class_days' );
                    $start_time = get_field( 'start_time' );
                    $end_time = get_field( 'end_time' );
                ?> 
                <h3>
                    <span><?php echo $class_days; ?> </span> - 
                    <span><?php echo $start_time ?> to <?php echo $end_time ?>  </span>
                </h3>
            </div>
        </article>

        <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <?php 
}


// INSTRUCTORS
function gymfitness_instructors_query() {
    ?>
        <ul class="instructors">

            <?php
                $args = array(
                    'post_type'   =>   __( 'gym_instructor', 'gymfitness' ),
                );

                $instructor = new WP_Query( $args );

                while( $instructor->have_posts() ) : $instructor->the_post();
            ?> 

            <li>
                <?php the_post_thumbnail( 'large' ) ?> 

                <div class="content">
                    <h3><?php the_title(); ?> </h3>
                    <?php the_content(); ?> 
                    <div class="specialty">
                        <?php 
                            $specialty = get_field( 'specialty' );
                            foreach( $specialty as $s ) :
                            ?> 
                        
                            <span><?php echo $s; ?> </span>

                        <?php endforeach; ?> 
                    </div>
                </div>

            </li>

            <?php endwhile; wp_reset_postdata(); ?> 

        </ul>

    <?php 
}

// POSTS
function gymfitness_posts_query() {

        // The Query
        $the_query = new WP_Query( [ 'post_type' => 'post' ] );
        
        // The Loop
        if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
            get_template_part( 'template-parts/content', 'blogs' );
        endwhile; endif;
        /* Restore original Post Data */
        wp_reset_postdata();
}