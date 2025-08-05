

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
    <div class="card" id="basic-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-2 text-end">
                    <label class="form-label">View WorkOrder </label>
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
            <?php
                $displayedFilePaths = [];
                $ivlFileDisplayed = false;
                $baseMapDisplayed = false;
                $preProductionMapDisplayed = false;
                $surveyMapDisplayed = false;
            ?>
            <div class="table-responsive">
               <table class="table" id="workOrderTable">
                    <thead class="bg-dark text-white" >
                        <tr>
                            <th class="text-sm text-center">
                                File Type
                            </th>
                            <th class="text-sm text-center">
                                File Name
                            </th>
                            <th class="text-sm text-center">
                                Download
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            
           
                        
                        
                         </tr>
                
                                        
                                        <tr>
                    <td class="text-sm text-left font-weight-normal text-middle">IVL File</td>
                    <?php $__currentLoopData = $drawings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$ivlFileDisplayed && strpos($workOrder->name_original, '') !== false): ?>
                            <?php $ivlFileDisplayed = true; ?>
                            <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($workOrder->name): ?>
                                    <?php echo e($workOrder->name); ?>

                                <?php else: ?>
                                    &nbsp; <!-- Non-breaking space -->
                                <?php endif; ?>
                            </td>
                            <?php
                                $filePath = preg_replace('#[\\\\/]+#', DIRECTORY_SEPARATOR, $workOrder->file_path);
                            ?>
                            <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($filePath): ?>
                                    <a href="<?php echo e(route('download')); ?>?filePath=<?php echo e(urlencode($filePath)); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                                                                            <tr >
                                <td class="text-sm text-left font-weight-normal text-middle">Base Map
                                </td>
                                <?php $__currentLoopData = $drawings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$baseMapDisplayed && strpos($workOrder->name_original, 'BaseMap') !== false): ?>
                                <?php $baseMapDisplayed = true; 
                                ?>
                                <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($workOrder->name): ?>
                                    <?php echo e($workOrder->name); ?>

                                <?php else: ?>
                                    &nbsp; <!-- Non-breaking space -->
                                <?php endif; ?>
                            </td>
                            <?php
                                $filePath = preg_replace('#[\\\\/]+#', DIRECTORY_SEPARATOR, $workOrder->file_path);
                            ?>
                            <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($filePath): ?>
                                    <a href="<?php echo e(route('download')); ?>?filePath=<?php echo e(urlencode($filePath)); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <tr >
                                <td class="text-sm text-left font-weight-normal text-middle">Pre-Production Map
                                </td>
                                <?php $__currentLoopData = $drawings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$preProductionMapDisplayed && strpos($workOrder->name_original, 'PreproductionMap') !== false): ?>
                                <?php $preProductionMapDisplayed = true; 
                                ?>
                                <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($workOrder->name): ?>
                                    <?php echo e($workOrder->name); ?>

                                <?php else: ?>
                                    &nbsp; <!-- Non-breaking space -->
                                <?php endif; ?>
                            </td>
                            
                                
                            <?php
                                $filePath = preg_replace('#[\\\\/]+#', DIRECTORY_SEPARATOR, $workOrder->file_path);
                            ?>
                            <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($filePath): ?>
                                    <a href="<?php echo e(route('download')); ?>?filePath=<?php echo e(urlencode($filePath)); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <tr >
                                <td class="text-sm text-left font-weight-normal text-middle">Survey Map
                                </td>
                                <?php $__currentLoopData = $drawings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$surveyMapDisplayed && strpos($workOrder->name_original, 'SurveyMap') !== false): ?>
                                <?php $surveyMapDisplayed = true; ?>
                                <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($workOrder->name): ?>
                                    <?php echo e($workOrder->name); ?>

                                <?php else: ?>
                                    &nbsp; <!-- Non-breaking space -->
                                <?php endif; ?>
                            </td>
                                
                            <?php
                                $filePath = preg_replace('#[\\\\/]+#', DIRECTORY_SEPARATOR, $workOrder->file_path);
                            ?>
                            <td class="text-sm text-center font-weight-normal text-middle">
                                <?php if($filePath): ?>
                                    <a href="<?php echo e(route('download')); ?>?filePath=<?php echo e(urlencode($filePath)); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            
                            <tr>
    <td class="text-sm text-left font-weight-normal text-middle">Pkt File</td>
    <?php
        $allFiles = [];
        $allDownloadLinks = [];
    ?>
    <?php $__currentLoopData = $workOrderStatusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $workAreaName = $workOrder->workarea_name; 
            $workOrderName = $workOrder->workordername;
            $directoryPath = public_path('dks3' . DIRECTORY_SEPARATOR . $workAreaName . DIRECTORY_SEPARATOR . $workOrderName . DIRECTORY_SEPARATOR . 'Survey');
            $files = glob($directoryPath . DIRECTORY_SEPARATOR . '*.pkt');
        ?>
        
        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $allFiles[] = basename($file);
                $allDownloadLinks[] = route('download') . '?filePath=' . urlencode($file);
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Break the loop after the first iteration -->
        <?php break; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <td class="text-sm text-center font-weight-normal text-middle">
        <?php $__currentLoopData = $allFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($file); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>   

    <td class="text-sm text-center font-weight-normal text-middle">
        <?php $__currentLoopData = $allDownloadLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($link); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                <i class="fa-solid fa-download"></i>   
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
</tr>
<tr>
    <td class="text-sm text-left font-weight-normal text-middle">LNE File</td>
    <?php
        $allFiles = [];
        $allDownloadLinks = [];
    ?>
    <?php $__currentLoopData = $workOrderStatusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $workAreaName = $workOrder->workarea_name; 
            $workOrderName = $workOrder->workordername;
            $directoryPath = public_path('dks3' . DIRECTORY_SEPARATOR . $workAreaName . DIRECTORY_SEPARATOR . $workOrderName . DIRECTORY_SEPARATOR . 'Survey');
            $files = glob($directoryPath . DIRECTORY_SEPARATOR . '*.lne');
        ?>
        
        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $allFiles[] = basename($file);
                $allDownloadLinks[] = route('download') . '?filePath=' . urlencode($file);
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Break the loop after the first iteration -->
        <?php break; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <td class="text-sm text-center font-weight-normal text-middle">
        <?php $__currentLoopData = $allFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($file); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>   

    <td class="text-sm text-center font-weight-normal text-middle">
        <?php $__currentLoopData = $allDownloadLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($link); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                <i class="fa-solid fa-download"></i>   
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
</tr>
<tr>
    <td class="text-sm text-left font-weight-normal text-middle">Images</td>
    <?php
    $allFiles = [];
    $allDownloadLinks = [];
