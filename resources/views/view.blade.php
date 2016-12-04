@extends ('layout')
@section('content')


<div class="content">
		<div class="title-banner" style="background-image: url(../img/investor_relations.jpg);">
			<div class="wrapper">
				<h2>{{ $project->title}}</h2>
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
						<li><a href="{{ $project->view_pdf }}">Скачать документ проекта</a></li>
						<li><a href="{{ $project->download_pdf }}">Скачать брошюру</a></li>
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
							data-fit="cover"
							data-thumbwidth="185"
							data-thumbheight="100"
						>
							@foreach ($images as $item)
									<a href=""><img src="{{ Request::root() }}/uploads/projects/big/{{ $item->name }}"></a>
							@endforeach
						</div>
					</div>
					<script>
					  var lat = {{$project->lat}};
					  var lng = {{$project->lng}};
					  var content = '<img src="{{Request::root()}}/uploads/projects/big/{{$project->image}}">p>{{$project->title}}</p>';
					  var title = '{{$project->title}}';
					</script>
					<div class="project-location">
						<div class="city">{!! $project->city->name !!}</div>
						<a href="#" class="show-map">Показать на карте</a>
					</div>
					{!! $project->text !!}
					@if (empty($project->media) == false)
						<p><iframe width="815" height="611" src="{!! $project->media !!}" frameborder="0" allowfullscreen></iframe></p>
					@endif
					<div class="tab-info">
						<ul class="tab-nav">
							<li class="active" id="tab1">Удобства</li>
							<li id="tab2">Планировка этажей</li>
							<li id="tab3">Дополнительная информация</li>
							<li id="tab4">Ход строительства</li>
						</ul>
						<div id="tbi1" class="tab-inner active">
							{!! $project->facilities !!}
						</div>
						<div id="tbi2" class="tab-inner">
							<div class="fotorama" data-width="100%" data-navposition="top">
								@foreach ($plans as $plan)
										<a href=""><img class="plans" src="{{ Request::root() }}/uploads/plans/{{ $plan->name }}"></a>
								@endforeach
							</div>
						</div>
						<div id="tbi3" class="tab-inner">
							{!! $project->community_info !!}
						</div>
						<div id="tbi4" class="tab-inner">
							{!! $project->update !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
