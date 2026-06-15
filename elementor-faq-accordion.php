<?php
/**
 * Plugin Name: Elementor FAQ Accordion
 * Description: Custom Elementor widget — numbered FAQ accordion with smooth expand/collapse animation.
 * Version:     1.0.0
 * Author:      WellEats
 * Text Domain: elementor-faq-accordion
 * Requires Plugins: elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EFA_VERSION', '1.0.0' );
define( 'EFA_PLUGIN_FILE', __FILE__ );
define( 'EFA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EFA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

function efa_check_elementor_dependency() {
	if ( did_action( 'elementor/loaded' ) ) {
		return;
	}

	add_action( 'admin_notices', function () {
		$message = esc_html__(
			'Elementor FAQ Accordion requires Elementor to be installed and activated.',
			'elementor-faq-accordion'
		);
		printf( '<div class="notice notice-warning"><p>%s</p></div>', $message );
	} );
}
add_action( 'plugins_loaded', 'efa_check_elementor_dependency' );

function efa_enqueue_assets() {
	wp_enqueue_style(
		'efa-faq-accordion',
		EFA_PLUGIN_URL . 'assets/css/faq-accordion.css',
		[],
		EFA_VERSION
	);

	$script_deps = [ 'jquery' ];
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		$script_deps[] = 'elementor-frontend';
	}

	wp_enqueue_script(
		'efa-faq-accordion',
		EFA_PLUGIN_URL . 'assets/js/faq-accordion.js',
		$script_deps,
		EFA_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'efa_enqueue_assets' );

function efa_register_widget( $widgets_manager ) {
	require_once EFA_PLUGIN_DIR . 'includes/class-faq-accordion-widget.php';
	$widgets_manager->register( new EFA_FAQ_Accordion_Widget() );
}
add_action( 'elementor/widgets/register', 'efa_register_widget' );
