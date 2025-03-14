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

define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
// Load backend files
if (is_admin()) {
    require_once PLUGIN_DIR . 'update-handler.php';
}

if ( ! is_admin() || ( is_admin() && isset($_GET['action']) && $_GET['action'] === 'edit' ) ) {
    // Functions and shortcodes
    require_once PLUGIN_DIR . 'includes/shortcodes/advanced-marquee-shortcode.php';
    // Functions and shortcodes
    require_once PLUGIN_DIR . 'includes/shortcodes/emu-gallery-lightbox.php';
    // Builders
    require_once PLUGIN_DIR . 'builders/Bricks/elements-loader.php';
}