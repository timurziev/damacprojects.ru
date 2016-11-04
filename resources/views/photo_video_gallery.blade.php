@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url({{ Request::root() }}/img/photo_gallery.jpg);">
			<div class="wrapper"></div>
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

				 		@if(Request::is('media_center/photo_gallery') || Request::is('media_center/video_gallery'))
				 			@include('includes/list_photo_video')
				 		@endif

				 		@if(Request::is('media_center/photo_gallery/*'))
				 			@include('includes/photo_item')
				 		@endif

					</div>
				</div>
			</div>
			@if(Request::is('media_center/photo_gallery') || Request::is('media_center/video_gallery'))
		    	@include ('includes/pagination')
		    @endif
		</div>
	</div>
@endsection
