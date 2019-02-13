<h1>Protagonist Theme Options</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post" class="protagonist-settings-form">
  <?php settings_fields( 'protagonist-settings-group' ); ?>
  <?php do_settings_sections( 'protagonist_adminpage' ); ?>
  <?php submit_button(); ?>
</form>

<?php
  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  $fullName = $firstName . ' ' . $lastName;
  $description = esc_attr( get_option( 'user_description' ) );
  $twitter = esc_attr( get_option( 'twitter' ) );
  $facebook = esc_attr( get_option( 'facebook' ) );
  $instagram = esc_attr( get_option( 'instagram' ) );
?>

<div class="protagonist-sidebar-preview">
  <div class="protagonist-sidebar">
    <h1 class="protagonist-username"><?php print $fullName; ?></h1>
    <h2 class="protagonist-description"><?php print $description; ?></h2>
    <div class="social-icons-wrapper">

    </div>
  </div>
</div>