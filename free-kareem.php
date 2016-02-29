<?php
/*
Plugin Name: Free Kareem
Plugin URI: http://semperfiwebdesign.com/plugins/free-kareem/
Description: Help support free speech.  Fight the inprisonment of jailed blogger! Visit the <a href="options-general.php?page=freekareemoptionspage">Settings Page</a> to control which elements of the widget to show.
Author: Michael Torbert
Version: .5.5
Author URI: http://semperfiwebdesign.com/
*/

/*
Copyright (C) 2008 semperfiwebdesign.com (michael AT semperfiwebdesign DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once(ABSPATH."wp-content/plugins/free-kareem/options.php");
require_once(ABSPATH."wp-content/plugins/free-kareem/database.php");
require_once(ABSPATH."wp-content/plugins/free-kareem/functions.php");
require_once(ABSPATH."wp-content/plugins/free-kareem/kareem_widget.php");
require_once(ABSPATH."wp-content/plugins/free-kareem/widget_conf.php");

add_action('admin_menu', 'mrt_kareem_add_pages');

setup_options();

global $img_path;
global $plugin_path;

if ( ! defined( 'WP_CONTENT_URL' ) )
define( 'WP_CONTENT_URL', get_option('url') . '/wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );

$img_path = WP_PLUGIN_URL . '/free-kareem/images/';
$plugin_path = WP_PLUGIN_URL . '/free-kareem/';

function mrt_kareem_add_pages(){
	add_options_page('Free Kareem Widget Management', 'Free Kareem', 8, 'freekareemoptionspage', 'mrt_kareem_options_page');
}



add_action("plugins_loaded", "mrt_kareem_widget_init");
register_activation_hook(__FILE__,'mrt_kareem_install');




//add_action('admin_menu', 'mrt_kareem_add_menu');

/*function mrt_add_menu() {
   add_menu_page('SMS Text Message', 'SMS Text Message', 8, __FILE__, 'mrt_sms_main_control');
   add_submenu_page(__FILE__, 'Options', 'Options', 8, 'Options', 'mrt_sms_options_page');
   add_submenu_page(__FILE__, 'Subscribers', 'Subscribers', 8, 'Subscribers', 'mrt_sms_subscribers_page');
   add_submenu_page(__FILE__, 'Support', 'Support', 8, 'Support', 'mrt_sms_support_page');
}*/

/*function mrt_sms_main_control() {
} */?>
