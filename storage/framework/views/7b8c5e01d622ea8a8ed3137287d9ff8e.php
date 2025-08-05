

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-center mb-1">
            <div class="col-lg-12">

                <!-- Card Basic Info -->
                <div class="card" id="basic-info">
                    <div class="card-header">
                        <h5> Profile </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <?php echo csrf_field(); ?>
							<div class="row">
								<div class="col-6 mt-2">
									<label class="form-label">Old Password</label>
									<div class="input-group">
										<input id="old_password" name="old_password" class="form-control" type="password"
											placeholder="Old Password"  value="">
									</div>
									<p id="old_password_error" class="text-danger text-xs pt-1 errmsg"> </p>
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
							</div>
							<div class="row">
								<div class="col-6 mt-2">
									<label class="form-label">Confirm Password</label>
									<div class="input-group">
										<input id="confirm_password" name="confirm_password" class="form-control" 
										type="password" placeholder="Confirm Password" value="">
									</div>
									<p id="confirm_password_error" class="text-danger text-xs pt-1 errmsg"> </p>
								</div>
							</div>
							
							<div class="row text-center mt-4">
								
								<div class="col-lg-12 mt-2">
									<button id="btnUpdateUser" onclick="updateUser('<?php echo e($user->id); ?>');" class="btn btn-icon5 btn-success text-white " type="button">
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
		
		var oldpassword = "";
		var password = "";
		var confirmpassword = "";

		
		$(document).ready(function() {
			
			
		});
	
		function profileSetting(user){
        window.location.href = "/profileView/"+user;
    	}

		function updateUser(userid) {
    $('.errmsg').hide();
    var isError = false;

    var password = $.trim($('#password').val());   
    var confirmpassword = $.trim($('#confirm_password').val());   
    var oldpassword = $.trim($('#old_password').val());

    // Password validation
    if(password == "") {
        if (password.length < 6) {                
            $('#password_error').html('Password should be at least 6 characters');
            $('#password_error').show();
            isError = true;
        }

    }
	if(confirmpassword == "") {
            $('#confirm_password_error').html('Password confirmation should not be empty');
            $('#confirm_password_error').show();
            isError = true;
        } else if (password !== confirmpassword) {              
            $('#confirm_password_error').html('Passwords do not match');
            $('#confirm_password_error').show();
            isError = true;
        }
    // Old password validation
    if(oldpassword === "") {
        $('#old_password_error').html('Please enter your old password');
        $('#old_password_error').show();
        isError = true;
    }

    if(!isError) {
        // If there are no errors, proceed with AJAX call to update password
        var fd = new FormData();  
        fd.append('userid', userid);
        fd.append('oldpassword', oldpassword);
        fd.append('password', password);   
        fd.append('confirmpassword', confirmpassword);                
        fd.append('_token', '<?php echo e(csrf_token()); ?>');

        $.ajax({
            url: '<?php echo e(route('updatePassword')); ?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile',
                        text: response.message,
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    }).then(function(result) {
                        if(result.isConfirmed) {
                            window.location.href = "/home";			
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Profile',
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
				
	</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/userwork/profile.blade.php ENDPATH**/ ?>