$(document).ready(function() {
 
    $("#owl-demo").owlCarousel({
        
       
      navigation : true, // Show next and prev buttons
      responsiveClass : true,
      responsive:{
        0:{
            items:1,
            nav:true
        },},
      slideSpeed : 300,
      paginationSpeed : 400,
        
      loop : true,
      autoplay : false,
      items : 1, 
      itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false
    });

    $('.owl-carousel').owlCarousel({
        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true
    })
  });