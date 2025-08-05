

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Object Data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
	
	<div class="card my-1">
		<div class="card-body">				
			<div class="col-lg-12">
				<div class="card px-3 py-3">
				
					<div class="row mt-2 ">
						<div class="col-lg-2 mt-1 text-end">
							<label class="form-label">Object Name</label>
						</div>
						<div class="col-lg-4 ">
							<div>
								<input id="objectname" name="objectname" class="form-control" type="text"
									placeholder="Object Name" value="<?php echo e($objectFieldValues->objectname); ?>" readonly>
								<input type="hidden" id="objectstructureid" name="objectstructureid" value="<?php echo e($objectFieldValues->id); ?>"> 
							</div>
							<p id="objectname_error" class='text-danger text-xs pt-1 errmsg'></p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-4 ">
							<div class="mt-3">
								<label class="form-label">Field Name</label>
								<div class="input-group">
									<input id="fieldname" name="fieldname" class="form-control" type="text"
										placeholder="Field Name" value="<?php echo e($objectFieldValues->fieldname); ?>">
								</div>
								<p id="fieldname_error" class='text-danger text-xs pt-1 errmsg'></p>
							</div>
						</div>
						<div class="col-lg-4 ">
							<div class="mt-3">
								<label class="form-label">Field Type</label>
								<select name="fieldtype" id="fieldtype" class="form-control" >
									<option value="0">..</option>
									<?php $__currentLoopData = $fieldTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($fieldtype->id == $objectFieldValues->fieldtype): ?>
											<option value="<?php echo e($fieldtype->id); ?>" selected><?php echo e($fieldtype->fieldtypename); ?></option>										
										<?php else: ?>
											<option value="<?php echo e($fieldtype->id); ?>"><?php echo e($fieldtype->fieldtypename); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>											
								</select>								   
							</div>
							<p id="fieldtype_error" class='text-danger text-xs pt-1 errmsg'></p>
						</div>
						<div class="col-lg-4 ">
							<div class="mt-3">
								<label class="form-label">Field Size</label>
								<div class="input-group">
									<input id="fieldsize" name="fieldsize" class="form-control" type="text"
										placeholder="Field Size" value="<?php echo e($objectFieldValues->fieldsize); ?>">
								</div>
								<p id="fieldsize_error" class='text-danger text-xs pt-1 errmsg'></p>
							</div>
						</div>
						
					</div>
					
					<div class="row">												
						<div class="col-lg-4 ">
							<div class="mt-3">
								<label class="form-label">Attribute Position</label>
								<div class="input-group">
									<input id="attributeposition" name="attributeposition" class="form-control" type="text"
										placeholder="Attribute Position" value="<?php echo e($objectFieldValues->attribute_position); ?>">
								</div>
								<p id="position_error" class='text-danger text-xs pt-1 errmsg'> </p>
							</div>
						</div>
						
						<div class="col-lg-4 ">
							<div id="reflistrow" class="mt-3" 
								<?php if($objectFieldValues->fieldtype != 6): ?>
									style = "display:none;"
								<?php endif; ?> >
								<label class="form-label">Reference List</label>
								<select name="listref" id="listref" class="form-control" >
									<option value="">..</option>										
									<?php $__currentLoopData = $refList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($ref->id == $objectFieldValues->list_reference_id): ?>
											<option id="<?php echo e($ref->id); ?>" value="<?php echo e($ref->id); ?>" selected><?php echo e($ref->groupname); ?></option>
										<?php else: ?>
											<option id="<?php echo e($ref->id); ?>" value="<?php echo e($ref->id); ?>" ><?php echo e($ref->groupname); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
								</select>		
								<p id="reflist_error" class='text-danger text-xs pt-1 errmsg'> </p>
							</div>									
							
						</div>
						
					</div>
					
					<div class="row text-center mt-4">							
						<div class="col-lg-12 mt-2">
							<button id="btnSaveField" onclick="btnUpdateField();" class="btn btn-icon5 btn-success text-white me-2" type="button">
								<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>
								<span class="btn-inner--text ms-1">Update</span>
							</button>							
						</div>							
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
    <script src="/assets/js/core/jquery.min.js"></script>
	<script src="/assets/js/plugins/sweetalert.min.js"></script>
	
    <script>	
	
		var isError = false;
		
		var objectstructureid = "";
		var objectname = "";	
		var fieldName = "";	
		var fieldtype = "";	
		var fieldsize = "";
		var position = "";	
		var reference = "";				  
			
		$(document).ready(function(){
			
		});
		
		$('#fieldtype').on('change', function() {
			if( this.value == 6)
			{
				$('#reflistrow').show();
		    }
			else
			{
				$('#reflistrow').hide();	
			}
		});
		
		function btnUpdateField()
		{
			$('.errmsg').hide();
			isError = false;
			
			objectstructureid = $('#objectstructureid').val();
			objectname = $('#objectname').val();

			fieldname = $.trim($('#fieldname').val());		
					
			if(fieldname == "")
			{
				$('#fieldname_error').html('Field Name should not be empty');
				$('#fieldname_error').show();
				isError = true;				
			}
			
			var fd = new FormData();
			
			fd.append('objectname',objectname);
			fd.append('fieldname',fieldname);
			fd.append('id',objectstructureid);
			
			fd.append('_token','<?php echo e(csrf_token()); ?>');

			$.ajax({
				url: '<?php echo e(route('check_objectfieldname')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					if (response.success) {
						
						$('#fieldname_error').html('Field Name already exists');
						$('#fieldname_error').show();
						isError = true;
						$('#fieldname').val('');
						$('#fieldname').focus();
					}
					else{
						updateFields();
					}
				},
			});
			
		}
		
		function updateFields()
		{
			fieldtype = $.trim($('#fieldtype').val());
			
			if(fieldtype < 1)
			{
				$('#fieldtype_error').html('Please Select Field Type');
				$('#fieldtype_error').show();
				isError = true;				
			}
			
			fieldsize = $.trim($('#fieldsize').val());
			
			if(fieldsize == "")
			{
				$('#fieldsize_error').html('Field Size should not be empty');
				$('#fieldsize_error').show();
				isError = true;				
			}
			
			position = $.trim($('#attributeposition').val());
			
			if(position == "")
			{
				$('#position_error').html('Attribute Position should not be empty');
				$('#position_error').show();
				isError = true;				
			}
			
			reference = $.trim($('#listref').val());
			
			if($('#fieldtype').val() == 6)
			{
				if(reference == "")
				{
					$('#reflist_error').html('List Reference should not be empty');
					$('#reflist_error').show();
					isError = true;				
				}
			}
			
			if(isError == false){
				
				var fd = new FormData();			
			
				fd.append('objectstructureid',objectstructureid);
				fd.append('objectname',objectname);
				fd.append('fieldname',fieldname);
				fd.append('fieldtype',fieldtype);
				fd.append('fieldsize',fieldsize);
				fd.append('position',position);
				fd.append('reference',reference);
				
				fd.append('_token','<?php echo e(csrf_token()); ?>');

				$.ajax({
					url: '<?php echo e(route('updateobjectfield')); ?>',
					type: 'post',
					data:fd,
					contentType: false,
					processData: false,
					success: function(response){
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Object Structure',
								text: response.message,
								showCancelButton: false,
								customClass: {
									confirmButton: 'btn btn-success mx-2'
								},
								buttonsStyling: false
							}).then(function(result) {
								if(result.isConfirmed)
								{
									window.location.href = "/object_table" ;			
								}
									
							});
							
								
						} else {
							Swal.fire({
								icon: 'warning',
								title: 'Object Structure',
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
		}
		
		function clearValues()
		{
			$('#fieldname').val('');
			$('#fieldtype').val('0');
			$('#fieldsize').val('');
			$('#attributeposition').val('');
			$('#listref').val('0');
			//$("#listref option[value='0']").attr("selected", "selected");
		}
		
		
    </script>
<?php $__env->stopPush(); ?>
	
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/objects/edit_object_table.blade.php ENDPATH**/ ?>