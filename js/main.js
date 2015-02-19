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
      active: true,
      auto: true,
      interval: 4000,
      swap: true,
      pauseOnHover: true,
      restartDelay: 500
    }
  });
});


$(document).ready(function() {

  $('.fullscreen').click(function() {
    $('#dark').css('display', 'block');
    var html = $(this).parent().parent()
     .find('.url_video').addClass('zoom')
     .prepend("<span class='zoom_out'></span>");
  });
  
  $(document.body).on("click", '.zoom_out', function() {
    $('#dark').css('display', 'none');
    $(this).parent()
     .removeClass('zoom');
    $('.zoom_out').remove();
  });

  $('.header_search img').on("click", function() {

    var input = $(this).next('input');
    $(input).css('display', 'block');
    var left = $(input).css('left');
     $('header nav').fadeOut();
    if(left == '0px') {
      $(input).animate({
        width: '250px',
        left: '-250px'
      }, 500, function() {
        // Animation complete.

      });  
    } else {
      $( ".header_search" ).submit();
    }
  });

  $(document).click(function(event) {
    if ($(event.target).closest(".header_search").length) return;
    $('header nav').fadeIn();
    $('.header_search input').animate({
        width: '0',
        left: '0'
      }, 500, function() {
        $('.header_search input').css('display', 'none');
      });

    event.stopPropagation();
  });

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