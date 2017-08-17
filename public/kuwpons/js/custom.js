// JavaScript Document
$(document).ready(function(){
  $('ul li').click(function(){
    $('li').removeClass("active");
    $(this).addClass("active");
});

    $('.header-right-toggle').click(function(){
        $('.header-right-tog-content').slideToggle(150);
    })     
     

});