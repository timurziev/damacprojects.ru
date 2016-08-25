<form class="subscribe-form" action="{{ action('MainController@email') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{ $project->id }}" name="project_id">
	<input type="text" placeholder="Имя" name="name">
	<input type="text" placeholder="E-mail" name="email">
	<textarea placeholder="Текст запроса" name="text"></textarea>
	<input type="submit" value="Получать уведомления" onclick="alert('Запрос отправлен')">
</form>