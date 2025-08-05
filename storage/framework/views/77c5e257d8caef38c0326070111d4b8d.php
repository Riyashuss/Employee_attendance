



<?php $__env->startSection('content'); ?>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl mt-2 bg-primary">

        <div class="container-fluid py-1 px-3 ">

            <?php echo $__env->make('layouts.navbars.auth.topnav', ['title' => 'Users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
						<a href="#" onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
							<span class=''>
								<i class="fa fa-user me-sm-0" style="color: white;"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

    <div class="card mx-1 my-1  mt-1 pt-1" id="basic-info">

        <div class="card-header  mt-1 pt-1">

            <h5>Users</h5>

        </div>

        <div class="card-body mt-1 pt-1">

            <form method="POST" action="" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2 text-end">

                        <label class="form-label">Company Name</label>

                    </div>

                    <div class="col-lg-6">

                        <div class="input-group">

                            <select class="form-control" name="company_name" id="company_name">

                                <option value="0">..</option>

                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($company->id); ?>"

                                        <?php echo e(old('company_name') == $company->id ? 'selected' : ''); ?>>

                                        <?php echo e($company->company_name); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>   

                        </div>

                        <p id="company_name_error" class="text-danger text-xs pt-1 errmsg"></p>

                    </div>

                    <div class="col-lg-2 mt-2">

                    

                    </div>

                    <div class="col-lg-1"></div>

                </div>

                

                <div id="divNewUserButton" class="row text-center"> 

                    <div class="col-lg-12 mt-4">                

                        <button id="btnAddNewUser" onclick="addNewUser();" class="btn btn-icon5 btn-success text-white" type="button">

                            <span class="btn-inner--icon"><i class="fa fa-user"></i> </span>

                            <span class="btn-inner--text ms-1">Add New User</span>

                        </button>   

                    </div>

                </div>

                

                <div class="card my-1 mt-2 pt-1" id="divNewUserFields">

                    <div class="card-header  mt-1 pt-1">

                        <h5>Add New User</h5>

                    </div>

                    

                    <div class="card-body">                     

                        

                        <div class="row">

                        <p id="company_name_error" class="text-danger text-xs pt-1 errmsg"></p>

                            <div class="col-lg-6">

                                <label class="form-label">User Name</label>

                                <div class="input-group">

                                    <input id="username" name="username" class="form-control" type="text"

                                        placeholder="username" value="<?php echo e(old('username')); ?>">

                                </div>

                                <p id="username_error" class="text-danger text-xs pt-1 errmsg"> </p>

                            </div>

                        

                            <div class="col-lg-6 ">

                                <label class="form-label">Email</label>

                                <div class="input-group">

                                    <input id="email" name="email" class="form-control" type="email"

                                        placeholder="example@email.com" value="<?php echo e(old('email')); ?>">

                                </div>

                                <p id="email_error" class="text-danger text-xs pt-1 errmsg"></p>

                            </div>

                        </div>

                        

                        <div class="row">

                            <div class="col-md-2 mt-2">

                                <div class="form-check">

                                    <input type="checkbox" class="form-check-input" id="defalut_user" name="defalut_user" value="">

                                    <label class="custom-control-label" for="customCheckDisabled">Default User</label>

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-6 mt-2">

                                <label class="form-label">Password</label>

                                <div class="input-group">

                                    <input id="password" name="password" class="form-control" type="password"

                                        placeholder="Password">

                                </div>

                                <p id="password_error" class="text-danger text-xs pt-1 errmsg"> </p>

                            </div>

                            <div class="col-6 mt-2">

                                <label class="form-label">Confirm Password</label>

                                <div class="input-group">

                                    <input id="confirm_password" name="confirm_password" class="form-control" type="password" placeholder="Confirm Password">

                                </div>

                                <p id="confirm_password_error" class="text-danger text-xs pt-1 errmsg"> </p>

                            </div>

                        </div>

                        

                        <div class="row mt-4">

                            <label class="form-label">User Role</label>

                        </div>

                        <div class="row mt-1 ps-3 pe-3">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($role->role_name !== 'Admin'): ?>
                                    <div class="col-lg-2 justify-content-center bg-gray-300 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input chkroles" type="checkbox" name="chkrole_<?php echo e($role->id); ?>" id="chkrole_<?php echo e($role->id); ?>" value="<?php echo e($role->id); ?>" >
                                            <label class="form-check-label " for="role<?php echo e($role->id); ?>">
                                                <?php echo e($role->role_name); ?>

                                            </label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <p id="role_id_error" class="text-danger text-xs pt-1 errmsg"></p>
                        </div>

                        

                        <div class="row text-center mt-4">                          

                            <div class="col-lg-12 mt-2">

                                <button id="btnSaveUser" onclick="saveNewUser();" class="btn btn-icon5 btn-success text-white me-2" type="button">

                                    <span class="btn-inner--icon"><i class="fa fa-save"></i> </span>

                                    <span class="btn-inner--text ms-1">Save</span>

                                </button>

                            

                                <button id="btnCancel" onclick="cancelEntry();" class="btn btn-icon5 btn-primary text-white ms-2" type="button">

                                    <span class="btn-inner--icon"><i class="fa fa-cancel"></i> </span>

                                    <span class="btn-inner--text ms-1">Cancel</span>

                                </button>

                            </div>

                            

                        </div>

                    </div>

                </div>

                

                <div class="my-1">  

                    <table id="tblUsers" class="table table-striped" style="width:100%">

                        <thead class="bg-dark text-white">

                            <tr>

                            

                                <th class="text-center">User Name</th>

                                <th class="text-center">Company</th>                                

                                <th class="text-center">Email</th>

                                <th class="text-center">Role</th>

                                <th class="text-center">Action</th>

                            </tr>

                        </thead>

                        <tbody>

          

                       </tbody>

                    </table>

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

        

        #tblUsers > tbody > tr > td

        {

            text-align:center;

        }

    </style>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('js'); ?>

    <script src="/assets/js/core/jquery.min.js"></script>

    <script src="/assets/js/plugins/choices.min.js"></script>

    <script src="/assets/js/plugins/sweetalert.min.js"></script>

    

    <script>

    function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }

    var dtusers;

    

    var companyid = 0;

    var userName = "";

    var email = "";

    var password = "";

    var confirmpassword = "";

    var default_userid = 0;

    

    var usernames = new Array();



    $(document).ready(function() {

        

        $('.errmsg').hide();

        

        $("#divNewUserButton").show();

        $("#divNewUserFields").hide();

        

        dtusers = $('#tblUsers').DataTable({

            paging: true,
            pageLength:10,

            searching: false,

            ordering:  false,

            info : false,

            language: {

                emptyTable: 'No User available for the company'

            },

            columns: [

                { data: 'username' ,

                    render: function(data, type, row, meta) {

                        

                        var userIdTxt =  row["username"];



                        if (parseInt(row["isDefaultUser"]) > 0)

                        {

                            userIdTxt = userIdTxt + "<span class='badge badge-sm bg-dark ms-1'>Default User</span>";

                        }

                        

                        return userIdTxt ;

                    }

                },

                { data: 'companyname' },

                { data: 'email' },

                { data: 'role' },

                { 

                    data: 'view',

                    render: function(data, type, row, meta) {

                        

                        var userid =  row["userid"];

                        var companyid =  row["companyid"];

                        var btnTxt='';



                        if (parseInt(row["isDefaultUser"]) == 0)

                        {

                            btnTxt = "<button class='btn btn-icon btn-2 btn-success mb-0 me-2' type='button' onclick='updateDefaultuser(" + userid + "," + companyid + ")'><span class='btn-inner--icon'><i class='fa fa-user-circle'></i></span></button>";

                        }



                        

                        return btnTxt +"<button class='btn btn-icon btn-2 btn-dark mb-0 me-1' type='button' onclick='editUser(" + userid + "," + companyid + ")'><span class='btn-inner--icon'><i class='fa fa-edit'></i></span></button>"

                            + "<button class='btn btn-icon btn-2 btn-danger mb-0 ms-1' type='button' onclick='deleteUser(" + userid + "," + companyid + ")'><span class='btn-inner--icon'><i class='fa fa-trash'></i></span></button>";

                    }

                }

            ]

        });



        //fillUsersTable();



    });

    

    function editUser(userid, companyid)

    {

        window.location.href = "/edituser/" + userid + "/" + companyid ;

    }



    

    

    function deleteUser(userid, companyid)

    {

        Swal.fire({

            icon: 'warning',

            title: 'User',

            text: 'Are you sure to delete the User',

            showCancelButton: true,

            customClass: {

                confirmButton: 'btn btn-success mx-2',

                cancelButton: 'btn btn-danger mx-2',

            },

            buttonsStyling: false

            

        }).then(function(result) {

            if(result.isConfirmed)

            {

                checkDefaultUser(userid, companyid);            

            }

                

        }); 

        

    }

    

    function checkDefaultUser(userid, companyid)

    {

        var fd = new FormData();        



        fd.append('userid',userid);

        fd.append('companyid',companyid);

        fd.append('_token','<?php echo e(csrf_token()); ?>');

        

        $.ajax({

            url: '<?php echo e(route('checkdefaultuser')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){

                if (response.success) {

                    

                    var default_user_id = response.defaultuser.default_user_id;

                    

                    if(default_user_id == userid)

                    {

                        Swal.fire({

                            icon: 'warning',

                            title: 'User',

                            text: 'Default User',

                            showCancelButton: true,

                            customClass: {

                                confirmButton: 'btn btn-success mx-2',

                                cancelButton: 'btn btn-danger mx-2'

                            },

                            buttonsStyling: false

                        }).then(function(result) {

                            if(result.isConfirmed)

                            {

                                confirm_Delete(userid, companyid);

                                updateDefaultUser(userid,companyid);

                            }

                        });

                        

                    }else{

                        confirm_Delete(userid, companyid);

                    }

                        

                } 

            },

        });

    }

    

    function confirm_Delete(userid, companyid)

    {

        var fd = new FormData();        



        fd.append('userid',userid);

        fd.append('companyid',companyid);

        fd.append('_token','<?php echo e(csrf_token()); ?>');

                

        $.ajax({

            url: '<?php echo e(route('deleteuser')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){

                if (response.success) {

                    Swal.fire({

                            icon: 'success',

                            title: 'User',

                            text: response.message,

                            showCancelButton: false,

                            customClass: {

                                confirmButton: 'btn btn-success mx-2'

                            },

                            buttonsStyling: false

                        });

                        fillUsersTable();

                        

                } else {

                    Swal.fire({

                        icon: 'warning',

                        title: 'User',

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

    function deleteUser(userid, companyid)

    {

        Swal.fire({

            icon: 'warning',

            title: 'User',

            text: 'Are you sure to delete the User',

            showCancelButton: true,

            customClass: {

                confirmButton: 'btn btn-success mx-2',

                cancelButton: 'btn btn-danger mx-2',

            },

            buttonsStyling: false

            

        }).then(function(result) {

            if(result.isConfirmed)

            {

                checkDefaultUser(userid, companyid);            

            }

                

        }); 

        

    }

	

    // function updateDefaultUserId(companyid)

    // {

    //     var fd = new FormData();        



    //     fd.append('companyid',companyid);

    //     fd.append('_token','<?php echo e(csrf_token()); ?>');

                

    //     $.ajax({

    //         url: '<?php echo e(route('resetdefaultuser')); ?>',

    //         type: 'post',

    //         data:fd,

    //         contentType: false,

    //         processData: false,

    //         success: function(response){

    //             if (response.success) {                 

                        

    //             } 

    //         },

    //     });

    // }

    

	function updateDefaultuser(userid, companyid)

    {

        Swal.fire({

            icon: 'warning',

            title: 'User',

            text: 'Do you want to change the default User ?',

            showCancelButton: true,

            customClass: {

                confirmButton: 'btn btn-success mx-2',

                cancelButton: 'btn btn-danger mx-2',

            },

            buttonsStyling: false

            

        }).then(function(result) {

            if(result.isConfirmed)

            {

                updateDefaultUserId(userid, companyid);            

            }

                

        }); 

        

    }

    function updateDefaultUserId(userid,companyid)

    {

        var fd = new FormData();        



        fd.append('companyid',companyid);

		fd.append('userid',userid);

        fd.append('_token','<?php echo e(csrf_token()); ?>');

                

        $.ajax({

            url: '<?php echo e(route('updatedefaultuser')); ?>',

            type: 'post',

            data:fd,

            contentType: false,

            processData: false,

            success: function(response){

                if (response.success) {                 

					fillUsersTable();

                } 

            },

        });

    }

    

    

    

    

    $("#company_name").on("change", function() 

    {

        $('#company_name_error').hide();

        dtusers.clear().draw(true);

        companyid = $("#company_name").val();       

        

        fillUsersTable();

    });

    

    function fillUsersTable() {
        var fd = new FormData();        

        fd.append('companyid', companyid);
        fd.append('_token', '<?php echo e(csrf_token()); ?>');
        
        $.ajax({
            url: '<?php echo e(route('getusers')); ?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                var users = response.users;
                
                dtusers.clear().draw(true);
                
                usernames = new Array();
                
                for(var i = 0; i < users.length; i++) {
                    var roleTxt = "";
                    
                    var isNotAdmin = true; // Flag to check if user does not have admin role
                    
                    for(var j = 0; j < users[i].roles.length; j++) {                   
                        if(users[i].roles[j].role_name === 'Admin') {
                            isNotAdmin = false;
                            break; // Exit loop if admin role is found
                        }
                    }
                    
                    if(isNotAdmin) { // Only proceed if user does not have admin role
                        usernames[i] = users[i].username;
                        
                        for(var j = 0; j < users[i].roles.length; j++) {                   
                            roleTxt = roleTxt + users[i].roles[j].role_name + "<br>";
                        }
                                
                        dtusers.row.add({
                            "userid": users[i].userid,
                            "username": users[i].username,
                            "isDefaultUser": users[i].isDefaultUser,
                            "companyid": users[i].companyid,
                            "companyname": users[i].company_name,
                            "email": users[i].email,
                            "role": roleTxt,
                            "view": users[i].id
                        }).draw(true);
                    }
                }
            },
        });
    }   

    function resetDefaultUser(userid, companyid)

    {

        var fd = new FormData();

        



        fd.append('userid',userid);

        fd.append('companyid',companyid);





        fd.append('_token','<?php echo e(csrf_token()); ?>');



                $.ajax({

                    url: '<?php echo e(route('updatedefaultuser')); ?>',

                    type: 'post',

                    data:fd,

                    contentType: false,

                    processData: false,

                    success: function(response){

                        if (response.success) {

                            Swal.fire({

                                    icon: 'success',

                                    title: 'Default User',

                                    text: response.message,

                                    showCancelButton: false,

                                    customClass: {

                                        confirmButton: 'btn btn-success mx-2'

                                    },

                                    buttonsStyling: false

                                }); 

                                

                                fillUsersTable();   

                        } else {

                            Swal.fire({

                                icon: 'warning',

                                title: 'User',

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

    

    function addNewUser()

    {   

        if(companyid < 1)

        {

            $('#company_name_error').html('Company Name should not be empty');

            $('#company_name_error').show();

            //isError = true;

        }

        else

        {

            document.getElementById('company_name').readOnly = true;

            $("#divNewUserButton").hide();

            $("#divNewUserFields").show(function () {

            $('#company_name').prop('disabled', true);

           });

        }

        

    }



    $('#username').on('change', function() {

        var companyName = $.trim($('#company_name').val());

        console.log(companyName);

      if(companyName === 0)

      {

        $('#company_name_error').html('Company Name should not be empty');

        $('#company_name_error').show();

      }

     else

      {  

        if (checkNameExists(companyName)) 

        { 

            console.log(companyName);

            

            saveNewUser();

          

        }

      }

    });

    

    function saveNewUser()

    {

       

        

        var companyName = $.trim($('#company_name').val());

        console.log(companyName);

      

        $('.errmsg').hide();

        var isError = false;

       

         userName = $.trim($('#username').val());        

                

        if(userName === "")

        {

            $('#username_error').html('User Name should not be empty');

            $('#username_error').show();

            isError = true;

        }

        else

        {  

            if (checkNameExists(userName)) 

            {               

                $('#username_error').html('User Name already exists');

                $('#username_error').show();

                isError = true;

            }

        }

        userName = $.trim($('#username').val());        

                

        if(userName === "")

        {

            $('#username_error').html('User Name should not be empty');

            $('#username_error').show();

            isError = true;

        }

        else

        {  

            if (checkNameExists(userName)) 

            {               

                $('#username_error').html('User Name already exists');

                $('#username_error').show();

                isError = true;

            }

        }

        

        email = $.trim($('#email').val());  

        

        if(email === "")

        {

            $('#email_error').html('Email should not be empty');

            $('#email_error').show();

            isError = true;

        }

        else

        {  

            if (!IsEmail(email)) 

            {               

                $('#email_error').html('Invalid Email');

                $('#email_error').show();

                isError = true;

            }

        }

        

        password = $.trim($('#password').val());    

        

        if(password === "")

        {

            $('#password_error').html('Password should not be empty');

            $('#password_error').show();

            isError = true;

        }

        else

        {  

            if (password.length < 6) 

            {               

                $('#password_error').html('Password should be atleast 6 Characters');

                $('#password_error').show();

                isError = true;

            }

        }

        

        confirmpassword = $.trim($('#confirm_password').val()); 

        

        if(confirmpassword === "")

        {

            $('#confirm_password_error').html('Password should not be empty');

            $('#confirm_password_error').show();

            isError = true;

        }

        else

        {  

            if (password != confirmpassword) 

            {               

                $('#confirm_password_error').html('Passwords does not match');

                $('#confirm_password_error').show();

                isError = true;

            }



        }       

        

        

        var roleIdList = new Array();

        

        var $chkrole_objects = $(".chkroles");

        

        $chkrole_objects.each( function(chk_role_object) 

        { 

            if (this.checked)

            {

                roleIdList.push($(this).val());

            }

        });

        

        if (roleIdList.length <= 0)

        {

            $('#role_id_error').html('Please select atleast one role');

            $('#role_id_error').show();

            isError = true;

        }

        

        if($('#defalut_user').prop('checked') == true)

        {

            default_userid = 1;

        }

        else{

            default_userid = 0;

        }

        

        if(isError == false)

        {

            var fd = new FormData();

        

            fd.append('username',userName);

            fd.append('email',email);

            fd.append('password',password);

            fd.append('companyid',companyid);

            fd.append('default_userid',default_userid);

            fd.append('roleIdList',JSON.stringify(roleIdList));

            

            fd.append('_token','<?php echo e(csrf_token()); ?>');



            $.ajax({

                url: '<?php echo e(route('users-management.store')); ?>',

                type: 'post',

                data:fd,

                contentType: false,

                processData: false,

                success: function(response){

                    if (response.success) {

                        Swal.fire({

                                icon: 'success',

                                title: 'User',

                                text: response.message,

                                showCancelButton: false,

                                customClass: {

                                    confirmButton: 'btn btn-success mx-2'

                                },

                                buttonsStyling: false

                            });                         

                            fillUsersTable();

                            clearValues();

                            $("#divNewUserButton").show();

                            $("#divNewUserFields").hide(function () {

                            $('#company_name').prop('disabled', false);

                           });

                    } 

                    else {

                        Swal.fire({

                            icon: 'warning',

                            title: 'User',

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

        

    }

    

    function clearValues()

    {

        $('#username').val('');

        $('#email').val('');

        $('#password').val('');

        $('#confirm_password').val('');

        $('#defalut_user').prop('checked', false);

        

        var $chkrole_objects = $(".chkroles");

        

        $chkrole_objects.each( function(chk_role_object) 

        { 

            this.checked = false;

        });

    }

    

    function checkNameExists(username) {            



        for(var i = 0; i < usernames.length; i++)

        {

            if (usernames[i] == username)

            {

                return true;

            }

        }

        

        return false;

    }

    

    function IsEmail(email) 

    {

        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

          

        if(!regex.test(email))

        {

            return false;

        }

        else

        {

            return true;

        }

    }

    

    function cancelEntry()

    {

        $("#divNewUserButton").show();

        $("#divNewUserFields").hide(function () {

            $('#company_name').prop('disabled', false);

           });

    }















</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Senthil\DK3\HemmingerUAT\release01_UAT_27042024\dk3app\resources\views/laravel/userwork/index.blade.php ENDPATH**/ ?>