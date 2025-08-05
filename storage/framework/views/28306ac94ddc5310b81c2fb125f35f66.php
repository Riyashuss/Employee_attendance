
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl mt-2 bg-primary">
        <div class="container-fluid py-1 px-3 ">
            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => trans('words.homeworkflowchange')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                    <li class="nav-item d-flex align-items-center">
                        <?php echo $__env->make('auth.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="#" onclick='profileSetting(<?php echo e(auth()->user()->id); ?>);'>
                            <span class=''>
                                <i class="fa fa-user me-sm-0" style="color: white;"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card mx-1 my-1 mt-1 pt-1" id="basic-info">
        <div class="card-header mt-1 pt-1">
            <h5><?php echo app('translator')->get('words.workorderflowchange'); ?></h5>
        </div>
        <div class="card-body mt-1 pt-1">
            <form method="POST" action="" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2 text-end">
                        <label class="form-label"><?php echo app('translator')->get('words.woname'); ?></label>
                    </div>
                    <div class="col-lg-6">
                       <div class=" dropdown-container">
                         <input type="text" class="form-control dropdown-input" name="workorder_name" id="workorder_name" placeholder="Search WorkOrder Name">
                            <div class="dropdown-menu" id="dropdownMenu">
                                <div class="dropdown-item" data-value="0">...</div>
                                    <?php $__currentLoopData = $workorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="selectedWorkOrder" class="dropdown-item" data-value="<?php echo e($workorder->workorder_id); ?>"><?php echo e($workorder->name); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <p id="workorder_error" class="text-danger text-xs pt-1 errmsg"></p>
                        <p id="workordermatch_error" class="text-danger text-xs pt-1 errmsg"></p>
                     <div class="col-lg-2 text-center" id="addGroup">
                            <button class="btn btn-icon btn-4 btn-success" type="button" id="btnAddGroup" onclick="addNewGroup();">
                                <span class="btn-inner--icon"></span>
                                <span class="btn-inner--text"><?php echo app('translator')->get('words.changeflow'); ?></span>
                            </button>
                    </div>
                    <div class="col-lg-2 mt-2">
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </form>
        </div>
</div>
        
        <div id="divAddNewGroup" class="row justify-content-center">

                <div class="col-lg-2"></div>

                <div class="col-lg-12">

                    <div class="card my-1" id="groups" style="height: 400px;width:900px;margin: 5px 90px 5px 190px;">

                        <div class="card-header">

                            <h5><?php echo app('translator')->get('words.workorderflowchange'); ?></h5>

                        </div>              

                        <div class="card-body">                     

                            <div class="row">

                                <div class="col-lg-6">

                                    <label class="form-label"><?php echo app('translator')->get('words.pstep'); ?></label>

                                    <div class="input-group">

                                         <select class="form-control" name="process_step" id="process_step">
                                          <?php $__currentLoopData = $process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $process_step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($process_step->processname); ?>"><?php echo e($process_step->processname); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>  
                                    </div>

                                    <p id="process_step_error" class="text-danger text-xs pt-1 errmsg"> </p>

                                </div>

                            

                                <div class="col-lg-6">
                                    <label class="form-label"><?php echo app('translator')->get('words.statuscode'); ?></label>
                                    <div class="input-group">
                                        <select class="form-control" name="status_code" id="status_code">   <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status_code->description); ?>"><?php echo e($status_code->description); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                    </div>
                                    <p id="status_code_error" class="text-danger text-xs pt-1 errmsg"></p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">

                                    <label class="form-label"><?php echo app('translator')->get('words.cname'); ?></label>

                                    <div class="input-group">

                                         <select class="form-control" name="company_name" id="company_name">
                                          <?php $__currentLoopData = $companyName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company_name->company_name); ?>"><?php echo e($company_name->company_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>  
                                    </div>

                                    <p id="company_name_error" class="text-danger text-xs pt-1 errmsg"> </p>

                                </div>

                            

                                <div class="col-lg-6">

                                    <label class="form-label"><?php echo app('translator')->get('words.username'); ?></label>

                                    <div class="input-group">
                                    <select class="form-control" name="username" id="username">
                                          <?php $__currentLoopData = $userName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($username->username); ?>"><?php echo e($username->username); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>  
                                    </div>

                                     <p id="username_error" class="text-danger text-xs pt-1 errmsg"> </p>

                                </div>
                            </div> 
                        
                        

                            

                            <div class="row text-center mt-5">                           

                                <div class="col-lg-12 mt-2">

                                    <button id="btnAddNewGroup" onclick="btnAddNewGroup();" class="btn btn-icon5 btn-success text-white me-2" type="button">

                                        <span class="btn-inner--icon"> </span>

                                        <span class="btn-inner--text ms-1"><?php echo app('translator')->get('words.update'); ?></span>

                                    </button>

                                

                                    <button id="btnCancel" onclick="cancelEntry();" class="btn btn-icon5 btn-primary text-white ms-2" type="button">

                                        <span class="btn-inner--icon"><i class="fa fa-cancel"></i> </span>

                                        <span class="btn-inner--text ms-1"><?php echo app('translator')->get('words.cancel'); ?></span>

                                    </button>                           

                                </div>                      

                            </div>

                            

                        </div>

                    </div>

                </div>  

                <div class="col-lg-2"></div>

            </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .choices {
            margin-bottom: 0;
        }
        
        #tblUsers > tbody > tr > td {
            text-align: center;
        }
        .dropdown-container {
            position: relative;
            display: inline-block;
        }

        .dropdown-input {
            width: 600px;
            box-sizing: border-box;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            width: 600px;
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-container.show .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 8px 16px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script src="/assets/js/plugins/sweetalert.min.js"></script>
    
    <script>
        function profileSetting(user) {
            window.location.href = "/profileView/" + user;
        }
        var dtusers;
        var workorderid = 0;
        $(document).ready(function() {
            $('.errmsg').hide();
            
            dtusers = $('#tblUsers').DataTable({
                paging: false,
                
                searching: false,
                ordering: true,
                info: true,
                language: {
                    emptyTable: '<?php echo app('translator')->get('words.noworkorderhistoryavailable'); ?>'
                },
                columns: [
                    { 
                        data: 'serialNumber',
                        render: function(data, type, row, meta) {
                        return meta.row + 1;
                     }
                    },  
                    { data: 'date' },
                    { data: 'processname' },
                    { data: 'description' },
                    { data: 'remarks' },
                    { data: 'assignedBy' },
                    { data: 'assignedTo' },
                    
                ]
            });
        });


        $("#workorder_name").on("change", function() {
            workOrderName = $("#workorder_name").val();
        var fd = new FormData();

        

        fd.append('workOrderName',workOrderName);

        

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

             

            url: '<?php echo e(route('checkWorkOrderNames')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){
                console.log(response);
                if(response.result){

                    $('#workorder_name').focus();

                 $('#username').prop('disabled', true);
            $('#status_code').prop('disabled', true);
            var workorderId = response.workorder_id;
           // let workorderId = document.getElementById('workorder_name').value;
          //console.log(workorderId);
            if (parseInt(workorderId) === 0) {
                document.getElementById('workorder_error').innerHTML = 'Workorder should not be empty';
                document.getElementById('workorder_error').style.display = 'block';
            } else {
                document.getElementById('workorder_error').style.display = 'none';
                document.getElementById('btnAddGroup').style.display = 'none';
                document.getElementById('divAddNewGroup').style.display = 'block';

                fetchWorkOrderDetails(workorderId);
            }
        }else{

                    Swal.fire({

                    icon: 'warning',

                    title: '<?php echo app('translator')->get('words.workorder'); ?>',

                    text: '<?php echo app('translator')->get('words.pleaseentervalidworkordername'); ?>',

                    //html: '<div class="form-group"><label class="form-label">Please enter Work Order Name.</label></div>',

                    showCancelButton: false,

                    customClass: {

                    confirmButton: 'btn btn-success mx-2',

                    //cancelButton: 'btn btn-danger mx-2'

                    },

                    buttonsStyling: false

                    }).then(function (result) {



                    });

                }

                

            },

        });

        });

        function addNewGroup() {
    let workorderId = $('#selectedWorkOrder').val();
    let isValidWorkorder = false;

    // Check if the workorder ID is present in the dropdown items
    $('#dropdownMenu .dropdown-item').each(function() {
        if ($(this).data('value') == workorderId) {
            console.log(workorderId);
            isValidWorkorder = true;
            return false;  // Break the loop
        }
    });

    if (!isValidWorkorder || parseInt(workorderId) === 0 ) {
        alert('Please insert a valid workorder');
    } else {
        $('#workorder_error').hide();
        $('#btnAddGroup').hide();
        $('#divAddNewGroup').show();
        $('#workorder_name').setAttribute('readonly', true);
        //fetchWorkOrderDetails(workorderId);
    }
}

    document.querySelectorAll('.dropdown-item').forEach(function(item) {
    item.addEventListener('click', function() {
        var value = this.getAttribute('data-value');
        var text = this.textContent;
        document.getElementById('workorder_name').value = text;
        document.getElementById('selectedWorkOrder').value = value;
        document.querySelector('.dropdown-container').classList.remove('show');
    });
});

