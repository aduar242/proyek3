<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo e(config('app.name', 'ToleWifi')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo e(asset('dashboard/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('datatables/datatables.min.css')); ?>">
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($gmaps_api_key); ?>"></script>
    <script src="<?php echo e(asset('js/gmaps.js')); ?>"></script>
    <style type="text/css">
    .user-panel>.image>img {
        width: 100%;
        max-width: 150px;
        height: auto;
        margin: 0 auto;
        display: block;
    }
    #map {
        width: 100%;
        height: 400px;
    }
    </style>
</head>
<body>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <?php echo $__env->make('layouts.modul.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->yieldContent('modal'); ?>
     
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>

                    <?php echo $__env->make('layouts.modul.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>    
                <div class="app-main__outer">

                    <?php echo $__env->make('layouts.modul.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <?php echo $__env->make('layouts.modul.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

        </div>
    </div>

<?php echo $__env->yieldPushContent('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/rupiah.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/assets/scripts/main.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>


<?php echo $__env->yieldContent('script'); ?>
</body>
</html>

<?php echo $__env->make('layouts.modal.hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/layouts/app.blade.php ENDPATH**/ ?>