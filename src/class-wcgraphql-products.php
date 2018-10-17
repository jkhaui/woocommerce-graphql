<?php

/**
 * The main functionality of the plugin.
 *
 * @link       https://github.com/jkhaui
 * @since      1.0.0
 *
 * @package    Wcgraphql
 * @subpackage Wcgraphql/src
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wcgraphql
 * @subpackage Wcgraphql/src
 * @author     Jordan Lee <jordan.lee.163@gmail.com>
 */
class WC_Products {


    public function __construct() {

        add_filter( 'register_post_type_args', array( $this, 'registerProducts' ), 10, 2 );
     
    }

    public function registerProducts($args, $post_type_name) {
   
    switch($post_type_name) {
	case 'product':
		$args['show_in_graphql'] = true;
		$args['graphql_single_name'] = 'product';
		$args['graphql_plural_name'] = 'products';
	break;
	}
    
	return $args;   
   
    }

}

global $WC_Register_Products;

$WC_Register_Products = new WC_Products();