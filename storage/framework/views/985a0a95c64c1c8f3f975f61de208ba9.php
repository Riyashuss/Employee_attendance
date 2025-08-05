

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Work order assignment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
                <button class='btn btn-icon btn-2 mb-0 me-1' type='button' onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
                    <span class=''>
                        <i class="fa fa-user me-sm-1" style="color: white;"></i>
                    </span>
                </button>
                    
                    
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
    
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
        <div class="card-header  mt-1 pt-1">
            <h5>Work Order assignment to Survey</h5>
        </div>
        <div class="card-body mt-1 pt-1">
                <?php echo csrf_field(); ?>
                
                <div class="card card-custom">

                    <div id="cardBodyMain" class="card-body">

                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
                            <!--<hr class="my-1" />-->
                                
                                <div class="row mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label">Work Order Name</label>
                                        
                                    </div>
                                    
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control" type="text" readonly
                                                placeholder="WorkOrder Name" value="<?php echo e($workOrder->name); ?>">
                                                <input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value="<?php echo e($workOrder->id); ?>"> 
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                                <div class="row  mt-4">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label">Company Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <select class="form-control" name="company_name" id="company_name">
                                                <option value="0"></option>
                                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($company->id); ?>"
                                                        <?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>
                                                        <?php echo e($company->company_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>   
                                        </div>
                                        
                                            <p id="company_name_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                        
                                    </div>
                                    
                                </div>
                                

                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label">Base Map</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles1" class="form-group">
                                            <input id="file1" type="file" name="file1" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file1_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>
                                
                                <!-- <div class="row mt-4">                                                         
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label">Pre-production Map</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles2" class="form-group">
                                            <input id="file2" type="file" name="file2" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file2_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div> -->
                                
                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label">Survey Map</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles3" class="form-group">
                                            <input id="file3" type="file" name="file3" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file3_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>
                                
                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"></label>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <button id="btnProcessUpload" onclick="processUpload();" type="button" class="btn btn-success m-0 ms-2">Assign To Company</button>
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
    
    var workOrderName = "";
    
    var workOrderId = 0;
    
    var companyId = 0;
    
    var baseMapName = "";
    var surveyMapName = "";
    //var preproductionMapName = "";
    
    var baseMapNameServer = "";
    var surveyMapNameServer = "";
    //var preproductionMapNameServer = "";
    
    var baseMapNameServerPath = "";
    var surveyMapNameServerPath = "";
    //var preproductionMapNameServerPath = "";
    
    var fileTypes = [{ "ext" : ".dwg", "type" : "Autocad Dwg" }];

    $(document).ready(function() {
        
    workOrderName = $.trim($('#inWorkOrderName').val()); 
    });
    
    $("#file1").on("change", function() {
        
        if ($('#file1')[0].files.length==1) {
            $('#file1_error').hide();
            //return;
        }
        else if ($('#file1')[0].files.length==0)
        {
            $('#file1_error').html("Please select a BaseMap file");
            $('#file1_error').show();
            return;
        }
        else
        {
            $('#file1_error').html("Please select one BaseMap file only");
            $('#file1_error').show();
            return;
        }
        
        if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_basemap"))
        {
            $('#file1_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_BaseMap'");
            $('#file1_error').show();
            return;
        }
        
        
    });
    
    // $("#file2").on("change", function() {
        
    //  if ($('#file2')[0].files.length==1) {
    //      $('#file2_error').hide();
    //      //return;
    //  }
    //  else if ($('#file2')[0].files.length==0)
    //  {
    //      $('#file2_error').html("Please select a Pre-production file");
    //      $('#file2_error').show();
    //      return;
    //  }
    //  else
    //  {
    //      $('#file2_error').html("Please select one Pre-production file only");
    //      $('#file2_error').show();
    //      return;
    //  }
        
    //  if (!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_preproduction_map"))
    //  {
    //      $('#file2_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_Preproduction_Map'");
    //      $('#file2_error').show();
    //      return;
    //  }
        
        
    // });
    

    $("#file3").on("change", function() {
        
        if ($('#file3')[0].files.length==1) {
            $('#file3_error').hide();
            //return;
        }
        else if ($('#file3')[0].files.length==0)
        {
            $('#file3_error').html("Please select a SurveyMap file");
            $('#file3_error').show();
            return;
        }
        else
        {
            $('#file3_error').html("Please select one SurveyMap file only");
            $('#file3_error').show();
            return;
        }
        
        if (!($('#file3')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_map_for_survey"))
        {
            $('#file3_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_Map_for_Survey'");
            $('#file3_error').show();
            return;
        }
        
        
    });
    

    
    $("#company_name").on("change", function() 
        {
            $('#company_name_error').html("");
            $('#company_name_error').hide();
            
        });
    
    
    
    function processUpload()
    {
        
        var isError = false;
        
        $('.errmsg').hide();
        
        
        companyId = $.trim($('#company_name').val()); 
        
        workOrderName = $.trim($('#inWorkOrderName').val()); 
        
        workOrderId = $.trim($('#inWorkOrderId').val()); 
        
        
            
        if(parseInt(companyId) === 0)
        {
            $('#company_name_error').html('CompanyName should not be empty');
            $('#company_name_error').show();
            isError = true;
        }
        
        if ($('#file1')[0].files.length==0)
        {
            $('#file1_error').html("Please select a BaseMap file");
            $('#file1_error').show();
            isError = true;
            
        }
        
        
        
        // if ($('#file2')[0].files.length==0)
        // {
        //  $('#file2_error').html("Please select a Pre-production file");
        //  $('#file2_error').show();
        //  isError = true;
            
            
        // }
        
        
        if ($('#file3')[0].files.length==0)
        {
            $('#file3_error').html("Please select a Survey file");
            $('#file3_error').show();
            isError = true;
        }
        
        
        if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_basemap"))
        {
            $('#file1_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_BaseMap'");
            $('#file1_error').show();
            isError = true;
        }
        
        // if (!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_preproduction_map"))
        // {
        //  $('#file2_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_Preproduction_Map'");
        //  $('#file2_error').show();
        //  isError = true;
        // }
        
        if (!($('#file3')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_map_for_survey"))
        {
            $('#file3_error').html("Invalid File. File name should start with '" + "DKS3_" + workOrderName + "_Map_for_Survey'");
            $('#file3_error').show();
            isError = true;
        }
        
        if (!isError)
        {
            
            baseMapName = $('#file1')[0].files[0].name;
            //preproductionMapName = $('#file2')[0].files[0].name;
            surveyMapName = $('#file3')[0].files[0].name;
                        
            uploadBaseMapDwg();
    
        }
        
        
        
    }
    
    function uploadBaseMapDwg()
    {
        
        var fd = new FormData();
            
            var dfile = $('#file1')[0].files[0];
            
            fd.append('file',dfile);
            fd.append('workOrderName',workOrderName);
            fd.append('workOrderId',workOrderId);
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
                                
                            //var r1 =  dtFilesToUpload.row(fileIdx).data();
                            //r1.prgvalue = percent;
                            //dtFilesToUpload.row(fileIdx).data(r1).draw( false );

                            //console.log("File no : " + fileIdx + " successfully");
                            
                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.dwgForSurvey')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        baseMapNameServer = response.fileNameServer;
                        baseMapNameServerPath = response.fileNameServerPath;
                        //uploadPreproductionDwg();
                        uploadSurveyDwg();
                    }
                    
                },
            });
    }
    
    function uploadPreproductionDwg()
    {
        
        var fd = new FormData();
            
            var dfile = $('#file2')[0].files[0];
            fd.append('file',dfile);
            fd.append('workOrderName',workOrderName);
            fd.append('workOrderId',workOrderId);
            
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
                                
                            //var r1 =  dtFilesToUpload.row(fileIdx).data();
                            //r1.prgvalue = percent;
                            //dtFilesToUpload.row(fileIdx).data(r1).draw( false );

                            //console.log("File no : " + fileIdx + " successfully");
                            
                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.dwgForSurvey')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        preproductionMapNameServer = response.fileNameServer;
                        preproductionMapNameServerPath = response.fileNameServerPath;
                        uploadSurveyDwg();
                    }
                    
                },
            });
    }
    
    function uploadSurveyDwg()
    {
        
        var fd = new FormData();
            
            var dfile = $('#file3')[0].files[0];
            fd.append('file',dfile);
            fd.append('workOrderName',workOrderName);
            fd.append('workOrderId',workOrderId);
            
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
                                
                            //var r1 =  dtFilesToUpload.row(fileIdx).data();
                            //r1.prgvalue = percent;
                            //dtFilesToUpload.row(fileIdx).data(r1).draw( false );

                            //console.log("File no : " + fileIdx + " successfully");
                            
                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.dwgForSurvey')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        surveyMapNameServer = response.fileNameServer;
                        surveyMapNameServerPath = response.fileNameServerPath;
                        processAssign();
                    }
                    
                },
            });
    }
    
    function processAssign()
    {
            var fd = new FormData();
            
            fd.append('workOrderName',workOrderName);
            fd.append('workOrderId',workOrderId);
            fd.append('companyId',companyId);
            fd.append('baseMapName',baseMapName);
            //fd.append('preproductionMapName',preproductionMapName);
            fd.append('surveyMapName',surveyMapName);
            fd.append('baseMapNameServer',baseMapNameServer);
            //fd.append('preproductionMapNameServer',preproductionMapNameServer);
            fd.append('surveyMapNameServer',surveyMapNameServer);
            fd.append('baseMapNameServerPath',baseMapNameServerPath);
            //fd.append('preproductionMapNameServerPath',preproductionMapNameServerPath);
            fd.append('surveyMapNameServerPath',surveyMapNameServerPath);
            
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                 
                url: '<?php echo e(route('assignToSurveyPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: 'Company : ' + response.companyName,
                                    text: "WorkOrder is assigned to Survey successfully",
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.href = "/home_survey";
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
    
    function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }
    
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/survey/assigntosurvey.blade.php ENDPATH**/ ?>