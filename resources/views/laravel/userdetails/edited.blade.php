@extends('layouts.app')



@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl  mt-2 bg-primary">

        <div class="container-fluid py-1 px-3 ">

            @include('layouts.navbars.auth.topnav', ['title' => trans('words.users')])
			<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            
            <ul class="navbar-nav  justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                
                <li class="nav-item d-flex align-items-center">
                    @include('auth.logout')
                </li>
                @if(auth()->user()->id !=1)
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="#" onclick='profileSetting(<?php echo auth()->user()->id; ?>);'>
                        <span class=''>
                            <i class="fa fa-user me-sm-0" style="color: white;"></i>
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

    <div class="container-fluid py-2">

        <div class="d-flex justify-content-center mb-1">

            <div class="col-lg-12">



                <!-- Card Basic Info -->

                <div class="card" id="basic-info">

                    <div class="card-header">

                        <h5> @lang('words.users')</h5>

                    </div>

                    <div class="card-body">

                        <form method="POST" action="" enctype="multipart/form-data">

                            @csrf

							<div class="row">

								<div class="col-lg-1"></div>

								<div class="col-lg-2 text-end">

									<label class="form-label">@lang('words.cname')</label>

								</div>

								<div class="col-lg-6">

									<div class="input-group">

										<input id="companyname" name="companyname" class="form-control" type="text"

											placeholder="companyname" value="{{ $company->company_name }}" readonly>

									</div>

									<p id="company_name_error" class="text-danger text-xs pt-1 errmsg"></p>

								</div>

								<div class="col-lg-2 mt-2">

									

								</div>

								<div class="col-lg-1"></div>

							</div>

                            <div class="row">

								<div class="col-lg-6 mt-2">

									<label class="form-label">@lang('words.username')</label>

									<div class="input-group">

										<input id="username" name="username" class="form-control" type="text"

											placeholder="username" value="{{ $user->username }}">

									</div>

									<p id="username_error" class="text-danger text-xs pt-1 errmsg"> </p>

								</div>

							

								<div class="col-lg-6 mt-2">

									<label class="form-label">@lang('words.email')</label>

									<div class="input-group">

										<input id="email" name="email" class="form-control" type="email"

											placeholder="example@email.com" value="{{ $user->email }}">

									</div>

									<p id="email_error" class="text-danger text-xs pt-1 errmsg"></p>

								</div>

							</div>

							

							<div class="row">

								<div class="col-md-2">

									<div class="form-check">

										<input type="checkbox" class="form-check-input" id="defalut_user" name="defalut_user" value="checkbox_value1"

										{{ ($company->default_user_id == $user->id ? 'checked' : '') }}>

										<label class="custom-control-label" for="customCheckDisabled">@lang('words.defaultuser')</label>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-6 mt-2">

									<label class="form-label">@lang('words.password')</label>

									<div class="input-group">

										<input id="password" name="password" class="form-control" type="password"

											placeholder="Password"  value="">

									</div>

									<p id="password_error" class="text-danger text-xs pt-1 errmsg"> </p>

								</div>

								<div class="col-6 mt-2">

									<label class="form-label">@lang('words.cpassword')</label>

									<div class="input-group">

										<input id="confirm_password" name="confirm_password" class="form-control" 

										type="password" placeholder="Confirm Password" value="">

									</div>

									<p id="confirm_password_error" class="text-danger text-xs pt-1 errmsg"> </p>

								</div>

							</div>

								

							<div class="row mt-4">

								<label class="form-label">@lang('words.urole')</label>

							</div>

							<div class="row mt-1 ps-3 pe-3">
                                @foreach($roles as $role)
                                    @if($role->role_name !== 'Admin')
                                        <div class="col-lg-2 justify-content-center bg-gray-300 pt-2">
                                            <div class="form-check">                                            
                                                <input class="form-check-input chkroles" type="checkbox" 
                                                name="chkrole_{{ $role->id }}" id="chkrole_{{ $role->id }}" 
                                                value="{{ $role->id }}"                                             
                                                    @foreach($userroles as $userrole)
                                                        @if($userrole->role_id == $role->id)
                                                            @php echo "checked"; @endphp
                                                        @endif
                                                    @endforeach >
                                                <label class="form-check-label " for="role{{ $role->id }}">
                                                    {{ $role->role_name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <p id="role_id_error" class="text-danger text-xs pt-1 errmsg"></p>
                            </div>
							<div class="row text-center mt-4">

								

								<div class="col-lg-12 mt-2">

									<button id="btnUpdateUser" onclick="updateUser('{{ $user->id }}','{{ $user->companyid }}');" class="btn btn-icon5 btn-success text-white " type="button">

										<span class="btn-inner--icon"><i class="fa fa-save"></i> </span>

										<span class="btn-inner--text ms-1">@lang('words.update')</span>

									</button>

								</div>

								

							</div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

      

    </div>

@endsection



@push('css')

    <style>

        .choices {

            margin-bottom: 0;

        }

    </style>

@endpush



@push('js')

	<script src="/assets/js/core/jquery.min.js"></script>

    <script src="/assets/js/plugins/choices.min.js"></script>

	<script src="/assets/js/plugins/sweetalert.min.js"></script>

	

	<script>	
	function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }
		

		var userName = "";

		var email = "";

		var password = "";

		var confirmpassword = "";

		var default_userid = 0;

		

		$(document).ready(function() {

			

			

		});

	

		function updateUser(userid,companyid)

		{

			$('.errmsg').hide();

			var isError = false;

			

			userName = $.trim($('#username').val());

			

			if(userName === "")

			{

				$('#username_error').html('@lang('words.unsnbemt')');

				$('#username_error').show();

				isError = true;

			}

			

			email = $.trim($('#email').val());	

		

			if(email === "")

			{

				$('#email_error').html('@lang('words.eshnbemt')');

				$('#email_error').show();

				isError = true;

			}

			else

			{  

				if (!IsEmail(email)) 

				{				

					$('#email_error').html('@lang('word.invalidemail')');

					$('#email_error').show();

					isError = true;

				}

			}

			

			password = $.trim($('#password').val());	

		

			if(password != "")

			{

				if (password.length < 6) 

				{				

					$('#password_error').html('@lang('words.psb6characters')');

					$('#password_error').show();

					isError = true;

				}

				

				confirmpassword = $.trim($('#confirm_password').val());	

				

				if(confirmpassword === "")

				{

					$('#confirm_password_error').html('@lang('words.psnbempt')');

					$('#confirm_password_error').show();

					isError = true;

				}

				else

				{  

					if (password != confirmpassword) 

					{				

						$('#confirm_password_error').html('@lang('words.pdnmatch')');

						$('#confirm_password_error').show();

						isError = true;

					}

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

				$('#role_id_error').html('@lang('words.ps1role')');

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

			    

				fd.append('userid',userid);

				fd.append('companyid',companyid);

				fd.append('username',userName);

				fd.append('email',email);

				fd.append('password',password);

				fd.append('default_userid',default_userid);

				fd.append('roleIdList',JSON.stringify(roleIdList));

				

				fd.append('_token','{{csrf_token()}}');



				$.ajax({

					url: '{{ route('updateuser')}}',

					type: 'post',

					data:fd,

					contentType: false,

					processData: false,

					success: function(response){

						if (response.success) {

							Swal.fire({

									icon: 'success',

									title: '@lang('words.user')',

									text: response.message,

									showCancelButton: false,

									customClass: {

										confirmButton: 'btn btn-success mx-2'

									},

									buttonsStyling: false

								}).then(function(result) {

									if(result.isConfirmed)

									{

										window.location.href = "/users-management" ;			

									}

										

								});

								

						} else {

							Swal.fire({

								icon: 'warning',

								title: '@lang('words.user')',

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

		

	</script>



@endpush