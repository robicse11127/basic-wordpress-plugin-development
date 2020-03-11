<?php 

/**
 * Custom Admin Menu
 */
function myplugin_custom_admin_menu() {
    add_menu_page(
        __( 'Custom Menu', 'my-plugin' ),
        __('Custom Menu', 'my-plugin' ),
        'manage_options',
        'custom-menu',
        'myplugin_custom_submenu_template_callback',
        MYPLUGIN_URL . 'admin/img/plugins.png',
        10
    );

    add_submenu_page(
        'custom-menu',
        __( 'Custom Submenu', 'my-plugin' ),
        __( 'Custom Submenu', 'my-plugin' ),
        'manage_options',
        'custom-menu',
        'myplugin_custom_submenu_template_callback'
    );

    add_submenu_page(
        'custom-menu',
        __( 'Custom Submenu 2', 'my-plugin' ),
        __( 'Custom Submenu 2', 'my-plugin' ),
        'manage_options',
        'custom-submenu-2',
        'myplugin_custom_submenu_template_callback_2'
    );

    add_submenu_page(
        'admin.php',
        __( 'Custom Link', 'my-plugin' ),
        __( 'Custom Link', 'my-plugin' ),
        'manage_options',
        'custom-link',
        'myplugin_custom_link_template_callback'
    );

}
add_action( 'admin_menu', 'myplugin_custom_admin_menu' );

/**
 * Custom Submenu Callback Function
 */
function myplugin_custom_submenu_template_callback() {
    ?>
    <h4>Hi, I am from custom submenu!!!</h4>
    <?php
}

/**
 * Custom Submenu Callback Function 2
 */
function myplugin_custom_submenu_template_callback_2() {
    ?>
    <h4>Hi, I am from custom submenu 2!!!</h4>
    <a href="<?php echo admin_url('/admin.php?page=custom-link'); ?>">Custom Link</a>
    <?php
}

/**
 * Custom Link Tempalte Callback Function
 */
function myplugin_custom_link_template_callback() {
    ?>
    <h4>Hello, I am from the custom link template!!!</h4>
    <?php 
}
