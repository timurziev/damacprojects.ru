@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/team.jpg);">
			<div class="wrapper">
				{{-- <h2>Управляющая команда</h2> --}}
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="content-left-block">
					<div class="left-col">
					<div class="lid">Опытные члены команды DAMAC Properties имеют значительный опыт работы в сфере недвижимости и строительной отрасли.</div>
					<div class="management">
						<div class="manager" data-image="uploads/team/1.jpg" data-text="Хуссейн Сайвани основал DAMAC группу в 1992 году и служил в качестве председателя с момента его создания в его нынешнем виде с 2002 года. Будучи одним из пионеров расширения рынка недвижимости Дубая, г-н Sajwani построил и продал несколько отелей в середине 1990-х годов для удовлетворения растущего притока людей в страну для целей бизнеса и торговли. После способствовало росту DAMAC с самого начала, в октябре 2011 года по инициативе г-н Sajwani, тха DAMAC Group запустила свое гостеприимство подразделение, которое в конечном счете обеспечит сделанные на заказ услуги жителям в более чем 13000 роскошных фирменных апартаментов и вилл в проектах DAMAC, в настоящее время в стадии разработки, Г-н Sajwani получил степень бакалавра гуманитарных наук по экономике в Университете штата Вашингтон в Соединенных Штатах.">
							<a href="">
								<img src="uploads/team/1.jpg" alt="">
								<span class="read-popup">Подробнее</span>
							</a>
							<h4>Mr Hussain Sajwani</h4>
							<span class="job">Председатель</span>
						</div>
						<div class="manager" data-image="uploads/team/2.jpg" data-text="После способствовало росту DAMAC с самого начала, в октябре 2011 года по инициативе г-н Sajwani, тха DAMAC Group запустила свое гостеприимство подразделение, которое в конечном счете обеспечит сделанные на заказ услуги жителям в более чем 13000 роскошных фирменных апартаментов и вилл в проектах DAMAC, в настоящее время в стадии разработки, Г-н Sajwani получил степень бакалавра гуманитарных наук по экономике в Университете штата Вашингтон в Соединенных Штатах.">
							<a href="">
								<img src="uploads/team/2.jpg" alt="">
								<span class="read-popup">Подробнее</span>
							</a>
							<h4>Mr Niall McLoughlin</h4>
							<span class="job">Вице президент по маркетингу</span>
						</div>
						<div class="manager">
							<a href="">
								<img src="uploads/team/1.jpg" alt="">
								<span class="read-popup">Подробнее</span>
							</a>
							<h4>Mr Hussain Sajwani</h4>
							<span class="job">Председатель</span>
						</div>
						<div class="manager">
							<a href="">
								<img src="uploads/team/1.jpg" alt="">
								<span class="read-popup">Подробнее</span>
							</a>
							<h4>Mr Hussain Sajwani</h4>
							<span class="job">Председатель</span>
						</div>
					</div>
				</div>
				</div>
				<div class="right-col">
					<div class="text-header">
						<h2>О SHEIKH</h2>
					</div>
					<ul class="right-col-menu">
						<li><a class="{{ Request::is('message') ? 'active' : '' }}" href="{{ URL::to('/message') }}">Слово председателя</a></li>
						<li><a class="{{ Request::is('team') ? 'active' : '' }}" href="{{ URL::to('/team') }}">Управляющая компания</a></li>
						@foreach ($static_pages as $page)
							@if ($page->main_page_id == $static_page->main_page_id)
								<li><a href="{!! action('MainController@show_page', $page->slug) !!}">{!! $page->title !!}</a></li>
							@endif
						@endforeach
					</ul>
					<div class="text-header">
						<h2>Контакты</h2>
					</div>
					<div class="right-col-contacts">
						<p>Телефон: <strong>+7 928 123 45 67</strong></p>
						<p>Е-mail: <strong>info@damac.ru</strong></p>
						<p>Факс: <strong>+7 928 123 45 67</strong></p>
						<p>Адрес: <strong>г.Москва, ул. Магасовская 06</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
