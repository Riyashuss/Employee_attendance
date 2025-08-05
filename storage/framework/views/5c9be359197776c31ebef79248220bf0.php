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
            'bg' => 'bg-white',
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
                        var company = response.company;
                        var dataCount = response.dataCount;
                        var preproductionCount = response.preproductionCount;
                        var surveyCount = response.surveyCount;
                        var mapCount = response.mapCount;
                        var modelCount = response.modelCount;
                        var modelareaCount = response.modelareaCount;
                        var preqcCount= response.preqcCount;
                        var mapqcCount= response.mapqcCount;
                        var modelqcCount= response.modelqcCount;
                        var modelareaqcCount= response.modelareaqcCount;
                        console.log(company);
                        var isAdmin = false;
                        
                        for(var i=0;i<roles.length;i++)
                        {
                            if (roles[i].roleid==1)
                            {
                                isAdmin=true;
                            }
                        }
                        
                        if (isAdmin)
                        {
                            $("#menuWorkOrderHistory").show();
                            $("#menuWorkFlowChange").show();
                            $("#menuCompany").show();
                            $("#menuUsers").show();
                            $("#menuWorkOrder").show();
                            $("#menumodelstatus").show();
                            $("#menuConfiguration").show();
                            // $("#menuDownloadCADApp").show();
                            $("#menuelementManage").show();
                            $("#menuDownloaddata").show();
                            $("#menuDownloadDispatch").show();
                            $("#menuFinalDownload").show();
                            
                            return;
                        }
                        var companyDefaultUserId = company ? company.default_user_id : null;
                        for(var i=0;i<roles.length;i++)
                        {
                            if (companyDefaultUserId && companyDefaultUserId == userid) {
                        console.log(companyDefaultUserId + " default");
                        $("#menuWorkOrderHistory").show();
                    } else {
                        console.log(companyDefaultUserId + " default not");
                    }
                    
                            if (roles[i].roleid==2)
                            {
                                $("#menuDatapreparation").show();
                                if(dataCount == 0){
                                    $("#menudatacount").text(dataCount).hide();
                                }
                                else if (dataCount != null && !isNaN(dataCount))
                                {
                                    
                                    $("#menudatacount").text(dataCount).show();
                                }
                            }
                            if (roles[i].roleid==3)
                            {
                                $("#menuPreproduction").show();
                                if(preproductionCount == 0){
                                    $("#menuPreproductioncount").text(preproductionCount).hide();
                                }
                                else if (preproductionCount != null && !isNaN(preproductionCount))
                                {
                                    
                                    $("#menuPreproductioncount").text(preproductionCount).show();
                                }
                            }
                            if (roles[i].roleid==4)
                            {
                                $("#menuSurvey").show();
                                if(surveyCount == 0){
                                    $("#menuSurveycount").text(surveyCount).hide();
                                }
                                else if (surveyCount != null && !isNaN(surveyCount))
                                {
                                    
                                    $("#menuSurveycount").text(surveyCount).show();
                                }
                            }
                            if (roles[i].roleid==5)
                            {
                                $("#menuMapCreation").show();
                                if(mapCount == 0){
                                    $("#menuMapcount").text(mapCount).hide();
                                }
                                else if (mapCount != null && !isNaN(mapCount))
                                {
                                    
                                    $("#menuMapcount").text(mapCount).show();
                                }
                            }
                            if (roles[i].roleid==6)
                            {
                                $("#menuModelCreation").show();
                                if(modelCount == 0){
                                    $("#menuModelcount").text(modelCount).hide();
                                }
                                else if (modelCount != null && !isNaN(modelCount))
                                {
                                    $("#menuModelcount").text(modelCount).show();
                                }
                            }
                            
                            if (roles[i].roleid==7)
                            {
                                $("#qc").show();
                                if(preqcCount==0){
                                    
                                    $("#menuPreqccount").text(preqcCount).hide();
                                }
                                else if (preqcCount != null && !isNaN(preqcCount))
                                {
                                    
                                    $("#menuPreqccount").text(preqcCount).show();
                                }
                                if(mapqcCount==0){
                                    
                                    $("#menuMapqccount").text(mapqcCount).hide();
                                }
                                else if (mapqcCount != null && !isNaN(mapqcCount))
                                {
                                    
                                    $("#menuMapqccount").text(mapqcCount).show();
                                }
                                if(modelqcCount==0)
                                {
                                   $("#menuModelqccount").text(modelqcCount).hide();
                                }
                                else if (modelqcCount != null && !isNaN(modelqcCount))
                                {
                                
                                    $("#menuModelqccount").text(modelqcCount).show();
                                }
                                if(modelareaqcCount==0)
                                {
                                   $("#menuModelareaqccount").text(modelareaqcCount).hide();
                                }
                                else if (modelareaqcCount != null && !isNaN(modelareaqcCount))
                                {
                                
                                    $("#menuModelareaqccount").text(modelareaqcCount).show();
                                }
                            }
                            if (roles[i].roleid==8)
                            {
                                $("#menumapattribute").show();
                               
                            }
                            if (roles[i].roleid==7)
                            {
                                $("#menumodelstatus").show();
                               
                            }
                            if (roles[i].roleid==9)
                            {
                                $("#menumodelareaattribute").show();
                                if(modelareaCount == 0){
                                    $("#menumodelareaattributecount").text(modelareaCount).hide();
                                }
                                else if (modelareaCount != null && !isNaN(modelareaCount))
                                {
                                    $("#menumodelareaattributecount").text(modelareaCount).show();
                                }
                            }
                        }
                        $("#menuDownloadDispatch").show();
                        $("#menuFinalDownload").show();
                        // $("#menuDownloadCADApp").show();
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

</html><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/layouts/app.blade.php ENDPATH**/ ?>