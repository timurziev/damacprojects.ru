@extends('master')
@section('title', 'Новый город')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Новый город</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-1 control-label">Город</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="city">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1">
                            <button class="btn btn-default">Назад</button>
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <br>
            <div class="panel-heading">
                <legend> Города </legend>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                </tr>
                            </thead>
               @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{!! $location->name !!}</td>
                        <td><form method="post" action="{!! action('AdminController@destroy_city', $location->slug) !!}" class="pull-left">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <button type="submit" class="btn btn-warning">Удалить</button>
                        </form></td>
                    </tr>
               @endforeach
            </table>
        </div>
        @include ('includes/pagination')
    </div>
@endsection