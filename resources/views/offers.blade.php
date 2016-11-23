@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				{{-- <h2>{{ Request::is('offers') ? 'Предложения и акции' : 'Проекты' }}</h2> --}}
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page offers">
				<div class="cards offers-wrapper projects-search-results">
				@if(Request::is('offers'))
					@include ('includes/grid_offers')
				@else
					@include ('includes/grid_projects')
				@endif
				</div>
			</div>
		</div>
	</div>
@endsection
