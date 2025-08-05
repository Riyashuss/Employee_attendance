

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'View Work Order'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
    <!-- End Navbar -->
    <div class=" mx-1 my-1  mt-1 pt-1">
	
		<div class="card-header  mt-1 pt-1">
			<h5>View Work Order</h5>
		</div>	
		
		<div class="card-body mt-1 pt-1" id="lovcard">
			<div class="col-lg-12">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">Work Order Name</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->name); ?>">
					</div>
				</div>							
			</div>
			<div class="col-lg-12 mt-3">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">Process Name</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->processstep_id); ?>">
					</div>
				</div>							
			</div>
			<div class="col-lg-12 mt-3">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">Status</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->status_code); ?>">
					</div>
				</div>							
			</div>
			<div class="col-lg-12 mt-3">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">Work Area</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->workarea_id); ?>">
					</div>
				</div>							
			</div>	
			<div class="col-lg-12 mt-3">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">Start Date</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->planned_startdate); ?>">
					</div>
				</div>							
			</div>	
			<div class="col-lg-12 mt-3">	
				<div class="row justify-content-center">
					<div class="col-lg-2 text-center mt-2">
						<label class="form-label text-sm">End Date</label>							
					</div>
					<div class="col-lg-4">						
						<input id="fieldValue" name="fieldValue" class="form-control" type="text"
							placeholder="Field Value" value="<?php echo e($workOrders->planned_enddate); ?>">
					</div>
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
	
		
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/vieworder.blade.php ENDPATH**/ ?>