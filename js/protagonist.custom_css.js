jQuery(document).ready(function($){
  var updateCSS = function(){
    $("#protagonist_css").val( editor.getSession().getValue() );
  }
  $("#save-custom-css-form").submit( updateCSS );
});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
// editor.setTheme("ace/theme/pastel_on_dark");
editor.getSession().setMode("ace/mode/css");
