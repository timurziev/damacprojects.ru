<form class="subscribe-form" action="{{ action('MainController@email') }}" method="post">
	{!! csrf_field() !!}
	@if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(Request::is('project/*'))
		<input type="hidden" value="{{ $project->title }}" name="project_title">
	@elseif(Request::is('event/*'))
		<input type="hidden" value="{{ $event->title }}" name="event_title">
	@elseif(Request::is('offer/*'))
		<input type="hidden" value="{{ $offer->title }}" name="offer_title">
	@endif
	<input type="text" placeholder="Имя" name="name" required>
	<input type="text" placeholder="E-mail" name="email" required>
	<textarea placeholder="Текст запроса" name="text"></textarea>
	<input type="submit" value="Получать уведомления">
</form>