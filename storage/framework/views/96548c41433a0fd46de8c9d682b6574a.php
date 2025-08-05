

<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">

        <div class="container-fluid py-1 px-3">

            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homemodelcreation')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                            <?php echo app('translator')->get('words.pname'); ?>

                            </th>

                            <th class="text-sm text-center">

                            <?php echo app('translator')->get('words.status'); ?>

                            </th>

                          

                            <th class="text-sm text-center">

                            <?php echo app('translator')->get('words.action'); ?>

                            </th>

                        </tr>

                    </thead>

                             <tbody>

                                <?php $__currentLoopData = $workOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($workOrder->model_workorder_name !== null && $workOrder->status_code !== 'fake'): ?>
                                        <tr class="mt-2">
                                            <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->model_workorder_name); ?></td>
                                            <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->processname); ?></td>
                                            <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->description); ?></td>
                                            <td class="text-sm text-center font-weight-normal text-middle">
                                    <?php if($workOrder->status_code == '412'): ?>
                                            <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewRemarksClick("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-eye'></i>
                                            <?php echo app('translator')->get('words.viewremarks'); ?></span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '411'): ?>
                                            <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewRemarksClick("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-eye'></i>
                                            <?php echo app('translator')->get('words.viewremarks'); ?></span></button>
                                    <?php endif; ?>
                                    <?php if($workOrder->status_code == '402'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='queryClarification("<?php echo e($workOrder->modelarea_id); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.clarificationrequired'); ?>
                                            </span></button>
                                    <?php endif; ?>

                                    <?php if($workOrder->status_code == '401'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downfile()'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.download'); ?>
                                            </span></button>
                                    <?php endif; ?>
                                    
                                    <?php if($workOrder->status_code == '412'): ?> 
                                            <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='queryClarification("<?php echo e($workOrder->modelarea_id); ?>","<?php echo e($workOrder->status_code); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                            <?php echo app('translator')->get('words.clarificationrequired'); ?>
                                            </span></button>
                                    <?php endif; ?>
                                                <?php if($workOrder->status_code != '410' || $workOrder->status_code != '414'): ?>
                                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processClick("<?php echo e($workOrder->modelarea_id); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                                        <?php if($workOrder->status_code == '400'): ?> <?php echo app('translator')->get('words.assigntouser'); ?>
                                                        <?php elseif($workOrder->status_code == '401'): ?> <?php echo app('translator')->get('words.startmodelcreation'); ?> 
                                                        <?php elseif($workOrder->status_code == '402'): ?> <?php echo app('translator')->get('words.assigntoqc'); ?> 
                                                        <?php elseif($workOrder->status_code == '411'): ?> <?php echo app('translator')->get('words.completemodelcreation'); ?> 
                                                        <?php elseif($workOrder->status_code == '412'): ?> <?php echo app('translator')->get('words.restartmodelcreation'); ?>
                                                        <?php elseif($workOrder->status_code == '415'): ?> <?php echo app('translator')->get('words.reassignqc'); ?>
                                                        <?php endif; ?>
                                                        </span>
                                                    </button>
<!-- 
                                                    <?php if($workOrder->status_code == '402'): ?>
                                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processReassignClick("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                                        <?php echo app('translator')->get('words.reassign'); ?></span></button>
                                                    <?php endif; ?> -->

                                                    <?php if($workOrder->status_code == '412'): ?> 
                                                        <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downloadRevitMapDwg("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-download'></i>
                                                        <?php echo app('translator')->get('words.revitmodel'); ?></span></button>
                                                        <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downloadIFCMapDwg("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-download'></i>
                                                        <?php echo app('translator')->get('words.ifcmodel'); ?></span></button>

                                                      
                                                    <?php endif; ?>
                                                    <!-- <?php if($workOrder->status_code == '412' ): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='processReassignClick("<?php echo e($workOrder->modelarea_id); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                        <?php echo app('translator')->get('words.reassign'); ?></span></button>
                                    <?php endif; ?> -->
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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

    

    $("#workorder_name").on("change", function() 

    {

        

    });

  
    function queryClarification(workOrderId,status_code)
        {
            if (status_code=="402" || status_code=="412")
        {
            Swal.fire({
                    icon: 'warning',
                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                    text: '<?php echo app('translator')->get('words.pleaseconfirmtosetqueryformodelcreation'); ?>',
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
                        window.location.href = "/Queryclarificationmodel/"+workOrderId;
                        }
                });  
            return;  
        }
        }

    function processClick(workOrderId,status_code)

    {

        //alert( workOrderId +"," +status_code);

       // window.location.href = '/assignToSurvey/' + workOrderId;

       

       if (status_code=="400")

       {

         window.location.href = '/assignToUserModelCreation/' + workOrderId ;   

       }
       else if (status_code=="401")

       {

         Swal.fire({

                icon: 'warning',

                title: '<?php echo app('translator')->get('words.workorder'); ?>',

                text: '<?php echo app('translator')->get('words.pleaseconfirmtostartmodelcreation'); ?>',

                showCancelButton: true,

                customClass: {

                    confirmButton: 'btn btn-success mx-2',

                    cancelButton: 'btn btn-danger mx-2'

                },

                buttonsStyling: false

            }).then(function (result) {

                    if (result.isConfirmed)

                    {

                        startPreproduction(workOrderId);

                    }

              });  

         return;  

       }

       else if  (status_code=="411")
        { 
            $.ajax({
                url: '/checkToSurveyModel/' + workOrderId,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title:'<?php echo app('translator')->get('words.doyouwanttocompletethemodelcreation'); ?>',
                                text: response.message,
                                showCancelButton: true,
                                confirmButtonText: '<?php echo app('translator')->get('words.yes'); ?>',
                                cancelButtonText: '<?php echo app('translator')->get('words.no'); ?>'
                            }).then((result) => {
                            if (result.isConfirmed) {
                            
                                window.location.href = '/completemodelcreation/' + workOrderId ; 
                            }
                            }); 
                    } else {
                        // Work order does not exist, show error message
                        Swal.fire({
                            icon: 'error',
                            title: ' <?php echo app('translator')->get('words.noelementfoundformodelcreation'); ?>',
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
    //***************** */
    //    else if (status_code=="412")

    //     {
            
    //         window.location.href = '/reassignModelCreation/' + workOrderId ; 
            
    //     }
        // else if  (status_code=="102")

        // {

        //  window.location.href = '/completePreproduction/' + workOrderId ; 

        // }

        else if (status_code=="402")

       {

         

            Swal.fire({

                icon: 'warning',

                title: '<?php echo app('translator')->get('words.workorder'); ?>',

                text:  '<?php echo app('translator')->get('words.pleaseconfirmtoassignqc'); ?>',

                showCancelButton: true,

                customClass: {

                    confirmButton: 'btn btn-success mx-2',

                    cancelButton: 'btn btn-danger mx-2'

                },

                buttonsStyling: false

            }).then(function (result) {

                    if (result.isConfirmed)

                    {

                        window.location.href = '/assignqcmodel/' + workOrderId ; 

                        //startPreproduction(workOrderId);

                    }

              });  

         return;

       }
       else if (status_code=="415")
{

  

     Swal.fire({

         icon: 'warning',

         title: '<?php echo app('translator')->get('words.workorder'); ?>',

         text: '<?php echo app('translator')->get('words.pleaseconfirmtoreassignqc'); ?>',

         showCancelButton: true,

         customClass: {

             confirmButton: 'btn btn-success mx-2',

             cancelButton: 'btn btn-danger mx-2'

         },

         buttonsStyling: false

     }).then(function (result) {

             if (result.isConfirmed)

             {

                 window.location.href = '/assignqcmodel/' + workOrderId ; 

                 //startPreproduction(workOrderId);

             }

       });  

  return;

}

       else if  (status_code=="411")

        { 

            $.ajax({

        url: '/checkToSurveyModel/' + workOrderId,

        type: 'GET',

        success: function(response) {

            if (response.success) {

					Swal.fire({

						icon: 'success',

						title:'<?php echo app('translator')->get('words.doyouwanttocompletethemodelcreation'); ?>',

						text: response.message,

						showCancelButton: true,

						confirmButtonText: 'Yes',

						cancelButtonText: 'No'

					}).then((result) => {

					if (result.isConfirmed) {

					   

						window.location.href = '/completemodelcreation/' + workOrderId ; 

					}

					}); 

            } else {

                // Work order does not exist, show error message

                Swal.fire({

                    icon: 'error',

                    title: '<?php echo app('translator')->get('words.noelementfoundformodelcreation'); ?>',


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

         else if  (status_code=="110")

         {

            window.location.href = '/assignqc/' + workOrderId ; 

         }

        // else if(status_code=="403"){

           

        //     window.location.href = '/assignToSurvey/' + workOrderId;

        // }

       else if (status_code=="412")
           {
                // if (isBaseMapDownloaded == false)
                // {
                //     Swal.fire({
                //             icon: 'warning',
                //             title: '<?php echo app('translator')->get('words.modelcreation'); ?>',
                //             text: '<?php echo app('translator')->get('words.pleasedownloadtherevitdwgfile'); ?>',
                //             showCancelButton: false,
                //             customClass: {
                //                 confirmButton: 'btn btn-success mx-2'
                //             },
                //             buttonsStyling: false
                //         });
                //         return;
                // }
                
                // if (isSurveyMapDownloaded == false)
                // {
                //     Swal.fire({
                //             icon: 'warning',
                //             title: '<?php echo app('translator')->get('words.modelcreation'); ?>',
                //             text:'<?php echo app('translator')->get('words.pleasedownloadthedwgfileforifc'); ?>',
                //             showCancelButton: false,
                //             customClass: {
                //                 confirmButton: 'btn btn-success mx-2'
                //             },
                //             buttonsStyling: false
                //         });
                //         return;
                // }
                Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.modelcreation'); ?>',
                        text: '<?php echo app('translator')->get('words.pleaseconfirmtorestartmodelcreationdownloadfileatomatically'); ?>',
                        showCancelButton: true,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2',
                            cancelButton: 'btn btn-danger mx-2'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                            if (result.isConfirmed)
                            {
                                RestartPreproduction(workOrderId);
                            }
                    });  
                return;  
            }
    }

	

    function downloadFile(filePath) {
    window.open(filePath, '_blank');
}

	

	function downloadPreproductionFile( workOrderId)

	{

		var fd = new FormData();

            

        fd.append('workOrderId',workOrderId);

        

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

             

            url: '<?php echo e(route('get_last_modelqcfile')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){
            

                if (response.success) {
                // Iterate over the file paths and download each one
                response.file_paths.forEach(function(filePath) {
                    downloadFile(filePath);
                });
                    RestartPreproduction (workOrderId ); 

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

	

	function RestartPreproduction(workOrderId)

    {

        var fd = new FormData();

            

        fd.append('workOrderId',workOrderId);

        

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

             

            url: '<?php echo e(route('restartModelCreationPost')); ?>',

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

                                text: '<?php echo app('translator')->get('words.modelcreationstartedsuccessfully'); ?>',

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

	
    function viewRemarksClick(workOrderId){
            // window.location.href = '/viewrejectmapqc/' + workOrderId ; 

            var fd = new FormData();
            fd.append('workOrderId',workOrderId);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('viewQcmodelRemarks')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        console.log(response.workOrder_name);
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
    function startPreproduction(modelareaid)

    {

        var fd = new FormData();

            

        fd.append('modelareaid',modelareaid);
               

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

             

            url: '<?php echo e(route('startModelCreationPost')); ?>',

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

                                text: '<?php echo app('translator')->get('words.modelcreationstartedsuccessfully'); ?>',

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


        function downloadRevitMapDwg(workOrderId)
        {
            var fd = new FormData();
                
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                url: '<?php echo e(route('get_files_for_revits')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        downloadFile(response.revitmap_path);
                        isBaseMapDownloaded=true;
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.modelcreation'); ?>',
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

        function downloadIFCMapDwg(workOrderId)
        {
            var fd = new FormData(); 
            fd.append('workOrderId',workOrderId);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                
                url: '<?php echo e(route('get_files_for_revits')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success)
                    {
                        downloadFile(response.ifcmap_path);
                        isSurveyMapDownloaded=true;
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.modelcreation'); ?>',
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
        window.location.href = '/reassignModelCreation/' + workOrderId ; 
    }

    function downfile(workOrderId)

    {
        window.location.href = '/home_downloaddata/'; 
    }

    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/home_modelcreation.blade.php ENDPATH**/ ?>