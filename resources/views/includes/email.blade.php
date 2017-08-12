<form class="subscribe-form" action="{{ action('MainController@email') }}" method="post">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<input type="text" placeholder="Имя">
	<input type="text" placeholder="E-mail" name="email">
	<textarea placeholder="Текст запроса"></textarea>
	<input type="submit" value="Получать уведомления">
</form>