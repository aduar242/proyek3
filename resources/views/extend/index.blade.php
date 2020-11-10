@extends('layouts.app')
@section('iconPage')
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
@endsection
@section('judulPage')
    Paket
@endsection
@section('deskripsiPage')
    Perpanjang Paket
@endsection
{{-- Modal hapus --}}
{{-- END Modal hapus --}}
@section('content')
<div class="tab-pane tabs-animation" id="tab-content-1" role="tabpanel">
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Form Perpanjang Paket</h5>
        @foreach($client as $cl)
        <form action="{{ route('extend.update')}}" method="post">
            {{ csrf_field() }}
            <div class="position-relative row form-group">
                <label for="exampleEmail" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="{{$cl->id}}">
                    <input name="nama" id="exampleEmail" placeholder="with a placeholder" type="text" class="form-control" value="{{ $cl->nama}}">
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="examplePassword" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                    <select name="paket" class="form-control" id="paket">
                        @foreach($paket as $pk)
                            @if($cl->id_paket==$pk->id)
                                <option value="{{ $pk->id }}" selected>{{ $pk->nama }}</option>
                            @else
                                <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                            @endif
                        
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="exampleSelect" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    @foreach($paket as $pk)
                        @if($cl->id_paket==$pk->id)
                            <input class="form-control" type="number" name="harga" id="harga" value="{{$pk->harga}}" readonly>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="position-relative row form-check">
                <div class="offset-sm-2">
                    <button class="btn btn-primary">Perpanjang</button>
                </div>
            </div>
        </form>
        @endforeach
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

        $("#paket").change(function(){
            var id = $(this).val();
            var token = $("input[nama='_token']").val();
            $.ajax({
                type : "post",
                url  : "<?php echo route('harga'); ?>",
                data : {id:id,_token:token},
                success:function(data){
                    $("#harga").val(data);
                }
            });
        });

    });
</script>
@endsection