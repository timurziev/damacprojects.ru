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
                    <legend>Изменение пользовательских данных</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Пароль</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="password">
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