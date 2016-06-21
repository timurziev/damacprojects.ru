@extends('master')
@section('title', 'Новая страница')

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
                    <legend>Новая страница</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="title" @if(Request::is('edit_page/*')) value="{{ $static_page->title }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="editor1" name="text">@if(Request::is('edit_page/*')){!! $static_page->text !!} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="page">
                                <option disabled selected>Выберите главную страницу</option>   
                                @foreach ($main_pages as $main_page)
                                    <option value="{{ $main_page->id }}"
                                    @if(Request::is('edit_page/*')) 
                                        @if ($main_page->id == $static_page->main_page_id)
                                            selected
                                        @endif
                                    @endif
                                        >{{ $main_page->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Назад</button>
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection