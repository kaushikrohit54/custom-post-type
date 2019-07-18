<?php
/**
 * Plugin Name: Deals Post
 * Description: Register custom post type Deal
 * Version: 1.0
 * Author: Rohit Kaushik
 * Author URI: https://in.linkedin.com/in/rohit-kaushik-108a2383
 */
 ?>
 <?php
 
/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Deals', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Deal', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Deals', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent deal', 'twentythirteen' ),
        'all_items'           => __( 'All Deals', 'twentythirteen' ),
        'view_item'           => __( 'View Deal', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Company', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Company', 'twentythirteen' ),
        'update_item'         => __( 'Update Company', 'twentythirteen' ),
        'search_items'        => __( 'Search Company', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
			'featured_image'        => __( 'Company Logo', 'twentythirteen' ),
		// Overrides the “Set featured image” label
		'set_featured_image'    => __( 'Set company logo', 'twentythirteen' ),
		// Overrides the “Remove featured image” label
		'remove_featured_image' => _x( 'Remove company logo', 'twentythirteen' ),

    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'deals', 'twentythirteen' ),
        'description'         => __( 'deals news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
		
    );
     
    // Registering your Custom Post Type
    register_post_type( 'deals', $args );
 
}
 
add_action( 'init', 'custom_post_type', 0 );

function themes_taxonomy() {  
    register_taxonomy(  
        'sector',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'deals',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Sectors',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'sector', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'themes_taxonomy');
