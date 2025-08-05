

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl  mt-2 bg-primary">
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
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-center mb-1">
            <div class="col-lg-12">

                <!-- Card Basic Info -->
                <div class="card" id="basic-info">
                    <div class="card-header">
                        <h5> Users</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
							<div class="row">
								<div class="col-lg-1"></div>
								<div class="col-lg-2 text-end">
									<label class="form-label">Company Name</label>
								</div>
								<div class="col-lg-6">
									<div class="input-group">
										<input id="companyname" name="companyname" class="form-control" type="text"
											placeholder="companyname" value="<?php echo e($company->company_name); ?>" readonly>
									</div>
									<p id="company_name_error" class="text-danger text-xs pt-1 errmsg"></p>
								</div>
								<div class="col-lg-2 mt-2">
									
								</div>
								<div class="col-lg-1"></div>
							</div>
                            <div class="row">
								<div class="col-lg-6 mt-2">
									<label class="form-label">User Name</label>
									<div class="input-group">
										<input id="username" name="username" class="form-control" type="text"
											placeholder="username" value="<?php echo e($user->username); ?>">
									</div>
									<p id="username_error" class="text-danger text-xs pt-1 errmsg"> </p>
								</div>
							
								<div class="col-lg-6 mt-2">
									<label class="form-label">Email</label>
									<div class="input-group">
										<input id="email" name="email" class="form-control" type="email"
											placeholder="example@email.com" value="<?php echo e($user->email); ?>">
									</div>
									<p id="email_error" class="text-danger text-xs pt-1 errmsg"></p>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="defalut_user" name="defalut_user" value="checkbox_value1"
										<?php echo e(($company->default_user_id == $user->id ? 'checked' : '')); ?>>
										<label class="custom-control-label" for="customCheckDisabled">Default User</label>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-6 mt-2">
									<label class="form-label">Password</label>
									<div class="input-group">
										<input id="password" name="password" class="form-control" type="password"
											placeholder="Password"  value="">
									</div>
									<p id="password_error" class="text-danger text-xs pt-1 errmsg"> </p>
								</div>
								<div class="col-6 mt-2">
									<label class="form-label">Confirm Password</label>
									<div class="input-group">
										<input id="confirm_password" name="confirm_password" class="form-control" 
										type="password" placeholder="Confirm Password" value="">
									</div>
									<p id="confirm_password_error" class="text-danger text-xs pt-1 errmsg"> </p>
								</div>
							</div>
								
							<div class="row mt-4">
								<label class="form-label">User Role</label>
							</div>
							<div class="row mt-1 ps-3 pe-3">
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-2 justify-content-center bg-gray-300 pt-2">
										<div class="form-check">											
											<input class="form-check-input chkroles" type="checkbox" 
											name="chkrole_<?php echo e($role->id); ?>" id="chkrole_<?php echo e($role->id); ?>" 
											value="<?php echo e($role->id); ?>" 											 
												<?php $__currentLoopData = $userroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userrole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($userrole->role_id == $role->id): ?>
														<?php echo "checked"; ?>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
											<label class="form-check-label " for="role<?php echo e($role->id); ?>">
												<?php echo e($role->role_name); ?>

											</label>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<p id="role_id_error" class="text-danger text-xs pt-1 errmsg"></p>
								
							</div>
							
							<div class="row text-center mt-4">
								
								<div class="col-lg-12 mt-2">
									<button id="btnUpdateUser" onclick="updateUser('<?php echo e($user->id); ?>','<?php echo e($user->companyid); ?>');" class="btn btn-icon5 btn-success text-white " type="button">
										<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>
										<span class="btn-inner--text ms-1">Update</span>
									</button>
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
	<script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/choices.min.js"></script>
	<script src="/assets/js/plugins/sweetalert.min.js"></script>
	
	<script>	
		
		var userName = "";
		var email = "";
		var password = "";
		var confirmpassword = "";
		var default_userid = 0;
		
		$(document).ready(function() {
			
			
		});
	
		function updateUser(userid,companyid)
		{
			$('.errmsg').hide();
			var isError = false;
			
			userName = $.trim($('#username').val());
			
			if(userName === "")
			{
				$('#username_error').html('User Name should not be empty');
				$('#username_error').show();
				isError = true;
			}
			
			email = $.trim($('#email').val());	
		
			if(email === "")
			{
				$('#email_error').html('Email should not be empty');
				$('#email_error').show();
				isError = true;
			}
			else
			{  
				if (!IsEmail(email)) 
				{				
					$('#email_error').html('Invalid Email');
					$('#email_error').show();
					isError = true;
				}
			}
			
			password = $.trim($('#password').val());	
		
			if(password != "")
			{
				if (password.length < 6) 
				{				
					$('#password_error').html('Password should be atleast 6 Characters');
					$('#password_error').show();
					isError = true;
				}
				
				confirmpassword = $.trim($('#confirm_password').val());	
				
				if(confirmpassword === "")
				{
					$('#confirm_password_error').html('Password should not be empty');
					$('#confirm_password_error').show();
					isError = true;
				}
				else
				{  
					if (password != confirmpassword) 
					{				
						$('#confirm_password_error').html('Passwords does not match');
						$('#confirm_password_error').show();
						isError = true;
					}
				}	
			}
			
			var roleIdList = new Array();
		
			var $chkrole_objects = $(".chkroles");
			
			$chkrole_objects.each( function(chk_role_object) 
			{ 
				if (this.checked)
				{
					roleIdList.push($(this).val());
				}
			});
			
			if (roleIdList.length <= 0)
			{
				$('#role_id_error').html('Please select atleast one role');
				$('#role_id_error').show();
				isError = true;
			}
			
			if($('#defalut_user').prop('checked') == true)
			{
				default_userid = 1;
			}
			else{
				default_userid = 0;
			}
			
			if(isError == false)
			{
				var fd = new FormData();
			    
				fd.append('userid',userid);
				fd.append('companyid',companyid);
				fd.append('username',userName);
				fd.append('email',email);
				fd.append('password',password);
				fd.append('default_userid',default_userid);
				fd.append('roleIdList',JSON.stringify(roleIdList));
				
				fd.append('_token','<?php echo e(csrf_token()); ?>');

				$.ajax({
					url: '<?php echo e(route('updateuser')); ?>',
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
								}).then(function(result) {
									if(result.isConfirmed)
									{
										window.location.href = "/users-management" ;			
									}
										
								});
								
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
			}
		
		}
		
		function IsEmail(email) 
		{
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			  
			if(!regex.test(email))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
	</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/userwork/edit.blade.php ENDPATH**/ ?>