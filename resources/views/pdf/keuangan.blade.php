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
                <th>Paket</th>
                <th>Total Transaksi</th>
                <th>Sub total</th>
			</tr>
		</thead>
		<tbody>
			@php $no=1; $alltotal=0;@endphp
            @foreach($paket as $p)
                @php $total =0; @endphp
                @foreach($client as $c)
                    @php
                    if($p->id==$c->id_paket){
                        $total++;
                    }
                    @endphp
                @endforeach
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$total}}</td>
                    @php $subtotal = $total*$p->harga @endphp
                    <td>{{"Rp ".$subtotal}}</td>
                </tr>
                @php $alltotal+=$subtotal; $no++; @endphp
            @endforeach
		</tbody>
		<tfoot>
	        <tr>
	            <th colspan="3">Total</th>
	            <th id="t-foot">{{"Rp ".$alltotal}}</th>
	        </tr>
	    </tfoot>
	</table>
 
</body>
</html>