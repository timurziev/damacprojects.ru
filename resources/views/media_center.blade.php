@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/media_center.jpg);">
			<div class="wrapper">
				<h2>Медиа центр</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="right-col">
					<div class="text-header">
						<h2>Медиа центр</h2>
					</div>
					<ul class="right-col-menu">
						<li><a href="">Пресс-релизы</a></li>
						<li><a href="">Новости индустрии</a></li>
						<li><a href="">Фотогалерея</a></li>
						<li><a href="">Видеогалерея</a></li>
					</ul>
					<div class="text-header">
						<h2>Фотогалерея</h2>
					</div>
					<div class="fotorama"  data-width="100%" data-loop="true" data-arrows="true" data-click="true" data-nav="false">
						<img src="upload/media/photo-small1.jpg" data-caption="Versace home">
						<img src="upload/media/photo-small2.jpg" data-caption="Town House">
					</div>
					<a class="readmore black" href="">Перейти в галерею</a>
					<div class="text-header">
						<h2>Видеогалерея</h2>
					</div>
					<div class="fotorama"  data-width="100%" data-loop="true" data-arrows="true" data-click="true" data-nav="false">
						<a href="https://www.youtube.com/watch?v=mmfSKiLEhFU">AYKON London One by Versace Home</a>
						<a href="https://www.youtube.com/watch?v=Hnn5jQq2SdQ">AYKON City</a>
					</div>
					<a class="readmore black" href="">Перейти в галерею</a>
					<div class="text-header">
						<h2>Контакты</h2>
					</div>
					<div class="right-col-contacts">
						<p>Телефон: <strong>+7 928 123 45 67</strong></p>
						<p>Е-mail: <strong>info@damac.ru</strong></p>
						<p>Факс: <strong>+7 928 123 45 67</strong></p>
						<p>Адрес: <strong>г.Москва, ул. Магасовская 06</strong></p>
					</div>
				</div>
				<div class="left-col">
					<div class="lid">Добро пожаловать в пресс-центр DAMAC Properties. Узнавайте самые последние новости компании, мнения экспертов и информацию о наших проектах, и разработках. Кроме того, обзор исследований отрасли и анализ от сторонних компаний на рынке недвижимости ближнего востока.</div>
					<div class="section-title">
						<h2>Пресс-релизы</h2>
						<div class="line"></div>
					</div>
					<div class="media-center press">
						<div class="list-item">
							<a href="">
								<img src="upload/media/press1.jpg" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="">DAMAC Properties открывает "AYKON Сити"</a>
								<div class="date">1 марта 2016</div>
								<p>Председатель DAMAC Properties Хуссейн Сайвани объявляет о запуске в Дубаи одного из крупнейших дубайских проектов недвижимости на дороге Шейх Заед с видом на Дубай канал.</p>
								<a class="look black" href="">Подробнее</a>
							</div>
						</div>
						<div class="list-item">
							<a href="">
								<img src="upload/media/press2.jpg" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="">DAMAC Properties открывает "AYKON Сити"</a>
								<div class="date">1 марта 2016</div>
								<p>Председатель DAMAC Properties Хуссейн Сайвани объявляет о запуске в Дубаи одного из крупнейших дубайских проектов недвижимости на дороге Шейх Заед с видом на Дубай канал.</p>
								<a class="look black" href="">Подробнее</a>
							</div>
						</div>
						<div class="list-item">
							<a href="">
								<img src="upload/media/press3.jpg" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="">DAMAC Properties открывает "AYKON Сити"</a>
								<div class="date">1 марта 2016</div>
								<p>Председатель DAMAC Properties Хуссейн Сайвани объявляет о запуске в Дубаи одного из крупнейших дубайских проектов недвижимости на дороге Шейх Заед с видом на Дубай канал.</p>
								<a class="look black" href="">Подробнее</a>
							</div>
						</div>
					</div>
					<div class="show-all">
						<a href="">Показать все</a>
						<div class="white-square"></div>
						<div class="line"></div>
					</div>
					<div class="section-title">
						<h2>Новости индустрии</h2>
						<div class="line"></div>
					</div>
					<div class="media-center news-ind">
						<div class="list-item">
							<a href="">
								<img src="upload/media/press2.jpg" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="">Почему вы должны купить недвижимость в Дубае сейчас?</a>
								<div class="date">2 марта 2016</div>
								<a class="readmore black" href="">Подробнее</a>
							</div>
						</div>
						<div class="list-item">
							<a href="">
								<img src="upload/media/press3.jpg" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="">DAMAC Properties открывает "AYKON Сити"</a>
								<div class="date">1 марта 2016</div>
								<a class="readmore black" href="">Подробнее</a>
							</div>
						</div>
						<div class="show-all">
							<a href="">Показать все</a>
							<div class="white-square"></div>
							<div class="line"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection