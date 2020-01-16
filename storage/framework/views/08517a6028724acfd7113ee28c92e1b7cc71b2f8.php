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
                        <th scope="row"><?php echo e($no++); ?></th>
                        <td><?php echo e($client->nama); ?></td>
                        <td><?php echo e($client->paket); ?></td>
                        <td><?php echo e($client->masa_aktif); ?></td>
                        <td><?php echo e($client->masa_kadaluwarsa); ?></td>
                        <td class="text-right">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#exampleModal">Hapus</button>
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                            </button>
                        </td>
                    </tr>
                    <?php $__env->startSection('modalHapus'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title test</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="<?php echo e(route('client.destroy',$client->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-primary">sSave changes</button>
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

                            <div class="position-relative form-group"><label for="exampleNama" class="">Nama</label><input name="nama" id="exampleNama" placeholder="with a placeholder" type="string" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleText" class="">Deskripsi</label><textarea name="deskripsi" id="exampleText" class="form-control"></textarea></div>
                            <div class="position-relative form-group"><label for="examplePaket" class="">Desa</label><input name="desa" id="exampleDesa" placeholder="with a placeholder" type="string" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleKecamatan" class="">Kecamatan</label><input name="kecamatan" id="exampleKecamatan" placeholder="with a placeholder" type="string" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" placeholder="with a placeholder" type="string" class="form-control"></div>
                            <div class="position-relative form-group"><label for="examplePaket" class="">Paket</label><input name="paket" id="examplePaket" placeholder="with a placeholder" type="string" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleMasaAktif" class="">Masa aktif</label><input name="masa_aktif" id="exampleMasaAktif" placeholder="with a placeholder" type="date" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleMasaKadaluarsa" class="">Masa kadaluwarsa</label><input name="masa_kadaluwarsa" id="exampleMasaKadaluarsa" placeholder="with a placeholder" type="date" class="form-control"></div>
                            <button class="mt-1 btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project3\resources\views/clients/index.blade.php ENDPATH**/ ?>