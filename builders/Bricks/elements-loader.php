<?php 

if ( ! defined('ABSPATH')) exit;

// // Verifica se o Bricks Builder está ativo
// if ( class_exists( 'Bricks\Elements' ) ) {

    // Registra o elemento personalizado
    add_action( 'init', function() {
        $element_files = [
            plugin_dir_path( __FILE__ ) . 'widgets/advanced-marquee.php', // Caminho completo do arquivo do seu elemento
        ];

        foreach ( $element_files as $file ) {
            // Registra o elemento passando o caminho completo do arquivo
            \Bricks\Elements::register_element( $file, 'emu-marquee', 'Emu_Marquee_Widget' );
        }
    }, 11 );
