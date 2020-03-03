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
		<h5>{{$data}}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
	            <th>Invoice</th>
	            <th>Tanggal Transaksi</th>
	            <th>Paket</th>
	            <th>Masa Aktif</th>
	            <th>Masa Kadaluwarsa</th>
			</tr>
		</thead>
		<tbody>
			@php
            $no = 1;
            @endphp
            @foreach($laporan as $lap)
            <tr>
                <td>{{$no}}</td>
                <td>{{$lap->invoice}}</td>
                @php
                    $tanggal = new DateTime($lap->created_at);
                    $tanggal = $tanggal->Format("d-m-Y");
                @endphp
                <td>{{$tanggal}}</td>
                <td>{{$lap->paket->nama}}</td>
                <td>{{$lap->masa_aktif}}</td>
                <td>{{$lap->masa_kadaluwarsa}}</td>
            </tr>
            @php
            $no++;
            @endphp
            @endforeach
		</tbody>
	</table>
 
</body>
</html>