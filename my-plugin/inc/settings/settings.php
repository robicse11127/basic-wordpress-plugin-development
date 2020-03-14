<?php 

/**
 * Create Settings Menu
 */
function myplugin_settings_menu() {

    add_menu_page(
        __( 'MyPlugin Settings', 'my-plugin' ),
        __( 'MyPlugin Settings', 'my-plugin' ),
        'manage_options',
        'myplugin-settings-page',
        'myplugin_settings_template_callback',
        '',
        null
    );

}
add_action('admin_menu', 'myplugin_settings_menu');

/**
 * Settings Template Page
 */
function myplugin_settings_template_callback() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post">
            <?php 
                // security field
                settings_fields( 'myplugin-settings-page' );

                // output settings section here
                do_settings_sections('myplugin-settings-page');

                // save settings button
                submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php 
}

/**
 * Settings Template
 */
function myplugin_settings_init() {

    // Setup settings section
    add_settings_section(
        'myplugin_settings_section',
        'Myplugin Settings Page',
        '',
        'myplugin-settings-page'
    );

    // Registe input field
    register_setting(
        'myplugin-settings-page',
        'myplugin_settings_input_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        'myplugin_settings_input_field',
        __( 'Input Field', 'my-plugin' ),
        'myplugin_settings_input_field_callback',
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

    // Registe textarea field
    register_setting(
        'myplugin-settings-page',
        'myplugin_settings_textarea_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => ''
        )
    );

     // Add textarea fields
     add_settings_field(
        'myplugin_settings_textarea_field',
        __( 'Textarea Field', 'my-plugin' ),
        'myplugin_settings_textarea_field_callback',
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

    // Register select option field
    register_setting(
        'myplugin-settings-page',
        'myplugin_settings_select_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add textarea fields
    add_settings_field(
        'myplugin_settings_select_field',
        __( 'Select Field', 'my-plugin' ),
        'myplugin_settings_select_field_callback',
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

    // Register radio field
    register_setting(
        'myplugin-settings-page',
        'myplugin_settings_radio_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add radio fields
    add_settings_field(
        'myplugin_settings_radio_field',
        __( 'Radio Field', 'my-plugin' ),
        'myplugin_settings_radio_field_callback',
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

}
add_action( 'admin_init', 'myplugin_settings_init' );


/**
 * txt tempalte
 */
function myplugin_settings_input_field_callback() {
    $myplugin_input_field = get_option('myplugin_settings_input_field');
    ?>
    <input type="text" name="myplugin_settings_input_field" class="regular-text" value="<?php echo isset($myplugin_input_field) ? esc_attr( $myplugin_input_field ) : ''; ?>" />
    <?php 
}


/**
 * textarea template
 */
function myplugin_settings_textarea_field_callback() {
    $myplugin_textarea_field = get_option('myplugin_settings_textarea_field');
    ?>
    <textarea name="myplugin_settings_textarea_field" class="large-text" rows="10"><?php echo isset($myplugin_textarea_field) ? esc_textarea( $myplugin_textarea_field ) : ''; ?></textarea>
    <?php 
}

/**
 * select template
 */
function myplugin_settings_select_field_callback() {
    $myplugin_select_field = get_option('myplugin_settings_select_field');
    ?>
    <select name="myplugin_settings_select_field" class="regular-text">
        <option value="">Select One</option>
        <option value="option1" <?php selected( 'option1', $myplugin_select_field ); ?> >Option 1</option>
        <option value="option2" <?php selected( 'option2', $myplugin_select_field ); ?>>Option 2</option>
    </select>
    <?php
}

/**
 * radio field tempalte
 */
function myplugin_settings_radio_field_callback() {
    $myplugin_radio_field = get_option( 'myplugin_settings_radio_field' );
    ?>
    <label for="value1">
        <input type="radio" name="myplugin_settings_radio_field" value="value1" <?php checked( 'value1', $myplugin_radio_field ); ?>/> Value 1
    </label>
    <label for="value2">
        <input type="radio" name="myplugin_settings_radio_field" value="value2" <?php checked( 'value2', $myplugin_radio_field ); ?>/> Value 2
    </label>
    <?php
}