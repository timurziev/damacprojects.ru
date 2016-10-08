@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/events.jpg);">
			<div class="wrapper">
				{{-- <h2>Мероприятия</h2> --}}
			</div>
		</div>
		<div class="wrapper">
			<div class="event-page events">
				<div class="section-title">
					<h2>Предстоящие мероприятия</h2>
					<div class="line"></div>
				</div>
				@forelse($events as $event)
					<div class="media-center news-ind">
						<div class="list-item">
							<a href="{{ action('MainController@show_event', $event->slug) }}">
								<img src="{{ Request::root() }}/uploads/media/small/{{ $event->image }}" alt="">
							</a>
							<div class="item-wrapper">
								<a class="title-item" href="{{ action('MainController@show_event', $event->slug) }}">{{ $event->title }}</a>
								<div class="date">{{ $event->time }}</div>
								<p>{!!  Str::words($event->text, $words = 35, $end = '...') !!}</p>
								<script>
								  var lat = {{$event->lat}};
								  var lng = {{$event->lng}};
								</script>
								<div class="event-location">
									<div class="city">{{ $event->location }}</div>
									<!-- <a href="#" class="show-map">Показать на карте</a> -->
								</div>
								<a class="readmore black" href="{{ action('MainController@show_event', $event->slug) }}">Подробнее</a>
							</div>
						</div>
					</div>
				@empty
					<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет мероприятий</h2></div><br><br><br>
				@endforelse
				@include ('includes/pagination')
				@if(is_null($events))
				<p class="lid event-text">Вы пропустили интересные мероприятия? Не волнуйтесь, в ближайшее время их будет еще больше. Заполните свои данные и вы будете получать уведомления о новых мероприятиях компаний, с которыми сотрудничает наше агентство.</p>
				<form class="subscribe-form" action="" method="post">
					@if (session('status'))
				        <div class="alert-success">
				            {{ session('status') }}
				        </div>
				    @endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" name="name" placeholder="Имя" required>
					<input type="text" name="email" placeholder="E-mail" required>
					<input type="submit" value="Получать уведомления">
				</form>
				@endif
			</div>
		</div>
	</div>
@endsection