@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Paket
@endsection
@section('deskripsiPage')
    Perpanjang Paket
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="tab-pane tabs-animation" id="tab-content-1" role="tabpanel">
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Grid</h5>
        @foreach($client as $cl)
        <form class="">
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control">
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="examplePassword" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                    <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleSelect" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <select name="select" id="exampleSelect" class="form-control"></select>
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-secondary">Perpanjang</button>
                </div>
            </div>
        </form>
        @endforeach
        </div>
    </div>
</div>
@endsection
