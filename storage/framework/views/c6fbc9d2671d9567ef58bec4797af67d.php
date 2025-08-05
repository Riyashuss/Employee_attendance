

<?php $__env->startSection('content'); ?>
    
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-4 pb-1 m-0 border-radius-lg"
            style="background-image: url('/assets/img/dk3/login_top_bg.png');">
            <span class="mask bg-gradient-dark opacity-1"></span>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n1 mt-n1 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-0">
                        <div class="card-header text-center pb-0 text-start">
							<img src="<?php echo e($logo ?? '/assets/img/favicon.png'); ?>" class="navbar-brand-img h-20 w-20" alt="main_logo">
							<h3 class="text-dark mb-2 mt-2"><?php echo app('translator')->get('words.dk3app'); ?></h3>
                            <h4 class="text-warning font-weight-bolder"> <?php echo app('translator')->get('words.login'); ?></h4>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="<?php echo e(route('login.perform')); ?>" class="text-start">
                                <?php echo csrf_field(); ?>
                                <label>User Name</label>
                                <div class="mb-3">
                                    <input type="text" name="username" value="" class="form-control" placeholder="username" aria-label="username">
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <label>Password</label>
                                <div class="mb-3">
                                    <input type="password" name="password" value="" class="form-control" placeholder="Password" aria-label="Password">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('layouts.footers.auth.desc-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/auth/login.blade.php ENDPATH**/ ?>