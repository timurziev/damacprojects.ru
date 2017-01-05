<div class="filter advanced-filter">
			<div class="wrapper">
				<div class="filter-text">
					<h4>Найти свою уникальную недвижимость</h4>
					<p>Узнайте больше о недвижимости с помощью этого поля. Укажите страну, город и район для отображения информации нужного вам проекта. В вашем распоряжении жилые апартаменты, отельные апартаменты, отельные номера, виллы и офисные здания.</p>
				</div>
				<form action="{{ action('MainController@complex_search') }}" method="get" id="filter-form">
					<div class="row1">
						<div class="input-wrapper"> 
							<input type="text" name="search" placeholder="Введите ключевое слово" value="{{ Request::input('search') }}">
						</div>
						<div class="select-wrapper">
							<select class="drop-list" name="country" id="country">
								<option value="" selected>Выберите страну</option>
								@foreach ($countries as $country)
									<option
									@if ($country->id == Request::input('country') )
										selected
									@endif
										>{{ $country->name }}</option>
								@endforeach	
							</select>
							<div class="select-arrow"></div>
						</div>
						<div class="select-wrapper">
							<select class="drop-list" name="city" id="city">
							
							</select>
							<div class="select-arrow"></div>
						</div>
					</div>
					<div class="row2">
						<div class="select-wrapper"> 
							<select class="drop-list" name="region" id="region">
							
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