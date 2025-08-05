@extends('layouts.app')

@section('content')
    
    <main class="main-content  mt-0">
    <!-- style="background-image: url('/assets/img/logo.png');"> -->
        <div class="page-header align-items-start min-vh-50 pt-4 pb-1 m-0 border-radius-lg"
           style="backgroun-color:green;">
            <!-- <span class="mask bg-gradient-dark opacity-1"></span> -->
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n1 mt-n1 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-0">
                        <div class="card-header text-center pb-0 text-start">
							<!-- <img src="{{ $logo ?? '/assets/img/logo.png'}}" class="navbar-brand-img h-20 w-20" alt="main_logo" style="width:190px;height:60px;"> -->
							<!-- <h3 class="text-dark mb-2 mt-2">NilaTech</h3> -->
                            <h4 style="color:#E0A07D;" class=" font-weight-bolder">Login</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{route('login.perform') }}" class="text-start">
                                @csrf
                                <label>@lang('words.username')</label>
                                <div class="mb-2">
                                    <input type="text" name="username" value="" class="form-control" placeholder="@lang('words.un')" aria-label="username">
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <label>@lang('words.password')</label>
                                <div class="mb-2">
                                    <input type="password" name="password" value="" class="form-control" placeholder="@lang('words.ps')" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                 <div class="text-center">
                                    <button type="submit"style="background-color:#006A67;" class="btn btn-info w-100 mt-4 mb-0">@lang('words.signin')</button>
                                </div>
                            </form>
                             <!-- <div style="margin:auto;width:50%;">
                                <a href="{{url('/localization/en')}}"><img style="width:4em;height: auto;" src="{{ asset('assets/img/US-Flag.png')  }}"/></a>
                                <a href="{{url('/localization/de')}}"><img style="width:4em;height: auto;margin-left:1em;" src="{{ asset('assets/img/GM-Flag.png')  }}"/></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
@endsection
