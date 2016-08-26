// masonry init in projects search results grid view
var masonryInit = function() {
	if($(document).width() > 1199) {
		$('.grid-view').masonry({
		  columnWidth: 100,
		  itemSelector: '.grid-item',
		  transitionDuration: 0
		});
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

      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      autoHeight : true,
      singleItem:true,
	transitionStyle : "fade"

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
});

$(window).resize(function() {
	// masonry init in projects search results grid view
	masonryInit();
});

// $('.fotorama').on('fotorama:ready', function (e, fotorama, extra) {
// 	$('.fotorama_custom__arr--prev').on('click', function(){
// 		fotorama.show('<');
// 	});
// 	$('.fotorama_custom__arr--next').on('click', function(){
// 		fotorama.show('>');
// 	});
// });
