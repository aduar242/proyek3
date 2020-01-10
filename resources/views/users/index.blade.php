@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Data Users
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>                        
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($data as $user)
                    <tr>
                        <th scope="user">{{$no++}}</th>
                        <td>{{ ucfirst($user->name)}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="{{ route('user.edit',$user->id) }}">  
                                <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                                </button>
                            </a>
                            {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'mb-1 mr-1 btn-transition btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-trash"></i> Hapus
                            </button>
                            @section('modalHapus')
                                {{$user->id}}
                            @endsection
                        </td>
                    </tr>
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
                <h3 class="themeoptions-heading">Tambah User
                </h3>
                <div class="p-3">
                    <div class="card-body">
                    {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
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
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                            <button class="mt-1 btn btn-primary">Simpan</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
