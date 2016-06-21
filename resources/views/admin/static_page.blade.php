@extends('master')
@section('title', 'Все проекты')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> @if(Request::is('about_dam')) О Damac @elseif(Request::is('dam_proj')) Проекты Damac @elseif(Request::is('offers_dam')) Предложения @elseif(Request::is('investor')) Инвесторам  @endif </h2>
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
               @foreach ($static_pages as $static_page)
               <tr>
                    <td>{{ $static_page->id }} </td>
                    <td><a href="{!! action('AdminController@edit_page', $static_page->slug) !!}">{!! $static_page->title !!} </a> </td>
                    <td>{!! $static_page->text !!}</td>
                    <td><form method="post" action="{!! action('AdminController@destroy_static', $static_page->slug) !!}" class="pull-left">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <button type="submit" class="btn btn-warning">Удалить</button>
                    </form></td>
                </tr>
               @endforeach
            </table>
        </div>
    </div>
@endsection