@extends ('layout')
@section('content')
<div class="content">
		<div class="title-banner" style="background-image: url(img/investor_relations.jpg);">
			<div class="wrapper">
				<h2>Инвестирование</h2>
			</div>
		</div>
		<div class="wrapper">
			<div class="single-page">
				<div class="content-left-block">
					<div class="left-col">
						<p>Как лидер развития элитной недвижимости в Дубае, считает, в предоставлении четкой, последовательной и прозрачной информации, относящейся к организации. Таким образом, компания имеет подразделение опытного связям с инвесторами, посвященную поддержанию акционеров обоснованных путем своевременного обновления на деятельности Общества. Раздел по связям с инвесторами предоставляет соответствующую информацию о DAMAC Properties финансовые отчеты, последние новости и инвесторами деятельности. Кроме того, данные о том, как связаться с командой по связям с инвесторами Компании включены.</p>
					</div>
				</div>
				<div class="right-col">
					<div class="text-header">
						<h2>Информация</h2>
						<p class="inf">Агентство «SHEIKH RE» сотрудничает исключительно с узким кругом строительных компаний, которые на сегодняшний день являются финансово устойчивыми и менее рискованными для инвестиций. Мы прилагаем все усилия для того, чтобы наш клиент чувствовал себя уверенно и комфортно.
						</p>
					</div>
					<ul class="right-col-menu">
						@foreach ($static_pages as $static_page)
							@if ($static_page->main_page_id == 4)
								<li><a href="{!! action('MainController@show_page', $static_page->slug) !!}">{!! $static_page->title !!}</a></li>
							@endif
						@endforeach
					</ul>
					<div class="text-header">
						<h2>Доля</h2>
					</div>
					<div class="right-col-contacts">
						<iframe id="euroland_iframe" height="390px" width="100%" scrolling="No" frameborder="0" src="//tools.euroland.com/tools/ticker/scrolling/?companycode=ae-damac&amp;v=new&amp;lang=en-GB"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
