
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl  mt-2 bg-primary">
		<div class="container-fluid py-1 px-3 ">
				<?php echo $__env->make('layouts.navbars.auth.topnav', ['title' =>trans('words.workorderassignment')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
			<h5><?php echo app('translator')->get('words.woassignmenttomapcreation'); ?></h5>
		</div>
		<div class="card-body mt-1 pt-1">
				<?php echo csrf_field(); ?>
				<div class="card card-custom">
					<div id="cardBodyMain" class="card-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
							<!--<hr class="my-1" />-->
								
								<div class="row mt-2">
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
										
									</div>
									
									<div class="col-lg-4 ">
										<div class="input-group">
											<input id="inWorkOrderName" name="inWorkOrderName" class="form-control" type="text" readonly
												value="<?php echo e($workOrder->name); ?>">
												<input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value="<?php echo e($workOrder->id); ?>"> 
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
										<label class="form-label"><?php echo app('translator')->get('words.workduration'); ?></label>
									</div>
									<div class="col-lg-6">
										<div class="input-group">
											<input id="inDuration" name="inDuration" class="form-control" type="number" 
												placeholder="<?php echo app('translator')->get('words.duration'); ?>" value="0">
										</div>
										<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<p  id="inDuration_error" class='text-danger text-xs pt-1'> <?php echo e($message); ?> </p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div>
									
								</div>
								
								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"></label>
									</div>
									
									<div class="col-lg-6">
										<button id="btnComplete" onclick="btnCompleteClick();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.completemapcreation'); ?></button>
										
									</div>		
																							
								</div>
								
								<!--<div class="row">
									<div class="col-lg-12 text-center">
										<button id="btnUpload" type="button" class="btn btn-success">Upload</button>
									</div>
								</div>-->
						
						<hr class="my-4" />
						
						
						
					</div>
				</div>
			
			
		</div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
	
    <style>
        .choices {
            margin-bottom: 0;
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
	document.addEventListener("DOMContentLoaded", function() {
    var durationInput = document.getElementById('inDuration');
    durationInput.addEventListener('input', function() {
        if (this.value < 0) {
            this.value = 0;
        }
		});
	});
	var workOrderName = "";
	
	var workOrderId = 0;
	
	
	$(document).ready(function() {
		
	
	});
	
	
	$("#inDuration").on("change", function() 
	{
		
		
	});
	
	
	function processComplete(workOrderId,workDuration)
	{
		var fd = new FormData();
		
		fd.append('workOrderId',workOrderId);
		fd.append('workDuration',workDuration);
		
		fd.append('_token','<?php echo e(csrf_token()); ?>');
		
		$.ajax({
			 
			url: '<?php echo e(route('completemapcreationPost')); ?>',
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
							text: '<?php echo app('translator')->get('words.workordercompleted'); ?>',
							showCancelButton: false,
							customClass: {
								confirmButton: 'btn btn-success mx-2'
							},
							buttonsStyling: false
						}).then(function (result) {
								window.location.href = "/home_mapcreation";
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
	
	function btnCompleteClick()
	{
		var workOrderId = $('#inWorkOrderId').val();
		var workDuration = $('#inDuration').val();
		
		if ($.trim(workDuration)=="")
		{
			workDuration=0;
		}
		
		Swal.fire({
				icon: 'warning',
				title: '<?php echo app('translator')->get('words.workorder'); ?>',
				html: '<?php echo app('translator')->get('words.pleaseconfirmtocompletemapcreationduration'); ?>' + workDuration +"(Hrs)",
				showCancelButton: true,
				customClass: {
					confirmButton: 'btn btn-success mx-2',
					cancelButton: 'btn btn-danger mx-2'
				},
				buttonsStyling: false
		}).then(function (result) {
				if (result.isConfirmed)
				{
					processComplete(workOrderId,workDuration);
				}
		  });  
		
		
		
	}
	
	
	
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/mapcreation/completemapcreation.blade.php ENDPATH**/ ?>