<?php

// @package themeprotagonist

// ===========================
// REMOVE GENERATOR/WORDPRESS VERSION NUMBER
// ===========================

// Remove version string from js and css file names
function protagonist_remove_wp_version_string( $src ) {
  global $wp_version;
  parse_str( parse_url($src, PHP_URL_QUERY), $query );
  if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ){
    $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}

add_filter( 'script_loader_src', 'protagonist_remove_wp_version_string' );
add_filter( 'style_loader_src', 'protagonist_remove_wp_version_string' );

// Remove meta tag 'generator' from the header
function protagonist_remove_meta_version() {
  return '';
}
add_filter( 'the_generator', 'protagonist_remove_meta_version' );
