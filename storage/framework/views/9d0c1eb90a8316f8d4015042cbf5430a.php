

<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">

        <div class="container-fluid py-1 px-3">

            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.woassignmenttopreproduction')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

            <h5><?php echo app('translator')->get('words.woassignmenttopreproduction'); ?></h5>

        </div>

        <div class="card-body mt-1 pt-1">

                <?php echo csrf_field(); ?>

                <div class="card card-custom">

                    <div id="cardBodyMain" class="card-body">

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 

                                <div class="row mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
                                                value="<?php echo e($workOrder->name); ?>">
                                                <input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value="<?php echo e($workOrder->id); ?>"> 
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
                                        <label class="form-label"><?php echo app('translator')->get('words.cname'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <select class="form-control" name="company_name" id="company_name">
                                                <option value="0">...</option>
                                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($company->id); ?>"
                                                        <?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>
                                                        <?php echo e($company->company_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>   
                                        </div>
                                            <p id="company_name_error" class='text-danger text-xs pt-1'>  </p>
                                    </div>
                                </div>

                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.ivldrawingfile'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles1" class="form-group">
                                            <input id="file1" type="file" name="file1" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file_error" class='text-danger text-xs pt-1'>  </p>
                                    </div>                                                          
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.ivlfile'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="form-check form-switch ms-3 position-relative">
                                                <input class="form-check-input" type="checkbox" id="ivlFileToggle" value=0 name="ivlFileToggle">
                                                <label class="toggle-label" for="ivlFileToggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.pointcloud'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="form-check form-switch ms-3 position-relative">
                                                <input class="form-check-input" type="checkbox" id="pointcloudToggle" name="pointcloudToggle">
                                                <label class="toggle-label" for="pointcloudToggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.orthoimages'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="form-check form-switch ms-3 position-relative">
                                                <input class="form-check-input" type="checkbox" id="orthoimagesToggle" name="orthoimagesToggle">
                                                <label class="toggle-label" for="orthoimagesToggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.kabelplan'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="form-check form-switch ms-3 position-relative">
                                                <input class="form-check-input" type="checkbox" id="kableplanToggle" name="kableplanToggle">
                                                <label class="toggle-label" for="kableplanToggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                 
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-inputs" id="default_user" name="default_user" value="">
                                            <label class="custom-control-labels" for="default_user"><?php echo app('translator')->get('words.georeference'); ?></label>
                                        </div>
                                
                                    </div>
                                </div>


                                <div class="row mt-4">    

                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <button id="btnUploadIVLFile" onclick="uploadIVLFile();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.assigntocompany'); ?></button>
                                        </div>

                                    </div>                                                              
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
                .form-check-input {
            width: 0;
            height: 0;
            opacity: 0;
            position: absolute;
        }

        .form-check-input + .toggle-label {
            position: relative;
            width: 60px;
            height: 30px;
            background-color: #ccc;
            border-radius: 30px;
            cursor: pointer;
            display: inline-block;
        }

        .form-check-input + .toggle-label:before {
            content: "No";
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 12px;
        }

        .form-check-input:checked + .toggle-label {
            background-color: #4caf50;
        }

        .form-check-input:checked + .toggle-label:before {
            content: "Yes";
            left: auto;
            right: 5px;
        }

        .form-check-input + .toggle-label:after {
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background-color: white;
            border-radius: 50%;
            transition: 0.3s;
        }

        .form-check-input:checked + .toggle-label:after {
            transform: translateX(30px);
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

    var fileTypes = [
                    { "ext" : ".dwg", "type" : "Autocad Dwg" }
    ];

    $(document).ready(function() {});

    $("#file1").on("change", function() {
        if ($('#file1')[0].files.length == 1) {
            $('#file_error').hide();
        } else if ($('#file1')[0].files.length == 0) {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectivlfile'); ?>');
            $('#file_error').show();
            return;
        } else {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#file_error').show();
            return;
        }
        // if (!($('#file1')[0].files[0].name).toLowerCase().startsWith(workOrderName.toLowerCase())) {
        //     $('#file_error').html("Invalid File. File name should start with '" + workOrderName.toLowerCase() + "'");
        //     $('#file_error').show();
        //     return;
        // }
    });

    $("#company_name").on("change", function() {
        $('#company_name_error').html("");
        $('#company_name_error').hide();
    });

    document.addEventListener('DOMContentLoaded', function() {
    const toggles = document.querySelectorAll('.form-check-input');

    toggles.forEach(toggle => {
        toggle.addEventListener('change', () => {
            console.log(`Toggle ${toggle.id} is now ${toggle.checked ? 'Yes' : 'No'}`);
        });
    });

    // Function to get the values of all toggles
    function getToggleValues() {
        const toggleValues = {};
        toggles.forEach(toggle => {
            toggleValues[toggle.id] = toggle.checked ? 'Yes' : 'No';
        });
        return toggleValues;
    }

    // Example usage: Get all toggle values
    const values = getToggleValues();
    console.log(values);
});
function uploadIVLFile() {
    $('#company_name_error').hide();
    $('#file_error').hide();

    var companyId = $.trim($('#company_name').val());
    var workOrderName = $.trim($('#inWorkOrderName').val());

    if (parseInt(companyId) === 0) {
        $('#company_name_error').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
        $('#company_name_error').show();
        return;
    }

    var file = null;
    if ($('#file1')[0].files.length == 0) {
        file = null;
    } else {
        if ($('#file1')[0].files.length > 1) {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#file_error').show();
            return;
        }

        var selectedFile = $('#file1')[0].files[0];
        if (!selectedFile.name.toLowerCase().startsWith(workOrderName.toLowerCase())) {
            $('#file_error').html('<?php echo app('translator')->get('words.invalifilestartwith'); ?>' + workOrderName);
            $('#file_error').show();
            return;
        }
        file = selectedFile;
    }

    var fd = new FormData();
    if (file) {
        fd.append('file', file);
    }
    fd.append('workOrderId', $("#inWorkOrderId").val());
    fd.append('companyId', companyId);
    fd.append('filename', file ? file.name : null);
    fd.append('ivlFileToggle', $('#ivlFileToggle').is(':checked') ? 'Yes' : 'No');
    fd.append('pointcloudToggle', $('#pointcloudToggle').is(':checked') ? 'Yes' : 'No');
    fd.append('orthoimagesToggle', $('#orthoimagesToggle').is(':checked') ? 'Yes' : 'No');
    fd.append('kableplanToggle', $('#kableplanToggle').is(':checked') ? 'Yes' : 'No');
    fd.append('default_user', $('#default_user').is(':checked') ? 'Yes' : 'No');
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
        url: '<?php echo e(route('file.upload.workorderIVL')); ?>',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: '<?php echo app('translator')->get('words.company:'); ?>' + response.companyName,
                    text: '<?php echo app('translator')->get('words.workorderassigned'); ?>',
                    showCancelButton: false,
                    customClass: {
                        confirmButton: 'btn btn-success mx-2'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    window.location.href = "/home_preproduction";
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

function getFileType(name1) {
        for (var i = 0; i < fileTypes.length; i++) {
            if (name1.endsWith(fileTypes[i].ext)) {
                return fileTypes[i];
            }
        }
        return { "ext" : "", "type" : "Other Documents" };
    }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/laravel/workorder/assigntopreproduction.blade.php ENDPATH**/ ?>