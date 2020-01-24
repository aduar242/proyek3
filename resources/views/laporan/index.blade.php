@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Laporan Pelanggan
@endsection
@section('deskripsiPage')
    Per bulan
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
            	<h5 class="card-title">Laporan Pelanggan</h5>
            	<div class="row">
            		<div class="col-md-3">
            			<select class="form-control">
		            		<option>January</option>
		            	</select>
            		</div>
            		<div class="col-md-3">
            			<button class="btn btn-lg btn-primary">Cari</button>
            			<button class="btn btn-lg btn-info">Cetak</button>
            		</div>
            	</div>
            	<br>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Desa</th>
                        <th>Paket</th>
                        <th>Masa Aktif</th>
                        <th>Masa Kadaluwar</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $lap)
                        <tr>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
