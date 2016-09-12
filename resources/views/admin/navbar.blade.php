<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Панель администратора</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ URL::to('/admin') }}">Проекты</a></li>
                <li class="{{ Request::is('create') ? 'active' : '' }}"><a href="{{ URL::to('/create') }}">Создать проект <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Медиа центр <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- <li class="{{ Request::is('press_rel') ? 'active' : '' }}"><a href="{{ URL::to('/press_rel') }}">Пресс-релизы</a></li> -->
                        <li class="{{ Request::is('novel') ? 'active' : '' }}"><a href="{{ URL::to('/novel') }}">Новости</a></li>
                        <li class="{{ Request::is('event') ? 'active' : '' }}"><a href="{{ URL::to('/event') }}">Мероприятия</a></li>
                        <li class="divider"></li>
                        <!-- <li class="{{ Request::is('create_rel') ? 'active' : '' }}"><a href="{{ URL::to('/create_rel') }}">Создать пресс-релиз</a></li> -->
                        <li class="{{ Request::is('create_novel') ? 'active' : '' }}"><a href="{{ URL::to('/create_novel') }}">Создать новость</a></li>
                        <li class="{{ Request::is('create_event') ? 'active' : '' }}"><a href="{{ URL::to('/create_event') }}">Создать мероприятие</a></li>
                    </ul>
                </li>
                <!-- <li class="{{ Request::is('add_city') ? 'active' : '' }}"><a href="{{ URL::to('/create_city') }}">Добавить город</a></li> -->
                <li class="dropdown">
                    <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Страницы <span class="caret"></span></a>  --> 
                    <ul class="dropdown-menu" role="menu">
                        <li class="{{ Request::is('about_dam') ? 'active' : '' }}"><a href="{{ URL::to('/about_dam') }}?page=1">O Sheikh</a></li>
                        <li class="{{ Request::is('dam_proj') ? 'active' : '' }}"><a href="{{ URL::to('/dam_proj') }}?page=2">Проекты Sheikh</a></li>
                        <li class="{{ Request::is('offers_dam') ? 'active' : '' }}"><a href="{{ URL::to('/offers_dam') }}?page=3">Предложения</a></li>
                        <li class="{{ Request::is('investor') ? 'active' : '' }}"><a href="{{ URL::to('/investor') }}?page=4">Инвесторам</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('create_page') ? 'active' : '' }}"><a href="{{ URL::to('/create_page') }}">Создать страницу <span class="sr-only"></span></a></li>
                <li class="{{ Request::is('emails') ? 'active' : '' }}"><a href="{{ URL::to('/emails') }}">Адреса email <span class="sr-only"></span></a></li>
            </ul>
            <!-- <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form> -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Админ <span class="caret"></span></a>  
                    <ul class="dropdown-menu" role="menu">
                        <li class="{{ Request::is('change_log') ? 'active' : '' }}"><a href="{!! action('UsersController@change_view') !!}">Сменить логин и пароль</a></li>
                        <li><a href="{{ URL::to('/') }}">На сайт</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>