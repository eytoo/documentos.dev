$(document).ready(function() {

  var owl = $("#owl-demo");
  owl.owlCarousel({
      items : 3, //3 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });

  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
  $(".play").click(function(){
    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function(){
    owl.trigger('owl.stop');
  });

  var owl1 = $(".owl-carousel1");

  owl1.owlCarousel({
      items : 3, //3 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });

    // Select all links with hashes
$('a.slow-scroll[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

});

$(function() {
  var headerHeight = 400;
  var SliderHeight = $("#example").height() - 60;

  $(document).on('scroll', function() {

    var documentScroll = $(document).scrollTop();



    if(documentScroll > SliderHeight) {
      $('.tiene-sombra').addClass('nav-sombra');
      //$('.block-1').css('paddingTop', $('nav').innerHeight());
    } else {
      $('.tiene-sombra').removeClass('nav-sombra');
      //$('.block-1').removeAttr('style');
    }
  });

  /* ACCIONES PARA BUSCADOR */
  var campo = $("input.buscadorBlanco");
  var icono = $(".icono-buscador");
  campo.focus(function(){
      icono.removeClass("blanco");
      icono.addClass("plomo");
  });
  campo.blur(function(){
      icono.removeClass("plomo");
      icono.addClass("blanco");
  });
});
