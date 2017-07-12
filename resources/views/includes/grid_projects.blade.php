<div class="cards center">
@forelse ($projects as $key => $project)
	<div class="cards-small">
			<a href="{{ action('MainController@show', $project->slug) }}" class="overlay"></a>
			<img src="{{ URL::asset('uploads/projects') }}/small/{{ $project->image }}">
		<h3>{{ Str::words($project->title, $words = 4, $end = '...') }}</h3>
		<div class="location">{{ $project->country->name . ", " . $project->city->name . ", " . $project->region->name }}</div>
		<p class="spotlight-preview">{{ Str::words($project->description, $words = 10, $end = '...') }}</p>
		<a class="readmore" href="{{ action('MainController@show', $project->slug) }}">Подробнее</a>
	</div>
@empty
	<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
@endforelse
</div>