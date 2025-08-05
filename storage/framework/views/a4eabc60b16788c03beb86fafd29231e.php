

<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-1 shadow-none border-radius-xl  mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Object Data Attributes Import'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
	
	
    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">
		<div class="card-header  mt-1 pt-1">
			<h5>Object Data Attributes Import</h5>
		</div>
		<div class="card-body mt-1 pt-1">
			<form method="POST" action="<?php echo e(route('wo_create.store')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				
				
				

				<div class="card card-custom">

					<div id="cardBodyMain" class="card-body">

						<form action="<?php echo e(route('file.upload.ObjTemplate')); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
							<!--<hr class="my-1" />-->
								
								<div class="row mt-2">															
									<div class="col-lg-2 pt-1 text-end">
										<label class="form-label">Object Template File</label>
									</div>
									
					  
									<div class="col-lg-6">
										<div id="frmFiles1" class="form-group">
											<input id="file1" type="file" name="file1" class="form-control"  accept=".txt">
										</div>
									
									</div>		
									<div class="col-lg-3">
										<button id="btnUpload" onclick="uploadTemplate();" type="button" class="btn btn-success m-0 ms-2">Upload File</button>
									</div>												
								</div>
								
								
								<div class="row mt-4">															
									<div class="col-lg-3">
											
										<label id="verifyLabel" class="form-label">
											Verify Object Data Attributes </label>
									</div>	
									<div class="col-lg-8">
											<button id="btnProcess" onclick="processAttributes();" type="button" class="btn btn-success m-0 ms-2">Save Attributes</button>
									
									</div>
								</div>
						</form>
						
						<hr class="my-4" />
						
						
						<div class="row" style="border: 1px solid #344767;">
							
							<div id="tblDiv" class="col-lg-12">
						
							</div>
						</div>
						
						
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
		
		
		

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="/assets/js/plugins/choices.min.js"></script>
	<script src="/assets/js/core/jquery.min.js"></script>
	<script src="/assets/js/plugins/sweetalert.min.js"></script>
    <script>
		
	var allObjects ;
	
	var filePath;
	
	$(document).ready(function() {
		$("#verifyLabel").hide();
		$("#btnUpload").hide();
		$("#btnProcess").hide();
		
	});
	
	$("#file1").on("change", function() {
		$("#btnUpload").show();
		
	});
	
	
	function uploadTemplate() 
	{
		startUpload();
	}

	
	function showDataTable(mainObj)
	{
		
		var tblTxtHeaderTop = "<table id='tbl_template' ><thead class='bg-dark text-white'><tr>";
		var tblTxtHeaderBottom = " </tr></thead><tbody style='border: 1px solid #344767;width:100%;height: 100px; overflow: auto'>";
		var tblTxtFooter= "</tbody></table>";
		
		var tblHeaderRowTxt = "";
		var tblBodyRowTxt = "";
		
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>S No</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Table</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Table(de)</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Attribute(en)</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Attribute(de)</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Type</th>";
		tblHeaderRowTxt +=  "<th style='padding:4px;border: 1px solid #999999'>Attribute Position</th>";
		
		
		for(var i=1;i<mainObj.length;i++)
		{
			tblBodyRowTxt +=  "<tr>";
			
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + (i) + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].name_en + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].name_de + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].attribute_en + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].attribute_de + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].field_type + "</td>";
			tblBodyRowTxt +=  "<td style='padding:4px;border: 1px solid #444444'>" + mainObj[i].attribute_position + "</td>";
		
			tblBodyRowTxt += "</tr>";
			
		}
		
		var txtTextFull = tblTxtHeaderTop + tblHeaderRowTxt + tblTxtHeaderBottom + tblBodyRowTxt + tblTxtFooter;
		
		$("#tblDiv").html(txtTextFull);
		
		var dt1 = new DataTable("#tbl_template", {
			scrollX: true,
			scrollY: 400,
			paging: false,
			searching: false,
			ordering:  false,
			info : false,
		});
		
		$("#verifyLabel").show();
		$("#btnUpload").hide();
		$("#btnProcess").show();
		
											
							
	}
	
	function processAttributes()
	{
		
		var fd = new FormData();
			fd.append('filepath',filePath);
			
			
			fd.append('_token','<?php echo e(csrf_token()); ?>');

			$.ajax({
				url: '<?php echo e(route('object_template_process_attributes')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					// alert("Enquiry Saved Successfully : " + enquiryid);
					if (response.success)
					{
						Swal.fire({
							title: 'Object Data Attributes',
							html: '<div class="form-group"><label class="form-label">Object data attributes are updated successfully</label></div>',
							showCancelButton: false,
							customClass: {
							  confirmButton: 'btn btn-success mx-2'
							},
							buttonsStyling: false
						  }).then(function (result) {
								window.location.href = "/object_table";
						  });
					}

					
				 
				},
			});
	}
	
	
	
	function startUpload() {
		fileIdx = 0;
		maxFileIdx=$('#file1')[0].files.length;
		UploadFileByIndex();
	}
	
	function UploadFileByIndex()
	{
		var fd = new FormData();
			
			var dfile = $('#file1')[0].files[fileIdx];
			fd.append('file',dfile);
		
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
								
							//var r1 =  dtFilesToUpload.row(fileIdx).data();
							//r1.prgvalue = percent;
							//dtFilesToUpload.row(fileIdx).data(r1).draw( false );

							//console.log("File no : " + fileIdx + " successfully");
							
						}, true);
					}
					return xhr;
				},
				url: '<?php echo e(route('file.upload.ObjTemplate')); ?>',
				type: 'post',
				data:fd,
				contentType: false,
				processData: false,
				success: function(response){
					filePath = response.filePath;
					showDataTable(response.objectStructureList);
				 
					
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dk3app\resources\views/laravel/objects/object_template.blade.php ENDPATH**/ ?>