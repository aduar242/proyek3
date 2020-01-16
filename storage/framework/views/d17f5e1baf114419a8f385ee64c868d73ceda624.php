<?php $__env->startSection('judulPage'); ?>
    Data edit Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    melakukan pembaharuan data
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row"> 
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Controls Types</h5>
                <?php echo Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]); ?>

                    
                    <?php echo e(csrf_field()); ?>                    
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Nama Role</label>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleNama" class="">Permission :</label><br>
                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?>            
                            <?php echo e($value->name); ?></label>            
                        <br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="mt-1 btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('role')); ?>" 
                            class="mt-1 btn btn-danger">
                            Batal
                        </a>
                    <?php echo Form::close(); ?>

        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/roles/edit.blade.php ENDPATH**/ ?>