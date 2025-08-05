

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    
    <div class="card" id="basic-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-2 text-end">
                    <label class="form-label">WorkOrder Name</label>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
					<input type="text" class="form-control" id="searchTerm" name="workorder_name" >
                    </div>
                    <p id="workorder_name_error" class="text-danger text-xs pt-1"></p>
                </div>
                <div class="col-lg-1">
				<button class='btn btn-icon btn-2 btn-success mb-0 me-1'id='searchButton' type='button'><span class='btn-inner--icon'><i class='fa fa-search'></i></span></button>
				</div>
            </div>
            
            <div class="table-responsive">
               <table class="table table-striped" id="workOrderTable">
                    <thead class="bg-dark text-white" >
                        <tr>
                            <th class="text-sm text-center">
                                Work Order Name
                            </th>
                            <th class="text-sm text-center">
                                Process Name
                            </th>
                            <th class="text-sm text-center">
                                Status
                            </th>
                            <th class="text-sm text-center">
                                Assigned To Company
                            </th>
                            <th class="text-sm text-center">
                               Current User
                            </th>
                            <th class="text-sm text-center">
                                Work Area
                            </th>
                            <th class="text-sm text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $workOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="mt-2">
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->workordername); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->processname); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->description); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->companyname); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->username); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrder->workarea_name); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($workOrder->status_code == '0'): ?> 
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignClick("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i>Assign to Data Preparation</span>
                                    </button>
                                <?php endif; ?>
                                    
                                    <!--<button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewClick("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-edit'></i>
                                    View WorkOrder</span></button>-->
                                </td>                                       
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
              No matching results found.
            </div>
        </div>
    </div>
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .choices {
            margin-bottom: 0;
        }
        
        .text-middle
        {
            vertical-align:middle;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script>
    function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }
    var  dtWorkOrders;
     
    $(document).ready(function(){
        
        dtWorkOrders = $('#workOrderTable').DataTable({
            paging: true,
            pageLength:10,
            searching: false,
            ordering:  false,
            info : false,
             language: {
                emptyTable: 'No New WorkOrder available'
            }
            
        });		
        
    }); 
    
    $("#workorder_name").on("change", function() 
    {
        
    });
    
    function assignClick(workOrderId)
    {
        window.location.href = '/assignToDatapreparation/' + workOrderId;            
    }
    
    function viewClick(workOrderId)
    {
		//alert("Not implemented yet");
        window.location.href = '/viewworkorder/' + workOrderId;            
        
    }  
    $('#searchButton').on('click', function() {
        var resultsfound=false;
        var searchTerm = $('#searchTerm').val().toLowerCase();
        $('#workOrderTable tbody tr').each(function() {
            var rowText = $(this).text().toLowerCase();
            if (rowText.indexOf(searchTerm) !== -1) {
                $(this).show();
                resultsfound=true;  
            } else {
                $(this).hide();
            }
        });
        if (!resultsfound) {
        $('#noDataMessage').show();

        } else {
        $('#noDataMessage').hide();
        }
    });


    
    
    
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\DK3\HemmingerUAT\release01_UAT_27042024\dk3app\resources\views/home.blade.php ENDPATH**/ ?>