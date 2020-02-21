<html>
<head>
	<title>ToleWifi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Transaksi Pembelian Paket Berhasil</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama </th>
				<th>Invoice</th>
				<th>Paket</th>
				<th>Masa Aktif</th>
				<th>Masa Kadaluarsa</th>
			</tr>
		</thead>
		<tbody>
			@php
				$no = 1;
			@endphp
			@foreach($client as $cl)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$cl->client['nama']}}</td>
				<td>{{$cl->invoice}}</td>
				<td>{{$cl->paket['nama']}}</td>
				<td>{{$cl->masa_aktif}}</td>
				<td>{{$cl->masa_kadaluwarsa}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>