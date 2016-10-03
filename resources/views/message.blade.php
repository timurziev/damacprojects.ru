@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/message.jpg);">
			<div class="wrapper">
				{{-- <h2>Слово председателя</h2> --}}
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="content-left-block">
					<div class="left-col">
					<p>Корни DAMAC Properties 'лежат в проектировании и строительстве элитного жилья. В то время как это остается в сердце того, что делает наша компания, так как компания росла, мы передали наши навыки дополняющих друг друга предложений, которые включают в себя фирменную недвижимость, гостеприимство и обслуживаемые апартаменты гостиницы. Общим для всех наших разработок является акцент на качество и роскошь.</p>
					<p>Наши брендированные партнерства в сфере недвижимости - с некоторыми из самых эксклюзивных и желаемых мировых брендов, таких как Versace, Paramount Hotels & Resorts, Fendi, Tiger Woods Design и Bugatti - подчеркивают силу бренда DAMAC свойств по горизонтали и за пределами Дубая.</p>
					<p>Поскольку мы продолжаем строить и поставлять новые, знаковых событий в нашем внутреннем рынке Дубая, мы также постепенно диверсификации на другие рынки, где мы можем копируют наши проверенные бизнес-модели. Мы сосредоточились на экспорте модели DAMAC Properties в другие страны, которые разделяют привлекательные основы и потенциал для устойчивого роста в долгосрочной перспективе. На сегодняшний день мы расширили след Компании включить Катар, Саудовская Аравия, Иордания и Ливан.</p>
					<p>Я с нетерпением жду, чтобы строить дальше по нашей области знаний, чтобы продолжать помогать нашим клиентам оживить свои мечты о роскошной жизни.</p>
					<p style="text-align: right; font-style: italic;"><strong>Hussain Sajwani</strong></p>
				</div>
				</div>
				<div class="right-col">
					<div class="text-header">
						<h2>О DAMAC</h2>
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
