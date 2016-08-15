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
							<div class="container">
								<div class="shadow">
									<h2><a href="{{ action('MainController@show', $post->slug) }}">{{ $post->title }}</a></h2>
									<div class="info-block"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id nulla, veritatis a quasi ipsa assumenda. Numquam animi incidunt ab earum minima unde, minus neque rem enim eius, voluptates, ex deserunt!</p></div>
								</div>
							</div>
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