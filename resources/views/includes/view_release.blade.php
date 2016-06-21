<div class="rel-view">
		<img src="{{ Request::root() }}/uploads/media/big/{{ $release->image }}" alt="">
		<h3>{{ $release->title }}</h3>
		<div class="date">{{ date('d F, Y', strtotime($release->created_at)) }}</div>
		<p>{!! $release->text !!}</p>
</div>
