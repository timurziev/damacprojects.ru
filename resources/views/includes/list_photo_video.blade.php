<div class="photo-video-list">
	@foreach($projects as $project)
		@if(Request::is('media_center/photo_gallery'))
			<div class="item">
					<div class="img">
						<img src="{{ URL::asset('/uploads/projects/small/') }}/{{$project->image}}" alt="">
						<a href="{{ action('MainController@show_img', $project->slug) }}" class="overlay"><span>Показать</span></a>
					</div>
					<div class="short">
						<a href="{{ action('MainController@show_img', $project->slug) }}" class="title">{{$project->title}}</a>
						<span class="info">{{$images->where('project_id', $project->id)->count()}} фото - {{ date('d.m.Y', strtotime($project->created_at)) }}</span>
					</div>
			</div>
		@elseif(Request::is('media_center/video_gallery'))
			@if(!empty($project->media))
				<div class="item">
						<div class="img">
							<iframe width="350" height="350" src="{{ $project->media }}" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="short">
							<span class="title">{{$project->title}}</span>
						</div>
				</div>
			@endif
		@endif
	@endforeach
</div>