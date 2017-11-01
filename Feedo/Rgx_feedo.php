<?php
/*
Plugin Name:  Feedo
Plugin URI:   https://developer.regalix.org/Feedo/the-basics/
Description:  The Feedo plugin for Shopify makes it quick and easy to automate product feed optimization for Google Merchant Center
Version:      1.0
Author:       Regalix
Author URI:   https://developer.regalix.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wp-org
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die( 'cant access this directly' );

add_action( 'admin_menu', 'Feedo_menu' );

function Feedo_menu() {
	add_options_page( 'Feedo Google Shopping Plugin', 'Feedo', 'manage_options', 'Feedosettings', 'Feedo_options' );
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'my_plugin_action_links' );

function my_plugin_action_links( $links ) {
	$links[] = '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=Feedosettings' ) ) . '">Settings</a>';
	$links[] = '<a href="http://regalix.com" target="_blank">More plugins by Regalix</a>';

	return $links;
}

function Feedo_options() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	echo '<link rel="stylesheet" href="../wp-content/plugins/Feedo/css/feedo-admin.css" />';
	echo '<link rel="stylesheet" href="../wp-content/plugins/Feedo/css/bootstrap.min.css" />';
	echo '<link rel="stylesheet" href="../wp-content/plugins/Feedo/css/style.css" />';
	echo '<script  src="../wp-content/plugins/Feedo/js/formvalidation.js" > </script>';


	echo '<div class="wrap">';
	echo '<h1>Feed<img class="app-admin-header__icon" alt="Feedo" itemprop="image" src="../wp-content/plugins/Feedo/img/feedo.png"> Setting</h1>';
	echo '</div>';

	include_once "admintemplate.php";

}

register_activation_hook( __FILE__, 'Feedo_activate' );

function Feedo_activate() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();


	$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}Feedosetting (
  id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
  date DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
  pr_Description TINYTEXT NOT NULL,
  pr_Availibility TEXT NOT NULL,
  Gpc_value TEXT NOT NULL,
  pr_condition VARCHAR(55) DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
)$charset_collate;";

	/*CREATE TABLE IF NOT EXISTS wp_shopfeed (
	  id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
	  name TINYTEXT NOT NULL,
	  feedlink TINYTEXT NOT NULL,
	  optimized_feed_link TINYTEXT NOT NULL,
	  Feed_id VARCHAR(55) DEFAULT '' NOT NULL,
	  PRIMARY KEY  (id)
	);"; */

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	$tablename = $wpdb->prefix . 'Feedosetting';

	$wpdb->insert( $tablename,
		array(
			'date'            => current_time( 'mysql' ),
			'pr_Description'  => "Long_description",
			'pr_Availibility' => "In_stock",
			'Gpc_value'       => "",
			'pr_condition'    => "new",
		)
	);
	/*$wpdb->insert( wp_shopfeed,
		array(
			'name'                => "",
			'feedlink'            => "",
			'optimized_feed_link' => "",
			'Feed_id'             => "",
		)
	);*/

}

add_action( 'wp', 'feed_load' );

function feed_load(){
	if (strpos($_SERVER['REQUEST_URI'],'toto.php')){
		echo"test";
	}

}

register_deactivation_hook( __FILE__, 'Feedo_deactivate' );

function Feedo_deactivate() {
	// nothing to be done here for now
}


register_uninstall_hook( __FILE__, 'Feedo_uninstall' );

function Feedo_uninstall() {
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS wp_Feedosetting" );
	$wpdb->query( "DROP TABLE IF EXISTS wp_shopfeed" );
}