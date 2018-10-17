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
 * The main functionality of the plugin.
 *
 *
 * @package    Wcgraphql
 * @subpackage Wcgraphql/src
 * @author     Jordan Lee <jordan.lee.163@gmail.com>
 */
class WC_Product_Detail {

    public function __construct() {

        add_filter('graphql_product_fields', array( $this, 'registerProductDetail' ) );
     
    }

    public function registerProductDetail($fields) {
   
		$fields['slug'] = [
			'type' => \WPGraphQL\Types::string(),
			'description' => __('The slug of the product', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_slug();
			}
		];
   		$fields['featured'] = [
			'type' => \WPGraphQL\Types::boolean(),
			'description' => __('Is the product featured?', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_featured();
			}
		];
        $fields['rating'] = [
			'type' => \WPGraphQL\Types::float(),
			'description' => __('Get the product\'s average rating', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_average_rating();
			}
		];
		$fields['price'] = [
			'type' => \WPGraphQL\Types::string(),
			'description' => __('The product\'s price', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_price();
			}
		];
		$fields['thumbnail'] = [
			'type' => \WPGraphQL\Types::string(),
			'description' => __('The product\'s thumbnail image', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				$image_id = $product->get_image_id();
				return wp_get_attachment_image_src($image_id)[0];
			}
		];
		$fields['description'] = [
			'type' => \WPGraphQL\Types::string(),
			'description' => __('The product\'s description', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_description();
			}
		];
		$fields['is_on_sale'] = [
			'type' => \WPGraphQL\Types::boolean(),
			'description' => __('Returns yes or no for the product\'s sale status', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->is_on_sale();
			}
		];
		$fields['sale_price'] = [
			'type' => \WPGraphQL\Types::string(),
			'description' => __('The product\'s sale price', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				return $product->get_sale_price();
			}
		];
		$fields['categories'] = [
			'type' => \WPGraphQL\Types::list_of(\WPGraphQL\Types::taxonomy()),
			'description' => __('The product\'s categories', 'wcgql'),
			'resolve' => function(\WP_Post $post) {
				$product = new WC_Product($post->ID);
				$cat_ids = $product->get_category_ids();
				$cats = array_map(function($cat_id) {
					return get_term($cat_id);
				}, $cat_ids);
				return $cats;
			}
		];
		return $fields;
}
}

global $WC_Register_Product_Detail;

$WC_Register_Product_Detail = new WC_Product_Detail();