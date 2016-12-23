<html>
<head>
    <title> @yield('title') </title>
    <link href="{{ asset('/css/admin_style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">

    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->

    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">
</head>
<body>

@include('admin.navbar')

@yield('content')
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script async="" src="{{ URL::asset('js/scripts.js') }}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
  type="text/javascript"></script>

<script src="{{ asset('/js/dropzone.js') }}"></script>
<script type="text/javascript" src="/js/trix.js"></script>

<!--upload multiple images-->
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

<!--upload multiple plans-->
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

<!--upload multiple updates-->
<script type="text/javascript">
    var $createAdForm = $('.form-horizontal');
    Dropzone.options.myUpdateDropzone = {
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
            $createAdForm.append('<input type="hidden" name="updates[]" '+ dataAttrs +' value="'+ fileName +'">')
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
<!--create map-->
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat: 25.17,
            lng: 55.27
        },
        zoom:10
    });
    var marker = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    google.maps.event.addListener(marker,'position_changed',function(){
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>

<!--create event map-->
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas-event'),{
        center:{
            lat: 25.17,
            lng: 55.27
        },
        zoom:10
    });
    var marker = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });
    var marker2 = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });
    var marker3 = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });
    var marker4 = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });
    var marker5 = new google.maps.Marker({
        position: {
            lat: 25.17,
            lng: 55.27
        },
        map: map,
        draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    var searchBox2 = new google.maps.places.SearchBox(document.getElementById('searchmap2'));
    google.maps.event.addListener(searchBox2,'places_changed',function(){
        var places = searchBox2.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker2.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    var searchBox3 = new google.maps.places.SearchBox(document.getElementById('searchmap3'));
    google.maps.event.addListener(searchBox3,'places_changed',function(){
        var places = searchBox3.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker3.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    var searchBox4 = new google.maps.places.SearchBox(document.getElementById('searchmap4'));
    google.maps.event.addListener(searchBox4,'places_changed',function(){
        var places = searchBox4.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker4.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    var searchBox5 = new google.maps.places.SearchBox(document.getElementById('searchmap5'));
    google.maps.event.addListener(searchBox5,'places_changed',function(){
        var places = searchBox5.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker5.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    google.maps.event.addListener(marker,'position_changed',function(){
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
    google.maps.event.addListener(marker2,'position_changed',function(){
        var lat = marker2.getPosition().lat();
        var lng = marker2.getPosition().lng();
        $('#lat2').val(lat);
        $('#lng2').val(lng);
    });
    google.maps.event.addListener(marker3,'position_changed',function(){
        var lat = marker3.getPosition().lat();
        var lng = marker3.getPosition().lng();
        $('#lat3').val(lat);
        $('#lng3').val(lng);
    });
    google.maps.event.addListener(marker4,'position_changed',function(){
        var lat = marker4.getPosition().lat();
        var lng = marker4.getPosition().lng();
        $('#lat4').val(lat);
        $('#lng4').val(lng);
    });
    google.maps.event.addListener(marker5,'position_changed',function(){
        var lat = marker5.getPosition().lat();
        var lng = marker5.getPosition().lng();
        $('#lat5').val(lat);
        $('#lng5').val(lng);
    });
</script>

<!--edit map-->
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas-edit'),{
    center:{
      lat: lati,
      lng: lngi
    },
    zoom: 10
    });
    var marker = new google.maps.Marker({
    position:{
      lat:lati,
      lng: lngi
    },
    map: map,
    draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap_edit'));
    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(10);
    });
    google.maps.event.addListener(marker,'position_changed',function(){
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>

</body>

</html>