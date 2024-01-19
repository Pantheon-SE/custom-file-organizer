<?php
/**
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
Requires PHP: 7.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'upload_dir', 'wpb_custom_upload_directory' );

/**
 * Change custom upload directory pattern.
 * @param $param
 *
 * @return mixed
 */
function wpb_custom_upload_directory( $param ) {
	$upload_pattern = get_current_upload_pattern();
	$param['path'] = $param['basedir'] . $upload_pattern;
	$param['url']  = $param['baseurl'] . $upload_pattern;
	return $param;
}


/**
 * Get the current upload directory pattern.
 *
 * @return string The upload directory pattern.
 */
function get_current_upload_pattern(): string {
	$time = current_time( 'mysql' );
	$y    = substr( $time, 0, 4 );
	$m    = substr( $time, 5, 2 );
	$d    = substr( $time, 8, 2 );
	return "/$y/$m/$d";
}



if ( defined( 'WP_CLI' ) && WP_CLI ) {
	include_once __DIR__ . '/includes/class-custom-file-organizer-cli.php';
	WP_CLI::add_command( 'file-organizer', 'Custom_File_Organizer_CLI' );
}

add_action( 'admin_menu', 'custom_file_organizer_admin_menu' );

/**
 * Adds the File Organizer menu page to the WordPress admin menu.
 *
 * @return void
 */
function custom_file_organizer_admin_menu() {
	add_menu_page(
		__( 'File Organizer', 'custom-file-organizer' ),
		__( 'File Organizer', 'custom-file-organizer' ),
		'manage_options',
		'custom-file-organizer',
		'custom_file_organizer_admin_page',
		'dashicons-archive'
	);
}

/**
 * Renders the custom file organizer admin page.
 *
 * This method displays the current upload directory pattern and recent file movements in a table format. The current upload directory pattern is fetched using the get_current_upload
 * _pattern() function. The recent file movement data is a placeholder and needs to be replaced with actual data.
 *
 * @return void
 */
function custom_file_organizer_admin_page() {
	$uploadPattern = get_current_upload_pattern();

	echo '<div class="wrap">';
	echo '<h1>' . esc_html__( 'File Organizer Status', 'custom-file-organizer' ) . '</h1>';

	// Display the current upload pattern
	echo '<h2>' . esc_html__( 'Current Upload Directory Pattern', 'custom-file-organizer' ) . '</h2>';
	echo '<input type="text" value="' . esc_attr( $uploadPattern ) . '" disabled>';

	// Example table
	echo '<h2>' . esc_html__( 'Recent File Movements', 'custom-file-organizer' ) . '</h2>';
	echo '<table class="wp-list-table widefat fixed striped">';
	echo '<thead><tr><th>' . esc_html__( 'Before', 'custom-file-organizer' ) . '</th><th>' . esc_html__( 'After', 'custom-file-organizer' ) . '</th></tr></thead>';
	echo '<tbody>';
	// Fetch and display recent file movement data
	// This is a placeholder - you'll need to fetch real data
	echo '<tr><td>' . esc_html__( 'Path/Before.jpg', 'custom-file-organizer' ) . '</td><td>' . esc_html__( 'Path/After.jpg', 'custom-file-organizer' ) . '</td></tr>';
	echo '</tbody></table>';
	echo '</div>';
}
