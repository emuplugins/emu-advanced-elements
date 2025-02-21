<?php 

if ( ! defined('ABSPATH')) exit;

// Registra o widget no Bricks
function emu_register_marquee_widget($widgets) {
    $widgets[] = 'Emu_Marquee_Widget';
    return $widgets;
}
add_filter('bricks/widgets', 'emu_register_marquee_widget');

// Definir a classe do widget
class Emu_Marquee_Widget extends \Bricks\Elements\Base {
    public function get_name() {
        return 'emu-marquee'; // Nome do widget
    }

    public function get_title() {
        return 'Emu Marquee'; // Título que aparece no Bricks
    }

    public function render() {
        // Pega os atributos do widget
        $atts = $this->get_settings_for_display();

        // Gera o HTML com o shortcode
        echo do_shortcode('[emu_marquee id="' . esc_attr($atts['id']) . '" 
                            images="' . esc_attr($atts['images']) . '" 
                            width="' . esc_attr($atts['width']) . '" 
                            height="' . esc_attr($atts['height']) . '" 
                            gap="' . esc_attr($atts['gap']) . '" 
                            duration="' . esc_attr($atts['duration']) . '" 
                            border_radius="' . esc_attr($atts['border_radius']) . '" 
                            object_fit="' . esc_attr($atts['object_fit']) . '" 
                            direction="' . esc_attr($atts['direction']) . '"]');
    }

    public function get_settings() {
        return array(
            'id' => array(
                'type' => 'text',
                'label' => __('Marquee ID', 'emu'),
                'default' => uniqid('emu_'),
            ),
            'images' => array(
                'type' => 'textarea',
                'label' => __('Images (comma separated)', 'emu'),
                'default' => '',
            ),
            'width' => array(
                'type' => 'number',
                'label' => __('Width', 'emu'),
                'default' => 300,
            ),
            'height' => array(
                'type' => 'number',
                'label' => __('Height', 'emu'),
                'default' => 100,
            ),
            'gap' => array(
                'type' => 'number',
                'label' => __('Gap', 'emu'),
                'default' => 30,
            ),
            'duration' => array(
                'type' => 'number',
                'label' => __('Duration (seconds)', 'emu'),
                'default' => 90,
            ),
            'border_radius' => array(
                'type' => 'number',
                'label' => __('Border Radius', 'emu'),
                'default' => 0,
            ),
            'object_fit' => array(
                'type' => 'select',
                'label' => __('Object Fit', 'emu'),
                'default' => 'cover',
                'options' => array('cover' => 'Cover', 'contain' => 'Contain', 'fill' => 'Fill'),
            ),
            'direction' => array(
                'type' => 'select',
                'label' => __('Direction', 'emu'),
                'default' => 'left',
                'options' => array('left' => 'Left', 'right' => 'Right'),
            ),
        );
    }
}
