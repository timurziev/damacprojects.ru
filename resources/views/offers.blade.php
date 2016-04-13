@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/offers.jpg);">
			<div class="wrapper">
				<h2>Предложения и акции</h2>
			</div>
		</div>
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