<?php
/* Plugin Name: Admin Theme for All Cats Are Awesome
   Plugin URI: http://www.slideshare.net/bethsoderberg
   Description: This plugin styles the admin panel.
   Author: Beth Soderberg, CHIEF
   Author URI: http://agencychief.com
   Version: 1.0*/

function my_admin_theme_style() {
	wp_enqueue_style('my-admin-theme', plugins_url('admin-styles.css', __FILE__));
	//wp_enqueue_script('custom-js', plugins_url('admin-scripts.js', (__FILE__) ) );

}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

?>