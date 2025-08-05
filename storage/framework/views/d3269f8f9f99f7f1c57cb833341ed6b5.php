
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.woatomodelcreation')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
        <div class="card-header  mt-1 pt-1">
            <h5><?php echo app('translator')->get('words.woatomodelcreation'); ?></h5>
        </div>
        <div class="card-body mt-1 pt-1">
                <?php echo csrf_field(); ?>
                <div class="card card-custom">
                    <div id="cardBodyMain" class="card-body">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
                            <!--<hr class="my-1" />-->
                                
                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.modelareaname'); ?></label>
                                        
                                    </div>
                                    
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inmodelAreaName" name="inmodelAreaName" class="form-control rounded" type="text" readonly
                                                placeholder="<?php echo app('translator')->get('words.modelareaname'); ?>" value="<?php echo e($modelAreaName->name); ?>">
                                                <input type="hidden" id="modelAreaNameId" name="modelAreaNameId" value="<?php echo e($modelAreaName->id); ?>"> 
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

								<div class="row  mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
                                    </div>
                                
                                    
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="workorderId" name="workorderId" class="form-control rounded" type="text" readonly
                                                placeholder="<?php echo app('translator')->get('words.woname'); ?>" value="<?php echo e($workOrders->name); ?>">
                                                <input type="hidden" id="workorderId" name="workorderId" value="<?php echo e($workOrders->id); ?>"> 
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

                                <div class="row  mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.username'); ?></label>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <select class="form-control rounded" name="company_name" id="company_name">
                                            <option value="0">...</option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company->id); ?>"
                                            <?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>
                                            <?php echo e($company->username); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select> 
                                        </div>
                                        
                                            <p id="company_name_error" class='text-danger text-xs pt-1'>  </p>
                                        
                                    </div>
									
                                </div>
                                    
                                    
                                </div>
                                                            
                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"></label>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <button id="btnUploadIVLFile" onclick="uploadIVLFile();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.atouser'); ?></button>
                                        </div>
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
    var workOrderName = "";
    
    var workOrderId = 0;
    
    $(document).ready(function() {
        
    
    });
    
    
    $("#company_name").on("change", function() 
        {
            $('#company_name_error').html("");
            $('#company_name_error').hide();
            
        });
    
    
    
    function uploadIVLFile()
    {
        var assignedToUserIds = $('#company_name').val();
        var assignedToUserNames = $('#company_name option:selected').text();
            
        if(parseInt(assignedToUserIds) === 0)
        {
            $('#company_name_error').html('<?php echo app('translator')->get('words.unsnbemt'); ?>');
            $('#company_name_error').show();
            return;
        }
        
        var assignedToUserId = $('#workorderId').val();
        var assignedToUserName = $('#workorderId option:selected').text();
            
        if(parseInt(assignedToUserId) === 0)
        {
            $('#workorder_name_error').html('<?php echo app('translator')->get('words.wosnbemt'); ?>');
            $('#workorder_name_error').show();
            return;
        }
        
        
        var fd = new FormData();
        
        // Get the selected company ID from the dropdown
        var userId = $("#company_name").val();
        
        fd.append('modelAreaNameId', $("#modelAreaNameId").val());
        fd.append('workOrderId', $("#workorderId").val());
        fd.append('userId', userId); // Append the selected company ID
        fd.append('_token', '<?php echo e(csrf_token()); ?>');
        

        $.ajax({
            xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                            console.log("Percent : " + percent);
                        }
                    }, true);
                }
                return xhr;
            },
            url: '<?php echo e(route('file.upload.fileUploadmapattribute')); ?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '<?php echo app('translator')->get('words.company'); ?>'+" : " + response.companyName,
                        text: '<?php echo app('translator')->get('words.workorderassigned'); ?>',
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        window.location.href = "/home_datapreparation";
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.company'); ?>',
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

    function getFileType(name1)
    {
        
        for(var i=0;i<fileTypes.length;i++)
        {
            if (name1.endsWith(fileTypes[i].ext))
            {
                return fileTypes[i];
            }
        }
        
        return { "ext" : "", "type" : "Other Documents" };
    }
    
    
    
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/mapattribute/assigntomapattribute.blade.php ENDPATH**/ ?>