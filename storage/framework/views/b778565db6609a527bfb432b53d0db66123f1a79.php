<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Data client
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    yang sudah terdaftar
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Simple table</h5>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Paket</th>
                        <th>Masa Aktif</th>
                        <th>Masa Kadaluwar</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="client"><?php echo e($no++); ?></th>
                        <td><?php echo e(ucfirst($client->nama)); ?></td>
                        <td><?php echo e($client->paket['nama']); ?></td>
                        <td><?php echo e($client->masa_aktif); ?></td>
                        <td><?php echo e($client->masa_kadaluwarsa); ?></td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="<?php echo e(route('client.edit', $client->id)); ?>">  
                                <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                                </button>
                            </a>
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <?php $__env->startSection('modalHapus'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data ini akan di hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Anda yakin ingin menghapus data ini <?php echo e($client->id); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <form action="<?php echo e(route('client.destroy', $client->id)); ?>" method="POST">
                                <?php echo e(method_field('delete')); ?>

                                <?php echo csrf_field(); ?>
                                <a href="<?php echo e(route('client.destroy', $client->id)); ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </form>
                            
                        </div>
                    </div>
                    <?php $__env->stopSection(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<div class="ui-theme-settings">
    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
        <i class="fa fa-plus fa-w-16 fa-2x"></i>
    </button>
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
                <h3 class="themeoptions-heading">Tambah Client
                </h3>
                <div class="p-3">
                    <div class="card-body">
                    <form class="" action="<?php echo e(route('client.store')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                            <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="nama" placeholder="with a placeholder" type="string" class="form-control <?php echo e($errors->has('nama') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampledeskripsi" class="">Deskripsi</label><input name="deskripsi" id="nama" placeholder="with a placeholder" type="string" class="form-control <?php echo e($errors->has('deskripsi') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Paket</label><select name="id_paket" id="id_paket" class="form-control" <?php echo e($errors->has('id_paket') ? 'is-invalid':''); ?>>
                                <option value="">Pilih :</option>
                                <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($paket->id); ?>"><?php echo e(ucfirst($paket->nama)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select></div>
                            <div class="position-relative form-group"><label for="exampleDesa" class="">Desa</label><input name="desa" id="exampleDesa" placeholder="with a placeholder" type="string" class="form-control <?php echo e($errors->has('desa') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" placeholder="with a placeholder" type="string" class="form-control <?php echo e($errors->has('kecamatan') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" placeholder="with a placeholder" type="string" class="form-control <?php echo e($errors->has('no_rumah') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleMasaAktif" class="">Masa aktif</label><input name="masa_aktif" id="exampleMasaAktif" placeholder="with a placeholder" type="date" class="form-control <?php echo e($errors->has('masa_aktif') ? 'is-invalid':''); ?>"></div>
                            <div class="position-relative form-group"><label for="exampleMasaKadaluarsa" class="">Masa kadaluwarsa</label><input name="masa_kadaluwarsa" id="exampleMasaKadaluarsa" placeholder="with a placeholder" type="date" class="form-control <?php echo e($errors->has('masa_kadaluwarsa') ? 'is-invalid':''); ?>"></div>
                            <button class="mt-1 btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/clients/index.blade.php ENDPATH**/ ?>