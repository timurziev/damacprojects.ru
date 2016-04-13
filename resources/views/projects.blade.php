@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				<h2>Проекты</h2>
			</div>
		</div>
		<div class="filter advanced-filter">
			<div class="wrapper">
				<div class="filter-text">
					<h4>Найти дом вашей мечты</h4>
					<p>Хотите узнать больше о наших проектах? Высотные, мода резиденции, фирменные квартиры, розничные или коммерческих разработок - от плана собственности и готовые к въезду</p>
				</div>
				<form action="" method="post" id="filter-form">
					<div class="row1">
						<div class="input-wrapper"> 
							<input type="text" name="search" placeholder="Что ищем?">
						</div>
						<div class="select-wrapper"> 
							<select class="drop-list" name="status">
								<option disabled selected>Выберите страну</option>
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
					</div>
					<div class="row2">
						<div class="select-wrapper"> 
							<select class="drop-list" name="status">
								<option disabled selected>Выберите район</option>
								<option>Завершено</option>
								<option>В процессе</option>
							</select>
							<div class="select-arrow"></div>
						</div>
						<div class="select-wrapper"> 
							<select class="drop-list" name="status">
								<option disabled selected>Выберите статус</option>
								<option>Завершено</option>
								<option>В процессе</option>
							</select>
							<div class="select-arrow"></div>
						</div>
						<button class="readmore">Поиск</button>
					</div>
				</form>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page projects">
				<div class="section-title">
					<h2>Наши проекты</h2>
					<div class="line"></div>
				</div>
				<div class="cards">
					@include('includes/main_projects')
				</div>
					@include ('includes/pagination')
			</div>
		</div>
	</div>
@endsection