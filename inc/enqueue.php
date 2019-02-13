<?php
/*
// @package themeprotagonist

// ===========================
// ADMIN ENQUEUE FUNCTIONS
// ===========================
*/

function protagonist_load_admin_scripts( $checkPage ) {
  
  if( 'toplevel_page_protagonist_adminpage' != $checkPage ){ return; }

  wp_register_style( 'protagonist_admin_styles', get_template_directory_uri() . '/css/protagonist.admin.css', array(), '1.0.1', 'all' );
  wp_enqueue_style( 'protagonist_admin_styles' );
}
add_action( 'admin_enqueue_scripts', 'protagonist_load_admin_scripts' );
