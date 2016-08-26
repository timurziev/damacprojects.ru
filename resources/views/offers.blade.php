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
						<a href="?view=list" class="list active"></a>
						<a href="?view=grid" class="grid"></a>
						<a href="?view=map" class="map"></a>
					</div>

					{{-- LIST VIEW --}}
					@include ('includes/list_projects')

					{{-- GRID VIEW --}}
					{{-- @include ('includes/grid_projects') --}}

					{{-- MAP VIEW --}}
					{{-- @include ('includes/map_projects') --}}
				</div>
		    	@include ('includes/pagination')
			</div>
		</div>
	</div>
@endsection
