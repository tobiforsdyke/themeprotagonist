jQuery(document).ready(function($){

// Call Media Uploader
  var mediaUploader;

// Function for the upload button to upload a profile picture
  $('#upload-button').on('click',function(e) {
    e.preventDefault();
    if( mediaUploader ){
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose or Upload a Profile Picture',
      button: {
        text: 'Choose Picture'
      },
      multiple: false
    });

    mediaUploader.on('select',function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-pic').val(attachment.url);
      $('#profile-pic-preview').css('background-image','url('+attachment.url+')');
    });

    mediaUploader.open();

  });

// Function for the confirmation of the removal of the profile picture
  $( '#remove-picture' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture?");
    if( answer == true ){
      $('#profile-pic').val('');
      $('.protagonist-settings-form').submit();
    }
    return;
  });

});
