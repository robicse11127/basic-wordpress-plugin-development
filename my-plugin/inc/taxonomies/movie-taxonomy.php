<?php 

/**
 * Movie Taxonomy
 */
function myplugin_movie_taxonomy() {
    $labels = array(

        'name'              => _x( 'Categories', 'taxonomy general name', 'my-plugin' ),

        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'my-plugin' ),

        'menu_name'         => __( 'Categories', 'my-plugin' ),

        'search_items'      => __( 'Search Categories', 'my-plugin' ),

        'all_items'         => __( 'All Categories', 'my-plugin' ),

        'parent_item'       => __( 'Parent Category', 'my-plugin' ),

        'parent_item_colon' => __( 'Parent Category:', 'my-plugin' ),

        'edit_item'         => __( 'Edit Category', 'my-plugin' ),

        'update_item'       => __( 'Update Category', 'my-plugin' ),

        'add_new_item'      => __( 'Add New Category', 'my-plugin' ),

        'new_item_name'     => __( 'New Category Name', 'my-plugin' ),

    );

    $args = array(

        'hierarchical'      => true,

        'labels'            => $labels,

        'show_ui'           => true,

        'show_admin_column' => true,

        'query_var'         => true,

        'show_in_rest'      => true,

        'rewrite'           => array( 'slug' => 'movie_cat' ),

    );

    register_taxonomy( 'movie_cat', array('movie'), $args );
}
add_action('init', 'myplugin_movie_taxonomy');