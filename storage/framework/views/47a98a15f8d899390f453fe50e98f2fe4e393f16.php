<?php $__env->startSection('judulPage'); ?>
    Data Edit User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    melakukan pembaharuan data
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <?php echo Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]); ?>

                    
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
                            <?php echo Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')); ?>

                        </div>

                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('user')); ?>" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    <?php echo Form::close(); ?>

        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/users/edit.blade.php ENDPATH**/ ?>