<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbars.guest.topnav', [
        'classes' => 'top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4',
        'container' => 'container',
        'text' => 'text-white',
        'arrow' => '/assets/img/down-arrow-white.svg',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-7 pb-9 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-cover.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Use these awesome forms to login
                            project for free.</p>
                        <p class="text-lead text-white">For authentication you can use the default users:</p>
                        <ul style="list-style: none;">
                            <li class="text-white text-sm"><strong>admin@argon.com</strong> with password <strong>secret</strong></li>
                            <li class="text-white text-sm"><strong>creator@argon.com</strong> with password <strong>secret</strong></li>
                            <li class="text-white text-sm"><strong>member@argon.com</strong> with password <strong>secret</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header pb-0 text-start">
                            <h3 class="font-weight-bolder">Welcome back</h3>
                            <p class="mb-0">Enter your email and password to sign in</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="<?php echo e(route('login.perform')); ?>" class="text-start">
                                <?php echo csrf_field(); ?>
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" value="<?php echo e(old('email') ?? 'admin@argon.com'); ?>" class="form-control" placeholder="Email" aria-label="Email">
                                    <?php $__errorArgs = ['email'];
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
                                    <input type="password" name="password" value="secret" class="form-control" placeholder="Password" aria-label="Password">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Sign in</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-1 text-sm mx-auto">
                                Forgot you password? Reset your password
                                <a href="<?php echo e(route('reset-password')); ?>" class="text-primary text-gradient font-weight-bold">here</a>
                            </p>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Don't have an account?
                                <a href="<?php echo e(route('register')); ?>" class="text-primary font-weight-bold">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php echo $__env->make('layouts.footers.auth.desc-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Dk3\resources\views/auth/login.blade.php ENDPATH**/ ?>