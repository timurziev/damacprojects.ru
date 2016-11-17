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
                        <input type="text"  id="searchmap" class="form-control">
                        <input type="text"  id="searchmap2" class="form-control">
                        <input type="text"  id="searchmap3" class="form-control">
                        <input type="text"  id="searchmap4" class="form-control">
                        <input type="text"  id="searchmap5" class="form-control">
                            <div id="map-canvas-event" class="col-lg-10"></div>
                            
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <input type="hidden" name="lat2" id="lat2">
                        <input type="hidden" name="lng2" id="lng2">
                        <input type="hidden" name="lat3" id="lat3">
                        <input type="hidden" name="lng3" id="lng3">
                        <input type="hidden" name="lat4" id="lat4">
                        <input type="hidden" name="lng4" id="lng4">
                        <input type="hidden" name="lat5" id="lat5">
                        <input type="hidden" name="lng5" id="lng5">
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