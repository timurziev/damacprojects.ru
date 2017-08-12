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
					<h2>Наши проекты</h2>
					<div class="line"></div>
				</div>
				<div class="cards center">
					@include('includes/main_projects')
				</div>
					@include ('includes/pagination')
			</div>
		</div>
	</div>
@endsection