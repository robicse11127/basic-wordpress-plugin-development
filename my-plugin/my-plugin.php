<?php 
/**
 * Plugin Name: My Plugin
 * Plugin URI: http://my-plugin.com
 * Author: Robi
 * Author URI: http://robi.me
 * Version: 1.0.0
 * Text Domain: my-plugin
 * Description: A smaple plugin to learn the plugin development.
 */
if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'MYPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'MYPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );

/**
 * Include admin.php
 */
if( is_admin() ) {
    require_once MYPLUGIN_PATH . '/admin/admin.php';
}

/**
 * Include public.php 
 */
if( !is_admin() ) {
    require_once MYPLUGIN_PATH . '/public/public.php';
}