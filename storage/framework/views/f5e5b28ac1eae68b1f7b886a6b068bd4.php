
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homeqc')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
                                    
                                <!-- <?php if($workOrder->status_code == '310'): ?>
                                <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='openMapQC("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>View QC</span></button>
                                <?php endif; ?> -->
                                <?php if($company && $company->default_user_id == auth()->user()->id && $workOrder->status_code == '310' ): ?>
                                <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' 
                                            onclick='Assignuserqcmap("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assignqctouser'); ?></span>
                                </button>
                                <?php endif; ?>
                                
                                                <?php if( $workOrder->status_code == '313'|| $workOrder->status_code == '314'): ?>
                                                <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processClick("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                                    <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                                    
                                                        <?php if($workOrder->status_code == '313'): ?> <?php echo app('translator')->get('words.completeqc'); ?>
                                                        <?php elseif($workOrder->status_code == '314'): ?> <?php echo app('translator')->get('words.startqc'); ?>
                                                        <?php endif; ?>
                                                    </span>
                                                </button>    
                                            
                                            </span>
                                    </button>    
                                    <?php endif; ?>
                                    
                                <!-- <?php if($workOrder->status_code == '310' && $company && $company->default_user_id == auth()->user()->id): ?>
                                <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' 
                                            onclick='Assignuserqcmap("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>Assign QC TO user</span>
                                </button>
                                <?php endif; ?> -->
                                    <!--<?php if($workOrder->status_code == '110'): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button'onclick='Approved("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>"); '><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        Approved</span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '110'): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='rejectedWorkOrder("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        Rejected</span></button>
                                    <?php endif; ?> -->
                                
                                    <!-- <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='openMapQC("<?php echo e($workOrder->workorderid); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>View QC</span></button> -->
                                
                                
                                    </td>
                            </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
              <?php echo app('translator')->get('words.nmresultsfound'); ?>
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
            function profileSetting(user){
            window.location.href = "/profileView/"+user;
        }
        var  dtWorkOrders;
        
        $(document).ready(function(){
            
            dtWorkOrders = $('#workOrderTable').DataTable({
                paging: true,
                pageLength: 10,
                searching: true,
                ordering:  true,
                info : true,
                language: {
                    emptyTable: '<?php echo app('translator')->get('words.noworkorderavailableformapcreation'); ?>'
                }
                
            });
            
        }); 
        
        $("#workorder_name").on("change", function() 
        {
            
        });
            
        function processClick(workOrderId,status_code)
{
    
   
        
        
         if (status_code=="314")
        {
                Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                text: '<?php echo app('translator')->get('words.pleaseconfirmtostartqcthelatestmapfilewillbedownloadedautomatically'); ?>',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
                }).then(function (result) {
                    if (result.isConfirmed)
                    {
                        downloadqcFile( workOrderId);
                    }
                }); 
        }
          else if (status_code=="313")
{
        Swal.fire({
        icon: 'warning',
        title: '<?php echo app('translator')->get('words.workorder'); ?>',
        text: '<?php echo app('translator')->get('words.doyouwanttocompletetheqc'); ?>',
        showCancelButton: true,
        customClass: {
            confirmButton: 'btn btn-success mx-2',
            cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
        }).then(function (result) {
            if (result.isConfirmed)
            {
                openMapQC(workOrderId) ;
            }
        }); 
  }
}
    function downloadFile(filepath) 
    {
    //var valFileDownloadPath = 'dks3/downloads/dks3tools.zip';
    //alert(filepath);
    window.open(filepath , '_blank');
    }
    function downloadqcFile( workOrderId)
    {
        var fd = new FormData();
            
        fd.append('workOrderId',workOrderId);
        
        fd.append('_token','<?php echo e(csrf_token()); ?>');
        
        $.ajax({
             
            url: '<?php echo e(route('get_last_preqcfile')); ?>',
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
                
                if (response.success)
                {
                    //console.log(response.file_path);
                    downloadFile(response.file_path);
                    startqc (workOrderId ); 
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
    
        
    function startqc(workOrderId)
{
    var fd = new FormData();
        
    fd.append('workOrderId',workOrderId);
    
    fd.append('_token','<?php echo e(csrf_token()); ?>');
    
    $.ajax({
         
        url: '<?php echo e(route('startMapqcPost')); ?>',
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
                            text: '<?php echo app('translator')->get('words.qcstartedsuccessfully'); ?>',
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
    function openMapQC(workOrderId) {
    
        window.location.href = '/openmapqc/' + workOrderId ; 
    }
    function Assignuserqcmap(workOrderId) {
   
   window.location.href = '/assignuserqcmap/' + workOrderId ; 
}
    function rejectedWorkOrder(workOrderId) 
    {
            // Get the CSRF token from the page's meta tag
            var fd = new FormData();
                    
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
                    
            // Make an AJAX request
            $.ajax({
                url: '<?php echo e(route('rejectedWorkOrder')); ?>',
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
                                        text: '<?php echo app('translator')->get('words.mapcreationrejectedsuccessfully'); ?>',
                                        showCancelButton: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success mx-2'
                                        },
                                        buttonsStyling: false
                                    }).then(function (result) {
                                            window.location.reload();
                                    });
                        }
                },
                error: function(xhr, status, error) {
                    
                }
            });
        }
            
    
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/home_mapqc.blade.php ENDPATH**/ ?>