<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Data Users
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>                        
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="user"><?php echo e($no++); ?></th>
                        <td><?php echo e(ucfirst($user->name)); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php if(!empty($user->getRoleNames())): ?>
                            <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="badge badge-success"><?php echo e($v); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <button class="mb-1 mr-1 btn-transition btn btn-outline-primary"><i class="pe-7s-user"></i> Lihat
                            </button>
                            <a href="<?php echo e(route('user.edit',$user->id)); ?>">  
                                <button class="mb-1 mr-1 btn-transition btn btn-outline-success"><i class="pe-7s-id"></i> Edit
                                </button>
                            </a>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']); ?>

                            <?php echo Form::submit('Delete', ['class' => 'mb-1 mr-1 btn-transition btn btn-outline-danger']); ?>

                            <?php echo Form::close(); ?>

                            <button class="mb-1 mr-1 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal"><i class="pe-7s-trash"></i> Hapus
                            </button>
                            <?php $__env->startSection('modalHapus'); ?>
                                <?php echo e($user->id); ?>

                            <?php $__env->stopSection(); ?>
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
<?php $__env->startSection('modal'); ?>
<div class="ui-theme-settings">
    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
        <i class="fa fa-plus fa-w-16 fa-2x"></i>
    </button>
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
                <h3 class="themeoptions-heading">Tambah User
                </h3>
                <div class="p-3">
                    <div class="card-body">
                    <?php echo Form::open(array('route' => 'user.store','method'=>'POST')); ?>

                        <?php echo e(csrf_field()); ?>

                            <div class="position-relative form-group">
                                <label for="exampleNama" class="">Nama</label>
                                <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleNama" class="">Email</label>
                                <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleNama" class="">Password</label>
                                <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleNama" class="">Confirm Password</label>
                                <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleNama" class="">Role</label>
                                <?php echo Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')); ?>

                            </div>
                            <button class="mt-1 btn btn-primary">Simpan</button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/users/index.blade.php ENDPATH**/ ?>