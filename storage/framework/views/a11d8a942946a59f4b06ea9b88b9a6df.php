<?php if($message = session()->has('succes')): ?>
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-sm-center "
        role="alert">
        <p class="text-white mb-0"><?php echo e(session()->get('succes')); ?></p>
    </div>
<?php endif; ?>
<?php if($message = session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <p class="text-white mb-0"><?php echo e(session()->get('error')); ?></p>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\dk3app\resources\views/components/alert.blade.php ENDPATH**/ ?>