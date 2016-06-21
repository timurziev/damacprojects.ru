$(document).ready(function(){

	$('.search').on('click', function(e){
		
		if ($(this).hasClass('act-search'))
		{
			$('#search-form').submit();
			$(this).removeClass('act-search');
		}
		else
		{
			$('#search-form').css('display','block')
			$('#search-form input').focus()
			$('.menu ul').css('visibility','hidden')
			$(this).addClass('act-search')
		} 
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true
	})

	$('#search-form').on('click', function(e){
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true
	})

	$(window).on('scroll', function(){
	    if ($(window).scrollTop() > 95)
		    {
		    	$('.menu').addClass('menu-fixed');
		    }else{
		    	$('.menu').removeClass('menu-fixed');
		    }
	}).scroll()

	

	$('.manager a').on('click', function(e){
		var $manager = $(this).closest('.manager');

		var photo = $manager.data('image')
		var text =  $manager.data('text')

		$('.popup').css('visibility','visible')
		$('.popup-manager>img').attr('src', photo)
		$('.popup-manager>div').text(text)
		e.preventDefault()

		e.stopPropagation?e.stopPropagation():e.cancelBubble = true
	})

	$('.show-map').on('click', function(e){
		$('.popup').css('visibility','visible')
		e.preventDefault()
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true
	})

	$('.popup-manager').on('click', function(e){
		e.stopPropagation?e.stopPropagation():e.cancelBubble = true
	})

	$('.popup-manager .close').on('click', function(e){
		$('.popup').css('visibility','hidden')
		e.preventDefault()
	}) 

	$('body').on('click', function(){
		$('#search-form').css('display','none')
		$('.search').removeClass('act-search')
		$('.menu ul').css('visibility','visible')
		$('.popup').css('visibility','hidden')
	})


	$('ul.tab-nav').on('click', 'li:not(.active)', function() {
		$(this)
		    .addClass('active').siblings().removeClass('active')
		    .closest('div.tab-info').find('div.tab-inner').removeClass('active').eq($(this).index()).addClass('active');
		e.preventDefault()
	});

})

// $('.fotorama').on('fotorama:ready', function (e, fotorama, extra) { 

// 	$('.fotorama_custom__arr--prev').on('click', function(){ 
// 		fotorama.show('<')
// 	})

// 	$('.fotorama_custom__arr--next').on('click', function(){
// 		fotorama.show('>')
// 	})

// })