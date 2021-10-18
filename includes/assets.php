<?php
/**
 * Enqueue files
 */

add_action('admin_head', 'pluginprefixAdminEnqueues');
add_action('wp_enqueue_scripts', 'pluginprefixFrontendEnqueue' );

function pluginprefixAdminEnqueues( $hook ) {

    wp_enqueue_style('css-admin', PLUGINPREFIX_URI . '/assets/css/style.css');
}

function pluginprefixFrontendEnqueue( $hook ) {

    wp_enqueue_script( 'script',PLUGINPREFIX_URI . '/assets/js/app.js', [] );
    wp_localize_script( 'script', PLUGINPREFIX,
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' )
        ) );
}