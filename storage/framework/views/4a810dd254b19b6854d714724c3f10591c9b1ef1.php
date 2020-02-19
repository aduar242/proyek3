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
                        <div class="position-relative form-group">
                            <div id="map"></div>
                        </div>
                        <div hidden class="position-relative form-group <?php echo e($errors->has('lat') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('lat', 'Lat', ['class' => 'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <?php echo Form::text('lat', null, ['class' => 'form-control','id'=>'lat']); ?>

                                <?php echo $errors->first('lat', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div hidden class="position-relative form-group <?php echo e($errors->has('long') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('long', 'Long', ['class' => 'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                                <?php echo Form::text('long', null, ['class' => 'form-control','id'=>'long']); ?>

                                <?php echo $errors->first('long', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="position-relative form-group"><label for="exampleNoRumah" class="">No rumah</label><input name="no_rumah" id="exampleNo_Rumah" value="<?php echo e($clients->no_rumah); ?>" type="string" class="form-control <?php echo e($errors->has('no_rumah') ? 'is-invalid':''); ?>"></div>
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
<script>
    var map = new GMaps({
      el: '#map',
      zoom: <?php echo e($set_zoom); ?>,
      lat: <?php echo e($latitude_centre); ?>,
      lng: <?php echo e($longitude_centre); ?>,
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        console.log(latLng);
        var lat = $('#lat');
        var long = $('#long');

        lat.val(latLng.lat());
        long.val(latLng.lng());
        map.removeMarkers();
        map.addMarker({
            lat: latLng.lat(),
            lng: latLng.lng(),
            title: 'Create Here',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });

    },
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/clients/edit.blade.php ENDPATH**/ ?>