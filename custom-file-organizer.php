<?php
/*
Plugin Name: Custom File Organizer
Plugin URI: https://github.com/kyletaylored/custom-file-organizer
Description: Provides WP-CLI commands to organize files in the uploads directory and an admin interface for monitoring and managing file organization.
Version: 0.0.1
Author: Kyle Taylor
Author URI: https://github.com/kyletaylored
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: custom-file-organizer
Domain Path: /languages
Requires at least: 5.0
Tested up to: 5.8
Requires PHP: 7.0
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (defined('WP_CLI') && WP_CLI) {
    require_once __DIR__ . '/includes/class-custom-file-organizer-cli.php';
    WP_CLI::add_command('file-organizer', 'Custom_File_Organizer_CLI');
}

add_action('admin_menu', 'custom_file_organizer_admin_menu');

function custom_file_organizer_admin_menu()
{
    add_menu_page(
        __('File Organizer', 'custom-file-organizer'),
        __('File Organizer', 'custom-file-organizer'),
        'manage_options',
        'custom-file-organizer',
        'custom_file_organizer_admin_page',
        'dashicons-archive'
    );
}

function custom_file_organizer_admin_page()
{
    ?>
    <div class="wrap">
        <h1>
            <?php _e('File Organizer', 'custom-file-organizer'); ?>
        </h1>
        <!-- TODO: Add content and logic for admin page here -->
    </div>
    <?php
}

function custom_file_organizer_admin_page()
{
    // Example content - modify as needed
    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('File Organizer Status', 'custom-file-organizer') . '</h1>';

    // Example table
    echo '<h2>' . esc_html__('Recent File Movements', 'custom-file-organizer') . '</h2>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>' . esc_html__('Before', 'custom-file-organizer') . '</th><th>' . esc_html__('After', 'custom-file-organizer') . '</th></tr></thead>';
    echo '<tbody>';

    // Fetch and display recent file movement data
    // This is a placeholder - you'll need to fetch real data
    echo '<tr><td>' . esc_html__('Path/Before.jpg', 'custom-file-organizer') . '</td><td>' . esc_html__('Path/After.jpg', 'custom-file-organizer') . '</td></tr>';

    echo '</tbody></table>';
    echo '</div>';
}

add_action('admin_enqueue_scripts', 'custom_file_organizer_admin_scripts');

function custom_file_organizer_admin_scripts()
{
    // Enqueue custom styles and scripts here
}
