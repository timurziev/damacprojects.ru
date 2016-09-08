@extends('master')
@section('title', 'Новый проект')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
        <fieldset>
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
                            <select class="form-control" name="country">
                                <option disabled selected>Выберите страну</option>   
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                    @if ($country->id == $project->country_id)
                                        selected
                                    @endif
                                        >{{ $country->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                        {{ Request::input('country') }}
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="city">
                                <option disabled selected>Выберите город</option>   
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                    @if ($city->id == $project->city_id)
                                        selected
                                    @endif
                                        >{{ $city->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                        {{ Request::input('city') }}
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="region">
                                <option disabled selected>Выберите район</option>   
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}"
                                    @if ($region->id == $project->region_id)
                                        selected
                                    @endif
                                        >{{ $region->name }}</option>
                                @endforeach 
                            </select>
                        </div>
                        {{ Request::input('region') }}
                    </div>

                    <script>
                        var lati = {{$project->lat}};
                        var lngi = {{$project->lng}};
                    </script>   
                    
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Карта</label>
                        <div class="col-lg-10">
                        <input type="text" id="searchmap_edit" class="form-control">
                            <div id="map-canvas-edit" class="col-lg-10"></div>
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
                            <label><input type="radio" name="status" value="1" class="jq-checkbox" @if(1 == $project->category_id) checked @endif><span class="in_text">Завершено</span></label>
                            <label><input type="radio" name="status" value="2" class="jq-checkbox" @if(2 == $project->category_id) checked @endif><span class="in_text">В процессе</span></label>
                            <label><input type="checkbox" value="1" name="is_slide" @if($project->is_slide) checked @endif><span class="in_text">Вывод в слайдер</span></label>
                            <label><input type="checkbox" value="1" name="is_popular" @if($project->is_popular) checked @endif><span class="in_text">В центре внимания</span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Планы этажей</label>
                        <div class="col-lg-10">
                            <div action="{{ Request::root() }}/upload_plans" class="dropzone" id="my-dropzone">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary" id ="submit-form">Отправить</button>
                        </div>
                    </div>
                    </form> 
                    <div class="form-group">
                        @if (empty($images[0]) === false )
                            <label for="content" class="col-lg-2 control-label">Изображения</label>
                        @endif
                        <div class="col-lg-10">
                            @foreach ($images as $image)
                                <form method="post" action="{!! action('AdminController@destroy_image', $image->id) !!}" class="pull-left"> 
                                    @if($project->id == $image->project_id)
                                        <a href=""><img src="{{ Request::root() }}/uploads/projects/big/{{ $image->name }}"><button type="submit" class="button button-warning">x</button></a>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif 
                                </form>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        @if (empty($plans[0]) === false )
                            <label for="content" class="col-lg-2 control-label">Планы этажей</label>
                        @endif
                        <div class="col-lg-10">
                            @foreach ($plans as $plan)
                                <form method="post" action="{!! action('AdminController@destroy_plan', $plan->id) !!}" class="pull-left"> 
                                    @if($project->id == $plan->project_id)
                                        <a href=""><img src="{{ Request::root() }}/uploads/plans/{{ $plan->name }}"><button type="submit" class="button button-warning">x</button></a>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @endif 
                                </form>
                            @endforeach
                        </div>
                    </div>
                </fieldset>
        </div>
    </div>
@endsection