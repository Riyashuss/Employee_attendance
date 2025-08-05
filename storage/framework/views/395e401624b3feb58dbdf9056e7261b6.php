

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homeworkorderhistory')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                    <li class="nav-item d-flex align-items-center">
                        <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <?php if(auth()->user()->id != 1): ?>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="#" onclick='profileSetting(<?php echo e(auth()->user()->id); ?>);'>
                            <span>
                                <i class="fa fa-user me-sm-0" style="color: white;"></i>
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card" id="basic-info">
        <div class="card-body">
            <div class="table-responsive">
               <table class="table table-striped" id="workOrderTable">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.date'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.woname'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.pname'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.status'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.remark'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.assignedby'); ?></th>
                            <th class="text-sm text-center"><?php echo app('translator')->get('words.assignedto'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $workOrderHistorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrderHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="mt-2">
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->date); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->workordername); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->processname); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->description); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->remarks); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->assignedBy); ?></td>
                                <td class="text-sm text-center font-weight-normal text-middle"><?php echo e($workOrderHistory->assignedTo); ?></td>                                      
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
        
        .text-middle {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/sweetalert.min.js"></script>
    <script>
    function profileSetting(user) {
        window.location.href = "/profileView/" + user;
    }

    var dtWorkOrders;

    $(document).ready(function() {
        dtWorkOrders = $('#workOrderTable').DataTable({
            paging: true,
            pageLength: 10,
            searching: true,
            ordering: true,
            info: true,
            language: {
                emptyTable: '<?php echo app('translator')->get('words.noworkorderavailable'); ?>'
            }
        });
    });

    $("#workorder_name").on("change", function() {
        // Handle change event
    });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/home_workorderhistory.blade.php ENDPATH**/ ?>