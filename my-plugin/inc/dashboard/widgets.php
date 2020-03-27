<?php

/**
 * Movie Dashboard Widget
 */
function myplugin_movie_dashboard_widget() {
    wp_add_dashboard_widget(
        'myplugin_movie_dash_widget',
        'Movie At a Glance',
        'myplugin_miovie_glance_callback'
    );
}
add_action( 'wp_dashboard_setup', 'myplugin_movie_dashboard_widget' );

/**
 * Movie Dashboard Widget Callback
 */
function myplugin_miovie_glance_callback() {
    $query = new WP_Query([ 'post_type' => 'movie' ]);
    $count = wp_count_posts( 'movie' );
    ?>
    <div class="main">
        <ul>
            <li class="post-count">
                Total: <a href="<?php echo admin_url( '/edit.php?post_type=movie' ) ?>"><?php echo $query->post_count; ?> Movies</a>
            </li>
            <li class="post-publish">
                Publish: <a href="<?php echo admin_url( '/edit.php?post_status=publish&post_type=movie' ) ?>"><?php echo $count->publish; ?> Movies</a>
            </li>
            <li class="post-draft">
                Draft: <a href="<?php echo admin_url( '/edit.php?post_status=draft&post_type=movie' ) ?>"><?php echo $count->draft; ?> Movie</a>
            </li>
        </ul>
    </div>
    <?php
}