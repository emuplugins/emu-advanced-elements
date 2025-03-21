<?php 

if ( ! defined('ABSPATH')) exit;

function EmuSlideElementor( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/slider/widget.php' );

	$widgets_manager->register( new \EmuSliderElementor() );

}

add_action( 'elementor/widgets/register', 'emuSlideElementor' );

// ===============================

function emuEnqueueScripts() {

	wp_register_script('splidePackage', plugins_url('emu-advanced-elements/assets/js/packages/splide.js', EAE_PLUGIN_DIR));

	wp_register_style('splideCSS', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css');
	
	wp_register_style('emuSplideStyle', plugins_url('emu-advanced-elements/assets/css/widgets/emu-slider/emu-splide.css', EAE_PLUGIN_DIR));
	
	wp_register_script('splideStarter', plugins_url('emu-advanced-elements/assets/js/widgets/slider/splide.js', EAE_PLUGIN_DIR));
}

add_action('wp_enqueue_scripts', 'emuEnqueueScripts');

// ==============================


function EmuAdvancedElementsCategory( $elements_manager ) {

	$elements_manager->add_category(
		'emu-advanced-elements',
		[
			'title' => esc_html__( 'Emu Advanced Elements', 'textdomain' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'EmuAdvancedElementsCategory' );

