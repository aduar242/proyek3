@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Laporan Keuangan
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
            	<h5 class="card-title">Laporan Keuangan</h5>
            	<div class="row">
                    <div class="col-md-3">
                        <select class="form-control" id="bulan">
                            <option value="00">Bulan Ini</option>
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
                    <!-- Table -->
            		<div class="col-md-2">
                        @php
                            $tahun = date("Y");
                        @endphp
            			<input style="max-width: 200px;" class="form-control date-picker" type="text" id="tahun" value="{{$tahun}}">
            		</div>
            		<div class="col-md-3">
            			<button class="btn btn-lg btn-primary" id="cari">Cari</button>
            			<button id="cetak" class="btn btn-lg btn-info">Cetak</button>
            		</div>
            	</div>
            	<br>
                <div class="table-responsive" style="width: 100%;">
                    <table class="mb-0 table datatable" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Paket</th>
                            <th>Total Transaksi</th>
                            <th>Sub total</th>
                        </tr>
                        </thead>
                        <tbody id="body-t">
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
                                    <td>@currency($subtotal)</td>
                                </tr>
                                @php $alltotal+=$subtotal; $no++; @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th id="t-foot">@currency($alltotal)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
            var th = $("#tahun").val();
            var bl = $("#bulan").val();
            var token = $("input[nama='_token']").val();
            $.ajax({
                type : "POST",
                url  : "<?php echo route('ubah.keu'); ?>",
                data : {
                    _token:token,
                    th:th,
                    bl:bl
                },
                success:function(data){
                    $("#body-t").html(data.tr);
                    $("#t-foot").html(data.alltotal);
                },
                error:function(data){
                    console.log(data);
                }
            });
        });

        $("#cetak").click(function(){
            var th = $("#tahun").val();
            var bl = $("#bulan").val();
            var token = $("input[nama='_token']").val();
            $.ajax({
                type : "post",
                url  : "<?php echo route('cetak.keu'); ?>",
                data : {
                    _token:token,
                    th:th,
                    bl:bl
                },
                success:function(data){
                    window.open(data);
                },
                error:function(data){
                    console.log(data);
                }
            });
        });

        $(".datatable").DataTable({
          "ordering":false
        });


    });
</script>
@endsection
