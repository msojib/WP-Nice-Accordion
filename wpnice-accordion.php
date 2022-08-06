<?php
/*
Plugin Name: WPNice Accordion
Plugin URI:https://accordion.reactheme.com
Description: Fully Responsive and Mobile Friendly Faq/Accordion/QA Showcase plugin.
Version: 1.0.0
Author: ReacThemes
Author URI:https://reactheme.com
License: GPLv2 or later
Text Domain: wpnice-accordion
Domain Path: /languages/
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


define( 'WPNICE_ACCORDION_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPNICE_ACCORDION_URL', plugin_dir_url( __FILE__ ) );
define( 'WPNICE_ACCORDION_INCLUDES', WPNICE_ACCORDION_PATH . 'includes' );
//define( 'WPNICE_ACCORDION_VERSION', $this->version );
define( 'WPNICE_ACCORDION_PLUGIN_NAME', 'wpnice-accordion' );

class WPNICE_ACCORDION_INITIAL{
	function __construct(){
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_plugin_action_links' ));
		require_once('includes/init.php');				
	}
	//load text-domain
	function load_textdomain() {
		load_plugin_textdomain( 'wpnice-accordion', false, plugin_dir_url( __FILE__ ) . "/languages" );
	}	
	//add pluign links
	function add_plugin_action_links ( $links ) {
		$mylinks = array(
			'<a href="#" target="_blank">Demo</a>',
			'<a href="#" target="_blank">Documentation</a>',
		);
		return array_merge( $links, $mylinks );
	}
}
new WPNICE_ACCORDION_INITIAL();




