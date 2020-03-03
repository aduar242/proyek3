<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-date icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    Menu utama
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-6 col-xl-3">
		<div class="card mb-3 widget-content bg-arielle-smile">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Client yang Aktif</div>
					<div class="widget-subheading">Client dengan Paket Aktif</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white">
					<?php
						$jum=0;
					?>
					<?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$now = date("Y-m-d");
						$tanggal = new DateTime($cl->masa_kadaluwarsa);
						$tanggal = $tanggal->format("Y-m-d");
						if($now<=$tanggal){
							$jum++;
						}
					?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<span><?php echo e($jum); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-3">
		<div class="card mb-3 widget-content bg-grow-early">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Client yang Non-Aktif</div>
					<div class="widget-subheading">Client dengan Paket Non-Aktif</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white">
					<?php
						$jum=0;
					?>
					<?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$now = date("Y-m-d");
						$tanggal = new DateTime($cl->masa_kadaluwarsa);
						$tanggal = $tanggal->format("Y-m-d");
						if($now>=$tanggal){
							$jum++;
						}
					?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<span><?php echo e($jum); ?></span></div>
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
					<div class="widget-numbers text-white"><span><?php echo e($transaksi); ?></span></div>
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
					<div class="widget-numbers text-white"><span><?php echo e($total); ?></span></div>
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
					<div class="widget-numbers text-white"><span><?php echo e("Rp ".$total_m); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-6">
		<div class="card mb-3 widget-content bg-grow-early">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Pendapatan</div>
					<div class="widget-subheading">Bulan Ini</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span><?php echo e("Rp ".$total_a); ?></span></div>
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
				<input id="token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<button style="float: right;" id="ingatkan" class="btn btn-primary btn-sm" type="button">Ingatkan</button>
			</div>
			<div class="table-responsive" style="padding: 20px">
				<table class="align-middle mb-0 table datatable" style="width: 100%;">
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
						<?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php 
							$date  = date("Y-m-d");
							$date  = date_create($date);
							$date1 = $cl->masa_kadaluwarsa;
							$date1 = date_create($date1);
							$diff  = date_diff($date,$date1);
							$hari  = $diff->format("%R%a");
							$hari  = preg_replace("/[^0-9]/","", $hari);
							?>
							<?php if($hari>=3): ?>
								<?php
								continue;
								?>
							<?php endif; ?>
						<tr>
							<td><?php echo e(1); ?></td>
							<td><?php echo e($cl->nama); ?></td>
							<td><?php echo e($cl->desa); ?></td>
							<td><?php echo e($cl->paket['nama']); ?></td>
							<td><?php echo e($cl->masa_kadaluwarsa); ?></td>
							<td>
								<a href="<?php echo e(route('extend',$cl->id)); ?>" id="PopoverCustomT-1" class="btn btn-success">Perpanjang</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ingatkan').click(function(){
        	$(this).html('Mengingatkan..');
        	var token = $("#token").val();
            $.ajax({
                type : "get",
                url  : "<?php echo route('ingatkan'); ?>",
                data : {_token:token},
                success:function(data){
                	alert(data);
                    $(this).html('Ingatkan');
                }
            });

     	});
     	$(".datatable").DataTable({
          "ordering":false
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/home.blade.php ENDPATH**/ ?>