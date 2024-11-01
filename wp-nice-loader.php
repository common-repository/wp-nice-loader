<?php
/*
Plugin Name: WP Nice Loader
Plugin URI: http://www.volkov.co.il
Version: 0.1.0.4
Author: Alexander Volkov
Description: Nice page loader, with full user controls about themes, timing, and pages
*/
if ( ! defined( 'ABSPATH' ) ) exit;

/********************************************
*	Theme Settings
********************************************/
if( get_option('nice_loader_theme') ) {
	define('NICE_LOADER_THEME', get_option('nice_loader_theme'));
}

/*********************************************
*  Plugin Admin Page
**********************************************/
if( !function_exists('vol4ikman_nice_loader_menu') ) {

	add_action('admin_menu', 'vol4ikman_nice_loader_menu');
	function vol4ikman_nice_loader_menu() {
		add_menu_page('WP Nice Loader', 'WP Nice Loader', 'administrator', 'wp-nice-loader-settings', 'vol4ikman_nice_loader_admin', 'dashicons-admin-customizer');
	}

	function vol4ikman_nice_loader_admin() {
	    include('nice_loader_admin.php');
	}

}

/*********************************************
*   Load plugin styles and scripts
**********************************************/
if( !function_exists('vol4ikman_load_wp_nice_loader_admin_style') ) {
	add_action( 'admin_enqueue_scripts', 'vol4ikman_load_wp_nice_loader_admin_style' );
	function vol4ikman_load_wp_nice_loader_admin_style() {
	    wp_enqueue_style( 'admin_css', plugin_dir_url( __FILE__ ) . 'assets/admin-style.css', false, NULL );

		wp_enqueue_script( 'nice-loader-colorpicker', plugin_dir_url( __FILE__ ) . 'assets/plugins/jqColorPicker.min.js', array('jquery'), NULL, true );
		wp_enqueue_script( 'nice-loader-admin-script', plugin_dir_url( __FILE__ ) . 'assets/admin-scripts.js', array('jquery'), NULL, true );
	}
}

/*********************************************
*   Register front styles & scripts
**********************************************/
if( !function_exists('vol4ikman_nice_loader_scripts') ) {

	add_action( 'wp_enqueue_scripts', 'vol4ikman_nice_loader_scripts' );
	function vol4ikman_nice_loader_scripts() {

		if( defined('NICE_LOADER_THEME') ) {
			wp_register_style( NICE_LOADER_THEME,  plugin_dir_url( __FILE__ ) . 'assets/themes/'.NICE_LOADER_THEME.'.css' );
			wp_enqueue_style( NICE_LOADER_THEME );
		}

	    wp_register_style( 'nice-loader-styles',  plugin_dir_url( __FILE__ ) . 'assets/front-styles.css' );
	    wp_enqueue_style( 'nice-loader-styles' );
	    wp_enqueue_script( 'nice-loader-scripts', plugin_dir_url( __FILE__ ) . 'assets/front-scripts.js', array('jquery'), NULL, true );
	}

}

/*********************************************
*   Change admin footer text
**********************************************/
if ( !function_exists('vol4ikman_nice_loader_remove_footer_admin') ) {

	add_filter('admin_footer_text', 'vol4ikman_nice_loader_remove_footer_admin');
	function vol4ikman_nice_loader_remove_footer_admin () {

	    $screen = get_current_screen();
	    if( $screen->parent_base == 'wp-nice-loader-settings' ) { ?>

	        <?php _e("Thank You for using WP Nice Loader! Please, rate us on","wp-nice-loader"); ?>
			<a href="https://wordpress.org/support/view/plugin-reviews/wp-nice-loader?rate=5#postform"><?php _e("WP-PLUGINS","wp-nice-loader"); ?>
				<?php for( $i=1; $i <=5; $i++) : ?>
					<span class="dashicons dashicons-star-filled"></span>
				<?php endfor; ?>
			</a>

	    <?php }

	}

}

/*********************************************
*   Add front body classes
**********************************************/
if ( !function_exists('vol4ikman_nice_loader_body_class') ) {

	add_filter('body_class','vol4ikman_nice_loader_body_class');
	function vol4ikman_nice_loader_body_class($classes) {
	    $classes[] = 'wp_nice_loader_body';
		return $classes;
	}

}

/*********************************************
*   Load WP Nice Loader TextDomain
**********************************************/
if( !function_exists('vol4ikman_nice_loader_load_plugin_textdomain') ) {

	function vol4ikman_nice_loader_load_plugin_textdomain() {
		$domain = 'wp-nice-loader';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
		if ( $loaded = load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
			return $loaded;
		} else {
			load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
		}
	}
	add_action( 'init', 'vol4ikman_nice_loader_load_plugin_textdomain' );

}

/***********************************************
* 	Front module
***********************************************/
if( !function_exists('vol4ikman_print_wp_nice_loader') ) {

	add_action('wp_footer','vol4ikman_print_wp_nice_loader');
	function vol4ikman_print_wp_nice_loader(){
		require('nice_loader_front.php');
	}

}
