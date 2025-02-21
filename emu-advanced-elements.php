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

// Load backend files
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'update-handler.php';
}

if ( ! is_admin() || ( is_admin() && isset($_GET['action']) && $_GET['action'] === 'edit' ) ) {
    // Functions and shortcodes
    require_once plugin_dir_path(__FILE__) . '/shortcodes/advanced-marquee-shortcode.php';
    // Builders
    require_once plugin_dir_path(__FILE__) . '/builders/bricks/elements-loader.php';
}