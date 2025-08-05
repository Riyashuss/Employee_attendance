

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Work order assignment to QC'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
			<h5>Work Order assignment to QC</h5>
		</div>
		<div class="card-body mt-1 pt-1">
				<?php echo csrf_field(); ?>

				<div class="card card-custom">

					<div id="cardBodyMain" class="card-body">

							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
							<!--<hr class="my-1" />-->
								
								<div class="row mt-2">
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label">Work Order Name</label>
										
									</div>
									
									<div class="col-lg-6 ">
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
										<label class="form-label">Company Name</label>
									</div>
									<div class="col-lg-6">
										<div class="input-group">
											<select class="form-control" name="company_name" id="company_name">
												<option value="0"></option>
												<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($company->id); ?>"
														<?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>
														<?php echo e($company->company_name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>   
										</div>
										
											<p id="company_name_error" class='text-danger text-xs pt-1'>  </p>
										
									</div>
									
								</div>
								

								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label">Map Creation File</label>
									</div>
									
					  
									<div class="col-lg-6">
										<div id="frmFiles1" class="form-group">
											<input id="file" type="file" name="file" class="form-control"  accept=".dwg">
										</div>
										
										<p id="file_error" class='text-danger text-xs pt-1'>  </p>
										
									
									</div>		
									<!--<div class="col-lg-4">
										<button id="btnValidate" onclick="processValidate();" type="button" class="btn btn-success m-0 ms-2">Upload and Validate</button>
									</div>-->														
								</div>
								
								
								
								
								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"></label>
									</div>
									
									<div class="col-lg-6">
										<div class="col-lg-4">
											<button id="btnUploadIVLFile" onclick="uploadIVLFile();" type="button" class="btn btn-success m-0 ms-2">Assign To QC</button>
										</div>
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
	
	var workOrderName = "";
	
	var workOrderId = 0;
	
	
	var fileTypes = [,
					{ "ext" : ".dwg", "type" : "Autocad Dwg" }];

	$(document).ready(function() {
		
	
	});
	
	$("#file1").on("change", function() {
		
		if ($('#file1')[0].files.length==1) {
			$('#file_error').hide();
			return;
		}
		else if ($('#file1')[0].files.length==0)
		{
			$('#file_error').html("Please select a IVL file");
			$('#file_error').show();
		}
		else
		{
			$('#file_error').html("Please select one file only");
			$('#file_error').show();
		}
		
		
	});
	
	$("#company_name").on("change", function() 
		{
			$('#company_name_error').html("");
			$('#company_name_error').hide();
			
		});
	
	
	
        function uploadIVLFile()
	{
		$('#company_name_error').hide();
		$('#file_error').hide();
		
		var companyId = $.trim($('#company_name').val()); 
		
		var workOrderName = $.trim($('#inWorkOrderName').val()); 
			
		if(parseInt(companyId) === 0)
		{
			$('#company_name_error').html('CompanyName should not be empty');
			$('#company_name_error').show();
			return;
		}
		
		if ($('#file')[0].files.length==0)
		{
			$('#file_error').html("Please select a Mapcreation file");
			$('#file_error').show();
			return;
		}
		else if ($('#file')[0].files.length>1)
		{
            $('#file_error').html("Please select one Mapcreation file only");
			$('#file_error').show();
			return;
		}
        if (!($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_mapcreation"))
		{
			$('#file_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_Mapcreation'");
			$('#file_error').show();
			return;
		}
		
		
		
		var fd = new FormData();
			
			var dfile = $('#file')[0].files[0];
			fd.append('file',dfile);
			fd.append('workOrderId',$("#inWorkOrderId").val());
			fd.append('companyId',companyId);
			
			fd.append('_token','<?php echo e(csrf_token()); ?>');
			
			$.ajax({
				 xhr: function() {
					var xhr = $.ajaxSettings.xhr();
					if (xhr.upload) {
						xhr.upload.addEventListener('progress', function(event) {
							var percent = 0;
							var position = event.loaded || event.position;
							var total = event.total;
							if (event.lengthComputable)
							{
								percent = Math.ceil(position / total * 100);
								console.log("Percent : " + percent);
							}
								
							
							
						}, true);
					}
					return xhr;
				},
				url: '<?php echo e(route('file.upload.dwgForMapQC')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					
					if (response.success)
					{
                        console.log(response);
						Swal.fire({
									icon: 'success',
									title: 'Company : ' + response.companyName,
									text: "WorkOrder is assigned For QC successfully",
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
                                    title: 'Company',
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
	
	
	function getFileType(name1)
	{
		
		for(var i=0;i<fileTypes.length;i++)
		{
			if (name1.endsWith(fileTypes[i].ext))
			{
				return fileTypes[i];
			}
		}
		
		return { "ext" : "", "type" : "Other Documents" };
	}
	
	
	
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/workorder/mapqc.blade.php ENDPATH**/ ?>