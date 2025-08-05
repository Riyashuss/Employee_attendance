



<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl  mt-2 bg-primary">

        <div class="container-fluid py-1 px-3 ">

            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.newworkorder')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

			<h5><?php echo app('translator')->get('words.newworkordersss'); ?></h5>

		</div>

		<div class="card-body mt-1 pt-1">

			<form method="POST" action="<?php echo e(route('wo_create.store')); ?>" enctype="multipart/form-data">

				<?php echo csrf_field(); ?>

				<div class="row">

					<div class="col-lg-6  mt-2">

						<label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>

						<div class="input-group">

							<input id="inWorkOrderName" name="inWorkOrderName" class="form-control" type="text"

								placeholder="<?php echo app('translator')->get('words.woname'); ?>" value="">

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

					

					<div class="col-lg-6  mt-2">

						<label class="form-label"><?php echo app('translator')->get('words.woarea'); ?></label>

						<select name="selWorkarea" id="selWorkarea" class="form-control">

							<option value="">...</option>									

							<?php $__currentLoopData = $workAreaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workArea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option value='<?php echo e($workArea->id); ?>'><?php echo e($workArea->workarea_name); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    

						</select>                               

					</div>

				</div>

				

				<div class="row">

					<div class="col-lg-6 mt-2">

						<label class="form-label"><?php echo app('translator')->get('words.plannedstartdate'); ?></label>

						<div class="input-group">

							<input id="startdate" name="startdate" class="form-control" type="date" value="" onfocus="this.showPicker()">

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

				

					<div class="col-lg-6 mt-2">

						<label class="form-label"><?php echo app('translator')->get('words.plannedenddate'); ?></label>

						<div class="input-group">

							<input id="enddate" name="enddate" class="form-control" type="date" value="" onfocus="this.showPicker()">

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





				<div class="d-flex justify-content-center mt-4">                                

					<button id="btnCreate" onclick="createWorkOrder();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.create'); ?></button>

				</div>

			</form>

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

	var workAreaId = 0;

	var workAreaName = "";

	var startDateTxt = "";

	var endDateTxt = "";

	var workOrderId = 0;

	

	$(document).ready(function() {

		

	});

	

	

	function createWorkOrder() {

		workOrderName = $("#inWorkOrderName").val();

		var errorMsg = "";

		if ($.trim(workOrderName)=="")
		{
			$("#inWorkOrderName").focus(); 

			Swal.fire({
				icon: 'warning',
				title: '<?php echo app('translator')->get('words.workorder'); ?>',
				text: '<?php echo app('translator')->get('words.pleaseenterworkordername'); ?>',

				//html: '<div class="form-group"><label class="form-label">Please enter Work Order Name.</label></div>',

				showCancelButton: false,
				customClass: {
				  confirmButton: 'btn btn-success mx-2',
				  //cancelButton: 'btn btn-danger mx-2'
				},
				buttonsStyling: false
			  }).then(function (result) {
				
				});
		
			  return;
		}

		

		var pattern = /^\d{4}[A-Z]{2}$/ ;

		

		if (!pattern.test(workOrderName)) {

			 

			$("#inWorkOrderName").focus();

			  

			Swal.fire({

				icon: 'warning',

				title: '<?php echo app('translator')->get('words.workorder'); ?>',

				title: '<?php echo app('translator')->get('words.invalidworkorderformat'); ?>',

				//html: '<div class="form-group"><label class="form-label">Invalid Work Order Name format!</label></div>',

				showCancelButton: false,

				customClass: {

				  confirmButton: 'btn btn-success mx-2',

				  //cancelButton: 'btn btn-danger mx-2'

				},

				buttonsStyling: false

			}).then(function (result) {

				

				});

			  

			  return;

		  } 

		

		var fd = new FormData();

		

		fd.append('workOrderName',workOrderName);

		

		fd.append('_token','<?php echo e(csrf_token()); ?>');

		

		$.ajax({

			 

			url: '<?php echo e(route('check_workordername')); ?>',

			type: 'post',

			data:fd,

			contentType: false,

			processData: false,

			success: function(response){

				if(response.result){

					$('#inWorkOrderName').focus();

					//console.log(response);

					//alert(response.result);

					Swal.fire({

						icon: 'warning',

						title: '<?php echo app('translator')->get('words.workorder'); ?>',

						text: '<?php echo app('translator')->get('words.workordernamealreadyexists'); ?>',

						//html: '<div class="form-group"><label class="form-label">Work Order Name Already Exists.</label></div>',

						showCancelButton: false,

						customClass: {

						  confirmButton: 'btn btn-success mx-2'

						},

						buttonsStyling: false

					  }).then(function (result) {

						$('#inWorkOrderName').val('').focus();

					  });

				  

				}else{

					validateFileds();

				}

				

			},

		});

	}

	function validateFileds(){



		workAreaId =$("#selWorkarea").val();

		

		if (workAreaId <= 0) {

			 

			$("#selWorkarea").focus();

			  

			Swal.fire({

				icon: 'warning',

				title: '<?php echo app('translator')->get('words.workorder'); ?>',

				text: '<?php echo app('translator')->get('words.pleaseselecttheworkarea'); ?>',

				//html: '<div class="form-group"><label class="form-label">Please select the workarea!</label></div>',

				showCancelButton: false,

				customClass: {

				  confirmButton: 'btn btn-success mx-2',

				  //cancelButton: 'btn btn-danger mx-2'

				},

				buttonsStyling: false

			  }).then(function (result) {

				

			  });

			  

			  return;

		} 

		if($("#startdate").val() == "")

		{

			Swal.fire({

				icon: 'warning',

				title: '<?php echo app('translator')->get('words.workorder'); ?>',

				text: '<?php echo app('translator')->get('words.pleaseselectstartdate'); ?>',

				//html: '<div class="form-group"><label class="form-label">Please Select EndDate </label></div>',

				showCancelButton: false,

				customClass: {

				  confirmButton: 'btn btn-success mx-2',

				  //cancelButton: 'btn btn-danger mx-2'

				},

				buttonsStyling: false

			  }).then(function (result) {

				

			  });

			  

			  return;

		}
		

		startDateTxt =$("#startdate").val();

		

		if($("#enddate").val() == "")

		{

			Swal.fire({

				icon: 'warning',

				title: '<?php echo app('translator')->get('words.workorder'); ?>',

				text: '<?php echo app('translator')->get('words.pleaseselectenddate'); ?>',

				//html: '<div class="form-group"><label class="form-label">Please Select EndDate </label></div>',

				showCancelButton: false,

				customClass: {

				  confirmButton: 'btn btn-success mx-2',

				  //cancelButton: 'btn btn-danger mx-2'

				},

				buttonsStyling: false

			  }).then(function (result) {

				

			  });

			  

			  return;

		}

		

		endDateTxt =$("#enddate").val();

		

		

		

		sendCreateRequest();

			

	}

	

	

	function sendCreateRequest()

	{		

		var fd = new FormData();

		

		fd.append('workOrderName',workOrderName);

		fd.append('workAreaId',workAreaId);

		fd.append('workAreaName',workAreaName);

		fd.append('planned_startdate',startDateTxt);

		fd.append('planned_enddate',endDateTxt);

		

		fd.append('_token','<?php echo e(csrf_token()); ?>');

		

		$.ajax({

			 

			url: '<?php echo e(route('workorder_create')); ?>',

			type: 'post',

			data:fd,

			contentType: false,

			processData: false,

			success: function(response){

			 workOrderId = response.workorderid;

				Swal.fire({

					icon: 'success',

					title: workOrderName,

					text: '<?php echo app('translator')->get('words.workordercreatedsuccessfully'); ?>',

					//html: '<div class="form-group"><label class="form-label">Work Order Name Already Exists.</label></div>',

					showCancelButton: false,

					customClass: {

					  confirmButton: 'btn btn-success mx-2'

					},

					buttonsStyling: false

				  }).then(function (result) {

						window.location.href = "/home";

				  });
			},
		});
	}
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Employee_attendance\resources\views/laravel/project/create_project.blade.php ENDPATH**/ ?>