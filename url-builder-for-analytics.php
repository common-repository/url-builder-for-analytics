<?php
/**
 * Plugin Name: URL Builder for Analytics
 * Plugin URI: https://github.com/Jarlskov/google-analytics-url-builder
 * Description: This plugin adds an easy way to create a Google Analytics URL for your posts.
 * Version: 1.1.2
 * Author: Jesper Jarlskov
 * Author URI: http://jesperjarlskov.dk
 * Text Domain: url-builder-for-analytics
 * License: GPL2
 */

add_action( 'add_meta_boxes', 'url_builder_post_meta_box' );

/**
 * Main function constructing the analytics URL builder meta boxes for all custom post types.
 */
function url_builder_post_meta_box() {
    load_plugin_textdomain( 'url-builder', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    $screens = get_post_types( array(), 'names' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'url_builder_meta_box',
            'Analytics URL builder',
            'url_builder_post_meta_box_render',
            $screen
        );
    }
}

/**
 * Render the URL builder meta box.
 * Outputs the HTML directly to the browser, WordPress style!
 */
function url_builder_post_meta_box_render() {
    include( __DIR__ . '/templates/meta_box_post_form.php' );
    wp_enqueue_script( 'url-builder-for-analytics', plugins_url() . '/url-builder-for-analytics/assets/url-builder-for-analytics.js', array( 'jquery-ui-tabs' ), '0.0.1', true );
}
