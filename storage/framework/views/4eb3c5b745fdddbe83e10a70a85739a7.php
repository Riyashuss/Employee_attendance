
<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.woatoqc')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
			<h5><?php echo app('translator')->get('words.woatoqc'); ?></h5>
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
									<div class="col-lg-6 ">
										<div class="input-group">
											<input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
												value="<?php echo e($workOrder->model_workorder_name); ?>">
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
									<label class="form-label"> <?php echo app('translator')->get('words.company'); ?> </label>
									</div>
									<div class="col-lg-6">
									<div class="input-group">
										<input id="inCompanyName" name="inCompanyName" class="form-control rounded" type="text" readonly
										value="<?php echo e($companies->company_name); ?>">
										<input type="hidden" id="inCompanyId" name="inCompanyId" value="<?php echo e($companies->id); ?>">  
									</div>
                                    </div>
								</div>
								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"><?php echo app('translator')->get('words.revitfile'); ?></label>
									</div>
									<div class="col-lg-6">
										<div id="frmFiles1" class="form-group">
											<input id="file1" type="file" name="file1" class="form-control"  accept=".rvt">
										</div>
										<p id="file1_error" class='text-danger text-xs pt-1 errmsg'>  </p>
									</div>		
								</div>
								
								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"><?php echo app('translator')->get('words.ifcfile'); ?></label>
									</div>
									<div class="col-lg-6">
										<div id="frmFiles2" class="form-group">
											<input id="file2" type="file" name="file2" class="form-control"  accept=".ifc">
										</div>
										<p id="file2_error" class='text-danger text-xs pt-1 errmsg'>  </p>
									</div>		
								</div>
								<div class="row mt-4">
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"></label>
									</div>
									<div class="col-lg-6">
										<div class="col-lg-4">
											<button id="btnUploadIVLFile" onclick="processUpload();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.assigntoqc'); ?></button>
										</div>
									</div>
								</div>

					<!--	<hr class="my-4" />-->
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
	var companyName = "";
	var workOrderId = 0;
	var companyId = 0;
	var RevitName = "";
	var IFCName = "";
	
	var RevitNameServer = "";
	var IFCNameServer = "";
	var RevitFileServerPath = "";
	var IFCFileServerPath = "";
	var fileTypes = [,
					{ "ext" : ".dwg", "type" : "Autocad Dwg" }];
	$(document).ready(function() {

	});
    $("#file1").on("change", function() {
		workOrderName = $.trim($('#inWorkOrderName').val());

		if ($('#file1')[0].files.length==1) {
			$('#file1_error').hide();
		}
		else if ($('#file1')[0].files.length==0)
		{
			$('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectrevitfile'); ?>');
			$('#file1_error').show();
		}
		else
		{
			$('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
			$('#file1_error').show();
		}
		//alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
		if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_"+workOrderName.toLowerCase()))
		{
			//alert("123");
			$('#file1_error').html("Invalid File. File name should start with '" + "DKS3_"+workOrderName+"'");
			$('#file1_error').show();
			return;
		}

	});
	$("#file2").on("change", function() {
		workOrderName = $.trim($('#inWorkOrderName').val());

		if ($('#file2')[0].files.length==1) {
			$('#file2_error').hide();
		}
		else if ($('#file2')[0].files.length==0)
		{
			$('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectifcfile'); ?>');
			$('#file2_error').show();
		}
		else
		{
			$('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
			$('#file2_error').show();
		}
		//alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
		if (!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_"+workOrderName.toLowerCase()))
		{
			//alert("123");
			$('#file2_error').html("Invalid File. File name should start with '" + "DKS3_"+workOrderName+"'");
			$('#file2_error').show();
			return;
		}

	});
	$("#inCompanyId").on("change", function()
		{
			$('#inCompanyId').html("");
			$('#inCompanyId').hide();
		});
		function processUpload()
		{
			
		     	var isError = false;
				
				$('.errmsg').hide();
				
				
				companyId = $.trim($('#inCompanyId').val()); 
				console.log('companyId:', companyId);
				
				workOrderName = $.trim($('#inWorkOrderName').val()); 
				
				workOrderId = $.trim($('#inWorkOrderId').val()); 
				
				
					
				if(parseInt(companyId) === 0)
				{
					$('#inCompanyId').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
					$('#inCompanyId').show();
					isError = true;
				}
				
				if ($('#file1')[0].files.length==0)
				{
					$('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectrevitfile'); ?>');
					$('#file1_error').show();
					isError = true;
					
				}
				else if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase())) {
						$('#file1_error').html("Invalid File. File name should start with 'DKS3_" + workOrderName + "'");
						$('#file1_error').show();
					    isError = true;
			    }
				
				
				if ($('#file2')[0].files.length==0)
				{
					$('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectifcfile'); ?>');
					$('#file2_error').show();
					isError = true;
					
					
				}
				else if(!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase())) {
					$('#file2_error').html("Invalid File. File name should start with 'DKS3_" + workOrderName+ "'");
					$('#file2_error').show();
					isError = true;
				}
			
			if (!isError)
			{
				
				RevitName = $('#file1')[0].files[0].name;
				IFCName = $('#file2')[0].files[0].name;
				// preproductionMapName = $('#file3')[0].files[0].name;
				
				uploadRevitMapDwg();

		
			}	
		}

		function uploadRevitMapDwg()
	{
		console.log("hi company".companyId);
		var fd = new FormData();
			
			var dfile = $('#file1')[0].files[0];
			
			fd.append('file',dfile);
			fd.append('workOrderName',workOrderName);
			fd.append('workOrderId',workOrderId);
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
								
							//var r1 =  dtFilesToUpload.row(fileIdx).data();
							//r1.prgvalue = percent;
							//dtFilesToUpload.row(fileIdx).data(r1).draw( false );
							//console.log("File no : " + fileIdx + " successfully");
							
						}, true);
					}
					return xhr;
				},
				url: '<?php echo e(route('file.upload.dwgForModelQC')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					
					if (response.success)
					{
						RevitNameServer = response.fileNameServer;
						RevitFileServerPath = response.fileNameServerPath;
						//RevitNameServer = response.fileNameServer;
						uploadIFCFile();
					}
					
				},
			});
	}

	function uploadIFCFile()
	{
		
		var fd = new FormData();
			
			var dfile = $('#file2')[0].files[0];
			fd.append('file',dfile);
			fd.append('workOrderName',workOrderName);
			fd.append('workOrderId',workOrderId);
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
								
							//var r1 =  dtFilesToUpload.row(fileIdx).data();
							//r1.prgvalue = percent;
							//dtFilesToUpload.row(fileIdx).data(r1).draw( false );
							//console.log("File no : " + fileIdx + " successfully");
							
						}, true);
					}
					return xhr;
				},
				url: '<?php echo e(route('file.upload.dwgForModelQC')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					
					if (response.success)
					{
						IFCNameServer = response.fileNameServer;
						IFCFileServerPath = response.fileNameServerPath;
						processAssign();
					}
					
				},
			});
	}

	function processAssign()
	{
			var fd = new FormData();
					
			fd.append('workOrderName',workOrderName);
			fd.append('workOrderId',workOrderId);
			fd.append('companyId',companyId);
			fd.append('RevitName',RevitName);
			fd.append('IFCName',IFCName);
			fd.append('RevitNameServer',RevitNameServer);
			fd.append('IFCNameServer',IFCNameServer);
			fd.append('IFCFileServerPath',IFCFileServerPath);
			fd.append('RevitFileServerPath',RevitFileServerPath);
			fd.append('_token','<?php echo e(csrf_token()); ?>');
			
			$.ajax({
				 
		 
				url: '<?php echo e(route('assignToModelQcPost')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					
					if (response.success)
					{
						Swal.fire({
									icon: 'success',
									title: '<?php echo app('translator')->get('words.company:'); ?>' + response.companyName,
									text: '<?php echo app('translator')->get('words.workorderassignedmodelcreationqc'); ?>',
									showCancelButton: false,
									customClass: {
										confirmButton: 'btn btn-success mx-2'
									},
									buttonsStyling: false
								}).then(function (result) {
										window.location.href = "/home_modelcreation";
								  });
					}
					
				},
			})
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/laravel/modelcreation/modelqc.blade.php ENDPATH**/ ?>