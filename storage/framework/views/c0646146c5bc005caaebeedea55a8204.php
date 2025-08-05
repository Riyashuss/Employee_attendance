
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homesurvey')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                    <li class="nav-item d-flex align-items-center">
                        <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <?php if(auth()->user()->id != 1): ?>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="#" onclick='profileSetting(<?php echo e(auth()->user()->id); ?>);'>
                            <span>
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
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.woname'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.pname'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.status'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.woarea'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.action'); ?></th>
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
                                    <?php if($workOrder->status_code == '305'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewClarificationRemarksClick("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        <?php echo app('translator')->get('words.viewquery'); ?></span>
                                    </button>
                                    <?php endif; ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processClick("<?php echo e($workOrder->workorderid); ?>", "<?php echo e($workOrder->status_code); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        <?php if($workOrder->status_code == '200'): ?> <?php echo app('translator')->get('words.assigntouser'); ?>
                                        <?php elseif($workOrder->status_code == '201'): ?> <?php echo app('translator')->get('words.startsurvey'); ?>
                                        <?php elseif($workOrder->status_code == '202'): ?> <?php echo app('translator')->get('words.completesurvey'); ?>
                                        <?php elseif($workOrder->status_code == '203'): ?> <?php echo app('translator')->get('words.assigntomapcreation'); ?>
                                        <?php elseif($workOrder->status_code == '205'): ?> <?php echo app('translator')->get('words.restartsurvey'); ?>
                                        <?php elseif($workOrder->status_code == '305'): ?> <?php echo app('translator')->get('words.assigntoresurvey'); ?> 
                                        <?php endif; ?>
                                        </span>
                                    </button>
                                    <?php if($workOrder->status_code == '201'): ?> 
                                        <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downloadBaseMapDwg("<?php echo e($workOrder->workorderid); ?>");'>
                                            <span class='btn-inner--icon'><i class='fa fa-download'></i>
                                            <?php echo app('translator')->get('words.basemap'); ?> 
                                            </span>
                                        </button>
                                        <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downloadSurveyMapDwg("<?php echo e($workOrder->workorderid); ?>");'>
                                            <span class='btn-inner--icon'><i class='fa fa-download'></i>
                                            <?php echo app('translator')->get('words.mapforsurvey'); ?> 
                                            </span>
                                        </button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '202'): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processReassignClick("<?php echo e($workOrder->workorderid); ?>");'>
                                            <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.reassign'); ?> 
                                            </span>
                                        </button>
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
        
        .text-middle {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/sweetalert.min.js"></script>
    <script>
        function profileSetting(user) {
            window.location.href = "/profileView/" + user;
        }

        var dtWorkOrders;
        var isBaseMapDownloaded = false;
        var isSurveyMapDownloaded = false;
        
        $(document).ready(function(){
            dtWorkOrders = $('#workOrderTable').DataTable({
                paging: true,
                pageLength: 10,
                searching: true,
                ordering: true,
                info: true,
                language: {
                    emptyTable: '<?php echo app('translator')->get('words.noworkorderavailable'); ?>'
                }
            });
        }); 
        
        $("#workorder_name").on("change", function() {
            // Handle change event
        }); 
        
        function downloadFile(filepath) {
            window.open(filepath , '_blank');
        }

        // function viewmapQuery(workOrderId) {
        //     window.location.href = '/viewmapquery/' + workOrderId;            
        // }

        function processClick(workOrderId, status_code) {        
            if (status_code == "200" || status_code == "305") {
                window.location.href = '/assignToUserSurvey/' + workOrderId;   
            } else if (status_code == "201") {
                if (!isBaseMapDownloaded) {
                    Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.survey'); ?>',
                        text: '<?php echo app('translator')->get('words.pleasedownloadthebasemapdwgfile'); ?>',
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                    return;
                }
                
                if (!isSurveyMapDownloaded) {
                    Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.survey'); ?>',
                        text: '<?php echo app('translator')->get('words.pleasedownloadthedwgfileforsurvey'); ?>',
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                    return;
                }

                Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.survey'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtostartsurveydownloadfileautomatically'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.isConfirmed) {
                        startSurvey(workOrderId);
                    }
                });  
                return;  
            } else if (status_code == "202") {
                window.location.href = '/completeSurvey/' + workOrderId; 
            } else if (status_code == "203") {
                window.location.href = '/surveyupload/' + workOrderId; 
            } else if (status_code == "205") {
                Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.survey'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtorestartsurvey'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.isConfirmed) {
                        startSurvey(workOrderId);
                    }
                });  
                return;  
            }
        }
        
        function downloadBaseMapDwg(workOrderId) {
            var fd = new FormData();
            fd.append('workOrderId', workOrderId);
            fd.append('_token', '<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('get_files_for_survey')); ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success) {
                        downloadFile(response.basemap_path);
                        isBaseMapDownloaded = true;
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
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
        
        function downloadSurveyMapDwg(workOrderId) {
            var fd = new FormData(); 
            fd.append('workOrderId', workOrderId);
            fd.append('_token', '<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('get_files_for_survey')); ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success) {
                        downloadFile(response.surveymap_path);
                        isSurveyMapDownloaded = true;
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
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
        
        function viewClarificationRemarksClick(workOrderId){
            // window.location.href = '/viewrejectmapqc/' + workOrderId ; 

            var fd = new FormData();
            fd.append('workOrderId',workOrderId);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('viewClarificationRemarksClick')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: '<?php echo app('translator')->get('words.workorder:'); ?>'+response.workOrdername,
                            html: '<span style="font-weight:bold;"><?php echo app('translator')->get('words.raisedby:'); ?></span>' + response.raisedby + '<br> <span style="font-weight:bold;"><?php echo app('translator')->get('words.querydescription:'); ?></span>' + response.clarification,
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

        function getFilesForSurvey(workOrderId) {
            var fd = new FormData();  
            fd.append('workOrderId', workOrderId);
            fd.append('_token', '<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('get_files_for_survey')); ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){   
                    if (response.success) {
                        downloadFile(response.basemap_path);
                        downloadFile(response.surveymap_path);
                        startSurvey(workOrderId);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
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
        
        function queryClick(workOrderId, status_code) {
            if (status_code == "202") {
                Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.survey'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtosetqueryforsurvey'); ?>',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.isConfirmed) {
                        window.location.href = '/Queryclarification/' + workOrderId;
                    }
                });  
                return;  
            }
        }
        
        function querySurvey(workOrderId) {
            var fd = new FormData();
            fd.append('workOrderId', workOrderId);
            fd.append('_token', '<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('querySurveyPost')); ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
                            text: '<?php echo app('translator')->get('words.surveyissetforclarification'); ?>',
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

        function startSurvey(workOrderId) {
            var fd = new FormData();  
            fd.append('workOrderId', workOrderId);
            fd.append('_token', '<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('startSurveyPost')); ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
                            text: '<?php echo app('translator')->get('words.surveystartedsuccessfully'); ?>',
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
                            title: '<?php echo app('translator')->get('words.survey'); ?>',
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
        
        function processReassignClick(workOrderId) {       
            window.location.href = '/reassignSurvey/' + workOrderId;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/home_survey.blade.php ENDPATH**/ ?>