<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Include the file that contains the function to generate the marquee
require_once plugin_dir_path( __FILE__ ) . 'includes/advanced-marquee.php'; // Correct file path

function emu_marquee_shortcode($atts) {
    // Define the default attributes for the shortcode
    $atts = shortcode_atts(array(
        'id' => uniqid('emu_'),
        'images' => '',
        'width' => 300,
        'height' => 100,
        'gap' => 30,
        'duration' => 90,
        'border_radius' => 0,
        'object_fit' => 'cover',
        'direction' => 'left'
    ), $atts);

    // Convert the string of images to an array
    $images = array_map('trim', explode(',', $atts['images']));

    // Ensure there is at least one image
    if (empty($images) || $images[0] === '') {
        return 'Empty slider!';
    }

    // Generate the marquee HTML
    ob_start();
    emu_generate_marquee($atts['id'], $images, $atts['width'], $atts['height'], $atts['gap'], $atts['duration'], $atts['border_radius'], $atts['object_fit'], $atts['direction']);
    return ob_get_clean();
}

// Register the shortcode [emu_marquee]
add_shortcode('emu_marquee', 'emu_marquee_shortcode');