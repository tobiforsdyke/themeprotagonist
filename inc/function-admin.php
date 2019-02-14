<?php

// @package themeprotagonist

// ===========================
// ADMIN PAGE
// ===========================

function protagonist_add_admin_page() {
  // Generate the Protagonist Admin Page
  add_menu_page( 'Protagonist Options', 'Protagonist', 'manage_options', 'protagonist_adminpage', 'protagonist_theme_create_page', get_template_directory_uri() . '/img/protagonist-icon.png', 76 );
  // Generate the admin sub pages
  add_submenu_page( 'protagonist_adminpage', 'Protagonist Sidebar Options', 'Sidebar', 'manage_options', 'protagonist_adminpage', 'protagonist_theme_create_page' );
  add_submenu_page( 'protagonist_adminpage', 'Protagonist Colour Themes', 'Colour Themes', 'manage_options', 'protagonist_adminpage_colourthemes', 'protagonist_theme_colour_settings_page' );
  add_submenu_page( 'protagonist_adminpage', 'Protagonist Theme Options', 'Theme Options', 'manage_options', 'protagonist_adminpage_options', 'protagonist_theme_support_page' );
  add_submenu_page( 'protagonist_adminpage', 'Protagonist CSS Options', 'Custom CSS', 'manage_options', 'protagonist_adminpage_css', 'protagonist_theme_css_settings_page' );
  // Activate custom settings
  add_action( 'admin_init', 'protagonist_custom_settings' );
}
add_action( 'admin_menu', 'protagonist_add_admin_page' );

function protagonist_custom_settings() {
  // **Registers settings in the database**
  // Sidebar Options
  register_setting( 'protagonist-settings-group', 'profile_pic' );
  register_setting( 'protagonist-settings-group', 'first_name' );
  register_setting( 'protagonist-settings-group', 'last_name' );
  register_setting( 'protagonist-settings-group', 'user_description' );
  register_setting( 'protagonist-settings-group', 'twitter', 'protagonist_clean_twitter' );
  register_setting( 'protagonist-settings-group', 'facebook' );
  register_setting( 'protagonist-settings-group', 'instagram' );
  // Creates the form section
  add_settings_section( 'protagonist-sidebar-options', 'Sidebar Options', 'protagonist_sidebar_options', 'protagonist_adminpage' );
  // Creates the fields (rows)
  add_settings_field( 'sidebar-profile-pic', 'Profile Picture', 'protagonist_sidebar_profile', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  add_settings_field( 'sidebar-name', 'Name', 'protagonist_sidebar_name', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  add_settings_field( 'sidebar-description', 'Description', 'protagonist_sidebar_description', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  add_settings_field( 'sidebar-twitter', 'Twitter', 'protagonist_sidebar_twitter', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  add_settings_field( 'sidebar-facebook', 'Facebook', 'protagonist_sidebar_facebook', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  add_settings_field( 'sidebar-instagram', 'Instagram', 'protagonist_sidebar_instagram', 'protagonist_adminpage', 'protagonist-sidebar-options' );
  // add_settings_field( 'sidebar-socials', 'Social Media', 'protagonist_sidebar_socials', 'protagonist_adminpage', 'protagonist-sidebar-options' );

  // Theme Support Options
  register_setting( 'protagonist-theme-support', 'post_formats' );
  register_setting( 'protagonist-theme-support', 'custom_header' );
  register_setting( 'protagonist-theme-support', 'custom_background' );
  // Theme support form section
  add_settings_section( 'protagonist-theme-support-options', 'Theme Options', 'protagonist_theme_options', 'protagonist_theme_support_page' );
  // Create the fields (rows)
  add_settings_field( 'post-formats', 'Post Formats', 'protagonist_post_formats', 'protagonist_theme_support_page', 'protagonist-theme-support-options' );
  add_settings_field( 'custom-header', 'Custom Header', 'protagonist_custom_header', 'protagonist_theme_support_page', 'protagonist-theme-support-options' );
  add_settings_field( 'custom-background', 'Custom Background', 'protagonist_custom_background', 'protagonist_theme_support_page', 'protagonist-theme-support-options' );
}

// Sidebar Options Functions
function protagonist_sidebar_options() {
  echo 'Customise your sidebar information.';
}
// Calling the form fields
function protagonist_sidebar_profile() {
  $profilePic = esc_attr( get_option( 'profile_pic' ) );
  if( empty($profilePic) ){
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-pic" name="profile_pic" value="" /><p class="description">Upload an image to use as your profile picture.</p>';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-pic" name="profile_pic" value="'.$profilePic.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture"><p class="description">Upload an image to use as your profile picture.</p>';
  }
}
function protagonist_sidebar_name() {
  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function protagonist_sidebar_description() {
  $description = esc_attr( get_option( 'user_description' ) );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something about yourself.</p>';
}
function protagonist_sidebar_twitter() {
  $twitter = esc_attr( get_option( 'twitter' ) );
  echo '<input type="text" name="twitter" value="'.$twitter.'" placeholder="Twitter" /><p class="description">Enter just your Twitter name without the @ symbol or URL.</p>';
}
function protagonist_sidebar_facebook() {
  $facebook = esc_attr( get_option( 'facebook' ) );
  echo '<input type="text" name="facebook" value="'.$facebook.'" placeholder="Facebook" /><p class="description">Enter the entier URL of your Facebook profile.</p>';
}
function protagonist_sidebar_instagram() {
  $instagram = esc_attr( get_option( 'instagram' ) );
  echo '<input type="text" name="instagram" value="'.$instagram.'" placeholder="Instagram" /><p class="description">Enter just your Instagram name.</p>';
}

// Calling all the social media fileds in one function instead
// function protagonist_sidebar_socials() {
//   $twitterName = esc_attr( get_option( 'twitter' ) );
//   $facebookName = esc_attr( get_option( 'facebook' ) );
//   $instagramName = esc_attr( get_option( 'instagram' ) );
//   echo '<input type="text" name="twitter" value="'.$twitterName.'" placeholder="Twitter" /><br /><input type="text" name="facebook" value="'.$facebookName.'" placeholder="Facebook" /><br /><input type="text" name="instagram" value="'.$instagramName.'" placeholder="Instagram" />';
// }

// Function to sanitise (clean out) the @ symbol from twitter handle
function protagonist_clean_twitter( $input ) {
  $output = sanitize_text_field( $input );
  $output = str_replace( '@', '', $output );
  return $output;
}

function protagonist_theme_options() {
  echo 'Activate theme supports';
}
function protagonist_post_formats() {
  $options = ( get_option( 'post_formats' ) );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ){
    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'> '.$format.'</label><br>';
  }
  echo $output;
}

function protagonist_custom_header() {
  $options = get_option( 'custom_header' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'> Activate the Custom Header</label>';
}
function protagonist_custom_background() {
  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'> Activate the Custom Background</label>';
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

function protagonist_theme_support_page() {
  // Generation of Theme Support settings page
  require_once( get_template_directory() . '/inc/templates/protagonist-theme-support.php' );
}
