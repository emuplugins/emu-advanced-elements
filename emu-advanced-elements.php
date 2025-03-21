<?php
/**
 * Plugin Name: Emu Advanced Elements
 * Plugin URI:  https://www.exemplo.com.br/emu-advanced-elements
 * Description: Este plugin adiciona elementos avançados ao seu site, permitindo uma personalização ainda mais completa com widgets e shortcodes customizados.
 * Version:     1.0.0
 * Author:      Seu Nome
 * Author URI:  https://www.seunome.com.br
 * Text Domain: emu-advanced-elements
 * Domain Path: /languages
 * License:     GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * @package Emu Advanced Elements
 * @author Seu Nome
 */

// Evitar acesso direto ao arquivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define('EAE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EAE_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load backend files
if (is_admin()) {
    require_once EAE_PLUGIN_DIR . 'update-handler.php';
}        


// Functions and shortcodes
require_once EAE_PLUGIN_DIR . 'includes/shortcodes/advanced-marquee-shortcode.php';

// Functions and shortcodes
require_once EAE_PLUGIN_DIR . 'includes/shortcodes/emu-gallery-lightbox.php';

// Builders
require_once EAE_PLUGIN_DIR . 'builders/Bricks/elements-loader.php';

require_once EAE_PLUGIN_DIR . 'builders/Elementor/elements-loader.php';