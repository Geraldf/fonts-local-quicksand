<?php
/*
Plugin Name: Fonts lokal einbinden
Plugin URI: https://www.webtimiser.de/webfonts-lokal-in-wordpress/
Description: Fonts lokal in WordPress nutzen und Verbindung zu Google Fonts deaktivieren
Author: Sonia Rieder
Author URI: https://www.webtimiser.de
Version: 1.0
*/

/* Verbiete den direkten Zugriff auf die Plugin-Datei */
if ( ! defined( 'ABSPATH' ) ) exit;
/* Nach dieser Zeile den Code einfügen*/

/* CSS-Datei einbinden */
function add_fonts() {
		 wp_register_style('local-fonts', plugin_dir_url( __FILE__ ) . 'css/local-fonts-style.css');
		 wp_enqueue_style('local-fonts');

}
add_action('wp_enqueue_scripts', 'add_fonts',1);

/* Eingebundene Google Fonts deaktivieren */
function removeGoogleFonts(){
		global $wp_styles;
			$regex = '/fonts\.googleapis\.com\/css\?family/i';
			foreach($wp_styles->registered as $registered) {

				if( preg_match($regex, $registered->src) ) {
					wp_dequeue_style($registered->handle);
				}
			}
		}
add_action('wp_enqueue_scripts', 'removeGoogleFonts', 999);	

/* Nach dieser Zeile KEINEN Code mehr einfügen*/
?>