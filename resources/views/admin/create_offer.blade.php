@extends('master')
@section('title', 'Новое предложение')

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
                    <legend>Новое предложение</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="title" @if(Request::is('edit_offer/*'))value="{!! $offer->title !!}"@endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Описание</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="2" id="text" name="description">@if(Request::is('edit_offer/*')){!! $offer->description !!}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Расположение</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="1" id="text" name="location">@if(Request::is('edit_offer/*')){!! $offer->location !!}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="editor1" name="text">@if(Request::is('edit_offer/*')){!! $offer->text !!}@endif</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Карта</label>
                        <div class="col-lg-10">
                        <input type="text" id="searchmap" class="form-control">
                            <div id="map-canvas" class="col-lg-10"></div>
                        </div>
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                    </div>

                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Изображения</label>
                        <div class="col-lg-10">
                            <div action="{{ Request::root() }}/upload" class="dropzone" id="my-awesome-dropzone">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Видео</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка для вставки" name="media" @if(Request::is('edit_offer/*'))value="{!! $offer->media !!}"@endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Cкачать PDF</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка на скачивание PDF файла" name="download_pdf" @if(Request::is('edit_offer/*'))value="{!! $offer->download_pdf !!}"@endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Просмотреть PDF</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка на PDF файл" name="view_pdf" @if(Request::is('edit_offer/*'))value="{!! $offer->view_pdf !!}"@endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <!-- <button class="btn btn-default">Назад</button> -->
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                    @if(Request::is('edit_offer/*'))
                        <div class="form-group">
                            @if (empty($images[0]) === false )
                                <label for="content" class="col-lg-2 control-label">Изображения</label>
                            @endif
                            <div class="col-lg-10">
                                @foreach ($images as $image)
                                    <form method="post" action="{!! action('AdminController@destroy_offer_image', $image->id) !!}" class="pull-left"> 
                                        @if($offer->id == $image->offer_id)
                                            <a href=""><img src="{{ Request::root() }}/uploads/projects/big/{{ $image->name }}"><button type="submit" class="button button-warning">x</button></a>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @endif 
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </fieldset>
            </form>
        </div>
    </div>
@endsection