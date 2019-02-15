<h1>Protagonist Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" action="options.php" method="post" class="protagonist-settings-form">
  <?php settings_fields( 'protagonist-custom-css-options' ); ?>
  <?php do_settings_sections( 'protagonist_theme_css_settings_page' ); ?>
  <?php submit_button(); ?>
</form>
