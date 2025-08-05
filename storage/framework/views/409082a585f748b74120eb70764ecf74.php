<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Object Structure'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
			
                <ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                    <li class="nav-item d-flex align-items-center">
                        <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item position-relative pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
	
	
    <div class="container-fluid my-1 ">
        <div class="d-flex justify-content-center mb-1 pt-1">
            <div class="col-lg-12">

                <!-- Card Basic Info -->
                <div class="card " id="basic-info">
                    <div class="card-header" style="padding:1rem;!important;">
                        <h5 >New Object Structure</h5>					 
                    </div>
					
                    <div class="card-body pt-0">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?> 
							
							<div class="row">
								<div class="col-lg-2  mt-1 text-end">
									<label class="form-label">Object Name</label>
								</div>
								<div class="col-lg-4 ">
									<select name="selObjectTableList" id="selObjectTableList" class="form-control" >
										<option value="0">..</option>
										<?php $__currentLoopData = $objectsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objectTableName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($objectTableName->objectname); ?>"><?php echo e($objectTableName->objectname); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
									</select>				 					
								</div>
								<div class="col-lg-2 text-start" >
									<button class="btn btn-icon btn-4 btn-sm text-white" style="background-color:#5e72e4" type="button" id="createNewButton">
										<span class="btn-inner--icon"><i class="fa fa-object-group"></i> </span>
										<span class="btn-inner--text ms-1">Create New</span>
									</button>
								</div>
								<div class="col-lg-2"></div>
								
							</div>
							
							<div class="row mt-1">
								<div class="col-lg-12 ">
									<div class="card" id="addObjectDiv">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-2 text-start mt-2" >
													 <label class="form-label">Table Name</label>
												</div> 
												<div class="col-lg-4 ">
													 <input id="tablename" name="tablename" class="form-control" type="text"
															placeholder="Table Name" value="">
												</div> 
												<div class="col-lg-2 text-start" >
													<button class="btn btn-icon btn-4 btn-sm btn-dark" type="button" id="addButton">
														<span class="btn-inner--icon"><i class="fa fa-plus"></i> </span>
														<span class="btn-inner--text ms-1">Add Object</span>
													</button>
												</div>
												<div class="col-lg-2"></div>
											</div>
											<div class="row">
												<div class="col-lg-4 ">
													<div class="mt-3">
														<label class="form-label">Field Name</label>
														<div class="input-group">
															<input id="fieldname" name="fieldname" class="form-control" type="text"
																placeholder="Field Name" value="<?php echo e(old('fieldname')); ?>">
														</div>
														<?php $__errorArgs = ['fieldname'];
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
												<div class="col-lg-4 ">
													<div class="mt-3">
														<label class="form-label">Field Type</label>
														<select name="fieldtype" id="fieldtype" class="form-control" >
															<option id="0" value="0">...</option>	
															<option id="1" value="1">int</option>	
															<option id="2" value="2">decimal</option>	
															<option id="3" value="3">varchar</option>	
															<option id="4" value="4">date</option>	
															<option id="5" value="5">time</option>	
															<option id="6" value="6">reference</option>	
															<option id="7" value="7">list</option>											
														</select>								   
													</div>
												</div>
												<div class="col-lg-4 ">
													<div class="mt-3">
														<label class="form-label">Field Size</label>
														<div class="input-group">
															<input id="fieldsize" name="fieldsize" class="form-control" type="text"
																placeholder="Field Size" value="<?php echo e(old('fieldsize')); ?>">
														</div>
														<?php $__errorArgs = ['fieldsize'];
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
												
											</div>
									
											<div class="row">												
												<div class="col-lg-4 ">
													<div class="mt-3">
														<label class="form-label">Attribute Position</label>
														<div class="input-group">
															<input id="attributeposition" name="attributeposition" class="form-control" type="text"
																placeholder="Attribute Position" value="<?php echo e(old('attributeposition')); ?>">
														</div>
														<?php $__errorArgs = ['attributeposition'];
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
												<div class="col-lg-4 ">
													<div id="reflistrow" class="mt-3">
														<label class="form-label">Reference List</label>
														<select name="listref" id="listref" class="form-control" >
															<option value="">..</option>										
															<?php $__currentLoopData = $refLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option id="<?php echo e($refList->id); ?>" value="<?php echo e($refList->id); ?>" ><?php echo e($refList->groupname); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
														</select>		
														<?php $__errorArgs = ['listref'];
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
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row mt-1">
								<div class="col-lg-12 ">
									<div class="card">
										<!-- Card header -->
										<div class="card-header" style="padding:1rem;!important;">
											<div class="row">
												<div class="col-lg-8" >
													<h5 class="mb-0">Objects</h5>
												</div>
												
												<div class="col-lg-4 text-end" >
													<button class="btn btn-icon btn-4 btn-sm btn-success" type="button" id="saveButton">
														<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>
														<span class="btn-inner--text ms-1">Save</span>
													</button>
													<button class="btn btn-icon btn-4 btn-sm btn-danger" type="button" id="cancelButton">
														<span class="btn-inner--icon"><i class="fa fa-remove"></i> </span>
														<span class="btn-inner--text ms-1">Cancel</span>
													</button>
												</div>
												
											</div>																						
										</div>
									  
										<hr class="my-1" />
										<div class="table-responsive">
											<table class="table table-striped" id="datatable-basic">
												<thead class="bg-dark text-white">
													<tr>
														<th class="bg-light-primary text-center">
															Field Name
														</th>
														<th class="bg-light-primary text-center">
															Field Type
														</th>
														<th class="bg-light-primary text-center">
															Reference
														</th>
														<th class="bg-light-primary text-center">
															Size
														</th>
														<th class="bg-light-primary text-center">
															Position
														</th>
													</tr>
												</thead>
												<tbody id="objtbody">
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>							
                           
                        </form>
                    </div>
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
    <script>
	
	var objList = new Array();
	
	var tablename = "";
	var listref = "";
	
	function ObjData(fieldname,fieldtype,fieldtypename,fieldref,fieldrefname,fieldsize,position) {
	  this.fieldname = fieldname;
	  this.fieldtype = fieldtype;
	  this.fieldtypename = fieldtypename;
	  this.fieldref = fieldref;
	  this.fieldrefname = fieldrefname;
	  this.fieldsize = fieldsize;
	  this.position = position;
	  
	  this.getTableTxt = function ()
	  {
		  return '<tr><td class="text-center text-sm font-weight-normal"> ' + fieldname + '</td>'
					+ '<td class="text-center text-sm font-weight-normal"> ' + fieldtypename + '</td>'
					+ '<td class="text-center text-sm font-weight-normal"> ' + fieldrefname + '</td>'
					+ '<td class="text-center text-sm font-weight-normal"> ' + fieldsize + '</td>'
					+ '<td class="text-center text-sm font-weight-normal"> ' + position + '</td>'
					+'</td></tr>';
	  }
	}
		
	$(document).ready(function(){
		$('#reflistrow').hide();
		$('#addObjectDiv').hide();
		$('#saveButton').hide();
		$('#cancelButton').hide();
	});
	
	$('#fieldtype').on('change', function() {
	  if( this.value ==6)
	  {
		$('#reflistrow').show();
		$('#listref').val(0);
	  }
	  else
	  {
		$('#reflistrow').hide();
		$('#listref').val(0);		
	  }
	});
	
	$('#selObjectTableList').on('change', function() {
		objList = new Array();
		GetObjectFieldList($("#selObjectTableList").val());
	});
	
	function GetObjectFieldList(objName)
	{
		var fd = new FormData();
		fd.append('objectname',objName);
		
		
		fd.append('_token','<?php echo e(csrf_token()); ?>');

		$.ajax({
			url: '<?php echo e(route('getobjectstructurename')); ?>',
			type: 'post',
			data:fd,
			contentType: false,
			processData: false,
			success: function(response){
				// alert("Enquiry Saved Successfully : " + enquiryid);
				var objectfields = response.objectfields;
				$("#objtbody").html("");
				
				for(var i = 0; i < objectfields.length; i++)
				{
					var groupname = "";
					if( objectfields[i].groupname == "" ||  objectfields[i].groupname == null){
						groupname = 0;
					}
		 
					var objData = new ObjData(objectfields[i].fieldname, objectfields[i].fieldtypeid, objectfields[i].fieldtypename, objectfields[i].listrefid, groupname, objectfields[i].fieldsize, response.objectfields[i].position);
		 
					objList.push(objData);
					 
					$("#objtbody").append(objData.getTableTxt());
				}
				
				for(var i = 0; i < response.objectfields.length; i++)
				{
					$("#sel_"+i).val(response.objectfields[i].fieldtype);
				}
			},
		});
	}
	
	$('#createNewButton').on('click', function() {
		$('#addObjectDiv').toggle();
		$('#selObjectTableList').val(0)
		$('#selObjectTableList').attr('disabled',true);
		$("#objtbody").html("");
		$('#saveButton').show();
		$('#cancelButton').show();
	});
	
	$('#cancelButton').on('click', function() {
		$('#addObjectDiv').hide();
		$('#selObjectTableList').attr('disabled',false);
		$("#objtbody").html("");
		$('#saveButton').hide();
		$('#cancelButton').hide();
	});
	
	$('#addButton').on('click', function() {		
		
		 var fieldname = $('#fieldname').val();
		 var fieldtype = $('#fieldtype').val();
		 var fieldtypename = $('#fieldtype option:selected').text();	
		 var fieldref = $('#listref').val();
		 var fieldrefname = $('#listref option:selected').text();
		 var fieldsize = $('#fieldsize').val();		 
		 var position = $('#attributeposition').val();
		 
		 if(fieldref == "" || fieldref == null){
			 fieldref = 0;
			 fieldrefname = 0;
		 }
		 
		 var objData = new ObjData(fieldname,fieldtype,fieldtypename,fieldref,fieldrefname,fieldsize,position);
		 
		 objList.push(objData);
		 
		 $("#objtbody").append(objData.getTableTxt());
		 
		 $('#fieldname').val("");
		 $('#fieldtype').val("");
		 $('#fieldsize').val("");
		 $('#listref').val("");
		 $('#attributeposition').val("");
	});
	
	$('#saveButton').on('click', function() {
		
		tablename = $('#tablename').val();
		
		var fd = new FormData();
		
		fd.append('objectname',tablename);
		fd.append('objList',JSON.stringify(objList));
		
		
		fd.append('_token','<?php echo e(csrf_token()); ?>');
		
		$.ajax({
			 
			url: '<?php echo e(route('wo_create-store')); ?>',
			type: 'post',
			data:fd,
			contentType: false,
			processData: false,
			success: function(response){			
			 alert("Saved Successfully");
			},
		});
	});
	
	
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/objects/create.blade.php ENDPATH**/ ?>