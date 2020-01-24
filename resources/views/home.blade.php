@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-date icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Analisa
@endsection
@section('deskripsiPage')
    analisa data pemasukan
@endsection
@section('content')
<div class="row">
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-arielle-smile">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total client yang bayar</div>
					<div class="widget-subheading">Januari 2019</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>Rp. 1.000.000</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-grow-early">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total client yang belum bayar</div>
					<div class="widget-subheading">Januari 2019</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>Rp. 1.000.000</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-grow-early">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Pemasukan</div>
					<div class="widget-subheading">Januari 2019</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>Rp. 2.000.000</span></div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-midnight-bloom">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Client</div>
					<div class="widget-subheading">total client yang aktif</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>{{$client}}</span></div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-premium-dark">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Products Sold</div>
					<div class="widget-subheading">Revenue streams</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-warning"><span>$14M</span></div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			$date1 = date_create('2020-01-26')
			$date = date('Y-m-d')
			$diff = date_diff($date1,$date)
			<div class="card-header">Client Yang Masa Aktif Paket Akan Habis {{ $diff }}</div>
			<div class="table-responsive">
				<table class="align-middle mb-0 table table-borderless table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Client</th>
							<th>Desa</th>
							<th>Paket</th>
							<th>Tanggal Kadaluarsa</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($client as $cl)
						
						@if($cek)

						@endif
						<tr>
							<td></td>
							<td>Juan</td>
							<td>Kalensari</td>
							<td>2 MB</td>
							<td>20 Februari 2020</td>
							<td>
								<button type="button" id="PopoverCustomT-3" class="btn btn-success btn-sm">Perpanjang</button>
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