<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/fonts/fonts.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/fotorama.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.transitions.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/mobile.css') }}">
	<link rel="icon" href="{{ URL::asset('img/favicon.ico') }}">
	<title>SHEIKH RE</title>
</head>
<body>
	<header>
		<div class="wrapper">
			<a href="{{ Request::root() }}" class="logo"></a>
			<a class="header-nav nav2" href="{{ URL::to('contacts') }}">Связаться с нами</a>
			<!-- <a class="header-nav" href="">Онлайн продажа</a> -->
			<div class="phone">+7 (964) 515-11-11</div>
			<div class="phone">+7 (905) 536-33-35</div>
		</div>
	</header>
	<a href="" class="burger" id="open-nav"><i></i></a>
	<div class="menu">
		<div class="wrapper">
			<form action="{{ action('MainController@simple_search') }}" method="get" id="search-form">
				<input name="search" autofocus></input>
			</form>
			<ul>
				<li class="{{ Request::is('about') ? 'active' : '' }}">
					<a href="{{ URL::to('/about') }}">ОБ АГЕНТСТВЕ</a>
					<div class="submenu">
						<ul>
							<!-- <li><a href="{{ URL::to('/message') }}">Слово председателя</a></li> -->
							<!-- <li><a href="{{ URL::to('/team') }}">Управляющая компания</a></li> -->
						</ul>
						<div class="menu-desc">
							<img src="{{ Request::root() }}/img/about-small.jpg" alt="">
							<h4>О нас</h4>
							<p>Компания DAMAC была создана в 2002 году как частная организация в сфере строительства жилой и коммерческой недвижимости в Дубае и на ближнем востоке. С тех пор, компания быстро расширяется в Северной Африке, Иордании, Ливане, Катаре и Саудовской Аравии.</p>
							<a class="look" href="{{ URL::to('/about') }}">Подробнее</a>
						</div>
					</div>
				</li>
				<li class="{{ Request::is('projects') ? 'active' : '' }}">
					<a href="{{ URL::to('/projects') }}">Найди свой роскошный дом</a>
					<div class="submenu">
						<ul>
							<li><a href="{{ URL::to('/all_projects') }}">Все проекты</a></li>
							<li><a href="{{ URL::to('/in_progress_projects') }}?status=1">В процессе</a></li>
							<li><a href="{{ URL::to('/completed_projects') }}?status=2">Завершенные</a></li>
						</ul>
						<div class="menu-desc">
							<img src="{{ Request::root() }}/img/offers-small.jpg" alt="">
							<h4>Проекты</h4>
							<p>Хотите узнать больше о наших проектах? Высотные, мода резиденции, фирменные квартиры, розничные или коммерческих разработок - от плана собственности и готовые к въезду.</p>
							<a class="look" href="{{ URL::to('/projects') }}">Подробнее</a>
						</div>
					</div>
				</li>
				<li class="{{ Request::is('offers') ? 'active' : '' }}">
					<a href="{{ URL::to('/offers') }}?view=list">Предложения и акции</a>
				<li class="{{ Request::is('events') ? 'active' : '' }}">
					<a href="{{ URL::to('/events') }}">Мероприятия</a>
				<li class="{{ Request::is('media_center') ? 'active' : '' }}">
					<a href="{{ URL::to('/media_center') }}">Медиа-центр</a>
					<div class="submenu">
						<ul>
							{{-- <li><a href="{{ URL::to('/press_releases') }}">Пресс-релизы</a></li> --}}
							<li><a href="{{ URL::to('/news') }}">Новости индустрии</a></li>
							<li><a href="">Фотогалерея</a></li>
							<li><a href="">Видеогалерея</a></li>
						</ul>
						<div class="menu-desc">
							<img src="{{ Request::root() }}/img/offers-small.jpg" alt="">
							<h4>Медиа-центр</h4>
							<p>Узнавайте самые последние новости компании, мнения экспертов и информацию о наших проектах, и разработках. Кроме того, обзор исследований отрасли и анализ от сторонних компаний на рынке недвижимости ближнего востока.</p>
							<a class="look" href="{{ URL::to('/media_center') }}">Подробнее</a>
						</div>
					</div>
				</li>
				<li class="{{ Request::is('investor_relations') ? 'active' : '' }}">
					<a href="{{ URL::to('/investor_relations') }}">Инвестирование</a>
					<div class="submenu">
						<ul>
							@foreach ($static_pages as $static_page)
						            @if ($static_page->main_page_id == 4)
							       <li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
						            @endif
					                @endforeach
						</ul>
						<div class="menu-desc">
							<img src="{{ Request::root() }}/img/offers-small.jpg" alt="">
							<h4>Инвестирование</h4>
							<p>Как лидер развития элитной недвижимости в Дубае, считает, в предоставлении четкой, последовательной и прозрачной информации, относящейся к организации. Таким образом, компания имеет подразделение опытного связям с инвесторами, посвященную поддержанию акционеров обоснованных путем своевременного обновления на деятельности Общества.</p>
							<a class="look" href="{{ URL::to('/investor_relations') }}">Подробнее</a>
						</div>
					</div>
				</li>
			</ul>
			<div class="search">{{ Request::input('search') }}</div>
		</div>
	</div>

	@yield('content')

	<footer>
		<div class="footer-menu1">
			<div class="wrapper">
				<ul>
					<h4><a href="{{ URL::to('/about') }}">Об агентстве</a></h4>
					<!-- <li><a href="{{ URL::to('/message') }}">Обращение председателя</a></li> -->
					<!-- <li><a href="{{ URL::to('/team') }}">Управляющая компания</a></li> -->
					@foreach ($static_pages->where('main_page_id', 1)->all() as $static_page)
						<li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
					@endforeach
				</ul>
				<ul>
					<h4><a href="{{ URL::to('/projects') }}">Проекты</a></h4>
					@foreach ($static_pages->where('main_page_id', 2)->all() as $static_page)
						<li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
					@endforeach
				</ul>
				<ul>
					<h4><a href="{{ URL::to('/offers') }}">Предложения</a></h4>
					@foreach ($static_pages->where('main_page_id', 3)->all() as $static_page)
						<li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
					@endforeach
				</ul>
				<ul>
					<h4><a href="{{ URL::to('/investor_relations') }}">Инвесторам</a></h4>
					@foreach ($static_pages->where('main_page_id', 4)->all() as $static_page)
						<li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
			<div class="footer-menu2">
			<div class="wrapper">
				<span class="copyright">Все права защищены 2016 SHEIKH</span>
				<a href="{{ url('/contacts') }}" class="footer-links">Контакты</a>
				<a href="" class="footer-links">Карта сайта</a>
				<a href="" class="footer-links">Условия использования</a>
				<div class="social">
					<a class="vk" href="https://vk.com/sheikhhouse"></a>
					{{-- <a class="fb" href=""></a> --}}
					{{-- <a class="tw" href=""></a> --}}
					{{-- <a class="ok" href=""></a> --}}
					<a class="in" href="https://www.instagram.com/sheikhhouse"></a>
				</div>
			</div>
		</div>
	</footer>
	<div class="popup">
		<div class="popup-manager">
			<div id="map"></div>
			<a href="" class="close"></a>
		</div>
	</div>
	<script src="{{ URL::asset('js/jquery-2.2.1.min.js') }}"></script>
	<script src="{{ URL::asset('js/fotorama.js') }}"></script>
	<script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
	<script src="{{ URL::asset('js/masonry.pkgd.min.js') }}"></script>
	<script async="" src="{{ URL::asset('js/scripts.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
  type="text/javascript"></script>
  
  	<!--ajax search-->
	<script>
		$('#country').on('change', function(e) { 	
		    console.log(e);
		    var coun_id = e.target.value;
		    $.get('/ajax-call?coun_id=' + coun_id, function (data) {
		    	$('#city').empty();
		        $('#city').append('<option value="" disabled selected>'+'Выберите город'+'</option>');
			        $.each(data, function(index, cityObj){
			            $('#city').append('<option value="'+cityObj.id+'">'+cityObj.name+'</option>');
			        });
			    });
			});

		$('#city').on('change', function(e) {
		    console.log(e);
		    var region_id = e.target.value;
		    $.get('/ajax-get?region_id=' + region_id, function (data) {
		    	$('#region').empty();
		    	$('#region').append('<option value="" disabled selected>'+'Выберите район'+'</option>');
		        $.each(data, function(index, regionObj){
		            $('#region').append('<option value="'+regionObj.id+'">'+regionObj.name+'</option>');
		        });
		    });
		});
	</script>

	<!--show map multiple projects -->
	<script>
		function initialize() {
		  var map_canvas = new google.maps.Map(document.getElementById('map-canvas'),{
		  	center:{
		  		lat: 25.17,
	            lng: 55.27
		  	},
		  	zoom:4
		  });

		  for (i = 0; i < markers.length; i++) {
			    var location = new google.maps.LatLng(markers[i][0], markers[i][1]);
			    var content = markers[i][2];
			    var title = markers[i][3];

			    var infowindow = new google.maps.InfoWindow({
				    content: content,
				});
				var marker = new google.maps.Marker({
			        position: location,
			        map: map_canvas,
			        title: title,
			        icon: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/32/Map-Marker-Marker-Inside-Chartreuse-icon.png',
			        
			    }); 
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(markers[i][2]);
					    infowindow.open(map_canvas, marker);
					}
				})(marker, i));
			}
		}
		google.maps.event.addDomListener(window, "load", initialize);
	</script>
	
	<!-- map single show -->
	<script>
		var map = new google.maps.Map(document.getElementById('map'),{
			center:{
				lat: lat,
				lng: lng
			},
			zoom: 10
		});
		var marker = new google.maps.Marker({
			position:{
				lat: lat,
				lng: lng
			},
			map:map,
			
	        title: title,
		});

		var infowindow = new google.maps.InfoWindow({
		    content: content,
		  });
		marker.addListener('click', function() {
		    infowindow.open(map, marker);
		});
	</script>
</body>
</html>
