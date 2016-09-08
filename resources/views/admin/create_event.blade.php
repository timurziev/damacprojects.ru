@extends('master')
@section('title', 'Новое мероприятие')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">

            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>@if (Request::is('create_event')) Добавить мероприятие @else Обновить мероприятие @endif</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" required name="title" @if (Request::is('edit_event/*')) value="{!! $event->title !!}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="editor1" name="text">@if (Request::is('edit_event/*')) {!! $event->text !!} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Место проведения</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" required name="location" @if (Request::is('edit_event/*')) value="{!! $event->location !!}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Время мероприятия</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="time" required @if (Request::is('edit_event/*')) value="{!! $event->time !!}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Карта</label>
                        <div class="col-lg-10">
                        @if (Request::is('edit_event/*'))
                            <script>
                                var lati = {{ $event->lat }};
                                var lngi = {{ $event->lng }};
                            </script>
                        @endif
                        @if (Request::is('create_event'))
                        <input type="text"  id="searchmap" class="form-control">
                            <div id="map-canvas" class="col-lg-10"></div>
                        @else 
                        <input type="text" id="searchmap_edit" class="form-control">
                            <div id="map-canvas-edit" class="col-lg-10"></div>
                        </div>
                        @endif
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                    </div>
                    <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Изображение</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection