@extends('master')
@section('title', 'Все проекты')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Предложения </h2>
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
                                    <th>Описание</th>
                                </tr>
                            </thead>
               @foreach ($offers as $offer)
               <tr>
                    <td>{{ $offer->id }} </td>
                    <td><a href="{!! action('AdminController@edit_offer', $offer->slug) !!}">{!! $offer->title !!} </a> </td>
                    <td>{{ $offer->description }}</td>
                    <td><form method="post" action="{!! action('AdminController@destroy_offer', $offer->slug) !!}" class="pull-left">
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