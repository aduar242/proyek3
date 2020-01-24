<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-date icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Analisa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    analisa data pemasukan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
	<!-- <div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-midnight-bloom">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Total Client</div>
					<div class="widget-subheading">total client yang aktif</div>
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span><?php echo e($client); ?></span></div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
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
	</div> -->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="main-card mb-3 card">
			$date1 = new DateTime('2020-01-26')
			$date = date('Y-m-d')
			$diff = date_diff($date1,$date)
			<div class="card-header">Client Yang Masa Aktif Paket Akan Habis <?php echo e($diff); ?></div>
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
						<?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
						<?php if($cek): ?>

						<?php endif; ?>
						<tr>
							<td></td>
							<td>Juan</td>
							<td>Kalensari</td>
							<td>2 MB</td>
							<td>20 Februari 2020</td>
							<td>
								<button type="button" id="PopoverCustomT-3" class="btn btn-success btn-sm">Perpanjang</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/home.blade.php ENDPATH**/ ?>