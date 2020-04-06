<?php

class Myplugin_Movie_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'myplugin_movie_list_widget',
            'Recent Movies',
            [
                'classname' => 'myplugin_movie_widget',
                'description' => 'Widget for displaying movie lists'
            ]
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );

        $query = new WP_Query([
            'post_type'      => 'movie',
            'post_status'    => 'publish',
            'posts_per_page' => $instance[ 'limit' ]
        ]);

        echo $args[ 'before_widget' ] . $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            if( ! empty( $query->posts ) ) {
                ?>
                <ul>
                    <?php
                        foreach( $query->posts as $movie ) {
                            ?>
                            <li><a href="<?php echo get_the_permalink( $movie->ID ); ?>"><?php echo get_the_title( $movie->ID ); ?></a></li>
                            <?php
                        }
                    ?>
                </ul>
                <?php
            }
        echo $args[ 'after_widget' ];
    }

    public function form( $instance ) {
        $title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $limit = ! empty( $instance[ 'limit' ] ) ? $instance[ 'limit' ] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title', 'my-plugin' ); ?>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>">
                <?php esc_attr_e( 'Number of movies to show', 'my-plugin' ); ?>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo esc_attr( $limit ); ?>">
            </label>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'limit' ] = ( ! empty( $new_instance[ 'limit' ] ) ) ? intval( $new_instance[ 'limit' ] ) : 5;

        return $instance;
    }

}

function register_myplugin_movie_widget() {
    register_widget( 'Myplugin_Movie_Widget' );
}
add_action( 'widgets_init', 'register_myplugin_movie_widget' );