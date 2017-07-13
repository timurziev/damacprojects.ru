<div class="list-view">
	@forelse($offers as $offer)
		<div class="item">
			<div class="img"><img src="{{ URL::asset('uploads/projects/big') }}/{{ $offer->image, 'small' }}"></div>
			<div class="info-block">
				<h3>{{ $offer->title }}</h3>
				@if(!empty($offer->location))<div class="location">{{ $offer->location }}</div>@endif
				<p>{{ $offer->description }}</p>
				<a class="readmore" href="{!! action('MainController@show_offer', $offer->slug) !!}">Подробнее</a>
			</div>
		</div>
	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>