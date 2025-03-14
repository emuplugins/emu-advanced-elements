<?php

if ( ! defined('ABSPATH')) exit;

require_once PLUGIN_DIR . 'includes/functions/gallery-lightbox.php';

function emu_gallery_lightbox_shortcode($data){

$data = shortcode_atts(
[
    'images' => NULL,
    'type' => 'loop',
    'perpage' => 4,
    'autoplay' => true,
    'interval' => 3000,
    'arrows' => true,
    'pagination' => true,
    'autoHeight' => true,
    'drag' => false,
    'gap' => '10px',
], $data);

// recuperando as imagens
$images = $data['images'];

// apagando o registro original
unset($data['images']);

// funcao para converter de string para array
function convertFISTR($i) {
    if (!empty($i)) {
        return array_map('trim', explode(',', $i));
    }
    return [];
}
$images = convertFISTR($images);

if(count($images) == 0){
    return 'Adicione pelo menos uma imagem';
}

ob_start();

emu_gallery_lightbox($images, $data);

return ob_get_clean();

}

add_shortcode('emu_gallery_lightbox', 'emu_gallery_lightbox_shortcode');