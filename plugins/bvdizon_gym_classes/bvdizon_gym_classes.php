
<?php

/**
 * Plugin Name:       Brian's GymFitness Classes
 * Plugin URI:        
 * Description:       A small plugin to create a custom post type for gymfitness classes.
 * Version:           1.0.0
 * Author:            Brian Dizon
 * Author URI:        https://facetestimonial.com/bvdizon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gymfitness
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// CLASSES
add_action( 'init', 'bvdizon_gymfitness_classes' );
function bvdizon_gymfitness_classes() {
    $labels = array(
        'name'                  => _x( 'Classes', 'Post type general name', 'gymfitness' ),
        'singular_name'         => _x( 'Class', 'Post type singular name', 'gymfitness' ),
        'menu_name'             => _x( 'Classes', 'Admin Menu text', 'gymfitness' ),
        'name_admin_bar'        => _x( 'Class', 'Add New on Toolbar', 'gymfitness' ),
        'add_new'               => __( 'Add New', 'gymfitness' ),
        'add_new_item'          => __( 'Add New class', 'gymfitness' ),
        'new_item'              => __( 'New class', 'gymfitness' ),
        'edit_item'             => __( 'Edit class', 'gymfitness' ),
        'view_item'             => __( 'View class', 'gymfitness' ),
        'all_items'             => __( 'All classes', 'gymfitness' ),
        'search_items'          => __( 'Search classes', 'gymfitness' ),
        'parent_item_colon'     => __( 'Parent classes:', 'gymfitness' ),
        'not_found'             => __( 'No classes found.', 'gymfitness' ),
        'not_found_in_trash'    => __( 'No classes found in Trash.', 'gymfitness' ),
        'featured_image'        => _x( 'Class Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'archives'              => _x( 'Class archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gymfitness' ),
        'insert_into_item'      => _x( 'Insert into class', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gymfitness' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this class', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gymfitness' ),
        'filter_items_list'     => _x( 'Filter classes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gymfitness' ),
        'items_list_navigation' => _x( 'Classes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gymfitness' ),
        'items_list'            => _x( 'Classes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gymfitness' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Class custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gymfitness' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-welcome-learn-more'
        
    );
      
    register_post_type( 'gymfitness_class', $args );
}


// INSTRUCTORS
/**
 * Register a custom post type called "testimonial".
 *
 * @see get_post_type_labels() for label keys.
 */

function gymfitness_instructor() {
    $labels = array(
        'name'                  => _x( 'Instructors', 'Post type general name', 'gymfitness' ),
        'singular_name'         => _x( 'Instructor', 'Post type singular name', 'gymfitness' ),
        'menu_name'             => _x( 'Instructors', 'Admin Menu text', 'gymfitness' ),
        'name_admin_bar'        => _x( 'Instructor', 'Add New on Toolbar', 'gymfitness' ),
        'add_new'               => __( 'Add New', 'gymfitness' ),
        'add_new_item'          => __( 'Add New Instructor', 'gymfitness' ),
        'new_item'              => __( 'New Instructor', 'gymfitness' ),
        'edit_item'             => __( 'Edit Instructor', 'gymfitness' ),
        'view_item'             => __( 'View Instructor', 'gymfitness' ),
        'all_items'             => __( 'All Instructors', 'gymfitness' ),
        'search_items'          => __( 'Search Instructors', 'gymfitness' ),
        'parent_item_colon'     => __( 'Parent Instructors:', 'gymfitness' ),
        'not_found'             => __( 'No instructors found.', 'gymfitness' ),
        'not_found_in_trash'    => __( 'No instructors found in Trash.', 'gymfitness' ),
        'featured_image'        => _x( 'Instructor Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'archives'              => _x( 'Instructor archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gymfitness' ),
        'insert_into_item'      => _x( 'Insert into instructor', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gymfitness' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this instructor', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gymfitness' ),
        'filter_items_list'     => _x( 'Filter instructors list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gymfitness' ),
        'items_list_navigation' => _x( 'Instructors list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gymfitness' ),
        'items_list'            => _x( 'Instructors list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gymfitness' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'instructor' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-admin-users'
    );
 
    register_post_type( 'gym_instructor', $args );
}
 
add_action( 'init', 'gymfitness_instructor' );


// TESTIMONIALS
/**
 * Register a custom post type called "testimonial".
 *
 * @see get_post_type_labels() for label keys.
 */
function gymfitness_testimonial_init() {
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post type general name', 'gymfitness' ),
        'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'gymfitness' ),
        'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'gymfitness' ),
        'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'gymfitness' ),
        'add_new'               => __( 'Add New', 'gymfitness' ),
        'add_new_item'          => __( 'Add New Testimonial', 'gymfitness' ),
        'new_item'              => __( 'New Testimonial', 'gymfitness' ),
        'edit_item'             => __( 'Edit Testimonial', 'gymfitness' ),
        'view_item'             => __( 'View Testimonial', 'gymfitness' ),
        'all_items'             => __( 'All Testimonials', 'gymfitness' ),
        'search_items'          => __( 'Search Testimonials', 'gymfitness' ),
        'parent_item_colon'     => __( 'Parent Testimonials:', 'gymfitness' ),
        'not_found'             => __( 'No testimonials found.', 'gymfitness' ),
        'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'gymfitness' ),
        'featured_image'        => _x( 'Testimonial Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gymfitness' ),
        'archives'              => _x( 'Testimonial archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gymfitness' ),
        'insert_into_item'      => _x( 'Insert into testimonial', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gymfitness' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this testimonial', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gymfitness' ),
        'filter_items_list'     => _x( 'Filter testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gymfitness' ),
        'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gymfitness' ),
        'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gymfitness' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-format-quote',
    );
 
    register_post_type( 'gym_testimonial', $args );
}
 
add_action( 'init', 'gymfitness_testimonial_init' );