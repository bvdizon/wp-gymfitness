<?php get_header(); ?> 
	<main id="gymfitness-gallery" class="site-main wrapper">    
    
    <?php while( have_posts() ) : the_post(); ?> 
        <h1 class='header-font'><?php the_title(); ?> </h1>

        <?php 
            // get gallery on the "Gallery" page and 'false' to get values only
            $gallery = get_post_gallery( get_the_ID(), false );
            // php function "explode()" to create array
            $gallery_image_ids = explode( ',', $gallery[ 'ids' ] );
        ?> 

    <?php endwhile; ?> 

    <ul class="gallery-img">
        <?php 
            //create a counter to track order of images
            $i = 0; 
            // iterate on the array of ids
            foreach( $gallery_image_ids as $attachment_id ) : 
                // condition when and what image sizes to apply
                $size_img = ($i === 3 || $i === 6) ? 'portrait' : 'square';
                // get images, results in an array of values
                $img = wp_get_attachment_image_src( $attachment_id, $size_img ); 
                // get image full-size on lightbox display
                $img_full = wp_get_attachment_image_src( $attachment_id, 'full' ); 
                // get the caption for the image
                $caption = wp_get_attachment_caption($attachment_id);
                // increment the counter
                $i++;
        ?> 

            <li class="gallery-img__img">
                <a href="<?php echo $img_full[0] ?>" data-lightbox="gallery">
                    <img src="<?php echo $img[0] ?>" alt="<?php echo $caption; ?>" >                    
                </a>
            </li>
            
        <?php endforeach; ?> 
    </ul>
                
	</main><!-- #main -->
<?php
get_footer();
