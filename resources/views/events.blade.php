@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/events.jpg);">
			<div class="wrapper">
				<h2>Мероприятия</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page events">
				<div class="section-title">
					<h2>Предстоящие мероприятия</h2>
					<div class="line"></div>
				</div>
				<p class="lid">Вы пропустили интересное мероприятие? Не волнуйтесь, в ближайшее время предстоит еще не одно мероприятие. Укажите свои данные в форму ниже и вы будете получать уведомления о новых акциях и мероприятиях компании.</p>
				<form class="subscribe-form" action="" method="post">
					<input type="text" placeholder="Имя">
					<input type="text" placeholder="E-mail">
					<input type="submit" value="Получать уведомления">
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-menu1">	
			<div class="wrapper">
				<ul>
					<h4>О Damac</h4>
					<li><a href="">Обращение председателя</a></li>
					<li><a href="">Управляющая компания</a></li>
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
@endsection