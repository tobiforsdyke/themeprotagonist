<?php

// Template for the header
// @package themeprotagonist

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="container">
    <div class="row">
      <div class="col-12">

        <header class="header-container background-image text-center" style="background-image: url(<?php header_image(); ?>);">

          <div class="header-content table">
            <div class="table-cell">
              <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
              <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
          </div>

          <div class="nav-container">
            <nav class="navbar navbar-expand-md navbar-dark navbar-protagonist">
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container' => false,
                  'menu_class' => 'nav navbar-nav',
                  'link_class' => 'nav-link'
                ) );
              ?>
            </nav>
          </div>

        </header><!-- .header-container -->

      </div><!-- .col-12 -->
    </div><!-- .row -->
  </div><!-- .container-fluid -->
