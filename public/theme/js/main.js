$(document).ready(function(){

  window.onload = initPage;
    function initPage(){
      setTimeout(function(){
        $('.pageloader').fadeOut('fast');
      },1500);
  }
  // 
  // $(window).scroll(function()
  // {
  //     if($(this).scrollTop() > 42)
  //         $('nav').addClass('flutuar');
  //     else
  //         $('nav').removeClass('flutuar');
  // });

  $('#menu-toggle').click(function(){
    $('nav ul').slideToggle('fast');
    $(this).toggleClass('toggle');
  });

});
