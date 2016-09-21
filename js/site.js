jQuery(document).ready(function ($) {
	setTimeout(function() {
	 $('#preloader').fadeOut();
	}, 7000 );
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
    });
    $('#contact').waypoint(function(direction) {
    if (direction === 'down') {
      // reveal our content
      $('.section-footer').addClass('fadeIn');
      $('.section-footer').removeClass('fadeOut');
    } else if (direction === 'up') {
      // hide our content
      $('.section-footer').addClass('fadeOut');
      $('.section-footer').removeClass('fadeIn');
    }
 
  }, { offset: '100%' });

    var f1 = $( "#rcp_address_wrap" ).appendTo( "#form-2" );
    var f1 = $( "#rcp_street_wrap" ).appendTo( "#form-2" );
    var f1 = $( "#rcp_city_wrap" ).appendTo( "#form-2" );
    var f1 = $( "#rcp_zip_wrap" ).appendTo( "#form-2" );
    var f1 = $( "#rcp_house_number_wrap" ).appendTo( "#form-2" );
    $("#lightSlider").lightSlider({
        item: 1,
        autoWidth: true,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////
 
        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,
 
        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',
 
        rtl:false,
        adaptiveHeight:true,
 
        vertical:false,
        verticalHeight:500,
        //vThumbWidth:100,
 
        //thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,
 
        responsive : []
    });
});