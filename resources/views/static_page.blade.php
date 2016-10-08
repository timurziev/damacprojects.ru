@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(../img/investor_relations.jpg);">
			<div class="wrapper">
				{{-- <h2>{{ $static_page->title }}</h2> --}}
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="content-left-block">
					<div class="left-col">
						{!! $static_page->text !!}
					</div>
				</div>
				<div class="right-col">
					<div class="text-header">
					@foreach ($main_pages as $main_page)
						@if ($main_page->id == $static_page->main_page_id)
							<h2>{{ $main_page->name }}</h2>
						@endif
					@endforeach
					</div>
					<ul class="right-col-menu">
						@foreach ($static_pages as $page)
							@if ($page->main_page_id == $static_page->main_page_id)
								<li><a href="{!! action('MainController@show_page', $page->slug) !!}">{!! $page->title !!}</a></li>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
