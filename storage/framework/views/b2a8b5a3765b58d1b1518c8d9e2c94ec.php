
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Work Order for QC'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            
			<ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
				
				<li class="nav-item d-flex align-items-center">
					<?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</li>
				<!-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
					<a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line bg-white"></i>
							<i class="sidenav-toggler-line bg-white"></i>
							<i class="sidenav-toggler-line bg-white"></i>
						</div>
					</a>
				</li> -->
				<li class="nav-item px-3 d-flex align-items-center">
					<a href="#" onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
						<span class=''>
							<i class="fa fa-user me-sm-0" style="color: white;"></i>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
        <div class="card-header  mt-1 pt-1">
            <h5>Work Order for QC </h5>
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
                                     <label class="form-label">WorkOrder</label>
                                        
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
                                                placeholder="WorkOrder Name" value="<?php echo e($workOrder->name); ?>">
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
                              <div class="row mt-2">
                                            <div class="col-lg-2 pt-1 text-end">
												<label class="form-label">File Name</label>
                                            </div>
                                            <div class="col-lg-8">
                                            <div class="input-group">
                                                <input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
                                                    placeholder="WorkOrder Name" value="<?php echo e($drawing->name); ?>">
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
								<div class="row mt-2">
									<div class="col-lg-2">
										
									</div>
									<div class="col-lg-10">
										 <button class='btn btn-icon btn-2 btn-info mb-0 me-1' type='button' onclick='downloadFile("<?php echo e($drawing->file_path); ?>");'>
											<span class='btn-inner--icon'><i class='fa fa-download'></i> Download</span>
										</button>
									</div>
								</div>
                                        
                                <div class="row mt-6">
									<div class="col-lg-4">
									</div>
									<div class="col-lg-2">
										<div class="input-group">
											<button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='Approved("<?php echo e($workOrder->id); ?>","<?php echo e($workOrder->status_code); ?>");'>
												<span class='btn-inner--icon'><i class='fa-solid fa-check'></i> Approve</span>
											</button>
											
										</div>
									</div>
									<div class="col-lg-2">
										<div class="input-group">
											
											<button class='btn btn-icon btn-2 btn-danger mb-0 me-1' type='button' onclick='rejected("<?php echo e($workOrder->id); ?>");'>
												<span class='btn-inner--icon'><i class='fa-solid fa-close'></i> Reject</span>
											</button>
										</div>
									</div>
								</div>
       
</div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
              No matching results found.
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
        if (status_code=="110")
       {
         Swal.fire({
                icon: 'warning',
                title: 'WorkOrder',
                text: "Please confirm to Approved Pre Production",
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
         Swal.fire({
                icon: 'warning',
                title: 'WorkOrder',
                text: "Please confirm to reject Pre Production",
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
            
            fd.append('workOrderId',workOrderId);
            
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
                                title: 'WorkOrder',
                                text: "Preproduction Approved successfully",
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
                                title: 'WorkOrder',
                                text: "Preproduction Rejected successfully",
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ramesh\Projectstart\dk3app-04-05\dk3app\resources\views/Viewqcpre.blade.php ENDPATH**/ ?>