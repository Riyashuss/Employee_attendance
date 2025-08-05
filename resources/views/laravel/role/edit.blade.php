@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            @include('layouts.navbars.auth.topnav', ['title' => trans('words.editrole')])
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
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mb-5">
            <div class="col-lg-9 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">@lang('words.editrole')</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ route('role-edit.update', $role->id) }}">
                        @csrf
                        <label for="name" class="form-label">@lang('words.name')</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}">
                            @error('name')
                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <label class="mt-4"> @lang('words.description')</label>
                        <textarea name="description" rows="4" class="w-100 form-control">{{ old('description', $role->description) }}</textarea>
                        @error('description')
                            <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                        @enderror
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('role-management') }}" class="btn btn-light m-0">@lang('words.back')</a>
                            <button type="submit" class="btn bg-gradient-primary m-0 ms-2">@lang('words.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/quill.min.js"></script>
    <script>

    function profileSetting(user){
        window.location.href = "/profileView/"+user;
    }

        if (document.getElementById('editor')) {
            var quill = new Quill('#editor', {
                theme: 'snow' // Specify theme in configuration
            });
        }
    </script>
@endpush
