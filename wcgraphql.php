<?php

/**
 * Plugin Name:       WooCommerce GraphQL Fields
 * Plugin URI:        https://github.com/jkhaui/woocommerce-graphql-fields
 * Description:       This extension exposes WooCommerce Product fields for the WP GraphQL endpoint.   
 * Version:           1.0.0
 * Author:            Jordan Lee
 * Author URI:        https://github.com/jkhaui
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcgraphql
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Current plugin version.
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

// This function runs when the plugin is activated.
function activate_wcgraphql() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcgraphql-activator.php';
	Wcgraphql_Activator::activate();
}

// This function runs when the plugin is deactivated.
function deactivate_wcgraphql() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcgraphql-deactivator.php';
	Wcgraphql_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcgraphql' );
register_deactivation_hook( __FILE__, 'deactivate_wcgraphql' );

// The core plugin class.
require plugin_dir_path( __FILE__ ) . 'includes/class-wcgraphql.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wcgraphql() {

	$plugin = new Wcgraphql();
	$plugin->run();

}
run_wcgraphql();