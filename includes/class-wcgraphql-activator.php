<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/jkhaui
 * @since      1.0.0
 *
 * @package    Wcgraphql
 * @subpackage Wcgraphql/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wcgraphql
 * @subpackage Wcgraphql/includes
 * @author     Jordan Lee <jordan.lee.163@gmail.com>
 */
if ( ! class_exists( 'Wcgraphql_Activator' ) ) { 
class Wcgraphql_Activator {

	/**
	 * 
     * Checking for dependencies.
     *
	 * @since    1.0.0
	 */
	public static function activate() {

			if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ||
					!in_array( 'wp-graphql-develop/wp-graphql.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				
				// Deactivate the plugin
				deactivate_plugins(__FILE__);
				
				// Throw an error in the wordpress admin console
				$error_message = __('WooCommerce GraphQL Fields requires the <a href="http://wordpress.org/extend/plugins/woocommerce/">WooCommerce</a> &amp; WP GraphQL plugins to be activated first.', 'woocommerce');
				die($error_message);
	}
  }
}
}