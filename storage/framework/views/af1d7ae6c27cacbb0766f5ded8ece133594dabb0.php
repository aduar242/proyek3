<?php $__env->startSection('judulPage'); ?>
    Data edit Paket
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    melakukan pembaharuan data
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <form action="<?php echo e(route('client.update', $pakets->id)); ?>"  method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_method" value="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="position-relative form-group"><label for="nama" class="">Nama</label><input name="nama" id="nama" value="<?php echo e($pakets->nama); ?>" type="string" class="form-control <?php echo e($errors->has('nama') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="harga" class="">Harga</label><input name="harga" id="harga" value="<?php echo e($pakets->harga); ?>" type="number" class="form-control <?php echo e($errors->has('harga') ? 'is-invalid':''); ?>"></div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('paket')); ?>" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    </form>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/pakets/edit.blade.php ENDPATH**/ ?>