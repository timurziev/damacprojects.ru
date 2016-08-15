<div class="filter advanced-filter">
			<div class="wrapper">
				<div class="filter-text">
					<h4>Найти дом вашей мечты</h4>
					<p>Хотите узнать больше о наших проектах? Высотные, мода резиденции, фирменные квартиры, розничные или коммерческих разработок - от плана собственности и готовые к въезду</p>
				</div>
				<form action="{{ action('MainController@complex_search') }}" method="get" id="filter-form">
					<div class="row1">
						<div class="input-wrapper"> 
							<input type="text" name="search" placeholder="Введите ключевое слово">
						</div>
						<div class="select-wrapper">
							<select class="drop-list" name="country">
								<option disabled selected>Выберите страну</option>
								<option value="">Иордания</option>
								<option value="">Ливан</option>
								<option value="">Катар</option>
								<option value="">Саудовская Аравия</option>
								<option value="">ОАЭ</option>
							</select>
							<div class="select-arrow"></div>
						</div>
						<div class="select-wrapper">
							<select class="drop-list" name="city">
								<option disabled selected>Выберите город</option>
								@foreach ($locations as $location)
									<option value="{{ $location->id }}"
									@if ($location->id == Request::input('city') )
										selected
									@endif
										>{{ $location->name }}</option>
								@endforeach	
							</select>
							<div class="select-arrow"></div>
						</div>
					</div>
					<div class="row2">
						<div class="select-wrapper"> 
							<select class="drop-list" name="district">
								<option disabled selected>Выберите район</option>
								<option value="">Абдали</option>
								<option value="">Солидер</option>
								<option value="">Лусаил</option>
							</select>
							<div class="select-arrow"></div>
						</div>
						<div class="select-wrapper"> 
							<select class="drop-list" name="status">
								<option disabled selected>Выберите статус</option>
								<option value="1" {{ 1 == Request::input('status') ? 'selected' : '' }}>Завершено</option>
								<option value="2" {{ 2 == Request::input('status') ? 'selected' : '' }}>В процессе</option>
							</select>
							<div class="select-arrow"></div>
						</div>
						<button class="readmore">Поиск</button>
					</div>
				</form>
			</div>
		</div>