@extends('layouts.app')
@section('judulPage')
    Data edit client
@endsection
@section('deskripsiPage')
    melakukan pembaharuan data
@endsection
@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                @section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Map {{ $map->id }}</div>
    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::model($map, [
            'method' => 'POST',
            'url' => ['/map/edit', $map->id],
            'class' => 'form-horizontal',
            'files' => true
            ]) !!}

            @include ('maps.form', ['submitButtonText' => 'Update'])

            {!! Form::close() !!}

        </div>
    </div>
    @endsection
        </div>
    </div>
</div>
</div>
@endsection