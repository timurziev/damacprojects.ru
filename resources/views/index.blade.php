@extends ('layout')
@section('content')
	<div class="content-home">
		<div class="slider">
			<div data-nav="false" data-autoplay="true" data-arrows="false" data-click="false" data-fit="cover" data-width="100%" data-height="100%" class="fotorama">
				<div data-img="upload/1.jpg" class="slider-item">
					<div class="wrapper">
						<h2>Элитная недвижимость в центре Москвы</h2>
						<a class="readmore" href="">Подробнее</a>
					</div> 
				</div>
				<div data-img="upload/2.jpg" class="slider-item">
					<div class="wrapper">
						<h2>Крутая недвижимость в не центре Москвы</h2>
						<a class="readmore" href="">Подробнее</a>
					</div> 
				</div>
			</div>
			<div class="arrows">
				<div role="button" class="fotorama_custom__arr fotorama_custom__arr--prev"></div>
				<div role="button" class="fotorama_custom__arr fotorama_custom__arr--next"></div>
			</div>
		</div>
		@include('includes/search')
		<div class="wrapper">
			<div class="section-title">
				<h2>Предложения</h2>
				<div class="line"></div>
			</div>
			@include('includes/last_projects')
			<div class="section-title">
				<h2>В центре внимания</h2>
				<div class="line"></div>
			</div>
			<div class="cards">
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