@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Data client
@endsection
@section('deskripsiPage')
    yang sudah terdaftar
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Simple table</h5>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Paket</th>
                        <th>Harga Paket</th>
                        <th>Masa Aktif</th>
                        <th>Masa Kadaluwar</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($clients as $client)
                    <tr>
                        <th scope="client">{{$no++}}</th>
                        <td>{{ ucfirst($client->nama)}}</td>
                        <td>{{$client->paket['nama']}}</td>
                        <td>@currency($client->paket['harga'])</td>
                        <td>{{$client->masa_aktif}}</td>
                        <td>{{$client->masa_kadaluwarsa}}</td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="{{ route('client.edit', $client->id) }}">  
                                <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                                </button>
                            </a>
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$client->id}}"><i class="pe-7s-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@php
    $invoice  = "TW";
    $invoice .= date("YmdHis"); 
@endphp
<div class="ui-theme-settings">
    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
        <i class="fa fa-plus fa-w-16 fa-2x"></i>
    </button>
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
                <h3 class="themeoptions-heading">Tambah Client
                </h3>
                <div class="p-3">
                    <div class="card-body">
                    <form class="" action="{{ route('client.store')}}" method="POST">
                        {{ csrf_field() }}
                            <div class="position-relative form-group"><label for="exampleNama" class="">Invoice</label><input readonly name="invoice" id="invoice" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('invoice') ? 'is-invalid':'' }}" value="{{ $invoice }}"></div>
                            <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="nama" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name="email" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampledeskripsi" class="">Deskripsi</label><input name="deskripsi" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Paket</label><select name="id_paket" id="id_paket" class="form-control" {{ $errors->has('id_paket') ? 'is-invalid':'' }}>
                                <option value="">Pilih :</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{$paket->id}}">{{ ucfirst($paket->nama) }} - @currency($paket->harga)</option>
                                @endforeach
                            </select></div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Kecamatan :</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control required" name="kecamatan" onchange="getval(this);">
                                        @foreach($kecamatan as $k)
                                            <option value="{{$k->nm_kecamatan}}">{{$k->nm_kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Desa/Kelurahan :</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control required" name="desa" id="desa">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <div id="map"></div>
                            </div>
                            <div hidden class="position-relative form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                                {!! Form::label('lat', 'Lat', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('lat', null, ['class' => 'form-control','id'=>'lat']) !!}
                                    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div hidden class="position-relative form-group {{ $errors->has('long') ? 'has-error' : ''}}">
                                {!! Form::label('long', 'Long', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('long', null, ['class' => 'form-control','id'=>'long']) !!}
                                    {!! $errors->first('long', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('no_rumah') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleMasaAktif" class="">Masa aktif</label><input name="masa_aktif" id="exampleMasaAktif" placeholder="with a placeholder" type="date" class="form-control {{ $errors->has('masa_aktif') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleMasaKadaluarsa" class="">Masa kadaluwarsa</label><input name="masa_kadaluwarsa" id="exampleMasaKadaluarsa" placeholder="with a placeholder" type="date" class="form-control {{ $errors->has('masa_kadaluwarsa') ? 'is-invalid':'' }}"></div>
                            <button class="mt-1 btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
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
<script>
    function getval(sel){
        var kecamatan = sel.value;
        $.ajax({
            type:'GET',
            url:"{{url('a')}}/"+kecamatan,
            success:function(data){
                var kelurahan ='';
                var panjangdata = data[0].length;
                for (var index = 0; index < panjangdata; index++) {
                    kelurahan+=`<option value="${data[0][index].nm_desa}">${data[0][index].nm_desa}</option>`; 
                //   console.log(data[0][index].id_desa);
                document.getElementById("desa").innerHTML =kelurahan;
                }
                // console.log(data);
            }
        });
        console.log(kecamatan);
    }
    
</script>   
@endsection
@extends('clients.modal')