<?php
/**
 * Plugin Name: SB Elementor Widgets
 * Description: Custom Elementor image widget for Salonbiz.
 * Plugin URI:  https://www.evercommerce.com/
 * Version:     1.0.5
 * Author:      EverCommerce GD Dev Team
 * Author URI:  https://www.evercommerce.com/
 * Text Domain: elementor-sb-widgets
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register hero Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/sb-image-widget.php' );

	$widgets_manager->register( new \SB_Image_Widget() );

}
add_action( 'elementor/widgets/register', 'register_widgets' );


/**
 * Register scripts and styles for Elementor test widgets.
 */
function elementor_test_widgets_dependencies() {

		/* Scripts */
	wp_register_script( 'float_img_script',   plugins_url('/assets/js/svg-float-img.js', __FILE__), array('jquery'),null, true);

	/* Styles */
	wp_register_style( 'svg_style', plugins_url('assets/css/svg-float-img.css', __FILE__));

}
add_action( 'wp_enqueue_scripts', 'elementor_test_widgets_dependencies' );
