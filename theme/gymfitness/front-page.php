<?php get_header( 'front' );  ?> 

<!-- hero area -->
<div class="hero">
    <?php the_post_thumbnail('full', [ 'alt' => get_the_post_thumbnail_caption() ]); ?> 

    <div class="hero-text">
        <h1><?php the_field( 'hero_title' ); ?> </h1>
        <p><?php the_field( 'hero_subtitle' ); ?> </p>
    </div>
</div>

<section>
    <div class="welcome-banner wrapper">
        <h2 class="header-font front-title"><?php the_field( 'welcome_title' ); ?> </h2>
        <p class="text-center"><?php the_field( 'welcome_subtitle' ); ?></p>
    </div>
        
    <ul class="gymfitness-areas">
        <?php 
            for($i = 1; $i <= 4; $i++) {
                $area = get_field( "area_{$i}" );
                $img = wp_get_attachment_image_src($area[ 'area_image' ], 'square')[0];
                $alt_text = get_post_meta($area[ 'area_image' ], '_wp_attachment_image_alt', true);;
                ?>

                <li>                    
                    <img src="<?php echo $img; ?>" alt="<?php _e( $alt_text ) ?>">
                    <h3><?php echo $area[ 'area_name' ] ?></h3>
                </li>

                <?php                 
            };
        
        ?> 
    </ul>

</section>

<!-- classes -->
<section class="bg-gray pb-lg">
    <div class="wrapper">
        <h2 class="header-font front-title">Our Classes</h2>
        <p class="text-center pb-md">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, veritatis!</p>
    </div>

        <?php gymfitness_classes_query(); ?> 
    
    <div class="cta text-center mt-sm">
        <a href="esc_url( '/classes/' )" class="btn btn-primary">View All Classes</a>
    </div>
    
</section>

<!-- instructors -->
<section class="instructor-section">
    <div class="wrapper">
        <h2 class="header-font front-title">Our Instructors</h2>
        <p class="text-center pb-md">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, veritatis!</p>
    </div>
    <div class="wrapper">

        <?php gymfitness_instructors_query(); ?> 

    </div>
</section>

<!-- testimonials -->    
<section class="testimonials-section" style="background-image: url( <?php the_field( 'testimonials_background_image' )?> );">
    <div class="wrapper">
        <ul class="bxslider" id="testimonials">
            
        <?php 
            $args = array(
                'post_type'    =>   'gym_testimonial',
            );
            $testimonials = new WP_Query( $args );
        ?> 

        <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?> 

            <li class="testimonial">
                <?php the_content(); ?> 
                <figure class="testimonial">
                    <?php the_post_thumbnail( 'thumbnail' ) ?> 
                    <figcaption><?php the_title(); ?> </figcaption>
                </figure>
            </li>

        <?php endwhile; wp_reset_postdata(); ?> 

        </ul>
    </div>
</section>

<!-- blogs -->
<section class="bg-gray pb-lg">
    <div class="wrapper">
        <h2 class="header-font front-title">Our Blogs</h2>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, veritatis!</p>
    </div>
    <div id="gymfitness-blogs" class="wrapper">

        <?php gymfitness_posts_query(); ?> 

    </div>
    <div class="cta text-center">
        <a href="esc_url( '/blog/' )" class="btn btn-primary">View All Blog Posts</a>
    </div>
</section>



<?php
get_footer();
