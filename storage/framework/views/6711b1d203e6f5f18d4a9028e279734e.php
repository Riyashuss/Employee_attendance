
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl  mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Work order assignment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
			<h5>Work Order assignment </h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<?php echo csrf_field(); ?>
			<div class="card card-custom">
				<div id="cardBodyMain" class="card-body">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
						
						<div class="row mt-2">
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label">Work Order Name</label>
								
							</div>
							
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
										placeholder="WorkOrder Name" value="<?php echo e($workOrder->name); ?>">
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
								<label class="form-label">Raised By</label>
							</div>
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="raisedby" name="raisedby" class="form-control rounded" type="text" readonly
										placeholder="Raised By " value="<?php echo e($queries->username); ?>">
									<input type="hidden" id="raisedbyId" name="raisedbyId" value=""> 
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
								<label class="form-label">Query</label>
							</div>
							<div class="col-lg-6">
								<div class="input-group">
									<input  id="query" name="query" class="form-control" type="textarea" 
											placeholder="Query" value="<?php echo e($queries->query_description); ?>" readonly >
								</div>
								
									<p id="query_error" class='text-danger text-xs pt-1'>  </p>
								
							</div>
							
						</div>
						
						<div class="row mt-4">															
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label"></label>
							</div>																		
						</div>
				
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
		var workOrderName = "";
		
		var workOrderId = 0;
		$(document).ready(function() {
		});
	
		function processReassignClick(workOrderId) {
			var fd = new FormData();
			fd.append('workOrderId', workOrderId);
			fd.append('_token', '<?php echo e(csrf_token()); ?>');
			
			$.ajax({
				url: '/reuploadmap/' + workOrderId,
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response.success) {
						Swal.fire({
							icon: 'success',
							title: 'WorkOrder',
							text: 'Reupload Map successfully',
							showCancelButton: false,
							customClass: {
								confirmButton: 'btn btn-success mx-2'
							},
							buttonsStyling: false
						}).then(function(result) {
							window.location.href = "/home";
						});
					}
				},
				error: function(xhr, status, error) {
				
				}
			});
		}
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/mapquery.blade.php ENDPATH**/ ?>