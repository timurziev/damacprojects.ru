@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url({{ Request::root() }}/img/media_center.jpg);">
			<div class="wrapper">
				<h2>Медиа-центр</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="right-col">
					<div class="text-header">
						<h2>Медиа-центр</h2>
					</div>
					<ul class="right-col-menu">
						<!-- <li><a href="{{ URL::to('/press_releases') }}">Пресс-релизы</a></li> -->
						<li><a href="{{ URL::to('/news') }}">Новости индустрии</a></li>
						<li><a href="{{ URL::to('/media_center/photo_gallery') }}">Фотогалерея</a></li>
						<li><a href="{{ URL::to('/media_center/video_gallery') }}">Видеогалерея</a></li>
					</ul>
					<!-- <div class="text-header">
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
					<a class="readmore black" href="">Перейти в галерею</a> -->
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
				<div class="content-left-block">
					<div class="left-col">
					    @if(Request::is('media_center'))
							<div class="lid">Добро пожаловать в пресс-центр DAMAC Properties. Узнавайте самые последние новости компании, мнения экспертов и информацию о наших проектах, и разработках. Кроме того, обзор исследований отрасли и анализ от сторонних компаний на рынке недвижимости ближнего востока.</div>
						@endif

						<!-- @if(Request::is('release/*'))
				 			@include('includes/view_release')
				 		@endif -->

				 		@if(Request::is('new/*'))
				 			@include('includes/view_new')
				 		@endif
						
						<!-- @if(Request::is('media_center') || (Request::is('press_releases')))
				 			@include('includes/releases')
				 		@endif -->
				 		
				 		@if(Request::is('media_center') || (Request::is('news')))
				 			@include('includes/news')
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
