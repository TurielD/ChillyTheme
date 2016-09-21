(function ($) {
  "use strict";

  // Bootstrap JS
  // @codekit-prepend "bootstrap/util.js";
  // @codekit-prepend "bootstrap/carousel.js";
  // @codekit-prepend "bootstrap/collapse.js";
  // @codekit-prepend "bootstrap/dropdown.js";
  // @codekit-prepend "bootstrap/modal.js";

  // Waypoints
  // @codekit-prepend "plugins/jquery.waypoints.js"

  // Placeholders
  // @codekit-prepend "plugins/jquery.placeholder.js";

  // Video JS
  // @codekit-prepend "plugins/video.js";

  // Vimeo modal autoplay
  // @codekit-prepend "plugins/jquery.vimeo.api.js";

  // Donut Chart
  // @codekit-prepend "plugins/chart.js";

  function onScrollAnimations() {
    $('.wp-1').waypoint(function() {
      $('.wp-1').addClass('animated fadeInUp');
    }, {
      offset: '75%'
    });
    $(".wp-2").waypoint(function(direction) {
       if (direction === 'down') {
          $('.wp-2').addClass('animated fadeInUp');
       }
       else {
          $('.wp-2').removeClass('animated fadeInUp');
       }
    }, {
      offset: '75%'
    });
    
    $('.wp-3').waypoint(function() {
      $('.wp-3').addClass('animated fadeInUp');
    }, {
      offset: '75%'
    });
    $('.wp-4').waypoint(function() {
      $('.wp-4').addClass('animated fadeIn');
    }, {
      offset: '75%'
    });
    $('.wp-5').waypoint(function() {
      $('.wp-5').addClass('animated fadeInRight');
    }, {
      offset: '50%'
    });
    $('.wp-6').waypoint(function() {
      $('.wp-6').addClass('animated fadeInLeft');
    }, {
      offset: '50%'
    });
    $('.wp-7').waypoint(function() {
      $('.wp-7').addClass('animated fadeInUp');
    }, {
      offset: '60%'
    });
    $('.wp-8').waypoint(function() {
      $('.wp-8').addClass('animated fadeInUp');
    }, {
      offset: '60%'
    });
  }

  function inputPlaceholders() {
    $('input, textarea').placeholder();
  }

  function navMobileCollapse() {
    // avoid having both mobile navs opened at the same time
    $('#collapsingMobileUser').on('show.bs.collapse', function () {
      $('#collapsingNavbar').removeClass('in');
      $('[data-target="#collapsingNavbar"]').attr('aria-expanded', 'false');
    });
    $('#collapsingNavbar').on('show.bs.collapse', function () {
      $('#collapsingMobileUser').removeClass('in');
      $('[data-target="#collapsingMobileUser"]').attr('aria-expanded', 'false');
    });
    // dark navbar
    $('#collapsingMobileUserInverse').on('show.bs.collapse', function () {
      $('#collapsingNavbarInverse').removeClass('in');
      $('[data-target="#collapsingNavbarInverse"]').attr('aria-expanded', 'false');
    });
    $('#collapsingNavbarInverse').on('show.bs.collapse', function () {
      $('#collapsingMobileUserInverse').removeClass('in');
      $('[data-target="#collapsingMobileUserInverse"]').attr('aria-expanded', 'false');
    });
  }

  function scrollToTop() {
    $('.scroll-top').on( 'click', function(){
      $('html, body').animate({
        scrollTop: 0
      }, 1000);
      return false;
    });
  }

  function init() {
    onScrollAnimations();
    inputPlaceholders();
    navMobileCollapse();
    scrollToTop();
  }

  init();

})(jQuery);
