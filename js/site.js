jQuery(document).ready(function ($) {
	//setTimeout(function() {
	//   $('#preloader').fadeOut();
	//}, 7000 );
    $('.extend-more').hide();
    $('.extend-less').click(function(){
      $('.promo-message').hide();
      $('.extend-less').hide();
      $('.extend-more').show();
    });

    $('.extend-more').click(function(){
      $('.promo-message').show();
      $('.extend-more').hide();
      $('.extend-less').show();
    });

    $('.space').hover(function () {
      $('.space .headline').hide();
      $('.space .description').show();
    },
      function () {
      $('.space .headline').show();
      $('.space .description').hide();
    });  

    $('.navbar .dropdown').hover(function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105);
    });
    $(".chilly-logo-hero").waypoint(function(direction) {
       if (direction === 'down') {
         $('.poster').addClass('blurred');
       }
       else {
         $('.poster').removeClass('blurred');
       }
    });
	$("#features").waypoint(function(direction) {
       if (direction === 'down') {
         $('.navbar').addClass('bg-inverse-custom');
       }
       else {
         $('.navbar').removeClass('bg-inverse-custom');
       }
    }, { offset: '90%' });
    // $('.section-footer').waypoint(function(direction) {
    // if (direction === 'down') {
    //   // reveal our content
    //   $('.section-footer').addClass('fadeIn');
    //   $('.section-footer').removeClass('fadeOut');
    // } else if (direction === 'up') {
    //   // hide our content
    //   $('.section-footer').addClass('fadeOut');
    //   $('.section-footer').removeClass('fadeIn');
    // }
 
    // }, { offset: '100%' });


    //Fixing contact form
    $('.contact-form br').remove();
    $('.wpcf7-text').addClass('form-control form-control-lg');
    $('.wpcf7-textarea').addClass('form-control form-control-lg');
    $('.wpcf7-submit').addClass('btn btn-edgy invert btn-block');
    
    //Rearranging registration form fields
    
    //$('#rcp_registration_form input[type="text"]').addClass('form-control form-control-lg');
    //$('#rcp_registration_form input[type="password"]').addClass('form-control form-control-lg');

    //$('#rcp_profile_editor_form input[type="text"]').addClass('form-control form-control-lg');
    //$('#rcp_profile_editor_form input[type="password"]').addClass('form-control form-control-lg');

    //$('#rcp_house_number_wrap').insertAfter( $('#rcp_profile_street_wrap') );
    //$('#rcp_submit').addClass('btn btn-edgy invert');

    $(function() {
      $('a[href*="#"]:not([href="#collapsingNavbar"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top - 150
            }, 1000);
            return false;
          }
        }
      });
    });
});