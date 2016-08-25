<div class="list-view">
	@forelse($projects as $project)
		<div class="item">
			<div class="img"><img src="{{ URL::asset('uploads/projects/small') }}/{{ $project->image, 'small' }}"></div>
			<div class="info-block">
				<h3>{{ $project->title }}</h3>
				<p>{{ $project->description }}</p>
				<a class="more" href="{!! action('MainController@show', $project->slug) !!}">Узнать больше</a>
			</div>
		</div>
	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>