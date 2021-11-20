$(document).ready(function(){
$('.project-info').hide();  
  $('.project').hover( function () {
    $(this).find('.project-info').slideToggle(200);  
  });  	
});
