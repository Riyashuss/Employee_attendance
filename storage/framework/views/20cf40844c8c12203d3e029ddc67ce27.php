
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.home')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <!-- <li class="nav-item d-flex align-items-center ">
                    
                         <span class="notification-icon" id="notificationIcon">
                             <i class="fa-solid fa-bell"id="bellIcon" style="color: black;"></i>
                             <span id="menunotificationcount" class=" round badge"> <?php echo e($workorderCount); ?></span>
                         </span>
                    </li>  -->
                    
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="card" id="basic-info">
    <div class="notification-container">
    <div class="notification-card" id="notificationCard">
        <p>Hi, you have the following Work Orders</p>
        <ul>
            <?php $__currentLoopData = $groupedNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $processName => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <li><?php echo e($processName); ?> - <?php echo e($count); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
            </div>
            
        <div class="card-body">
                   
            <div class="table-responsive">
               <table class="table table-striped" id="workOrderTable">
                    <thead class="bg-dark text-white" >
                        <tr>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.woname'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.pname'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.status'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.atocompany'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.cuser'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.woarea'); ?>
                            </th>
                            <th class="text-sm text-center">
                            <?php echo app('translator')->get('words.action'); ?>
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
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.atodp'); ?></span>
                                    </button>
                                <?php endif; ?>

                                <?php if($roleName == 'Admin'): ?>

                                <?php elseif($workOrder->status_code == '100' && $company->default_user_id == auth()->user()->id): ?>
                                        <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='editDatapreparation("<?php echo e($workOrder->workorderid); ?>");'><span class='btn-inner--icon'><i class='fa fa-pencil'></i>
                                        <?php echo app('translator')->get('words.editdp'); ?></span></button>
                                <?php endif; ?> 
                                
                               <?php if($company && $workOrder->status_code == '205' && $company->default_user_id == auth()->user()->id): ?> 
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewsurveyQuery("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.viewquery'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($company && $workOrder->status_code == '305' && $workOrder->processname == 'Survey' && $company->default_user_id == auth()->user()->id): ?> 
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='viewmapQuery("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.viewquery'); ?></span>
                                    </button>
                                <?php endif; ?>
                        
                                <?php if($company && $workOrder->status_code == '305' && $workOrder->processname == 'Survey' && $company->default_user_id == auth()->user()->id): ?> 
                                <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignTouser("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.atoresurvey'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($workOrder->status_code == '100' && $roleName == 'Admin'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignToUserPre("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assigntouser'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($workOrder->status_code == '200' && $roleName == 'Admin'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignToUsersurvey("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assigntouser'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($workOrder->status_code == '300' && $roleName == 'Admin'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignToUsermap("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assigntouser'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($workOrder->status_code == '400' && $roleName == 'Admin'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignToUsermodel("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assigntouser'); ?></span>
                                    </button>
                                <?php endif; ?>
                                <?php if($workOrder->status_code == '500' && $roleName == 'Admin'): ?>
                                    <button class='btn btn-icon btn-2 btn-success mb-0 me-1' type='button' onclick='assignToUserdata("<?php echo e($workOrder->workorderid); ?>");'>
                                        <span class='btn-inner--icon'><i class='fa fa-edit'></i><?php echo app('translator')->get('words.assigntouser'); ?></span>
                                    </button>
                                <?php endif; ?>                         
                                </td>      
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
              <?php echo app('translator')->get('words.nmresultsfound'); ?>
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
        .notification-icon {
           
           
            color: white;
            text-decoration: none;
            padding: 1px 2px;
            position: relative;
            display: inline-block;
            border-radius: 2px;
        }
        /* .notification-icon:hover {
            background: red;
            } */
        .notification-icon {
            font-size: 20px;
            cursor: pointer;
        }
        .notification-icon .badge 
        {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 5px 5px;
            border-radius: 50%;
            background-color: red;
            color: white;
            }
        .notification-card {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 300px;
            color:black;
            opacity:2px;
        }
        .notification-card p {
            margin: 0;
            color: #333;
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
                searching: true,
                ordering:  true,
                info : true,
                language: {
                    emptyTable: '<?php echo app('translator')->get('words.noworkorderavailable'); ?>'
                }
            });
        }); 
        
        $("#workorder_name").on("change", function() 
        {
            
        });
        
        document.getElementById('notificationIcon').addEventListener('click', function() {
        var bellIcon = document.getElementById('bellIcon');
        if (bellIcon.style.color === 'black' || bellIcon.style.color === '') {
            bellIcon.style.color = 'white';
        } else {
            bellIcon.style.color = 'black';
        }
        });
        
        function editDatapreparation(workOrderId)
        {
            console.log("workOrderId : "+workOrderId);
            window.location.href = '/editDatapreparation/' + workOrderId ; 
        }

        function assignTouser(workOrderId)
        {
            window.location.href = '/assignToUserSurvey/' + workOrderId ;   
        }
        function assignClick(workOrderId)
        {
            window.location.href = '/assignToDatapreparation/' + workOrderId;            
        }
    
        function viewsurveyQuery(workOrderId)
        {
            window.location.href = '/viewquery/' + workOrderId;            
        }
        function viewmapQuery(workOrderId)
        {
            window.location.href = '/viewmapquery/' + workOrderId;            
        }
        function viewClick(workOrderId)
        {
            window.location.href = '/viewworkorder/' + workOrderId;
        }  
                                
        var hasViewedNotifications = false;
        
        document.getElementById('notificationIcon').addEventListener('click', function(event) {
            var notificationCard = document.getElementById('notificationCard');
            var badge = document.getElementById('menunotificationcount');
            notificationCard.style.display = notificationCard.style.display === 'block' ? 'none' : 'block';
            
            badge.style.display = 'none';
            hasViewedNotifications = true;
            event.stopPropagation();
        });

        document.addEventListener('click', function(event) {
            var notificationCard = document.getElementById('notificationCard');
        
            if (!notificationCard.contains(event.target)) {
                notificationCard.style.display = 'none';
            }
        
            if (!hasViewedNotifications && newWorkOrdersAssigned()) {
                var badge = document.getElementById('menunotificationcount');
                badge.style.display = 'inline-block';
            }
        });

        function newWorkOrdersAssigned() {
            return true;
        }
        function assignToUserPre(workOrderId)
        {
            window.location.href = '/assignToUserPreproduction/' + workOrderId ;            
        }
        function assignToUsersurvey(workOrderId)
        {
            window.location.href = '/assignToUserSurvey/' + workOrderId ;             
        }
        function assignToUsermap(workOrderId)
        {
            window.location.href = '/assignToUserMapCreation/' + workOrderId ;              
        }
        function assignToUsermodel(workOrderId)
        {
            window.location.href = '/assignToUserModelCreation/' + workOrderId ;            
        }
        function assignToUserdata(workOrderId)
        {
            window.location.href = '/assignToUserDatapreparation/' + workOrderId ;           
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/home.blade.php ENDPATH**/ ?>