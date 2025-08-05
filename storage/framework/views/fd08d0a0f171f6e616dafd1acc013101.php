<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>DK3 APP</title>

   
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css" rel="stylesheet" />

    <?php echo $__env->yieldPushContent('css'); ?>

</head>

<body class="g-sidenav-show bg-gray-100 <?php echo e($class ?? ''); ?>">
    <?php if(auth()->guard()->guest()): ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>

    <?php if(auth()->guard()->check()): ?>
        <?php if(str_contains(request()->url(), 'rtl') ||
            str_contains(request()->url(), 'pricing-page') ||
            in_array(
                request()->route()->getName(),
                ['signins', 'signups', 'resets', 'locks', 'verifications', 'errors'])): ?>
            <?php echo $__env->yieldContent('content'); ?>
        <?php else: ?>
            <?php if(str_contains(request()->url(), 'landing')): ?>
                <?php echo $__env->make('components.headers.hero', ['height' => 'h-100'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('layouts.navbars.auth.sidenav', [
                    'box' => 'box-shadow-none',
                    'logo' => '/assets/img/logo-ct.png',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(!str_contains(request()->url(), 'vr')): ?>
                <?php if(Route::currentRouteName() == 'profiles' || str_contains(request()->url(), 'new-product')): ?>
                    <?php echo $__env->make('components.headers.image-hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('components.headers.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php echo $__env->make('layouts.navbars.auth.sidenav_admin', ['bg' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
			<main class="main-content position-relative border-radius-lg">
                <?php echo $__env->yieldContent('content'); ?>
				<?php echo $__env->make('components.fixed-plugin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </main>
			
        <?php endif; ?>
    <?php endif; ?>

    <!--   Core JS Files   -->
    <?php echo $__env->yieldPushContent('js'); ?>

    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/fullcalendar.min.js"></script>
	<script src="/assets/js/plugins/flatpickr.min.js"></script>
	<script src="/assets/js/core/jquery.min.js"></script>
	
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
		
		
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/argon-dashboard.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Dk3\resources\views/layouts/app.blade.php ENDPATH**/ ?>