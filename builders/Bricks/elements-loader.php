<?php 

if ( ! defined('ABSPATH')) exit;

if ( get_template() !== 'bricks' ) return;

// Registra o elemento personalizado
add_action( 'init', function() {
    $elements = [
        [
            'slug' => 'emu-marquee',
            'class' => 'Emu_Marquee_Widget',
            'file' => 'widgets/advanced-marquee.php'
        ],
        // [
        //     'slug' => 'emu-gallery-lightbox',
        //     'class' => 'Emu_Gallery_Lightbox',
        //     'file' => 'widgets/gallery-lightbox.php'
        // ]
    ];

    foreach ( $elements as $element ) {
        // Registra o elemento passando o caminho completo do arquivo
        \Bricks\Elements::register_element( (plugin_dir_path( __FILE__ ).$element['file'] ), $element['slug'], $element['class'] );
    }
}, 11 );
