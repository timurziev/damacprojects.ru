<div class="cards">
	@foreach($projects as $project)
		<div class="cards-small">
			<img src="{{ URL::asset('upload/projects/small') }}/{{ $project->image, 'small' }}">
			<h3>{{ $project->title }}</h3>
			<p>{{ $project->description }}</p>
			<a class="look" href="">Смотреть</a>
		</div>
	@endforeach
</div>