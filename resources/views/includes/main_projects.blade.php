@forelse ($projects as $key => $project)
	<div class="cards-small">
	<!-- <div class="{{ round($key/2) % 2 ? 'cards-big' : 'cards-small' }}"> -->
		<a href="{{ action('MainController@show', $project->slug) }}" class="overlay"></a>
			<img src="{{ URL::asset('uploads/projects') }}/small/{{ $project->image }}">
			<!-- <img src="{{ URL::asset('uploads/projects') }}/{{ round($key/2) % 2 ? 'big' : 'small' }}/{{ $project->image }}"> -->
		<h3>{{ Str::words($project->title, $words = 4, $end = '...') }}</h3>
		<div class="location">{{ $project->city->name }}</div>
		<p class="spotlight-preview">{{ Str::words($project->description, $words = 16, $end = '...') }}</p>
		<a class="readmore" href="{{ action('MainController@show', $project->slug) }}">Подробнее</a>
	</div>
@empty
	<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
@endforelse