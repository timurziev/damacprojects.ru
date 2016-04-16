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
	<link rel="icon" href="{{ URL::asset('img/favicon.png') }}">
	<title>Damac Projects</title>
</head>
<body>
	<header>
		<div class="wrapper">
			<a href="{{ Request::root() }}" class="logo"></a>
			<a class="header-nav" href="">Написать нам</a>
			<a class="header-nav" href="">Онлайн продажа</a>
			<div class="phone">+7 999 123 45 67</div>
		</div>
	</header>
	<div class="menu">
		<div class="wrapper">
			<form action="{{ action('MainController@simple_search') }}" method="get" id="search-form">
				<input autofocus name="search"></input>
			</form>
			<ul>
				<li class="{{ Request::is('about') ? 'active' : '' }}">
					<a href="{{ URL::to('/about') }}">О DAMAC</a>
				</li>
				<li class="{{ Request::is('projects') ? 'active' : '' }}">
					<a href="{{ URL::to('/projects') }}">Найди свой роскошный дом</a>
				</li>
				<li class="{{ Request::is('offers') ? 'active' : '' }}">
					<a href="{{ URL::to('/offers') }}">Предложения и акции</a>
				</li>
				<li class="{{ Request::is('events') ? 'active' : '' }}">
					<a href="{{ URL::to('/events') }}">Мероприятия</a>
				</li>
				<li class="{{ Request::is('media_center') ? 'active' : '' }}">
					<a href="{{ URL::to('/media_center') }}">Медиа-центр</a>
				</li>
				<li class="{{ Request::is('investor_relations') ? 'active' : '' }}">
					<a href="{{ URL::to('/investor_relations') }}">Инвесторам</a>
				</li>
			</ul>
			<div class="search"></div>
			
		</div>
	</div>

	@yield('content')

	<footer>
		<div class="footer-menu1">	
			<div class="wrapper">
				<ul>
					<h4>О Damac</h4>
					<li><a href="{{ URL::to('/message') }}">Обращение председателя</a></li>
					<li><a href="{{ URL::to('/team') }}">Управляющая компания</a></li>
					<li><a href="">История</a></li>
					<li><a href="">Награды</a></li>
					<li><a href="">Журнал DAMAC</a></li>
				</ul>
				<ul>
					<h4>Проекты Damac</h4>
					<li><a href="">ОАЭ</a></li>
					<li><a href="">Саудовская Аравия</a></li>
					<li><a href="">Катар</a></li>
					<li><a href="">Иордания</a></li>
					<li><a href="">Ливан</a></li>
					<li><a href="">Россия</a></li>
				</ul>
				<ul>
					<h4>Предложения</h4>
					<li><a href="">Дубай - почувствуйте себя как дома</a></li>
					<li><a href="">Мерано башня - Новый релиз</a></li>
					<li><a href="">Разумными инвестициями</a></li>
				</ul>
				<ul>
					<h4>Инвесторам</h4>
					<li><a href="">Почему DAMAC?</a></li>
					<li><a href="">Поделиться информацией</a></li>
					<li><a href="">Финансовая информация</a></li>
					<li><a href="">Быстрый бюллетень</a></li>
					<li><a href="">Корпоративное управление</a></li>
					<li><a href="">Ежегодные отчеты</a></li>
					<li><a href="">Анонсы компании</a></li>
					<li><a href="">Контакты</a></li>
				</ul>
			</div>
		</div>
			<div class="footer-menu2">
			<div class="wrapper">
				<span class="copyright">Все права защищены 2016 Damac</span>
				<a href="" class="footer-links">Контакты</a>
				<a href="" class="footer-links">Карта сайта</a>
				<a href="" class="footer-links">Условия использования</a>
				<div class="social">
					<a class="vk" href=""></a>
					<a class="fb" href=""></a>
					<a class="tw" href=""></a>
					<a class="ok" href=""></a>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ URL::asset('js/jquery-2.2.1.min.js') }}"></script>
	<script src="{{ URL::asset('js/fotorama.js') }}"></script>
	<script async="" src="{{ URL::asset('js/scripts.js') }}"></script>
</body>
</html>