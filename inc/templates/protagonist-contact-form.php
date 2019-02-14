<h1>Protagonist Contact Form</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post" class="protagonist-settings-form">
  <?php settings_fields( 'protagonist-contact-options' ); ?>
  <?php do_settings_sections( 'protagonist_contactform_page' ); ?>
  <?php submit_button(); ?>
</form>
