@forelse ($projects as $key => $project)
	<div class="{{ round($key/2) % 2 ? 'cards-big' : 'cards-small' }}">
		<img src="{{ URL::asset('upload/projects') }}/{{ round($key/2) % 2 ? 'big' : 'small' }}/{{ $project->image }}">
		<h3>{{ $project->title }}</h3>
		<p class="spotlight-preview">{{ $project->description }}</p>
		<div class="location">{{ $project->location }}</div>
		<a class="readmore" href="">Подробнее</a>
	</div>
@empty
	Нет проектов.
@endforelse