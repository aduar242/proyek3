@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Data map
@endsection
@section('deskripsiPage')
    yang sudah terdaftar
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Konfirgurasi Aplikasi</div>
    <div class="panel-body">
        <!-- <form action="" class="form-horizontal" method="POST" role="form"> -->
            {!! Form::open(['method'=>'POST','class'=>'form-horizontal']) !!}
            @foreach($setting as $item)
            <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
                {!! Form::label('value', $item->nama, ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text($item->nama, $item->value, ['class' => 'form-control']) !!}
                    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @push('js')
    <script>
        var map = new GMaps({
          el: '#map',
          zoom: 10,
          lat: {{$latitude_centre}},
          lng: {{$longitude_centre}},
          click: function(e) {
            // alert('click');
            var latLng = e.latLng;
            console.log(latLng);
            var lat = $('#latitude_centre');
            var long = $('#longitude_centre');
    
            lat.val(latLng.lat());
            long.val(latLng.lng());
            map.removeMarkers();
            map.addMarker({
                lat: latLng.lat(),
                lng: latLng.lng(),
                title: 'Create Here',
                click: function(e) {
                    alert('You clicked in this marker');
                }
            });
    
        },
    });
    </script>
    @endpush
            @endforeach
            <div id="map"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}


        </div>
    </div>
@endsection