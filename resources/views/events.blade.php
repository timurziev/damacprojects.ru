@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/events.jpg);">
			<div class="wrapper">
				<h2>Мероприятия</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page events">
				<div class="section-title">
					<h2>Предстоящие мероприятия</h2>
					<div class="line"></div>
				</div>
				<p class="lid">Вы пропустили интересное мероприятие? Не волнуйтесь, в ближайшее время предстоит еще не одно мероприятие. Укажите свои данные в форму ниже и вы будете получать уведомления о новых акциях и мероприятиях компании.</p>
				<form class="subscribe-form" action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" name="name" placeholder="Имя">
					<input type="text" name="email" placeholder="E-mail">
					<input type="submit" value="Получать уведомления">
				</form>
			</div>
		</div>
	</div>
@endsection