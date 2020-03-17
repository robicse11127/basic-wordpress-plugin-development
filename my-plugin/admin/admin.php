<?php 
/**
 * Init Styles & scripts
 *
 * @return void
 */
function myplugin_admin_styles_scripts() {

    wp_register_style( 'myplugin-image-uplaoder', MYPLUGIN_URL . 'admin/css/image-uploader.css', '', rand() );
    wp_enqueue_style( 'myplugin-admin-style', MYPLUGIN_URL . 'admin/css/admin.css', '', rand());

    wp_register_script( 'myplugin-image-uploader', MYPLUGIN_URL . 'admin/js/image-uploader.js', array('jquery'), rand(), true );
    wp_enqueue_script( 'myplugin-admin-script', MYPLUGIN_URL . 'admin/js/admin.js', array('jquery'), rand(), true );
}
add_action( 'admin_enqueue_scripts', 'myplugin_admin_styles_scripts' );
