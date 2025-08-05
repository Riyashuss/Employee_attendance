

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl  mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.workorderassignment')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
			<h5><?php echo app('translator')->get('words.statusofdp'); ?></h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<?php echo csrf_field(); ?>
			<div class="card card-custom">
				<div id="cardBodyMain" class="card-body">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
						<div class="row mt-2">
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
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

						<div class="row mt-2">
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label"><?php echo app('translator')->get('words.ivlfile'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inIVLFile" name="inIVLFile" class="form-control rounded" type="text" readonly
										value="<?php echo e($workOrder->ivl_file); ?>">
									
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
								<label class="form-label"><?php echo app('translator')->get('words.pointcloud'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inPointCloud" name="inPointCloud" class="form-control rounded" type="text" readonly
										value="<?php echo e($workOrder->point_cloud); ?>">
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

						<div class="row mt-2">
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label"><?php echo app('translator')->get('words.orthoimages'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inOrthoImages" name="inOrthoImages" class="form-control" type="text" readonly
										value="<?php echo e($workOrder->ortho_images); ?>">
									
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
								<label class="form-label"><?php echo app('translator')->get('words.kabelplan'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inKabelPlan" name="inKabelPlan" class="form-control rounded" type="text" readonly
										value="<?php echo e($workOrder->kable_plan); ?>">
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
								<label class="form-label"><?php echo app('translator')->get('words.georeference'); ?></label>
							</div>
					
							<div class="col-lg-4 ">
								<div class="input-group">
									<input id="inGeoReference" name="inGeoReference" class="form-control rounded" type="text" readonly
										value="<?php echo e($workOrder->geo_reference); ?>">
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
	var userId = "";
	var remarks = "";
	var workOrderId = 0;

	$(document).ready(function() {

	});

  	function validateFileds(){
    	userId =$("#user_name").val();

	  	if (userId <= 0) {
			$("#user_name").focus();
			Swal.fire({
				icon: 'warning',
				title: '<?php echo app('translator')->get('words.username'); ?>',
				text: '<?php echo app('translator')->get('words.selecttheusername'); ?>',
				showCancelButton: false,
				customClass: {
					confirmButton: 'btn btn-success mx-2',
				},
				buttonsStyling: false
			}).then(function (result) {
			});
			return;
		} 

		remarks = $("#remarks").val();
		
		var errorMsg = "";

			if ($.trim(remarks)=="")
			{
				$("#remarks").focus();
				Swal.fire({
					icon: 'warning',
					title: '<?php echo app('translator')->get('words.remark'); ?>',
					text: '<?php echo app('translator')->get('words.pleaseenterifanyremark'); ?>',
					showCancelButton: false,
					customClass: {
						confirmButton: 'btn btn-success mx-2',
					},
					buttonsStyling: false
				}).then(function (result) {

					});
				return;
			}
        btnReassignClick();
    }

	function btnReassignClick()
	{	
		Swal.fire({
			icon: 'warning',
			title: '<?php echo app('translator')->get('words.workorder'); ?>',
			html: '<?php echo app('translator')->get('words.confirmreassignpreproduction'); ?>',
			showCancelButton: true,
			customClass: {
				confirmButton: 'btn btn-success mx-2',
				cancelButton: 'btn btn-danger mx-2'
			},

			buttonsStyling: false

			}).then(function (result) {
					if (result.isConfirmed)
					{
						processReassign();
					}
		  }); 
	}

	function processReassign()
	{
		var workOrderId = $('#inWorkOrderId').val();
		var userId = $('#user_name').val();	
		var remarks = $('#remarks').val();	
		var fd = new FormData();

		fd.append('workOrderId',workOrderId);
		fd.append('userId',userId);
		fd.append('remarks',remarks);

		fd.append('_token','<?php echo e(csrf_token()); ?>');

		$.ajax({
			url: '<?php echo e(route('reassignPreproductionPost')); ?>',
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
							text: '<?php echo app('translator')->get('words.workorderreassinedcompleted'); ?>',
							showCancelButton: false,
							customClass: {
								confirmButton: 'btn btn-success mx-2'
							},
							buttonsStyling: false
							}).then(function (result) {
								window.location.href = "/home_preproduction";
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/datapreparation/statusOfDatapreparation.blade.php ENDPATH**/ ?>