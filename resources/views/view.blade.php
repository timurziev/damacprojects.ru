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
						<li><a href="{{ $project->view_pdf }}" target="_blank">Скачать документ проекта</a></li>
						<li><a href="{{ $project->download_pdf }}" target="_blank">Скачать брошюру</a></li>
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
					@if ($project->facilities || $project->community_info || $plans->count() || $updates->count())
					<div class="tab-info">
						<ul class="tab-nav">
						    @if ($project->facilities) <li class="active" id="tab1">Удобства</li>  @endif
							@if ($plans->count()) <li class="{{!$project->facilities ? 'active' : ''}}" id="tab2">Планировка этажей</li> @endif
							@if ($project->community_info) <li class="{{!$project->facilities && !$plans->count() ? 'active' : ''}}" id="tab3">Дополнительная информация</li> @endif
							@if ($updates->count()) <li class="{{!$plans->count() && !$project->facilities && !$project->community_info ? 'active' : ''}}" id="tab4">Ход строительства</li> @endif
						</ul>
						@if ($project->facilities)
							<div id="tbi1" class="tab-inner active">
								{!! $project->facilities !!}
							</div>
						@endif
						@if ($plans->count())
							<div id="tbi2" class="tab-inner {{!$project->facilities ? 'active' : ''}}">
								<div class="fotorama" data-width="100%" data-navposition="top">
									@foreach ($plans as $plan)
											<a href=""><img class="plans" src="{{ Request::root() }}/uploads/plans/{{ $plan->name }}"></a>
									@endforeach
								</div>
							</div>
						@endif
						@if ($project->community_info)
							<div id="tbi3" class="tab-inner {{!$project->facilities && !$plans->count() ? 'active' : ''}}">
								{!! $project->community_info !!}
							</div>
						@endif
						@if ($updates->count())
							<div id="tbi4" class="tab-inner {{!$plans->count() && !$project->facilities && !$project->community_info ? 'active' : ''}}">
								<div class="fotorama" data-width="100%" data-navposition="top">
									@foreach ($updates as $update)
											<a href=""><img class="plans" src="{{ Request::root() }}/uploads/updates/{{ $update->name }}"></a>
									@endforeach
								</div>
							</div>
						@endif
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
