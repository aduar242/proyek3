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
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                        <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="exampleNama" value="{{ $pakets->nama }}" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                        <div class="position-relative form-group"><label for="exampleHarga" class="">Harga</label><input name="harga" id="exampleNama" value="{{ $pakets->harga }}" type="number" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}"></div>
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