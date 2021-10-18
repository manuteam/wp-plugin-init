<?php
/**
 * Plugin Name: Plugin name
 * Plugin URI: https://manu.team
 * Description:  Plugin description
 * Author: MANU:TEAM { Web Development Services }
 * Version: 1.0.0
 * Author URI: https://manu.team
 * Requires PHP: 7.4
 * Tested up to: 5.4
 * Text Domain: text-domain
 */

defined( 'ABSPATH' ) || exit;

! defined( 'PLUGINPREFIX_VERSION' ) && define( 'PLUGINPREFIX_VERSION', '1.0.0' );
! defined( 'PLUGINPREFIX_DOMAIN' ) && define( 'PLUGINPREFIX_DOMAIN', 'text-domain' );
! defined( 'PLUGINPREFIXFILE' ) && define( 'PLUGINPREFIX_FILE', __FILE__ );
! defined( 'PLUGINPREFIX_URI' ) && define( 'PLUGINPREFIX_URI', plugin_dir_url( __FILE__ ) );
! defined( 'PLUGINPREFIX_DIR' ) && define( 'PLUGINPREFIX_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'PLUGINPREFIX_MANUAL' ) && define( 'PLUGINPREFIX_DOCS', 'https://manuals.manu.team/' );


if ( ! function_exists( 'pluginprefixInit' ) ) {
    add_action( 'plugins_loaded', 'pluginprefixInit', 11 );

    function pluginprefixInit() {
        // load text-domain
        load_plugin_textdomain( PLUGINPREFIX_DOMAIN, false, basename( __DIR__ ) . '/languages/' );

        // check woocommerce or other plugin exists
        if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
            add_action( 'admin_notices', 'pluginprefixNotice' );

            return;
        }

        include_once 'includes/helper.php';
        include_once 'includes/admin.php';
        include_once 'includes/assets.php';

    }
}

if ( ! function_exists( 'pluginprefixNotice' ) ) {
    function pluginprefixNotice() {
        ?>
        <div class="error">
            <p>
                <?php echo __('<strong>Plugin name</strong> requires WooCommerce version 3.0 or greater.', PLUGINPREFIX_DOMAIN); ?>
            </p>
        </div>
        <?php
    }
}