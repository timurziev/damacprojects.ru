<div class="section-title">
	<h2>Пресс-релизы</h2>
	<div class="line"></div>
</div>
@forelse($releases as $release)
<div class="media-center press">
	<div class="list-item">
		<a href="{{ action('MainController@show_release', $release->slug) }}">
			<img src="{{ Request::root() }}/uploads/media/small/{{ $release->image }}" alt="">
		</a>
		<div class="item-wrapper">
			<a class="title-item" href="{{ action('MainController@show_release', $release->slug) }}">{{ $release->title }}</a>
			<div class="date">{{ date('d F, Y', strtotime($release->created_at)) }}</div>
			<p>{!!  Str::words($release->text, $words = 40, $end = '...') !!}</p>
			<a class="look black" href="{{ action('MainController@show_release', $release->slug) }}">Подробнее</a>
		</div>
	</div>
</div>
@empty
<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;">
	<h2>Нет релизов</h2>
</div>
<br><br><br>
@endforelse

@if (Request::is('media_center'))
	<div class="show-all">
		<a href="{{ URL::to('/press_releases') }}">Показать все</a>
		<div class="white-square"></div>
		<div class="line"></div>
	</div>
@endif

@if (Request::is('press_releases'))
    @include ('includes/pagination')
@endif
