<h1>Protagonist Theme Options</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
  <?php settings_fields( 'protagonist-settings-group' ); ?>
  <?php do_settings_sections( 'protagonist_adminpage' ); ?>
  <?php submit_button(); ?>
</form>
