@extends ('layout')
@section('content')


<div class="content">
		<div class="title-banner" style="background-image: url(../img/investor_relations.jpg);">
			<div class="wrapper">
				 <h2>{{ $offer->title}}</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="content-left-block">
				<div class="right-col">
					<div class="text-header">
						<h2>Документация</h2>
					</div>
					<ul class="right-col-menu">
						<li><a href="{{ $offer->view_pdf }}" target="_blank">Скачать документ проекта</a></li>
						<li><a href="{{ $offer->download_pdf }}" target="_blank">Скачать брошюру</a></li>
					</ul>
					<div class="text-header">
						<h2>Узнать о проекте</h2>
					</div>
					@include('includes/email')
				</div>
				<div class="left-col">
					<div class="page-slider">
						<div class="fotorama" 
							data-nav="thumbs" 
							data-thumbmargin="25"
							data-width="100%"
							data-thumbwidth="185"
							data-thumbheight="100"
						>
							@foreach ($images as $item)
									<a href=""><img src="{{ Request::root() }}/uploads/projects/source/{{ $item->name }}"></a>
							@endforeach
						</div>
					</div>
					<script>
					  var lat = {{$offer->lat}};
					  var lng = {{$offer->lng}};
					  var content = '<img src="{{Request::root()}}/uploads/offers/big/{{$offer->image}}">p>{{$offer->title}}</p>';
					  var title = '{{$offer->title}}';
					</script>
					<div class="project-location">
						<div class="city">{!! $offer->location !!}</div>
						<a href="#" class="show-map">Показать на карте</a>
					</div>
					{!! $offer->text !!}
					@if (empty($offer->media) == false)
						<p><iframe width="815" height="611" src="{!! $offer->media !!}" frameborder="0" allowfullscreen></iframe></p>
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
