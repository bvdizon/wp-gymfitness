
<?php

/**
 * Plugin Name:       Brian's GymFitness Widgets
 * Plugin URI:        
 * Description:       A small plugin to create a widget to display available GymFitness classes.
 * Version:           1.0.0
 * Author:            Brian Dizon
 * Author URI:        https://facebook.com/bvdizon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gymfitness
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Adds GymFitness_Classes widget.
 */
class GymFitness_Classes extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gymfitness_classes', // Base ID
			esc_html__( 'GymFitness Classes', 'gymfitness' ), // Name
			array( 'description' => esc_html__( 'Displays gymfitness classes in the sidebar.', 'gymfitness' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
		?>

		
		<h2 class="widget-title header-font"><?php esc_html_e( $instance['title'] ); ?> </h2>
		<p><?php esc_html_e( $instance['description'] ); ?> </p>
		<ul class="sidebar-classes">
			<?php 
				$args = [ 
					'post_type' => 'gymfitness_class', 
					'posts_per_page' => esc_html__( $instance['quantity'] ),
					'orderby' => 'rand',
				];

				$classes = new WP_Query($args);

				while( $classes->have_posts() ) : $classes->the_post();
			?> 

			<li class="sidebar-classes__class">
				<figure class="sidebar-classes__img">
					<a href="<?php the_permalink(); ?> ">
					<?php if( !has_post_thumbnail() ) : ?> 
						<img src="<?php echo esc_url( 'https://via.placeholder.com/150' ); ?> " alt="">
					<?php endif; ?> 
						<?php the_post_thumbnail( 'thumbnail' ); ?> 
					</a>
				</figure>
				
				<div class="sidebar-classes__content">
					<a href="<?php the_permalink(); ?> ">				
						<h3><?php the_title(); ?> </h3>
					</a>
					<?php 
						// data from ACF plugin
						$class_days = get_field( 'class_days' );
						$start_time = get_field( 'start_time' );
						$end_time = get_field( 'end_time' );
					?> 
					<p>
						<span><?php echo $class_days; ?> </span> - 
						<span><?php echo $start_time ?> to <?php echo $end_time ?>  </span>
					</p>
				</div>
			</li>

			<?php endwhile; wp_reset_postdata(); ?> 
		</ul>        
		<?php 
        echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title for this widget', 'gymfitness' );
		$quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'gymfitness' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( 'Check out and Enroll in our other classes below!', 'gymfitness' );

        ?>
        <p>Add the title for this widget and the number of classes to display in the sidebar.</p>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'gymfitness' ); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>" />
        </p>
		
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
                <?php esc_attr_e( 'Description:', 'gymfitness' ); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $description ); ?>" />
        </p>
        
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>">
                <?php esc_attr_e( 'No. of classes to display:', 'gymfitness' ); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" 
				type="number" 
				min="1"
                value="<?php echo esc_attr( $quantity ); ?>" />
        </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';

		return $instance;
	}

} // class GymFitness_Classes


// register GymFitness_Classes widget
function register_gymfitness_classes() {
    register_widget( 'GymFitness_Classes' );
}
add_action( 'widgets_init', 'register_gymfitness_classes' );