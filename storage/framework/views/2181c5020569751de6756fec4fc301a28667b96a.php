<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <?php if(URL::current() == URL::route('home')): ?>
                <a href="<?php echo e(route('home')); ?>" class="mm-active">
                    <?php else: ?>
                    <a href="<?php echo e(route('home')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-display1"></i>
                    Dashboard
                </a>
            </li>
            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
            <li class="app-sidebar__heading">Manajemen Data</li>
            <li>
                <?php if(URL::current() == URL::route('paket')): ?>
                <a href="<?php echo e(route('paket')); ?>" class="mm-active">
                    <?php else: ?>
                    <a href="<?php echo e(route('paket')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-plugin"></i>
                    Data Paket
                </a>
            </li>
            <li>
                <?php if(URL::current() == URL::route('client')): ?>
                <a href="<?php echo e(route('client')); ?>" class="mm-active">
                    <?php else: ?>
                    <a href="<?php echo e(route('client')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-users"></i>
                    Data Client
                </a>
            </li>
            
            <li class="app-sidebar__heading">Manajemen Mapping</li>
            <li>
                <a target="_blank" href="<?php echo e(route('homemap')); ?>">
                        <i class="metismenu-icon pe-7s-map-2"></i>
                        Map
                    </a>
                </li>
            
            <li>
                <a href="<?php echo e(route('setting')); ?>">
                        <i class="metismenu-icon pe-7s-map"></i>
                        Pengaturan Map
                    </a>
                </li>
            <li class="app-sidebar__heading">Laporan</li>
            <li>
                <?php if(URL::current() == URL::route('lap')): ?>
                <a href="<?php echo e(route('lap')); ?>" class="mm-active">
                    <?php else: ?>
                        <a href="<?php echo e(route('lap')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Laporan Pelanggan
                </a>
            </li>
            <?php endif; ?>
            <?php if(auth()->check() && auth()->user()->hasRole('Kasir')): ?>
            <li class="app-sidebar__heading">Pelayanan</li>
            <li>
                <?php if(URL::current() == URL::route('pel')): ?>
                <a href="<?php echo e(route('pel')); ?>" class="mm-active">
                    <?php else: ?>
                        <a href="<?php echo e(route('pel')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Pelayanan
                </a>
            </li>
            <li class="app-sidebar__heading">Laporan</li>
            <li>
                <?php if(URL::current() == URL::route('lap')): ?>
                <a href="<?php echo e(route('lap')); ?>" class="mm-active">
                    <?php else: ?>
                        <a href="<?php echo e(route('lap')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Laporan
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\proyek3\resources\views/layouts/modul/menu.blade.php ENDPATH**/ ?>