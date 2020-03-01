@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Pelayanan
@endsection
@section('deskripsiPage')
    Pelanggan
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
            	<h5 class="card-title">Pelayanan</h5>
            	<br>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Masa Aktif</th>
                        <th>Masa Kadaluwarsa</th>
                        <th>Pilihan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($client as $cl)
                        <tr>
                            <td>{{$cl->nama}}</td>
                            <td>{{$cl->paket->nama}}</td>
                            <td>{{$cl->masa_aktif}}</td>
                            <td>{{$cl->masa_kadaluwarsa}}</td>
                            <td>
                                <a href="{{ route('extend',$cl->id)}}" class="btn btn-sm btn-primary">Perpanjang</a>
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

@section('script')
<script type="text/javascript">
$(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });       


    });
</script>
@endsection
