



<?php $__env->startSection('content'); ?>

	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">

        <div class="container-fluid py-1 px-3">

            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Object Data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
	<div class="card mx-1 my-1">

		<div class="card-body pt-1">

			<div class="row mt-2">		

				<div class="col-lg-2  mt-1 text-end">

					<label class="form-label">Object Name</label>

				</div>

				<div class="col-lg-4 ">

					<div>

						<select name="selObjectTableList" id="selObjectTableList" class="form-control" >

							<option value="0">..</option>

							<?php $__currentLoopData = $objectTableList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objectTableName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option value="<?php echo e($objectTableName->objectname); ?>"><?php echo e($objectTableName->objectname); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>								

						</select>

					</div>

					<p id="objectname_error" class='text-danger text-xs pt-1 errmsg'></p>

				</div>

				

				<div class="col-lg-2" id="btnAddNewField">

					<div class="me-1">

						<button class="btn btn-icon5 btn-info" type="button" onclick="addField();">

							<span class="btn-inner--icon"><i class="fa fa-add"></i> </span>

							<span class="btn-inner--text ms-1">Add New Field</span>

						</button>						

					</div>			

				</div>

				<div class="col-lg-2 text-end">

					<div class="me-1">

						<button class="btn btn-icon5 btn-success" type="button" onclick="addObjectTable();">

							<span class="btn-inner--icon"><i class="fa fa-file"></i> </span>

							<span class="btn-inner--text ms-1">Upload Template</span>

						</button>						

					</div>			

				</div>

				<div class="col-lg-2">

					<div class="me-1">

						<button class="btn btn-icon5 btn-dark" type="button" onclick="generateTable();">

							<span class="btn-inner--icon"><i class="fa fa-circle"></i> </span>

							<span class="btn-inner--text ms-1">Generate Tables</span>

						</button>						

					</div>			

				</div>

				

			</div>

			

			<div id="divAddNewField" class="row mt-2 justify-content-center">		

				<div class="col-lg-10">

					<div class="card px-3 py-3">

					

						<div class="row">

							<div class="col-lg-4 ">

								<div class="mt-3">

									<label class="form-label">Field Name</label>

									<div class="input-group">

										<input id="fieldname" name="fieldname" class="form-control" type="text"

											placeholder="Field Name" value="">

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

											<option value="<?php echo e($fieldtype->id); ?>"><?php echo e($fieldtype->fieldtypename); ?></option>

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

											placeholder="Field Size" value="<?php echo e(old('fieldsize')); ?>">

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

											placeholder="Attribute Position" value="<?php echo e(old('attributeposition')); ?>">

									</div>

									<p id="position_error" class='text-danger text-xs pt-1 errmsg'> </p>

								</div>

							</div>

							<div class="col-lg-4 ">

								<div id="reflistrow" class="mt-3">

									<label class="form-label">Reference List</label>

									<select name="listref" id="listref" class="form-control" >

										<option value="">..</option>										

										<?php $__currentLoopData = $refList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<option id="<?php echo e($ref->id); ?>" value="<?php echo e($ref->id); ?>" ><?php echo e($ref->groupname); ?></option>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										

									</select>		

									<p id="reflist_error" class='text-danger text-xs pt-1 errmsg'> </p>

								</div>									

								

							</div>

						</div>

						

						<div class="row text-center mt-4">							

							<div class="col-lg-12 mt-2">

								<button id="btnSaveField" onclick="divbtnAddField();" class="btn btn-icon5 btn-success text-white me-2" type="button">

									<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>

									<span class="btn-inner--text ms-1">Add</span>

								</button>

							

								<button id="btnCancel" onclick="cancelEntry();" class="btn btn-icon5 btn-primary text-white ms-2" type="button">

									<span class="btn-inner--icon"><i class="fa fa-cancel"></i> </span>

									<span class="btn-inner--text ms-1">Cancel</span>

								</button>

								

							</div>							

						</div>

						

					</div>

				</div>

			</div>

			

			<hr class="my-2" />

			<div class="row">

				<div class="col-lg-12 ">

					<div class="table-responsive mt-1">

					   <table class="table table-striped" id="datatable-basic">

							<thead class="bg-dark text-white">

								<tr>

									<th class="bg-light-primary text-center">

										Field Name

									</th>

									<th class="bg-light-primary text-center">

										Field Type

									</th>

									<!--<th class="bg-light-primary text-center">

										Field Size

									</th>-->

									<th class="bg-light-primary text-center">

										LOV Reference

									</th>

									<th class="bg-light-primary text-center">

										Position

									</th>

									<th class="bg-light-primary text-center">

										Action

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

	</div>	

	

<?php $__env->stopSection(); ?>



<?php $__env->startPush('css'); ?>

    <style>

        .choices {

            margin-bottom: 0;

        }

		

		#myKanban>.kanban-container

		{

			overflow:hidden!important;

		}

		

		.kanban-board header

		{

			display:none;

		}

		

		.kanban-item 

		{

			padding:2px;

			margin-bottom:5px;

		}

		

		#datatable-basic > tbody > tr > td

		{

			text-align:center;

		}



    </style>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('js'); ?>

    <script src="/assets/js/core/jquery.min.js"></script>

	<script src="/assets/js/plugins/sweetalert.min.js"></script>

	

    <script>
		function profileSetting(user){
        	window.location.href = "/profileView/"+user;
    	}
	

		var objList = new Array();

		

		var fieldNames = new Array();

	

		var isError = false;

		

		var objectname = "";	

		var fieldName = "";	

		var fieldtype = "";	

		var fieldsize = "";

		var position = "";	

		var reference = "";			

		

		function ObjData(objectstructureid,objectname,fieldname,fieldtype,fieldtypename,fieldsize,fieldref,fieldrefname,position) {

		  this.objectstructureid = objectstructureid;

		  this.objectname = objectname;

		  this.fieldname = fieldname;

		  this.fieldtype = fieldtype;

		  this.fieldtypename = fieldtypename;

		  this.fieldsize = fieldsize;

		  this.fieldref = fieldref;

		  this.fieldrefname = fieldrefname;		  

		  this.position = position;

		  

		  this.getTableTxt = function ()

		  {

			  return '<tr><td class="text-center text-sm font-weight-normal"> ' + fieldname + '</td>'

						+ '<td class="text-center text-sm font-weight-normal"> ' + fieldtypename + '</td>'

						//+ '<td class="text-center text-sm font-weight-normal"> ' + fieldsize + '</td>'

						+ '<td class="text-center text-sm font-weight-normal"> ' + fieldrefname + '</td>'						

						+ '<td class="text-center text-sm font-weight-normal"> ' + position + '</td>'

						+ '<td class="text-center text-sm font-weight-normal"> ' 

						+ '<button class="btn btn-icon btn-2 btn-dark me-1 mb-0" onclick="editField('+ objectstructureid +');" type="button">'

						+ '<span class="btn-inner--icon"><i class="fa fa-edit"></i></span>'

						+ '</button>'

						+ '<button class="btn btn-icon btn-2 btn-danger ms-1 mb-0" onclick="deleteField('+ objectstructureid +');" type="button">'

						+ '<span class="btn-inner--icon"><i class="fa fa-trash"></i></span>'

						+ '</button>'

						+ '</td></tr>';

		  }

		}

			

		$(document).ready(function(){

			$('#reflistrow').hide();

			$("#divAddNewField").hide();

		});

        		

		function addObjectTable()

		{		

			window.location.href = "/object_template_upload";

		}

		

		$('#fieldtype').on('change', function() {

			if( this.value == 6)

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

		

		

		function generateTable()

		{

			Swal.fire({

					icon: 'warning',

					title: 'Object Data',

					text: "Please confirm to create the tables." ,

					showCancelButton: true,

					customClass: {

						confirmButton: 'btn btn-success mx-2',

						cancelButton: 'btn btn-danger mx-2',

					},

					buttonsStyling: false

				}).then(function (result) {

						if(result.isConfirmed)

						{

							

							var fd = new FormData();

							

							fd.append('_token','<?php echo e(csrf_token()); ?>');



							$.ajax({

								url: '<?php echo e(route('create_tables')); ?>',

								type: 'get',

								data:fd,

								contentType: false,

								processData: false,

								success: function(response){					

					

									if (response.success) {

											Swal.fire({

													icon: 'success',

													title: 'Object Structure',

													text: "Tables are generated successfully",

													showCancelButton: false,

													customClass: {

														confirmButton: 'btn btn-success mx-2'

													},

													buttonsStyling: false

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

				  });

		}

		

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

					

					var objectfields = response.objectfields;

					

					$("#objtbody").html("");



					fieldNames = new Array();

					

					for(var i = 0; i < objectfields.length; i++)

					{

						var groupname = objectfields[i].groupname;

						

						fieldNames[i] = objectfields[i].fieldname;

						

						if( groupname === "" ||  groupname === null){

							groupname = '';

						}						

											

						var objData = new ObjData(objectfields[i].objectstructureid, objectfields[i].objectname, objectfields[i].fieldname, objectfields[i].fieldtypeid, objectfields[i].fieldtypename, objectfields[i].fieldsize, objectfields[i].listrefid, groupname, response.objectfields[i].position);

		 

						objList.push(objData);

						 

						$("#objtbody").append(objData.getTableTxt());

					}

										

				 

				},

			});



		}

		

		function addField()

		{

			isError = false;

			$('.errmsg').hide();

			

			objectname = $('#selObjectTableList').val();

			

			if(objectname == 0)

			{

				$('#objectname_error').html('Please Select Object Name');

				$('#objectname_error').show();

				isError = true;

			}

			

			if(isError == false)

			{

				$('#btnAddNewField').hide();

				$("#divAddNewField").show();

			}

			

		}

		

		function divbtnAddField()

		{

			$('.errmsg').hide();

			isError = false;

		

			objectname = $('#selObjectTableList').val();



			fieldname = $.trim($('#fieldname').val());		

					

			if(fieldname == "")

			{

				$('#fieldname_error').html('Field Name should not be empty');

				$('#fieldname_error').show();

				isError = true;				

			}

			else 

			{

				if (checkNameExists(fieldname)) 

				{				

					$('#fieldname_error').html('Field Name already exists');

					$('#fieldname_error').show();

					isError = true;

				}

			}

			

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

			

				fd.append('objectname',objectname);

				fd.append('fieldname',fieldname);

				fd.append('fieldtype',fieldtype);

				fd.append('fieldsize',fieldsize);

				fd.append('position',position);

				fd.append('reference',reference);

				

				fd.append('_token','<?php echo e(csrf_token()); ?>');



				$.ajax({

					url: '<?php echo e(route('addobjectfield')); ?>',

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

				

				GetObjectFieldList(objectname);

				$('#btnAddNewField').show();

				$("#divAddNewField").hide();

				clearValues();

				

			}

		}

		

		function editField(osid)

		{

			window.location.href = "/editobjectfield/" + osid ;

		}

		

		function deleteField(osid)

		{

			//alert(fieldid);

			Swal.fire({

				icon: 'warning',

				title: 'Object Structure',

				text: 'Are you sure to delete the Object Field',

				showCancelButton: true,

				customClass: {

					confirmButton: 'btn btn-success mx-2',

					cancelButton: 'btn btn-danger mx-2',

				},

				buttonsStyling: false

				

			}).then(function(result) {

				

				objectname = $('#selObjectTableList').val();

				

				if(result.isConfirmed)

				{

					var fd = new FormData();        



					fd.append('id', osid);

					

					fd.append('_token','<?php echo e(csrf_token()); ?>');

							

					$.ajax({

						url: '<?php echo e(route('removeobjectfield')); ?>',

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

									});

									fillUsersTable();

									

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

					GetObjectFieldList(objectname);

				}

					

			});

		}

		

		function cancelEntry()

		{

			$('#btnAddNewField').show();

			$("#divAddNewField").hide();

		}

		

		function checkNameExists(fieldname) {			



			for(var i = 0; i < fieldNames.length; i++)

			{

				if (fieldNames[i] == fieldname)

				{

					return true;

				}

			}

			

			return false;

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

	
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\DK3\HemmingerUAT\release01_UAT_27042024\dk3app\resources\views/laravel/objects/object_table.blade.php ENDPATH**/ ?>