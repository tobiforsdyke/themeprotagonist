<?php

// @package themeprotagonist

// ===========================
// THEME SUPPORT OPTIONS
// ===========================

$options = ( get_option( 'post_formats' ) );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
  $output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
  add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ) {
  add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( @$background == 1 ) {
  add_theme_support( 'custom-background' );
}

// Activate Nav Menu Option
function protagonist_register_nav_menu() {
  register_nav_menu( 'primary', 'Header Navigation Menu' );
}
add_action( 'after_setup_theme', 'protagonist_register_nav_menu' );

// Add link class to nav (to fix the nav-link bootstrap 4 issue)
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
