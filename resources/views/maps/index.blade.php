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
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
            <a href="{{ route('map.create')}}">
                    <button class="mb-2 mr-2 btn btn-success">Tambah data</button>
                </a>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Lat</th>
                        <th>Long</th>
                        <th>Created At</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($maps as $map)
                    <tr>
                        <th scope="map">{{$no++}}</th>
                        <td>{{ ucfirst($map->nama)}}</td>                        
                        <td>{{$map->lat}}</td>
                        <td>{{$map->long}}</td>
                        <td>{{$map->created_at}}</td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="{{ route('map.edit', $map->id) }}">  
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
                            <p class="mb-0">Anda yakin ingin menghapus data ini {{$map->id}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <form action="{{ route('map.destroy', $map->id) }}" method="POST">
                                {{ method_field('delete') }}
                                @csrf
                                <a href="{{ route('map.destroy', $map->id) }}">
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
