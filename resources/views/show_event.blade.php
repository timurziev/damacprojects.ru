@extends ('layout')
@section('content')


<div class="content">
	<div class="title-banner" style="background-image: url(../img/investor_relations.jpg);">
		<div class="wrapper">
			{{-- <h2>{{ $event->title}}</h2> --}}
		</div>
	</div>
	<div class="wrapper">
		<div class="single-page">
			<div class="right-col">
				<div class="text-header">
					<h2>Узнать о мероприятии</h2>
				</div>
				@include('includes/email')
			</div>
			<div class="left-col">
					<a href=""><img class="event-thumbnail" src="{{ Request::root() }}/uploads/media/big/{{ $event->image }}"></a>
				<script>
				  var locations = [
					@foreach($event_locations as $location)
					  [{{$location->lat}}, {{$location->lng}}],
					@endforeach
					];
				</script>
				<div class="project-location">
					<div class="city">{{ $event->location }}</div>
					<a href="#" class="show-map-event">Показать на карте</a>
				</div>
				<p>{!! $event->text !!}</p>
			</div>
		</div>
	</div>
</div>

@endsection