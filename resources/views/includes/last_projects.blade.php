<div class="owl-carousel cards offers" id="owl-demo">
	@forelse($projects as $project)
		<div class="cards-small">
			<img src="{{ URL::asset('uploads/projects/small') }}/{{ $project->image, 'small' }}">
			<h3>{{ $project->title }}</h3>
			<p>{{ $project->description }}</p>
			<a class="look" href="{!! action('MainController@show', $project->slug) !!}">Узнать больше</a>
		</div>
	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>