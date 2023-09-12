jQuery(document).ready(function($) {

var $win        = $(window)
$win.on('load', function(){
  val = $( 'input[name="smart-custom-fields[page_layout][0]"]:checked' ).val();
  if(val == 'two-column'){
    $('.wp-block').css('max-width', '676px');
  } else {
    $('.wp-block').css('max-width', '960px');
  }
});

$( 'input[name="smart-custom-fields[page_layout][0]"]' ).change( function() {
  var radioval = $(this).val();
  console.log(radioval);
  if(radioval == 'two-column'){
    $('.wp-block').css('max-width', '676px');
  } else {
    $('.wp-block').css('max-width', '960px');
  }
});


}); /* end of as page load scripts */