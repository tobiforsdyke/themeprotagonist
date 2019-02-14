<?php
/*
// @package themeprotagonist

// ===========================
// ADMIN ENQUEUE FUNCTIONS
// ===========================
*/

function protagonist_load_admin_scripts( $checkPage ) {

  if( 'toplevel_page_protagonist_adminpage' != $checkPage ){ return; }

  wp_register_style( 'protagonist_admin_styles', get_template_directory_uri() . '/css/protagonist.admin.css', array(), '1.0.3', 'all' );
  wp_enqueue_style( 'protagonist_admin_styles' );

  wp_enqueue_media();

  wp_register_script( 'protagonist_admin_script', get_template_directory_uri() . '/js/protagonist.admin.js', array('jquery'), '1.0.1', true );
  wp_enqueue_script( 'protagonist_admin_script' );
}
add_action( 'admin_enqueue_scripts', 'protagonist_load_admin_scripts' );
