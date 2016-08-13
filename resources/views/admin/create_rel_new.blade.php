@extends('master')
@section('title', 'Новый проект')

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
                    <legend>@if (Request::is('create_rel'))
                                    Новый пресс-релиз
                            @elseif (Request::is('create_novel'))
                                Добавить новость</legend>
                            @endif
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="title" @if (Request::is('edit_new/*'))
                                    value="{{ $novelty->title }}" @elseif (Request::is('edit_rel/*'))
                                    value="{{ $release->title }}" @endif >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="editor1" name="text">@if (Request::is('edit_new/*')) {!! $novelty->text !!} @elseif (Request::is('edit_rel/*')) {!! $release->text !!} @endif</textarea>
                        </div>
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