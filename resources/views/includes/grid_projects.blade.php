<div class="grid-view">
	@forelse($projects as $k => $project)

	@if($k === 0 || $k === 3)
		<div class="big-item grid-item">
	@else
		<div class="small-item grid-item">
	@endif
			<div class="item">
				<div class="img"><img src="{{ URL::asset('uploads/projects/small') }}/{{ $project->image, 'small' }}"></div>
				<div class="info-block">
					<div class="h3-block"><h3>{{ $project->title }}</h3></div>
					<p>{{ str_limit($project->description, 100) }}</p>
					<div class="location">Абу-Даби</div>
					<a class="more" href="{!! action('MainController@show', $project->slug) !!}">Узнать больше</a>
				</div>
			</div>
		</div>

	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>