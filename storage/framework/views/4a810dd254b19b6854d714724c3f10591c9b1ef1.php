<?php $__env->startSection('judulPage'); ?>
    Data edit client
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    melakukan pembaharuan data
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <form action="<?php echo e(route('client.update', $clients->id)); ?>"  method="POST" enctype="multipart/form-data">
                    
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="POST">
                        <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="exampleNama" value="<?php echo e($clients->nama); ?>" type="string" class="form-control <?php echo e($errors->has('nama') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="exampleText" class="">Deskripsi</label><input name="deskripsi" id="exampledeskripsi" value="<?php echo e($clients->deskripsi); ?>" type="string" class="form-control <?php echo e($errors->has('deskripsi') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="examplePaket" class="">Desa</label><input name="desa" id="exampleDesa" value="<?php echo e($clients->desa); ?>" type="string" class="form-control <?php echo e($errors->has('desa') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" value="<?php echo e($clients->kecamatan); ?>" type="string" class="form-control <?php echo e($errors->has('kecamatan') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" value="<?php echo e($clients->no_rumah); ?>" type="string" class="form-control <?php echo e($errors->has('no_rumah') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="exampleSelect" class="">Paket</label><select name="id_paket" id="id_paket" class="form-control" <?php echo e($errors->has('id_paket') ? 'is-invalid':''); ?>>
                            <option value="">Pilih :</option>
                            <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($paket->id); ?>"><?php echo e(ucfirst($paket->nama)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select></div>
                        <div class="position-relative form-group"><label for="exampleMasaAktif" class="">Masa aktif</label><input name="masa_aktif" id="exampleMasaAktif" value="<?php echo e($clients->masa_aktif); ?>" type="date" class="form-control <?php echo e($errors->has('masa_aktif') ? 'is-invalid':''); ?>"></div>
                        <div class="position-relative form-group"><label for="exampleMasaKadaluarsa" class="">Masa kadaluwarsa</label><input name="masa_kadaluwarsa" id="exampleMasaKadaluarsa" value="<?php echo e($clients->masa_kadaluwarsa); ?>" type="date" class="form-control <?php echo e($errors->has('masa_kadaluwarsa') ? 'is-invalid':''); ?>"></div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('client')); ?>" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    </form>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/clients/edit.blade.php ENDPATH**/ ?>