<?php


if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'gymfitness_setup' ) ) :
	
	function gymfitness_setup() {
		
		load_theme_textdomain( 'gymfitness', get_template_directory() . '/languages' );
		
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'large', 450, 450, true );
		add_image_size( 'square', 350, 350, true );
		add_image_size( 'portrait', 350, 724, true );
		
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'gymfitness' ),
			)
		);
		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		add_theme_support(
			'custom-background',
			apply_filters(
				'gymfitness_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
		
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'gymfitness_setup' );


add_action( 'after_setup_theme', 'gymfitness_content_width', 0 );
function gymfitness_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gymfitness_content_width', 640 );
}


add_action( 'widgets_init', 'gymfitness_widgets_init' );
function gymfitness_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gymfitness' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gymfitness' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title header-font">',
			'after_title'   => '</h2>',
		)
	);
}


add_action( 'wp_enqueue_scripts', 'gymfitness_scripts' );
function gymfitness_scripts() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'gymfitness-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gymfitness-scripts', get_template_directory_uri() . '/js/scripts.js', array(), time(), true );

	if( basename( get_page_template() ) === 'page-gallery.php' ):
		wp_enqueue_style( 'lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array( 'gymfitness-style' ), '2.11.3', 'all' );
		wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), '2.11.3', true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if( is_front_page() ){
		wp_enqueue_style('bxslider-styles', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css', false, '4.2.15', 'all');
		wp_enqueue_script('bxslider-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js', array( 'jquery' ), '4.2.15', true);
	}

	
	wp_enqueue_style( 'gymfitness-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gymfitness-style', 'rtl', 'replace' );

	wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/styles.css', array( 'gymfitness-style' ), time(), 'all' );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// REQUIRES
require get_template_directory() . '/inc/gymfitness_queries.php';