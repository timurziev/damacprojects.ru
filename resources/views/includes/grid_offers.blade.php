<div class="cards center">
@forelse ($offers as $key => $offer)
	<div class="cards-small">
		<a href="{{ action('MainController@show_offer', $offer->slug) }}" class="overlay"></a>
			<img src="{{ URL::asset('uploads/projects') }}/small/{{ $offer->image }}">
		<h3>{{ Str::words($offer->title, $words = 4, $end = '...') }}</h3>
		@if(!empty($offer->location))<div class="location">{{ $offer->location }}</div>@endif
		<p class="spotlight-preview">{{ Str::words($offer->description, $words = 10, $end = '...') }}</p>
		
		<!-- <a class="readmore" href="{{ action('MainController@show_offer', $offer->slug) }}">Подробнее</a> -->
	</div>
@empty
	<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
@endforelse
</div>