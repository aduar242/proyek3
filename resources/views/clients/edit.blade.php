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
                    @endphp --}}
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                        <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="exampleNama" value="{{ $clients->nama }}" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleText" class="">Deskripsi</label><textarea name="deskripsi" id="exampleText" value="{{ $clients->deskripsi }}"  class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></textarea></div>
                        <div class="position-relative form-group"><label for="examplePaket" class="">Desa</label><input name="desa" id="exampleDesa" value="{{ $clients->desa }}" type="string" class="form-control {{ $errors->has('desa') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" value="{{ $clients->kecamatan }}" type="string" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" value="{{ $clients->no_rumah }}" type="string" class="form-control {{ $errors->has('no_rumah') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="examplePaket" class="">Paket</label><input name="paket" id="examplePaket" value="{{ $clients->paket }}" type="string" class="form-control {{ $errors->has('paket') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleMasaAktif" class="">Masa aktif</label><input name="masa_aktif" id="exampleMasaAktif" value="{{ $clients->masa_aktif }}" type="date" class="form-control {{ $errors->has('masa_aktif') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleMasaKadaluarsa" class="">Masa kadaluwarsa</label><input name="masa_kadaluwarsa" id="exampleMasaKadaluarsa" value="{{ $clients->masa_kadaluwarsa }}" type="date" class="form-control {{ $errors->has('masa_kadaluwarsa') ? 'is-invalid':'' }}"></div>
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
@endsection