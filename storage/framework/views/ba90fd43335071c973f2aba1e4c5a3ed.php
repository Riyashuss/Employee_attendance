<form role="form" method="post" action="<?php echo e(route('logout')); ?>" id="logout-form">
    <?php echo csrf_field(); ?>
    <a href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link text-white font-weight-bold px-0">
    <i class="fa fa-user me-sm-1"></i>
    <span class="d-sm-inline d-none">Log out</span>
    </a>
</form>
<?php /**PATH C:\xampp\htdocs\Dk3\resources\views/auth/logout.blade.php ENDPATH**/ ?>