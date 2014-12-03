<?php  
/* 
Plugin Name: UKM UNN
Plugin URI: http://www.ukm-norge.no
Description: Viser hvilke beskjeder som sendes via unn-kampanjen
Author: UKM Norge / M Mandal 
Version: 3.0 
Author URI: http://www.ukm-norge.no
*/

if(is_admin()) {
	global $blog_id;
	if( $blog_id == 1 ) {
		add_action('network_admin_menu', 'UKMunn_menu');
		
		add_action('wp_ajax_UKMunn_load', 'UKMunn_ajax_load');
		add_action('wp_ajax_UKMunn_action', 'UKMunn_ajax_action');
	}
}

function UKMunn_menu() {
	$page = add_menu_page('UNN UKM', 'UNN-kampanje', 'administrator', 'UKMunn','UKMunn', '/wp-content/plugins/UKMunn_wp/resources/favicon-16.png',25);
    add_action( 'admin_print_styles-' . $page, 'UKMunn_scripts_and_styles' );

}

function UKMunn() {
	$INFOS = array();
	require_once('controller/messages.controller.php');
	echo TWIG( 'gui.twig.html', $INFOS, dirname(__FILE__));
}

function UKMunn_scripts_and_styles(){
	wp_enqueue_script('handlebars_js');
	wp_enqueue_script('bootstrap_js');
	wp_enqueue_style('bootstrap_css');

	wp_enqueue_style('UKMresources_tabs');

	wp_enqueue_style( 'UKMunn_css', plugin_dir_url( __FILE__ ) . 'UKMunn_wp.css');
//	wp_enqueue_script( 'UKMunn_js', plugin_dir_url( __FILE__ ) . 'UKMunn.js');
}