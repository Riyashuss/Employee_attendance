




<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl mt-2 bg-primary">

		<div class="container-fluid py-1 px-3 ">

				<?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Company'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

			<h5>Company</h5>

		</div>

		<div class="card-body mt-1 pt-1">

			<form method="POST" action="" enctype="multipart/form-data"

				class="item-form">

				<?php echo csrf_field(); ?>

				<div class="row">

					<div class="col-lg-2"></div>

					<div class="col-lg-4  mt-2">

						<label for="company_name" class="form-label">Company Name</label>

						<div>

							<input type="text" class="form-control" id="company_name" name="company_name" 

								placeholder="Company Name" value="<?php echo e(old('company_name')); ?>" >

						</div>

						<p id="company_name_error" class='text-danger text-xs pt-1 errmsg'>aaa</p>

					</div>

					<div class="col-lg-4  mt-2">

						<label for="work_area" class="form-label">Work Area Name</label>

						<div>

							<select class="form-control" name="workarea_name" id="workarea_name">

								<option value="">..</option>

								<?php $__currentLoopData = $workareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<option value="<?php echo e($workarea->id); ?>"

										<?php echo e(old('workarea_name') == $workarea->id ? 'selected' : ''); ?>>

										<?php echo e($workarea->workarea_name); ?></option>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							</select>

							<p id="workarea_name_error" class='text-danger text-xs pt-1 errmsg'>ccc</p>

						</div>

					</div>

					<div class="col-lg-2"></div>

				</div>				



				<div class="d-flex justify-content-center mt-4"> 

					<button onclick="saveNewCompany();" class="btn btn-icon5 btn-success" type="button">

					

						Add

					</button>				

					<!--<button type="submit" class="btn bg-default text-white m-0 ms-2">Add</button>-->

				</div>

			</form>

			

			<!--<hr class="my-4" />-->

			<div class="my-1">	

				<table id="tblCompany" class="table table-striped" style="width:100%">

					<thead class="bg-dark text-white">

						<tr>

							<th class="text-center">Company Name</th>

							<th class="text-center">Work Area</th>

							<th class="text-center">Default User</th>

							<th class="text-center">Action</th>

						</tr>

					</thead>

				</table>

			</div>

		</div>

        

    </div>



	

<?php $__env->stopSection(); ?>



<?php $__env->startPush('css'); ?>

    <style>

		

		#tblCompany > tbody > tr > td

		{

			text-align:center;

		}

    </style>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('js'); ?>



	<script src="/assets/js/core/jquery.min.js"></script>

    <script src="/assets/js/plugins/choices.min.js"></script>

    <script src="/assets/js/plugins/quill.min.js"></script>

    <script src="/assets/js/plugins/flatpickr.min.js"></script>

	<script src="/assets/js/plugins/sweetalert.min.js"></script>

	

    <script>


	function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }
	

		/*$("#company_name").on("change", function() 

		{

			var companyName = $(this).val(); 

			//console.log(companyName);

			

			if (checkNameExists(companyName)) { // Call the function and pass companyName as argument

				alert("Company name already exists.");

				

				$(this).val(""); 

				return;

			}

			

		});*/

		

		var companyNames = new Array();



		function saveNewCompany()

		{

			$('.errmsg').hide();

			var isError = false;

			

			

			

			var companyName = $.trim($('#company_name').val()); 

			

			if(companyName === "")

			{

				$('#company_name_error').html('CompanyName should not be empty');

				$('#company_name_error').show();

				isError = true;

			}

			else

			{  

				if (checkNameExists(companyName)) 

				{				

					$('#company_name_error').html('CompanyName already exists');

					$('#company_name_error').show();

					isError = true;

				}



			}

			

			var workareaId = $('#workarea_name').val(); 

			

			if(workareaId <= 0)

			{

				$('#workarea_name_error').html('workarea Name should not be empty');

				$('#workarea_name_error').show();

				isError = true;

			}

			

			if(isError == false)

			{

				var fd = new FormData();

			

				fd.append('companyName',companyName);

				fd.append('workareaId',workareaId);

				

				fd.append('_token','<?php echo e(csrf_token()); ?>');



				$.ajax({

					url: '<?php echo e(route('company-management.store')); ?>',

					type: 'post',

					data:fd,

					contentType: false,

					processData: false,

					success: function(response){

						if (response.success) {

							Swal.fire({

									icon: 'success',

									title: 'Company',

									text: response.message,

									showCancelButton: false,

									customClass: {

										confirmButton: 'btn btn-success mx-2'

									},

									buttonsStyling: false

								});

								fillCompanyTable();

								$('#company_name').val("");

								$('#workarea_name').val(0);

								

						} else {

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

			

			

		}



		function checkNameExists(companyName) {			



			for(var i=0;i<companyNames.length;i++)

			{

				if (companyNames[i] == companyName)

				{

					return true;

				}

			}

			

			return false;

		}







		var dtCompany;

			

		$(document).ready(function() 

		{

			$('.errmsg').hide();

			

			dtCompany = $('#tblCompany').DataTable({

				paging: true,
            	pageLength:10,
				searching: true,
				ordering:  true,
				info : true,
				columns: [
					{
						data: 'company_name',
					},
					{
						data: 'workarea_name'
					},
					{
						data: 'default_user_id'
					},
					{
						data: 'view',
						render: function(data, type, row, meta) {
							//return "<span style='cursor:pointer;' onclick='viewmodel(" + row[0] + ");'><i class='fa fa-edit text-info'></i></span>";
							var txt =  row["company_id"];
							return "<button class='btn btn-icon btn-2 btn-sm btn-danger mb-0 ms-1 btn-tooltip' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'  type='button' id='btnDelete' onclick='deleteCompany(" + txt + ")'  ><span class='btn-inner--icon'><i class='fa fa-trash'></i></span></button>"
						},
					},
				]
			});
			fillCompanyTable();
		});
		function fillCompanyTable()
		{
			var fd = new FormData();		
			fd.append('_token','<?php echo e(csrf_token()); ?>');
			$.ajax({
				url: '<?php echo e(route('getcompany')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					// console.log(response);
					var companies = response.companies;
					dtCompany.clear();
					companyNames=new Array();
					
					for(var i=0;i<companies.length;i++)
					{
						companyNames[i] = companies[i].company_name;
						if (companies[i].default_user_id == 0)
						{
							dtCompany.row.add( {"company_id":companies[i].companyid,"company_name":companies[i].company_name,"workarea_name":companies[i].workarea_name,"default_user_id":"--","view":i,"delete":i}).draw( true );	
						}
						else{
							dtCompany.row.add( {"company_id":companies[i].companyid,"company_name":companies[i].company_name,"workarea_name":companies[i].workarea_name,"default_user_id":companies[i].username,"view":i,"delete":i}).draw( true );
						}
					}
				},
			});
		}
		function deleteCompany(companyId) 
		{
			// Display confirmation dialog box using SweetAlert
			Swal.fire({
				title: 'Are you sure?',
				text: 'Please confirm deleting the company name!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					var fd = new FormData();		
					fd.append('_token','<?php echo e(csrf_token()); ?>');
					fd.append('id',companyId);
					$.ajax({
						url: '<?php echo e(route('deleteCompany')); ?>',
						type: 'post',
						data:fd,
						contentType: false,
						processData: false,
						success: function(response){
							// console.log(response);
							fillCompanyTable();
						},
					});
				}
			});
		}
		function addUser(companyid)
		{		
			//alert(companyid);		
			window.location.href = "/adduser/" + companyid;
		}
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/company/index.blade.php ENDPATH**/ ?>