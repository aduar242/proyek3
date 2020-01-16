<?php $__env->startSection('iconPage'); ?>
<i class="pe-7s-users icon-gradient bg-mean-fruit">
</i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('judulPage'); ?>
    Data Roles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('deskripsiPage'); ?>
    managemen data Role
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Tambah Role</h3>
            </div>
            <div class="card-body">
                <?php echo Form::open(array('route' => 'role.store','method'=>'POST')); ?>

                    <?php echo e(csrf_field()); ?>

                    
                    <div class="form-group">
                        <label for="name">Nama role</label>
                        <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                    </div>
                    <div class="form-group">
                        <label for="name">Permission :</label><br>
                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                        <?php echo e($value->name); ?></label>
                    <br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <button class="mt-1 btn btn-primary">Simpan</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">List Role</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama role</td>
                                <td class="text-right">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="<?php echo e(route('role.show',$role->id)); ?>">Show</a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                        <a class="btn btn-primary" href="<?php echo e(route('role.edit',$role->id)); ?>">Edit</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                                        <?php echo Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']); ?>

                                            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $roles->render(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/roles/index.blade.php ENDPATH**/ ?>