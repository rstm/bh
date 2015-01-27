$(function() {
  $('#slides').slidesjs({
    width: 976,
    height: 384,
    navigation: false,
    pagination: {
      active: true,
      effect: "slide"
    },
    play: {
      active: false
    }
  });
});


$(document).ready(function() {
  
  $('.more').click(function() {
      $('.loading').css('display','block');
      offset = $('.more').offset().top;
      //alert(offset);
      var last_id = $(this).prev('.news').attr('id');
      $(".more").before($("<div>").css('display','none').load("/app/controllers/news.php?last_id=" + last_id,
          function(response, status, xhr) {
            $('.loading').css('display','none');
            if(xhr.status != 204) {
              $(this).fadeIn();
              $('html, body').animate({
                          scrollTop: offset
                      }, 1000);
            }
          }
        )); 
  });

  $(function() {
    $('nav a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 10
          }, 1000);
          return false;
        }
      }
    });
  });

});