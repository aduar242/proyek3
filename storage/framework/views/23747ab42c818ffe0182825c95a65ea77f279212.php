<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Data paket
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    managemen data paket
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Tambah paket</h3>
            </div>
            <div class="card-body">
                <form class="" action="<?php echo e(route('paket.store')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input name="nama" id="nama" placeholder="Contoh paket : 1MB" type="string" class="form-control <?php echo e($errors->has('nama') ? 'is-invalid':''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket</label>
                        <input name="harga" min="0" placeholder="Contoh harga : Rp. <?php echo number_format("100000",0,',','.'); ?>" type="number" class="uang form-control <?php echo e($errors->has('harga') ? 'is-invalid':''); ?>">
                        
                    </div>
                    <button class="mt-1 btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">List Paket</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama paket</td>
                                <td>Harga</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($paket->nama); ?></td>                                
                                <td>Rp. <?php echo number_format($paket->harga,0,',','.'); ?></td>
                                <td class="text-right">
                                    <form action="<?php echo e(route('paket.destroy', $paket->id)); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="<?php echo e(route('paket.edit', $paket->id)); ?>" 
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/pakets/index.blade.php ENDPATH**/ ?>