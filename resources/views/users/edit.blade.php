@extends('layouts.app')
@section('judulPage')
    Data Edit User
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
                    {{-- @php
                        dd($data);
                    @endphp --}}
                    {{ csrf_field() }}
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Nama</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Email</label>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Password</label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Confirm Password</label>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Role</label>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                        </div>

                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="{{ route('user')}}" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endsection