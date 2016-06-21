<html>
<head>
    <title> @yield('title') </title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->

    <link href="{{ asset('/css/admin_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">

</head>
<body>

@include('admin.navbar')

@yield('content')


<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="{{ asset('/js/dropzone.js') }}"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
 
<script type="text/javascript">
    var baseUrl = "{{ url('/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#my-awesome-dropzone", {
        url: baseUrl + "/upload",
        params: {
            _token: token
        }
    });
    var $createAdForm = $('.form-horizontal');
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file",
        maxFilesize: 20,
        addRemoveLinks: true,
        accept: function(file, done) {
            done();
        },
        success: function(data){
            var images = JSON.parse(data.xhr.response)
            var dataAttrs = ' data-name="' + data.name +'" data-lastmod="' + data.lastModified + '" ';
            $createAdForm.append('<input type="hidden" name="images[]" '+ dataAttrs +' value="'+ images +'">')
        },
        // success: function(file, response){
        //     var files = JSON.parse(data.xhr.response)
        //     $createAdForm.append($('<input type="hidden" name="files[]" value="'+ response.fileName  +'">'))
        // },
    };
</script>
<!-- <script type="text/javascript">
    var baseUrl = "{{ url('/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#my-awesome-dropzone", {
        url: baseUrl + "/upload",
        params: {
            _token: token
        }
    });
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        accept: function(file, done) {

        },
    };
</script> -->

<script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
<script>
        var editor = CKEDITOR.replace( 'editor1' );
</script>

</body>

</html>