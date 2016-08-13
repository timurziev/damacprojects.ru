<div class="section-title">
	<h2>Новости индустрии</h2>
	<div class="line"></div>
</div>
@forelse($novelties as $novelty)
<div class="media-center news-ind">
	<div class="list-item">
		<a href="{{ action('MainController@show_new', $novelty->slug) }}">
			<img src="{{ Request::root() }}/uploads/media/small/{{ $novelty->image }}" alt="">
		</a>
		<div class="item-wrapper">
			<a class="title-item" href="{{ action('MainController@show_new', $novelty->slug) }}">{{ $novelty->title }}</a>
			<div class="date">{{ date('d F, Y', strtotime($novelty->created_at)) }}</div>
			<a class="readmore black" href="{{ action('MainController@show_new', $novelty->slug) }}">Подробнее</a>
		</div>
	</div>
</div>
@empty
<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет новостей</h2></div><br><br><br>
@endforelse

@if (Request::is('media_center'))
	<div class="show-all">
		<a href="{{ URL::to('/news') }}">Показать все</a>
		<div class="white-square"></div>
		<div class="line"></div>
	</div>
@endif

@if (Request::is('news'))
    @include ('includes/pagination')
@endif