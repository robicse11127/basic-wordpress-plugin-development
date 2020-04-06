<?php 

/**
 * Create Movie Post Type
 */
function myplugin_movie_post_type() {
    $labels = array(

        'name'                  => _x( 'Movies', 'Post type general name', 'my-plugin' ),

        'singular_name'         => _x( 'Movie', 'Post type singular name', 'my-plugin' ),

        'menu_name'             => _x( 'Movies', 'Admin Menu text', 'my-plugin' ),

        'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'my-plugin' ),

        'add_new'               => __( 'Add New', 'my-plugin' ),

        'add_new_item'          => __( 'Add New Movie', 'my-plugin' ),

        'new_item'              => __( 'New Movie', 'my-plugin' ),

        'edit_item'             => __( 'Edit Movie', 'my-plugin' ),

        'view_item'             => __( 'View Movie', 'my-plugin' ),

        'all_items'             => __( 'All Movies', 'my-plugin' ),

        'search_items'          => __( 'Search Movies', 'my-plugin' ),

        'parent_item_colon'     => __( 'Parent Movies:', 'my-plugin' ),

        'not_found'             => __( 'No movie found.', 'my-plugin' ),

        'not_found_in_trash'    => __( 'No movie found in Trash.', 'my-plugin' ),

        'featured_image'        => _x( 'Movie Cover Image', '', 'my-plugin' ),

        'set_featured_image'    => _x( 'Set cover image', '', 'my-plugin' ),

        'remove_featured_image' => _x( 'Remove cover image', '', 'my-plugin' ),

        'use_featured_image'    => _x( 'Use as cover image', '', 'my-plugin' ),

        'archives'              => _x( 'Movie archives', '', 'my-plugin' ),

        'insert_into_item'      => _x( 'Insert into movie', '', 'my-plugin' ),

        'uploaded_to_this_item' => _x( 'Uploaded to this movie', '', 'my-plugin' ),

        'filter_items_list'     => _x( 'Filter movies list', '', 'my-plugin' ),

        'items_list_navigation' => _x( 'Movies list navigation', '', 'my-plugin' ),

        'items_list'            => _x( 'Movies list', '', 'my-plugin' ),

    );

    $args = array(

        'labels'             => $labels,

        'public'             => true,

        'publicly_queryable' => true,

        'show_ui'            => true,

        'show_in_menu'       => true,

        'query_var'          => true,

        'rewrite'            => array( 'slug' => 'movie' ),

        'capability_type'    => 'post',

        'has_archive'        => true,

        'hierarchical'       => false,

        'menu_position'      => null,

        'show_in_rest'       => true,

        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),

    );

    register_post_type( 'movie', $args );
}

add_action( 'init', 'myplugin_movie_post_type' );

/**
 * Update title placeholder
 */
function myplugin_update_movie_title_placeholder($title) {
    $screen = get_current_screen();
    if( 'movie' === $screen->post_type ) {
        $title = 'Add movie name';
    }

    return $title;
}
add_filter('enter_title_here', 'myplugin_update_movie_title_placeholder');