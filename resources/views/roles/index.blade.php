@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Data Roles
@endsection
@section('deskripsiPage')
    managemen data Role
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Tambah Role</h3>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'role.store','method'=>'POST')) !!}
                    {{ csrf_field() }}
                    {{-- <div class="form-group">
                        <label for="name">ID role</label>
                        <input name="id" id="id" placeholder="Contoh id role : 1" type="number" class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="name">Nama role</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Permission :</label><br>
                        @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                    @endforeach
                        {{-- <input name="harga" id="harga" placeholder="Contoh harga : 100000" type="string" class="uang form-control {{ $errors->has('harga') ? 'is-invalid':'' }}" onkeyup="convertToRupiah(this);"> --}}
                    </div>
                    <button class="mt-1 btn btn-primary">Simpan</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">List Role</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama role</td>
                                <td class="text-right">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$role->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection