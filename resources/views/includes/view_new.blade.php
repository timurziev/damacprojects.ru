<div class="rel-view">
		<img src="{{ Request::root() }}/uploads/media/big/{{ $novelty->image }}" alt="">
		<h3>{{ $novelty->title }}</h3>
		<div class="date">{{ date('d F, Y', strtotime($novelty->created_at)) }}</div>
		<p>{!! $novelty->text !!}</p>
</div>