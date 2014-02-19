/* Toggles the Menu if it's hidden */
(function ($) {
$(document).ready(function() {

  $("#toggle-main-menu").click(function() {
    
    if ($("#main-menu").is(":hidden")) {
      $("#main-menu").show("slow");
    } else {
      $("#main-menu").slideUp();
    }
  });
  

});
}(jQuery));