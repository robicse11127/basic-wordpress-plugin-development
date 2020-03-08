<?php 

/**
 * Add columns to data table
 */
function myplugin_movie_add_columns( $columns ) {

    unset($columns['date']);
    unset($columns['author']);
    unset($columns['taxonomy-movie_cat']);

    $columns['image']                   = __('Poster', 'my-plugin');
    $columns['release_year']            = __('Release Year', 'my-plugin');
    $columns['video_type']              = __('Video Type', 'my-plugin');
    $columns['author']                  = __('Author', 'my-plugin');
    $columns['taxonomy-movie_cat']      = __('Categories', 'my-plugin');
    $columns['date']                    = __('Published On', 'my-plugin');

    return $columns;
}
add_action( 'manage_movie_posts_columns', 'myplugin_movie_add_columns' );

/**
 * Output Table Column Values
 */
function output_column_content( $column, $post_id ) {

    switch( $column ) {
        case 'image' :
            echo get_the_post_thumbnail($post_id, 'poster-thumbnail');
            break;
        case 'release_year' :
            echo get_post_meta( $post_id, '_myplugin_movie_release_year', true );
            break;
        case 'video_type' :
            echo get_post_meta( $post_id, '_myplugin_movie_video_type', true );
            break;

        default: 
            break;
    }

}
add_filter('manage_movie_posts_custom_column', 'output_column_content', 10, 2);
add_image_size('poster-thumbnail', 50);

/**
 * Making Columns Sortable
 */
function myplugin_make_movie_columns_sortable( $columns ) {
    $columns['release_year']    = 'release_year';
    $columns['video_type']      = 'video_type';

    return $columns;
}
add_filter('manage_edit-movie_sortable_columns', 'myplugin_make_movie_columns_sortable');

/**
 * Columns sorting logic
 */
function myplugin_movie_columns_sorting_logic( $query ) {

    if( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if( 'release_year' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_myplugin_movie_release_year');
    }

    if( 'video_type' === $query->get('orderby') ) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_myplugin_movie_video_type');
    }

}
add_action( 'pre_get_posts', 'myplugin_movie_columns_sorting_logic' );