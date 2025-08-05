

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl mt-2 bg-primary ">
        <div class="container-fluid py-1 px-3">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.surveyfileupload')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <h5><?php echo app('translator')->get('words.newworkorder'); ?></h5>
        </div>
        <div class="card-body mt-1 pt-1">
            <form method="POST" action="<?php echo e(route('wo_create.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card card-custom">

                    <div id="cardBodyMain" class="card-body">

                        <form action="<?php echo e(route('file.upload.post')); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
                            <!--<hr class="my-1" />-->
                                
                                <div class="row mt-2">
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
                                        
                                    </div>
                                    
                                    <div class="col-lg-6 ">
                                        <div class="input-group">
                                            <input id="inWorkOrderName" name="inWorkOrderName" class="form-control" type="text"
                                                placeholder="WorkOrder Name" value="<?php echo e($workOrder->name); ?>" readonly>                                            
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
                                    <div class="col-lg-2 ">
                                        <input type="hidden" id="inWorkOrderId" name="inWorkOrderId" value="<?php echo e($workOrder->id); ?>"> 
                                    </div>
                                </div>
                                

                                <div class="row mt-4">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.pktfile'); ?></label>
                                    </div>
                                    
                      
                                    <div class="col-lg-6">
                                        <div id="frmFiles1" class="form-group">
                                            <input id="file1" type="file" name="file1" class="form-control"  accept=".pkt">
                                        </div>
                                    
                                    </div>      
                                    <!--<div class="col-lg-4">
                                        <button id="btnValidate" onclick="processValidate();" type="button" class="btn btn-success m-0 ms-2">Upload and Validate</button>
                                    </div>-->                                                       
                                </div>
                                
                                <div class="row mt-2">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"><?php echo app('translator')->get('words.lnefile'); ?></label>
                                    </div>
                                    
                      
                                    <div class="col-lg-6">
                                        <div id="frmFiles2" class="form-group">
                                            <input id="file2" type="file" name="file2" class="form-control"  accept=".lne">
                                        </div>
                                    
                                    </div>      
                                                                                            
                                </div>
                                <div class="row mt-2" id="divErrorList">
                                    <div class="row mt-2">
                                        <div class="col-lg-2 pt-1">
                                            
                                        </div>
                                        <div class="col-lg-10 pt-1">
                                            
                                            <li id="errorList" class="list-group" style="height: 300px; overflow: auto;">
                                            
                                            </li>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-2">                                                          
                                    <div class="col-lg-2 pt-1 text-end">
                                        <label class="form-label"></label>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <button id="btnUploadFiles" onclick="processUpload();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.validatefiles'); ?></button>
                                        </div>
                                    </div>      
                                                                                            
                                </div>
                                <div class="card card-custom mt-2" id="cardAttributes">

                                    <div  class="card-body">
                            
                                        <div class="row bg-gray-400" >
                                            <div class="col-lg-3 pt-1 text-center" style="border: 1px solid #344767;">
                                                <label class="form-label "><?php echo app('translator')->get('words.codelist'); ?> </label>
                                            </div>
                                            <div class="col-lg-9 pt-1 text-center" style="border: 1px solid #344767;">
                                                <label class="form-label"><?php echo app('translator')->get('words.attributelist'); ?> </label>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="border: 1px solid #344767;">
                                            <div  class="col-lg-3 ">
                                                <ul id="listDiv" class="list-group">
                                                  
                                                </ul>
                                            </div>
                                            <div id="tblDiv" class="col-lg-9">
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card card-custom mt-2" id="cardImages">

                                    <div  class="card-body">
                            
                                        <div class="row bg-gray-400">
                                            <div class="col-lg-6 pt-1 text-center" style="border: 1px solid #344767;">
                                                <label id="imgListPkt" class="form-label"><?php echo app('translator')->get('words.requiredfilepkt'); ?></label>
                                            </div>
                                            <div class="col-lg-6 pt-1 text-center" style="border: 1px solid #344767;">
                                                <label id="imgListSelected" class="form-label"><?php echo app('translator')->get('words.selectedimgfiles'); ?></label>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="row" style="border: 1px solid #344767;">
                                            <div  class="col-lg-6 ">
                                                <label class="form-label"><?php echo app('translator')->get('words.imgnametoselect'); ?></label>
                                                <ul id="imgListDiv" class="list-group mt-2" style="height: 200px; overflow: auto;">
                                          
                                                </ul>   
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="frmFiles3" class="form-group">
                                                    <input id="file3" type="file" name="file3" class="form-control"  accept=".jpg" multiple >
                                                    
                                                </div>
                                                <ul id="selImgListDiv" class="list-group" style="height: 200px; overflow: auto;">
                                          
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        <div class="row mt-1" >
                                            <div  class="col-lg-12 text-center">
                                                <label id="fileCompareTxt" class="form-label"></label>
                                            </div>
                                        </div>  
                                        <div class="row mt-1" >
                                            <div  class="col-lg-12 text-center">
                                        
                                            </div>
                                        </div>
                                            
                                            
                                            <div id="tblFilesToUploadRow" class="row" style="height: 300px;overflow: scroll;">
                                                <div class="col-lg-12">
                                                    <table id="tblFilesToUpload" class="display" style="width:100%;height:300px;">
                                                        <thead class="bg-dark text-white cell-border">
                                                            <tr>
                                                                <th><?php echo app('translator')->get('words.sno'); ?></th>
                                                                <th><?php echo app('translator')->get('words.filename'); ?></th>
                                                                <th><?php echo app('translator')->get('words.uploadprogress'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="border: 1px solid #344767;width:100%;height: 100px; overflow: auto">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div class="row  mt-4">
                                            <div class="col-lg-2 pt-1 text-end">
                                                    <label class="form-label"><?php echo app('translator')->get('words.remark'); ?></label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="input-group">
                                                        <textarea id="remarks" name="remarks" class="form-control"  
                                                                placeholder="Remarks" value=""> </textarea>
                                                    </div>
                                                        <p id="remarks_error" class='text-danger text-xs pt-1'>  </p>
                                                </div>
                                            </div>
                                            
                                            <div class="row  mt-4">
                                                <div class="col-lg-2 pt-1 text-end">
                                                    <label class="form-label"><?php echo app('translator')->get('words.cname'); ?></label>
                                                </div>
                                                <div class="col-lg-4">
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
                                                    
                                                        <p id="company_name_error" class='text-danger text-xs pt-1 errmsg'>  </p>
                                                    
                                                </div>
                                                <div class="col-lg-4 ">
                                                    <div class=" text-start ">    
                                                        <button id="btnUploadImages" onclick="startUpload();" type="button" class="btn btn-success m-0 ms-2"><?php echo app('translator')->get('words.uploadfilesassigntocompany'); ?></button> 
                                                                                            
                                                        <!--<button id="btnAssign" onclick="processAssign();" type="button" class="btn btn-success m-0 ms-2">Assign</button>-->
                                                    </div>
                                                </div>
                                            </div>                                      
                                        
                                    </div>
                                </div>
                                
                                
                                    
                                
                        </form>
                        
                        <hr class="my-4" />
                        
                        
                        
                        <table id="tblFilesUploaded" class="display" style="width:100%;display:none;">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th><?php echo app('translator')->get('words.sno'); ?></th>
                                    <th><?php echo app('translator')->get('words.filename'); ?></th>
                                    <th><?php echo app('translator')->get('words.type'); ?></th>
                                    <th><?php echo app('translator')->get('words.view'); ?></th>
                                    <th><?php echo app('translator')->get('words.delete'); ?></th>
                                </tr>
                            </thead>
                            <tbody style="border: 1px solid #344767;width:100%;height: 100px; overflow: auto">
                            </tbody>
                        </table>
                        
                        
                        
                        
                    </div>
                </div>
                
                
                
                
                
            </form>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    
    <style>
        .choices {
            margin-bottom: 0;
        }
        
        .list-group-item.green-highlight {
            background-color: #58be7f;
            color: white;
        }

        .list-group-item.red-highlight {
            background-color: #f16161;
            color: white;
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
    var dtFilesToUpload;
    var dtFilesUploaded;
    var dtFilesUploadedReview;
    
    var fileIdx;
    var maxFileIdx;
    
    var workOrderName = "";
    var workAreaId = 0;
    var workAreaName = "";
    var startDateTxt = "";
    var endDateTxt = "";
    var workOrderId = 0;
    
    var pktFileServerPath = "";
    var lneFileServerPath = "";
    
    var imgList = new Array();
    var selImgList = new Array();
    var matchingImgList = new Array();
    var notmatchingImgList = new Array();
    var imgObjects = new Array();
    var allObjects,lineObjects;
    
    var noLneFile = false;
	var noPktFile = false;
    
    var fileTypes = [{ "ext" : ".pdf", "type" : "Pdf Document" },
                    { "ext" : ".doc", "type" : "Word Document" },
                    { "ext" : ".docx", "type" : "Word Document" },
                    { "ext" : ".dwg", "type" : "Autocad Dwg" }, 
                    { "ext" : ".dxf", "type" : "Autocad Dxf" }, 
                    { "ext" : ".rvt", "type" : "Revit Drawing" },   
                    { "ext" : ".fbx", "type" : "FBX Model" },   
                    { "ext" : ".ifc", "type" : "IFC Model File" },
                    { "ext" : ".jpg", "type" : "Image File" },
                    { "ext" : ".png", "type" : "Image File" },
                    { "ext" : ".tif", "type" : "Image File" }];

    
    function fillFilesToUploadTable()
    {
        dtFilesToUpload = $('#tblFilesToUpload').DataTable({
            paging: false,
            searching: false,
            ordering:  false,
            info : false,
            columns: [
                {
                    data: 'sno',
                
                },
                {
                    data: 'filename'
                },
                
                {
                    data: 'prgvalue',
                    render: function(data, type, row, meta) {
                        
                        if (data == 100) {
                            return "<span><?php echo app('translator')->get('words.uploaded'); ?></span>";
                        }
                        else {
                            return type === 'display' ?
                                '<progress value="' + data + '" max="100"></progress>' :
                                data;
                        }
                    }
                },
                
            ]
        });
        
         $('#tblFilesToUploadRow').hide();
    }
    
    function fillFilesUploadedTable()
    {
        dtFilesUploaded = $('#tblFilesUploaded').DataTable({
            paging: false,
            searching: false,
            ordering:  false,
            info : false,
            
            columns: [
                {
                    data: 'sno',
                },
                {
                    data: 'name'
                },
                {
                    data: 'type'
                },
                
                {
                    data: 'view',
                    render: function(data, type, row, meta) {
                        return "<span style='cursor:pointer;' onclick='viewmodel(" + data + ");'><i class='flaticon-eye font-weight-bold text-info icon-2x'></i></span>";
                    }
                    
                },
                {
                    data: 'delete',
                    render: function(data, type, row, meta) {
                        return "<span style='cursor:pointer;' onclick='deletemodel(" + data + ");'><i class='flaticon-cancel font-weight-bold text-danger icon-2x'></i></span>";
                    }
                },
                    
                
            ]
        });
        
        
    }
    

    $(document).ready(function() {
        initUploadFileList();
        fillFilesToUploadTable();
        fillFilesUploadedTable();
        
        $("#Matching_notmatchingDiv").hide();
        $("#divErrorList").hide();
        
        $("#cardAttributes").hide();
        $("#cardImages").hide();
        
        $("#file3").prop('disabled', true);
        
        $("#fileCompareTxt").hide();
        $("#btnUploadImages").hide();
    });
    
    function checkFileNameExists(name1)
    {
        for(var i=0;i<uploadFilesList.length;i++)
        {
            if (uploadFilesList[i].name==name1)
            {
                return true;
            }
        }
        
        return false;
    }
    
    
    
    $("#file1").on("change", function() {
        
        workOrderName = $('#inWorkOrderName').val();
        
        
        if ($('#file1')[0].files.length==1) {
            
            var  expectedName = "DKS3_" + workOrderName ;
            
            if (!$('#file1')[0].files[0].name.startsWith(expectedName))
            {
                Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.nameerror'); ?>',
                        text: '<?php echo app('translator')->get('words.filenameinvalidformat'); ?>'+ expectedName ,
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                $("#file1").val('');
                return;
            }
            
            if (getFileExtension($('#file1')[0].files[0].name)!='pkt')
            {
                Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.fileexerror'); ?>',
                        text: '<?php echo app('translator')->get('words.invalidfileexpkt'); ?>',
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                $("#file1").val('');
                return;
            }
        }
    });

    $("#file2").on("change", function() {
        
        workOrderName = $('#inWorkOrderName').val();
        
        
        if ($('#file2')[0].files.length==1) {
            
            var  expectedName = "DKS3_" + workOrderName ;
            
            if (!$('#file2')[0].files[0].name.startsWith(expectedName))
            {
                Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.nameerror'); ?>',
                        text: '<?php echo app('translator')->get('words.filenameinvalidformat'); ?>' + expectedName,
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                $("#file2").val('');
                return;
            }
            
            if (getFileExtension($('#file2')[0].files[0].name)!='lne')
            {
                Swal.fire({
                        icon: 'warning',
                        title: '<?php echo app('translator')->get('words.fileexerror'); ?>',
                        text: '<?php echo app('translator')->get('words.invalidfileexlne'); ?>',
                        showCancelButton: false,
                        customClass: {
                            confirmButton: 'btn btn-success mx-2'
                        },
                        buttonsStyling: false
                    });
                $("#file2").val('');
                return;
            }
        }
    }); 
    
    $("#file3").on("change", function() {
        
        $("#fileCompareTxt").hide();
            
        workOrderName = $('#inWorkOrderName').val();
        
        if(imgList.length > 0)
        {
            $("#selImgListDiv").html("");
        
            var txt1 = "";
            
            selImgList = new Array();
            
            if ($('#file3')[0].files.length > 0) {
                
                for(var i=0;i<$('#file3')[0].files.length;i++)
                {
                    var fileName = $('#file3')[0].files[i].name;
                    selImgList.push($('#file3')[0].files[i].name);
                    
                    // txt1 = txt1 + "<li class='list-group-item'>" + (i+1) + " - " + $('#file3')[0].files[i].name + "</li>";
                    if ($.inArray(fileName, imgList) >= 0) {
                    // Image exists, highlight it in green
                    txt1 += "<li class='list-group-item green-highlight'>" + (i + 1) + " - " + fileName + "</li>";
                    } else {
                        // Image does not exist, highlight it in red
                        txt1 += "<li class='list-group-item red-highlight'>" + (i + 1) + " - " + fileName + "</li>";
                    } 
                }
                
            }
            
            $("#imgListSelected").html("Selected Image Files ( No of Files : " + $('#file3')[0].files.length + ")");
            
            $("#selImgListDiv").html(txt1);
            
            $("#Matching_notmatchingDiv").show();
            showMatching_notmatchingFiles();            
        }
        else
        {
            Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.pktimgfileerror'); ?>',
                text: '<?php echo app('translator')->get('words.pktimgfileupload'); ?>',
                showCancelButton: false,
                customClass: {
                    confirmButton: 'btn btn-success mx-2'
                },
                buttonsStyling: false
            });
            $("#file3").val('');
            return;
        }       
            
    });
    
    function getFileExtension(filename){

        // get file extension
        const extension = filename.split('.').pop();
        return extension;
    }
    
    function processImport() {
        //workOrderName = $("#inWorkOrderName").val();
        //startUpload();
        
        validatePktFile();
            
    }
    
    function validatePktFile() {
    var fd = new FormData();
    var workOrderId = $.trim($('#inWorkOrderId').val()); 
    fd.append('workorder_id', workOrderId);
    fd.append('pktFilePath', pktFileServerPath);
    fd.append('lneFilePath', lneFileServerPath);
    
	if (noPktFile)
    {
         fd.append('noPktFile', 1);
    }
    else
    {
         fd.append('noPktFile', 0);
    }

    if (noLneFile)
    {
         fd.append('noLneFile', 1);
    }
    else
    {
         fd.append('noLneFile', 0);
    }
    
    fd.append('_token', '<?php echo e(csrf_token()); ?>');
    
    $.ajax({
        url: '/validatepktfile',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                // Handle success
                allObjects = response.allObjects;
                lineObjects = response.lineObjects;
                console.log(allObjects);
                console.log(lineObjects);
                $("#cardAttributes").show();
                $("#cardImages").show();
                showObjectList();
                $("#divErrorList").hide();
                $("#file3").prop('disabled', false);
            } else {
                // Handle errors
                var errorList = response.errorList;
                var warningList = response.warningList;

                if (errorList && errorList.length > 0) {
                    // Clear existing errors
                    $("#errorList").empty();
                    
                    // Display errors in HTML list
                    $.each(errorList, function(index, error) {
                        var serialNumber = index + 1;
                        $("#errorList").append("<li class='list-group-item' style='color:red'>" + serialNumber + ". " + error + "</li>");
                    });
                    
                    // Show error container
                    $("#divErrorList").show();
                }
                if (warningList && warningList.length > 0) {
                    // Clear existing errors
                    //$("#errorList").empty();
                    
                    // Display errors in HTML list
                    $.each(warningList, function(index, warning) {
                        var serialNumber = index + 1;
                        $("#errorList").append("<li class='list-group-item' style='color:green'>" + serialNumber + ". " + warning + "</li>");
                    });
                    
                    // Show error container
                    $("#divErrorList").show();
                }
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.error(xhr.responseText);
            // alert("Error occurred while processing request. Please try again.");
        }
    });
}
    
    function showObjectList()
    {       
        var txt  = "";
        
        var txt1 = "";
        
        imgList = new Array();
        
        var sno = 1;
        
        for(var i=0;i<allObjects.length;i++)
        {
            var elmObj = allObjects[i];
            
            if (elmObj.objectGroup.length>0)
            {
                txt = txt + "<li class='list-group-item'>" +
                "<a href='javascript:showDataTableById( " + i +  ")'" + 
                "class='w-100 d-flex justify-content-between align-items-center'>"+ elmObj.objectName +
                "<span class='badge badge-primary badge-pill'>" + elmObj.objectGroup.length + "</span></a></li>";
                            
                for(var k=0;k<elmObj.objectGroup.length;k++)
                {
                    for(var j=0;j<elmObj.objectGroup[k].images.length;j++)
                    {
                        imgList.push(elmObj.objectGroup[k].images[j]);
                        
                        txt1 = txt1 + "<li class='list-group-item'>" + sno + " - " + elmObj.objectGroup[k].images[j] + "</li>";
                    
                        sno++;
                    }                   
                }               
            }           
            
        }
        
        $("#imgListPkt").html('<?php echo app('translator')->get('words.pktfilerequired'); ?>' + imgList.length);
        
        $("#listDiv").html(txt);
        $("#imgListDiv").html(txt1);
    }
    
    function showDataTableById(idx)
    {
        showDataTable(allObjects[idx]);
    }
    
    function showDataTable(mainObj)
    {
        var mainObjName = mainObj.objectName;
        var keyList = Object.keys( mainObj.objectGroup[0]);
        
        var tblTxtHeaderTop = "<table id='tbl_" + mainObjName +"' ><thead class='bg-dark text-white'><tr>";
        var tblTxtHeaderBottom = " </tr></thead><tbody style='border: 1px solid #344767;width:100%;height: 100px; overflow: auto'>";
        var tblTxtFooter= "</tbody></table>";
        
        var tblHeaderRowTxt = "";
        var tblBodyRowTxt = "";
        
        for(var i=0;i<keyList.length;i++)
        {
            tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>" + keyList[i] + "</th>";
        }
        
        for(var i=0;i<mainObj.objectGroup.length;i++)
        {
            tblBodyRowTxt +=  "<tr>";
            var j = 0;
            
            for(var j=0;j<keyList.length;j++)
            {
                tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj.objectGroup[i][keyList[j]] + "</td>";
            }
            
            tblBodyRowTxt += "</tr>";
            
        }
        
        var txtTextFull = tblTxtHeaderTop + tblHeaderRowTxt + tblTxtHeaderBottom + tblBodyRowTxt + tblTxtFooter;
        
        $("#tblDiv").html(txtTextFull);
        
        var dt1 = new DataTable("#tbl_" + mainObjName, {
            scrollX: true,
            scrollY: 300,
            paging: false,
            searching: false,
            ordering:  false,
            info : false,
        });                             
                            
    }
    
    function ValidateFileUpload()
    {
        sendCreateRequest();
    }
    
    function sendCreateRequest()
    {       
        var fd = new FormData();
        
        fd.append('workOrderName',workOrderName);
        fd.append('workAreaId',workAreaId);
        fd.append('workAreaName',workAreaName);
        fd.append('planned_startdate',startDateTxt);
        fd.append('planned_enddate',endDateTxt);
        
        fd.append('_token','<?php echo e(csrf_token()); ?>');
        
        $.ajax({
             
            url: '<?php echo e(route('workorder_create')); ?>',
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
             workOrderId = response.workorderid;
             startUpload();
                
            },
        });
    }
    
    function startUpload() {
        
        var remarks = $.trim($('#remarks').val()); 

        if($.trim(remarks) == "")
        {
            $('#remarks_error').html('<?php echo app('translator')->get('words.remarkshouldnotbeempty'); ?>');
            $('#remarks_error').show();
            
            return;
        }

        var companyId = $.trim($('#company_name').val()); 
        
        if(parseInt(companyId) === 0)
        {
            $('#company_name_error').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
            $('#company_name_error').show();
            
            return;
        }
        var extraImgs = CheckExtraImg();
        
        
        if (extraImgs != "")
        {
            Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.pktimgfileerror'); ?>',
                html: "<p style='font-size:16px;'><?php echo app('translator')->get('words.extraimagelist'); ?></p><p style='font-size:12px;height:100px;overflow: scroll;'>" + extraImgs + "</p>",
                showCancelButton: false,
                customClass: {
                    confirmButton: 'btn btn-success mx-2'
                },
                buttonsStyling: false
            });
            return;
        }
        
        uploadFilesList = new Array();
        fileIdx = 0;
        maxFileIdx=$('#file3')[0].files.length;
        
        for(var i=0;i<$('#file3')[0].files.length;i++)
        {
             dtFilesToUpload.row.add( {"sno":(i+1),"filename":$('#file3')[0].files[i].name,"prgvalue":"0"}).draw( false );
        }
        $('#tblFilesToUploadRow').show();
        UploadFileByIndex();
        
        
    }
    
    function UploadFileByIndex()
    {
        var fd = new FormData();
            
            var dfile = $('#file3')[0].files[fileIdx];
            fd.append('file',dfile);
            workOrderId = $.trim($('#inWorkOrderId').val()); 
            fd.append('workorder_id',workOrderId);
            
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
                            }
                                
                            var r1 =  dtFilesToUpload.row(fileIdx).data();
                            r1.prgvalue = percent;
                            dtFilesToUpload.row(fileIdx).data(r1).draw( false );

                            //console.log("File no : " + fileIdx + " successfully");
                            
                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.postsurvey')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    //console.log(response);
                    //var fileType = getFileType(response);
                    //addUploadFileToList(response,fileType.type,response   );
                    
                    imgObjects.push(response);
                    
                    fileIdx++;
                    
                    if (fileIdx>=maxFileIdx)
                    {
                        $("#file3").val('');
                         $('#tblFilesToUploadRow').hide();
                         dtFilesToUpload.rows().remove().draw();
                        //alert("All Files Uploaded Successfully");
                        //return;
                        
                        processAssign();
                    }
                    else {
                        UploadFileByIndex();
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
    
    function initUploadFileList()
    {
        uploadFilesList = new Array();
    }
    
    function addUploadFileToList(name1,filetype1,filename1)
    {
        var obj1 = new Object();
        obj1.name = name1;
        obj1.type = filetype1;
        obj1.newname = filename1;
        obj1.view1 = 1;
        obj1.delete1 = 1;
        
        uploadFilesList.push(obj1);
        //refreshUploadedFilesTable();
    }
    
    function refreshUploadedFilesTable()
    {
        dtFilesUploaded.rows().remove().draw(false);
        
        
        for(var i=0;i<uploadFilesList.length;i++)
        {
            dtFilesUploaded.row.add( {"sno":(i+1),"name":uploadFilesList[i].name,"type":uploadFilesList[i].type,"filename":uploadFilesList[i].newname,"view":i,"delete":i}).draw( false );
        }
    }
    
    function refreshUploadedFilesTableReview()
    {
        dtFilesUploadedReview.rows().remove().draw(false);
        
        
        for(var i=0;i<uploadFilesList.length;i++)
        {
            dtFilesUploadedReview.row.add( {"sno":(i+1),"name":uploadFilesList[i].name,"type":uploadFilesList[i].type,"filename":uploadFilesList[i].newname,"view":i,"delete":i}).draw( false );
        }
    }
    
    function addUploadFilesToList(projectfiles)
    {
        uploadFilesList = new Array();
        
        for(var i=0;i<projectfiles.length;i++)
        {
            var obj1 = new Object();
            obj1.name = projectfiles[i].name;
            obj1.type = projectfiles[i].filetype;
            obj1.newname = projectfiles[i].filename;
            uploadFilesList.push(obj1);
        }
    }
    
    function processAssign()
    {
        var fd = new FormData();
        workOrderId = $.trim($('#inWorkOrderId').val()); 
        remarks = $.trim($('#remarks').val()); 
        fd.append('workorder_id',workOrderId);
        fd.append('allObjects',JSON.stringify(allObjects));
        fd.append('lineObjects',JSON.stringify(lineObjects));
        fd.append('imgObjects',JSON.stringify(imgObjects));
        fd.append('remarks', remarks);
        fd.append('_token','<?php echo e(csrf_token()); ?>');
        
        $.ajax({
             
            url: '<?php echo e(route('uploadpktdata')); ?>',
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
                if (response.success)
                {
                    //alert("files are uploaded succesfully");
                    //console.log(response.message);
                    processAssign1();
                }
                else
                {
                    // alert("files uploading failed");
                    console.log(response.message);
                }
            },
        });
    }
    
    function CheckExtraImg()
    {
        var extraNames = "";
        for(var i=0;i<selImgList.length;i++)
        {
            if ($.inArray(selImgList[i], imgList)<0)
            {
                //extraImgList.push(selImgList[i]);
                extraNames +=  selImgList[i] + "<br>" ;
                console.log(selImgList[i]);
                
            }
        }
        
        return extraNames;
    }
    
    function showMatching_notmatchingFiles()
    {
        
        $("#matchingimgListDiv").html("");
        $("#notmatchingimgListDiv").html("");
        
        
        matchingImgList = new Array();
        notmatchingImgList = new Array();
        
        var dupList = new Array();
        
        for(var i=0;i<imgList.length;i++)
        {
            dupList[i] = 0;
            for(var j=0;j<imgList.length;j++)
            {
                if (imgList[i] == imgList[j])
                {
                    dupList[i]++;
                }
            }
            
        }
        
        for(var i=0;i<imgList.length;i++)
        {
            if (dupList[i]>1)
            {
                console.log("dup:" + imgList[i]);
            }
        }
        
        
        
        for(var i=0;i<imgList.length;i++)
        {
            if ($.inArray(imgList[i], selImgList)>=0)
            {
                matchingImgList.push(imgList[i]);
            }
            else
            {
                notmatchingImgList.push(imgList[i]);
            }
        }
        
        extraImgList = new Array();
        
        
        
    
        // $.each( imgList, function( key, value ) {
        //     var index = $.inArray( value, selImgList );
        //     if( index != -1 ) {
        //         //console.log( index +","+ value);  
        //         matchingImgList.push(value);
        //     }
        //     else{
        //         //console.log( index +","+ value);  
        //         notmatchingImgList.push(value);
        //     }           
        // });
        
        // $("#Matching_notmatchingDiv").show();
        // showMatching_notmatchingFiles();
        
        var txt1 = "";
        var txt2 = "";  
        
        if (matchingImgList.length > 0) {
            
            for(var i = 0; i < matchingImgList.length; i++)
            {               
                txt1 = txt1 + "<li class='list-group-item green-highlight'>" + (i+1) + " - " + matchingImgList[i] + "</li>";
            }
            
        }
        
        if (notmatchingImgList.length > 0) {
            
            for(var i = 0; i < notmatchingImgList.length; i++)
            {               
                txt2 = txt2 + "<li class='list-group-item red-highlight'>" + (i+1) + " - " + notmatchingImgList[i] + "</li>";
            }
            
            $("#fileCompareTxt").show();
            $("#fileCompareTxt").html('<?php echo app('translator')->get('words.imagefilesrequired'); ?>');
        }
        else
        {
            $("#fileCompareTxt").hide();
            $("#btnUploadImages").show();
        }
        
        
        
        //$("#matchingimgListPkt").html("Matching Image Files ( No of Files : " + matchingImgList.length + ")");
        //$("#notmatchingimgListPkt").html("Not Matching Image Files ( No of Files : " + notmatchingImgList.length + ")");
        $("#imgListDiv").html(txt2);
        // $("#matchingimgListDiv").html(txt1);
        // $("#notmatchingImgListDiv").html(txt2);
    }
    
    $("#company_name").on("change", function() 
    {
        $('#company_name_error').html("");
        $('#company_name_error').hide();
        
    });
    
    function processAssign1()
    {
        //alert("Data uploaded");
        //return;
        
        var companyId = $.trim($('#company_name').val()); 
        
        if(parseInt(companyId) === 0)
        {
            $('#company_name_error').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');
            $('#company_name_error').show();
            
            return;
        }
        
        workOrderName = $.trim($('#inWorkOrderName').val()); 
        
        workOrderId = $.trim($('#inWorkOrderId').val()); 
        
            var fd = new FormData();
            
            fd.append('workOrderName',workOrderName);
            fd.append('workOrderId',workOrderId);
            fd.append('companyId',companyId);
            fd.append('_token','<?php echo e(csrf_token()); ?>');
            
            $.ajax({
                 
                url: '<?php echo e(route('assignToMapCreationPost')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.company:'); ?>' + response.companyName,
                                    text: '<?php echo app('translator')->get('words.workordermapcsuceess'); ?>',
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.href = "/home";
                                });
                    }
                    
                },
            });
    }
    
    function processUpload()
    {
        workOrderName = $.trim($('#inWorkOrderName').val()); 
        
        workOrderId = $.trim($('#inWorkOrderId').val());
        
        //alert(workOrderName);
        
        if ($('#file1')[0].files.length==0) {
            
            
            Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                text: '<?php echo app('translator')->get('words.withoutpktfile'); ?>',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            }).then(function (result) {
                    if (result.isConfirmed)
                    {
                        noPktFile = true;
                        uploadPktFile();
                    }
                    
              });  
            
        }else if ($('#file2')[0].files.length==0) {
            
            
            Swal.fire({
                icon: 'warning',
                title: '<?php echo app('translator')->get('words.workorder'); ?>',
                text: '<?php echo app('translator')->get('words.withoutlnefile'); ?>',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            }).then(function (result) {
                    if (result.isConfirmed)
                    {
                        noLneFile = true;
                        uploadPktFile();
                    }
                    
              });  
            
        }else
        {
            noLneFile = false;
			noPktFile = false;
            uploadPktFile();
        }

                
    }
    
    function uploadPktFile()
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
                                
                            
                            
                        }, true);
                    }
                    return xhr;
                },
                url: '<?php echo e(route('file.upload.workorderPKT')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        pktFileServerPath = response.fileNameServer;
                        //validatePktFile();
                        
                        if (noLneFile)
                        {
                            lneFileServerPath = "";
                            validatePktFile();
                        }
                        else{
                            uploadLneFile();
                        }
                    }
                    
                },
            });
    }
    
    function uploadLneFile()
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
                url: '<?php echo e(route('file.upload.workorderLNE')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    if (response.success)
                    {
                        
                        lneFileServerPath = response.fileNameServer;
                        validatePktFile();
                    }
                    
                },
            });
    }
    
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\Hemminger\Dk3app_Final\dk3app\resources\views/laravel/survey/surveyupload.blade.php ENDPATH**/ ?>