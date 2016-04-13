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
		<div class="filter">
			<div class="wrapper">
				<h4>Поиск недвижимости</h4>
				<form action="" method="post" id="filter-form">
					<div class="select-wrapper"> 
						<select class="drop-list" name="status">
							<option disabled selected>Выберите статус</option>
							<option>Завершено</option>
							<option>В процессе</option>
						</select>
						<div class="select-arrow"></div>
					</div>
					<div class="select-wrapper">
						<select class="drop-list" name="city">
							<option disabled selected>Выберите город</option>
							<option>Москва</option>
							<option>Воронеж</option>
							<option>Ростов на Дону</option>
						</select>
						<div class="select-arrow"></div>
					</div>
					<button>Поиск</button>
				</form>
				<a href="" class="online-sale">Онлайн продажа</a>
			</div>
		</div>
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
			<!-- <div class="cards">
				<div class="cards-small">
					<img src="upload/spotlight1.jpg">
					<h3>Luxury ready to move in apartments</h3>
					<p class="spotlight-preview">With its direct access to Dubai’s business district and close proximity to the prestigious platinum square kilometre of the Burj area.</p>
					<div class="location">Moscow, Russia</div>
					<a class="readmore" href="">Подробнее</a>
				</div>
				<div class="cards-big">
					<img src="upload/spotlight2.jpg">
					<h3>Luxury ready to move in apartments</h3>
					<p class="spotlight-preview">Viridis Residences & Hotel Apartments at AKOYA Oxygen form a luxury hotel and residential complex located in one of the most anticipated master developments in the UAE. Nestled in lush parkland, the four towers, two residential and two comprising hotel apartments, managed by NAIA Hotels & Resorts.</p>
					<div class="location">Moscow, Russia</div>
					<a class="readmore" href="">Подробнее</a>
				</div>
				<div class="cards-big">
					<img src="upload/spotlight3.jpg">
					<h3>Luxury ready to move in apartments</h3>
					<p class="spotlight-preview">Viridis Residences & Hotel Apartments at AKOYA Oxygen form a luxury hotel and residential complex located in one of the most anticipated master developments in the UAE. Nestled in lush parkland, the four towers, two residential and two comprising hotel apartments, managed by NAIA Hotels & Resorts.</p>
					<div class="location">Moscow, Russia</div>
					<a class="readmore" href="">Подробнее</a>
				</div>
				<div class="cards-small">
					<img src="upload/spotlight4.jpg">
					<h3>Luxury ready to move in apartments</h3>
					<p class="spotlight-preview">With its direct access to Dubai’s business district and close proximity to the prestigious platinum square kilometre of the Burj area.</p>
					<div class="location">Moscow, Russia</div>
					<a class="readmore" href="">Подробнее</a>
				</div>
			</div> -->
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