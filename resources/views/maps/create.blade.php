@extends('layouts.app')
@section('judulPage')
    Data edit client
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="panel panel-default">                    
                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        {!! Form::open(['url' => '/map', 'class' => 'form-horizontal', 'files' => true]) !!}
                
                        @include ('maps.form')
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection