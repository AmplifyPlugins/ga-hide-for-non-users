<?php
/*
Plugin Name: Google Authenticator Hide For Non-Users
Description: Hides the GA form field on login if user doesn't require 2FA
Author: Scott DeLuzio
Version: 1.0
Author URI: https://scottdeluzio.com/
*/
add_action( 'login_enqueue_scripts', 'ga_hide_for_non_users' );
function ga_hide_for_non_users(){
	wp_enqueue_script( 'ga_hide_non_users', plugin_dir_url( __FILE__ ) . 'ga-hide.js', array( 'jquery' ), '1.0' );
	wp_localize_script( 'ga_hide_non_users', 'ajax_object',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		)
	);
}

add_action( 'wp_ajax_nopriv_ga_hide_user_name', 'ga_hide_for_non_users_process_ajax' );
function ga_hide_for_non_users_process_ajax(){
	$user_enabled = '';
	if( isset( $_POST['user_name'] ) ){
		$user_name = $_POST['user_name'];
		if( is_email( $user_name ) ){
			$user = get_user_by( 'email', $user_name );
		} else {
			$user = get_user_by( 'login', $user_name );
		}
		$user_enabled = get_user_meta( $user->id, 'googleauthenticator_enabled', true );
	}
	echo $user_enabled;
	die();
}