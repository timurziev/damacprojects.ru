<div class="owl-carousel cards offers last-projects-items" id="owl-demo">
	@forelse($offers as $offer)
		<div class="cards-small">
			<a href="{{ action('MainController@show_offer', $offer->slug) }}" class="overlay"></a>
			<img src="{{ URL::asset('uploads/projects/big') }}/{{ $offer->image, 'small' }}">
			<div class="h3-block"><h3>{{ Str::words($offer->title, $words = 4, $end = '...') }}</h3></div>
			<p class="loc">{{ $offer->location }}</p>
			@if(null == $offer->price)
				<p>{{ Str::words($offer->description, $words = 15, $end = '...') }}</p>
			@else
				<p>{{ Str::words($offer->description, $words = 9, $end = '...') }}</p>
			@endif

			@if(null !== $offer->price)
				<p class="price">от {{ number_format($offer->price, 0, ',', ' ') }} руб.</p>
			@endif
			 
			<a class="look" href="{!! action('MainController@show_offer', $offer->slug) !!}">Узнать больше</a>
		</div>
	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>