<div class="app-header header-shadow">
    <div class="app-header__logo">
    <div class="logo-src">
        <img src="<?php echo e(asset('/dashboard/assets/images/logo-tole-wifi.png')); ?>" style="width: 140px;height: auto;"/>
    </div>
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
    <div class="app-header__content">
        <div class="app-header-left">
            
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        Statistics
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="<?php echo e(route('client')); ?>" class="nav-link">
                        <i class="nav-link-icon fa fa-user"></i>
                        Client List
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="<?php echo e(route('setting')); ?>" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Pengaturan Map
                    </a>
                </li>
            </ul>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <button type="button" tabindex="0" class="mb-1 mr-1 btn-transition btn btn-outline-danger">
                                            <?php echo e(__('Logout')); ?>

                                        </button>
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <?php /**PATH C:\xampp\htdocs\proyek3\resources\views/layouts/modul/header.blade.php ENDPATH**/ ?>