?>

<?php $__currentLoopData = $workOrderStatusList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $workAreaName = $workOrder->workarea_name; 
    $workOrderName = $workOrder->workordername;
    $directoryPath = public_path('dks3' . DIRECTORY_SEPARATOR . $workAreaName . DIRECTORY_SEPARATOR . $workOrderName . DIRECTORY_SEPARATOR . 'Survey' . DIRECTORY_SEPARATOR . 'Images');
    $files = glob($directoryPath . DIRECTORY_SEPARATOR . '*.{jpg,jpeg,png,gif,bmp}', GLOB_BRACE);
?>
    
    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $allFiles[] = basename($file);
            $allDownloadLinks[] = route('download') . '?filePath=' . urlencode($file);
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Break the loop after the first iteration -->
    <?php break; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<td class="text-sm text-center font-weight-normal text-middle">
<div class="overflow-auto" style="max-height: 200px; width: 600px; margin-left: 250px;">
    <ul class="list-group text-center text-sm" style="width:600px;">
        <?php $__currentLoopData = $allFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
               
                <?php echo e($file); ?>

                <a  style="margin-left:20px;" href="<?php echo e($allDownloadLinks[$index]); ?>" class="btn btn-icon btn-2 btn-success mb-0 me-1" download>
                    <i class="fa-solid fa-download"></i>   
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<td>

</tr>
                    
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="container justify-content-center text-center" style="display: none;">
              No matching results found.
            </div>
        </div>
    </div>
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/workorder/viewworkorder.blade.php ENDPATH**/ ?>