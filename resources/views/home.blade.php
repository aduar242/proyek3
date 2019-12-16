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
	<div class="col-md-6 col-xl-4">
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
	</div>
	<div class="d-xl-none d-lg-block col-md-6 col-xl-4">
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
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div class="card-header">Active Users
				<div class="btn-actions-pane-right">
					<div role="group" class="btn-group-sm btn-group">
						<button class="active btn btn-focus">Last Week</button>
						<button class="btn btn-focus">All Month</button>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					You are logged in!!
			</div>
			<div class="d-block text-center card-footer">
				<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
				<button class="btn-wide btn btn-success">Save</button>
			</div>
		</div>
	</div>
</div>
@endsection