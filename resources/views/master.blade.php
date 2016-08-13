<html>
<head>
    <title> @yield('title') </title>
    <link href="{{ asset('/css/admin_style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->

    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">

</head>
<body>

@include('admin.navbar')

@yield('content')
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="{{ asset('/js/dropzone.js') }}"></script>

<script type="text/javascript">
    var $createAdForm = $('.form-horizontal');
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file",
        maxFilesize: 20,
        addRemoveLinks: true,
        accept: function(file, done) {
            done();
            
        },
        success: function(data){
            var fileName = JSON.parse(data.xhr.responseText);
            console.log(data)
            var dataAttrs = ' data-name="' + data.name +'" data-lastmod="' + data.lastModified + '" ';
            $createAdForm.append('<input type="hidden" name="images[]" '+ dataAttrs +' value="'+ fileName +'">')
        },
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    };
</script>

<script type="text/javascript">
    var $createAdForm = $('.form-horizontal');
    Dropzone.options.myDropzone = {
        paramName: "file",
        maxFilesize: 20,
        addRemoveLinks: true,
        accept: function(file, done) {
            done();
            
        },
        success: function(data){
            var planName = JSON.parse(data.xhr.responseText);
            console.log(data)
            var dataAttrs = ' data-name="' + data.name +'" data-lastmod="' + data.lastModified + '" ';
            $createAdForm.append('<input type="hidden" name="plans[]" '+ dataAttrs +' value="'+ planName +'">')
        },
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    };
</script>

<script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
<script>
        var editor = CKEDITOR.replace( 'editor1' );
</script>

</body>

</html>