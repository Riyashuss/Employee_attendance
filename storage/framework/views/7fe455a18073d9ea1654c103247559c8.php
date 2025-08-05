<form role="form" method="post" action="<?php echo e(route('logout')); ?>" id="logout-form" class="d-inline-block">
    <?php echo csrf_field(); ?>
	
    <label class="nav-link text-white font-weight-bold px-0 d-inline-block">
        <span class="d-sm-inline d-none me-3"> <?php echo app('translator')->get('words.welcome'); ?> <?php echo e(auth()->user()->username); ?></span>
    </label>
    
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-inline-block text-white">
        <span class="d-sm-inline d-none"> <?php echo app('translator')->get('words.logout'); ?></span>
    </a>
</form><?php /**PATH C:\xampp\htdocs\Employee_attendance\resources\views/auth/logout.blade.php ENDPATH**/ ?>