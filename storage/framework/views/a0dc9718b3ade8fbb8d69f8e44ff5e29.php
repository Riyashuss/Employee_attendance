

<?php $__env->startSection('content'); ?>
    
    <main class="main-content  mt-0">
    <!-- style="background-image: url('/assets/img/logo.png');"> -->
        <div class="page-header align-items-start min-vh-50 pt-4 pb-1 m-0 border-radius-lg"
           style="backgroun-color:green;">
            <!-- <span class="mask bg-gradient-dark opacity-1"></span> -->
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n1 mt-n1 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-0">
                        <div class="card-header text-center pb-0 text-start">
							<!-- <img src="<?php echo e($logo ?? '/assets/img/logo.png'); ?>" class="navbar-brand-img h-20 w-20" alt="main_logo" style="width:190px;height:60px;"> -->
							<!-- <h3 class="text-dark mb-2 mt-2">NilaTech</h3> -->
                            <h4 style="color:#E0A07D;" class=" font-weight-bolder">Login</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="<?php echo e(route('login.perform')); ?>" class="text-start">
                                <?php echo csrf_field(); ?>
                                <label><?php echo app('translator')->get('words.username'); ?></label>
                                <div class="mb-2">
                                    <input type="text" name="username" value="" class="form-control" placeholder="<?php echo app('translator')->get('words.un'); ?>" aria-label="username">
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <label><?php echo app('translator')->get('words.password'); ?></label>
                                <div class="mb-2">
                                    <input type="password" name="password" value="" class="form-control" placeholder="<?php echo app('translator')->get('words.ps'); ?>" aria-label="Password">
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
                                    <button type="submit"style="background-color:#006A67;" class="btn btn-info w-100 mt-4 mb-0"><?php echo app('translator')->get('words.signin'); ?></button>
                                </div>
                            </form>
                             <!-- <div style="margin:auto;width:50%;">
                                <a href="<?php echo e(url('/localization/en')); ?>"><img style="width:4em;height: auto;" src="<?php echo e(asset('assets/img/US-Flag.png')); ?>"/></a>
                                <a href="<?php echo e(url('/localization/de')); ?>"><img style="width:4em;height: auto;margin-left:1em;" src="<?php echo e(asset('assets/img/GM-Flag.png')); ?>"/></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Nilatech_attendance\resources\views/auth/login.blade.php ENDPATH**/ ?>