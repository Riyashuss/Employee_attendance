
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.workorderassignmentforqc')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
        <div class="card-header  mt-1 pt-1">
            <h5><?php echo app('translator')->get('words.workorderassignmentforqc'); ?> </h5>
        </div>
        <div class="card-body mt-1 pt-1">
                <?php echo csrf_field(); ?>
             <?php
                $displayedFilePaths = [];
                $ivlFileDisplayed = false;
               
             ?>
             <div class="card card-custom">
                    <div id="cardBodyMain" class="card-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
                    
                                <div class="row mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                     <label class="form-label"><?php echo app('translator')->get('words.workorder'); ?> </label>
                                        
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
                                                value="<?php echo e($workOrder->name); ?>">
                                                <input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value=""> 
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="row  mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                            <label class="form-label"><?php echo app('translator')->get('words.remark'); ?> </label>
                                        </div>
                                            <div class="col-lg-4">
                                            <div class="input-group">
                                                <textarea id="remarks" name="remarks" class="form-control"  
                                                placeholder="Remark" value=""> </textarea>
                                            </div>
                                            <p id="remarks_error" class='text-danger text-xs pt-1'>  </p>
                                    </div>
                                </div> 
                              
                                <div class="row mt-6">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='Approved("<?php echo e($workOrder->id); ?>","<?php echo e($workOrder->status_code); ?>");'>
                                                <span class='btn-inner--icon'><i class='fa-solid fa-check'></i> <?php echo app('translator')->get('words.approve'); ?> </span>
                                            </button>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            
                                            <button class='btn btn-icon btn-2 btn-danger mb-0 me-1' type='button' onclick='rejected("<?php echo e($workOrder->id); ?>");'>
                                                <span class='btn-inner--icon'><i class='fa-solid fa-close'></i> <?php echo app('translator')->get('words.reject'); ?> </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
       
</div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
                <?php echo app('translator')->get('words.nmresultsfound'); ?>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/sweetalert.min.js"></script>
   
    <script>
    
    function downloadFile(filepath) {
        //var valFileDownloadPath = 'dks3/downloads/dks3tools.zip';
        //alert(filepath);
        window.open(filepath , '_blank');
       
    }
    
    function Approved(workOrderId, status_code) {


        var remarks = $.trim($('#remarks').val()); 
        //console.log(remarks);

        if($.trim(remarks) == "")
        {
            $('#remarks_error').html('<?php echo app('translator')->get('words.remarkshouldnotbeempty'); ?>');
            $('#remarks_error').show();
            
            return;
        }

        if (status_code=="113")
       {
         Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                text: '<?php echo app('translator')->get('words.pleaseconfirmtoapprovepreproduction'); ?>',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            }).then(function (result) {
                    if (result.isConfirmed)
                    {
                        approveWorkOrder(workOrderId);
                    }
                    
              });  
         return;  
       }
    }

    function rejected(workOrderId) {
    //     if (status_code=="110")
    //    {

        var remarks = $.trim($('#remarks').val()); 
        console.log(remarks);

        if($.trim(remarks) == "")
        {
            $('#remarks_error').html('<?php echo app('translator')->get('words.remarkshouldnotbeempty'); ?>');
            $('#remarks_error').show();
            
            return;
        }
         Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                text: '<?php echo app('translator')->get('words.pleaseconfirmtorejectpreproduction'); ?>',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            }).then(function (result) {
                    if (result.isConfirmed)
                    {
                        rejectedWorkOrder(workOrderId);
                    }
                    
              });  
         return;  
      // }
    }
    
    function approveWorkOrder(workOrderId) {
    // Get the CSRF token from the page's meta tag
    var fd = new FormData();
     remarks = $.trim($('#remarks').val()); 
            
            fd.append('workOrderId',workOrderId);
            fd.append('remarks', remarks);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
    // Make an AJAX request
    $.ajax({
        url: '<?php echo e(route('approveWorkOrder')); ?>',
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
                                text: '<?php echo app('translator')->get('words.preproductionapprovedsuccessfully'); ?>',
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            }).then(function (result) {
                                window.location.href = "/home_qcassign";
                              });
                }
        },
        error: function(xhr, status, error) {
            
        }
    });
}
function openQC(workOrderId) {
   
    window.location.href = '/openqc/' + workOrderId ; 
}
function rejectedWorkOrder(workOrderId) {
    // Get the CSRF token from the page's meta tag
    var fd = new FormData();
    remarks = $.trim($('#remarks').val()); 
            
            fd.append('workOrderId',workOrderId);
            fd.append('remarks', remarks);
            
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
                                text: '<?php echo app('translator')->get('words.preproductionrejectedsuccessfully'); ?>',
                                showCancelButton: false,
                                customClass: {
                                    confirmButton: 'btn btn-success mx-2'
                                },
                                buttonsStyling: false
                            }).then(function (result) {
                               // window.history.back();
                                window.location.href = "/home_qcassign";
                              });
                }
        },
        error: function(xhr, status, error) {
            
        }
    });
}
    
function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/Viewqcpre.blade.php ENDPATH**/ ?>