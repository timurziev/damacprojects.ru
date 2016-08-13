@extends ('layout')
@section('content')
	<div class="content-home">
		<div class="slider">
			<div class="owl-carousel owl-theme" id="owl-demo2">
				@foreach ($posts as $post)
					@if ($post->is_slide)
					<div class="item">
						<img src="{{ URL::asset('uploads/projects/large') }}/{{ $post->image }}" alt="">
						<div class="wrapper item-desc">
							<h2>{{ $post->title }}</h2>
							<a class="readmore" href="{{ action('MainController@show', $post->slug) }}">Подробнее</a>
						</div> 
					</div>
					@endif
				@endforeach
			</div>
			<div class="arrows">
				<div  class="arrow-left"></div>
				<div  class="arrow-right"></div>
			</div> 
		</div>
		@include('includes/search')
		<div class="wrapper">
			<div class="section-title">
				<h2>Предложения и акции</h2>
				<div class="line"></div>
			</div>
			<div class="carousel">
				<div class="arrow-left"></div>
				<div class="arrow-right"></div>
				@include('includes/last_projects')
			</div> 
			<div class="section-title">
				<h2>В центре внимания</h2>
				<div class="line"></div>
			</div>
			<div class="cards center">
				@include('includes/main_projects')
			</div>
			<div class="partners">
				<img src="img/banner.jpg">
				<img src="img/banner.jpg">
				<img src="img/banner.jpg">
				<img src="img/banner.jpg">
				<img src="img/banner.jpg">
			</div>
		</div>
	</div>
@endsection