@extends('layouts.app')
@section('judulPage')
    Data edit client
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <form action="{{ route('client.update', $clients->id) }}"  method="POST" enctype="multipart/form-data">
                    {{-- @php
                        dd($clients);
                    @endphp --}};
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                        <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="exampleNama" value="{{ $clients->nama }}" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleText" class="">Deskripsi</label><input name="deskripsi" id="exampledeskripsi" value="{{ $clients->deskripsi }}" type="string" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="examplePaket" class="">Desa</label><input name="desa" id="exampleDesa" value="{{ $clients->desa }}" type="string" class="form-control {{ $errors->has('desa') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" value="{{ $clients->kecamatan }}" type="string" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="lat" id="exampleKecamatan" value="{{ $clients->lat }}" type="string" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group">
                            <div id="map"></div>
                        </div>
                        <div class="position-relative form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                            {!! Form::label('lat', 'Lat', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('$clients->desa', null, ['class' => 'form-control','id'=>'lat']) !!}
                                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="position-relative form-group {{ $errors->has('long') ? 'has-error' : ''}}">
                            {!! Form::label('long', 'Long', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('long', null, ['class' => 'form-control','id'=>'long']) !!}
                                {!! $errors->first('long', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" value="{{ $clients->no_rumah }}" type="string" class="form-control {{ $errors->has('no_rumah') ? 'is-invalid':'' }}"></div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="{{ route('client')}}" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    </form>
        </div>
    </div>
</div>
</div>
<script>
    var map = new GMaps({
      el: '#map',
      zoom: {{$set_zoom}},
      lat: {{$latitude_centre}},
      lng: {{$longitude_centre}},
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        console.log(latLng);
        var lat = $('#lat');
        var long = $('#long');

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
@endsection