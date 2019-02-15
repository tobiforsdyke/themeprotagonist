<?php

// @package themeprotagonist

// ===========================
// THEME CUSTOM POST TYPES
// ===========================

$contact = get_option( 'activate_contact' );
if( @$contact == 1 ) {

  add_action( 'init', 'protagonist_contact_custom_post_type' );
  add_filter( 'manage_protagonist-contact_posts_columns', 'protagonist_set_contact_columns' );
  add_action( 'manage_protagonist-contact_posts_custom_column', 'protagonist_contact_custom_column', 10, 2 );
  add_action( 'add_meta_boxes', 'protagonist_add_contact_meta_box' );
  add_action( 'save_post', 'protagonist_save_contact_email_data' );

}

// CONTACT CUSTOM POST TYPE
function protagonist_contact_custom_post_type() {
  $labels = array(
    'name' => 'Messages',
    'singular_name' => 'Message',
    'menu_name' => 'Messages',
    'name_admin_bar' => 'Message'
  );

  $args = array(
    'labels' => $labels,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 26,
    'menu_icon' => 'dashicons-email-alt',
    'supports' => array( 'title', 'editor', 'author' )
  );

  register_post_type( 'protagonist-contact', $args );
}

function protagonist_set_contact_columns( $columns ) {
  $newColumns = array();
  $newColumns['title'] = 'Full Name';
  $newColumns['message'] = 'Message';
  $newColumns['email'] = 'Email';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function protagonist_contact_custom_column( $column, $post_id ) {
  switch( $column ){
    case 'message' :
      echo get_the_excerpt();
      break;
    case 'email' :
      $email = get_post_meta( $post_id, '_contact_email_value_key', true );
      echo '<a href="mailto:'.$email.'">'.$email.'</a>';
      break;
  }
}

// CONTACT META BOXES
function protagonist_add_contact_meta_box() {
  add_meta_box( 'contact_email', 'Email Address', 'protagonist_contact_email_callback', 'protagonist-contact', 'side', 'high' );
}

function protagonist_contact_email_callback( $post ) {
  wp_nonce_field( 'protagonist_save_contact_email_data', 'protagonist_contact_email_meta_box_nonce' );
  $value = get_post_meta( $post->ID, '_contact_email_value_key', true );
  echo '<label for="protagonist_contact_email_field">Uer Email Address: </label>';
  echo '<input type="email" id="protagonist_contact_email_field" name="protagonist_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function protagonist_save_contact_email_data( $post_id ) {
  if( ! isset( $_POST['protagonist_contact_email_meta_box_nonce'] ) ){
    return;
  }
  if( ! wp_verify_nonce( $_POST['protagonist_contact_email_meta_box_nonce'], 'protagonist_save_contact_email_data' ) ){
    return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
    return;
  }
  if( ! current_user_can( 'edit_post', $post_id ) ){
    return;
  }
  if( ! isset( $_POST['protagonist_contact_email_field'] ) ){
    return;
  }
  $my_data = sanitize_text_field( $_POST['protagonist_contact_email_field'] );
  update_post_meta( $post_id, '_contact_email_value_key', $my_data );
}
