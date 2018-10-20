<?php
/*
Plugin Name: ACF Dependent Plugin
Plugin URI: https://github.com/dinislambds/
Description: ACF Dependent Plugin to demonstarte a plugin depend on ACF only for practise purpose
Version: 1.0
Author: Md Din Islam
Author URI: https://dinislambds.com/
License: GPLv2 or later
Text Domain: adp
Domain Path: /languages/
*/

require_once(plugin_dir_path( __FILE__ )."/libs/class-tgm-plugin-activation.php");
require_once(plugin_dir_path( __FILE__ )."/inc/acf-codes.php");

function adp_load_text_domain(){
    load_plugin_textdomain("adp", false, dirname(__FILE__)."/languages");
}
add_action("plugins_loaded","adp_load_text_domain");

add_action( 'tgmpa_register', 'adp_tgm_register_required_plugins' );

function adp_tgm_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
    
	$config = array(
		'id'           => 'adp',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

    ));

	tgmpa( $plugins, $config );
}


?>