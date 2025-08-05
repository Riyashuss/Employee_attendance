

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homemapcreation')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            
                <ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                    
                    <li class="nav-item d-flex align-items-center">
                        <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <?php if(auth()->user()->id !=1): ?>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="#" onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
                            <span class=''>
                                <i class="fa fa-user me-sm-0" style="color: white;"></i>
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card" id="basic-info">
        <div class="card-body">
            <div class="table-responsive">
               <table class="table table-striped" id="workOrderTable">
                    <thead class="bg-dark text-white" >
                        <tr>
                            <th class="text-sm text-center">
                                <?php echo app('translator')->get('words.woname'); ?>
                            </th>
                            <th class="text-sm text-center">
                                <?php echo app('translator')->get('words.pname'); ?>
                            </th>
                            <th class="text-sm text-center">
                                <?php echo app('translator')->get('words.status'); ?>
                            </th>
                            <th class="text-sm text-center">
                                <?php echo app('translator')->get('words.woarea'); ?>
                            </th>
                            <th class="text-sm text-center">
                                <?php echo app('translator')->get('words.action'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $workOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="mt-2">
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->workordername); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->processname); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->description); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->workarea_name); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle">
                                    <?php if($workOrder->status_code == '312'): ?>
                                            <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewRemarksClick("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-eye'></i>
                                            <?php echo app('translator')->get('words.viewremarks'); ?></span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '302'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='queryClarification("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.clarificationrequired'); ?>
                                            </span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '315'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='queryClarification("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.clarificationrequired'); ?>
                                            </span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '316'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='viewReassignRemarksClick("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.viewremarks'); ?>
                                            </span></button>
                                    <?php endif; ?>
                    
                                     <?php if($workOrder->status_code != '310' || $workOrder->status_code != '314'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processClick("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php if($workOrder->status_code == '300'): ?> <?php echo app('translator')->get('words.assigntouser'); ?>
                                            <?php elseif($workOrder->status_code == '301'): ?> <?php echo app('translator')->get('words.startmapcreation'); ?>
                                            <?php elseif($workOrder->status_code == '302'): ?> <?php echo app('translator')->get('words.assigntoqc'); ?> 
                                            <?php elseif($workOrder->status_code == '311'): ?> <?php echo app('translator')->get('words.checkmapcreationupload'); ?>
                                            <?php elseif($workOrder->status_code == '303'): ?> <?php echo app('translator')->get('words.assigntomodelcreationassignment'); ?>
                                            
                                            <?php elseif($workOrder->status_code == '305'): ?> <?php echo app('translator')->get('words.restartmapcreation'); ?>
                                            <?php elseif($workOrder->status_code == '312'): ?> <?php echo app('translator')->get('words.restartmapcreation'); ?>
                                            <?php elseif($workOrder->status_code == '315'): ?> <?php echo app('translator')->get('words.reassigntoqc'); ?>
                                            <?php elseif($workOrder->status_code == '316'): ?> <?php echo app('translator')->get('words.startmapcreation'); ?>
                                            <?php endif; ?>
                                        </span>
                                    </button>
                                  
                                    <!-- <?php if($workOrder->status_code == '302' && $company && $company->default_user_id != optional(auth()->user())->id): ?>
   
                                    <?php elseif($workOrder->status_code == '302' && $company && $company->default_user_id == optional(auth()->user())->id): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processReassignClick("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        <?php echo app('translator')->get('words.reassign'); ?></span></button>
                                    <?php endif; ?> -->
                                    
                                    <!-- <?php if($workOrder->status_code == '312' && $company && $company->default_user_id == optional(auth()->user())->id): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processReassignClick("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        <?php echo app('translator')->get('words.reassign'); ?></span></button>
                                    <?php endif; ?> -->
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
            <?php echo app('translator')->get('words.nomatchingresultsfound'); ?>
            </div>
        </div>
    </div>
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .choices {
            margin-bottom: 0;
        }
        
        .text-middle
        {
            vertical-align:middle;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
        <script src="/assets/js/plugins/sweetalert.min.js"></script>
    <script>
        
        var  dtWorkOrders;
        
        $(document).ready(function(){
            
            dtWorkOrders = $('#workOrderTable').DataTable({
                paging: true,
                pageLength:10,
                searching: true,
                ordering:  true,
                info : true,
                language: {
                    emptyTable: '<?php echo app('translator')->get('words.nowoavailablemapcreation'); ?>'
                } 
            });
        }); 
        
        $("#workorder_name").on("change", function() 
        {
            
        }); 
        
        function profileSetting(user){
            window.location.href = "/profileView/"+user;
        }

        function processClick(workOrderId,status_code)
        {
            //alert( workOrderId +"," +status_code);
        // window.location.href = '/assignToSurvey/' + workOrderId;
        
        if (status_code=="300")
        {
            window.location.href = '/assignToUserMapCreation/' + workOrderId ;   
        }
        else if (status_code=="301" || status_code=="316")
        {
            Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtostartmapcreation'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                        if (result.isConfirmed)
                        {
                            startMapCreation(workOrderId);
                        }
                });  
            return;  
        }
            else if  (status_code=="302")
            {
                window.location.href = '/assignmapqc/' + workOrderId ; 
            }
            else if  (status_code=="315")
            {
                window.location.href = '/assignmapqc/' + workOrderId ; 
            }
            // else if  (status_code=="303")
            // {
            //     window.location.href = '/assignToModelCreation/' + workOrderId ; 
            // }
             else if  (status_code=="303")
            {
                window.location.href = '/home_mapattribute/' ; 
            }
            else if (status_code=="312")
        {
            Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtorestartmapcreation'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                        if (result.isConfirmed)
                        {
                            restartPreproduction(workOrderId);
                        }
                });  
            return;  
        }
        else if (status_code=="305")
        {
            startPreproduction (workOrderId );
        }
        else if  (status_code=="311")
        { 
            $.ajax({
                url: '/checkToSurvey/' + workOrderId,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title:'<?php echo app('translator')->get('words.doyouwanttocompletethemapcreation'); ?>',
                                text: response.message,
                                showCancelButton: true,
                                confirmButtonText: '<?php echo app('translator')->get('words.yes'); ?>',
                                cancelButtonText: '<?php echo app('translator')->get('words.no'); ?>'
                            }).then((result) => {
                            if (result.isConfirmed) {
                            
                                window.location.href = '/completemapcreation/' + workOrderId ; 
                            }
                            }); 
                    } else {
                        // Work order does not exist, show error message
                        Swal.fire({
                            icon: 'error',
                            title: ' <?php echo app('translator')->get('words.noelementfoundformapcreation'); ?>',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(xhr.responseText);
                }
            });
        }
        }
        
        function startPreproduction(workOrderId)
        {
            var fd = new FormData();
                
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                
                url: '<?php echo e(route('startMapcreationPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                    text: '<?php echo app('translator')->get('words.mapcreationstartedsuccessfully'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.reload();
                                });
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                text: response.message,
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            });
                    }
                },
            });
        }

        function restartPreproduction(workOrderId)
        {
            var fd = new FormData();
                
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                
                url: '<?php echo e(route('restartMapcreationPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                    text: '<?php echo app('translator')->get('words.mapcreationrestartedsuccessfully'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.reload();
                                });
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                text: response.message,
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            });
                    }
                    
                
                    
                },
            });
        }
        
        function queryClick(workOrderId,status_code)
        {
            if (status_code=="302")
        {
            Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtosetqueryformapcreation'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                        if (result.isConfirmed)
                        {
                            queryMapCreation(workOrderId);
                        }
                });  
            return;  
        }
        }

        function queryClarification(workOrderId,status_code)
        {
            if (status_code=="302" || status_code=="315")
        {
            Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtosetqueryformapcreation'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                        if (result.isConfirmed)
                        {
                        //  queryMapCreation(workOrderId);
                        window.location.href = "/Queryclarificationmap/"+workOrderId;
                        }
                });  
            return;  
        }
        }
        
        function queryMapCreation(workOrderId)
        {
            var fd = new FormData();
                
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                
                url: '<?php echo e(route('queryMapCreationPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                    text: '<?php echo app('translator')->get('words.mapcreationissetforclarification'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.reload();
                                });
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                text: response.message,
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            });
                    }
                    
                
                    
                },
            });
        }
        
        
        
        function startMapCreation(workOrderId)
        {
            var fd = new FormData();
                
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                
                url: '<?php echo e(route('startMapCreationPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                    text: '<?php echo app('translator')->get('words.mapcreationstartedsuccessfully'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.reload();
                                });
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                text: response.message,
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            });
                    }
                    
                
                    
                },
            });
        }
        
        function processReassignClick(workOrderId)
        {
            
            window.location.href = '/reassignMapCreation/' + workOrderId ; 
            
        }

        function viewRemarksClick(workOrderId){
            // window.location.href = '/viewrejectmapqc/' + workOrderId ; 

            var fd = new FormData();
            fd.append('workOrderId',workOrderId);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('viewQcRemarksClick')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: '<?php echo app('translator')->get('words.workorder:'); ?>'+response.workOrder_name,
                            text: '<?php echo app('translator')->get('words.remark:'); ?>'+response.workorder_remarks,
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-success mx-2'
                            },
                            buttonsStyling: false
                        }).then(function (result) {
                                window.location.reload();
                            });
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'warning',
                            title: '<?php echo app('translator')->get('words.workorder'); ?>',
                            text: response.message,
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-success mx-2'
                            },
                            buttonsStyling: false
                        });
                    }
                },
            });
        }
        function viewReassignRemarksClick(workOrderId){
            // window.location.href = '/viewrejectmapqc/' + workOrderId ; 

            var fd = new FormData();
            fd.append('workOrderId',workOrderId);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('viewReassignRemarksClick')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: '<?php echo app('translator')->get('words.workorder:'); ?>'+response.workOrder_name,
                            text: '<?php echo app('translator')->get('words.remark:'); ?>'+response.workorder_remarks,
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-success mx-2'
                            },
                            buttonsStyling: false
                        }).then(function (result) {
                                window.location.reload();
                            });
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'warning',
                            title: '<?php echo app('translator')->get('words.workorder'); ?>',
                            text: response.message,
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-success mx-2'
                            },
                            buttonsStyling: false
                        });
                    }
                },
            });
        }
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Dk3app_Final\Dk3app_Final\dk3app\resources\views/home_mapcreation.blade.php ENDPATH**/ ?>