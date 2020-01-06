@extends('layouts.app')
@section('judulPage')
    Data edit Role
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
                    {{-- @php
                        dd($clients);
                    @endphp --}}
                    {{ csrf_field() }}                    
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Nama Role</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Permission :</label><br>
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}            
                            {{ $value->name }}</label>            
                        <br/>
                        @endforeach
                        </div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="{{ route('role')}}" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endsection