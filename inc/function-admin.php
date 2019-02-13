<?php

// @package themeprotagonist

// ===========================
// ADMIN PAGE
// ===========================

function protagonist_add_admin_page() {
  // Generate the Protagonist Admin Page
  add_menu_page( 'Protagonist Options', 'Protagonist', 'manage_options', 'protagonist_adminpage', 'protagonist_theme_create_page', get_template_directory_uri() . '/img/protagonist-icon.png', 76 );
  // Generate the admin sub pages
  add_submenu_page( 'protagonist_adminpage', 'Protagonist Options', 'General', 'manage_options', 'protagonist_adminpage', 'protagonist_theme_create_page' );
  add_submenu_page( 'protagonist_adminpage', 'Protagonist Colour Themes', 'Colour Themes', 'manage_options', 'protagonist_adminpage_colourthemes', 'protagonist_theme_colour_settings_page' );
  add_submenu_page( 'protagonist_adminpage', 'Protagonist CSS Options', 'Custom CSS', 'manage_options', 'protagonist_adminpage_css', 'protagonist_theme_css_settings_page' );
}
add_action( 'admin_menu', 'protagonist_add_admin_page' );

function protagonist_theme_create_page() {
  // Generation of the admin oage
  require_once( get_template_directory() . '/inc/templates/protagonist-admin.php' );
}

function protagonist_theme_colour_settings_page() {
  // Generation of colour themes admin page
  require_once( get_template_directory() . '/inc/templates/protagonist-colour-themes.php' );
}

function protagonist_theme_css_settings_page() {
  // Generation of CSS settings page
  require_once( get_template_directory() . '/inc/templates/protagonist-custom-css.php' );
}
