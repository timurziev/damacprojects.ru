<div class="filter">
	<div class="wrapper">
		<h4>Найди свой дом</h4>
		<form action="{{ action('MainController@search') }}" method="get" id="filter-form">
			<div class="select-wrapper"> 
				<select class="drop-list" name="status">
					<option disabled selected>Выберите статус</option>
					<option value="1" {{ 1 == Request::input('status') ? 'selected' : '' }}>Завершено</option>
					<option value="2" {{ 2 == Request::input('status') ? 'selected' : '' }}>В процессе</option>
				</select>
				<div class="select-arrow"></div>
			</div>
			<div class="select-wrapper">
				<select class="drop-list" name="city">
					<option disabled selected>Выбор страны</option>	
					@foreach ($locations as $location)
						<option value="{{ $location->id }}"
						@if ($location->id == Request::input('city') )
							selected
						@endif

							>{{ $location->name }}</option>

							>{!! $location->name !!}</option>

					@endforeach	
				</select>
				<div class="select-arrow"></div>
			</div>
			<button>Поиск</button>
		</form>
		<a href="" class="online-sale">Онлайн продажа</a>
	</div>
</div>