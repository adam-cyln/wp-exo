<?php

/*
 * Plugin Name: adam
 * Text Domain: adam
 */

 define('CAPACITY_PLUGIN_PATH', plugin_dir_path(__FILE__));
 require_once CAPACITY_PLUGIN_PATH.'includes/styling.php';

add_action('admin_menu', 'wporg_options_page');
function wporg_options_page()
{
	add_menu_page(
		'Adam',
		'Adam',
		'manage_options',
		'adam_options',
		'adam_options_page_html',
		'dashicons-buddicons-community',
		3
	);

	add_submenu_page(
		'adam_options',
		'Styling',
		'Styling',
		'manage_options',
		'adam_styling',
		'adam_styling_html'
	);
}

function adam_options_page_html (){

}
