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
				<select class="drop-list" name="country">
					<option disabled selected>Выберите страну</option>	
					@foreach ($countries as $country)
						<option value="{{ $country->id }}"
<<<<<<< HEAD
							@if ($country->id == Request::input('country') )
								selected
							@endif
								>{{ $country->name }}
						</option>
=======
						@if ($country->id == Request::input('country') )
							selected
						@endif
							>{{ $country->name }}</option>

							>{!! $country->name !!}</option>
>>>>>>> d0e969921adca59d24bb8227543aecc8c6fde322
					@endforeach	
				</select>
				<div class="select-arrow"></div>
			</div>
			<button>Поиск</button>
		</form>
		<a href="" class="online-sale">Онлайн продажа</a>
	</div>
</div>
