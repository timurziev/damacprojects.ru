@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				{{-- <h2>{{ Request::is('offers') ? 'Предложения и акции' : 'Проекты' }}</h2> --}}
			</div>
		</div>
		@if (Request::is('search_pro'))
			 @include('includes/search')
		@endif
		<div class="wrapper">
			<div class="single-page offers">
				<div class="cards offers-wrapper projects-search-results">
					{{-- @include ('includes/last_projects') --}}

					<div class="switch-view">
						<a href="?country={{ isset($country) ? $country : '' }}&status={{ isset($status) ? $status : '' }}&view=list" class="list @if(Request::input('view') !== 'map' && Request::input('view') !== 'grid') active @endif }}"></a>
						<a href="?country={{ isset($country) ? $country : '' }}&status={{ isset($status) ? $status : ''  }}&view=grid" class="grid {{ Request::input('view') == 'grid' ? 'active' : '' }}"></a>
						<a href="?country={{ isset($country) ? $country : '' }}&status={{ isset($status) ? $status : ''  }}&view=map" class="map {{ Request::input('view') == 'map' ? 'active' : '' }}"></a>
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
			  [{{$project->lat}}, {{$project->lng}}, '<img src="{{Request::root()}}/uploads/projects/big/{{$project->image}}"><a href="{!! action('MainController@show', $project->slug) !!}">{{$project->title}}</a>', '{{$project->title}}'],
			@endforeach
			];
	</script>
@endsection
