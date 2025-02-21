<?php

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__DIR__) . 'functions/advanced-marquee.php'; // Certifique-se de que o caminho está correto

function emu_marquee_shortcode($atts) {
    // Define os atributos padrão do shortcode
    $atts = shortcode_atts(array(
        'id' => uniqid('emu_'),
        'images' => '',
        'width' => 300,
        'height' => 100,
        'gap' => 30,
        'duration' => 90,
        'border_radius' => 0,
        'object_fit' => 'cover',
        'direction' => 'left',
        'split' => 'false' // Novo atributo para dividir o carrossel
    ), $atts);

    // Converte o atributo 'images' para um array
    if (is_string($atts['images'])) {
        $images = array_map('trim', explode(',', $atts['images']));
    } elseif (is_array($atts['images'])) {
        $images = $atts['images'];
    } else {
        $images = [];
    }

    // Se não houver imagens válidas, retorna uma mensagem
    if (empty($images) || $images[0] === '') {
        return 'Empty slider!';
    }

    // Converte 'split' para booleano (aceita 'true' e 'false' como string)
    $split_carousel = filter_var($atts['split'], FILTER_VALIDATE_BOOLEAN);

    // Gera o carrossel
    ob_start();
    emu_generate_marquee($atts['id'], $images, $atts['width'], $atts['height'], $atts['gap'], $atts['duration'], $atts['border_radius'], $atts['object_fit'], $atts['direction'], $split_carousel);
    return ob_get_clean();
}

// Registra o shortcode [emu_marquee]
add_shortcode('emu_marquee', 'emu_marquee_shortcode');
