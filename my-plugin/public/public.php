<?php 
/**
 * Init Styles & scripts
 *
 * @return void
 */
function myplugin_public_styles_scripts() {

    wp_enqueue_style( 'myplugin-public-style', MYPLUGIN_URL . 'public/css/public.css', '', rand());

    wp_enqueue_script( 'myplugin-public-script', MYPLUGIN_URL . 'public/js/public.js', array('jquery'), rand(), true );
}
add_action( 'wp_enqueue_scripts', 'myplugin_public_styles_scripts' );