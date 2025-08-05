
<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
        <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.dispatch')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <h5><?php echo app('translator')->get('words.dispatch'); ?></h5>
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
                                    
                                    <div class="col-lg-4 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control rounded" type="text" readonly
                                                placeholder="WorkOrder Name" value="<?php echo e($workOrder->name); ?>">
                                                <input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value="<?php echo e($workOrder->modelarea_id); ?>"> 
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                                <!-- <div class="row  mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                    <label class="form-label"> <?php echo app('translator')->get('words.company'); ?> </label>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="input-group">
                                        <input id="inCompanyName" name="inCompanyName" class="form-control rounded" type="text" readonly
                                        value="HemmingerData">
                                        
                                    </div>
                                    </div>
                                </div> -->
                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.revitfile'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles1" class="form-group">
                                            <input id="files1" type="file" name="file1" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file1_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>
                                
                                <div class="row mt-1">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.ifcfile'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="frmFiles2" class="form-group">
                                            <input id="filess2" type="file" name="file2" class="form-control"  accept=".dwg">
                                        </div>
                                        <p id="file2_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>
                                <div class="row mt-1">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.dispatchnote'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="dispatchnote" class="form-group">
                                            <input id="DispatchNoteName" type="file" name="DispatchNoteName" class="form-control"  accept=".docx">
                                        </div>
                                        <p id="dispatchnote_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>

                                <div class="row mt-1">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.images'); ?></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="images" class="form-group">
                                            <input id="ImageName" type="file" name="ImageName" class="form-control"  accept=".zip" />
                                        </div>
                                        <p id="images_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                    </div>      
                                </div>
                                
                                <div class="row mt-1">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <button id="btnUploadIVLFile" onclick="processUpload();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.uploadfiles'); ?></button>
                                        </div>
                                    </div>
                                </div>

                    <!--    <hr class="my-4" />-->
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
    var RevitName = "";
    var IFCName = "";
    var DispatchNoteName = "";
    var ImageName = "";
    
    var RevitNameServer = "";
    var IFCNameServer = "";
    var RevitFileServerPath = "";
    var IFCFileServerPath = "";
    var fileTypes = [,
                    { "ext" : ".dwg", "type" : "Autocad Dwg" }];
    $(document).ready(function() {

    });
     $('#ImageName').on('change', function() {
        var file = this.files[0];
                if (file.size > 41943040) { // 40MB limit
                    alert("File is too large. Please select a file less than 40MB.");
                    this.value = ""; // Clear the input
                }
            });
    $("#file1").on("change", function() {
        workOrderName = $.trim($('#inWorkOrderName').val());

        if ($('#file1')[0].files.length==1) {
            $('#file1_error').hide();
        }
        else if ($('#file1')[0].files.length==0)
        {
            $('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectrevitfile'); ?>');
            $('#file1_error').show();
        }
        else
        {
            $('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#file1_error').show();
        }
        //alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
        if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_"+workOrderName.toLowerCase()+"_revit_map.rvt"))
        {
            //alert("123");
            $('#file1_error').html("Invalid File. File name should start with '" + "DKS3_"+workOrderName+"_Revit_Map.rvt'");
            $('#file1_error').show();
            return;
        }

    });
    $("#file2").on("change", function() {
        workOrderName = $.trim($('#inWorkOrderName').val());

        if ($('#file2')[0].files.length==1) {
            $('#file2_error').hide();
        }
        else if ($('#file2')[0].files.length==0)
        {
            $('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectifcfile'); ?>');
            $('#file2_error').show();
        }
        else
        {
            $('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#file2_error').show();
        }
        //alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
        if (!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_"+workOrderName.toLowerCase()+"_ifc_map.ifc"))
        {
            //alert("123");
            $('#file2_error').html("Invalid File. File name should start with '" + "DKS3_"+workOrderName+"_IFC_Map.ifc'");
            $('#file2_error').show();
            return;
        }

    });
    $("#dispatchnote").on("change", function() {
        workOrderName = $.trim($('#inWorkOrderName').val());

        if ($('#dispatchnote')[0].files.length==1) {
            $('#dispatchnote_error').hide();
        }
        else if ($('#dispatchnote')[0].files.length==0)
        {
            $('#dispatchnote_error').html('<?php echo app('translator')->get('words.pleaseselectdispathnotefile'); ?>');
            $('#dispatchnote_error').show();
        }
        else
        {
            $('#dispatchnote_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#dispatchnote_error').show();
        }
        //alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
        if (!($('#dispatchnote')[0].files[0].name).toLowerCase().startsWith("Dispatchnote_"+workOrderName.toLowerCase()+".docx"))
        {
            alert("123");
            $('#dispatchnote_error').html("Invalid File. File name should start with '" + "Dispatchnote_"+workOrderName+".docx'");
            $('#dispatchnote_error').show();
            return;
        }

    });
    $("#images").on("change", function() {
        workOrderName = $.trim($('#inWorkOrderName').val());

        if ($('#images')[0].files.length==1) {
            $('#images_error').hide();
        }
        else if ($('#images')[0].files.length==0)
        {
            $('#images_error').html('<?php echo app('translator')->get('words.pleaseselectimagezipfile'); ?>');
            $('#images_error').show();
        }
        else
        {
            $('#images_error').html('<?php echo app('translator')->get('words.pleaseselectonefileonly'); ?>');
            $('#images_error').show();
        }
        //alert(($('#file')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_pre-production_map"));
        if (!($('#images')[0].files[0].name).toLowerCase().startsWith(workOrderName.toLowerCase()+".zip"))
        {
            //alert("123");
            $('#images_error').html("Invalid File. File name should start with '" + workOrderName+".zip'");
            $('#images_error').show();
            return;
        }

    });

    $("#inCompanyId").on("change", function()
        {
            $('#inCompanyId').html("");
            $('#inCompanyId').hide();
        });
        function processUpload()
        {
            
                // var isError = false;
                
                // $('.errmsg').hide();
                
                
                // companyId = $.trim($('#inCompanyId').val()); 
                // console.log('companyId:', companyId);
                
                // workOrderName = $.trim($('#inWorkOrderName').val()); 
                
                // workOrderId = $.trim($('#inWorkOrderId').val()); 
                
                
                    
                // if(parseInt(companyId) === 0)
                // {
                //     $('#inCompanyId').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
                //     $('#inCompanyId').show();
                //     isError = true;
                // }
                
                // if ($('#file1')[0].files.length==0)
                // {
                //     $('#file1_error').html('<?php echo app('translator')->get('words.pleaseselectrevitfile'); ?>');
                //     $('#file1_error').show();
                //     isError = true;
                    
                // }
            //     else if (!($('#file1')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_revit_model.rvt")) {
            //             $('#file1_error').html("Invalid File. File name should start with 'DKS3_" + workOrderName + "_Revit_Model.rvt'");
            //             $('#file1_error').show();
            //             isError = true;
            //     }
                
                
            //     if ($('#file2')[0].files.length==0)
            //     {
            //         $('#file2_error').html('<?php echo app('translator')->get('words.pleaseselectifcfile'); ?>');
            //         $('#file2_error').show();
            //         isError = true;
                    
                    
            //     }
            //     else if(!($('#file2')[0].files[0].name).toLowerCase().startsWith("dks3_" + workOrderName.toLowerCase() + "_ifc_map.ifc")) {
            //         $('#file2_error').html("Invalid File. File name should start with 'DKS3_" + workOrderName + "_IFC_Map.ifc'");
            //         $('#file2_error').show();
            //         isError = true;
            //     }

            //     if ($('#dispatchnote')[0].files.length==0)
            //     {
            //         $('#dispatchnote_error').html('<?php echo app('translator')->get('words.pleaseselectdispatchnotefile'); ?>');
            //         $('#dispatchnote_error').show();
            //         isError = true;
                    
                    
            //     }
            //     else if(!($('#dispatchnote')[0].files[0].name).toLowerCase().startsWith(workOrderName.toLowerCase() + ".docx")) {
            //         $('#dispatchnote_error').html("Invalid File. File name should start with '" + workOrderName + ".docx'");
            //         $('#dispatchnote_error').show();
            //         isError = true;
            //     }

                
            //     if ($('#images')[0].files.length==0)
            //     {
            //         $('#images_error').html('<?php echo app('translator')->get('words.pleaseselectimagezipfile'); ?>');
            //         $('#images_error').show();
            //         isError = true; 
            //     }
            //     else if(!($('#images')[0].files[0].name).toLowerCase().startsWith(workOrderName.toLowerCase() + ".zip")) {
            //         $('#images_error').html("Invalid File. File name should start with '" + workOrderName + ".zip'");
            //         $('#images_error').show();
            //         isError = true;
            //     }
            
            // if (!isError)
            // {
                
            //     RevitName = $('#file1')[0].files[0].name;
            //     IFCName = $('#file2')[0].files[0].name;
            //     DispatchNoteName = $('#dispatchnote')[0].files[0].name;
            //     ImageName=$('#images')[0].files[0].name;
            //     // preproductionMapName = $('#file3')[0].files[0].name;
                
                uploadRevitMapDwg();
           // }   
        }

        function uploadRevitMapDwg()
        {
            console.log("hi company".companyId);
            var fd = new FormData();
                
                var dfile = $('#files1')[0].files[0];
                
                fd.append('file',dfile);
                fd.append('workOrderName',workOrderName);
                fd.append('workOrderId',workOrderId);
            
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
                                    
                                //var r1 =  dtFilesToUpload.row(fileIdx).data();
                                //r1.prgvalue = percent;
                                //dtFilesToUpload.row(fileIdx).data(r1).draw( false );
                                //console.log("File no : " + fileIdx + " successfully");
                                
                            }, true);
                        }
                        return xhr;
                    },
                    url: '<?php echo e(route('file.upload.dwgForModeldispatch')); ?>',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        if (response.success)
                        {
                            RevitNameServer = response.fileNameServer;
                            RevitFileServerPath = response.fileNameServerPath;
                           
                            uploadIFCFile();
                        }
                        
                    },
                });
        }

        function uploadIFCFile()
        {
            
            var fd = new FormData();
                
                var dfile = $('#filess2')[0].files[0];
                fd.append('file',dfile);
                fd.append('workOrderName',workOrderName);
                fd.append('workOrderId',workOrderId);
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
                    url: '<?php echo e(route('file.upload.dwgForModeldispatch')); ?>',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        if (response.success)
                        {
                            IFCNameServer = response.fileNameServer;
                            IFCFileServerPath = response.fileNameServerPath;
                            uploaddispatchFile();
                        }
                        
                    },
                });
        }
        function uploaddispatchFile()
        {
            
            var fd = new FormData();
                
                var dfile = $('#DispatchNoteName')[0].files[0];
                if (!dfile) {
                alert("Please select a file before uploading.");
                return;
            }
            fd.append('file', dfile);
                fd.append('file',dfile);
                fd.append('workOrderName',workOrderName);
                fd.append('workOrderId',workOrderId);
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
                    url: '<?php echo e(route('file.upload.dwgForModeldispatch')); ?>',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        if (response.success)
                        {
                            dispatchNameServer = response.fileNameServer;
                            dispatchFileServerPath = response.fileNameServerPath;
                            uploadimageFile();
                        }
                        
                    },
                });
        }
        function uploadimageFile()
        {
        //    // $('#ImageName').on('change', function() {
        //         var file = this.files[0];
        //         if (file.size > 41943040) { // 40MB limit
        //             alert("File is too large. Please select a file less than 40MB.");
        //             this.value = ""; // Clear the input
        //         }
        //   //  });
            var fd = new FormData();
                
            var dfile = $('#ImageName')[0].files[0];
            if (!dfile) {
                alert("Please select a file before uploading.");
                return;
            }
            fd.append('file', dfile);
                fd.append('file',dfile);
                fd.append('workOrderName',workOrderName);
                fd.append('workOrderId',workOrderId);
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
                    url: '<?php echo e(route('file.upload.dwgForModeldispatch')); ?>',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        if (response.success)
                        {
                            imageNameServer = response.fileNameServer;
                            imageFileServerPath = response.fileNameServerPath;
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
                fd.append('RevitName',RevitName);
                fd.append('IFCName',IFCName);
                fd.append('DispatchNoteName',DispatchNoteName);
                fd.append('ImageName',ImageName);
                fd.append('RevitNameServer',RevitNameServer);
                fd.append('dispatchNameServer',dispatchNameServer);
                fd.append('IFCNameServer',IFCNameServer);
                fd.append('imageNameServer',imageNameServer);
                fd.append('IFCFileServerPath',IFCFileServerPath);
                fd.append('RevitFileServerPath',RevitFileServerPath);
                fd.append('dispatchFileServerPath',dispatchFileServerPath);
              
                fd.append('imageFileServerPath',imageFileServerPath);
                fd.append('_token','<?php echo e(csrf_token()); ?>');
                
                $.ajax({
                    
            
                    url: '<?php echo e(route('uploaddispatchPost')); ?>',
                    type: 'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        
                        if (response.success)
                        {
                            Swal.fire({
                                        icon: 'success',
                                        title: '<?php echo app('translator')->get('words.dispatch'); ?>',
                                        text: '<?php echo app('translator')->get('words.dispatchfileuploadedsuccessfully'); ?>',
                                        showCancelButton: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success mx-2'
                                        },
                                        buttonsStyling: false
                                    }).then(function (result) {
                                            window.location.href = "/home_modelcreation";
                                    });
                        }
                        
                    },
                })
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/home_dispatch.blade.php ENDPATH**/ ?>