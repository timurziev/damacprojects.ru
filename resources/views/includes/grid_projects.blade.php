<div class="cards center">
@forelse ($projects as $key => $project)
	<div class="{{ round($key/2) % 2 ? 'cards-big' : 'cards-small' }}">
			<img src="{{ URL::asset('uploads/projects') }}/{{ round($key/2) % 2 ? 'big' : 'small' }}/{{ $project->image }}">
		<h3>{{ $project->title }}</h3>
		<p class="spotlight-preview">{{ $project->description }}</p>
				<div class="location">{{ $project->city->name }}</div>
		<a class="readmore" href="{{ action('MainController@show', $project->slug) }}">Подробнее</a>
	</div>
@empty
	<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
@endforelse
</div>