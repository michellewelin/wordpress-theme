jQuery(document).ready(function($){
	
	$( "#portfolio" ).insertAfter( ".post-47" );
	
	$( window ).scroll(function() {
		if ($(window).scrollTop() > $(".post-47").offset().top -75) {

			$( ".header, .primary-nav" ).fadeIn();
		}else{
			$( ".header, .primary-nav" ).fadeOut();	
		}
		
	});

	$('.click-menu').click(function(){ //Klickfunktion för att visa menyn
		
		if (!$('.primary-nav').hasClass('nav-visible')){
			$('.primary-nav, .click-menu').addClass('nav-visible');
			
		}
		
		/*
		else{
			$('.primary-nav').removeClass('nav-visible');
		} 
		*/
	});
	
	var respnav = $('.primary-nav');
    $(document).mouseup(function (e) {
        if (!respnav.is(e.target) && respnav.has(e.target).length === 0 && respnav.hasClass('nav-visible')) {
            $('.primary-nav, .click-menu').removeClass('nav-visible');
        }
    });
	
	
	$('.navlink1').click(function(){ //Scrollfunktion för menyn
		$('html, body').animate({
	        scrollTop: $(".page-id-13 .posts").offset().top - 40
	    }, 1000);
	
	});
	
	$('.navlink2').click(function(){
		$('html, body').animate({
	        scrollTop: $("#portfolio").offset().top - 40
	    }, 1000);
	});
	
	$('.navlink3').click(function(){
		$('html, body').animate({
	        scrollTop: $(".post-47").offset().top - 40
	    }, 1000);    
	});
	
	$('.navlink4').click(function(){
		$('html, body').animate({
	        scrollTop: $(".post-192").offset().top - 40
	    }, 1000);    
	});
	
	$('.navlink5').click(function(){
		$('html, body').animate({
	        scrollTop: $(".post-26").offset().top - 40
	    }, 1000);    
	});
	
	$('.fa-arrow-down').click(function(){ //click-fuktion for bounce arrow
		$('html, body').animate({
	        scrollTop: $(".post-47").offset().top - 40
	    }, 1000);
	
	});
	
	
	$('.primary-nav li, .close-nav').click(function(){
		$('.primary-nav, .click-menu').removeClass('nav-visible');
		
	});
	
	
	$('.to-top').click(function(){ //klickfunktion för to top knapp
		$('html, body').animate({
	        scrollTop: $(".post-47").offset().top - 100}, 1000); 
	});
	
	$('.to-top').css('bottom', '-100px');  
	
	$(window).scroll(function() { //Funktion så scroll to top knappen poppar upp när man scrollar work
	    if ($(window).scrollTop() > $(".post-47").offset().top) {
	       
	       $('.to-top').css('bottom', '0');
	
	    }
	    else {
	 		$('.to-top').css('bottom', '-100px');
	    }
	});
	
	
	$('.item').click(function(){ //Klickfunktion för portfolio popup
		$('.pop-up, .overlay').fadeIn();
	
		$( this ).clone().appendTo( ".pop-up-inner" );
	});
	
	$('.overlay, .close-popup').click(function(){ //Klickfunktion för stänga ner portfolio popup
		$('.overlay, .pop-up').fadeOut();
		$( ".pop-up-inner" ).html('');
	});
	
	function setSize(){ //
		$('.show-title').css('width', $('.img img').outerWidth()+'px');
		$('.pic-hover').css('width', $('.img img').outerWidth()+'px');
		$('.pic-hover').css('height', $('.img img').outerHeight()+'px');
		$('.show-title').css('height', $('.img img').outerHeight()+'px');
	}
	
	$(window).resize(function(){
	
		setSize();
	
	});
	
	setSize();

	
	
	
	$( ".show-title" ).each(function(i){
		$(this).html($('.project-title:eq('+i+')').html());
	});
		
	
		
	//function for hero image
	function fullscreen(){
        jQuery('.header-img').css({
            width: jQuery(window).width(),
            height: jQuery(window).height()
        });
    }
  
    fullscreen();

	// Run the function in case of window resize
 	 jQuery(window).resize(function() {
       fullscreen();         
    });

});