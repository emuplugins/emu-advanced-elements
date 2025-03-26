<?php 

if ( ! defined('ABSPATH')) exit;

function EmuSlideElementor( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/slider/widget.php' );

	$widgets_manager->register( new \EmuSliderElementor() );

}

add_action( 'elementor/widgets/register', 'emuSlideElementor' );

// ===============================

function emuEnqueueScripts() {

    // Script de JavaScript do Splide
    wp_register_script('splidePackage', plugins_url('emu-advanced-elements/assets/js/packages/splide.js', EAE_PLUGIN_DIR));

    // Estilo do Splide com versão dinâmica (evitando cache)
    wp_register_style(
        'splideCSS', 
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css', 
        array(), 
        time()  // Adiciona a versão dinâmica
    );
    
    // Estilo personalizado do Splide com versão dinâmica (evitando cache)
    wp_register_style(
        'emuSplideStyle', 
        plugins_url('emu-advanced-elements/assets/css/widgets/emu-slider/emu-splide.css', EAE_PLUGIN_DIR),
        array(),
        time()  // Adiciona a versão dinâmica
    );
    
   wp_register_script(
    'splideStarter',
    plugins_url('emu-advanced-elements/assets/js/widgets/slider/splide.js', EAE_PLUGIN_DIR),
    array(), // Dependências (vazio se não houver)
    time(), // Versão (usa timestamp para evitar cache)
    true // Carregar no footer
);

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

