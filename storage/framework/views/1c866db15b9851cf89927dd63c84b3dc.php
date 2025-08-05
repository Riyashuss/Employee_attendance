

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl bg-gray-800 mt-2 bg-gradient-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Add User'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="../../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 "
                                                alt="user image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 " alt="logo spotify">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
		<div class="card-header  mt-1 pt-1">
			<h5>Users</h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<form method="POST" action="<?php echo e(route('adduser_store')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-2 text-end">
						<label class="form-label">Company Name</label>
					</div>
					<div class="col-lg-6">
						<div class="input-group">
							<input id="companyname" name="companyname" class="form-control" type="text"
								placeholder="Company Name" value="<?php echo e($companies->company_name); ?>" disabled >
						</div>
						<?php $__errorArgs = ['companyname'];
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
					<div class="col-lg-2 mt-2">						
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="defalut_user" name="defalut_user" value="checkbox_value1"
							<?php echo e(($companies->default_user_id == 0 ? '' : 'checked')); ?>>
							<label class="custom-control-label" for="customCheckDisabled">Default User</label>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
				
				<div class="row">
					<div class="col-lg-6 mt-2">
						<label class="form-label">User Name</label>
						<div class="input-group">
							<input id="username" name="username" class="form-control" type="text"
								placeholder="username" value="<?php echo e(old('username')); ?>">
						</div>
						<?php $__errorArgs = ['username'];
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
						<label class="form-label">Email</label>
						<div class="input-group">
							<input id="email" name="email" class="form-control" type="email"
								placeholder="example@email.com" value="<?php echo e(old('email')); ?>">
						</div>
						<?php $__errorArgs = ['email'];
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

				<div class="row">
					<div class="col-6 mt-2">
						<label class="form-label">Password</label>
						<div class="input-group">
							<input id="password" name="password" class="form-control" type="password"
								placeholder="Password">
						</div>
						<?php $__errorArgs = ['password'];
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
					<div class="col-6 mt-2">
						<label class="form-label">Confirm Password</label>
						<div class="input-group">
							<input id="confirm_password" name="confirm_password" class="form-control" type="password" placeholder="Confirm Password">
						</div>
						<?php $__errorArgs = ['confirm_password'];
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
					<button class="btn btn-icon5 btn-success text-white" type="submit">
						<span class="btn-inner--icon"><i class="fa fa-plus"></i> </span>
						<span class="btn-inner--text ms-1">Add</span>
					</button>	
				</div>
				
				<div class="my-1">	
					<table id="tblUsers" class="table table-striped" style="width:100%">
						<thead class="bg-dark text-white text-center">
							<tr>
								<th class="text-center">User Name</th>
								<th class="text-center">Company</th>
								<th class="text-center">E-mail</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
					</table>
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
		
		#tblUsers > tbody > tr > td
		{
			text-align:center;
		}
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
	<script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/choices.min.js"></script>
	
	<script>
	
		var dtusers;
	
		$(document).ready(function() {
			dtCompany = $('#tblUsers').DataTable({
				paging: false,
				searching: false,
				ordering:  false,
				info : false,
				
				columns: [
					{
						data: 'username',
					},
					{
						data: 'companyname'
					},
					{
						data: 'email'
					},					
					{
						data: 'view',
						render: function(data, type, row, meta) {
							//return "<span style='cursor:pointer;' onclick='viewmodel(" + data + ");'><i class='fa fa-edit text-info'></i></span>";
							return "<button class='btn btn-icon btn-2 btn-dark mb-0 me-1' type='button' id='btnEdit' onclick='viewmodel(" + data + ")' ><span class='btn-inner--icon'><i class='fa fa-edit'></i></span></button>"
							+"<button class='btn btn-icon btn-2 btn-danger mb-0 ms-1' type='button' id='btnDelete' onclick='viewmodel(" + data + ")' ><span class='btn-inner--icon'><i class='fa fa-trash'></i></span></button>"
						},
					},
					
				]
			});
			
			
			fillUsersTable();
		
		});
		
		function fillUsersTable()
		{
			var fd = new FormData();		
			
			fd.append('_token','<?php echo e(csrf_token()); ?>');

			$.ajax({
				url: '<?php echo e(route('getusers')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					//alert(response.users[0]);
					var users = response.users;
					for(var i = 0;i < users.length; i++)
					{
						dtCompany.row.add({"username":users[i].username,"companyname":users[i].company_name,"email":users[i].email,"view":i,"delete":i}).draw( true );
					}
				},
			});
			
		}
		
	</script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/userwork/adduser.blade.php ENDPATH**/ ?>