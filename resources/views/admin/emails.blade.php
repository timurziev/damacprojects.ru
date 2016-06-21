@extends('master')
@section('title', 'Все адреса')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <table class="table">
                            <thead>
                                <tr>
                                    <th>Почта</th>
                                </tr>
                            </thead>
               @foreach ($emails as $email)
               <tr>
                    <td>{{ $email->email }} </td>
                </tr>
               @endforeach
            </table>
        </div>
        @include ('includes/pagination')
    </div>
@endsection