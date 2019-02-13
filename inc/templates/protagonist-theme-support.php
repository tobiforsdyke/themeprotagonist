<h1>Protagonist Theme Support</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post" class="protagonist-settings-form">
  <?php settings_fields( 'protagonist-theme-support' ); ?>
  <?php do_settings_sections( 'protagonist_theme_support_page' ); ?>
  <?php submit_button(); ?>
</form>
