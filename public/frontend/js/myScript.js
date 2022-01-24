   
function myFunction2() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "اقرأ المزيد"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "اقرأ أقل"; 
    moreText.style.display = "inline";
  }
}
//
   
function myFunction() {
  var dots = document.getElementById("dots2");
  var moreText = document.getElementById("more2");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "اقرأ المزيد"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "اقرأ أقل"; 
    moreText.style.display = "inline";
  }
}

//
   
function myFunction3() {
  var dots = document.getElementById("dots3");
  var moreText = document.getElementById("more3");
  var btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "اقرأ المزيد"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "اقرأ أقل"; 
    moreText.style.display = "inline";
  }
}



//
$(document).ready(function(){
    
$('.project-info').hide();  
  $('.project').hover( function () {
    $(this).find('.project-info').slideToggle(200);  
  });
    
    
    
     $(".company-department").click(function(){
     $(".company-department .department-ul").hide();
    $(this).find(".department-ul").toggle();
//    $(this).find($(".fas")).toggleClass('fa-angle-down fa-angle-up');
    $(this).click(function(){
        $(this).find(".department-ul").toggle();
    })
  });
  
  
   $(document).scroll(function() { 
            scroll_pos = $(this).scrollTop();
            if(scroll_pos > 100) {
                $(".fixedbar").addClass('social-media-bar-fixed');
                } else {
               $(".fixedbar").removeClass('social-media-bar-fixed');
                }
    });    
});
