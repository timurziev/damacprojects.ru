@extends('master')
@section('title', 'Все проекты')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Пресс-релизы </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Содержание</th>
                                </tr>
                            </thead>
               @foreach ($releases as $release)
               <tr>
                    <td>{{ $release->id }} </td>
                    <td><a href="{!! action('AdminController@edit_rel', $release->slug) !!}">{!! $release->title !!} </a> </td>
                    <td>{!!  Str::words($release->text, $words = 35, $end = '...') !!}</td>
                    <td><form method="post" action="{!! action('AdminController@destroy_rel', $release->slug) !!}" class="pull-left">
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