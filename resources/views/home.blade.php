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
    <div class="col-md-6 col-xl-3">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Client yang Aktif</div>
                    <div class="widget-subheading">Paket Aktif</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white">
                        @php
                        $jum=0;
                        @endphp
                        @foreach($client as $cl)
                        @php
                        $now = date("Y-m-d");
                        $tanggal = new DateTime($cl->masa_kadaluwarsa);
                        $tanggal = $tanggal->format("Y-m-d");
                        if($now<=$tanggal){ $jum++; } @endphp @endforeach <span>{{$jum}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Client yang Non-Aktif</div>
                    <div class="widget-subheading">Paket Non-Aktif</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white">
                        @php
                        $jum=0;
                        @endphp
                        @foreach($client as $cl)
                        @php
                        $now = date("Y-m-d");
                        $tanggal = new DateTime($cl->masa_kadaluwarsa);
                        $tanggal = $tanggal->format("Y-m-d");
                        if($now>=$tanggal){
                        $jum++;
                        }
                        @endphp
                        @endforeach
                        <span>{{$jum}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Transaksi</div>
                    <div class="widget-subheading">Bulan Ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{$transaksi}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Transaksi</div>
                    <div class="widget-subheading">Semua Transaksi</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{$total}}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pendapatan</div>
                    <div class="widget-subheading">Bulan Ini</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>@currency($total_m)</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Pendapatan</div>
                    <div class="widget-subheading">Semua Transaksi</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>@currency($total_a)</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            {{-- <div style="padding: 20px;">
                <h6 style="float: left;">Client Yang Masa Aktif Paket Akan Habis</h6>
                <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                <button style="float: right;" id="ingatkan" class="btn btn-primary btn-sm"
                    type="button">Ingatkan</button>
            </div> --}}
            <div class="table-responsive" style="padding: 20px">
                <table class="align-middle mb-0 table datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Client</th>
                            <th>Desa</th>
                            <th>Paket</th>
                            <th>Harga Paket</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
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
                            <td>{{ $no }}</td>
                            <td>{{ $cl->nama }}</td>
                            <td>{{ $cl->desa }}</td>
                            <td>{{ $cl->paket['nama'] }}</td>
                            <td>@currency($cl->paket['harga'])</td>
                            <td>{{ $cl->masa_kadaluwarsa }}</td>
                            <td>
                                <a href="{{ route('extend',$cl->id)}}" id="PopoverCustomT-1"
                                    class="btn btn-success">Perpanjang</a>
                            </td>
                        </tr>
                        @php $no++; @endphp
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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ingatkan').click(function () {
            // $(this).html('Mengingatkan..');
            var token = $("#token").val();
            $.ajax({
                type: "get",
                url: "<?php echo route('ingatkan'); ?>",
                data: {
                    _token: token
                },
                success: function (data) {
                    $(this).html('Ingatkan');
                    alert(data);
                }
            });

        });
        $(".datatable").DataTable({
            "ordering": false
        });

    });

</script>
@endsection
