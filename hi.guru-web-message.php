<?php

/**
*@package hi.guruWebMessagePlugin
*/

/*
* Plugin Name: hi.guru WebMessage
* Description: hi.guru WebMessage plugin is the simplest, smartest and most engaging way to chat with your customers from your website.
* Version: 1.0.7
* Author: hi.guru
* Author URI: https://www.hi.guru/
* License: GPL2
* License URI:https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: higuru-webmessage
*/

define( 'HIGURU_VERSION_NUMBER', "1.0.7" );
define( 'HIGURU_ENVIRONMENT', "prod" );//stage, dev or prod
define( 'HIGURU_PLUGIN_DIRECTORY', plugin_dir_path( __FILE__));

if(HIGURU_ENVIRONMENT=='stage'){
	define( 'HIGURU_BASE_URL', 'https://api-stage.hi.guru' );
}

if(HIGURU_ENVIRONMENT=='dev'){
	define( 'HIGURU_BASE_URL', 'https://'.HIGURU_ENVIRONMENT.'.hi.guru:3250' );
}

if(HIGURU_ENVIRONMENT=='prod'){
	define( 'HIGURU_BASE_URL', 'https://api.hi.guru' );
}


// If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey! Sorry, but  you can\t access this file!' );

// Require once the Composer Autoload
if ( file_exists( plugin_dir_path( __FILE__). '/vendor/autoload.php' ) ) {
	require_once plugin_dir_path( __FILE__).'/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_higuru_plugin() {
	Inc_Higuru\Base\Higuru_Activate::higuru_activate();
}
register_activation_hook( __FILE__, 'activate_higuru_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_higuru_plugin() {
	Inc_Higuru\Base\Higuru_Deactivate::higuru_deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_higuru_plugin' );

/**
 * The code that  uninstalls hi.guru Webmessage
 */

function uninstall_higuru_plugin() {
	Inc_Higuru\Base\Higuru_Uninstall::higuru_uninstall();
}
register_uninstall_hook( __FILE__, 'uninstall_higuru_plugin' );
/**
 * Initialize all the core classes of the plugin
 */

if ( class_exists( 'Inc_Higuru\\Higuru_Init' ) )  {
	Inc_Higuru\Higuru_Init::higuru_register_services();
}
