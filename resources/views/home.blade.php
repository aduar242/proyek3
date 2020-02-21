@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-date icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Dashboard
@endsection
@section('deskripsiPage')
    Menu utama
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
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			<div style="padding: 20px;">
				<h6 style="float: left;">Client Yang Masa Aktif Paket Akan Habis</h6>
				<button style="float: right;" id="ingatkan" class="btn btn-primary btn-sm" type="button">Ingatkan</button>
			</div>
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
							<?php 
							$date  = date("Y-m-d");
							$date  = date_create($date);
							$date1 = $cl->masa_kadaluwarsa;
							$date1 = date_create($date1);
							$diff  = date_diff($date,$date1);
							$hari  = $diff->format("%R%a");
							$hari  = preg_replace("/[^0-9]/","", $hari);
							?>
							@if($hari>=3)
								<?php
								continue;
								?>
							@endif
						<tr>
							<td>{{ 1 }}</td>
							<td>{{ $cl->nama }}</td>
							<td>{{ $cl->desa }}</td>
							<td>{{ $cl->paket['nama'] }}</td>
							<td>{{ $cl->masa_kadaluwarsa }}</td>
							<td>
								<a href="{{ route('extend',$cl->id)}}" id="PopoverCustomT-1" class="btn btn-success">Perpanjang</a>
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

        $('#ingatkan').click(function(){
            $.ajax({
                type : "get",
                url  : "<?php echo route('ingatkan'); ?>",
                success:function(data){
                    alert(data);
                }
            });

     	});

    });
</script>
@endsection