document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.dropdown-container').contains(event.target);
    if (!isClickInside) {
        document.querySelector('.dropdown-container').classList.remove('show');
    }
});

    function addNewGroup()
    {
        
        workOrderName = $("#workorder_name").val();
        var fd = new FormData();

        

        fd.append('workOrderName',workOrderName);

        

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

             

            url: '<?php echo e(route('check_workordername')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){

                if(response.result){

                    $('#inWorkOrderName').focus();

                 $('#username').prop('disabled', true);
            $('#status_code').prop('disabled', true);

            let workorderId = document.getElementById('selectedWorkOrder').value;

            if (parseInt(workorderId) === 0) {
                document.getElementById('workorder_error').innerHTML = 'Workorder should not be empty';
                document.getElementById('workorder_error').style.display = 'block';
            } else {
                document.getElementById('workorder_error').style.display = 'none';
                document.getElementById('btnAddGroup').style.display = 'none';
                document.getElementById('divAddNewGroup').style.display = 'block';

                fetchWorkOrderDetails(workorderId);
            }
        

                      

                  

                }else{

                    Swal.fire({

                    icon: 'warning',

                    title: '<?php echo app('translator')->get('words.workorder'); ?>',

                    text: '<?php echo app('translator')->get('words.pleaseentervalidworkordername'); ?>',

                    //html: '<div class="form-group"><label class="form-label">Please enter Work Order Name.</label></div>',

                    showCancelButton: false,

                    customClass: {

                    confirmButton: 'btn btn-success mx-2',

                    //cancelButton: 'btn btn-danger mx-2'

                    },

                    buttonsStyling: false

                    }).then(function (result) {



                    });

                }

                

            },

        });

        

           
    }

    function fetchWorkOrderDetails(workorderId) 
    {
        $('#workorder_name').prop('disabled', true);
        $.ajax({
            url: '<?php echo e(route("getWorkOrderDetails")); ?>',  
            type: 'POST',
            data: {
                workorder_id: workorderId,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if (response.success) {
                    let details = response.workOrderDetails;

                    console.log(details);
                        if(details!=null){
                            $('#process_step').val(details.processname);
                           $('#company_name').val(details.company_name);
                           $('#username').val(details.username);
                            $('#status_code').val(details.description);
                          
                        }
                        else{
                           
                            $('#divAddNewGroup').hide();
                            $('#workordermatch_error').show();
                            
                        }
                
                } else {
                    console.error('Failed to fetch work order details.');
                }
            },
            error: function(error) {
                console.error('Error fetching work order details:', error);
            }
        });
    }

        $(document).ready(function(){

            $('#divAddNewGroup').hide();

        });

        $(document).ready(function(){

        $('#divAddNewGroup').hide();

        });

        $("#selFieldGroupList").on("change",function() {

            

            groupListId = $("#selFieldGroupList").val();

            GetObjectFieldList(groupListId);

        }); 

        $(document).ready(function() {
     $('#workorder_name').change(function() {
        let workorderId = $(this).val();
        
        if (parseInt(workorderId) === 0) {
            $('#workorder_error').html('<?php echo app('translator')->get('words.workordershouldnotbeempty'); ?>');
            $('#workorder_error').show();
            $('#divAddNewGroup').hide();
        } else {
            $('#workorder_error').hide();
           // fetchWorkOrderDetails(workorderId);
        }
    });
});
        function cancelEntry() {
            window.location.href = "/home_workflowchange";
      
    }
   

     $(document).ready(function() {
        $('#company_name').change(function() {
            $('#username').prop('disabled', false);
            let companyName = $(this).val();
            $.ajax({
                url: '<?php echo e(route("getUsersByCompany")); ?>',
                type: 'POST',
                data: {
                    company_name: companyName,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        let users = response.users;
                        let userDropdown = $('#username');
                        userDropdown.empty();
                        $.each(users, function(index, user) {
                         userDropdown.append('<option value="' + user.username + '">' + user.username + '</option>');
                        });
                    } else {
                        console.error('Failed to fetch users.');
                    }
                },
                error: function(error) {
                    console.error('Error fetching users:', error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#process_step').change(function() {
            $('#status_code').prop('disabled', false);
            let processStep = $(this).val();
            $.ajax({
                url: '<?php echo e(route("getStatusCodesByProcessStep")); ?>',
                type: 'POST',
                data: {
                    process_step: processStep,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    console.log("response not ");
                    if (response.success) {
                        console.log(response);
                        let status_code = response.statusCodes;
                        let status_codeDropdown = $('#status_code');
                        status_codeDropdown.empty();
                        $.each(status_code, function(index, status_code) {
                            status_codeDropdown.append('<option value="' + status_code.description + '">' + status_code.description + '</option>');
                        });
                    } else {
                        console.error('s to fetch users.');
                    }
                },
            
                error: function(error) {
                    console.error('Error fetching status codes:', error);
                }
            });
        });
    });


    function btnAddNewGroup()
    {
    

        if(parseInt(username) === 0)
        {
            $('#username_error').html('<?php echo app('translator')->get('words.unsnbemt'); ?>');
            $('#username_error').show();
            return;
        }
        if($.trim(company_name) =="")

        {

            $('#company_name_error').html('<?php echo app('translator')->get('words.cnsnbemt'); ?>');

            $('#company_name_error').show();

            return;

        }
        if($.trim(status_code) =="")

        {

            $('#status_code_error').html('<?php echo app('translator')->get('words.statuscodeshouldnotbeempty'); ?>');

            $('#status_code_error').show();

            return;

        }
        if($.trim(process_step) =="")

        {

            $('#process_step_error').html('<?php echo app('translator')->get('words.processstepshouldnotbeempty'); ?>');

            $('#process_step_error').show();

            return;

        }

        var workOrderId = $('#workorder_name').val();
        var processStep = $('#process_step').val();
        var statusCode = $('#status_code').val();
        var companyName= $('#company_name').val();
        var assignedToUserId =$('#username').val();

        var fd = new FormData();
        fd.append('workOrderId',workOrderId);
        fd.append('assignedToUserId',assignedToUserId);
        fd.append('processStep',processStep);
        fd.append('statusCode',statusCode);
        fd.append('companyName',companyName);

        fd.append('_token','<?php echo e(csrf_token()); ?>');
            $.ajax({
                url: '<?php echo e(route('updateWorkflow')); ?>',
                type: 'post',
                data:fd,
                contentType: false,
                processData: false,
                success: function(response){

                    if (response.success)
                    {
                        Swal.fire({
                                    icon: 'success',
                                    title: '<?php echo app('translator')->get('words.workorder'); ?>',
                                    text: '<?php echo app('translator')->get('words.workorderflowischange'); ?>' ,
                                    showCancelButton: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success mx-2'
                                    },
                                    buttonsStyling: false
                                }).then(function (result) {
                                        window.location.href = "/home";
                                  });
                    }
                    else
                    {
                        Swal.fire({
                                icon: 'warning',
                                title: '<?php echo app('translator')->get('words.workorder'); ?>',
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



    document.getElementById('workorder_name').addEventListener('click', function() {
    document.querySelector('.dropdown-container').classList.add('show');
});

document.getElementById('workorder_name').addEventListener('keyup', function() {
    var filter = this.value.toLowerCase();
    var items = document.querySelectorAll('.dropdown-item');
    items.forEach(function(item) {
        var text = item.textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});

document.querySelectorAll('.dropdown-item').forEach(function(item) {
    item.addEventListener('click', function() {
        var value = this.getAttribute('data-value');
        var text = this.textContent;
        document.getElementById('workorder_name').value = text;
       document.getElementById('selectedWorkOrder').value = value;
        document.querySelector('.dropdown-container').classList.remove('show');
    });
});

document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.dropdown-container').contains(event.target);
    if (!isClickInside) {
        document.querySelector('.dropdown-container').classList.remove('show');
    }
});
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Dk3app_Final\Dk3app_Final\dk3app\resources\views/home_workflowchange.blade.php ENDPATH**/ ?>