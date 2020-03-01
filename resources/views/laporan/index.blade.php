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
            	<h5 class="card-title">Laporan Transaksi</h5>
            	<div class="row">
                    <div class="col-md-3">
                        <select class="form-control" id="bulan">
                            <option>Bulan Ini</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>

                        </select>
                    </div>
            		<div class="col-md-2">
            			<input style="max-width: 200px;" class="form-control date-picker" type="text" id="tahun" placeholder="Tahun">
            		</div>
            		<div class="col-md-3">
            			<button class="btn btn-lg btn-primary" id="cari">Cari</button>
            			<button class="btn btn-lg btn-info">Cetak</button>
            		</div>
            	</div>
            	<br>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal Transaksi</th>
                        <th>Paket</th>
                        <th>Masa Aktif</th>
                        <th>Masa Kadaluwarsa</th>
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

@section('script')
<script type="text/javascript">
$(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.date-picker').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });

        $("#cari").click(function(){
            var id = $("#tahun").val();
            $("#cari").html(id);
        });


    });
</script>
@endsection
