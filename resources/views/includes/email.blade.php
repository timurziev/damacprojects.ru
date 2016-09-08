<form class="subscribe-form" action="{{ action('MainController@email') }}" method="post">
	{!! csrf_field() !!}
	@if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(Request::is('project/*'))
		<input type="hidden" value="{{ $project->id }}" name="project_id">
	@else
		<input type="hidden" value="{{ $event->id }}" name="event_id">
	@endif
	<input type="text" placeholder="Имя" name="name" required>
	<input type="text" placeholder="E-mail" name="email" required>
	<textarea placeholder="Текст запроса" name="text"></textarea>
	<input type="submit" value="Получать уведомления">
</form>