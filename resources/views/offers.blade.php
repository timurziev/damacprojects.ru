@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				<h2>{{ Request::is('offers') ? 'Предложения и акции' : 'Проекты' }}</h2>
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
						<a href="?view=list" class="list {{ Request::input('view') == 'list' ? 'active' : '' }}"></a>
						<a href="?view=grid" class="grid {{ Request::input('view') == 'grid' ? 'active' : '' }}"></a>
						<a href="?view=map" class="map {{ Request::input('view') == 'map' ? 'active' : '' }}"></a>
					</div>
					
					 @if(Request::input('view') == 'list')
						@include ('includes/list_projects');
					@elseif (Request::input('view') == 'grid')
						@include ('includes/grid_projects');
					@elseif (Request::input('view') == 'map')
						@include ('includes/map_projects');
					@else 
						@include ('includes/list_projects');
					@endif

				</div>
		    	@include ('includes/pagination')
			</div>
		</div>
	</div>
@endsection