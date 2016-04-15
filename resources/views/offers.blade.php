@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				<h2>{{ Request::is('offers') ? 'Предложения и акции' : 'Проекты' }}</h2>
			</div>
		</div>
		@if (Request::is('search')) 
			 @include('includes/simple_search') 
		@endif
		<div class="wrapper">
			<div class="single-page offers">
				<div class="cards offers-wrapper">
					@include ('includes/last_projects')
				</div>
		    	@include ('includes/pagination')
			</div>
		</div>
	</div>
@endsection