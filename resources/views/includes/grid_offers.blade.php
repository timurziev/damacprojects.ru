<div class="cards center offer-cards">
@forelse ($offers as $key => $offer)
	<div class="cards-small">
		<img src="{{ URL::asset('uploads/projects') }}/small/{{ $offer->image }}">
		<h3>{{ $offer->title }}</h3>
		<p class="spotlight-preview">{{ $offer->description }}</p>
				@if(!empty($offer->location))<div class="location">{{ $offer->location }}</div>@endif
		<a class="readmore" href="{{ action('MainController@show_offer', $offer->slug) }}">Подробнее</a>
	</div>
@empty
	<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
@endforelse
</div>