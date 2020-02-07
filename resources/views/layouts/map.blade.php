<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aplikasi Marker</title>
    <script src="http://maps.google.com/maps/api/js?key={{$gmaps_api_key}}"></script>
    <script src="js/gmaps.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></style>
    <style type="text/css">
        #map {

          width: 100%;
          height: 100vh;
      }
      .cari{
        position: absolute;
        z-index: 1000;
        top: 53px;
        left: 200px;
    }

    /* Small devices (tablets, 768px and up) */
    @media (max-width: 360px) {
        .cari{
         position: absolute;
         z-index: 1000;
         top: 120px;
         left: 26px;
     }
 }
 .gmaps{
    position: absolute;
    z-index: 999;
    margin: 13px;
    right: 50px;
}
.modal-content {
    position: relative;
    background-color: #ffffffc9;
    border: 1px solid #999;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
    outline: 0;
}
</style>
</head>
<body>
    <a class="gmaps" href="{{ route('home')}}">
        <button type="button" tabindex="0" class="mb-1 mr-1 btn-transition btn btn-outline-primary">
            Dashboard
        </button>
        </a>
    <div class="container-fluid">
        @yield('content')

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var map = new GMaps({
          el: '#map',
          zoom: {{$set_zoom}},
          lat: {{ $latitude_centre }},
          lng: {{ $longitude_centre }}
      });

        @foreach($data as $d)
        map.addMarker({
            lat: '{{$d->lat}}',
            lng: '{{$d->long}}',
            title: '{{$d->nama}} #',
            icon: 'img/coba.png',
            infoWindow: {
                content : '<h3>{{$d->nama}}</h3><p>{{$d->description}}</p><p>{{$d->no_telp}}</p>'
            }
        });
        @endforeach
    </script>

    @stack('js')
</body>
</html>