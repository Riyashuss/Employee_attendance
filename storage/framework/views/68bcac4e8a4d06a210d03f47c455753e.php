

<?php $__env->startSection('content'); ?>
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
		<div class="container-fluid py-1 px-3">
			<?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.workorderassignment')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<div class="card mt-7" id="basic-info" style="background-color:#F2F9FF;width:90%;margin: auto;">
<div class="card-body mt-1  ">
			
			
		<!-- <div class="card-body mt-1 pt-1"> -->
				<?php echo csrf_field(); ?>
				<div class="card card-custom">
                <div class="text-center mt-2">
				<?php $__currentLoopData = $projectname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<h3> <?php echo e($project->project_name); ?></h3>
			<input type="hidden" name="project_name" id="project_name" value=" <?php echo e($project->project_name); ?>"> 
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
					<div id="cardBodyMain" class="card-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
							<!--<hr class="my-1" />-->
								
								<div class="row mt-2">
									<div class="col-lg-2 pt-1 text-end rounded">
										<label class="form-label">Task</label>
										
									</div>
									
									<div class="col-lg-4 ">
										<div class="input-group">
                                        <?php $__currentLoopData = $tasknames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
											<input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" 
												value="<?php echo e($taskname->task_name); ?>">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<input type="hidden" id="task_id" name="task_id" value="<?php echo e($taskname->id); ?>"> 
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
								
								<div class="row mt-4 align-items-center">
    <div class="col-lg-2 pt-1 text-end">
        <label class="form-label">Username</label>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <!-- Assigned user display -->
            <span class="form-control rounded " id="assigned-user-display">
                <?php echo e($userdetails->firstWhere('id', $user_id)->username ?? 'Not Assigned'); ?>

            </span>

            <!-- Dropdown hidden by default -->
            <select class="form-control rounded" name="user_name" id="user_name" style="display: none;">
                <?php $__currentLoopData = $userdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $user_id ? 'selected' : ''); ?>>
                        <?php echo e($user->username); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <p id="user_name_error" class="text-danger text-xs pt-1"></p>
    </div>
    <div class="col-lg-4 d-flex align-items-center justify-content-end">
        <!-- Change button -->
        <button type="button" id="change-user-btn" class="btn btn-primary ms-2">Change</button>

        <!-- Save button hidden initially -->
        <button type="button" onclick="assignToUser();" id="save-user-btn" class="btn btn-success ms-2" style="display: none;">Save</button>
    </div>
</div>
								
								
								
								<div class="row mt-4">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label"></label>
									</div>
									
									<div class="col-lg-6">
										<!-- <div class="col-lg-8">
											<button id="btnAssignToUser" onclick="assignToUser();" type="button" class="btn  m-0 ms-2" style="background-color:#B17457;color:white"><?php echo app('translator')->get('words.atouser'); ?></button>
										</div> -->
									</div>		
																							
								</div>
								
							
								
								<!--<div class="row">
									<div class="col-lg-12 text-center">
										<button id="btnUpload" type="button" class="btn btn-success">Upload</button>
									</div>
								</div>-->

						
						<hr class="my-4" />
						

						
						
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

	document.getElementById('change-user-btn').addEventListener('click', function() {
    // Hide the assigned user display
    document.getElementById('assigned-user-display').style.display = 'none';

    // Show the dropdown and save button
    document.getElementById('user_name').style.display = 'block';
    document.getElementById('save-user-btn').style.display = 'inline-block';

    // Hide the change button
    this.style.display = 'none';
});

document.getElementById('save-user-btn').addEventListener('click', function() {
    const selectedUser = document.getElementById('user_name').value;

    // TODO: Add your AJAX or form submission logic here to save the change.

    // Update the assigned user display
    const selectedUserText = document.querySelector(`#user_name option[value="${selectedUser}"]`).textContent;
    document.getElementById('assigned-user-display').textContent = selectedUserText;

    // Reset visibility
    document.getElementById('user_name').style.display = 'none';
    document.getElementById('save-user-btn').style.display = 'none';
    document.getElementById('assigned-user-display').style.display = 'inline';
    document.getElementById('change-user-btn').style.display = 'inline-block';
});


	var workOrderName = "";
	
	var workOrderId = 0;
	
	

	$(document).ready(function() {
		
	
	});
	
	
	$("#user_name").on("change", function() 
		{
			$('#user_name_error').html("");
			$('#user_name_error').hide();
			
		});
	
	
	
	function assignToUser()
	{
		
		var assignedToUserId = $('#user_name').val();
		var assignedToUserName = $('#user_name option:selected').text();
			
		var project_name= $('#project_name').val();
        var taskId = $('#task_id').val();
        console.log(taskId)
        console.log(assignedToUserId)
		// var assignedToUserName = $('#user_name option:selected').text();
		
		if(parseInt(assignedToUserId) === 0)
		{
			$('#user_name_error').html('Please select username');
			$('#user_name_error').show();
			return;
		}
		
		
		    
			var fd = new FormData();
			
			fd.append('taskid',taskId);
			fd.append('assignedToUserId',assignedToUserId);
			fd.append('project_name',project_name);
			fd.append('_token','<?php echo e(csrf_token()); ?>');
			
			$.ajax({
				 
				url: '<?php echo e(route('assigntasktouser')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					
					if (response.success)
					{
						Swal.fire({
									icon: 'success',
									title: 'Task',
									text:  'Task assigned to' + assignedToUserName,
									showCancelButton: false,
									customClass: {
										confirmButton: 'btn btn-success mx-2'
									},
									buttonsStyling: false
								}).then(function (result) {
										window.location.href = "/projectview";
								  });
					}
					else
					{
						Swal.fire({
								icon: 'warning',
								title: 'Task',
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
	
	
	
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Employee_attendance\resources\views/laravel/project/update_user_project.blade.php ENDPATH**/ ?>