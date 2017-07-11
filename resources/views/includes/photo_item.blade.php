<div class="photo-video-item">
		<div class="images">
			<ul>
				@foreach($images as $key => $image)
					<li class="{{ ($key+1) % 3 == 0 ? 'last' : ''}}"><a href="{{ Request::root() }}/uploads/projects/big/{{ $image->name }}" data-lightbox="roadtrip"><img src="{{ Request::root() }}/uploads/projects/small/{{ $image->name }}" alt=""></a></li>
				@endforeach
			</ul>
		</div>
</div>