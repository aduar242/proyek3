<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <?php if(URL::current() == URL::route('home')): ?>
                <a href="<?php echo e(('home')); ?>" class="mm-active">
                    <?php else: ?>
                    <a href="<?php echo e(('home')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Analisa
                </a>
            </li>
            <li class="app-sidebar__heading">List data</li>
            <li>
                <?php if(URL::current() == URL::route('client')): ?>
                <a href="<?php echo e(('client')); ?>" class="mm-active">
                    <?php else: ?>
                    <a href="<?php echo e(('client')); ?>">
                        <?php endif; ?>
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Client
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\project3\resources\views/layouts/modul/menu.blade.php ENDPATH**/ ?>