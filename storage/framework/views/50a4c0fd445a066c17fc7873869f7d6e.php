<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/bg.png">
    <title>Employee Management</title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.11.5/datatables.min.css"/> -->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">-->

    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.min.css">
     
     


    <?php echo $__env->yieldPushContent('css'); ?>

</head>

<body class="g-sidenav-show">

    <?php if(auth()->guard()->guest()): ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>

    <?php if(auth()->guard()->check()): ?>
        
        <?php echo $__env->make('layouts.navbars.auth.sidenav_admin', [
            'bg' => 'bg-orange',
            'userrole' => Auth::user()->role_id
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <main class="main-content position-relative border-radius-lg">
            <?php echo $__env->yieldContent('content'); ?>
            
        </main>
        <input type="hidden" id="inUserId" name="inUserId" value="<?php echo e(auth()->user()->id); ?>">  
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
    <script src="/assets/js/core/fontawesomeall.js"></script>
    
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        
                $(document).ready(function() {
                    var userid = $("#inUserId").val();
                    
                    getUserRoles(userid);
                    function fetchWorkOrderCount() {
                $.ajax({
                    url: '/path/to/api/endpoint', // Replace with your actual API endpoint
                    method: 'GET',
                    success: function(data) {
                        // Assuming the data contains the work order count
                        if (data.workOrderCount && data.workOrderCount > 0) {
                            $('#menuWorkOrderHistory .nav-link-text').append('<span class="badge badge-pill badge-danger">' + data.workOrderCount + '</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch work order count:', error);
                    }
                });
            }
            fetchWorkOrderCount();
        });
        
        function getUserRoles(userid)
        {
            var fd = new FormData();
        
            fd.append('userid',userid);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                 
                url: '<?php echo e(route('getuserroleforid')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        $(".sidemenuitem").hide();
                        
                        //$("#menuQueries").hide();
                        
                        var roles = response.roles;
                       
                        console.log(roles);
                        var isAdmin = false;
                        
                        for(var i=0;i<roles.length;i++)
                        {
                            if (roles[i].role_id==1)
                            {
                                console.log(roles[i]);
                                isAdmin=true;
                            }
                        }
                        
                        if (isAdmin)
                        {
                            // $("#menuWorkOrderHistory").show();
                            // $("#menuAttendance").show();
                            // $("#menuProject").show();
                            $("#details").show();
                            $("#ddd1").show();
                            $("#ddd").hide();
                            return;
                        }
                        else{
                            
                            $("#menuAttendance").show();
                            $("#menuProject").show();
                            $("#ddd").show();
                            $("#ddd1").hide();
                        }
                        var companyDefaultUserId = company ? company.default_user_id : null;
                        for(var i=0;i<roles.length;i++)
                        {
                         
                            if (roles[i].roleid==2)
                            {
                                $("#menuWorkOrderHistory").show();
                                $("#menuAttendance").show();
                                $("#menuProject").show();
                            }
                          
                             
                        }
                        $("#menuDownloadDispatch").show();
                        $("#menuFinalDownload").show();
                       
                    }
                },
            });
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/argon-dashboard.js"></script>
    <script src="/assets/js/core/datatables.min.js"></script>
    
  

</body>

</html><?php /**PATH C:\xampp\htdocs\Employee_attendance\resources\views/layouts/app.blade.php ENDPATH**/ ?>