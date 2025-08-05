

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
	
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
		<div class="card-header  mt-1 pt-1">
			<h5>Users</h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<form method="POST" action="<?php echo e(route('users-management.store')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-2 text-end">
						<label class="form-label">Company Name</label>
					</div>
					<div class="col-lg-6">
						<div class="input-group">
							<select class="form-control" name="company_name" id="company_name">
								<option value="">..</option>
								<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($company->id); ?>"
										<?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>
										<?php echo e($company->company_name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>   
						</div>
						<?php $__errorArgs = ['company_name'];
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
						
					</div>
					<div class="col-lg-1"></div>
				</div>
				
				<div class="row">
					<div class="col-lg-3 mt-2">
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
					<div class="col-lg-3 mt-5">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="defalut_user" name="defalut_user" value="checkbox_value1">
							<label class="custom-control-label" for="customCheckDisabled">Default User</label>
						</div>
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
				
				<div class="row">
					<div class="col-lg-6">
						<label class="form-label">User Role</label>
					
					</div>
				</div>
				
				<div class="row">
					
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-2">
							<div class="form-check">
								<input class="form-check-input role-checkbox" type="checkbox" name="role_id<?php echo e($role->id); ?>" id="role<?php echo e($role->id); ?>" value="<?php echo e($role->id); ?>" <?php echo e((is_array(old('roles')) && in_array($role->id, old('roles'))) ? 'checked' : ''); ?>>
								<label class="form-check-label" for="role<?php echo e($role->id); ?>">
									<?php echo e($role->role_name); ?>

								</label>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php $__errorArgs = ['roles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<p class="text-danger text-xs pt-1"><?php echo e($message); ?></p>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					
				</div>
				
				<div class="d-flex justify-content-center mt-4">  					
					<button class="btn btn-icon5 btn-success text-white" type="button" id="btnSave"
						onclick="saveUser();">
						<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>
						<span class="btn-inner--text ms-1">Save</span>
					</button>	
				</div>
				
				<div class="my-1">	
					<table id="tblUsers" class="table table-striped" style="width:100%">
						<thead class="bg-dark text-white">
							<tr>
						
							
								<th class="text-center">User Name</th>
								<th class="text-center">Company</th>
								
								<th class="text-center">Role</th>
								<th class="text-center">E-mail</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
          
                            </tbody>
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
	
	var userName = "";
	var password = "";
	var isDefaultUser = false;
	var userEmail = "";
	var roleList = [];

    $(document).ready(function() {
        dtusers = $('#tblUsers').DataTable({
            paging: false,
            searching: false,
            ordering:  false,
            info : false,
            columns: [
                { data: 'username' },
                { data: 'companyname' },
                { data: 'email' },
                { data: 'role' },
                { 
                    data: 'view',
                    render: function(data, type, row, meta) {
                        return "<button class='btn btn-icon btn-2 btn-dark mb-0 me-1' type='button' onclick='viewmodel(" + row.id + ")'><span class='btn-inner--icon'><i class='fa fa-edit'></i></span></button>"
                            + "<button class='btn btn-icon btn-2 btn-danger mb-0 ms-1' type='button' onclick='deleteUser(" + row.id + ")'><span class='btn-inner--icon'><i class='fa fa-trash'></i></span></button>";
                    }
                }
            ]
        });

        //fillUsersTable();

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
                var users = response.users;
                for(var i = 0; i < users.length; i++)
                {
                    dtusers.row.add({
                        "username": users[i].username,
                        "companyname": users[i].company_name,
                        "email": users[i].email,
                        "role": users[i].role,
                        "view": users[i].id
                    }).draw(true);
                }
            },
        });
    }
	
	function saveUser()
	{
		userName = $("username").val();
		password = $("password").val();
		userEmail = $("email").val();
		
		
		var selDefaultUser = $('input[name="defalut_user"]:checked').val(); //$("#defalut_user input[type='radio']:checked");
		
		
		var arr = $('.role-checkbox:checked').map(function(){
						alert(this.value);
					}).get();
	
		//alert(selDefaultUser);
		
	}

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/userwork/user_index.blade.php ENDPATH**/ ?>