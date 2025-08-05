

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
			<h5><?php echo app('translator')->get('words.editdp'); ?></h5>
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
							<div class="col-lg-4">
								<div class="input-group">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="inIVLFile" name="inIVLFile" <?php echo e($workOrder->ivl_file === 'Yes' ? 'checked' : ''); ?>>
										<label class="form-check-label" for="inIVLFile" id="labelIVLFile"></label>
									</div>
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
							<div class="col-lg-4">
								<div class="input-group">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="inPointCloud" name="inPointCloud" <?php echo e($workOrder->point_cloud === 'Yes' ? 'checked' : ''); ?>>
										<label class="form-check-label" for="inPointCloud" id="labelPointCloud"></label>
									</div>
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
							<div class="col-lg-4">
								<div class="input-group">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="inOrthoImages" name="inOrthoImages" <?php echo e($workOrder->ortho_images === 'Yes' ? 'checked' : ''); ?>>
										<label class="form-check-label" for="inOrthoImages" id="labelOrthoImages"></label>
									</div>
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
							<div class="col-lg-4">
								<div class="input-group">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="inKabelPlan" name="inKabelPlan" <?php echo e($workOrder->kable_plan === 'Yes' ? 'checked' : ''); ?>>
										<label class="form-check-label" for="inKabelPlan" id="labelKabelPlan"></label>
									</div>
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
							<div class="col-lg-4">
								<div class="input-group">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="inGeoReference" name="inGeoReference" <?php echo e($workOrder->geo_reference === 'Yes' ? 'checked' : ''); ?>>
										<label class="form-check-label" for="inGeoReference" id="labelGeoReference"></label>
									</div>
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
						<div class="row mt-4">    
							<div class="col-lg-2 pt-1 text-end">
								<label class="form-label"></label>
							</div>
							<div class="col-lg-6">
								<div class="col-lg-4">
									<button id="btnUploadIVLFile" onclick="updateDatapreparation();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.updatedp'); ?></button>
								</div>

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

	document.addEventListener('DOMContentLoaded', function () {
        const switches = document.querySelectorAll('.form-check-input');
        switches.forEach(function (switchEl) {
            switchEl.addEventListener('change', function () {
                const labelEl = document.querySelector('label[for=' + switchEl.id + ']');
                labelEl.textContent = switchEl.checked ? 'Yes' : 'No';
            });
        });
    });

	function updateDatapreparation() {

		var workOrderName = $.trim($('#inWorkOrderName').val());

		var fd = new FormData();
		fd.append('workOrderId', $("#inWorkOrderId").val());
		fd.append('ivlFileToggle', $('#inIVLFile').is(':checked') ? 'Yes' : 'No');
		fd.append('pointcloudToggle', $('#inPointCloud').is(':checked') ? 'Yes' : 'No');
		fd.append('orthoimagesToggle', $('#inOrthoImages').is(':checked') ? 'Yes' : 'No');
		fd.append('kableplanToggle', $('#inKabelPlan').is(':checked') ? 'Yes' : 'No');
		fd.append('georeferenceToggle', $('#inGeoReference').is(':checked') ? 'Yes' : 'No'); 
	
		fd.append('_token', '<?php echo e(csrf_token()); ?>');

		$.ajax({
			xhr: function() {
				var xhr = $.ajaxSettings.xhr();
				if (xhr.upload) {
					xhr.upload.addEventListener('progress', function(event) {
						var percent = 0;
						var position = event.loaded || event.position;
						var total = event.total;
						if (event.lengthComputable) {
							percent = Math.ceil(position / total * 100);
							console.log("Percent : " + percent);
						}
					}, true);
				}
				return xhr;
			},
			url: '<?php echo e(route('updateDatapreparation')); ?>',
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response.success) {
					Swal.fire({
						icon: 'success',
						title: '<?php echo app('translator')->get('words.editdp'); ?>',
						text: response.message,
						showCancelButton: false,
						customClass: {
							confirmButton: 'btn btn-success mx-2'
						},
						buttonsStyling: false
					}).then(function (result) {
						window.location.href = "/home_preproduction";
					});
				} else {
					Swal.fire({
						icon: 'warning',
						title: 'Edit Data Preparation',
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/datapreparation/editDatapreparation.blade.php ENDPATH**/ ?>