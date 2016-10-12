// masonry init in projects search results grid view
var masonryInit = function() {
	if($(document).width() > 1199 && $('.grid-view').length) {
		setTimeout(function() {
			$('.grid-view').masonry({
				columnWidth: 100,
				itemSelector: '.grid-item',
				transitionDuration: 0
			});
		}, 500);
	}
};

// set slider and image height
var sliderAutoHeight = function() {
	if($(".slider").length && $(document).width() > 1199) {
		$(".slider").attr("style", "height: "+$(window).height()+"px!important;");
		$(".slider img").attr("style", "height: "+$(window).height()+"px");
	} else if($(".slider").length && $(document).width() < 1199) {
		$(".slider").removeAttr("style");
		$(".slider img").removeAttr("style");
	}
};

// set info block height in grid view
var itemGridAutoHeight = function() {
	if($(".grid-view .info-block").length > 1 && $(document).width() > 1199) {

		var itemMaxHeight = 0;

		$(".grid-view .info-block").each(function(i) {
			if(itemMaxHeight < $(this).outerHeight()) {
				itemMaxHeight = $(this).outerHeight();
			}
		});

		if(itemMaxHeight > 0) {
			$(".grid-view .info-block").attr("style", "height: "+itemMaxHeight+"px;");
		}
	}
};

$(document).ready(function() {

  	$("#owl-example").owlCarousel();

  	var owl = $("#owl-demo");

	owl.owlCarousel({
		itemsCustom : [
			[0, 1],
			[600, 2],
			[950, 3]
		]
	});

  	var owl2 = $("#owl-demo2");

  	owl2.owlCarousel({
		loop: true,
		autoPlay: true,
		autoPlayTimeout: 2000,
	    autoPlayHoverPause: true,
		navigation: true,
		slideSpeed: 300,
		paginationSpeed: 400,
		autoHeight: true,
		singleItem: true,
		transitionStyle: "fade"
  	});

	var owl = $(".owl-carousel").data('owlCarousel');

  	$('.arrow-right').on('click', function(){
    	owl.next();
  	});

  	$('.arrow-left').on('click', function(){
    	owl.prev();
  	});

	$("#open-nav").click(function(e) {
      $('.menu').toggleClass('menu-mobile');
      $(this).toggleClass('active');
      return false;
      e.preventDefault();
  	});

	$('.search').on('click', function(e){

		if ($(this).hasClass('act-search'))
		{
			$('#search-form').submit();
			$(this).removeClass('act-search');
		}
		else
		{
			$('#search-form').css('display','block');
			$('#search-form input').focus();
			$('.menu ul').css('visibility','hidden');
			$(this).addClass('act-search');
		}
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true;
	});

	$('#search-form').on('click', function(e){
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true;
	});

	$(window).on('scroll', function(){
	    if ($(window).scrollTop() > 95)
		    {
		    	$('.menu').addClass('menu-fixed');
		    }else{
		    	$('.menu').removeClass('menu-fixed');
		    }
	}).scroll();

	$('.manager a').on('click', function(e){
		var $manager = $(this).closest('.manager');

		var photo = $manager.data('image');
		var text =  $manager.data('text');

		$('.popup').css('visibility','visible');
		$('.popup-manager>img').attr('src', photo);
		$('.popup-manager>div').text(text);
		e.preventDefault();

		e.stopPropagation?e.stopPropagation():e.cancelBubble = true;
	});

	$('.show-map').on('click', function(e){
		$('.popup').css('visibility','visible');
		e.preventDefault();
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true;
	})

	$('.popup-manager').on('click', function(e){
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true;
	});

	$('.popup-manager .close').on('click', function(e){
		$('.popup').css('visibility','hidden');
		e.preventDefault();
	});

	$('body').on('click', function(){
		$('#search-form').css('display','none');
		$('.search').removeClass('act-search');
		$('.menu ul').css('visibility','visible');
		$('.popup').css('visibility','hidden');
	});

	$('ul.tab-nav').on('click', 'li:not(.active)', function() {
		$(this)
		    .addClass('active').siblings().removeClass('active')
		    .closest('div.tab-info').find('div.tab-inner').removeClass('active').eq($(this).index()).addClass('active');
		e.preventDefault()
	});

	// masonry init in projects search results grid view
	masonryInit();

	// set slider height
	sliderAutoHeight();

	// fix for scroll to filter on home page
    if($(".filter").length && $(document).scrollTop() > $(window).height()+$(".filter").outerHeight()) {
    	$(".filter").addClass("scrolled");
    }

    // set item height in grid view
	itemGridAutoHeight();
});

$(window).resize(function() {
	// masonry init in projects search results grid view
	masonryInit();

	// set slider height
	sliderAutoHeight(); 
});

var isScrolling = false;

$(window).scroll(function() {

	if($(".slider").length && $(".filter").length && $(document).width() > 1199) {

		$(document).on('mousewheel DOMMouseScroll', function(e) {

			var delta = e.originalEvent.wheelDeltaY;

			// fix fir ff
            if (e.originalEvent.detail) {
                delta = (e.originalEvent.detail < 0 ? 1 : -1);
            }

	        if(!$(".filter").hasClass("scrolled") && delta < 0) {

	        	e.preventDefault();
		        e.stopPropagation();

		        if(isScrolling) {
		            return false;
		        }

		        isScrolling = true;

	        	$('html,body').animate({
	        		scrollTop: $(".filter").offset().top-($(window).height()-$(".filter").outerHeight())
	        	}, 500, function(){
		            isScrolling = false;
		            $(".filter").addClass("scrolled");
		        });
	        }
	    });

	    if($(document).scrollTop() === 0) {
	    	$(".filter").removeClass("scrolled");
	    }
	}
});

// $('.fotorama').on('fotorama:ready', function (e, fotorama, extra) {
// 	$('.fotorama_custom__arr--prev').on('click', function(){
// 		fotorama.show('<');
// 	});
// 	$('.fotorama_custom__arr--next').on('click', function(){
// 		fotorama.show('>');
// 	});
// });