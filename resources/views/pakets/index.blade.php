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
                    {{-- <div class="form-group">
                        <label for="name">ID paket</label>
                        <input name="id" id="id" placeholder="Contoh id paket : 1" type="number" class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input name="nama" id="nama" placeholder="Contoh paket : 1MB" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket</label>
                        <input name="harga" min="0" placeholder="Contoh harga : @currency("100000")" type="number" class="uang form-control {{ $errors->has('harga') ? 'is-invalid':'' }}">
                        {{-- <input name="harga" id="harga" placeholder="Contoh harga : 100000" type="string" class="uang form-control {{ $errors->has('harga') ? 'is-invalid':'' }}" onkeyup="convertToRupiah(this);"> --}}
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
                            @php $no = 1; @endphp
                            @foreach ($pakets as $paket)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$paket->nama}}</td>                                
                                <td>@currency($paket->harga)</td>
                                <td class="text-right">
                                    <form action="{{ route('paket.destroy', $paket->id) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('paket.edit', $paket->id) }}" 
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
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