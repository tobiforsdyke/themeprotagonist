<?php
/*
// @package themeprotagonist

// ===========================
// ADMIN ENQUEUE FUNCTIONS
// ===========================
*/

function protagonist_load_admin_scripts( $checkPage ) {
  // echo $checkPage;
  if( 'toplevel_page_protagonist_adminpage' == $checkPage ){

    wp_register_style( 'protagonist_admin_styles', get_template_directory_uri() . '/css/protagonist.admin.css', array(), '1.0.3', 'all' );
    wp_enqueue_style( 'protagonist_admin_styles' );

    wp_enqueue_media();

    wp_register_script( 'protagonist_admin_script', get_template_directory_uri() . '/js/protagonist.admin.js', array('jquery'), '1.0.1', true );
    wp_enqueue_script( 'protagonist_admin_script' );

  } else if ( 'protagonist_page_protagonist_adminpage_css' == $checkPage ){

    wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/protagonist.ace.css', array(), '1.0.1', 'all' );
    wp_enqueue_script( 'protagonist-ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.4.2', true );
    wp_enqueue_script( 'protagonist-custom-css-script', get_template_directory_uri() . '/js/protagonist.custom_css.js', array('jquery'), '1.0.0', true );

  } else { return; }
}
add_action( 'admin_enqueue_scripts', 'protagonist_load_admin_scripts' );

// ===========================
// FRONT-END ENQUEUES
// ===========================

function protagonist_load_scripts(){
  // CSS
  wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all' );
  wp_enqueue_style( 'protagonistcss', get_template_directory_uri() . '/css/protagonist.css', array(), '1.0.3', 'all' );
  wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Coiny|Open+Sans' );
  // JS
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', get_template_directory_uri() . 'js/jquery.js', false, '3.3.1', true );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.3.1', true );
  // FONTAWESOME
  wp_enqueue_style( 'fontawesomecss', get_template_directory_uri() . '/inc/fontawesome/css/all.min.css' );
  wp_enqueue_script( 'fontawesomejs', get_template_directory_uri() . '/inc/fontawesome/js/all.min.js' );
}
add_action( 'wp_enqueue_scripts', 'protagonist_load_scripts' );
