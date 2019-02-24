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

add_theme_support( 'post-thumbnails' );

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

// ===========================
// BLOG LOOP CUSTOM FUNCTION
// ===========================

function protagonist_posted_meta() {
  $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
  $categories = get_the_category();
  $separator = ', ';
  $output = '';
  $i = 1;
  if( !empty($categories) ):
    foreach( $categories as $category ):
      if( $i>1 ): $output .= $separator; endif;
      $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in%s', $category->name ) . '">' . esc_html( $category->name ) . '</a>';
      $i++;
    endforeach;
  endif;
  return '<span class="posted-on">Posted <a href="' . esc_url( get_permalink() ) . '">' . $posted_on . '</a> ago</span> in <span class="posted-in">' . $output . '</span>';
}

function protagonist_posted_footer() {
  $comments_number = get_comments_number();
  if( comments_open() ){
    if( $comments_number == 0 ){
      $comments = __('No Comments');
    } elseif ( $comments_number > 1 ){
      $comments = $comments_number . __(' Comments');
    } else {
      $comments = __('1 Comment');
    }
    $comments = '<a href="' . get_comments_link() . '">' . $comments . '</a> <i class="fas fa-comment"></i>';
  } else {
    $comments = __('Comments are closed <i class="fas fa-comment-slash"></i>');
  }
  return '<div class="post-footer-container"><div class="row"><div class="col-sm-6 mr-auto text-left">' . get_the_tag_list( '<div class="tags-list"><i class="fas fa-tag"></i>', ' ', '</div>' ) . '</div><div class="col-sm-6 ml-auto text-right">' . $comments . '</div></div></div>';
}
