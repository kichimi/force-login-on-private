<?php
/**
 * Plugin Name: Force Login on Private Post
 * Plugin URI: https://www.kichimi.uk
 * Description: Redirects logged out users to the login page when trying to directly access a page that is marked as private instead of serving a 404. 
 * Version: 0.1
 * Text Domain: force-login-on-private
 * Author: Lawrence Cook
 * Author URI: https://www.kichimi.uk
 */


function force_login_on_private_post(){
	$page = get_page_by_path($_SERVER['REQUEST_URI']);
	$status = get_post_status($page->ID);

	if(!is_user_logged_in() && $status == 'private'){
		wp_redirect(get_site_url().'/wp-login.php');
		exit;
	}
}
add_filter('template_redirect', 'force_login_on_private_post' );

?>