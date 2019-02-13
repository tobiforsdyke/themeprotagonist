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
  // Activate custom settings
  add_action( 'admin_init', 'protagonist_custom_settings' );
}
add_action( 'admin_menu', 'protagonist_add_admin_page' );

function protagonist_custom_settings() {
  // Registers settings in the database
  register_setting( 'protagonist-settings-group', 'first_name' );
  add_settings_section( 'protagonist-sidebar-options', 'Sidebar Options', 'protagonist_sidebar_options', 'protagonist_adminpage' );
  add_settings_field( 'sidebar-name', 'First Name', 'protagonist_sidebar_name', 'protagonist_adminpage', 'protagonist-sidebar-options' );
}

function protagonist_sidebar_options() {
  echo 'Customise your sidebar information.';
}

function protagonist_sidebar_name() {
  $firstName = esc_attr( get_option( 'first_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}

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
