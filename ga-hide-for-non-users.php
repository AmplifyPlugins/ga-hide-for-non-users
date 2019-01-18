<?php
/*
Plugin Name: Google Authenticator Hide For Non-Users
Plugin URI: https://amplifyplugins.com
Description: Hides the Google Authenticator form field on login if user doesn't require 2FA
Author: Scott DeLuzio
Version: 1.0.1
Author URI: https://scottdeluzio.com/
*/

/* Adds the JS required to hide the GA field to the login page only.
 * Avoids adding JS unnecessarily to other pages.
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

/* Function to process the AJAX request when the user enters the
 * username/email on the login form.
 */
add_action( 'wp_ajax_nopriv_ga_hide_user_name', 'ga_hide_for_non_users_process_ajax' );
function ga_hide_for_non_users_process_ajax(){
	// By default an empty string will be returned.
	$user_enabled = '';
	if( isset( $_POST['user_name'] ) ){
		// Sanitize the user's input
		$user_name = sanitize_text_field( $_POST['user_name'] );
		if( is_email( $user_name ) ){
			// If the user entered their email address, strip out characters that are not allowed in an email
			$user = get_user_by( 'email', sanitize_email( $user_name ) );
		} else {
			$user = get_user_by( 'login', $user_name );
		}
		// If the user has Google Authenticator enabled this will return 'enabled' otherwise an empty string.
		$user_enabled = get_user_meta( $user->id, 'googleauthenticator_enabled', true );
	}
	echo $user_enabled;
	die();
}