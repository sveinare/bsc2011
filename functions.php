<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

function register_my_menus() {
  register_nav_menus(
    array('header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


if ( function_exists('register_sidebar') ) {
    register_sidebar(array('name'=>'sidebar1'));
    register_sidebar(array('name'=>'sidebar2'));
}
?>
