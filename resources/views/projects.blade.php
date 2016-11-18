@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				<h2>Проекты</h2>
			</div>
		</div>
		@if (Request::is('projects') || Request::is('comp_search'))
			@include('includes/complex_search')
		@endif
		<div class="wrapper">
			<div class="single-page projects">
				<div class="section-title">
					<h2>Проекты</h2>
					<div class="line"></div>
				</div>

				<div class="cards offers-wrapper projects-search-results">

					<div class="switch-view">
						<a href="?country={{ isset($country) ? $country : '' }}&city={{ isset($city) ? $city : '' }}&status={{ isset($status) ? $status : '' }}&region={{ isset($region) ? $region : '' }}&view=list" class="list @if(Request::input('view') !== 'map' && Request::input('view') !== 'grid') active @endif }}"></a>
						<a href="?country={{ isset($country) ? $country : '' }}&city={{ isset($city) ? $city : '' }}&status={{ isset($status) ? $status : '' }}&region={{ isset($region) ? $region : '' }}&view=grid" class="grid {{ Request::input('view') == 'grid' ? 'active' : '' }}"></a>
						<a href="?country={{ isset($country) ? $country : '' }}&city={{ isset($city) ? $city : '' }}&status={{ isset($status) ? $status : '' }}&region={{ isset($region) ? $region : '' }}&view=map" class="map {{ Request::input('view') == 'map' ? 'active' : '' }}"></a>
					</div>

					@if(Request::input('view') == 'list')
						@include ('includes/list_projects')
					@elseif (Request::input('view') == 'grid')
						@include ('includes/grid_projects')
					@elseif (Request::input('view') == 'map')
						@include ('includes/map_projects')
					@else 
						@include ('includes/list_projects')
					@endif

				</div>

				@if(Request::input('view') !== 'map')
		    		@include ('includes/pagination')
		    	@endif
			</div>
		</div>
	</div>
	<script>
		  var locations = [
			@foreach($projects as $project)
			  [{{$project->lat}}, {{$project->lng}}, '<img src="{{Request::root()}}/uploads/projects/big/{{$project->image}}"style="width:250px;height:auto;margin-top:5px;float:none;"><a style="font-weight:500;width:245px;display:block;text-decoration:none;color:#333;" href="{!! action('MainController@show', $project->slug) !!}">{{$project->title}}</a>', '{{$project->title}}'],
			@endforeach
			];
	</script>
@endsection