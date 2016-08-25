<div class="map-view">
	@forelse($projects as $k => $project)

	map

	@empty
		<div class="cards" style="background: #fff; color: #d4d1d1; text-align: center;"><h2>Нет проектов</h2></div>
	@endforelse
</div>