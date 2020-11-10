@extends('layouts.app')
@section('judulPage')
    Data edit Paket
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <form action="{{ route('client.update', $pakets->id) }}"  method="POST" enctype="multipart/form-data">
                    {{-- @php
                        dd($clients);
                    @endphp --}}
                    <input type="hidden" name="_method" value="POST">
                    {{ csrf_field() }}
                        <div class="position-relative form-group"><label for="nama" class="">Nama</label><input name="nama" id="nama" value="{{ $pakets->nama }}" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="harga" class="">Harga</label><input name="harga" id="harga" value="{{ $pakets->harga }}" type="number" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}"></div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="{{ route('paket')}}" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    </form>
        </div>
    </div>
</div>
</div>
@endsection