<div class="filter">
	<div class="wrapper">
		<h4>Поиск недвижимости</h4>
		<form action="{{ action('MainController@search') }}" method="get" id="filter-form">
			<div class="select-wrapper"> 
				<select class="drop-list" name="status">
					<option disabled selected>Выберите статус</option>
					<option value="1">Завершено</option>
					<option value="2">В процессе</option>
				</select>
				<div class="select-arrow"></div>
			</div>
			<div class="select-wrapper">
				<select class="drop-list" name="city">
					<option disabled selected>Выберите город</option>
					<option>{{ Request::is('city') ? 'selected' : '' }}Москва</option>
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