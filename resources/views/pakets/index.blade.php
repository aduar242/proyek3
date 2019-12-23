@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Data paket
@endsection
@section('deskripsiPage')
    managemen data paket
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Tambah paket</h3>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('paket.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input type="text" name="nama" class="form-control " id="nama">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket</label>
                        <input type="number" name="harga" class="form-control " id="harga">
                    </div>
                    <button class="mt-1 btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">List Paket</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama paket</td>
                                <td>Harga</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakets as $paket)
                            <tr>
                                <td>1</td>
                                <td>{{$paket->nama}}</td>
                                <td>{{$paket->harga}}</td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href=""
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection