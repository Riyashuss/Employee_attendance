

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.woatoqc')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
            <h5><?php echo app('translator')->get('words.woatoqc'); ?></h5>
        </div>
        <div class="card-body mt-1 pt-1">
                <?php echo csrf_field(); ?>

                <div class="card card-custom">

                    <div id="cardBodyMain" class="card-body">

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <!--<hr class="my-1" />-->

                                <div class="row mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>

                                    </div>

                                    <div class="col-lg-6 ">
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

                                    <label class="form-label"> <?php echo app('translator')->get('words.cname'); ?> </label>

                                    </div>

                                    <div class="col-lg-6">
                                    <div class="input-group">
                                        <input id="inCompanyName" name="inCompanyName" class="form-control rounded" type="text" readonly
                                        value="<?php echo e($companies->company_name); ?>">
                                        <input type="hidden" id="inCompanyId" name="inCompanyId" value="<?php echo e($companies->id); ?>">  
                                    </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.preproductionfile'); ?></label>
                                    </div>


                                    <div class="col-lg-6">
                                        <div id="frmFiles1" class="form-group">
                                            <input id="file" type="file" name="file" class="form-control"  accept=".dwg">
                                        </div>

                                        <p id="file_error" class='text-danger text-xs pt-1'>  </p>


                                    </div>
                                    <!--<div class="col-lg-4">
                                        <button id="btnValidate" onclick="processValidate();" type="button" class="btn btn-success m-0 ms-2">Upload and Validate</button>
                                    </div>-->
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
    var companyName = "";

    var workOrderId = 0;
    var companyId = 0;


    var fileTypes = [,
                    { "ext" : ".dwg", "type" : "Autocad Dwg" }];

    $(document).ready(function() {


    });

    $("#file").on("change", function() {

        workOrderName = $.trim($('#inWorkOrderName').val());


        if ($('#file')[0].files.length==1) {
            $('#file_error').hide();

        }
        else if ($('#file')[0].files.length==0)
        {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectppfile'); ?>');
            $('#file_error').show();
        }
        else
        {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#file_error').show();
        }

        //alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));

        if (!($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"))
        {
            //alert("123");
            $('#file_error').html('<?php echo app('translator')->get('words.invalifilestartwith'); ?>' + "DKS3_" + workOrderName + "_Pre-production_Map");
            $('#file_error').show();
            return;
        }


    });

    $("#company_name").on("change", function()
        {
            $('#company_name_error').html("");
            $('#company_name_error').hide();

        });



    function uploadIVLFile()
    {
        $('#company_name_error').hide();
        $('#file_error').hide();

        var companyId = $.trim($('#company_name').val());

        CompanyName = $("#inCompanyId").val();

        var workOrderName = $.trim($('#inWorkOrderName').val());

        if(parseInt(companyId) === 0)
        {
            $('#company_name_error').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
            $('#company_name_error').show();
            return;
        }

        if ($('#file')[0].files.length==0)
        {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectppfile'); ?>');
            $('#file_error').show();
            return;
        }
        else if ($('#file')[0].files.length>1)
        {
            $('#file_error').html('<?php echo app('translator')->get('words.pleaseselectonepreproductionfileonly'); ?>');
            $('#file_error').show();
            return;
        }
        if (!($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"))
        {
            $('#file_error').html('<?php echo app('translator')->get('words.invalifilestartwith'); ?>'+ "DKS3_" + workOrderName + "_Pre-production_Map");
            $('#file_error').show();
            return;
        }



            var fd = new FormData();

            var dfile = $('#file')[0].files[0];
            var companyId = $('#inCompanyId').val();

            fd.append('file',dfile);
            fd.append('workOrderId',$("#inWorkOrderId").val());
            fd.append('companyId',companyId);

            fd.append('_token','<?php echo e(csrf_token()); ?>');

            $.ajax({
                 xhr: function() {
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable)
                            {
                                percent = Math.ceil(position / total * 100);
                                console.log("Percent : " + percent);
                            }



                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.dwgForQC')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){

                    if (response.success)
                    {
                        console.log(response);
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.company:'); ?>' + response.companyName,
                                    text: '<?php echo app('translator')->get('words.workorderisassignedforqcsuccessfully'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.href = "/home_preproduction";
                                  });
                    }
                        else
                        {
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/dk3app/resources/views/laravel/workorder/qc.blade.php ENDPATH**/ ?>