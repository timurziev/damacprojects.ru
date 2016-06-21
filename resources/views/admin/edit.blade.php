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
                    <legend>Обновить проект</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Заголовок</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" placeholder="Заголовок" name="title" value="{!! $project->title !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Описание</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="2" id="text" name="description">{!! $project->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Текст</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" id="editor1" name="text">{!! $project->text !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="city">
                                <option disabled selected>Выберите город</option>   
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}"
                                    @if ($location->id == $project->location_id)
                                        selected
                                    @endif
                                        >{{ $location->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                        {{ Request::input('city') }}
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Видео</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка для вставки" name="media" value="{!! $project->media !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Сооружение</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="facilities" value="{!! $project->facilities !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Дополнительная информация</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="community_info" value="{!! $project->community_info !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Обновления</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="update" value="{!! $project->update !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Cкачать PDF</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка на скачивание PDF файла" name="download_pdf" value="{!! $project->download_pdf !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Просмотреть PDF</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Ссылка на PDF файл" name="view_pdf" value="{!! $project->view_pdf !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Выберите статус</label>
                        <div class="col-lg-10">
                            <label><input type="radio" name="status" value="1" class="jq-checkbox"><span class="in_text">Завершено</span></label>
                            <label><input type="radio" name="status" value="2" class="jq-checkbox" checked><span class="in_text">В процессе</span></label>
                        </div>
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
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-warning">Назад</button>
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection