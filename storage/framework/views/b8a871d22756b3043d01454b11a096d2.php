



<?php $__env->startSection('content'); ?>

	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">

		<div class="container-fluid py-1 px-3">

			<?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'List of Values'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<!-- End Navbar -->



    <div class="card mx-1 my-1"> 

		<div class="card-body" id="lovcard">

			<div class="row justify-content-center">

			   <div class="d-flex py-1">

					<!--<div class="my-auto">

						<img src="assets/img/dk3/lov_icon.png"

							class="avatar avatar-sm me-2 " alt="lov icon">

					</div>-->

					<div class="d-flex flex-column justify-content-center">

						<h5 class="text-lg font-weight-bold mt-2">

							List of Values

						</h5>						

					</div>

				</div>

			</div>

			

			<div class="row justify-content-center mt-4">

				<div class="col-lg-1"></div>

				

				<div class="col-lg-10">	

					<div class="row justify-content-center">

						<div class="col-lg-2 text-center">

							<label class="form-label text-sm ">Group Name</label>							

						</div>						

						<div class="col-lg-8">

							<div class="text-center">

								<select name="selFieldGroupList" id="selFieldGroupList" class="form-control" >

									<option value="0">..</option>

										<?php $__currentLoopData = $groupList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

											<option value="<?php echo e($group->id); ?>"><?php echo e($group->groupname); ?></option>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									

								</select>

							</div>

							<p id="grouplist_error" class="text-danger text-xs pt-1 errmsg"> </p>

						</div>						

                        <div class="col-lg-2 text-center" id="addGroup">

                            <button class="btn btn-icon btn-4 btn-success" type="button" id="btnAddGroup" onclick="addNewGroup();">

								<span class="btn-inner--icon"><i class="fa fa-plus "></i></span>

								<span class="btn-inner--text">Add Group</span>

							</button>

						</div>

					</div>							

				</div>	

				

				<div class="col-lg-1"></div>

			</div>

			

			<div id="divAddNewGroup" class="row justify-content-center">

				<div class="col-lg-2"></div>

				<div class="col-lg-8">

					<div class="card my-1" id="groups">

						<div class="card-header">

							<h5>Add New Group</h5>

						</div>				

						<div class="card-body">						

							<div class="row">

								<div class="col-lg-6">

									<label class="form-label">Group Name</label>

									<div class="input-group">

										<input id="groupname" name="groupname" class="form-control" type="text"

											placeholder="Group Name" value="">

									</div>

									<p id="groupname_error" class="text-danger text-xs pt-1 errmsg"> </p>

								</div>

							

								<div class="col-lg-6">

									<label class="form-label">Field Type</label>

									<select name="selFieldTypeList" id="selFieldTypeList" class="form-control" >

										<option id="0" value="0">..</option>	

										<option id="1" value="1">int</option>

                                        <option id="2" value="2">decimal</option>

                                        <option id="3" value="3">text</option>

                                        <option id="4" value="4">date</option>

                                        <option id="5" value="5">time</option>  

                                        <option id="6" value="6">reference</option> 

                                        <option id="7" value="7">list</option>

									</select>

									<p id="fieldtype_error" class="text-danger text-xs pt-1 errmsg"></p>

								</div>

							</div>

							

							<div class="row text-center">							

								<div class="col-lg-12 mt-2">

									<button id="btnAddNewGroup" onclick="btnAddNewGroup();" class="btn btn-icon5 btn-success text-white me-2" type="button">

										<span class="btn-inner--icon"><i class="fa fa-add"></i> </span>

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

				<div class="col-lg-2"></div>

			</div>

			

			<div class="row justify-content-center mt-2">

				<div class="col-lg-1"></div>

				

				<div class="col-lg-10">	

					<div class="row justify-content-center">

						<div class="col-lg-2 text-center">

							<label class="form-label text-sm">Field Value</label>							

						</div>

						

						<div class="col-lg-8 ">	

							<div class="text-center">

								<input id="fieldValue" name="fieldValue" class="form-control" type="text"

									placeholder="Field Value" value="">

							</div>

							<p id="fieldvalue_error" class="text-danger text-xs pt-1 errmsg"></p>							

						</div>						

						<div class="col-lg-2 text-center">

							<button class="btn btn-icon btn-4 btn-success" type="button" onclick="btnAddNewField();" id="">

								<span class="btn-inner--icon"><i class="fa fa-plus"></i> </span>

								<span class="btn-inner--text ms-1">Add Field</span>

							</button>

						</div>	

					</div>							

				</div>

				

				<div class="col-lg-1"></div>

			</div>

			

			<div class="row justify-content-center">

				<div class="col-lg-8">	

					<div class="row justify-content-center">

						<div class="col-lg-2"></div>

						<div class="col-lg-8">						

							<div class="card position-sticky top-1 mx-1" id="fieldValueList">

							

							</div>

						</div>

						<div class="col-lg-2"></div>	

					</div>							

				</div>

			</div>

			

		</div>		

	</div>

    

<?php $__env->stopSection(); ?>



<?php $__env->startPush('js'); ?>

	<script src="/assets/js/core/jquery.min.js"></script>

	<script src="/assets/js/plugins/sweetalert.min.js"></script>

	

    <script>

	function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }

		var groupName = ""; 

		var fieldTypeId = ""; 

		var isError = false;

		

		var fieldValue = "";

		var groupListId = "";

		

        $(document).ready(function(){

			$('#divAddNewGroup').hide();

		});



		function addNewGroup(){

			$('#btnAddGroup').hide();

			$('#divAddNewGroup').show();

		}

		

		function cancelEntry(){

			$('#btnAddGroup').show();

			$('#divAddNewGroup').hide();

			

			$('#groupname').val('');

			$('#selFieldTypeList').val(0);

			$('.errmsg').hide();

		}

		

		$("#selFieldGroupList").on("change",function() {

			//alert($("#selFieldGroupList").val());

			groupListId = $("#selFieldGroupList").val();

			GetObjectFieldList(groupListId);

		});	

		

		function GetObjectFieldList(groupListId)

		{

			var fd = new FormData();			

			

			fd.append('grouplistid',groupListId);			

			

			fd.append('_token','<?php echo e(csrf_token()); ?>');



			$.ajax({

				url: '<?php echo e(route('getfieldvalues')); ?>',

				type: 'post',

				data:fd,

				contentType: false,

				processData: false,

				success: function(response){

					if (response.success) {

					

						$("#fieldValueList").html("");

						

						fieldvalues = response.fieldgroupList;

						

						var txt1 = '<div class="table-responsive"><table class="table align-items-center mb-0">';

						

						for(var i = 0; i < fieldvalues.length; i++)

						{							

							txt1 = txt1 + '<tr><td><label>' + fieldvalues[i].fieldvalue + '</label></td>'

							+'<td class="text-end"><button class="btn btn-icon5 btn-sm btn-danger mb-0" type="button"'

							+'id="btnRemove" onclick="removeFieldValue(' + fieldvalues[i].id + ')" >'

							+'<span class="btn-inner--icon me-1"><i class="fa fa-trash"></i></span>'

							+'<span class="btn-inner--text ms-1">Delete</span></button></td></tr>';	

							

						}

						

						txt1 = txt1 + '</table></div>';

						$("#fieldValueList").append(txt1);

					}

				},

			});



		}

		

		function btnAddNewGroup(){

			

			$('.errmsg').hide();

			isError = false;

			

			groupName = $.trim($('#groupname').val());		

					

			if(groupName == "")

			{

				$('#groupname_error').html('Group Name should not be empty');

				$('#groupname_error').show();

				isError = true;				

			}

			

			var fd = new FormData();	



			fd.append('groupname',groupName);

			

			fd.append('_token','<?php echo e(csrf_token()); ?>');



			$.ajax({

				url: '<?php echo e(route('check_groupname')); ?>',

				type: 'post',

				data:fd,

				contentType: false,

				processData: false,

				success: function(response){

					if (response.success) {

						

						$('#groupname_error').html('Group Name already exists');

						$('#groupname_error').show();

						isError = true;

						$('#groupname').val('');

						$('#groupname').focus();

					}

					else{

						storeGroupValues();

					}

				},

			});

			

		}



		function storeGroupValues(){

			

			fieldTypeId = $('#selFieldTypeList').val();

			

			if(fieldTypeId < 1)

			{

				$('#fieldtype_error').html('Please Select FieldType');

				$('#fieldtype_error').show();

				isError = true;

			}

			

			if(isError == false)

			{

				var fd = new FormData();			

			

				fd.append('groupName',groupName);

				fd.append('fieldTypeId',fieldTypeId);			

				

				fd.append('_token','<?php echo e(csrf_token()); ?>');



				$.ajax({

					url: '<?php echo e(route('addgroup')); ?>',

					type: 'post',

					data:fd,

					contentType: false,

					processData: false,

					success: function(response){

						if (response.success) {

							Swal.fire({

									icon: 'success',

									title: 'List of Values',

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

								title: 'List of Values',

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

				

				$('#divAddNewGroup').hide();

				$('#btnAddGroup').show();

				$('#groupname').val('');

				$('#selFieldTypeList').val(0);

			}

		}

		

		function btnAddNewField(){

			

			$('.errmsg').hide();

			isError = false;

		

			fieldValue = $.trim($('#fieldValue').val());		

					

			if(fieldValue == "")

			{

				$('#fieldvalue_error').html('Field Value should not be empty');

				$('#fieldvalue_error').show();

				isError = true;				

			}

			

			groupListId = $('#selFieldGroupList').val();

			

			if(groupListId < 1)

			{

				$('#grouplist_error').html('Please Select Group Name');

				$('#grouplist_error').show();

				isError = true;

			}

			

			if(isError == false){

				

				var fd = new FormData();			

			

				fd.append('groupListId',groupListId);

				fd.append('fieldValue',fieldValue);			

				

				fd.append('_token','<?php echo e(csrf_token()); ?>');



				$.ajax({

					url: '<?php echo e(route('addfield')); ?>',

					type: 'post',

					data:fd,

					contentType: false,

					processData: false,

					success: function(response){

						if (response.success) {

							Swal.fire({

									icon: 'success',

									title: 'List of Values',

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

								title: 'List of Values',

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

				

				GetObjectFieldList(groupListId);

				$('#fieldValue').val('');

				

			}

		}

		

		function removeFieldValue(fieldid){

			alert(fieldid);

			Swal.fire({

				icon: 'warning',

				title: 'User',

				text: 'Are you sure to delete the User',

				showCancelButton: true,

				customClass: {

					confirmButton: 'btn btn-success mx-2',

					cancelButton: 'btn btn-danger mx-2',

				},

				buttonsStyling: false

				

			}).then(function(result) {

				

				groupListId = $('#selFieldGroupList').val();

				

				if(result.isConfirmed)

				{

					var fd = new FormData();        



					fd.append('id', fieldid);

					

					fd.append('_token','<?php echo e(csrf_token()); ?>');

							

					$.ajax({

						url: '<?php echo e(route('removefieldvalue')); ?>',

						type: 'post',

						data:fd,

						contentType: false,

						processData: false,

						success: function(response){

							if (response.success) {

								Swal.fire({

										icon: 'success',

										title: 'User',

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

									title: 'User',

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

					GetObjectFieldList(groupListId);

				}

					

			});

		}



    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/listofvalues/lov.blade.php ENDPATH**/ ?>