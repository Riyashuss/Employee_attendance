

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'New Query'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
   

	<!-- Card Basic Info -->
	<div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
		<div class="card-header mt-1 pt-1">
			<h5><?php echo app('translator')->get('words.nq'); ?></h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<form method="POST" action="<?php echo e(route('query.store')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-12">
						<label class="form-label">Query Description</label>
						<div class="input-group">
							 <input id="querydescription" name="querydescription" class="form-control <?php if($errors->has('querydescription')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('querydescription')); ?>">
							 <?php if($errors->has('querydescription')): ?>
								<div class="invalid-feedback">
									<?php echo e($errors->first('querydescription')); ?>

								</div>
							<?php endif; ?>	
						</div>
						 
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6 mt-4">
						<label class="form-label">Work Order Id</label>
						<select name="workorderid" id="workorderid" class="form-control <?php if($errors->has('workorderid')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('workorderid')); ?>">
							
							<option disabled selected>Select Work Order Id</option>
							<option value="1" <?php echo e(old('workorderid') == 1 ? 'selected' : ''); ?>>1</option>
							<option value="2" <?php echo e(old('workorderid') == 2 ? 'selected' : ''); ?>>2</option>
							<option value="3" <?php echo e(old('workorderid') == 3 ? 'selected' : ''); ?>>3</option>									
						</select>	
						 <?php if($errors->has('workorderid')): ?>
						<div class="invalid-feedback">
							<?php echo e($errors->first('workorderid')); ?>

						</div>
						<?php endif; ?>									
					</div>
					<div class="col-lg-6 mt-4">
						<label class="form-label">Work Order Status</label>
						<select name="workorderstatus" id="workorderstatus" class="form-control <?php if($errors->has('workorderstatus')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('workorderstatus')); ?>">
							<option disabled selected>Select Work Order Status</option>
							<option value="1" <?php echo e(old('workorderstatus') == 1 ? 'selected' : ''); ?>>1</option>
							<option value="2" <?php echo e(old('workorderstatus') == 2 ? 'selected' : ''); ?>>2</option>
							<option value="3" <?php echo e(old('workorderstatus') == 3 ? 'selected' : ''); ?>>3</option>                             
						</select>
						<?php if($errors->has('workorderstatus')): ?>
							<div class="invalid-feedback">
								<?php echo e($errors->first('workorderstatus')); ?>

							</div>
						<?php endif; ?>							
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6 mt-4">
						<label class="form-label">From User</label>
						<div class="input-group">
							<input id="fromuser" name="fromuser" class="form-control <?php if($errors->has('fromuser')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('fromuser')); ?>" type="text" value="" >
							<?php if($errors->has('fromuser')): ?>
								<div class="invalid-feedback">
									<?php echo e($errors->first('fromuser')); ?>

								</div>
							<?php endif; ?>	
						</div>
						
					</div>
				
					<div class="col-lg-6 mt-4">
						<label class="form-label">To User</label>
						<select name="touser" id="touser" class="form-control <?php if($errors->has('touser')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('touser')); ?>">
							<option disabled selected>Select To User</option>
							<option value="1" <?php echo e(old('touser') == 1 ? 'selected' : ''); ?>>1</option>
							<option value="2" <?php echo e(old('touser') == 2 ? 'selected' : ''); ?>>2</option>
							<option value="3" <?php echo e(old('touser') == 3 ? 'selected' : ''); ?>>3</option>                             
						</select>  
						<?php if($errors->has('touser')): ?>
							<div class="invalid-feedback">
								<?php echo e($errors->first('touser')); ?>

							</div>
						<?php endif; ?>	
					</div>
				</div>

				<div class="row">
					<div class="mt-4">
						<label class="form-label">Files</label>
						<div class="input-group">
							<input id="files" name="files" type="file" class="form-control <?php if($errors->has('files')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('files')); ?>">
							
							<?php if($errors->has('files')): ?>
								<div class="invalid-feedback">
									<?php echo e($errors->first('files')); ?>

								</div>
							<?php endif; ?>
						</div>
							
					</div>
				</div>
				
				<div class="col-lg-6 mt-4">
						<label class="form-label">Status</label>
						<select name="status" id="status" class="form-control <?php if($errors->has('status')): ?><?php echo e('is-invalid'); ?> <?php endif; ?> " value="<?php echo e(old('status')); ?>">
							<option disabled selected>Select Status</option>
							<option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Active</option>
							<option value="2" <?php echo e(old('status') == 2 ? 'selected' : ''); ?>>In-Active</option>
							<option value="3" <?php echo e(old('status') == 3 ? 'selected' : ''); ?>>Pending</option>                             
						</select> 
							<?php if($errors->has('status')): ?>
								<div class="invalid-feedback">
									<?php echo e($errors->first('status')); ?>

								</div>
							<?php endif; ?>	
				</div>

				<div class="d-flex justify-content-center mt-4"> 
					<button class="btn btn-icon btn-4 btn-success" type="submit">
						<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>
						<span class="btn-inner--text ms-1">Save</span>
					</button>
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

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
	<script src="/assets/js/core/jquery.min.js"></script>
    <script>
		
	$(document).ready(function(){
		
	});
	
	
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/query/createquery.blade.php ENDPATH**/ ?>