
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homemodelareaassignment')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <?php echo app('translator')->get('words.modelareaname'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.woname'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.action'); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
    <?php $__currentLoopData = $groupedWorkOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelAreaName => $workOrders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $allValid = $workOrders->every(function($workOrder) {
                return $workOrder->processstep_id == 4 && $workOrder->status_code == 303;
            });
            $modelId = $allValid ? $workOrders->first()?->model_id : null;
        ?>
        
        <tr>
            <td class="text-sm text-center font-weight-normal text-middle">
                <?php echo e($modelAreaName); ?>

            </td>
            <td class="text-sm text-center font-weight-normal text-middle">
                <?php $__currentLoopData = $workOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $disabledStatusCodes = [
                            0,101,102,103,104,105,110,111,112,113,114,155,
                            200,201,202,203,205,210,211,212,213,214,215,
                            301,302,300,305,310,311,312,313,314,315
                        ];
                        $disabledStatusCodesStrict = [
                            400,401,402,404,405,410,411,412,413,414,415,403,420
                        ];

                        // Determine the button class
                        $buttonClass = ($workOrder->status_code == 303) 
                            ? 'btn-success' 
                            : ($workOrder->msd_id ? 'btn-success' : 'btn-danger');

                        // Determine if the button should be disabled
                        $disabled = in_array($workOrder->status_code, $disabledStatusCodes) || in_array($workOrder->modelarea_status_code, $disabledStatusCodesStrict);
                    ?>

                    <button 
                        onclick='processClick("<?php echo e($workOrder->model_id); ?>", "<?php echo e($workOrder->workorderid); ?>", "<?php echo e($workOrder->status_code); ?>");' 
                        class="btn <?php echo e($buttonClass); ?>"
                        <?php if($disabled): ?> disabled <?php endif; ?>
                    >
                        <span class='btn-inner--icon'>
                            <?php if($workOrder->modelarea_status_code == '400'): ?> <?php echo app('translator')->get('words.401'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '401'): ?> <?php echo app('translator')->get('words.401'); ?> 
                            <?php elseif($workOrder->modelarea_status_code == '402'): ?> <?php echo app('translator')->get('words.402'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '412'): ?> <?php echo app('translator')->get('words.412'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '413'): ?> <?php echo app('translator')->get('words.413'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '411'): ?> <?php echo app('translator')->get('words.411'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '410'): ?> <?php echo app('translator')->get('words.410'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '414'): ?> <?php echo app('translator')->get('words.414'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '415'): ?> <?php echo app('translator')->get('words.415'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '403'): ?> <?php echo app('translator')->get('words.403'); ?>
                            <?php elseif($workOrder->modelarea_status_code == '420'): ?> <?php echo app('translator')->get('words.420'); ?>
                            <?php endif; ?>
                            <?php echo e($workOrder->workordername); ?>

                        </span>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                
            <button 
                onclick='viewStatus("<?php echo e($workOrder->model_id); ?>");' 
                class="btn btn-success">
                <span class='btn-inner--icon'><?php echo app('translator')->get('words.viewstatus'); ?></span>
            </button>

                  
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
        
    var  dtWorkOrders;
    var isBaseMapDownloaded = false;
    var isSurveyMapDownloaded = false;
     
    $(document).ready(function(){
        
        dtWorkOrders = $('#workOrderTable').DataTable({
            paging: true,
            pageLength: 10,
            searching: true,
            ordering:  true,
            info : true,
            language: {
                emptyTable: '<?php echo app('translator')->get('words.nowoavailableformodel'); ?>'
            }
            
        });
        
    }); 
    
    function viewStatus(modelIds) {
        var fd = new FormData();
        fd.append('modelIds', modelIds);
        fd.append('_token', '<?php echo e(csrf_token()); ?>');

        $.ajax({
            url: '<?php echo e(route('viewStatus')); ?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    let workOrders = response.workOrders;
                    let workOrderDetails = workOrders.map(order => 
                        `<strong>${order.workOrder_name}</strong> (Status: ${order.status_description}, User: ${order.assigned_username})`
                    ).join('<br>');

                    Swal.fire({
                        icon: 'success',
                        title: 'Work Orders Details',
                        html: workOrderDetails,
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Work Order',
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

    
    function processClick(modelareaId,workorderId,status_code)
    {
       console.log( workorderId +"," +status_code+","+modelareaId);
       // window.location.href = '/assignToSurvey/' + workOrderId;
       
        // if (status_code=="303")
        // {
         window.location.href = '/assignToMapAttribute/' + modelareaId + '/' + workorderId; ;   
    //   }
       
    }
    
        
       </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Dk3app_Final\Dk3app_Final\dk3app\resources\views/home_modelarea.blade.php ENDPATH**/ ?>