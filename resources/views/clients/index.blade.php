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
                        <td>{{$client->masa_aktif}}</td>
                        <td>{{$client->masa_kadaluwarsa}}</td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="{{ route('client.edit', $client->id) }}">  
                                <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                                </button>
                            </a>
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @section('modalHapus')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data ini akan di hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Anda yakin ingin menghapus data ini {{$client->id}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                {{ method_field('delete') }}
                                @csrf
                                <a href="{{ route('client.destroy', $client->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </form>
                            
                        </div>
                    </div>
                    @endsection
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
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
                            <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="nama" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampledeskripsi" class="">Deskripsi</label><input name="deskripsi" id="nama" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Paket</label><select name="id_paket" id="id_paket" class="form-control" {{ $errors->has('id_paket') ? 'is-invalid':'' }}>
                                <option value="">Pilih :</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{$paket->id}}">{{ ucfirst($paket->nama) }}</option>
                                @endforeach
                            </select></div>
                            <div class="position-relative form-group"><label for="exampleDesa" class="">Desa</label><input name="desa" id="exampleDesa" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('desa') ? 'is-invalid':'' }}"></div>
                            <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" placeholder="with a placeholder" type="string" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid':'' }}"></div>
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
@endsection
